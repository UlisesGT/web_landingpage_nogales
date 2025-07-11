import React, { createContext, useContext, useState, useEffect, ReactNode } from 'react';
import ApiService from '@/services/ApiService';

// 1. Definir tipos
interface User {
    id: number;
    name: string;
    email: string;
    // Agrega otros campos de usuario que necesites
}

interface AuthContextType {
    user: User | null;
    isAuthenticated: boolean;
    isLoading: boolean;
    login: (credentials: object) => Promise<void>;
    register: (data: object) => Promise<void>;
    logout: () => Promise<void>;
}

// 2. Crear el Context
const AuthContext = createContext<AuthContextType | undefined>(undefined);

// 3. Crear el Provider
interface AuthProviderProps {
    children: ReactNode;
}

const AuthContextProvider = ({ children }: AuthProviderProps) => {
    const [user, setUser] = useState<User | null>(null);
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        const checkAuthStatus = async () => {
            try {
                const { data } = await ApiService.get('/auth/check');
                if (data.authenticated) {
                    setUser(data.user);
                }
            } catch (error) {
                console.error('Auth check failed', error);
                setUser(null);
            } finally {
                setIsLoading(false);
            }
        };

        checkAuthStatus();
    }, []);

    const login = async (credentials: object) => {
        setIsLoading(true);
        try {
            await ApiService.post('/auth/login', credentials);
            const { data } = await ApiService.get('/auth/check');
            setUser(data.user);
        } catch (error) {
            console.error('Login failed', error);
            throw error;
        } finally {
            setIsLoading(false);
        }
    };

    const register = async (userData: object) => {
        setIsLoading(true);
        try {
            await ApiService.post('/auth/register', userData);
            const { data } = await ApiService.get('/auth/check');
            setUser(data.user);
        } catch (error) {
            console.error('Registration failed', error);
            throw error;
        } finally {
            setIsLoading(false);
        }
    };

    const logout = async () => {
        setIsLoading(true);
        try {
            await ApiService.post('/auth/logout');
            setUser(null);
        } catch (error) {
            console.error('Logout failed', error);
        } finally {
            setIsLoading(false);
        }
    };

    const value = {
        user,
        isAuthenticated: !!user,
        isLoading,
        login,
        register,
        logout,
    };

    return {children};
};

export const AuthProvider = AuthContextProvider;

// 4. Crear el Hook
export const useAuth = () => {
    const context = useContext(AuthContext);
    if (context === undefined) {
        throw new Error('useAuth must be used within an AuthProvider');
    }
    return context;
}; 