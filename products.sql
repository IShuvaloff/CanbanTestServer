-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 16 2023 г., 11:51
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `canban-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Без категории',
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT 0.00,
  `voices` int(10) NOT NULL DEFAULT 0,
  `agroup` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'CANBAN-группа (1 - планы, 2 - в работе, 3 - готово)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category`, `image`, `rating`, `voices`, `agroup`) VALUES
(21, 'Холодильник Bosh', 999, 'Лучший холодильник только для вас по самой выгодной цене, скидка 10% при покупке сегодня!', 'БЫТОВАЯ ТЕХНИКА', 'https://damsovet.net/wp-content/uploads/2019/08/portativnyj-953x953.jpg', 0.00, 0, 2),
(23, 'Кофеварка Kittfort', 23500, 'Кофеварка для наиболее чувствительных и изысканных натур, настроит вас на самый лучший день в году!', 'КУХНЯ', 'https://static.shopandshow.ru/uploads/images/element/1c/97/f7/1c97f74b027249e39f859ec9183de900.jpg', 0.00, 0, 3),
(25, 'Дайте мне название!', 0, 'Расскажите обо мне! Двойной щелчок мышью по мне поможет вам!', '', '', 0.00, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
