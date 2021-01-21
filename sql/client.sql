CREATE TABLE IF NOT EXISTS client(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(130) NULL,

  `firstname` VARCHAR(32) NULL,
  `lastname` VARCHAR(32) NULL,
   patronymic VARCHAR(32) NULL,
  `status` TINYINT(1) DEFAULT 1,

  level_star_client SMALLINT DEFAULT 3,/*отношение клиента*/
  note VARCHAR(255) NULL,

  `date_added` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `tel` (`tel` ASC),
  UNIQUE INDEX `email` (`email` ASC))
  ENGINE=InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARACTER SET = utf8;


  `tel` BIGINT NULL,
  `tel_2` BIGINT NULL,