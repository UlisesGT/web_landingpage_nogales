import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import OptimizedImage from '@/components/UI/OptimizedImage';

interface MenuItem {
  id: number;
  name: string;
  description: string;
  price: number;
  category: string;
  image: string;
  isPopular?: boolean;
}

interface MenuCategory {
  id: number;
  name: string;
  description: string;
  items: MenuItem[];
}

const Menu: React.FC = () => {
  const [selectedCategory, setSelectedCategory] = useState<string>('all');

  const menuCategories: MenuCategory[] = [
    {
      id: 1,
      name: 'Birria',
      description: 'Tradicional birria jalisciense',
      items: [
        {
          id: 1,
          name: 'Birria de Res',
          description: 'Tradicional birria jalisciense con carne de res, servida con cebolla, cilantro y consommé',
          price: 15.99,
          category: 'birria',
          image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?auto=format&fit=crop&w=800&q=80',
          isPopular: true
        },
        {
          id: 2,
          name: 'Quesabirria',
          description: 'Birria con queso oaxaca derretido, servida con consommé para mojar',
          price: 18.99,
          category: 'birria',
          image: 'https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?auto=format&fit=crop&w=800&q=80',
          isPopular: true
        },
        {
          id: 3,
          name: 'Consommé de Birria',
          description: 'Caldo concentrado de birria con carne deshebrada',
          price: 8.99,
          category: 'birria',
          image: 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?auto=format&fit=crop&w=800&q=80'
        }
      ]
    },
    {
      id: 2,
      name: 'Tacos',
      description: 'Tacos artesanales',
      items: [
        {
          id: 4,
          name: 'Tacos de Carne Asada',
          description: 'Carne asada con cebolla, cilantro y salsa verde',
          price: 12.99,
          category: 'tacos',
          image: 'https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?auto=format&fit=crop&w=800&q=80',
          isPopular: true
        },
        {
          id: 5,
          name: 'Tacos de Carnitas',
          description: 'Carnitas de cerdo con cebolla morada y salsa roja',
          price: 11.99,
          category: 'tacos',
          image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?auto=format&fit=crop&w=800&q=80'
        },
        {
          id: 6,
          name: 'Tacos de Pollo',
          description: 'Pollo marinado con especias y vegetales asados',
          price: 10.99,
          category: 'tacos',
          image: 'https://images.unsplash.com/photo-1613514785940-daed07799d9b?auto=format&fit=crop&w=800&q=80'
        }
      ]
    },
    {
      id: 3,
      name: 'Tortas',
      description: 'Tortas tradicionales',
      items: [
        {
          id: 7,
          name: 'Torta Ahogada',
          description: 'Torta tradicional ahogada en salsa de jitomate picante',
          price: 12.99,
          category: 'tortas',
          image: 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?auto=format&fit=crop&w=800&q=80',
          isPopular: true
        },
        {
          id: 8,
          name: 'Torta de Carnitas',
          description: 'Torta con carnitas, frijoles, aguacate y verduras',
          price: 11.99,
          category: 'tortas',
          image: 'https://images.unsplash.com/photo-1613514785940-daed07799d9b?auto=format&fit=crop&w=800&q=80'
        }
      ]
    },
    {
      id: 4,
      name: 'Bebidas',
      description: 'Bebidas tradicionales',
      items: [
        {
          id: 9,
          name: 'Agua de Horchata',
          description: 'Refrescante agua de horchata con canela',
          price: 3.99,
          category: 'bebidas',
          image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=800&q=80'
        },
        {
          id: 10,
          name: 'Agua de Jamaica',
          description: 'Agua fresca de jamaica natural',
          price: 3.99,
          category: 'bebidas',
          image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=800&q=80'
        }
      ]
    }
  ];

  const categories = [
    { id: 'all', name: 'Todos', count: menuCategories.reduce((acc, cat) => acc + cat.items.length, 0) },
    { id: 'birria', name: 'Birria', count: menuCategories.find(cat => cat.name === 'Birria')?.items.length || 0 },
    { id: 'tacos', name: 'Tacos', count: menuCategories.find(cat => cat.name === 'Tacos')?.items.length || 0 },
    { id: 'tortas', name: 'Tortas', count: menuCategories.find(cat => cat.name === 'Tortas')?.items.length || 0 },
    { id: 'bebidas', name: 'Bebidas', count: menuCategories.find(cat => cat.name === 'Bebidas')?.items.length || 0 }
  ];

  const filteredItems = selectedCategory === 'all' 
    ? menuCategories.flatMap(cat => cat.items)
    : menuCategories.find(cat => cat.name.toLowerCase() === selectedCategory)?.items || [];

  return (
    <div className="min-h-screen bg-gray-50 py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          className="text-center mb-16"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          <h1 className="text-4xl md:text-6xl font-bold text-dark-gray-900 mb-6">
            Nuestro Menú
          </h1>
          <p className="text-lg md:text-xl text-dark-gray-600 max-w-3xl mx-auto leading-relaxed">
            Descubre los auténticos sabores de Jalisco con nuestras recetas tradicionales preparadas con ingredientes frescos y el amor de siempre.
          </p>
        </motion.div>

        {/* Categories Filter */}
        <motion.div
          className="mb-12"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.2 }}
        >
          <div className="flex flex-wrap justify-center gap-4">
            {categories.map((category) => (
              <button
                key={category.id}
                onClick={() => setSelectedCategory(category.id)}
                className={`px-6 py-3 rounded-full font-medium transition-all duration-300 ${
                  selectedCategory === category.id
                    ? 'bg-orange-500 text-white shadow-lg'
                    : 'bg-white text-dark-gray-600 hover:bg-orange-50 hover:text-orange-500'
                }`}
              >
                {category.name} ({category.count})
              </button>
            ))}
          </div>
        </motion.div>

        {/* Menu Items Grid */}
        <motion.div
          className="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.6, delay: 0.4 }}
        >
          {filteredItems.map((item, index) => (
            <motion.div
              key={item.id}
              className="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
              initial={{ opacity: 0, y: 30 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
            >
              <div className="relative">
                <OptimizedImage
                  src={item.image}
                  alt={item.name}
                  className="w-full h-48 object-cover"
                />
                {item.isPopular && (
                  <div className="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                    Popular
                  </div>
                )}
              </div>
              <div className="p-6">
                <h3 className="text-xl font-bold text-dark-gray-900 mb-2">
                  {item.name}
                </h3>
                <p className="text-dark-gray-600 mb-4 text-sm leading-relaxed">
                  {item.description}
                </p>
                <div className="flex items-center justify-between">
                  <span className="text-2xl font-bold text-orange-500">
                    ${item.price.toFixed(2)}
                  </span>
                  <button className="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Agregar
                  </button>
                </div>
              </div>
            </motion.div>
          ))}
        </motion.div>

        {/* Call to Action */}
        <motion.div
          className="mt-16 text-center"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.6 }}
        >
          <div className="bg-orange-500 text-white py-12 px-8 rounded-lg">
            <h2 className="text-3xl font-bold mb-4">
              ¿Listo para Ordenar?
            </h2>
            <p className="text-xl mb-6 opacity-90">
              Ordena ahora y disfruta de nuestros platillos en la comodidad de tu hogar
            </p>
            <Link
              to="/"
              className="bg-white text-orange-500 hover:bg-gray-100 px-8 py-3 rounded-lg font-bold text-lg transition-colors inline-block"
            >
              Ordenar Ahora
            </Link>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default Menu; 