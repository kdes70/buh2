-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 13 2015 г., 19:20
-- Версия сервера: 10.1.8-MariaDB
-- Версия PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `buh2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_assignment`
--

CREATE TABLE `db1_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

--
-- Дамп данных таблицы `db1_auth_assignment`
--

INSERT INTO `db1_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1439889952),
('admin', '2', 1438844337),
('show_all', '1', 1439889951),
('show_all', '3', 1439890300),
('user', '1', 1439889953),
('user', '3', 1439890301);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_item`
--

CREATE TABLE `db1_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

--
-- Дамп данных таблицы `db1_auth_item`
--

INSERT INTO `db1_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1438842221, 1438842221),
('show_all', 1, 'Просмотр всех', NULL, NULL, 1439294547, 1439294547),
('user', 1, 'Пользователь', NULL, NULL, 1438842221, 1438842221);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_item_child`
--

CREATE TABLE `db1_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_auth_rule`
--

CREATE TABLE `db1_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица для RBAC';

-- --------------------------------------------------------

--
-- Структура таблицы `db1_categoryexp`
--

CREATE TABLE `db1_categoryexp` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Родительская категория',
  `name` varchar(20) NOT NULL COMMENT 'Наименование'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории расходов';

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

CREATE TABLE `db1_categoryinc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Пользователь',
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек по умолчанию'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории доходов';

--
-- Дамп данных таблицы `db1_categoryinc`
--

INSERT INTO `db1_categoryinc` (`id`, `user_id`, `name`, `wallet_id`) VALUES
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

CREATE TABLE `db1_exchange` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL COMMENT 'Дата начала',
  `currency_code` varchar(3) NOT NULL COMMENT 'Код валюты',
  `number_units` int(11) NOT NULL COMMENT 'Количество единиц',
  `official_exchange` decimal(10,6) NOT NULL COMMENT 'Официальный курс'
) COMMENT='Уникальность кода валюты за дату';

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
(21, '2015-07-27', 'RUB', 10, '3.803300'),
(22, '2015-07-28', 'USD', 100, '2206.227800'),
(23, '2015-07-28', 'EUR', 100, '2439.646700'),
(24, '2015-07-28', 'RUB', 10, '3.753300'),
(25, '2015-12-11', 'USD', 100, '2386.009400'),
(26, '2015-12-13', 'USD', 100, '2386.009400');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_expense`
--

CREATE TABLE `db1_expense` (
  `id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL COMMENT 'Сумма расхода',
  `unit_id` int(11) NOT NULL COMMENT 'Единица измерения',
  `count_unit` decimal(10,2) NOT NULL COMMENT 'Количество',
  `categoryexp_id` int(11) NOT NULL COMMENT 'Категория расходов',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Расходы';

--
-- Дамп данных таблицы `db1_expense`
--

INSERT INTO `db1_expense` (`id`, `cost`, `unit_id`, `count_unit`, `categoryexp_id`, `description`, `date_oper`, `user_id`, `wallet_id`) VALUES
(39, '1.00', 1, '0.00', 92, NULL, '2015-07-22', 2, 2),
(40, '3.00', 1, '0.00', 90, '3', '2015-07-23', 2, 2),
(41, '33.00', 1, '0.00', 90, '', '2015-07-23', 2, 2),
(44, '3.00', 1, '0.00', 91, '', '2015-07-24', 2, 3),
(45, '10.00', 1, '0.00', 99, 'Хек', '2015-07-24', 2, 3),
(46, '150.00', 1, '0.00', 89, '', '2015-07-27', 2, 3),
(47, '350.00', 1, '0.00', 122, '23423423', '2015-07-27', 2, 1),
(48, '40.00', 1, '0.00', 122, 'Ява', '2015-07-27', 2, 1),
(50, '10.00', 1, '0.00', 99, 'Хек', '2015-07-28', 2, 3),
(51, '150.00', 1, '0.00', 89, '', '2015-07-28', 2, 2),
(52, '3.00', 10, '1.00', 94, 'Проезд на транспорте', '2015-07-28', 2, 3),
(53, '150.00', 1, '0.00', 89, '', '2015-07-28', 2, 3),
(54, '3.00', 1, '0.00', 94, 'Проезд в маршрутке', '2015-07-28', 2, 3),
(55, '12.50', 1, '0.00', 83, '', '2015-07-29', 2, 1),
(56, '10.00', 1, '0.00', 83, '', '2015-07-30', 3, 4),
(57, '3.00', 10, '1.00', 94, 'Проезд в маршрутке (по городу)', '2015-08-03', 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_expensetemp`
--

CREATE TABLE `db1_expensetemp` (
  `id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL COMMENT 'Сумма расхода',
  `unit_id` int(11) NOT NULL COMMENT 'Единица измерения',
  `count_unit` decimal(10,2) NOT NULL COMMENT 'Количество',
  `categoryexp_id` int(11) NOT NULL COMMENT 'Категория расходов',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)',
  `name` varchar(50) NOT NULL COMMENT 'Наименование'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Шаблоны расходов';

--
-- Дамп данных таблицы `db1_expensetemp`
--

INSERT INTO `db1_expensetemp` (`id`, `cost`, `unit_id`, `count_unit`, `categoryexp_id`, `description`, `user_id`, `wallet_id`, `name`) VALUES
(41, '150.00', 1, '0.00', 89, '', 2, 3, 'Интернет'),
(42, '10.00', 1, '0.00', 83, '', 3, 4, 'Хлеб'),
(43, '3.00', 10, '1.00', 94, 'Проезд в маршрутке (по городу)', 2, 3, 'Проезд в маршрутке');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_income`
--

CREATE TABLE `db1_income` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL COMMENT 'Сумма дохода',
  `categoryinc_id` int(11) NOT NULL COMMENT 'Категория доходов',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `wallet_id` int(11) NOT NULL COMMENT 'Кошелек (счет)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Доходы';

--
-- Дамп данных таблицы `db1_income`
--

INSERT INTO `db1_income` (`id`, `amount`, `categoryinc_id`, `date_oper`, `user_id`, `wallet_id`) VALUES
(3, '100.00', 3, '2015-01-01', 3, 2),
(6, '600.00', 12, '2015-07-24', 3, 5),
(8, '1000.00', 6, '2015-07-24', 2, 2),
(9, '1500.00', 3, '2015-07-28', 2, 1),
(10, '2000.00', 6, '2015-07-28', 2, 3),
(11, '300.00', 6, '2015-12-13', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_migration`
--

CREATE TABLE `db1_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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

CREATE TABLE `db1_move` (
  `id` int(11) NOT NULL,
  `wallet_from` int(11) NOT NULL COMMENT 'Из кошелька',
  `wallet_to` int(11) NOT NULL COMMENT 'В кошелек',
  `move_sum` decimal(10,2) NOT NULL COMMENT 'Перемещаемая сумма',
  `date_oper` date NOT NULL COMMENT 'Дата операции',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `description` varchar(200) DEFAULT NULL COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Перемещения';

--
-- Дамп данных таблицы `db1_move`
--

INSERT INTO `db1_move` (`id`, `wallet_from`, `wallet_to`, `move_sum`, `date_oper`, `user_id`, `description`) VALUES
(4, 1, 2, '22.00', '2015-07-25', 2, ''),
(5, 1, 5, '100.00', '2015-07-25', 2, ''),
(6, 2, 3, '85.21', '2015-07-28', 2, ''),
(7, 4, 3, '10.00', '2015-07-30', 3, '');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_setting`
--

CREATE TABLE `db1_setting` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Пользователь',
  `settingparam_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `unit_code` varchar(20) NOT NULL COMMENT 'Код раздела',
  `setting_code` varchar(25) NOT NULL COMMENT 'Код настройки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Настройки';

--
-- Дамп данных таблицы `db1_setting`
--

INSERT INTO `db1_setting` (`id`, `user_id`, `settingparam_id`, `name`, `unit_code`, `setting_code`) VALUES
(2, 2, 1, 'Кошелек по умолчанию', '', ''),
(3, 2, 2, 'Единица измерения по умолчанию', '', ''),
(4, 3, 1, 'Количество записей в гриде', '', ''),
(5, 3, 2, 'Настройка 1', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_settingparam`
--

CREATE TABLE `db1_settingparam` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Наименование'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Параметры настроек';

--
-- Дамп данных таблицы `db1_settingparam`
--

INSERT INTO `db1_settingparam` (`id`, `name`) VALUES
(1, 'Количество записей в гриде'),
(2, 'Кошелек по умолчанию');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_unit`
--

CREATE TABLE `db1_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `fullname` varchar(100) NOT NULL COMMENT 'Полное наименование'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Единицы измерения';

--
-- Дамп данных таблицы `db1_unit`
--

INSERT INTO `db1_unit` (`id`, `name`, `fullname`) VALUES
(1, 'опер', 'Операция'),
(2, 'г', 'Грамм'),
(3, 'м', 'Метр'),
(4, 'пач', 'Пачка'),
(5, 'шт', 'Штука'),
(6, 'м2', 'Метр квадратный'),
(9, 'кг', 'Килограмм'),
(10, 'проезд', 'Проезд');

-- --------------------------------------------------------

--
-- Структура таблицы `db1_user`
--

CREATE TABLE `db1_user` (
  `id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Полное имя',
  `username` varchar(255) NOT NULL COMMENT 'Имя пользователя',
  `auth_key` varchar(32) DEFAULT NULL,
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL COMMENT 'Хеш пароля',
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL COMMENT 'E-mail',
  `state` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Состояние'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db1_user`
--

INSERT INTO `db1_user` (`id`, `created_at`, `updated_at`, `fullname`, `username`, `auth_key`, `email_confirm_token`, `password_hash`, `password_reset_token`, `email`, `state`) VALUES
(1, 1429777037, 1438175197, 'Супер пользователь системы', 'root', '0ZIG7OZCKEOR7JyE20g0Rh-R_NVlipex', NULL, '$2y$13$NVfh/naxh8QWQtMeTeumjOzcqGaGm6uNHwXpbzyjj5rWJejqyI4I.', NULL, 'admin@ukr.net', 0),
(2, 1429777037, 1438175211, 'Мельников Тимур Викторович', 'timur', 'b8HKw5Lt3NqQQxw1Ly1L2jkH2N7B1ZR4', NULL, '$2y$13$KFS/bKU0RZjBDv49ePch2OlepQqDGlEPmRhxZEoSYwGwBEHRXl0pu', NULL, 'timur@ukr.net', 0),
(3, 1429777037, 1438238903, 'Мельников Беатриса Леонидовна', 'beata', 'xotK69FcZqF5LKRrK4bNGawddzqAzSSQ', NULL, '$2y$13$vXZ2pkOxCm4xL9u27Uks9eaWHtzDgqMW144lmgVOgDjXk3w3utK0m', NULL, 'beata@ukr.net', 0),
(8, 1429777037, 1438175252, 'Морозова Даша', 'dasha', 'd4-Xo9XcUIptBQZz4aw4KNphHOgk0YV6', NULL, '$2y$13$hwH2t9ZTVz3WjzPth08LAuw1KIk/0wEGCnZzhwCu2DZmwWSQ8fDce', NULL, 'dasha@ukr.net', 0),
(9, 1438173491, 1450030695, 'Иванов Иван Иванович', 'ivan', 'wvuR4DneyhggRSb1_WRWBaIdcr8r2N3l', NULL, '$2y$13$UvDYiOOGTkoJsos4Cz6c4Oa82Kn18uYWGm.qWkD8xMBfnunAjQYyi', NULL, 'ivan@mail.ru', 1),
(10, 1438238946, 1438239355, 'Тестовый пользователь', 'test', 'JmbK41cLCKzHgXWAwbVRFSH9Y2mpMrLg', NULL, '$2y$13$d8Tf2E09pyIxj7z.PFtSuOm/v3q5T7TaMaq/Vx7P4wfcXSguspJu6', NULL, 'test@test.ua', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db1_wallet`
--

CREATE TABLE `db1_wallet` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Наименование',
  `current_sum` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Текущая сумма',
  `state` tinyint(1) NOT NULL COMMENT 'Состояние (0-действуюший, 1-Закрытый)',
  `user_id` int(11) NOT NULL COMMENT 'Пользователь'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Кошельки';

--
-- Дамп данных таблицы `db1_wallet`
--

INSERT INTO `db1_wallet` (`id`, `name`, `current_sum`, `state`, `user_id`) VALUES
(1, 'Карточка FidoBank', '1797.50', 0, 2),
(2, 'Карточка Приват', '0.00', 1, 2),
(3, 'Наличные', '2063.88', 0, 2),
(4, 'Карточка Приват', '80.00', 0, 3),
(5, 'Наличные', '700.00', 0, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db1_auth_assignment`
--
ALTER TABLE `db1_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `db1_auth_item`
--
ALTER TABLE `db1_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `idx-auth_item-type` (`type`),
  ADD KEY `idx_rule_name` (`rule_name`);

--
-- Индексы таблицы `db1_auth_item_child`
--
ALTER TABLE `db1_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `idx_child` (`child`);

--
-- Индексы таблицы `db1_auth_rule`
--
ALTER TABLE `db1_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `db1_categoryexp`
--
ALTER TABLE `db1_categoryexp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_name` (`name`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Индексы таблицы `db1_categoryinc`
--
ALTER TABLE `db1_categoryinc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_categoryinc_uniq` (`name`,`user_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_wallet_default` (`wallet_id`);

--
-- Индексы таблицы `db1_exchange`
--
ALTER TABLE `db1_exchange`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_exchange_uniq` (`currency_code`,`start_date`);

--
-- Индексы таблицы `db1_expense`
--
ALTER TABLE `db1_expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_wallet_id` (`wallet_id`),
  ADD KEY `idx_unit_id` (`unit_id`),
  ADD KEY `idx_categoryexp_id` (`categoryexp_id`);

--
-- Индексы таблицы `db1_expensetemp`
--
ALTER TABLE `db1_expensetemp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_expensetemp_uniq` (`user_id`,`name`),
  ADD UNIQUE KEY `idx_expensetemp_uniq1` (`cost`,`categoryexp_id`,`description`,`user_id`,`wallet_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_wallet_id` (`wallet_id`),
  ADD KEY `idx_unit_id` (`unit_id`),
  ADD KEY `idx_categoryexp_id` (`categoryexp_id`);

--
-- Индексы таблицы `db1_income`
--
ALTER TABLE `db1_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category_id` (`categoryinc_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_wallet_id` (`wallet_id`);

--
-- Индексы таблицы `db1_migration`
--
ALTER TABLE `db1_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `db1_move`
--
ALTER TABLE `db1_move`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_wallet_from` (`wallet_from`),
  ADD KEY `idx_wallet_to` (`wallet_to`);

--
-- Индексы таблицы `db1_setting`
--
ALTER TABLE `db1_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_setting_uniq` (`user_id`,`settingparam_id`),
  ADD KEY `idx_settingparam_id` (`settingparam_id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Индексы таблицы `db1_settingparam`
--
ALTER TABLE `db1_settingparam`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db1_unit`
--
ALTER TABLE `db1_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_name` (`name`);

--
-- Индексы таблицы `db1_user`
--
ALTER TABLE `db1_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_username` (`username`),
  ADD KEY `idx_user_email` (`email`),
  ADD KEY `idx_user_status` (`state`);

--
-- Индексы таблицы `db1_wallet`
--
ALTER TABLE `db1_wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db1_categoryexp`
--
ALTER TABLE `db1_categoryexp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT для таблицы `db1_categoryinc`
--
ALTER TABLE `db1_categoryinc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `db1_exchange`
--
ALTER TABLE `db1_exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db1_expense`
--
ALTER TABLE `db1_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT для таблицы `db1_expensetemp`
--
ALTER TABLE `db1_expensetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `db1_income`
--
ALTER TABLE `db1_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `db1_move`
--
ALTER TABLE `db1_move`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `db1_setting`
--
ALTER TABLE `db1_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `db1_settingparam`
--
ALTER TABLE `db1_settingparam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `db1_unit`
--
ALTER TABLE `db1_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `db1_user`
--
ALTER TABLE `db1_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `db1_wallet`
--
ALTER TABLE `db1_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `db1_categoryinc_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`),
  ADD CONSTRAINT `db1_categoryinc_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_expense`
--
ALTER TABLE `db1_expense`
  ADD CONSTRAINT `db1_expense_ibfk_2` FOREIGN KEY (`categoryexp_id`) REFERENCES `db1_categoryexp` (`id`),
  ADD CONSTRAINT `db1_expense_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`),
  ADD CONSTRAINT `db1_expense_ibfk_4` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`),
  ADD CONSTRAINT `db1_expense_ibfk_5` FOREIGN KEY (`unit_id`) REFERENCES `db1_unit` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_expensetemp`
--
ALTER TABLE `db1_expensetemp`
  ADD CONSTRAINT `db1_expensetemp_ibfk_1` FOREIGN KEY (`categoryexp_id`) REFERENCES `db1_categoryexp` (`id`),
  ADD CONSTRAINT `db1_expensetemp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`),
  ADD CONSTRAINT `db1_expensetemp_ibfk_3` FOREIGN KEY (`wallet_id`) REFERENCES `db1_wallet` (`id`),
  ADD CONSTRAINT `db1_expensetemp_ibfk_4` FOREIGN KEY (`unit_id`) REFERENCES `db1_unit` (`id`);

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
  ADD CONSTRAINT `db1_setting_ibfk_1` FOREIGN KEY (`settingparam_id`) REFERENCES `db1_settingparam` (`id`),
  ADD CONSTRAINT `db1_setting_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

--
-- Ограничения внешнего ключа таблицы `db1_wallet`
--
ALTER TABLE `db1_wallet`
  ADD CONSTRAINT `db1_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db1_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
