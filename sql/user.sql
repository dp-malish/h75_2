CREATE TABLE IF NOT EXISTS sota.user(
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(96) NULL,
  `tel` BIGINT NULL,
  `tel_2` BIGINT NULL,
  user_group_id INT NOT NULL,
  `username` VARCHAR(20) NULL,
  `password` VARCHAR(40) NULL,
  `salt` VARCHAR(9) NULL,
  `firstname` VARCHAR(32) NULL,
  `lastname` VARCHAR(32) NULL,
  patronymic VARCHAR(32) NULL,
  `image` VARCHAR(255) NULL,
  `code` VARCHAR(40) NULL,
  `ip` VARCHAR(40) NULL,
  `status` TINYINT(1) DEFAULT 1,
  user_id_referral INT(11) NULL,
  city VARCHAR(40) NULL,
  new_mail INT NULL,

  `date_added` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `tel` (`tel` ASC),
  UNIQUE INDEX `email` (`email` ASC))
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARACTER SET = utf8;

DROP TABLE sota.user;