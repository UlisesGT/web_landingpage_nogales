import React from 'react';
import { motion } from 'framer-motion';

const PrivacyPolicy: React.FC = () => {
  return (
    <div className="min-h-screen bg-white py-12">
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <motion.div 
          className="text-center mb-12"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
        >
          <h1 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
            Privacy Policy
          </h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Your privacy is important to us. This policy explains how we collect, use, and protect your information.
          </p>
        </motion.div>
        
        <motion.div 
          className="prose prose-lg max-w-none"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
        >
          <div className="bg-white rounded-lg shadow-lg p-8 space-y-6">
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Information We Collect</h2>
              <p className="text-gray-700 leading-relaxed">
                We collect information you provide directly to us, such as when you create an account, make a reservation, 
                place an order, or contact us. This may include your name, email address, phone number, and payment information.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">How We Use Your Information</h2>
              <p className="text-gray-700 leading-relaxed">
                We use the information we collect to provide, maintain, and improve our services, process transactions, 
                send you technical notices and support messages, and respond to your comments and questions.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Information Sharing</h2>
              <p className="text-gray-700 leading-relaxed">
                We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, 
                except as described in this policy or as required by law.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Contact Us</h2>
              <p className="text-gray-700 leading-relaxed">
                If you have any questions about this Privacy Policy, please contact us at info@casajalisco.com.
              </p>
            </section>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default PrivacyPolicy; 