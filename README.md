# CAE 関西

[Vite](https://vitejs.dev/)

```
yarn install
yarn dev
```

## ビルド

```
yarn build
```

## デプロイ

Github Pages で公開します。

### Github Actions で自動的にデプロイする場合

main ブランチが更新されると github actions が自動的に変更をデプロイします。

https://github.com/peaceiris/actions-gh-pages

main ブランチの更新は Pull Request をマージして実施してください。

### 手動で強制的にデプロイする場合

```
git add -f dist
git commit -m "Adding dist"
git subtree push --prefix dist origin gh-pages
```

コマンドで以下を用意してあります。

```
yarn run deploy
```

cname を設定しなおしてください。
