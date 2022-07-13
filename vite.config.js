import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    build: {
        manifest: true,

        rollupOptions: {
            input: '/path/to/main.js'
        }
    },

    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});
