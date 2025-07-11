import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import Button from '@/components/UI/Button';

const NotFound: React.FC = () => {
  return (
    <div className="min-h-screen bg-gray-50 flex items-center justify-center px-4 sm:px-6 lg:px-8">
      <motion.div
        className="max-w-md w-full text-center"
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
      >
        <motion.div
          className="mx-auto h-32 w-32 text-orange-500 mb-6"
          animate={{ rotate: 360 }}
          transition={{ duration: 2, repeat: Infinity, ease: "linear" }}
        >
          <svg fill="currentColor" viewBox="0 0 24 24" className="h-full w-full">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </motion.div>
        
        <motion.h1 
          className="text-6xl font-bold text-gray-900 mb-4"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          404
        </motion.h1>
        
        <motion.h2 
          className="text-2xl font-semibold text-gray-700 mb-6"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.4 }}
        >
          Página no encontrada
        </motion.h2>
        
        <motion.p 
          className="text-gray-600 mb-8"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.6 }}
        >
          Lo sentimos, la página que estás buscando no existe. 
          Puede que haya sido movida, eliminada o ingresaste una URL incorrecta.
        </motion.p>
        
        <motion.div
          className="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center"
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.8 }}
        >
          <Link to="/">
            <Button size="lg">
              Volver al Inicio
            </Button>
          </Link>
          <Link to="/menu">
            <Button variant="outline" size="lg">
              Ver Menú
            </Button>
          </Link>
        </motion.div>
      </motion.div>
    </div>
  );
};

export default NotFound; 