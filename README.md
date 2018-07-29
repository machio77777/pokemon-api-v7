
# Pokémon RestfulAPI By CakePHP3

レーティング対戦で必要なポケモン基本情報のAPI提供
- レスポンスはJSON形式で返却

必要な情報はスクレイピングで取得
- ポケモンWiki(https://wiki.xn--rckteqa2e.com/)
- ポケモン徹底攻略(https://yakkun.com/)

## 環境構築

### 前提条件
- composerインストール済み
- PHP開発環境導入済み(MAMPなど)

```
// CakePHP3インストール(xxxはプロジェクト名)
composer create-project --prefer-dist cakephp/app xxx

// PHPUnitインストール
composer require --dev phpunit/phpunit:"^5.7|^6.0"

// Goutteインストール
composer require fabpot/goutte

// .gitignore
vendor/tmpなどバージョン管理対象でないものを指定

// MAMPでbakeエラーになる場合
ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
```

## RestfulAPI

```
・PokemonsAPI
[GET]DocumentRoot/pokemons/{zukan_no}.json

・SkillsAPI
[GET]DocumentRoot/pokemons/{zukan_no}.json

・QualitiesAPI
[GET]DocumentRoot/qualities/{quality_id}.json
```

## スクレイピング

```
[Pokemons]
- 図鑑No
- 名前
- 属性(1/2)
- 特性(1/2/夢)
- 種族値(HP/AT/DF/SA/SD/SP)

[Skills]
- 技
- 効果

[qualities]
- 特性
- 効果
```
