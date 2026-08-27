-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2024 г., 17:04
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
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int UNSIGNED NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `problem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch_id` int UNSIGNED NOT NULL,
  `date_str` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `services_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `message`, `problem`, `branch_id`, `date_str`, `created_at`, `status_id`, `user_id`, `services_id`) VALUES
(46, NULL, 'Проблемки', 1, '2024-05-29 21:54:00', '2024-05-28 21:54:12', 1, 5, 1),
(47, NULL, 'Другая проблема', 1, '2024-05-30 21:55:00', '2024-05-28 21:56:06', 1, 8, 1),
(48, '', '321321321', 3, '2024-05-31 21:56:00', '2024-05-28 21:56:45', 3, 6, 5),
(49, NULL, 'Проблемки', 1, '2024-05-29 21:54:00', '2024-05-28 21:54:12', 1, 5, 1),
(50, NULL, 'Другая проблема', 1, '2024-05-30 21:55:00', '2024-05-28 21:56:06', 1, 8, 1),
(51, '123', '321321321', 3, '2024-05-31 21:56:00', '2024-05-28 21:56:45', 2, 6, 5),
(52, NULL, 'Проблемки', 1, '2024-05-29 21:54:00', '2024-05-28 21:54:12', 1, 5, 1),
(53, NULL, 'Другая проблема', 1, '2024-05-30 21:55:00', '2024-05-28 21:56:06', 1, 8, 1),
(55, NULL, 'Проблемки', 1, '2024-05-29 21:54:00', '2024-05-28 21:54:12', 1, 5, 1),
(56, NULL, 'Другая проблема', 1, '2024-05-30 21:55:00', '2024-05-28 21:56:06', 1, 8, 1),
(59, NULL, '333', 3, '2024-05-30 23:06:00', '2024-05-28 23:06:20', 1, 5, 3),
(60, NULL, '123', 2, '2024-06-01 05:00:00', '2024-06-01 11:04:12', 1, 5, 1),
(61, NULL, 'f3f323f', 1, '2024-06-23 14:35:00', '2024-06-23 13:34:50', 1, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `branch`
--

CREATE TABLE `branch` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `branch`
--

INSERT INTO `branch` (`id`, `title`) VALUES
(1, 'Ул. Дыбенко (Метро Ул. Дыбенко)'),
(2, 'Пр. Энергетиков (Метро Ладожская)'),
(3, 'Ул. Ильюшина (Метро Комендатский пр.)');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id`, `title`) VALUES
(1, 'Фистерова Светлана Дмитриевна'),
(2, 'Александров Игорь Сергеевич'),
(3, 'Гришина Дарья Валентиновна');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at_feedback` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `content`, `created_at_feedback`, `photo`) VALUES
(27, 'Екатерина Смирнова', 'Делала имплантацию в этой клинике. Врач всё подробно объяснил, лечение прошло комфортно, никакой боли. Прошло уже несколько месяцев — имплант прижился отлично. Спасибо за профессионализм!', '2024-06-15 12:00:00', ''),
(28, 'Дмитрий Ковалёв', 'Лечил кариес, попал точно по времени записи, без ожидания. Врач аккуратный, всё рассказал и показал снимки до и после. Очень доволен качеством и отношением.', '2024-07-02 15:30:00', ''),
(29, 'Ольга Петрова', 'Водила сына к детскому стоматологу. Ребёнок совершенно не боялся — врач отвлёк его, всё прошло быстро и без слёз. Огромная благодарность за терпение и доброту!', '2024-08-20 10:45:00', ''),
(30, 'Анна Морозова', 'Делала протезирование передних зубов. Цена и результат приятно удивили — улыбка выглядит естественно, к зубам невозможно придраться. Рекомендую клинику всем знакомым.', '2024-09-11 17:20:00', ''),
(32, 'Сергей Антонов', 'Хожу на профессиональную чистку раз в полгода. Всегда чисто, кресло удобное, врач подбирает средства по уходу. Администраторы приветливые, записали на удобное время.', '2024-10-05 13:10:00', ''),
(33, 'Марина Волкова', 'Записывалась на консультацию, всё прошло по времени без задержек. Специалист внимательно выслушал, составил понятный план лечения. Чувствуется забота о пациентах!', '2024-11-18 11:35:00', '');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(4, 'user'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`) VALUES
(1, 'Личная гигиена'),
(2, 'Терапевтия'),
(3, 'Протезирование'),
(4, 'Ортодонтия'),
(5, 'Имплантация зубов'),
(6, 'Детская стоматология\n'),
(7, 'Лицевая хирургия'),
(8, 'Массаж');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'На рассмотрении'),
(2, 'Принято'),
(3, 'Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `full_name`, `password`, `auth_key`, `role_id`, `phone`, `email`) VALUES
(5, 'username', 'Обычный пользователь', '$2y$13$33pJec1LFGUrOFNRRfzQeuWLd8LQvodddlTlu3vlsYUxcvKzxnzfS', 'CVQAX04zlQOheFMBSeiAuAW_MMx80ZF_', 4, '+7(111)-111-11-11', 'user@yandex.ru'),
(6, 'admin', 'Обычный администратор', '$2y$13$4Q67VP5Hdnk7Vy2Bh8KEtu95WvS/yDYwFjWPgipv4ByKJSGedxZ0S', 'cmrKrCyKeaCpt9JgNqjjh4Eu9kv09rPK', 5, '+7(222)-222-22-22', 'admin@yandex.ru'),
(7, 'username1', 'Иван Михалев', '$2y$13$N1ONzJhqkGj4NAnwuwW7luPWpHwZ/hjTNGdGMdEkkmGH/zZX6VCbS', '7douH1_QRqa1Zn9l1snGfKRqJcv8xW8a', 4, '+7(898)-117-63-54', 'ivanmix2003@yandex.ru'),
(8, 'iopiopiop', 'Сссс', '$2y$13$UsjFTHCGqwTskPyfGR8I2OG7HYvXxOz.JZ1R1bBppwD7IqQ3Uc9hO', 'gsOXCuGAOUpHY5xvXKxvXZiS38WfE38H', 4, '+7(111)-111-11-11', 'ivanmix2001@yandex.ru'),
(9, 'newuser', 'Иван Михалев', '$2y$13$wfJYgN1yiT8lZrL6d2UgbuAcWS.MOMPJUjN50/.2p0Cat1xxcp1LK', 'xF5BKHk5fZyBp8EqSHTwKODZxqZ2kNhs', 4, '+7(898)-117-63-54', 'ivanmix2002@yandex.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `services_id` (`services_id`);

--
-- Индексы таблицы `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
