CREATE TABLE IF NOT EXISTS order_fast(
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(130) NOT NULL,
  tel varchar(20) NOT NULL,
  town varchar(33),
  npost smallint,
  color varchar(33),
  ip varchar(50) NOT NULL,
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*
XIPXnPSw
*/