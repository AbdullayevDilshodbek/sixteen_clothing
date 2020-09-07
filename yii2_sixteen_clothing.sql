-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2020 г., 22:12
-- Версия сервера: 10.2.7-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_sixteen_clothing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `yii_admin`
--

CREATE TABLE `yii_admin` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_admin`
--

INSERT INTO `yii_admin` (`id`, `login`, `password`, `status`, `authKey`, `accessToken`) VALUES
(1, 'don', '6a01bfa30172639e770a6aacb78a3ed4', 10, 'don', 'don'),
(2, 'ali', 'ali', 1, 'jey', 'jey');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_category`
--

CREATE TABLE `yii_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_category`
--

INSERT INTO `yii_category` (`id`, `name`) VALUES
(4, 'Yozgi'),
(5, 'Kuzgi');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_migration`
--

CREATE TABLE `yii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_migration`
--

INSERT INTO `yii_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1597856914),
('m200819_080112_create_users_table', 1597856917),
('m200819_084218_create_product_table', 1597856917),
('m200819_120657_create_trading_table', 1597856919),
('m200819_145301_create_review_table', 1597856920),
('m200819_164015_create_admin_table', 1597856920),
('m200820_160037_create_category_table', 1597939277),
('m200823_075032_create_user_table', 1598188919);

-- --------------------------------------------------------

--
-- Структура таблицы `yii_product`
--

CREATE TABLE `yii_product` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_product`
--

INSERT INTO `yii_product` (`id`, `name`, `cost`, `price`, `discount`, `description`, `img`, `category_id`, `added_date`) VALUES
(10, 'Jenfer', 100000, 105000, 0, 'Kuzgi qizil rangdagi jenfer, paxtadan tayorlangan sifatli kiyim', '246919327_274318.jpg', 5, '2020-08-30'),
(11, 'Cho\'tki palto', 1100000, 1250000, 10, 'Kuzgi qizil rangdagi jenfer, paxtadan tayorlangan sifatli kiyim', '246920856_301557.jpg', 5, '2020-08-30'),
(12, 'Spatrifka', 90, 100, 10, 'Kuzgi mavsumi uchun qulay Spatrifka, sifatli va hamyonbop', '246929590_277874.jpg', 5, '2020-08-28'),
(13, 'aas', 100000, 120000, 0, 'ajoyib', '246929579_279249.jpg', 5, '2020-08-30');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_review`
--

CREATE TABLE `yii_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `added_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `yii_trading`
--

CREATE TABLE `yii_trading` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `pay_amount` double DEFAULT NULL,
  `profit` int(11) NOT NULL,
  `discount` double NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_trading`
--

INSERT INTO `yii_trading` (`id`, `product_id`, `number`, `pay_amount`, `profit`, `discount`, `user_id`, `pay_date`) VALUES
(1, 10, 1, 105000, 0, 0, 1, '2020-08-28'),
(2, 10, 1, 105000, 0, 0, 1, '2020-08-28'),
(5, 10, 3, 315000, 0, 0, 1, '2020-08-28'),
(6, 10, 3, 315000, 0, 0, 1, '2020-08-28'),
(7, 10, 3, 315000, 0, 0, 1, '2020-08-28'),
(8, 11, 3, 3750000, 0, 0, 1, '2020-08-28'),
(9, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(10, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(11, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(12, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(13, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(14, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(15, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(16, 11, 1, 1250000, 0, 0, 1, '2020-08-28'),
(17, 11, 2, 2025000, 0, 10, 1, '2020-08-28'),
(18, 12, 1, 81, 0, 10, 1, '2020-08-28'),
(19, 12, 1, 90, 0, 10, 1, '2020-08-28'),
(21, 10, 1, 105000, 0, 0, 2, '2020-08-30'),
(22, 12, 1, 90, 90, 10, 2, '2020-08-30'),
(23, 12, 2, 180, 0, 10, 2, '2020-08-30'),
(24, 12, 1, 90, 0, 10, 2, '2020-08-30'),
(25, 12, 2, 180, 0, 10, 2, '2020-08-30'),
(26, 13, 1, 120000, 20000, 0, 2, '2020-08-30'),
(27, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(28, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(29, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(30, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(31, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(32, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(33, 11, 1, 1125000, 25000, 20, 2, '2020-09-02'),
(34, 11, 1, 1125000, 1125000, 10, 2, '2020-09-02'),
(35, 10, 1, 105000, 105000, 0, 2, '2020-09-02'),
(36, 10, 1, 105000, 105000, 0, 2, '2020-09-02'),
(37, 10, 1, 105000, 105000, 0, 2, '2020-09-02'),
(38, 12, 1, 90, 90, 10, 2, '2020-09-02'),
(39, 12, 1, 90, 90, 10, 2, '2020-09-02'),
(40, 12, 1, 90, 90, 10, 2, '2020-09-02'),
(41, 12, 1, 90, 90, 10, 2, '2020-09-02'),
(42, 12, 1, 90, 0, 10, 2, '2020-09-02'),
(43, 12, 1, 90, 90, 10, 2, '2020-09-02'),
(44, NULL, 7, 630, 0, 10, 1, '2020-09-07'),
(45, NULL, 7, 630, 0, 10, 1, '2020-09-07'),
(46, NULL, 7, 630, 0, 10, 1, '2020-09-07'),
(47, NULL, 1, 120000, 20000, 0, 10, '2020-09-07'),
(48, NULL, 1, 120000, 20000, 0, 10, '2020-09-07'),
(49, 10, 4, 105000, -295000, 0, 10, '2020-09-07'),
(50, NULL, 1, 120000, 20000, 0, 10, '2020-09-07'),
(51, NULL, 1, 120000, 20000, 0, 10, '2020-09-07');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_user`
--

CREATE TABLE `yii_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `wallet` double DEFAULT 0,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yii_user`
--

INSERT INTO `yii_user` (`id`, `full_name`, `wallet`, `login`, `password`, `password_hash`, `authKey`, `created_at`, `updated_at`) VALUES
(1, 'don', 0, 'don', '6a01bfa30172639e770a6aacb78a3ed4', '', 'don', 0, 0),
(2, 'ali', 0, 'ali', '86318e52f5ed4801abe1d13d509443de', '', 'ali', 0, 0),
(4, NULL, NULL, 'buqacha', NULL, '$2y$13$Q8zQ5e77T9taNTszv9eRwO6rDRGOxQMOFlU1Sq8FnSIz9y8L.9SG2', '_lL2j2LIwKf5c4X1T4JB9zmJTnl_-y8R', 1599477122, 1599477122),
(5, NULL, NULL, 'akmaljon', NULL, '$2y$13$Min1Jd6G1jXejVWRysXKXOccolI5MAtXGqC0npQYZikQgwfavGvbW', 'LUtWFtxbpuFNUhUtI3pUsQIdUq65eMvZ', 1599477362, 1599477362),
(6, NULL, NULL, 'andijon', NULL, '$2y$13$1jQdtdXTnniTR//2Rv1S6uLjp/EBwZCngLgy5GGN44EDKWG4apQg2', '6-Dk2GIdozd9jS4ob4exxoZQnQKdlbY7', 1599477937, 1599477937),
(10, NULL, 0, 'dilshod', '78fc092039ecfc7ce99d6dd9cfc5e59c', '$2y$13$Aul0/p6o3JACWfEavUCuCOAuEJPVryz/YyZZTvvmf.QUgHsfOCsYi', 'RVndWbVnePUDn4b3FyzyBKUKJ6mASh2c', 1599478974, 1599478974);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `yii_admin`
--
ALTER TABLE `yii_admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `yii_category`
--
ALTER TABLE `yii_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `yii_migration`
--
ALTER TABLE `yii_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `yii_product`
--
ALTER TABLE `yii_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `yii_review`
--
ALTER TABLE `yii_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_product` (`product_id`),
  ADD KEY `review_user` (`user_id`);

--
-- Индексы таблицы `yii_trading`
--
ALTER TABLE `yii_trading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `yii_user`
--
ALTER TABLE `yii_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `yii_admin`
--
ALTER TABLE `yii_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `yii_category`
--
ALTER TABLE `yii_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `yii_product`
--
ALTER TABLE `yii_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `yii_review`
--
ALTER TABLE `yii_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `yii_trading`
--
ALTER TABLE `yii_trading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT для таблицы `yii_user`
--
ALTER TABLE `yii_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `yii_product`
--
ALTER TABLE `yii_product`
  ADD CONSTRAINT `yii_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `yii_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `yii_review`
--
ALTER TABLE `yii_review`
  ADD CONSTRAINT `review_product` FOREIGN KEY (`product_id`) REFERENCES `yii_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `yii_trading`
--
ALTER TABLE `yii_trading`
  ADD CONSTRAINT `yii_trading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`id`),
  ADD CONSTRAINT `yii_trading_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `yii_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
