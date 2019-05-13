CREATE TABLE IF NOT EXISTS user(
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(130) NULL,
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
  new_mail INT NULL,/*новая почта*/

  level_star_client SMALLINT DEFAULT 3,/*отношение клиента*/
  note VARCHAR(255) NULL,

  `date_added` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `tel` (`tel` ASC),
  UNIQUE INDEX `email` (`email` ASC))
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARACTER SET = utf8;

/*DROP TABLE sota.user;*/
--desc dict