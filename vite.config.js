import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/main.tsx'],
            refresh: true,
        }),
        react({
            jsxRuntime: 'automatic',
            jsxImportSource: 'react',
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@components': '/resources/js/components',
            '@pages': '/resources/js/pages',
            '@hooks': '/resources/js/hooks',
            '@utils': '/resources/js/utils',
            '@services': '/resources/js/services',
            '@types': '/resources/js/types',
        },
    },
});