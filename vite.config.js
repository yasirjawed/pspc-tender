import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/fileinput.min.css",
                "resources/js/app.js",
                "resources/js/fileinput.min.js",
                "resources/js/profiling.js",
            ],
            refresh: true,
        }),
    ],
    define: {
        "window.$": "window.jQuery", // For global jQuery usage
        "window.jQuery": "window.jQuery", // Ensure jQuery is available globally
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes("node_modules")) {
                        return "vendor";
                    }
                },
            },
        },
    },
});
