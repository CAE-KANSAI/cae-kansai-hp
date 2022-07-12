import { defineConfig } from 'vite';
import path from 'path';
import handlebars from 'vite-plugin-handlebars';

/**
 * htmlファイルのモジュール化目的で[handlebars](https://handlebarsjs.com/)を使う
 * - `vite-plugin-handlebars`: Vite向けhandlebarsプラグイン
 */

// https://vitejs.dev/config/
export default defineConfig({
  base: '/',
  plugins: [
    handlebars({
      partialDirectory: path.resolve(__dirname, './src/partials/'),
      context: {
        data: {
          productionRoot: '', //ここは本番ドメインのルートを記載するところ
        },
      },
    }),
  ],
  build: {
    outDir: 'dist/',
    rollupOptions: {
      input: {
        single: path.resolve(__dirname, './single.html'),
      },
    },
  },
  server: {
    host: true,
  },
});
