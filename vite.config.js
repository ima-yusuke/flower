import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/index.js',
                'resources/js/sortable.js',
                'resources/js/accordion.js',
                'resources/js/nozaki.js',
                'resources/js/createAnswerInp.js',
            ],
            refresh: true,
        }),
    ],
});
