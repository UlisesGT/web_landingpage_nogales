import React, { useState, useEffect, useRef } from 'react';
import { motion } from 'framer-motion';

interface OptimizedImageProps {
  src: string;
  alt: string;
  className?: string;
  placeholder?: string;
  fallbackSrc?: string;
  loading?: 'lazy' | 'eager';
  sizes?: string;
  onLoad?: () => void;
  onError?: () => void;
  skeletonClassName?: string;
}

const OptimizedImage: React.FC<OptimizedImageProps> = ({
  src,
  alt,
  className = '',
  placeholder,
  fallbackSrc,
  loading = 'lazy',
  sizes,
  onLoad,
  onError,
  skeletonClassName = ''
}) => {
  const [imageLoaded, setImageLoaded] = useState(false);
  const [imageError, setImageError] = useState(false);
  const [inView, setInView] = useState(false);
  const imgRef = useRef<HTMLImageElement>(null);
  const observerRef = useRef<IntersectionObserver | null>(null);

  // Intersection Observer para lazy loading
  useEffect(() => {
    if (loading === 'eager') {
      setInView(true);
      return;
    }

    observerRef.current = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setInView(true);
          observerRef.current?.disconnect();
        }
      },
      {
        rootMargin: '50px', // Comenzar a cargar 50px antes de entrar en vista
        threshold: 0.1
      }
    );

    if (imgRef.current) {
      observerRef.current.observe(imgRef.current);
    }

    return () => {
      observerRef.current?.disconnect();
    };
  }, [loading]);

  const handleImageLoad = () => {
    setImageLoaded(true);
    onLoad?.();
  };

  const handleImageError = () => {
    setImageError(true);
    onError?.();
  };

  // Determinar qué src usar
  const imageSrc = imageError && fallbackSrc ? fallbackSrc : src;

  return (
    <div className={`relative overflow-hidden ${className}`} ref={imgRef}>
      {/* Skeleton Placeholder */}
      {(!imageLoaded || !inView) && (
        <motion.div 
          className={`absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 ${skeletonClassName}`}
          animate={{
            backgroundPosition: ['200% 0', '-200% 0']
          }}
          transition={{
            duration: 1.5,
            repeat: Infinity,
            ease: 'linear'
          }}
          style={{
            backgroundSize: '200% 100%'
          }}
        >
          {/* Skeleton content */}
          <div className="absolute inset-0 flex items-center justify-center">
            <div className="w-12 h-12 bg-gray-300 rounded-full animate-pulse"></div>
          </div>
        </motion.div>
      )}

      {/* Placeholder Image (blur-up) */}
      {placeholder && inView && !imageLoaded && (
        <img
          src={placeholder}
          alt=""
          className="absolute inset-0 w-full h-full object-cover filter blur-sm scale-110 transition-opacity duration-300"
          aria-hidden="true"
        />
      )}

      {/* Main Image */}
      {inView && (
        <motion.img
          src={imageSrc}
          alt={alt}
          sizes={sizes}
          className={`w-full h-full object-cover transition-all duration-500 ${
            imageLoaded ? 'opacity-100' : 'opacity-0'
          }`}
          onLoad={handleImageLoad}
          onError={handleImageError}
          initial={{ scale: 1.1 }}
          animate={{ 
            scale: imageLoaded ? 1 : 1.1,
            opacity: imageLoaded ? 1 : 0
          }}
          transition={{ duration: 0.6, ease: 'easeOut' }}
        />
      )}

      {/* Error State */}
      {imageError && !fallbackSrc && (
        <div className="absolute inset-0 bg-gray-200 flex items-center justify-center">
          <div className="text-center text-gray-500">
            <svg className="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p className="text-sm">Imagen no disponible</p>
          </div>
        </div>
      )}
    </div>
  );
};

export default OptimizedImage; 