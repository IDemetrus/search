-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2018 г., 14:29
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `brave`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES
(1, 'Moscow', 1),
(2, 'Sain-Petersburg', 1),
(3, 'Samara', 1),
(4, 'Kazan', 1),
(5, 'Izhevsk', 1),
(6, 'Perm', 1),
(7, 'Omsk', 1),
(8, 'Vladivostok', 1),
(9, 'Novosibirsk', 1),
(10, 'Sevastopol', 1),
(11, 'Boston', 2),
(12, 'Washingthon', 2),
(13, 'Miami', 2),
(14, 'Los-Angeles', 2),
(15, 'New Jersey', 2),
(16, 'San Jose', 2),
(17, 'New York', 2),
(18, 'San Diego', 2),
(19, 'Las Vegas', 2),
(20, 'Chicago', 2),
(21, 'Milan', 3),
(22, 'Rome', 3),
(23, 'Pisa', 3),
(24, 'Palermo', 3),
(25, 'Turin', 3),
(26, 'Genoa', 3),
(27, 'Siena', 3),
(28, 'Bari', 3),
(29, 'Sorrento', 3),
(30, 'Matera', 3),
(31, 'Madrid', 4),
(32, 'Barcelona', 4),
(33, 'Valencia', 4),
(34, 'Malaga', 4),
(35, 'Seville', 4),
(36, 'Bilbao', 4),
(37, 'Granada', 4),
(38, 'Zaragosa', 4),
(39, 'Toledo', 4),
(40, 'Cordoba', 4),
(41, 'London', 5),
(42, 'Manchester', 5),
(43, 'Newcastle', 5),
(44, 'Liverpool', 5),
(45, 'Leeds', 5),
(46, 'Cardiff', 5),
(47, 'Oxford', 5),
(48, 'Cambridge', 5),
(49, 'Birmingham', 5),
(50, 'York', 5),
(51, 'Sochi', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `cities` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`, `cities`) VALUES
(1, 'Russia', 1),
(2, 'United States', 17),
(3, 'Italy', 20),
(4, 'Spain', 20),
(5, 'Great Britain', 20);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`cities`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`cities`) REFERENCES `city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
