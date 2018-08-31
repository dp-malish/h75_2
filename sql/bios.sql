CREATE TABLE IF NOT EXISTS manufacturer(
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) DEFAULT 0,
  laptop int(3) DEFAULT 0,
  PRIMARY KEY (`manufacturer_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#ALTER TABLE `manufacturer` ADD `laptop` TINYINT NOT NULL DEFAULT '0' AFTER `sort_order`;

CREATE TABLE IF NOT EXISTS bios_laptop(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  manufacturer_id int(11),
  model varchar(64),
  status TINYINT DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY link(link),
  KEY (manufacturer_id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#DROP TABLE bios_laptop;
ALTER TABLE bios_laptop ADD status TINYINT DEFAULT '0' AFTER model;


CREATE TABLE IF NOT EXISTS bios_laptop_second(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_bios_laptop int(11),

  model_motherboard varchar(50),
  rev_motherboard varchar(20),
  ver_bios varchar(23),

  download_table SMALLINT DEFAULT 1,
  download_table_id int(11),

  level SMALLINT DEFAULT 1,

  notes varchar(255),

  PRIMARY KEY (id),
  KEY (id_bios_laptop)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS bios_laptop_desc(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255),

  title varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  meta_k varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,

  img varchar(255),
  img_alt varchar(255),
  img_title varchar(255),
  full_text text NOT NULL,
  data int(11),

  PRIMARY KEY (id),
  UNIQUE KEY link(link)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;