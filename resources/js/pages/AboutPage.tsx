import React from 'react';
import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import OptimizedImage from '@/components/UI/OptimizedImage';

const About: React.FC = () => {
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
            Nuestra Historia
          </h1>
          <p className="text-lg md:text-xl text-dark-gray-600 max-w-3xl mx-auto leading-relaxed">
            Descubre la pasión y tradición detrás de cada platillo que servimos en Casa Jalisco
          </p>
        </motion.div>

        {/* Story Section */}
        <motion.div
          className="grid lg:grid-cols-2 gap-12 items-center mb-16"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          <div>
            <h2 className="text-3xl font-bold text-dark-gray-900 mb-6">
              Tradición Familiar desde 1985
            </h2>
            <p className="text-dark-gray-600 mb-6 leading-relaxed">
              Casa Jalisco nació del sueño de la familia Rodríguez de compartir los auténticos sabores de Jalisco con la comunidad de Nogales. Desde nuestros humildes comienzos, hemos mantenido viva la tradición culinaria que nos enseñaron nuestros abuelos.
            </p>
            <p className="text-dark-gray-600 mb-6 leading-relaxed">
              Cada receta que servimos ha sido perfeccionada durante generaciones, utilizando técnicas tradicionales y ingredientes de la más alta calidad. Nuestro compromiso es brindar no solo comida, sino una experiencia que conecte a nuestros clientes con la rica cultura gastronómica de México.
            </p>
            <p className="text-dark-gray-600 leading-relaxed">
              Hoy, con más de 35 años de experiencia, seguimos siendo un negocio familiar que se enorgullece de servir platillos auténticos preparados con amor y dedicación.
            </p>
          </div>
          <div className="relative">
            <OptimizedImage
              src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80"
              alt="Restaurante Casa Jalisco"
              className="w-full h-96 object-cover rounded-lg shadow-lg"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-lg"></div>
          </div>
        </motion.div>

        {/* Values Section */}
        <motion.div
          className="mb-16"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.4 }}
        >
          <h2 className="text-3xl font-bold text-dark-gray-900 text-center mb-12">
            Nuestros Valores
          </h2>
          <div className="grid md:grid-cols-3 gap-8">
            <div className="bg-white rounded-lg shadow-lg p-8 text-center">
              <div className="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
              </div>
              <h3 className="text-xl font-bold text-dark-gray-900 mb-3">Pasión</h3>
              <p className="text-dark-gray-600">
                Cada platillo se prepara con amor y dedicación, manteniendo viva la tradición culinaria de nuestros antepasados.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-8 text-center">
              <div className="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <h3 className="text-xl font-bold text-dark-gray-900 mb-3">Calidad</h3>
              <p className="text-dark-gray-600">
                Utilizamos únicamente ingredientes frescos y de la mejor calidad para garantizar sabores auténticos.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-8 text-center">
              <div className="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              <h3 className="text-xl font-bold text-dark-gray-900 mb-3">Familia</h3>
              <p className="text-dark-gray-600">
                Tratamos a cada cliente como parte de nuestra familia, brindando un servicio cálido y personalizado.
              </p>
            </div>
          </div>
        </motion.div>

        {/* Team Section */}
        <motion.div
          className="mb-16"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.6 }}
        >
          <h2 className="text-3xl font-bold text-dark-gray-900 text-center mb-12">
            Nuestro Equipo
          </h2>
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div className="bg-white rounded-lg shadow-lg p-6 text-center">
              <OptimizedImage
                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=300&q=80"
                alt="Chef Principal"
                className="w-32 h-32 object-cover rounded-full mx-auto mb-4"
              />
              <h3 className="text-xl font-bold text-dark-gray-900 mb-2">
                Chef Miguel Rodríguez
              </h3>
              <p className="text-orange-500 font-medium mb-3">Chef Principal</p>
              <p className="text-dark-gray-600 text-sm">
                Con más de 20 años de experiencia, Miguel es el guardián de nuestras recetas tradicionales.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-6 text-center">
              <OptimizedImage
                src="https://images.unsplash.com/photo-1494790108755-2616b612b786?auto=format&fit=crop&w=300&q=80"
                alt="Gerente General"
                className="w-32 h-32 object-cover rounded-full mx-auto mb-4"
              />
              <h3 className="text-xl font-bold text-dark-gray-900 mb-2">
                María Rodríguez
              </h3>
              <p className="text-orange-500 font-medium mb-3">Gerente General</p>
              <p className="text-dark-gray-600 text-sm">
                María se encarga de que cada visita sea una experiencia memorable para nuestros clientes.
              </p>
            </div>
            <div className="bg-white rounded-lg shadow-lg p-6 text-center">
              <OptimizedImage
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80"
                alt="Sous Chef"
                className="w-32 h-32 object-cover rounded-full mx-auto mb-4"
              />
              <h3 className="text-xl font-bold text-dark-gray-900 mb-2">
                Carlos Mendoza
              </h3>
              <p className="text-orange-500 font-medium mb-3">Sous Chef</p>
              <p className="text-dark-gray-600 text-sm">
                Carlos aporta innovación manteniendo el respeto por las tradiciones culinarias.
              </p>
            </div>
          </div>
        </motion.div>

        {/* Location & Contact CTA */}
        <motion.div
          className="bg-orange-500 text-white py-12 px-8 rounded-lg text-center"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.8 }}
        >
          <h2 className="text-3xl font-bold mb-4">
            ¡Visítanos!
          </h2>
          <p className="text-xl mb-6 opacity-90">
            Ven a conocer nuestro restaurante y disfruta de la auténtica comida jalisciense
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Link
              to="/locations"
              className="bg-white text-orange-500 hover:bg-gray-100 px-8 py-3 rounded-lg font-bold text-lg transition-colors inline-block"
            >
              Ver Ubicaciones
            </Link>
            <Link
              to="/contact"
              className="border-2 border-white text-white hover:bg-white hover:text-orange-500 px-8 py-3 rounded-lg font-bold text-lg transition-colors inline-block"
            >
              Contáctanos
            </Link>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default About; 