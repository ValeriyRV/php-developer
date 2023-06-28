-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2023 г., 10:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `in_deep_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `job_title`, `status`, `image`, `phone`, `address`, `vk`, `telegram`, `instagram`, `role`) VALUES
(1, 'valeriy.rvv@gmail.com', '$2y$10$m/zAOwCT9p3a0Ddo8RhUIut1Ux7GwW3Yljd2r.dXrIl6B1RY5MsQm', 'Валерий Рыжов', 'Senior PHP Programmer', 'success', 'avatar-b.png', '+7 999 888-77-55', 'Томск, ул. Елизаровых 70', 'https://vk.com/valeriyrv', 'https://t.me/ValeriyRV', 'https://instagram.com/valeriyrv', 'admin'),
(2, 'jeremysanders@smartadminwebapp.com', '$2y$10$MbLe.dQtfCokGkzhALgVXO0F6YSB3r5GQAx0fI4S9d9lGA1GztfvG', 'Jeremy Sanders', 'Network Designer, Gotbootstrap Inc.', 'success', '649bb6fcb1728.jpg', '+1 315 888-45-67', '129 Iron Road, Detroit, MI, 48212, USA', 'http://vk.com/valeriyrv', 'https://t.me/ValeriyRV', 'http://instagram.com/valeriyrv', 'user'),
(10, 'alitagray@smartadminwebapp.com', '$2y$10$D0LRMLXu7S.ongo4jNToJ./Dd8tNOCAqIwk7JmVIF6VvPS0WAnCt6', 'Alita Gray', 'Project Manager, Gotbootstrap Corp.', 'warning', '64948cf76ee3c.jpg', '+1 315-461-1347', '137 Hamtrammac, Detroit, MI, 48314, USA', 'https://vk.com/alitagrey', 'https://t.me/alitagrey', 'https://instagram.com/alitagrey', 'user'),
(11, 'john.cook@smartadminwebapp.com', '$2y$10$yl0EbfSMWr.k.kSHmJ5b3.Xl7pNPmyPNroBaWFRFdUqHiV.CYMlMS', 'Dr. John Cook', 'Human Resources, Gotbootstrap Inc.', 'success', 'avatar-e.png', '+1 313-779-1347', '55 Smyth Rd, Detroit, MI, 48341, USA', 'https://vk.com/DrJohnCook', 'https://t.me/DrJohnCook', 'https://instagram.com/DrJohnCook', 'user'),
(12, 'jim.ketty@smartadminwebapp.com', '$2y$10$YHtX/uaqXl9pVmOUwI.ei./0b1GKYefigo/Sdq46edHR9GjuV8RFe', 'Jim Ketty', 'Staff Orgnizer, Gotbootstrap Inc.', 'success', 'avatar-k.png', '+1 313-779-3314', '134 Tasy Rd, Detroit, MI, 48212, USA', 'https://vk.com/JimKetty', 'https://t.me/JimKetty', 'https://instagram.com/JimKetty', 'user'),
(13, 'john.oliver@smartadminwebapp.com', '$2y$10$xajxL.HnFTNRVq2cojUfJu1Zd/wv3UtS/FdYZy6nwQI/.ZDzQLydK', 'Dr. John Oliver', 'Oncologist, Gotbootstrap Inc.', 'warning', 'avatar-g.png', '+1 313-779-8134', '134 Gallery St, Detroit, MI, 46214, USA', 'https://vk.com/DrJohnOliver', 'https://t.me/DrJohnOliver', 'https://instagram.com/DrJohnOliver', 'user'),
(14, 'sarah.mcbrook@smartadminwebapp.com', '$2y$10$i3O7hQtmBuyPOf.363DyfOZq4.NesqFYEYsW6Fs1cXsc4tFbTwhtG', 'Sarah Mc Brook', 'Xray Division, Gotbootstrap Inc.', 'danger', 'avatar-h.png', '+1 313-779-7613', '13 Jamie Rd, Detroit, MI, 48313, USA', 'https://vk.com/SarahMcBrook', 'https://t.me/SarahMcBrook', 'https://instagram.com/SarahMcBrook', 'user'),
(15, 'jimmy.fallan@smartadminwebapp.com', '$2y$10$WQ61Pf94jR5VHaPuWf/1webNPcOjAdpMXjC7WOnYtfUzkTUzMXQVy', 'Jimmy Fellan', 'Accounting, Gotbootstrap Inc.', 'success', 'avatar-i.png', '+1 313-779-4314', '55 Smyth Rd, Detroit, MI, 48341, USA', 'https://vk.com/JimmyFellan', 'https://t.me/JimmyFellan', 'https://instagram.com/JimmyFellan', 'user'),
(16, 'arica.grace@smartadminwebapp.com', '$2y$10$U1KqPkT6ALGUVgm2Owwa8uliGfisYzF.P/6sefzWclZQttP21k4aC', 'Arica Grace', 'Accounting, Gotbootstrap Inc.', 'success', 'avatar-j.png', '+1 313-779-3347', '798 Smyth Rd, Detroit, MI, 48341, USA', 'https://vk.com/AricaGrace', 'https://t.me/AricaGrace', 'https://instagram.com/AricaGrace', 'user'),
(28, 'profile2@gmail.com', '$2y$10$OfS8HL588fZa0iy9bjJI1udxPjlmLnoBcyPQf4er0X81kIfeZZsMW', 'Profile 2', 'Tomica', 'success', '64949ff7e7c57.jpg', '+7 999 778-12-34', 'ул. Елизаровых 17', '', '', '', 'user'),
(29, 'profile1@gmail.com', '$2y$10$X14ejfpkkPcffg2CiWuzdu8ic7l4J80HDopB19M3/QduWzhyRP/tC', 'Profile 1', 'Tomline', 'success', '6494a09e9a70d.jpg', '+7 555 777-88-99', 'проспект Ленина 220', 'vk', 'tg', 'instagram', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
