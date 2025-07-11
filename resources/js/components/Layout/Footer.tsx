import React from 'react';
import { Link } from 'react-router-dom';

const Footer: React.FC = () => {
  return (
    <footer className="bg-gray-50 border-t border-gray-200">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {/* Footer Links */}
        <div className="flex flex-wrap justify-center items-center gap-6 md:gap-8 mb-6">
          <Link 
            to="/menu" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            Menu
          </Link>
          <Link 
            to="/locations" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            Locations
          </Link>
          <Link 
            to="/about" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            About Us
          </Link>
          <Link 
            to="/contact" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            Contact
          </Link>
          <Link 
            to="/privacy" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            Privacy Policy
          </Link>
          <Link 
            to="/terms" 
            className="text-gray-600 hover:text-orange-600 transition-colors text-sm"
          >
            Terms of Service
          </Link>
        </div>
        
        {/* Copyright */}
        <div className="text-center">
          <p className="text-gray-500 text-sm">
            © 2024 Casa Jalisco. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer; 