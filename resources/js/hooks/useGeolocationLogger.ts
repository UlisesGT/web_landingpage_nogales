import { useEffect } from 'react';
import ApiService from '@/services/ApiService';

export const useGeolocationLogger = () => {
    useEffect(() => {
        const logVisit = (position?: GeolocationPosition) => {
            const data = {
                latitude: position?.coords.latitude,
                longitude: position?.coords.longitude,
            };

            ApiService.post('/visit-log', data).catch(error => {
                console.error('Failed to log visit:', error);
            });
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => logVisit(position),
                () => logVisit() // Si el usuario deniega, se registra solo la IP
            );
        } else {
            logVisit(); // Si el navegador no soporta geolocalización
        }
    }, []);
};
