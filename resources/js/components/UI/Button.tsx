import React from 'react';
import { ButtonProps } from '@/types';
import { motion } from 'framer-motion';
import clsx from 'clsx';

const Button: React.FC<ButtonProps> = ({
  children,
  variant = 'primary',
  size = 'md',
  disabled = false,
  loading = false,
  onClick,
  type = 'button',
  className,
  ...props
}) => {
  const baseClasses = 'inline-flex items-center justify-center rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
  
  const variantClasses = {
    primary: 'bg-orange-500 hover:bg-orange-600 text-white focus:ring-orange-500',
    secondary: 'bg-gray-200 hover:bg-gray-300 text-gray-800 focus:ring-gray-500',
    outline: 'border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white focus:ring-orange-500',
    ghost: 'text-orange-500 hover:bg-orange-50 focus:ring-orange-500',
  };
  
  const sizeClasses = {
    sm: 'px-3 py-1.5 text-sm',
    md: 'px-4 py-2 text-base',
    lg: 'px-6 py-3 text-lg',
  };
  
  const disabledClasses = 'opacity-50 cursor-not-allowed';
  
  const classes = clsx(
    baseClasses,
    variantClasses[variant],
    sizeClasses[size],
    disabled && disabledClasses,
    className
  );
  
  return (
    <motion.button
      type={type}
      className={classes}
      onClick={onClick}
      disabled={disabled || loading}
      whileHover={{ scale: disabled ? 1 : 1.05 }}
      whileTap={{ scale: disabled ? 1 : 0.95 }}
      {...props}
    >
      {loading && (
        <svg className="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      )}
      {children}
    </motion.button>
  );
};

export default Button; 