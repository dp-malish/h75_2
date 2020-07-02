CREATE TABLE IF NOT EXISTS freewebhostingarea(
  id int(11) NOT NULL AUTO_INCREMENT,
  mail varchar(255) NOT NULL,
  login varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  ip varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_proverki` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;