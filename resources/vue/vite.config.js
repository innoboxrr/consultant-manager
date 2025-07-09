import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [vue()],
    resolve: {
        alias: {
            '@consultantManager': path.resolve(__dirname, './'),
            '@consultantManagerComponents': path.resolve(__dirname, './src/components'),
            '@consultantManagerModels': path.resolve(__dirname, './src/models'),
            '@consultantManagerPages': path.resolve(__dirname, './src/pages'),
            '@consultantManagerStore': path.resolve(__dirname, './src/store'),
        },
    },
});
