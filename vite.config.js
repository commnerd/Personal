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
                'resources/sass/welcome.scss',
                'resources/sass/resume.scss',
                'resources/sass/food.scss',
                'resources/js/food.js',
            ],
            refresh: true,
        }),
    ],
});
