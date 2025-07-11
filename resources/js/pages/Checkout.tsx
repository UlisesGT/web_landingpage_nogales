import React from 'react';
import { motion } from 'framer-motion';
import { useCart } from '@/contexts/CartContext';

const Checkout: React.FC = () => {
  const { items, total, itemCount } = useCart();

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
            Carrito de Compras
          </h1>
          <p className="text-lg md:text-xl text-dark-gray-600 max-w-3xl mx-auto leading-relaxed">
            Revisa tu pedido antes de continuar con el pago.
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
            <p className="text-gray-600 mb-4">
              Estamos trabajando en nuestro sistema de checkout con React. 
              ¡Pronto podrás finalizar tu compra aquí!
            </p>
            <div className="mt-4 text-center">
              <p className="text-lg text-gray-800">
                Elementos en carrito: <span className="font-bold">{itemCount}</span>
              </p>
              <p className="text-lg text-gray-800">
                Total: <span className="font-bold text-orange-600">${total.toFixed(2)}</span>
              </p>
            </div>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default Checkout; 