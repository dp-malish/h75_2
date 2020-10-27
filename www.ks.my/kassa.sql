-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net

-- Версия PHP: 5.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(150) NOT NULL,
  `admin_role` varchar(50) NOT NULL,
  `admin_pass` varchar(60) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_email`, `admin_role`, `admin_pass`, `admin_name`) VALUES
(1, '111@gmail.com', 'super_admin', '$22sQhXr2q3eO6Znm04dy', 'Админ');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `date` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `text_comment` text NOT NULL,
  `status` smallint(1) NOT NULL,
  `primechanie_modera` varchar(200) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `user_id_index_otziv` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `logs_send_email`
--

CREATE TABLE IF NOT EXISTS `logs_send_email` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type_send_email` varchar(45) NOT NULL,
  `date` bigint(20) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `output_payments`
--

CREATE TABLE IF NOT EXISTS `output_payments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `partner_id` bigint(20) NOT NULL,
  `summa` float NOT NULL,
  `date_payment` bigint(20) NOT NULL,
  `kto_okazal_pomosh_name` varchar(100) NOT NULL,
  `kto_okazal_pomosh_last_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_id_summa_date_output` (`partner_id`,`date_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `summa` float NOT NULL,
  `payment_date` bigint(20) NOT NULL,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_user_account_idx` (`user_id`),
  KEY `status_payment_date` (`payment_date`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `recover_pass_user`
--

CREATE TABLE IF NOT EXISTS `recover_pass_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(150) NOT NULL,
  `live_time` bigint(20) NOT NULL,
  `hash` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hash_email_time_index` (`user_email`,`live_time`,`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `system_messages`
--

CREATE TABLE IF NOT EXISTS `system_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `date` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `status_message` varchar(10) NOT NULL DEFAULT 'close',
  PRIMARY KEY (`id`),
  KEY `status_admin_massage_indx` (`status_message`,`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_number` varchar(45) NOT NULL,
  `advcash_ru` varchar(20) NOT NULL,
  `payment_date` bigint(20) NOT NULL,
  `type_transacrion` varchar(10) NOT NULL,
  `good_or_bad_transaction` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_indx` (`transaction_number`,`advcash_ru`,`type_transacrion`,`good_or_bad_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `partner_id` varchar(45) NOT NULL,
  `parent_id` varchar(45) NOT NULL COMMENT 'Родительский id, т.е. кто пригласил юзера',
  `left_key` bigint(20) NOT NULL,
  `right_key` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `provider` enum('my_form_landing','facebook','google','odnoklassniki','vk') NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `skype` varchar(70) NOT NULL DEFAULT 'none',
  `sex` smallint(1) NOT NULL,
  `date_register` bigint(20) NOT NULL,
  `avatar` varchar(150) NOT NULL DEFAULT 'avatar.jpg',
  `activation_code` varchar(50) NOT NULL,
  `activation_status` smallint(1) NOT NULL DEFAULT '0',
  `advcash_ru` varchar(21) NOT NULL,
  `activate_year` smallint(1) NOT NULL DEFAULT '0',
  `activate_time_year` bigint(20) NOT NULL DEFAULT '0',
  `earn_last_year` float NOT NULL DEFAULT '0',
  `all_earn` float NOT NULL DEFAULT '0',
  `zabanen` smallint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `phone_number_UNIQUE` (`phone_number`),
  UNIQUE KEY `partner_id_UNIQUE` (`partner_id`),
  UNIQUE KEY `advcash_ru_UNIQUE` (`advcash_ru`),
  KEY `left_right_level` (`left_key`,`right_key`,`level`),
  KEY `parent_id_indx` (`parent_id`),
  KEY `password_indx` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `partner_id`, `parent_id`, `left_key`, `right_key`, `level`, `provider`, `name`, `last_name`, `email`, `password`, `phone_number`, `skype`, `sex`, `date_register`, `avatar`, `activation_code`, `activation_status`, `advcash_ru`, `activate_year`, `activate_time_year`, `earn_last_year`, `all_earn`, `zabanen`) VALUES
(1, 'FAsd8652RsTG', 'FAsd8652RsTG', 1, 2, 0, 'my_form_landing', 'Валентина', 'Витальевна', 'system@system.com', '123', '+7123456789', 'Не указан', 1, 1388829356, 'valentina_vitalievna.png', 'fhsdgreergr', 1, 'R123456789', 1, 1426716438, 0, 0, 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_user_account` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
