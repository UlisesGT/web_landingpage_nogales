import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import Button from '@/components/UI/Button';
import OptimizedImage from '@/components/UI/OptimizedImage';
import { useReviews } from '@/contexts/ReviewContext';
import useRestaurantImages from '@/hooks/useRestaurantImages';

const Home: React.FC = () => {
  const { reviews } = useReviews();
  const images = useRestaurantImages();

  // Mostrar solo reseñas aprobadas
  const approvedReviews = reviews.filter(review => review.status === 'approved');

  return (
    <div>
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
            alt="Interior acogedor del restaurante Casa Jalisco con decoración mexicana auténtica"
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
                Welcome to Casa Jalisco
              </motion.h1>
              <motion.p 
                className="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed opacity-90"
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 0.4 }}
              >
                Experience the authentic flavors of Jalisco, Mexico, right here in your neighborhood. From our famous mouthwatering tortas ahogadas, every dish is crafted with passion and tradition.
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
          className="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          Featured Dishes
        </motion.h2>
        
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {/* Birria Tacos */}
          <motion.div 
            className="bg-white rounded-2xl shadow-lg overflow-hidden"
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.2 }}
            whileHover={{ y: -8 }}
          >
            <div className="h-64 relative overflow-hidden">
              <OptimizedImage
                src={images.dishes.birriaTacos.full}
                placeholder={images.dishes.birriaTacos.placeholder}
                fallbackSrc={images.dishes.birriaTacos.fallback}
                alt="Deliciosos tacos de birria con carne jugosa y caldo aromático"
                className="w-full h-full"
                sizes="(max-width: 768px) 100vw, (max-width: 1200px) 33vw, 400px"
              />
              
              {/* Gradient overlay para mejor legibilidad del texto */}
              <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
            <div className="p-6">
              <h3 className="text-xl font-semibold text-dark-gray-900 mb-2">Birria Tacos</h3>
              <p className="text-dark-gray-600 text-sm mb-4">Slow-cooked beef tacos with a rich consommé.</p>
              <div className="flex justify-between items-center">
                <span className="text-2xl font-bold text-orange-600">$15.99</span>
                <Link to="/order-online">
                  <Button size="sm">Order Now</Button>
                </Link>
              </div>
            </div>
          </motion.div>

          {/* Torta Ahogada */}
          <motion.div 
            className="bg-white rounded-2xl shadow-lg overflow-hidden"
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.4 }}
            whileHover={{ y: -8 }}
          >
            <div className="h-64 relative overflow-hidden">
              <OptimizedImage
                src={images.dishes.tortaAhogada.full}
                placeholder={images.dishes.tortaAhogada.placeholder}
                fallbackSrc={images.dishes.tortaAhogada.fallback}
                alt="Auténtica torta ahogada jaliciense bañada en salsa de tomate picante"
                className="w-full h-full"
                sizes="(max-width: 768px) 100vw, (max-width: 1200px) 33vw, 400px"
              />
              
              {/* Gradient overlay */}
              <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
            <div className="p-6">
              <h3 className="text-xl font-semibold text-dark-gray-900 mb-2">Torta Ahogada</h3>
              <p className="text-dark-gray-600 text-sm mb-4">A traditional sandwich drenched in a spicy tomato sauce.</p>
              <div className="flex justify-between items-center">
                <span className="text-2xl font-bold text-orange-600">$12.99</span>
                <Link to="/order-online">
                  <Button size="sm">Order Now</Button>
                </Link>
              </div>
            </div>
          </motion.div>

          {/* Carne Asada */}
          <motion.div 
            className="bg-white rounded-2xl shadow-lg overflow-hidden"
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.6 }}
            whileHover={{ y: -8 }}
          >
            <div className="h-64 relative overflow-hidden">
              <OptimizedImage
                src={images.dishes.carneAsada.full}
                placeholder={images.dishes.carneAsada.placeholder}
                fallbackSrc={images.dishes.carneAsada.fallback}
                alt="Sabrosa carne asada a la parrilla con guarniciones frescas"
                className="w-full h-full"
                sizes="(max-width: 768px) 100vw, (max-width: 1200px) 33vw, 400px"
              />
              
              {/* Gradient overlay */}
              <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
            <div className="p-6">
              <h3 className="text-xl font-semibold text-dark-gray-900 mb-2">Carne Asada</h3>
              <p className="text-dark-gray-600 text-sm mb-4">Grilled marinated beef served with sides.</p>
              <div className="flex justify-between items-center">
                <span className="text-2xl font-bold text-orange-600">$18.99</span>
                <Link to="/order-online">
                  <Button size="sm">Order Now</Button>
                </Link>
              </div>
            </div>
          </motion.div>
        </div>
      </section>

      {/* Customer Reviews Section */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <motion.h2 
          className="text-3xl md:text-4xl font-bold text-dark-gray-900 mb-12"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          What Our Customers Say
        </motion.h2>
        
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {approvedReviews.slice(0, 3).map((review, index) => (
            <motion.div
              key={review.id}
              className="bg-white rounded-xl shadow-lg p-6"
              initial={{ opacity: 0, y: 50 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.8, delay: index * 0.2 }}
            >
              <div className="flex items-center mb-4">
                <div className="flex text-yellow-400">
                  {[...Array(5)].map((_, i) => (
                    <svg
                      key={i}
                      className={`w-5 h-5 ${i < review.rating ? 'fill-current' : 'fill-gray-300'}`}
                      viewBox="0 0 20 20"
                    >
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                  ))}
                </div>
                <span className="ml-2 text-sm text-gray-600">{review.user?.name || 'Anonymous'}</span>
              </div>
              <p className="text-gray-700">{review.comment}</p>
            </motion.div>
          ))}
        </div>
        
        {approvedReviews.length === 0 && (
          <div className="text-center py-12">
            <p className="text-gray-500">No reviews yet. Be the first to leave a review!</p>
          </div>
        )}
      </section>
    </div>
  );
};

export default Home; 