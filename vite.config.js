import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/web.home.scss',
                'resources/sass/web.resume.scss',
                'resources/sass/web.food.scss',
                'resources/js/food.js',
            ],
            refresh: true,
        }),
    ],
});
