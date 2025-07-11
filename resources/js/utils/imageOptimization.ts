// Utilidades para optimización de imágenes con mejores prácticas

export interface ImageConfig {
  quality: number;
  format: 'webp' | 'jpg' | 'png';
  sizes: number[];
  aspectRatio?: string;
}

// Configuraciones predefinidas para diferentes tipos de imágenes
export const imageConfigs: Record<string, ImageConfig> = {
  hero: {
    quality: 85,
    format: 'webp',
    sizes: [400, 800, 1200, 1600],
    aspectRatio: '16:9'
  },
  dish: {
    quality: 90,
    format: 'webp', 
    sizes: [200, 400, 600, 800],
    aspectRatio: '4:3'
  },
  avatar: {
    quality: 80,
    format: 'webp',
    sizes: [50, 100, 200],
    aspectRatio: '1:1'
  }
};

// Generar URL optimizada
export const generateOptimizedImageUrl = (
  baseUrl: string,
  width: number,
  height: number,
  config: ImageConfig
): string => {
  const params = new URLSearchParams({
    w: width.toString(),
    h: height.toString(),
    q: config.quality.toString(),
    fmt: config.format,
    fit: 'crop',
    crop: 'center'
  });

  return `${baseUrl}?${params.toString()}`;
};

// Generar srcSet para imágenes responsivas
export const generateSrcSet = (
  baseUrl: string,
  config: ImageConfig,
  aspectRatio: [number, number] = [16, 9]
): string => {
  return config.sizes
    .map(width => {
      const height = Math.round(width * (aspectRatio[1] / aspectRatio[0]));
      const url = generateOptimizedImageUrl(baseUrl, width, height, config);
      return `${url} ${width}w`;
    })
    .join(', ');
};

// Generar sizes attribute para responsive images
export const generateSizesAttribute = (breakpoints: Record<string, string>): string => {
  return Object.entries(breakpoints)
    .map(([media, size]) => `${media} ${size}`)
    .join(', ');
};

// Preload de imágenes críticas
export const preloadCriticalImages = (imageUrls: string[]): void => {
  imageUrls.forEach(url => {
    const link = document.createElement('link');
    link.rel = 'preload';
    link.as = 'image';
    link.href = url;
    document.head.appendChild(link);
  });
};

// URLs base para diferentes proveedores de imágenes
export const imageProviders = {
  unsplash: {
    base: 'https://images.unsplash.com',
    generateUrl: (id: string, width: number, height: number) => 
      `https://images.unsplash.com/${id}?w=${width}&h=${height}&fit=crop&crop=center&auto=format&q=80`
  },
  pixabay: {
    base: 'https://cdn.pixabay.com/photo',
    generateUrl: (path: string) => `https://cdn.pixabay.com/photo/${path}`
  },
  local: {
    base: '/storage/images',
    generateUrl: (filename: string) => `/storage/images/${filename}`
  }
};

// Detectar soporte para WebP
export const supportsWebP = (): Promise<boolean> => {
  return new Promise((resolve) => {
    const webP = new Image();
    webP.onload = webP.onerror = () => {
      resolve(webP.height === 2);
    };
    webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
  });
};

// Cache para imágenes cargadas
class ImageCache {
  private cache = new Map<string, HTMLImageElement>();
  private loadingPromises = new Map<string, Promise<HTMLImageElement>>();

  async loadImage(src: string): Promise<HTMLImageElement> {
    // Si ya está en cache, retornarlo
    if (this.cache.has(src)) {
      return this.cache.get(src)!;
    }

    // Si ya se está cargando, retornar la promesa existente
    if (this.loadingPromises.has(src)) {
      return this.loadingPromises.get(src)!;
    }

    // Crear nueva promesa de carga
    const loadPromise = new Promise<HTMLImageElement>((resolve, reject) => {
      const img = new Image();
      img.onload = () => {
        this.cache.set(src, img);
        this.loadingPromises.delete(src);
        resolve(img);
      };
      img.onerror = () => {
        this.loadingPromises.delete(src);
        reject(new Error(`Failed to load image: ${src}`));
      };
      img.src = src;
    });

    this.loadingPromises.set(src, loadPromise);
    return loadPromise;
  }

  preloadImages(urls: string[]): Promise<HTMLImageElement[]> {
    return Promise.all(urls.map(url => this.loadImage(url)));
  }

  clearCache(): void {
    this.cache.clear();
    this.loadingPromises.clear();
  }
}

export const imageCache = new ImageCache();

// Hook personalizado para manejar errores de imágenes
export const useImageErrorHandler = () => {
  const handleImageError = (event: Event, fallbackSrc?: string) => {
    const img = event.target as HTMLImageElement;
    if (fallbackSrc && img.src !== fallbackSrc) {
      img.src = fallbackSrc;
    } else {
      // Mostrar placeholder por defecto
      img.style.display = 'none';
      const parent = img.parentElement;
      if (parent) {
        parent.classList.add('image-error');
      }
    }
  };

  return { handleImageError };
}; 