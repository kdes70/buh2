-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2015 г., 15:08
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
-- Структура таблицы `db1_categoryexp`
--

CREATE TABLE IF NOT EXISTS `db1_categoryexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Родительская категория',
  `name` varchar(20) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории расходов' AUTO_INCREMENT=115 ;

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
(109, 94, 'Нерегулярные перевоз'),
(110, 82, 'Газ'),
(111, 82, 'Электроэнергия'),
(112, 82, 'Вода'),
(113, 82, 'Мусор'),
(114, 77, 'Лекарства');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_catexp`
--

CREATE TABLE IF NOT EXISTS `db1_catexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `depth` int(11) NOT NULL DEFAULT '0' COMMENT 'Глубина',
  `name` varchar(20) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_u` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории расходов' AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `db1_catexp`
--

INSERT INTO `db1_catexp` (`id`, `lft`, `rgt`, `depth`, `name`) VALUES
(13, 1, 30, 0, 'Корень'),
(14, 2, 11, 1, 'Продукты питания'),
(15, 12, 21, 1, 'Транспорт'),
(16, 22, 29, 1, 'Коммунальные услуги'),
(17, 9, 10, 2, 'Мясо'),
(18, 7, 8, 2, 'Хлеб'),
(19, 5, 6, 2, 'Творог'),
(20, 3, 4, 2, 'Кетчуп'),
(21, 19, 20, 2, 'Такси'),
(22, 17, 18, 2, 'Автобус'),
(23, 15, 16, 2, 'ЖД'),
(24, 13, 14, 2, 'Самолет'),
(25, 27, 28, 2, 'Газ'),
(26, 25, 26, 2, 'Вода'),
(27, 23, 24, 2, 'Электричество');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_expense`
--

CREATE TABLE IF NOT EXISTS `db1_expense` (
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
-- Дамп данных таблицы `db1_expense`
--

INSERT INTO `db1_expense` (`id`, `cost`, `amount`, `unit_id`, `categoryexp_id`, `name`, `date_oper`, `user_id`, `operwallet_id`) VALUES
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
-- Структура таблицы `db1_tree`
--

CREATE TABLE IF NOT EXISTS `db1_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Левый ключ',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Правый ключ',
  `depth` int(11) NOT NULL DEFAULT '0' COMMENT 'Уровень',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  KEY `nested_sets` (`lft`,`rgt`,`depth`) COMMENT 'Индекс структуры категорий'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории расходов' AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `db1_tree`
--

INSERT INTO `db1_tree` (`id`, `lft`, `rgt`, `depth`, `name`) VALUES
(19, 1, 10, 0, 'Countries'),
(20, 2, 5, 1, 'Australia'),
(21, 6, 7, 1, 'Australia'),
(22, 8, 9, 1, 'Australia'),
(23, 3, 4, 2, 'Australia1');

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

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `db1_categoryexp`
--
ALTER TABLE `db1_categoryexp`
  ADD CONSTRAINT `db1_categoryexp_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `db1_categoryexp` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
