DROP TABLE IF EXISTS POKEMONS CASCADE;
DROP TABLE IF EXISTS TYPES CASCADE;
DROP TABLE IF EXISTS QUALITIES CASCADE;
DROP TABLE IF EXISTS SKILLS CASCADE;
DROP TABLE IF EXISTS TRICKS CASCADE;
DROP TABLE IF EXISTS TYPEMATRIX CASCADE;
DROP TABLE IF EXISTS PBATTLES CASCADE;
DROP TABLE IF EXISTS ROLETARGETS CASCADE;
DROP TABLE IF EXISTS COMPATIBILITIES CASCADE;

-- ポケモン基本情報
CREATE TABLE POKEMONS (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  zukan_no int(5) NOT NULL COMMENT '図鑑No',
  sub_no int(2) NOT NULL COMMENT 'サブNo',
  name varchar(20) NOT NULL COLLATE utf8mb4_bin COMMENT '名前',
  type_id1 int(4) NOT NULL COMMENT '属性1',
  type_id2 int(4) COMMENT '属性2',
  quality_id1 int(4) COMMENT '特性1',
  quality_id2 int(4) COMMENT '特性2',
  dream_quality_id int(4) COMMENT '夢特性',
  hp int(4) COMMENT '種族値-HP',
  at int(4) COMMENT '種族値-攻撃',
  df int(4) COMMENT '種族値-防御',
  sa int(4) COMMENT '種族値-特攻',
  sd int(4) COMMENT '種族値-特防',
  sp int(4) COMMENT '種族値-素早さ',
  mega_flg int(1) DEFAULT 0 NOT NULL COMMENT 'メガシンカFLG',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT 'ポケモン基本情報';

-- 属性
CREATE TABLE TYPES (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  type_id int(4) NOT NULL COMMENT '属性',
  type_name1 varchar(10) NOT NULL COLLATE utf8mb4_bin COMMENT '属性名-ひらがな',
  type_name2 varchar(10) NOT NULL COLLATE utf8mb4_bin COMMENT '属性名-漢字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '属性';

-- 特性
CREATE TABLE QUALITIES (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  quality_id int(4) NOT NULL COMMENT '特性ID',
  quality_name varchar(10) COLLATE utf8mb4_bin COMMENT '特性名',
  effect varchar(200) COLLATE utf8mb4_bin COMMENT '効果',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '特性';

-- 技
CREATE TABLE SKILLS (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  skill_id int(4) NOT NULL COMMENT '技ID',
  skill_name varchar(30) NOT NULL COLLATE utf8mb4_bin COMMENT '技名',
  type_id int(4) COMMENT '属性ID',
  power int(4) COMMENT '威力',
  zpower int(4) COMMENT 'Z威力',
  pp int(4) COMMENT 'PP',
  classification varchar(10) COMMENT '分類',
  accuracy int(4) COMMENT '命中率',
  target varchar(10) COMMENT '対象',
  effect varchar(500) NOT NULL COLLATE utf8mb4_bin COMMENT '効果',
  direct_attack varchar(10) COMMENT '直接攻撃',
  mamoru varchar(10) COMMENT 'まもる',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '技';

-- ポケモン毎の覚える技
CREATE TABLE TRICKS (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  zukan_no int(5) NOT NULL COMMENT '図鑑No',
  sub_no int(2) NOT NULL COMMENT 'サブNo',
  skill_id int(4) NOT NULL COMMENT '技ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT 'ポケモン毎の覚える技';

-- 属性別相性
CREATE TABLE TYPEMATRIX (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  type_id int(4) NOT NULL COMMENT '属性ID',
  target_type_id int(4) NOT NULL COMMENT '対象属性ID',
  aisho_flg int(1) NOT NULL COMMENT '相性フラグ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '属性別相性';

-- ポケモン対戦用育成済み
CREATE TABLE PBATTLES (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  soldier_id VARCHAR(20) NOT NULL COMMENT '育成ID',
  zukan_no int(5) NOT NULL COMMENT '図鑑No',
  sub_no int(2) NOT NULL COMMENT 'サブNo',
  personality VARCHAR(20) NOT NULL COMMENT '性格',
  quality_id int(4) COMMENT '特性',
  skill_id1 int(4) COMMENT '技1',
  skill_id2 int(4) COMMENT '技2',
  skill_id3 int(4) COMMENT '技3',
  skill_id4 int(4) COMMENT '技4',
  ehp int(4) COMMENT '努力値-HP',
  eat int(4) COMMENT '努力値-攻撃',
  edf int(4) COMMENT '努力値-防御',
  esa int(4) COMMENT '努力値-特攻',
  esd int(4) COMMENT '努力値-特防',
  esp int(4) COMMENT '努力値-素早さ',
  ahp int(4) COMMENT '実数値-HP',
  aat int(4) COMMENT '実数値-攻撃',
  adf int(4) COMMENT '実数値-防御',
  asa int(4) COMMENT '実数値-特攻',
  asd int(4) COMMENT '実数値-特防',
  asp int(4) COMMENT '実数値-素早さ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT 'ポケモン対戦用育成済み';

-- 役割対象
CREATE TABLE ROLETARGETS (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  target_id VARCHAR(20) NOT NULL COMMENT '対象ID',
  zukan_no int(5) NOT NULL COMMENT '図鑑No',
  sub_no int(2) NOT NULL COMMENT 'サブNo',
  target_zukan_no int(5) NOT NULL COMMENT '役割対象図鑑No',
  target_sub_no int(2) NOT NULL COMMENT '役割対象サブNo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '役割対象';

-- 相性補完
CREATE TABLE COMPATIBILITIES (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  support_id int(11) NOT NULL COMMENT '相性補完ID',
  target1_zukan_no int(5) NOT NULL COMMENT '対象1図鑑No',
  target1_sub_no int(2) NOT NULL COMMENT '対象1サブNo',
  target2_zukan_no int(5) NOT NULL COMMENT '対象2図鑑No',
  target2_sub_no int(2) NOT NULL COMMENT '対象2サブNo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT '相性補完';
