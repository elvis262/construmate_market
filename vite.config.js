import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/toastr.css',
                'resources/js/lib/owlcarousel/assets/owl.carousel.min.css',
                'resources/js/lib/owlcarousel/owl.carousel.min.js',
                'resources/js/lib/easing/easing.min.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),    
    ], resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
