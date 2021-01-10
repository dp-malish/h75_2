CREATE TABLE IF NOT EXISTS deposit(
  id int(11) NOT NULL AUTO_INCREMENT,
  bank smallint DEFAULT 0,
  target varchar(255) default 1,
  percent decimal (4,2) default 1.00,
  currency tinyint DEFAULT 0,
  amount integer default 10000,
  date_opening date NOT NULL,
  date_closing date NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;