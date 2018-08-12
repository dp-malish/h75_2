CREATE TABLE IF NOT EXISTS download_firmware(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;