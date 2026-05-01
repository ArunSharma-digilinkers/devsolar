import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',  // ✅ your main SCSS
                'resources/css/app.css',    // ✅ optional if you need both
                'resources/js/app.js',      // ✅ JavaScript
            ],
        }),
    ],
});
