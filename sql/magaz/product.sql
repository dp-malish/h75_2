CREATE TABLE heading(--Заголовок
id int(11) NOT NULL AUTO_INCREMENT,
heading_name varchar(255),
PRIMARY KEY (id)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




CREATE TABLE `product` (--номенклатура
  `product_id` int(11) NOT NULL AUTO_INCREMENT,

  heading TINYINT NOT NULL COMMENT 'Заголовок TINYINT',
  category TINYINT NULL COMMENT 'Категория TINYINT',

  link varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,

  `model` varchar(64) NULL COMMENT 'Модель',
  `model_short` varchar(64) NULL COMMENT 'Модель коротко',

  `sku` varchar(64) NULL COMMENT 'идентификатор товарной позиции - номенклатурная позиция',
  `upc` varchar(12) NULL COMMENT 'универсальный код товара',
  `ean` varchar(14) NULL COMMENT 'универсальный код товара Европа',
  `isbn` varchar(17) NULL COMMENT 'универсальный код товара кодирования книг',
  `mpn` varchar(64) NULL COMMENT 'Manufacturer Part Number штрихкоды',
  `location` varchar(128) NULL COMMENT 'место нахождения - склад',

  `stock_status_id` int(11) NULL COMMENT 'идентификатор состояния акций',

  `image` varchar(255) NULL,
  `manufacturer_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Производитель',


  /*`price` decimal(15,2) NOT NULL DEFAULT '0.00',Цена*/


  `date_available` date NULL COMMENT 'Дата поступления товара ожидается',

  `weight` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Вес',
  `length` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Длина',
  `width` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Ширина',
  `height` decimal(15,3) NOT NULL DEFAULT '0.000' COMMENT 'Высота',


  `sort_order` int(11) NULL,
  `status` tinyint(1) NULL,
  `viewed` int(5) NOT NULL DEFAULT '13' COMMENT 'Количество просмотров',
  `date_added` datetime NOT NULL COMMENT 'Дата доавления товара',
  `date_modified` datetime NULL COMMENT 'Дата изменения товара',
  /*`noindex` tinyint(1) NOT NULL DEFAULT '1',*/
  PRIMARY KEY (`product_id`),
  KEY (heading,category)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




CREATE TABLE `product_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  serial_number varchar(64) NULL COMMENT 'Серийный номер',

  price_usd decimal(15,2) NOT NULL DEFAULT '0.00',

  PRIMARY KEY (`id`),
  KEY (product_id)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



SELECT product_2.product_id as qwert,product.model,max(product_2.price_usd) FROM product_2
LEFT JOIN product ON product_2.product_id=product.product_id GROUP BY product_2.product_id;

SELECT product_2.product_id as qwert,product.model,max(product_2.price_usd),manufacturer.name,count(product_2.product_id)  FROM product_2
LEFT JOIN product ON product_2.product_id=product.product_id
left join manufacturer ON product.manufacturer_id=manufacturer.manufacturer_id  where product_2.price_usd_sell is null GROUP BY product_2.product_id;


drop VIEW testik;

create VIEW testik AS
SELECT product_2.product_id as qwert,product.model,max(product_2.price_usd),manufacturer.name,count(product_2.product_id)  FROM product_2
LEFT JOIN product ON product_2.product_id=product.product_id
left join manufacturer ON product.manufacturer_id=manufacturer.manufacturer_id  where product_2.price_usd_sell is null GROUP BY product_2.product_id;

select * from testik;
select * from testik where qwert=2;