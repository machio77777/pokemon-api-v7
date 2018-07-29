
# Pokémon RestfulAPI By CakePHP3

ポケモン基本情報をJSONレスポンスで返すAPI提供


## 環境構築

```
// CakePHP3インストール(xxxはプロジェクト名)
composer create-project --prefer-dist cakephp/app xxx

// PHPUnitインストール
composer require --dev phpunit/phpunit:"^5.7|^6.0"

// Goutteインストール
composer require fabpot/goutte
```

## スクレイピング

```
・図鑑No
・名前
・属性(1/2)
・特性(1/2/夢)
・種族値(HP/AT/DF/SA/SD/SP)
・技

【参考元】
・ポケモンWiki(https://wiki.xn--rckteqa2e.com/)
・ポケモン徹底攻略(https://yakkun.com/)
```

## その他
- bakeエラー解消
ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
