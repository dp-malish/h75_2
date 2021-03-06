CREATE TABLE IF NOT EXISTS food(
  id int(11) NOT NULL AUTO_INCREMENT,
  category tinyint(4) default 1,
  link_turn tinyint(4),
  cap_ru varchar(255) NOT NULL,
  cap_uk varchar(255) NOT NULL,
  img varchar(255) default 1,
  img_alt_ru varchar(255),
  img_alt_uk varchar(255),
  img_title_ru varchar(255),
  img_title_uk varchar(255),
  short_text_ru text,
  short_text_uk text,
  kind varchar(255),
  price varchar(255),
  hit tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
