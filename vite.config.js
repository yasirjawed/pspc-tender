import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            // Input files to bundle
            input: [
                "resources/css/bootstrap.css",
                "resources/css/custom-main.css",
                "resources/js/bootstrap.js",
                "resources/js/jquery.js",
                "resources/js/custom.js",
            ],
            refresh: true,
        }),
    ],
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
