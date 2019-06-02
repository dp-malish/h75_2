/*CREATE TABLE IF NOT EXISTS news_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS article_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;*/

CREATE TABLE IF NOT EXISTS default_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*Специфические таблицы*/

CREATE TABLE IF NOT EXISTS shop_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
