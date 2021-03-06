



CREATE TABLE IF NOT EXISTS heading(
id int(11) NOT NULL AUTO_INCREMENT,
heading_name varchar(255) NULL COMMENT 'Название заголовка перед категорией',
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO heading(id,heading_name)VALUES
(1,'Аксессуары'),
(2,'Запчасти для планшетов'),
(3,'Запчасти для телефонов');




/*location Склад*/

CREATE TABLE IF NOT EXISTS location(
id int(11) NOT NULL AUTO_INCREMENT,
location_name varchar(255) NULL COMMENT 'Название Склада',
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*номенклатура*/

CREATE TABLE IF NOT EXISTS nomenclature (
  nomenclature_id int(11) NOT NULL AUTO_INCREMENT,

  heading TINYINT NOT NULL COMMENT 'Заголовок TINYINT',
  category TINYINT NULL COMMENT 'Категория TINYINT',

  link varchar(255) NOT NULL,

  `model` varchar(255) NULL COMMENT 'Модель',
  `model_short` varchar(64) NULL COMMENT 'Модель коротко',

  `sku` varchar(64) NULL COMMENT 'идентификатор товарной позиции - номенклатурная позиция',
  /*`upc` varchar(12) NULL COMMENT 'универсальный код товара',*/
  `ean` varchar(14) NULL COMMENT 'универсальный код товара Европа',
  `mpn` varchar(64) NULL COMMENT 'Manufacturer Part Number штрихкоды',



  `location` int (11) NULL COMMENT 'место нахождения - склад',

  `stock_status_id` int(11) NULL COMMENT 'идентификатор состояния акций (наценка в %)',

  `image` varchar(255) NULL,
  `manufacturer_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Производитель',
  short_text text,

  markup smallint NULL COMMENT 'Наценка в %',

  `weight` int NOT NULL DEFAULT '0' COMMENT 'Вес',
  weigtt_units_id smallint DEFAULT '1' COMMENT 'Единицы измерения веса',/*грамм,килограмм*/


  `length` INT NOT NULL DEFAULT '0' COMMENT 'Длина',
  `width` INT NOT NULL DEFAULT '0' COMMENT 'Ширина',
  `height` INT NOT NULL DEFAULT '0' COMMENT 'Высота',
  lwh_units_id smallint DEFAULT '1' COMMENT 'Единицы измерения геометрии...',/*грамм,килограмм*/


  `sort_order` int(11) NULL,
  `status` tinyint(1) NULL COMMENT 'Показывать',

  `viewed` INT(5) NOT NULL DEFAULT '13' COMMENT 'Количество просмотров',
  `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата доавления товара',
  PRIMARY KEY (nomenclature_id),
  KEY (heading,category)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Характеристики номенклатуры*/

CREATE TABLE IF NOT EXISTS nomenclature_specifications(
  `nomenclature_id` INT NOT NULL,
  `specifications_name_id` INT NOT NULL,

  `heading` INT NULL,
  `category` INT NULL,
  `value` VARCHAR(255) NULL,

  `important` TINYINT NULL,
  PRIMARY KEY (`nomenclature_id`, `specifications_name_id`),
  INDEX (`heading` ASC, `category` ASC)
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

/*производители*/
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Бренд производителя',
  `image` varchar(255) NULL,
  `sort_order` int(3) NULL,
  PRIMARY KEY (`manufacturer_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO manufacturer(manufacturer_id,`name`)VALUES
(1,'NoName'),
(2,'Grand'),
(3,'Hoco'),
(4,'Profi'),
(5,'Remax'),
(6,'AWEI');

/*option*/
/*
CREATE TABLE IF NOT EXISTS option_filter(
  option_id int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (option_id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO option_filter(`option_id`, `type`, `sort_order`) VALUES
(1, 'radio', 1),
(2, 'checkbox', 2),
(4, 'text', 3),
(5, 'select', 4),
(6, 'textarea', 5),
(7, 'file', 6),
(8, 'date', 7),
(9, 'time', 8),
(10, 'datetime', 9),
(11, 'select', 10),
(12, 'date', 11);*/


CREATE TABLE product (
  id int(11) NOT NULL AUTO_INCREMENT,
  nomenclature_id int(11) NOT NULL,
  serial_number varchar(64) NULL COMMENT 'Серийный номер',
  provider int(4) NULL COMMENT 'Поставщик',
  kod_tovara_postavshika varchar(64) NULL,


  price_usd decimal(15,2) NOT NULL DEFAULT '0.00',
  price_uah decimal(15,2) NOT NULL DEFAULT '0.00',

  price_usd_sell decimal(15,2) NULL,
  price_uah_sell decimal(15,2) NOT NULL DEFAULT '0.00',

  kol_vo_buy int(11) NOT NULL DEFAULT 1 COMMENT 'Кол-во закуплено',
  kol_vo_sell int(11) NOT NULL DEFAULT 0 COMMENT 'Кол-во продано',
  kol_vo_location int(11) As (kol_vo_buy - kol_vo_sell) COMMENT 'Кол-во на остатке (kol_vo_buy-kol_vo_sell)',


  PRIMARY KEY (`id`),
  KEY (nomenclature_id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Поставщик*/

CREATE TABLE IF NOT EXISTS provider(
id int(11) NOT NULL AUTO_INCREMENT,
provider_name varchar(255) NULL COMMENT 'Название поставщика',
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO provider VALUES(1,'---'),(2,'AliExpress'),(3,'Mobimag'),(4,'Microtron'),(5,'ItPlanet'),(6,'FixUp');


/*характеристики*/

CREATE TABLE IF NOT EXISTS specifications_name(
id int(11) NOT NULL AUTO_INCREMENT,
specifications_name varchar(255) NULL COMMENT 'Имя характеристики',
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--Входное напряжение
INSERT INTO specifications_name VALUES(1,'Входное напряжение'),(2,'Мощность'),(3,'Выходное напряжение'),(4,'Потребляемый ток'),(5,'Выходной ток'),(6,'Частота тока');