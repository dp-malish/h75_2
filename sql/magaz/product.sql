CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(64) NOT NULL,
  `sku` varchar(64) NULL COMMENT 'идентификатор товарной позиции - номенклатурная позиция',
  `upc` varchar(12) NULL COMMENT 'универсальный код товара',
  `ean` varchar(14) NULL COMMENT 'универсальный код товара Европа',
  /*`jan` varchar(13) NOT NULL,штрихкоды*/
  `isbn` varchar(17) NULL COMMENT 'универсальный код товара кодирования книг',
  `mpn` varchar(64) NULL COMMENT 'Manufacturer Part Number штрихкоды',
  `location` varchar(128) NULL COMMENT 'место нахождения - склад',
  `quantity` int(4) NOT NULL DEFAULT '0' COMMENT 'количество',
  `stock_status_id` int(11) NULL COMMENT 'идентификатор состояния акций',
  `image` varchar(255) NULL,
  `manufacturer_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Производитель',
  /*`shipping` tinyint(1) NOT NULL DEFAULT '1', Перевозка  */
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',/*Цена*/
  /*`points` int(8) NOT NULL DEFAULT '0',
  `tax_class_id` int(11) NOT NULL, Налоговый класс*/
  `date_available` date NULL COMMENT 'Дата поступления товара ожидается',
  `weight` decimal(15,3) NOT NULL DEFAULT '0.000',
  /*`weight_class_id` int(11) NOT NULL DEFAULT '0',*/
  `length` decimal(15,3) NOT NULL DEFAULT '0.000',
  `width` decimal(15,3) NOT NULL DEFAULT '0.000',
  `height` decimal(15,3) NOT NULL DEFAULT '0.000',
  /*`length_class_id` int(11) NOT NULL DEFAULT '0',*/
  /*`subtract` tinyint(1) NOT NULL DEFAULT '1',*/
  /*`minimum` int(11) NOT NULL DEFAULT '1',*/
  `sort_order` int(11) NULL,
  `status` tinyint(1) NULL,
  `viewed` int(5) NOT NULL DEFAULT '13' COMMENT 'Количество просмотров',
  `date_added` datetime NOT NULL COMMENT 'Дата доавления товара',
  `date_modified` datetime NULL COMMENT 'Дата изменения товара',
  /*`noindex` tinyint(1) NOT NULL DEFAULT '1',*/
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


select product.model as хрень , manufacturer.name as china FROM product LEFT JOIN manufacturer ON product.manufacturer_id=manufacturer.manufacturer_id;
