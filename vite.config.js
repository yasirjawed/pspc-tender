import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Input files to bundle
            input: [
                'resources/css/bootstrap.css',  // Bootstrap CSS
                'resources/css/custom-main.css',// Custom styles
                'resources/js/bootstrap.js',    // Bootstrap JS (if used globally)
                'resources/js/jquery.js',       // jQuery JS (if used globally)
            ],
            refresh: true, // Enable hot module replacement (HMR) during development
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return 'vendor';
                    }
                },
            },
        },
    },
});
