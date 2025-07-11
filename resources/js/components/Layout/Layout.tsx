import React from 'react';
import { ComponentProps } from '@/types';
import Header from './Header';
import Footer from './Footer';

interface LayoutProps extends ComponentProps {}

const Layout: React.FC<LayoutProps> = ({ children }) => {
  return (
    <div className="font-body bg-crema-50 text-gray-800 antialiased">
      <Header />
      <main className="min-h-screen">
        {children}
      </main>
      <Footer />
    </div>
  );
};

export default Layout; 