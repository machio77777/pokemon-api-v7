
# Pokémon's API

Rest API for Pokemon 7th Generation.

## Description

Pokemon Rate Provides various kinds of information required for battle.

Provides basic information such as Pokemon's tribal value, remembering technique, characteristic.

We also provide data that matches rate battle, such as breeding data, role subjects, complementary complement.

## environment
- PHP 7.1.19
- CakePHP3.6
- Mac / MAMP

## Initialization

```linux
// CakePHP3
composer create-project --prefer-dist cakephp/app xxx

// Goutte
composer require fabpot/goutte

// PHPUnit
composer require --dev phpunit/phpunit:"^5.7|^6.0"

// monolog
composer require monolog/monolog

// MySQL path
ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
```

## directory

```
pokemon/
    ├ config            - 設定ファイル類
    └ src
        └ Command       - SQLファイル生成コマンド群
        └ Controller    - API
            └ Component - スクレイピング
        └ Model
            └ Entity    - エンティティー
            └ Table     - テーブル
```

## scraping

```php
$uri = 'https://yakkun.com/sm/move_list.htm?c=1';
$crawler = $this->client->request('GET', $uri);
$elements = $crawler->filter('table.center tr td')->each(function($element){
    return $element->text();
});
```

## 参考
- [ポケモン徹底攻略](https://yakkun.com/)
- [ポケモンwiki](https://wiki.xn--rckteqa2e.com/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8)
