import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  css: {
    postcss: {
      plugins: [tailwindcss()],
    },
  },
  server: {
    host: '0.0.0.0',
    hmr: {
      host: 'localhost',
      protocol: 'ws',
      timeout: 300
    },
    watch: {
      usePolling: true,
      interval: 500,
      followSymlinks: false,
      ignored: ['**/node_modules/**', '**/vendor/**']
    },
    cors: true,
    fs: {
      strict: false
    }
  }
});
