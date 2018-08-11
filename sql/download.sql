CREATE TABLE IF NOT EXISTS download_firmware(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  size_file int(11) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;