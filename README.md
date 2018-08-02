
# Pokémon RestfulAPI By CakePHP3

ポケモンレーティング対戦で必要になるポケモンの各種マスタAPI提供
- レスポンスはJSON形式で返却
- 必要な情報はGoutteでスクレイピング

## 環境構築

### 前提条件
- composerインストールしてパスを通す
- PHP開発環境導入済み(MAMP等)

```
// CakePHP3インストール(xxxはプロジェクト名)
composer create-project --prefer-dist cakephp/app xxx

// Goutteインストール
composer require fabpot/goutte

// PHPUnitインストール
composer require --dev phpunit/phpunit:"^5.7|^6.0"

// .gitignore
vendor/tmpなどバージョン管理対象でないものを指定

// MAMPでbakeエラーになる場合
ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
```

## ディレクトリ構成

```
pokemon/
     ├ src
        └ Command       - SQLファイル生成コマンド群
        └ Controller    - API
            └ Component - スクレイピング
        └ Model
            └ Entity    - エンティティー
            └ Table     - テーブル
```

## スクレイピング

[ポケモン基本情報]
```
・図鑑No
・名前
・属性
・特性
・種族値(HP/AT/DF/SA/SD/SP)
```

[技情報]
```
・名称
・属性
・威力
・Z威力
・PP
・分類
・命中率
・対象
・効果
・Z効果
・直接攻撃
・マジックガード
・オウムがえし
・まもる
・よこどり
・みがわり貫通
```

[特性情報]
```
・名称
・効果
```