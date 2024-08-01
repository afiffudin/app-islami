import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';
import path from 'path';


console.log('Alias Path:', path.resolve(__dirname, 'resources/js'));
export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    vue(),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
      '@Components': path.resolve(__dirname, 'resources/js/Components'),
      '@Layouts': path.resolve(__dirname, 'resources/js/Layouts'),
    },
  },
});
