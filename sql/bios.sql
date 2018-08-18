CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) DEFAULT 0,
  laptop int(3) DEFAULT 0,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `manufacturer` ADD `laptop` TINYINT NOT NULL DEFAULT '0' AFTER `sort_order`;

CREATE TABLE IF NOT EXISTS def_content(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,




  manufacturer_id int(11),
  model varchar(50) NOT NULL,
  model_motherboard varchar(50) NOT NULL,
  rev decimal(5,2),
  level SMALLINT DEFAULT 1,

  DOWNLOAD_DB varchar(25),
  DOWNLOAD_DB_id int(11),



  menu tinyint(4),
  heading varchar(255),
  category varchar(255),
  link_turn tinyint(4),
  title varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  meta_k varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,
  img_s varchar(255),
  img_alt_s varchar(255),
  img_title_s varchar(255),
  short_text text,
  img varchar(255),
  img_alt varchar(255),
  img_title varchar(255),
  left_text text,
  right_text text,
  full_text text NOT NULL,
  data int(11),
  views int(11) DEFAULT 13,
  comment int(11),
  PRIMARY KEY (id),
  UNIQUE KEY link(link),
  KEY (heading,category)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS download_bios_asus(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;