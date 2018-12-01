
# Pokémon's API

Rest API for Pokemon 7th Generation.

## Description

Pokemon Rate Provides various kinds of information required for battle.

Provides basic information such as Pokemon's tribal value, remembering technique, characteristic.

We also provide data that matches rate battle, such as breeding data, role subjects, complementary complement.

[Pokémon's API Swagger](https://machio77777.github.io/pokemon-swagger/)

## Install

Initial command for project construction.

```linux
composer create-project --prefer-dist cakephp/app xxx
composer require fabpot/goutte
composer require --dev phpunit/phpunit:"^5.7|^6.0"
composer require monolog/monolog
```

It is a necessary command for me, but it may be unnecessary for some people.

```linux
ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
```

## Directory Structure

```
pokemon/
  ├ config
  ├ sql
  └ src
    ├ Command
    ├ Common
    └ Controller
    │ ├ Api
    │ │ └ Master
    │ └ Component
    └ Model
      ├ Master
      ├ Entity
      └ Table
```

## Reference

- [ポケモン徹底攻略](https://yakkun.com/)
- [ポケモンwiki](https://wiki.xn--rckteqa2e.com/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8)
