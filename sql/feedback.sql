CREATE TABLE IF NOT EXISTS feedback(
  id int(11) NOT NULL AUTO_INCREMENT,
  captcha mediumint(9) NOT NULL,
  readed tinyint(1) DEFAULT NULL,
  name varchar(130) NOT NULL,
  mail varchar(130) NOT NULL,
  theme varchar(130) NOT NULL,
  text text NOT NULL,
  ip varchar(50) NOT NULL,
  data int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY captcha(captcha)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;