

# Pokémon RestfulAPI By CakePHP3


## 環境構築

```
// CakePHP3インストール(xxxはプロジェクト名)
composer create-project --prefer-dist cakephp/app xxx

// PHPUnitインストール
composer require --dev phpunit/phpunit:"^5.7|^6.0"

// Goutteインストール
composer require fabpot/goutte
```

## テーブル

```
[名称] pokemons
[概要] ポケモンの基本データ
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|図鑑No|zukan_no|INT(5)|Yes||
|3|名前|name|VARCHAR(20)|||
|4|属性1|type_id1|INT(4)|||
|5|属性2|type_id2|INT(4)|||
|6|特性1|quality_id1|INT(4)|||
|7|特性2|quality_id2|INT(4)|||
|8|夢特性|dream_quality_id|INT(4)|||
|9|HP|hp|INT(4)|||
|10|AT|at|INT(4)|||
|11|DF|df|INT(4)|||
|12|SA|sa|INT(4)|||
|13|SD|sd|INT(4)|||
|14|SP|sp|INT(4)|||
|15|削除FLG|delete_flg|INT(1)|Yes||

```
[名称] types
[概要] ポケモン毎の属性
[データ] ノ/炎/水/電/草/氷/格/毒/地/飛/超/虫/岩/霊/竜/鋼/妖
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|属性ID|type_id|INT(4)|Yes||
|3|属性名1|type_name1|VARCHAR(10)|||
|4|属性名2|type_name2|VARCHAR(10)|||
|5|削除FLG|delete_flg|INT(1)|Yes||

```
[名称] qualities
[概要] ポケモン毎の特性
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|特性ID|quality_id|INT(4)|Yes||
|3|特性名|quality_name|VARCHAR(10)|||
|4|削除FLG|delete_flg|INT(1)|Yes||

```
[名称] skills
[概要] ポケモンの技
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|技ID|skill_id|INT(4)|Yes||
|3|属性ID|type_id|INT(4)|||
|4|威力|power|INT(4)|||
|5|PP|pp|INT(4)|||
|6|分類ID|classification_id|INT(4)|||
|7|命中率|accuracy|INT(4)|||
|8|対象|target|INT(4)|||
|9|効果|effect|VARCHAR(200)|||
|10|Z効果|zeffect|VARCHAR(200)|||
|11|直接攻撃|direct_attack|INT(1)|||
|12|マジックコート|magic_coat|INT(1)|||
|13|オウムがえし|omugaeshi|INT(1)|||
|14|よこどり|yokodori|INT(1)|||
|15|みがわり貫通|migawarikantsu|INT(1)|||
|16|削除FLG|delete_flg|INT(1)|Yes||

```
[名称] tricks
[概要] ポケモン別の覚える技
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|図鑑no|zukan_no|INT(5)|||
|3|技ID|skill_id|INT(4)|||
|4|削除FLG|delete_flg|INT(1)|Yes||

```
[名称] typematrix
[概要] 属性別の相性
```
|ID|論理名|物理名|属性(桁数)|Not Null(PK)|Extra|
|---|-----|-----|----|------------|-----|
|1|id|id|INT(11)|Yes(PK)|auto_increment|
|2|属性ID|type_id|INT(4)|||
|3|対象属性ID|target_type_id|INT(4)|||
|4|相性フラグ|aisho_flg|INT(1)|||
|5|削除FLG|delete_flg|INT(1)|YES||
