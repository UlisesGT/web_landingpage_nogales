import React from 'react';
import { InputProps } from '@/types';
import clsx from 'clsx';

const Input: React.FC<InputProps> = ({
  type = 'text',
  placeholder,
  value,
  name,
  required = false,
  disabled = false,
  error,
  label,
  onChange,
  className,
  ...props
}) => {
  const baseClasses = 'w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition-colors';
  
  const errorClasses = error 
    ? 'border-red-500 focus:border-red-500 focus:ring-red-500' 
    : 'border-gray-300 focus:border-orange-500';
  
  const disabledClasses = disabled 
    ? 'bg-gray-100 cursor-not-allowed' 
    : 'bg-white hover:border-gray-400';
  
  const classes = clsx(
    baseClasses,
    errorClasses,
    disabledClasses,
    className
  );
  
  return (
    <div className="w-full">
      {label && (
        <label className="block text-sm font-medium text-gray-700 mb-1">
          {label}
          {required && <span className="text-red-500 ml-1">*</span>}
        </label>
      )}
      <input
        type={type}
        placeholder={placeholder}
        value={value}
        name={name}
        required={required}
        disabled={disabled}
        onChange={onChange}
        className={classes}
        {...props}
      />
      {error && (
        <p className="mt-1 text-sm text-red-600">{error}</p>
      )}
    </div>
  );
};

export default Input; 