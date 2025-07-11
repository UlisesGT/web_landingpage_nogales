import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import Button from '@/components/UI/Button';
import Input from '@/components/UI/Input';

const ForgotPassword: React.FC = () => {
  const [email, setEmail] = useState('');
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState('');

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    
    // Simular envío de email
    setTimeout(() => {
      setMessage('Se ha enviado un enlace de recuperación a tu email');
      setLoading(false);
    }, 2000);
  };

  return (
    <div className="min-h-screen bg-gray-50 flex items-center justify-center px-4 sm:px-6 lg:px-8">
      <motion.div
        className="max-w-md w-full space-y-8"
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
      >
        <div>
          <div className="flex justify-center">
            <div className="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
              <svg className="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.1 13.34l2.83-2.83L3.91 3.5c-1.56 1.56-1.56 4.09 0 5.66l4.19 4.18zm6.78-1.81c1.53.71 3.68.21 5.27-1.38 1.91-1.91 2.28-4.65.81-6.12-1.46-1.46-4.20-1.10-6.12.81-1.59 1.59-2.09 3.74-1.38 5.27L3.7 19.87l1.41 1.41L12 14.41l6.88 6.88 1.41-1.41L13.41 13l1.47-1.47z"/>
              </svg>
            </div>
          </div>
          <h2 className="mt-6 text-center text-3xl font-bold text-gray-900">
            Recuperar Contraseña
          </h2>
          <p className="mt-2 text-center text-sm text-gray-600">
            Ingresa tu email para recibir un enlace de recuperación
          </p>
        </div>
        
        <form className="mt-8 space-y-6" onSubmit={handleSubmit}>
          <Input
            label="Correo Electrónico"
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            required
            placeholder="correo@ejemplo.com"
          />

          {message && (
            <div className="text-green-600 text-sm text-center">{message}</div>
          )}

          <Button
            type="submit"
            className="w-full"
            size="lg"
            loading={loading}
            disabled={loading}
          >
            Enviar Enlace de Recuperación
          </Button>
          
          <div className="text-center">
            <Link to="/login" className="text-sm text-orange-600 hover:text-orange-500">
              Volver al inicio de sesión
            </Link>
          </div>
        </form>
      </motion.div>
    </div>
  );
};

export default ForgotPassword; 