CREATE TABLE IF NOT EXISTS nomenclature(
 id INT(11) NOT NULL AUTO_INCREMENT,

 heading TINYINT NOT NULL COMMENT 'Заголовок TINYINT',
 category TINYINT NULL COMMENT 'Категория TINYINT',

 `name` VARCHAR(255) NULL,
 manufacturer SMALLINT NULL COMMENT 'Производитель',/*производитель*/
 `mpn` varchar(64) NULL COMMENT 'Manufacturer Part Number штрихкоды',

 provider SMALLINT NULL COMMENT 'Поставщик',
 provider_code INT NULL COMMENT 'Код продукта поставщика',



 `date_added` DATETIME DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
/* UNIQUE INDEX `tel` (`tel` ASC),*/
/*UNIQUE INDEX `email` (`email` ASC)*/)
 ENGINE=InnoDB AUTO_INCREMENT=1
DEFAULT CHARACTER SET=utf8;

/*DROP TABLE sota.user;*/
--desc dict