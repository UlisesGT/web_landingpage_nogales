import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import App from './App';
import './bootstrap';
import { AuthProvider } from '@/hooks/useAuth';
import { ReviewProvider } from '@/contexts/ReviewContext';

// Configurar el root de React
const root = ReactDOM.createRoot(
  document.getElementById('app') as HTMLElement
);

root.render(
  <React.StrictMode>
    <BrowserRouter>
      <AuthProvider>
        <ReviewProvider>
          <App />
        </ReviewProvider>
      </AuthProvider>
    </BrowserRouter>
  </React.StrictMode>
); 