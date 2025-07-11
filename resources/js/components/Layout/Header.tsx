import React, { useState } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { useAuth } from '@/contexts/AuthContext';
import { useCart } from '@/contexts/CartContext';
import { motion } from 'framer-motion';

const Header: React.FC = () => {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const { user, isAuthenticated, logout } = useAuth();
  const { itemCount } = useCart();
  const location = useLocation();

  const toggleMobileMenu = () => {
    setIsMobileMenuOpen(!isMobileMenuOpen);
  };

  const handleLogout = async () => {
    try {
      await logout();
    } catch (error) {
      console.error('Error logging out:', error);
    }
  };

  const isActive = (path: string) => location.pathname === path;

  return (
    <motion.header 
      className="bg-white shadow-sm sticky top-0 z-50"
      initial={{ y: -100 }}
      animate={{ y: 0 }}
      transition={{ duration: 0.5 }}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-16">
          {/* Logo */}
          <div className="flex items-center">
            <Link to="/" className="flex items-center space-x-2">
              <div className="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                <svg className="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.1 13.34l2.83-2.83L3.91 3.5c-1.56 1.56-1.56 4.09 0 5.66l4.19 4.18zm6.78-1.81c1.53.71 3.68.21 5.27-1.38 1.91-1.91 2.28-4.65.81-6.12-1.46-1.46-4.20-1.10-6.12.81-1.59 1.59-2.09 3.74-1.38 5.27L3.7 19.87l1.41 1.41L12 14.41l6.88 6.88 1.41-1.41L13.41 13l1.47-1.47z"/>
                </svg>
              </div>
              <span className="text-xl font-bold text-dark-gray-900">Casa Jalisco</span>
            </Link>
          </div>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center space-x-8">
            <Link 
              to="/menu" 
              className={`nav-link ${isActive('/menu') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
            >
              Menu
            </Link>
            <Link 
              to="/locations" 
              className={`nav-link ${isActive('/locations') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
            >
              Locations
            </Link>
            <Link 
              to="/about" 
              className={`nav-link ${isActive('/about') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
            >
              About Us
            </Link>
            <Link 
              to="/contact" 
              className={`nav-link ${isActive('/contact') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
            >
              Contact
            </Link>
          </nav>

          {/* Right Side Actions */}
          <div className="hidden md:flex items-center space-x-4">
            <Link 
              to="/order-online" 
              className="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors"
            >
              Order Now
            </Link>
            {isAuthenticated ? (
              <div className="flex items-center space-x-3">
                <span className="text-dark-gray-600">Hello, {user?.name}</span>
                <button 
                  onClick={handleLogout}
                  className="text-dark-gray-600 hover:text-dark-gray-900"
                >
                  Log Out
                </button>
              </div>
            ) : (
              <Link 
                to="/login" 
                className={`nav-link ${isActive('/login') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
              >
                Log In
              </Link>
            )}
          </div>

          {/* Mobile Menu Button */}
          <div className="md:hidden">
            <button 
              type="button" 
              onClick={toggleMobileMenu}
              className="text-dark-gray-500 hover:text-dark-gray-900 focus:outline-none"
            >
              <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        {isMobileMenuOpen && (
          <motion.div 
            className="md:hidden"
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: 'auto' }}
            exit={{ opacity: 0, height: 0 }}
            transition={{ duration: 0.3 }}
          >
            <div className="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
              <Link 
                to="/menu" 
                className={`block px-3 py-2 ${isActive('/menu') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Menu
              </Link>
              <Link 
                to="/locations" 
                className={`block px-3 py-2 ${isActive('/locations') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Locations
              </Link>
              <Link 
                to="/about" 
                className={`block px-3 py-2 ${isActive('/about') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
                onClick={() => setIsMobileMenuOpen(false)}
              >
                About Us
              </Link>
              <Link 
                to="/contact" 
                className={`block px-3 py-2 ${isActive('/contact') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Contact
              </Link>
              <Link 
                to="/order-online" 
                className="block px-3 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-medium mx-3 my-2 text-center"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Order Now
              </Link>
              {isAuthenticated ? (
                <div className="px-3 py-2">
                  <span className="block text-dark-gray-600 mb-2">Hello, {user?.name}</span>
                  <button 
                    onClick={handleLogout}
                    className="text-dark-gray-600 hover:text-dark-gray-900"
                  >
                    Log Out
                  </button>
                </div>
              ) : (
                <Link 
                  to="/login" 
                  className={`block px-3 py-2 ${isActive('/login') ? 'text-orange-600' : 'text-dark-gray-600 hover:text-dark-gray-900'}`}
                  onClick={() => setIsMobileMenuOpen(false)}
                >
                  Log In
                </Link>
              )}
            </div>
          </motion.div>
        )}
      </div>
    </motion.header>
  );
};

export default Header; 