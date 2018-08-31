CREATE TABLE IF NOT EXISTS d(
  id int(11) NOT NULL AUTO_INCREMENT,
  alias varchar(255) NOT NULL,
  db_table varchar(255) NOT NULL,
  menu_name varchar(100),
  PRIMARY KEY (id),
  UNIQUE KEY link(alias)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#DROP TABLE d;

INSERT INTO d (id,alias,db_table,menu_name)VALUES
  (1, 'bios_laptop_aser', 'd_bios_laptop_aser', 'БИОС ноутбука Aser'),
  (2, 'bios_laptop_asus', 'd_bios_laptop_asus', 'БИОС ноутбука Asus'),
  (3, 'bios_laptop_dell', 'd_bios_laptop_dell', 'БИОС ноутбука Dell'),
  (4, 'bios_laptop_emachines', 'd_bios_laptop_emachines', 'БИОС ноутбука eMachines'),
  (5, 'bios_laptop_fujitsu', 'd_bios_laptop_fujitsu', 'БИОС ноутбука Fujitsu'),
  (6, 'bios_laptop_hp', 'd_bios_laptop_hp', 'БИОС ноутбука HP'),
  (7, 'bios_laptop_lenovo', 'd_bios_laptop_lenovo', 'БИОС ноутбука Lenovo'),
  (8, 'bios_laptop_lg', 'd_bios_laptop_lg', 'БИОС ноутбука LG'),
  (9, 'bios_laptop_samsung', 'd_bios_laptop_samsung', 'БИОС ноутбука Samsung'),
  (10, 'bios_laptop_sony', 'd_bios_laptop_sony', 'БИОС ноутбука Sony');




#(1, 'firmware', 'd_firmware', 'Прошивальщики'),


CREATE TABLE IF NOT EXISTS d_firmware(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_aser(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_asus(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_dell(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_emachines(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_fujitsu(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_hp(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_lenovo(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_lg(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_samsung(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS d_bios_laptop_sony(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255),
  content_type varchar(40),
  size_file int(11),
  content longblob NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


