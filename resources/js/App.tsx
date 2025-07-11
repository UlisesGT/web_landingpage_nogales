import React, { useState, useEffect } from 'react';
import { Routes, Route, Link } from 'react-router-dom';
import { useAuth } from '@/hooks/useAuth';
import { useGeolocationLogger } from '@/hooks/useGeolocationLogger';

// Importar componentes de página
import HomePage from '@/pages/HomePage';
import MenuPage from '@/pages/MenuPage';
import AboutPage from '@/pages/AboutPage';
import LoginPage from '@/pages/LoginPage';
import NotFoundPage from '@/pages/NotFoundPage';
import BirriaPage from '@/pages/BirriaPage';
import CatenosPage from '@/pages/CatenosPage';
import CateringPage from '@/pages/CateringPage';
import CheckoutPage from '@/pages/CheckoutPage';
import ComidaJalisciensePage from '@/pages/ComidaJalisciensePage';
import ForgotPasswordPage from '@/pages/ForgotPasswordPage';
import OrderOnlinePage from '@/pages/OrderOnlinePage';
import ResetPasswordPage from '@/pages/ResetPasswordPage';
import SopesPage from '@/pages/SopesPage';

// --- Componente de Banner de Cookies ---
const CookieBanner = () => {
    const [isVisible, setIsVisible] = useState(false);

    useEffect(() => {
        const consent = localStorage.getItem('cookie_consent');
        if (!consent) {
            setIsVisible(true);
        }
    }, []);

    const handleAccept = () => {
        localStorage.setItem('cookie_consent', 'true');
        setIsVisible(false);
    };

    if (!isVisible) {
        return null;
    }

    return (
        <div className="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 flex justify-between items-center z-50">
            <p className="text-sm">Utilizamos cookies para mejorar tu experiencia. Al continuar, aceptas nuestro uso de cookies.</p>
            <button 
                onClick={handleAccept}
                className="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded"
            >
                Aceptar
            </button>
        </div>
    );
};

// --- Componente Principal de la App ---
const App = () => {
    // Hooks
    useGeolocationLogger(); // Registra la visita al cargar la app
    const { isAuthenticated, user, logout, isLoading } = useAuth();

    return (
        <div className="font-sans text-gray-800 antialiased">
            <header className="bg-white shadow-sm">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-16">
                        <Link to="/" className="text-xl font-bold">Tacos Gorditas Nogales</Link>
                        <nav className="flex items-center space-x-4">
                            <Link to="/menu" className="hover:text-orange-500">Menú</Link>
                            <Link to="/about" className="hover:text-orange-500">Quiénes Somos</Link>
                            <Link to="/order-online" className="hover:text-orange-500">Pedir Online</Link>
                            <Link to="/catering" className="hover:text-orange-500">Catering</Link>
                            {isLoading ? (
                                <div className="w-20 h-8 bg-gray-200 rounded animate-pulse"></div>
                            ) : isAuthenticated ? (
                                <>
                                    <span>Hola, {user?.name}</span>
                                    <button onClick={logout} className="hover:text-orange-500">Cerrar Sesión</button>
                                </>
                            ) : (
                                <Link to="/login" className="hover:text-orange-500">Iniciar Sesión</Link>
                            )}
                        </nav>
                    </div>
                </div>
            </header>

            <main className="p-8">
                <Routes>
                    <Route path="/" element={<HomePage />} />
                    <Route path="/menu" element={<MenuPage />} />
                    <Route path="/about" element={<AboutPage />} />
                    <Route path="/login" element={<LoginPage />} />
                    <Route path="/forgot-password" element={<ForgotPasswordPage />} />
                    <Route path="/reset-password" element={<ResetPasswordPage />} />
                    <Route path="/birria" element={<BirriaPage />} />
                    <Route path="/sopes" element={<SopesPage />} />
                    <Route path="/comida-jalisciense" element={<ComidaJalisciensePage />} />
                    <Route path="/catering" element={<CateringPage />} />
                    <Route path="/catenos" element={<CatenosPage />} />
                    <Route path="/checkout" element={<CheckoutPage />} />
                    <Route path="/order-online" element={<OrderOnlinePage />} />
                    <Route path="*" element={<NotFoundPage />} />
                </Routes>
            </main>

            <CookieBanner />
        </div>
    );
};

export default App; 