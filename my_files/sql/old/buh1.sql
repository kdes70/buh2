-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 18 2014 г., 15:21
-- Версия сервера: 5.5.36
-- Версия PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `buh1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_categoryexp`
--

CREATE TABLE IF NOT EXISTS `bu1_categoryexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Родительская категория',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории расходов' AUTO_INCREMENT=115 ;

--
-- Дамп данных таблицы `bu1_categoryexp`
--

INSERT INTO `bu1_categoryexp` (`id`, `parent_id`, `name`) VALUES
(0, 0, 'Корневая категория'),
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
(109, 94, 'Нерегулярные перевозки'),
(110, 82, 'Газ'),
(111, 82, 'Электроэнергия'),
(112, 82, 'Вода'),
(113, 82, 'Мусор'),
(114, 77, 'Лекарства');

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_categoryinc`
--

CREATE TABLE IF NOT EXISTS `bu1_categoryinc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Родительская категория',
  `user_id` int(11) DEFAULT NULL COMMENT 'Пользователь',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `wallet_default` int(11) NOT NULL COMMENT 'Кошелек по умолчанию',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`user_id`),
  KEY `wallet_default` (`wallet_default`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории доходов' AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `bu1_categoryinc`
--

INSERT INTO `bu1_categoryinc` (`id`, `parent_id`, `user_id`, `name`, `wallet_default`) VALUES
(3, 1, 1, 'Зарплата', 1),
(4, NULL, 1, 'Аванс', 1),
(5, NULL, 1, 'Конверт', 2),
(6, NULL, 1, 'Калым', 2),
(7, NULL, 3, 'Аванс', 4),
(12, NULL, 3, 'Зарплата', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_expense`
--

CREATE TABLE IF NOT EXISTS `bu1_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(10,2) NOT NULL COMMENT 'Цена',
  `amount` decimal(10,2) NOT NULL COMMENT 'Количество',
  `unit_id` int(11) NOT NULL COMMENT 'Единица измерения',
  `categoryexp_id` int(11) NOT NULL COMMENT 'Категория расходов',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `operwallet_id` int(11) NOT NULL COMMENT 'Операции с кошельками',
  PRIMARY KEY (`id`),
  KEY `unit_id` (`unit_id`),
  KEY `category_id` (`categoryexp_id`),
  KEY `user_id` (`user_id`),
  KEY `operwallet_id` (`operwallet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Расходы' AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `bu1_expense`
--

INSERT INTO `bu1_expense` (`id`, `cost`, `amount`, `unit_id`, `categoryexp_id`, `name`, `date_oper`, `user_id`, `operwallet_id`) VALUES
(12, '40.00', '1.00', 5, 61, 'Лопата', '2013-10-17', 1, 0),
(13, '150.00', '1.00', 5, 61, 'Дрель', '2013-10-16', 1, 0),
(14, '78.13', '1.00', 2, 60, 'Печение', '2013-12-31', 1, 0),
(16, '120.00', '1.00', 5, 61, 'Топор', '2013-12-10', 1, 0),
(17, '14.75', '3000.00', 2, 60, 'Картошка', '2013-12-11', 1, 0),
(18, '39.58', '400.00', 2, 98, 'Школьная', '2013-12-09', 1, 0),
(19, '39.00', '1.00', 4, 72, 'Зубная паста', '2013-12-10', 1, 0),
(20, '30.38', '1.00', 6, 95, 'Сити Такси', '2013-12-10', 1, 0),
(21, '15.60', '1.00', 4, 77, 'Презервативы', '2013-12-10', 1, 0),
(22, '74.00', '1.00', 5, 61, 'Лопата', '2013-12-12', 1, 0),
(23, '120.59', '2000.00', 2, 60, 'Рыба', '2013-12-12', 1, 0),
(26, '45.00', '700.00', 2, 99, 'Форель', '2014-07-31', 1, 0),
(27, '19.27', '1.00', 4, 60, 'Сыр "Янтарь"', '2014-07-15', 1, 0),
(30, '35.00', '1.00', 6, 95, 'Сити Такси', '2014-07-15', 1, 0),
(31, '30.00', '900.00', 2, 84, 'Картошка', '2014-07-15', 1, 0),
(32, '105.00', '1.00', 5, 83, 'Закарпатский', '2014-07-15', 1, 0),
(33, '142.00', '2.00', 4, 60, 'Вафли "Артек"', '2014-07-15', 1, 0),
(34, '40.00', '1.00', 5, 89, 'ТрансКом', '2014-07-17', 2, 0),
(35, '40.00', '550.00', 2, 98, 'Московская', '2014-07-17', 1, 0),
(36, '10.39', '1.00', 5, 61, 'Изолента', '2014-06-30', 3, 0),
(37, '56.00', '1.00', 5, 72, 'Шампунь', '2014-07-17', 3, 0),
(38, '11.00', '1.00', 4, 63, 'Мороженое', '2014-07-09', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_income`
--

CREATE TABLE IF NOT EXISTS `bu1_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL COMMENT 'Сумма дохода',
  `categoryinc_id` int(11) NOT NULL COMMENT 'Категория доходов',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`categoryinc_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Доходы' AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `bu1_income`
--

INSERT INTO `bu1_income` (`id`, `amount`, `categoryinc_id`, `date_oper`, `user_id`) VALUES
(1, '1600.00', 4, '2014-07-28', 1),
(2, '1200.00', 6, '2014-07-26', 2),
(12, '1000.00', 5, '2014-07-17', 1),
(13, '850.00', 4, '2014-07-10', 2),
(14, '1200.00', 3, '2014-07-30', 3),
(15, '800.00', 4, '2014-07-16', 3),
(16, '350.00', 6, '2014-07-31', 1),
(17, '200.00', 4, '2014-07-30', 1),
(18, '1157.00', 4, '2014-08-07', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_operwallet`
--

CREATE TABLE IF NOT EXISTS `bu1_operwallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `type_repl` tinyint(1) NOT NULL COMMENT 'Тип пополнения (0-из дохода, 1-из кошелька)',
  `type_oper` tinyint(1) NOT NULL COMMENT 'Тип операции (0-"-", 1-"+")',
  `amount` decimal(10,2) NOT NULL COMMENT 'Сумма',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  PRIMARY KEY (`id`),
  KEY `wallet_id` (`wallet_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Операции с кошельками' AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `bu1_operwallet`
--

INSERT INTO `bu1_operwallet` (`id`, `wallet_id`, `user_id`, `type_repl`, `type_oper`, `amount`, `date_oper`) VALUES
(6, 1, 1, 1, 1, '111.00', '2014-08-10'),
(7, 2, 1, 0, 0, '120.00', '2014-08-10'),
(8, 1, 1, 1, 1, '50.00', '2014-08-10'),
(9, 2, 1, 0, 1, '40.00', '2014-08-10'),
(10, 3, 1, 1, 1, '50.00', '2014-08-10');

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_setting`
--

CREATE TABLE IF NOT EXISTS `bu1_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Настройки' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_unit`
--

CREATE TABLE IF NOT EXISTS `bu1_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `fullname` varchar(100) NOT NULL COMMENT 'Полное наименование',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Единицы измерения' AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `bu1_unit`
--

INSERT INTO `bu1_unit` (`id`, `name`, `fullname`) VALUES
(2, 'г', 'Грамм'),
(3, 'м', 'Метр'),
(4, 'пач', 'Пачка'),
(5, 'шт', 'Штука'),
(6, 'опер', 'Операция');

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_user`
--

CREATE TABLE IF NOT EXISTS `bu1_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT 'Роль',
  `username` varchar(100) NOT NULL COMMENT 'Имя пользователя',
  `password` varchar(100) NOT NULL COMMENT 'Пароль',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Полное имя',
  `created` date NOT NULL COMMENT 'Дата регистрации',
  `state` tinyint(1) NOT NULL COMMENT 'Состояние',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Пользователи' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `bu1_user`
--

INSERT INTO `bu1_user` (`id`, `role_id`, `username`, `password`, `fullname`, `created`, `state`) VALUES
(1, 1, 'admin', '$2a$13$I3CyBpf1lzYetoVOcG.l6OeB3uSvimyYvZry8ImJkM8yVB80QZnRu', 'Администратор системы', '2014-07-01', 1),
(2, 2, 'timur', '$2a$13$mpBmX4aKqzZ13fPBqem8j.i7xeAbn8WsPTS9EeDc9i0tS9P..YTZq', 'Тимур Мельников', '2014-08-03', 1),
(3, 3, 'beata', '$2a$13$hT3jQWhhgK6GIns02VLIQeh1rfhbsUJD0zx1odCSq5IMHf8EfvHAe', 'Беата Мельникова', '2014-08-05', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `bu1_wallet`
--

CREATE TABLE IF NOT EXISTS `bu1_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `state` tinyint(1) NOT NULL COMMENT 'Состояние (0-действуюший, 1-Закрытый)',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Кошельки' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `bu1_wallet`
--

INSERT INTO `bu1_wallet` (`id`, `name`, `state`, `user_id`) VALUES
(1, 'Карточка ФидоБанк', 0, 1),
(2, 'Наличные', 0, 1),
(3, 'Наличные', 0, 3),
(4, 'Карточка ПриватБанк', 1, 3);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bu1_categoryexp`
--
ALTER TABLE `bu1_categoryexp`
  ADD CONSTRAINT `bu1_categoryexp_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `bu1_categoryexp` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `bu1_categoryinc`
--
ALTER TABLE `bu1_categoryinc`
  ADD CONSTRAINT `bu1_categoryinc_ibfk_1` FOREIGN KEY (`wallet_default`) REFERENCES `bu1_wallet` (`id`),
  ADD CONSTRAINT `bu1_categoryinc_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bu1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `bu1_expense`
--
ALTER TABLE `bu1_expense`
  ADD CONSTRAINT `bu1_expense_ibfk_1` FOREIGN KEY (`categoryexp_id`) REFERENCES `bu1_categoryexp` (`id`),
  ADD CONSTRAINT `bu1_expense_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `bu1_unit` (`id`),
  ADD CONSTRAINT `bu1_expense_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `bu1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `bu1_income`
--
ALTER TABLE `bu1_income`
  ADD CONSTRAINT `bu1_income_ibfk_1` FOREIGN KEY (`categoryinc_id`) REFERENCES `bu1_categoryinc` (`id`),
  ADD CONSTRAINT `bu1_income_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bu1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `bu1_operwallet`
--
ALTER TABLE `bu1_operwallet`
  ADD CONSTRAINT `bu1_operwallet_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `bu1_wallet` (`id`),
  ADD CONSTRAINT `bu1_operwallet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bu1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `bu1_wallet`
--
ALTER TABLE `bu1_wallet`
  ADD CONSTRAINT `bu1_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bu1_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
