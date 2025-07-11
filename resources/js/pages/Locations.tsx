import React from 'react';
import { motion } from 'framer-motion';

const Locations: React.FC = () => {
  return (
    <div className="min-h-screen bg-white py-12">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <motion.div 
          className="text-center"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          <h1 className="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
            Our Locations
          </h1>
          <p className="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Visit us at our authentic Casa Jalisco locations.
          </p>
        </motion.div>
        
        <motion.div 
          className="mt-16 grid grid-cols-1 md:grid-cols-2 gap-8"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          <div className="bg-white rounded-lg shadow-lg p-8">
            <h2 className="text-2xl font-bold text-gray-900 mb-4">
              Main Location
            </h2>
            <div className="space-y-2 text-gray-600">
              <p>📍 123 Main Street, Jalisco City, JA 12345</p>
              <p>📞 (555) 123-4567</p>
              <p>🕒 Mon-Sun: 10:00 AM - 10:00 PM</p>
            </div>
          </div>
          
          <div className="bg-white rounded-lg shadow-lg p-8">
            <h2 className="text-2xl font-bold text-gray-900 mb-4">
              Coming Soon
            </h2>
            <div className="space-y-2 text-gray-600">
              <p>🏗️ Second location opening soon</p>
              <p>📧 info@casajalisco.com for updates</p>
              <p>🔔 Follow us on social media</p>
            </div>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default Locations; 