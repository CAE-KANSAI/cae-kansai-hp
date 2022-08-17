import path from 'path';
import { defineConfig } from 'vite';

// https://vitejs.dev/config/
export default defineConfig({
  base: '/cae-kansai-hp/', // 一旦githubに上げるためbase pathを設定
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
