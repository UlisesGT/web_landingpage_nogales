import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import Button from '@/components/UI/Button';
import OptimizedImage from '@/components/UI/OptimizedImage';
import useRestaurantImages from '@/hooks/useRestaurantImages';

const OrderOnline: React.FC = () => {
  const images = useRestaurantImages();

  // Datos de los platos destacados
  const featuredDishes = [
    {
      id: 1,
      name: "Tacos",
      description: "Slow-cooked beef tacos with consommé",
      image: images.dishes.birriaTacos,
      price: "$15.99"
    },
    {
      id: 2,
      name: "Lonches",
      description: "Drowned sandwich with spicy tomato sauce",
      image: images.dishes.tortaAhogada,
      price: "$12.99"
    },
    {
      id: 3,
      name: "Gorditas",
      description: "Grilled marinated beef with sides",
      image: images.dishes.carneAsada,
      price: "$18.99"
    }
  ];

  // Datos de las categorías del menú
  const menuCategories = [
    {
      id: 1,
      name: "Birria",
      image: {
        full: "https://images.unsplash.com/400x300/photo-1508737804141-4c3b688e2546?ixlib=rb-4.0.3&q=85&w=400&h=300&fit=crop",
        placeholder: "https://images.unsplash.com/100x75/photo-1508737804141-4c3b688e2546?ixlib=rb-4.0.3&q=30&blur=10&w=100&h=75&fit=crop",
        fallback: "https://cdn.pixabay.com/photo/2020/06/08/10/34/tacos-5275401_640.jpg"
      },
      link: "/menu/birria"
    },
    {
      id: 2,
      name: "Tacos",
      image: {
        full: "https://images.unsplash.com/400x300/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&q=85&w=400&h=300&fit=crop",
        placeholder: "https://images.unsplash.com/100x75/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&q=30&blur=10&w=100&h=75&fit=crop",
        fallback: "https://cdn.pixabay.com/photo/2017/06/29/20/09/mexican-2456038_640.jpg"
      },
      link: "/menu/tacos"
    },
    {
      id: 3,
      name: "Tortas",
      image: {
        full: "https://images.unsplash.com/400x300/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&q=85&w=400&h=300&fit=crop",
        placeholder: "https://images.unsplash.com/100x75/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&q=30&blur=10&w=100&h=75&fit=crop",
        fallback: "https://cdn.pixabay.com/photo/2018/09/13/19/17/sandwich-3674854_640.jpg"
      },
      link: "/menu/tortas"
    },
    {
      id: 4,
      name: "Drinks",
      image: {
        full: "https://images.unsplash.com/400x300/photo-1544145945-f90425340c7e?ixlib=rb-4.0.3&q=85&w=400&h=300&fit=crop",
        placeholder: "https://images.unsplash.com/100x75/photo-1544145945-f90425340c7e?ixlib=rb-4.0.3&q=30&blur=10&w=100&h=75&fit=crop",
        fallback: "https://cdn.pixabay.com/photo/2017/06/06/22/37/drink-2378454_640.jpg"
      },
      link: "/menu/drinks"
    },
    {
      id: 5,
      name: "Sides",
      image: {
        full: "https://images.unsplash.com/400x300/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&q=85&w=400&h=300&fit=crop",
        placeholder: "https://images.unsplash.com/100x75/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&q=30&blur=10&w=100&h=75&fit=crop",
        fallback: "https://cdn.pixabay.com/photo/2017/12/10/14/47/pizza-3010062_640.jpg"
      },
      link: "/menu/sides"
    }
  ];

  return (
    <div className="min-h-screen bg-white">
      {/* Hero Section */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <motion.div 
          className="relative bg-gray-100 rounded-2xl overflow-hidden h-96 md:h-[500px]"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          {/* Hero Background Image */}
          <OptimizedImage
            src={images.hero.full}
            placeholder={images.hero.placeholder}
            fallbackSrc={images.hero.fallback}
            alt="Elegant interior of Casa Jalisco restaurant with warm lighting and traditional Mexican decor"
            className="absolute inset-0 w-full h-full"
            loading="eager"
            sizes="(max-width: 768px) 100vw, (max-width: 1200px) 90vw, 1200px"
          />
          
          {/* Overlay */}
          <div className="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/50"></div>
          
          {/* Hero Content */}
          <div className="relative z-10 flex items-center justify-center h-full text-center text-white px-6">
            <div className="max-w-4xl">
              <motion.h1 
                className="text-4xl md:text-6xl font-bold mb-6"
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 0.2 }}
              >
                Order Online
              </motion.h1>
              <motion.p 
                className="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90"
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 0.4 }}
              >
                Enjoy the authentic flavors of Jalisco from the comfort of your home.
              </motion.p>
              <motion.div
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 0.6 }}
              >
                <Link to="/menu">
                  <Button size="lg" className="text-lg px-8 py-3">
                    View Menu
                  </Button>
                </Link>
              </motion.div>
            </div>
          </div>
        </motion.div>
      </section>

      {/* Featured Dishes Section */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <motion.h2 
          className="text-3xl md:text-4xl font-bold text-gray-900 mb-12"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          Featured Dishes
        </motion.h2>
        
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {featuredDishes.map((dish, index) => (
            <motion.div 
              key={dish.id}
              className="bg-white rounded-2xl shadow-lg overflow-hidden dish-card"
              initial={{ opacity: 0, y: 50 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.8, delay: index * 0.2 }}
              whileHover={{ y: -8 }}
            >
              <div className="h-64 relative overflow-hidden">
                <OptimizedImage
                  src={dish.image.full}
                  placeholder={dish.image.placeholder}
                  fallbackSrc={dish.image.fallback}
                  alt={`Delicious ${dish.name} - ${dish.description}`}
                  className="w-full h-full"
                  sizes="(max-width: 768px) 100vw, (max-width: 1200px) 33vw, 400px"
                />
                
                {/* Gradient overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
              </div>
              <div className="p-6">
                <h3 className="text-xl font-semibold text-gray-900 mb-2">{dish.name}</h3>
                <p className="text-gray-600 text-sm mb-4">{dish.description}</p>
                <div className="flex justify-between items-center">
                  <span className="text-2xl font-bold text-orange-600">{dish.price}</span>
                  <Link to="/order-online">
                    <Button size="sm">Order Now</Button>
                  </Link>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </section>

      {/* Menu Categories Section */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <motion.h2 
          className="text-3xl md:text-4xl font-bold text-gray-900 mb-12"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          Menu Categories
        </motion.h2>
        
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
          {menuCategories.map((category, index) => (
            <motion.div 
              key={category.id}
              className="group cursor-pointer"
              initial={{ opacity: 0, y: 50 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.8, delay: index * 0.1 }}
              whileHover={{ y: -4 }}
            >
              <Link to={category.link}>
                <div className="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 group-hover:shadow-xl border border-gray-100">
                  <div className="aspect-square relative overflow-hidden">
                    <OptimizedImage
                      src={category.image.full}
                      placeholder={category.image.placeholder}
                      fallbackSrc={category.image.fallback}
                      alt={`${category.name} category - Traditional Mexican cuisine`}
                      className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                      sizes="(max-width: 768px) 50vw, (max-width: 1200px) 20vw, 240px"
                    />
                    
                    {/* Gradient overlay */}
                    <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                    
                    {/* Category Name */}
                    <div className="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                      <h3 className="text-base md:text-lg font-semibold text-white text-center drop-shadow-lg">
                        {category.name}
                      </h3>
                    </div>
                  </div>
                </div>
              </Link>
            </motion.div>
          ))}
        </div>
      </section>

      {/* Our Story Section */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <motion.div 
          className="bg-gray-50 rounded-2xl p-8 md:p-12"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          <motion.h2 
            className="text-3xl md:text-4xl font-bold text-gray-900 mb-6"
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.2 }}
          >
            Our Story
          </motion.h2>
          
          <motion.p 
            className="text-lg text-gray-700 leading-relaxed mb-8"
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.4 }}
          >
            Casa Jalisco is a family-owned restaurant dedicated to bringing the rich culinary traditions of Jalisco to your table. Our 
            recipes have been passed down through generations, ensuring an authentic and unforgettable dining experience. From our 
            signature birria to our mouth-watering tortas ahogadas, each dish is prepared with the freshest ingredients and a whole lot 
            of love.
          </motion.p>
          
          <motion.div 
            className="text-center"
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.6 }}
          >
            <Link to="/about">
              <Button variant="secondary" size="lg" className="px-8 py-3">
                Learn More
              </Button>
            </Link>
          </motion.div>
        </motion.div>
      </section>
    </div>
  );
};

export default OrderOnline; 