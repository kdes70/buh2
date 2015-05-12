-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 12 2015 г., 08:40
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
