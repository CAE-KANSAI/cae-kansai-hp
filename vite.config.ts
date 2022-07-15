import { defineConfig } from 'vite';
import path from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  root: './src',
  build: {
    outDir: '../dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        home: path.resolve(__dirname, './src/index.html'),
      },
    },
  },
  server: {
    host: true,
  },
});
