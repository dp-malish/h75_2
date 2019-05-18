SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Структура таблицы `m1_manufacturer`
--
DROP TABLE manufacturer;

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `m1_manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `image`) VALUES
  (1, 'No name', 'catalog/demo/manufacturer/sony.png'),
  (2, 'Grand Premium', ''),
  (3, 'Hoco', '')
  ;
COMMIT;




DROP TABLE manufacturer_description;

CREATE TABLE IF NOT EXISTS `m1_manufacturer_description` (
  `manufacturer_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_h1` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `m1_manufacturer_description`
--

INSERT INTO `m1_manufacturer_description` (`manufacturer_id`, `language_id`, `name`, `description`, `meta_title`, `meta_h1`, `meta_description`, `meta_keyword`) VALUES
  (1, 1, 'No name', '&lt;p&gt;Производитель отсутствует&lt;/p&gt;', 'No name', 'No name', 'No name', 'No name'),
  (2, 1, 'Grand Premium', '', '', '', '', '');
--
-- Индексы таблицы `m1_manufacturer_description`
--
ALTER TABLE `m1_manufacturer_description`
  ADD PRIMARY KEY (`manufacturer_id`,`language_id`);
COMMIT;


DROP TABLE m1_manufacturer_to_store;

CREATE TABLE IF NOT EXISTS `m1_manufacturer_to_store` (
  `manufacturer_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`manufacturer_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `m1_manufacturer_to_store`
--

INSERT INTO `m1_manufacturer_to_store` (`manufacturer_id`, `store_id`) VALUES
  (1, 0),
  (2, 0);
COMMIT;