import React from 'react';
import { motion } from 'framer-motion';

const Catering: React.FC = () => {
  return (
    <div className="min-h-screen bg-gray-50 py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <motion.div
          className="text-center"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          <h1 className="text-4xl md:text-6xl font-bold text-dark-gray-900 mb-6">
            Categorías
          </h1>
          <p className="text-lg md:text-xl text-dark-gray-600 max-w-3xl mx-auto leading-relaxed">
            Explora nuestras diferentes categorías de platillos auténticos.
          </p>
        </motion.div>
        
        <motion.div
          className="mt-16 text-center"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          <div className="bg-white rounded-lg shadow-lg p-8">
            <h2 className="text-2xl font-bold text-gray-900 mb-4">
              Página en Construcción
            </h2>
            <p className="text-gray-600">
              Estamos trabajando en nuestra página de categorías con React. 
              ¡Pronto estará disponible con una mejor organización!
            </p>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default Catering; 