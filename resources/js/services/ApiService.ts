import axios from 'axios';

const ApiService = axios.create({
    baseURL: import.meta.env.VITE_API_URL || '/api',
    withCredentials: true,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
    },
});

ApiService.interceptors.request.use(config => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    if (csrfToken) {
        config.headers['X-CSRF-TOKEN'] = csrfToken;
    }
    return config;
});

export default ApiService;
