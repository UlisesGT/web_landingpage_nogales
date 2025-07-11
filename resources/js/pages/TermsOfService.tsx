import React from 'react';
import { motion } from 'framer-motion';

const TermsOfService: React.FC = () => {
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
            Terms of Service
          </h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            These terms govern your use of our services. Please read them carefully.
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
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Acceptance of Terms</h2>
              <p className="text-gray-700 leading-relaxed">
                By accessing and using Casa Jalisco's services, you accept and agree to be bound by the terms and provision of this agreement.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Use of Services</h2>
              <p className="text-gray-700 leading-relaxed">
                You may use our services for lawful purposes only. You agree not to use the services in any way that violates 
                any applicable federal, state, local, or international law or regulation.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Orders and Payment</h2>
              <p className="text-gray-700 leading-relaxed">
                All orders are subject to availability and confirmation. We reserve the right to limit quantities and refuse service. 
                Payment is due at the time of order unless otherwise agreed upon.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Cancellation Policy</h2>
              <p className="text-gray-700 leading-relaxed">
                Orders may be cancelled up to 30 minutes after placement. Cancellations after this time may be subject to charges.
              </p>
            </section>
            
            <section>
              <h2 className="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
              <p className="text-gray-700 leading-relaxed">
                For questions regarding these terms, please contact us at info@casajalisco.com or (555) 123-4567.
              </p>
            </section>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default TermsOfService; 