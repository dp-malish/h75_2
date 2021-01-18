CREATE TABLE IF NOT EXISTS deposit(
  id int(11) NOT NULL AUTO_INCREMENT,
  bank smallint DEFAULT 0 COMMENT 'банк',
  target varchar(255) default 1 COMMENT 'назначение',
  percent decimal (4,2) default 1.00 COMMENT 'процент',
  currency tinyint DEFAULT 0 COMMENT 'валюта',
  amount integer default 10000 COMMENT 'кол-во',
  date_opening date NOT NULL COMMENT 'дата открытия',
  date_closing date NOT NULL COMMENT 'дата закрытия',
  PRIMARY KEY (id)
