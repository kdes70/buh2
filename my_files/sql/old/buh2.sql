-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 27 2015 г., 15:09
-- Версия сервера: 5.5.36
-- Версия PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `buh2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `db1_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_item`
--

CREATE TABLE IF NOT EXISTS `db1_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `db1_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_rule`
--

CREATE TABLE IF NOT EXISTS `db1_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_categoryexp`
--

CREATE TABLE IF NOT EXISTS `db1_categoryexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Родительская категория',
  `name` varchar(20) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории расходов' AUTO_INCREMENT=123 ;

--
-- Дамп данных таблицы `db1_categoryexp`
--

INSERT INTO `db1_categoryexp` (`id`, `parent_id`, `name`) VALUES
(0, 0, ''),
(60, 0, 'Продукты питания'),
(61, 0, 'Хоз. расходы'),
(62, 0, 'Услуги связи'),
(63, 0, 'Развлечения'),
(72, 0, 'Гигиена'),
(77, 0, 'Здоровье'),
(82, 0, 'Коммунальные услуги'),
(83, 60, 'Хлеб'),
(84, 60, 'Картошка'),
(85, 60, 'Булки'),
(89, 62, 'Интернет'),
(90, 72, 'Зубная паста'),
(91, 72, 'Шампунь'),
(92, 72, 'Мыло'),
(93, 72, 'Зубная шетка'),
(94, 0, 'Транспорт'),
(95, 94, 'Такси'),
(96, 94, 'Маршрутка'),
(97, 94, 'Железная дорога'),
(98, 60, 'Колбаса'),
(99, 60, 'Рыбные продукты'),
(103, 62, 'Мобильная связь'),
(104, 62, 'Телефон'),
(108, 61, 'Дача'),
(109, 94, 'Нерегулярн. перевоз.'),
(110, 82, 'Газ'),
(111, 82, 'Электроэнергия'),
(112, 82, 'Вода'),
(113, 82, 'Мусор'),
(114, 77, 'Лекарства'),
(116, 60, 'Молокопродукты'),
(119, 77, 'Услуги врача'),
(120, 108, 'Удобрения'),
(122, 63, 'Мотоцикл');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_categoryinc`
--

CREATE TABLE IF NOT EXISTS `db1_categoryinc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'Пользователь',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `wallet_default` int(11) NOT NULL COMMENT 'Кошелек по умолчанию',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `wallet_default` (`wallet_default`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории доходов' AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `db1_categoryinc`
--

INSERT INTO `db1_categoryinc` (`id`, `user_id`, `name`, `wallet_default`) VALUES
(3, 2, 'Зарплата', 1),
(4, 2, 'Аванс', 1),
(5, 2, 'Конверт', 2),
(6, 2, 'Калым', 2),
(7, 3, 'Аванс', 4),
(12, 3, 'Зарплата', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_exchange`
--

CREATE TABLE IF NOT EXISTS `db1_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL COMMENT 'Дата начала',
  `currency_code` varchar(3) NOT NULL COMMENT 'Код валюты',
  `number_units` int(11) NOT NULL COMMENT 'Количество единиц',
  `official_exchange` decimal(10,6) NOT NULL COMMENT 'Официальный курс',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_exchange_uniq` (`currency_code`,`start_date`) COMMENT 'Уникальность кода валюты за дату'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Курсы валют' AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `db1_exchange`
--

INSERT INTO `db1_exchange` (`id`, `start_date`, `currency_code`, `number_units`, `official_exchange`) VALUES
(3, '2015-07-17', 'USD', 100, '2198.668700'),
(4, '2015-07-17', 'EUR', 100, '2389.293300'),
(6, '2015-07-17', 'RUB', 10, '3.860700'),
(7, '2015-07-18', 'USD', 100, '2201.492400'),
(8, '2015-07-20', 'RUB', 10, '3.876600'),
(9, '2015-07-20', 'USD', 100, '2203.213400'),
(10, '2015-07-20', 'EUR', 100, '2390.927200'),
(14, '2015-07-21', 'USD', 100, '2203.213400'),
(16, '2015-07-21', 'RUB', 10, '3.876600'),
(17, '2015-07-21', 'EUR', 100, '2390.927200'),
(18, '2015-07-25', 'USD', 100, '2207.352000'),
(19, '2015-07-27', 'USD', 100, '2207.352000'),
(20, '2015-07-27', 'EUR', 100, '2414.622400'),
(21, '2015-07-27', 'RUB', 10, '3.803300');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_expense`
--

CREATE TABLE IF NOT EXISTS `db1_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(10,2) NOT NULL COMMENT 'Сумма расхода',
  `categoryexp_id` int(11) NOT NULL COMMENT 'Категория расходов',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `wallet_id` (`wallet_id`),
  KEY `categoryexp_id` (`categoryexp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Расходы' AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `db1_expense`
--

INSERT INTO `db1_expense` (`id`, `cost`, `categoryexp_id`, `description`, `date_oper`, `user_id`, `wallet_id`) VALUES
(39, '1.00', 92, NULL, '2015-07-22', 2, 2),
(40, '3.00', 90, '3', '2015-07-23', 2, 2),
(41, '33.00', 90, '', '2015-07-23', 2, 2),
(44, '3.00', 91, '', '2015-07-24', 2, 3),
(45, '10.00', 99, 'Хек', '2015-07-24', 2, 3),
(46, '150.00', 89, '', '2015-07-27', 2, 3),
(47, '350.00', 122, '23423423', '2015-07-27', 2, 1),
(48, '40.00', 122, '', '2015-07-27', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_expensetemp`
--

CREATE TABLE IF NOT EXISTS `db1_expensetemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(10,2) NOT NULL COMMENT 'Сумма расхода',
  `categoryexp_id` int(11) NOT NULL COMMENT 'Категория расходов',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_temp` (`cost`,`categoryexp_id`,`description`,`user_id`,`wallet_id`),
  KEY `user_id` (`user_id`),
  KEY `wallet_id` (`wallet_id`),
  KEY `categoryexp_id` (`categoryexp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Шаблоны расходов' AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `db1_expensetemp`
--

INSERT INTO `db1_expensetemp` (`id`, `cost`, `categoryexp_id`, `description`, `user_id`, `wallet_id`) VALUES
(11, '5.00', 60, 'Мороженое', 2, 1),
(10, '10.00', 99, 'Хек', 2, 3),
(13, '33.00', 90, '', 2, 2),
(14, '40.00', 122, '', 2, 1),
(9, '150.00', 89, '', 2, 3),
(12, '350.00', 122, '23423423', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_income`
--

CREATE TABLE IF NOT EXISTS `db1_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL COMMENT 'Сумма дохода',
  `categoryinc_id` int(11) NOT NULL COMMENT 'Категория доходов',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)',
  PRIMARY KEY (`id`),
  KEY `category_id` (`categoryinc_id`),
  KEY `user_id` (`user_id`),
  KEY `wallet_id` (`wallet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Доходы' AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `db1_income`
--

INSERT INTO `db1_income` (`id`, `amount`, `categoryinc_id`, `date_oper`, `user_id`, `wallet_id`) VALUES
(3, '100.00', 3, '2015-01-01', 3, 2),
(6, '600.00', 12, '2015-07-24', 3, 5),
(8, '1000.00', 6, '2015-07-24', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_migration`
--

CREATE TABLE IF NOT EXISTS `db1_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица для Migration';

--
-- Дамп данных таблицы `db1_migration`
--

INSERT INTO `db1_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1431122131),
('m140506_102106_rbac_init', 1431122134),
('m150512_065014_create_user_table', 1431413623);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_move`
--

CREATE TABLE IF NOT EXISTS `db1_move` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wallet_from` int(11) NOT NULL COMMENT 'Из кошелька',
  `wallet_to` int(11) NOT NULL COMMENT 'В кошелек',
  `move_sum` decimal(10,2) NOT NULL COMMENT 'Перемещаемая сумма',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание',
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallet_to` (`wallet_to`),
  KEY `user_id` (`user_id`),
  KEY `wallet_from` (`wallet_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Перемещения' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `db1_move`
--

INSERT INTO `db1_move` (`id`, `wallet_from`, `wallet_to`, `move_sum`, `date_oper`, `user_id`, `description`) VALUES
(4, 1, 2, '22.00', '2015-07-25', 2, ''),
(5, 1, 5, '100.00', '2015-07-25', 2, '');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_setting`
--

CREATE TABLE IF NOT EXISTS `db1_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  KEY `_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Настройки' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `db1_setting`
--

INSERT INTO `db1_setting` (`id`, `user_id`, `name`) VALUES
(2, 2, 'Кошелек по умолчанию'),
(3, 2, 'Единица измерения по умолчанию'),
(4, 2, 'Количество записей в гриде');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_unit`
--

CREATE TABLE IF NOT EXISTS `db1_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `fullname` varchar(100) NOT NULL COMMENT 'Полное наименование',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Единицы измерения' AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `db1_unit`
--

INSERT INTO `db1_unit` (`id`, `name`, `fullname`) VALUES
(2, 'г', 'Грамм'),
(3, 'м', 'Метр'),
(4, 'пач', 'Пачка'),
(5, 'шт', 'Штука'),
(6, 'опер', 'Операция'),
(9, 'кг', 'Килограмм');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_user`
--

CREATE TABLE IF NOT EXISTS `db1_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'Имя пользователя',
  `auth_key` varchar(32) DEFAULT NULL,
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL COMMENT 'Пароль',
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL COMMENT 'E-mail',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Состояние',
  PRIMARY KEY (`id`),
  KEY `idx_user_username` (`username`),
  KEY `idx_user_email` (`email`),
  KEY `idx_user_status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `db1_user`
--

INSERT INTO `db1_user` (`id`, `created_at`, `updated_at`, `username`, `auth_key`, `email_confirm_token`, `password_hash`, `password_reset_token`, `email`, `status`) VALUES
(1, 1429777037, 1429777037, 'admin', 'lWFtF0usH_m7VwPeawuHPeTsYKhSyPtC', NULL, '$2y$13$UajfGtVXCP.eRIedu0nvw.auVDVIrEqrTVJ2ZG0xy.4yQDH.h22m2', NULL, 'admin@ukr.net', 1),
(2, 1429777037, 1429777037, 'timur', 'lWFtF0usH_m7VwPeawuHPeTsYKhSyPtC', NULL, '$2y$13$UajfGtVXCP.eRIedu0nvw.auVDVIrEqrTVJ2ZG0xy.4yQDH.h22m2', NULL, 'timur@ukr.net', 1),
(3, 1429777037, 1429777037, 'beata', 'lWFtF0usH_m7VwPeawuHPeTsYKhSyPtC', NULL, '$2y$13$UajfGtVXCP.eRIedu0nvw.auVDVIrEqrTVJ2ZG0xy.4yQDH.h22m2', NULL, 'beata@ukr.net', 10),
(8, 1429777037, 1429777037, 'dasha', 'lWFtF0usH_m7VwPeawuHPeTsYKhSyPtC', NULL, '$2y$13$UajfGtVXCP.eRIedu0nvw.auVDVIrEqrTVJ2ZG0xy.4yQDH.h22m2', NULL, 'dasha@ukr.net', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_wallet`
--

CREATE TABLE IF NOT EXISTS `db1_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `current_sum` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Текущая сумма',
  `state` tinyint(1) NOT NULL COMMENT 'Состояние (0-действуюший, 1-Закрытый)',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Кошельки' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `db1_wallet`
--

INSERT INTO `db1_wallet` (`id`, `name`, `current_sum`, `state`, `user_id`) VALUES
(1, 'Карточка FidoBank', '10.00', 0, 2),
(2, 'Карточка Приват', '235.21', 0, 2),
(3, 'Наличные', '137.67', 0, 2),
(4, 'Карточка Приват', '100.00', 0, 3),
(5, 'Наличные', '700.00', 0, 3);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `db1_auth_assignment`
--
ALTER TABLE `db1_auth_assignment`
  ADD CONSTRAINT `db1_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `db1_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `db1_auth_item`
--
ALTER TABLE `db1_auth_item`
  ADD CONSTRAINT `db1_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `db1_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `db1_auth_item_child`
--
ALTER TABLE `db1_auth_item_child`
  ADD CONSTRAINT `db1_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `db1_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db1_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `db1_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `db1_categoryexp`
--
ALTER TABLE `db1_categoryexp`
  ADD CONSTRAINT `db1_categoryexp_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `db1_categoryexp` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `db1_categoryinc`
--
ALTER TABLE `db1_categoryinc`
  ADD CONSTRAINT `db1_categoryinc_ibfk_1` FOREIGN KEY (`wallet_default`) REFERENCES `db1_wallet` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_expense`
--
ALTER TABLE `db1_expense`
  ADD CONSTRAINT `db1_expense_ibfk_2` FOREIGN KEY (`categoryexp_id`) REFERENCES `db1_categoryexp` (`id`),
  ADD CONSTRAINT `db1_expense_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`),
  ADD CONSTRAINT `db1_expense_ibfk_4` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_expensetemp`
--
ALTER TABLE `db1_expensetemp`
  ADD CONSTRAINT `db1_expensetemp_ibfk_3` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`),
  ADD CONSTRAINT `db1_expensetemp_ibfk_1` FOREIGN KEY (`categoryexp_id`) REFERENCES `db1_categoryexp` (`id`),
  ADD CONSTRAINT `db1_expensetemp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_income`
--
ALTER TABLE `db1_income`
  ADD CONSTRAINT `db1_income_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`),
  ADD CONSTRAINT `db1_income_ibfk_2` FOREIGN KEY (`categoryinc_id`) REFERENCES `db1_categoryinc` (`id`),
  ADD CONSTRAINT `db1_income_ibfk_3` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_move`
--
ALTER TABLE `db1_move`
  ADD CONSTRAINT `db1_move_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`),
  ADD CONSTRAINT `db1_move_ibfk_2` FOREIGN KEY (`wallet_from`) REFERENCES `db1_wallet` (`id`),
  ADD CONSTRAINT `db1_move_ibfk_3` FOREIGN KEY (`wallet_to`) REFERENCES `db1_wallet` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_setting`
--
ALTER TABLE `db1_setting`
  ADD CONSTRAINT `` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_wallet`
--
ALTER TABLE `db1_wallet`
  ADD CONSTRAINT `db1_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
