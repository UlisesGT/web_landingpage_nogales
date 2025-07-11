import axios from 'axios';

// Configurar Axios
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Configurar CSRF token
const token = document.head.querySelector('meta[name="csrf-token"]') as HTMLMetaElement;

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found');
}

// Configurar base URL
axios.defaults.baseURL = '/api';

// Interceptor para manejo de errores global
axios.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            // Manejar logout automático
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);

export default axios; 