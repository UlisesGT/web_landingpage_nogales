import React, { createContext, useContext, useState, useEffect } from 'react';
import { User, AuthState } from '@/types';
import axios from '@/services/api';

interface AuthContextType extends AuthState {
  login: (email: string, password: string, remember?: boolean) => Promise<void>;
  logout: () => Promise<void>;
  register: (name: string, email: string, password: string, password_confirmation: string) => Promise<void>;
  checkAuth: () => Promise<void>;
}

const AuthContext = createContext<AuthContextType | undefined>(undefined);

export const useAuth = () => {
  const context = useContext(AuthContext);
  if (!context) {
    throw new Error('useAuth must be used within an AuthProvider');
  }
  return context;
};

export const AuthProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const [user, setUser] = useState<User | null>(null);
  const [isAuthenticated, setIsAuthenticated] = useState(false);
  const [isLoading, setIsLoading] = useState(true);

  const checkAuth = async () => {
    try {
      const response = await axios.get('/user');
      setUser(response.data);
      setIsAuthenticated(true);
    } catch (error) {
      setUser(null);
      setIsAuthenticated(false);
    } finally {
      setIsLoading(false);
    }
  };

  const login = async (email: string, password: string, remember: boolean = false) => {
    try {
      const response = await axios.post('/login', { email, password, remember });
      setUser(response.data.user);
      setIsAuthenticated(true);
      return response.data;
    } catch (error) {
      throw error;
    }
  };

  const logout = async () => {
    try {
      await axios.post('/logout');
      setUser(null);
      setIsAuthenticated(false);
    } catch (error) {
      console.error('Logout error:', error);
    }
  };

  const register = async (name: string, email: string, password: string, password_confirmation: string) => {
    try {
      const response = await axios.post('/register', {
        name,
        email,
        password,
        password_confirmation,
      });
      setUser(response.data.user);
      setIsAuthenticated(true);
      return response.data;
    } catch (error) {
      throw error;
    }
  };

  useEffect(() => {
    checkAuth();
  }, []);

  const value = {
    user,
    isAuthenticated,
    isLoading,
    login,
    logout,
    register,
    checkAuth,
  };

  return (
    <AuthContext.Provider value={value}>
      {children}
    </AuthContext.Provider>
  );
}; 