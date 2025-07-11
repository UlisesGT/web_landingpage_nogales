import { useMemo } from 'react';

interface ImageSet {
  full: string;
  placeholder: string;
  fallback: string;
}

interface RestaurantImages {
  hero: ImageSet;
  dishes: {
    birriaTacos: ImageSet;
    tortaAhogada: ImageSet;
    carneAsada: ImageSet;
  };
}

const useRestaurantImages = (): RestaurantImages => {
  const images = useMemo(() => {
    // URLs específicas de imágenes de comida mexicana auténtica
    const unsplashBase = 'https://images.unsplash.com';
    const pixabayBase = 'https://cdn.pixabay.com/photo';
    
    return {
      hero: {
        // Interior de restaurante mexicano acogedor con decoración auténtica
        full: `${unsplashBase}/1600x900/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&q=80&w=1600&h=900&fit=crop`,
        placeholder: `${unsplashBase}/400x225/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&q=30&blur=10&w=400&h=225&fit=crop`,
        fallback: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwMCIgaGVpZ2h0PSI2MDAiIHZpZXdCb3g9IjAgMCAxMDAwIDYwMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjEwMDAiIGhlaWdodD0iNjAwIiBmaWxsPSIjMzc0MTUxIi8+CjxyZWN0IHg9IjEwMCIgeT0iMzAwIiB3aWR0aD0iODAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI2Y5NzMxNiIgcng9IjIwIi8+CjxjaXJjbGUgY3g9IjUwMCIgY3k9IjE1MCIgcj0iNDAiIGZpbGw9IiNmYmJmMjQiLz4KPC9zdmc+'
      },
      dishes: {
        birriaTacos: {
          // Tacos de birria con consommé auténticos
          full: `${unsplashBase}/800x600/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&q=85&w=800&h=600&fit=crop`,
          placeholder: `${unsplashBase}/200x150/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&q=30&blur=10&w=200&h=150&fit=crop`,
          fallback: `${pixabayBase}/2020/06/08/10/34/tacos-5275401_1280.jpg`
        },
        tortaAhogada: {
          // Torta ahogada tradicional con salsa roja
          full: `${unsplashBase}/800x600/photo-1551504734-5ee1c4a1479b?ixlib=rb-4.0.3&q=85&w=800&h=600&fit=crop`,
          placeholder: `${unsplashBase}/200x150/photo-1551504734-5ee1c4a1479b?ixlib=rb-4.0.3&q=30&blur=10&w=200&h=150&fit=crop`,
          fallback: `${pixabayBase}/2018/09/13/19/17/sandwich-3674854_1280.jpg`
        },
        carneAsada: {
          // Carne asada a la parrilla con guarniciones
          full: `${unsplashBase}/800x600/photo-1529042410759-befb1204b468?ixlib=rb-4.0.3&q=85&w=800&h=600&fit=crop`,
          placeholder: `${unsplashBase}/200x150/photo-1529042410759-befb1204b468?ixlib=rb-4.0.3&q=30&blur=10&w=200&h=150&fit=crop`,
          fallback: `${pixabayBase}/2017/08/12/21/30/grilled-2636375_1280.jpg`
        }
      }
    };
  }, []);

  return images;
};

export default useRestaurantImages; 