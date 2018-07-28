
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
・ポケモン基本情報(図鑑No/名前/属性1/属性2/特性1/特性2/夢特性/HP/AT/DF/SA/SD/SP)
・特性
・技
・ポケモン毎の覚える技

[参考元]
・ポケモンWiki(https://wiki.xn--rckteqa2e.com/)
・ポケモン徹底攻略(https://yakkun.com/)
```