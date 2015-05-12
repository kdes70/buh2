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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
