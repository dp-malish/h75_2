CREATE TABLE IF NOT EXISTS def_content(
  id int(11) NOT NULL AUTO_INCREMENT,
  category tinyint(4) default 1,
  link_turn tinyint(4),
  cap_ru varchar(255) NOT NULL,
  cap_ua varchar(255) NOT NULL,
  img varchar(255) default 1,
  img_alt_ru varchar(255),
  img_alt_ua varchar(255),
  img_title_ru varchar(255),
  img_title_ua varchar(255),
  short_text_ru text,
  short_text_ua text,
  weight SMALLINT,
  price SMALLINT,
  PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
