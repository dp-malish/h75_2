



CREATE TABLE IF NOT EXISTS heading(
id int(11) NOT NULL AUTO_INCREMENT,
heading_name varchar(255) NULL COMMENT 'Название заголовка перед категорией',
PRIMARY KEY (id)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;






/*location Склад*/

CREATE TABLE IF NOT EXISTS location(
id int(11) NOT NULL AUTO_INCREMENT,
location_name varchar(255) NULL COMMENT 'Название Склада',
PRIMARY KEY (id)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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

  `stock_status_id` int(11) NULL COMMENT 'идентификатор состояния акций',

  `image` varchar(255) NULL,
  `manufacturer_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Производитель',
  short_text text,

  markup smallint NULL COMMENT 'Наценка в %',

  `weight` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Вес',
  `length` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Длина',
  `width` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Ширина',
  `height` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Высота',


  `sort_order` int(11) NULL,
  `status` tinyint(1) NULL COMMENT 'Показывать',

  `viewed` int(5) NOT NULL DEFAULT '13' COMMENT 'Количество просмотров',
  `date_added` datetime NOT NULL COMMENT 'Дата доавления товара',
  PRIMARY KEY (nomenclature_id),
  KEY (heading,category)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



/*производители*/
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*option*/

CREATE TABLE IF NOT EXISTS option_filter(
  option_id int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (option_id)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*
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

/*Поставщик*/

CREATE TABLE IF NOT EXISTS provider(
id int(11) NOT NULL AUTO_INCREMENT,
provider_name varchar(255) NULL COMMENT 'Название поставщика',
PRIMARY KEY (id)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO provider VALUES(1,'Mobimag'),(2,'Microtron'),(3,'ItPlanet');


/*характеристики*/

CREATE TABLE IF NOT EXISTS specifications_name(
id int(11) NOT NULL AUTO_INCREMENT,
specifications_name varchar(255) NULL COMMENT 'Имя характеристики',
PRIMARY KEY (id)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

