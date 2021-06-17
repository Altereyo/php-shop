-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2021 г., 18:06
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `session_id` varchar(32) NOT NULL,
  `good_id` int(11) NOT NULL,
  `good_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`session_id`, `good_id`, `good_count`) VALUES
('vq1jaij4vda8ttjlsiv8vc5b4eu8i77g', 1, 3),
('vq1jaij4vda8ttjlsiv8vc5b4eu8i77g', 2, 1),
('vq1jaij4vda8ttjlsiv8vc5b4eu8i77g', 3, 2),
('l6lmbe6tldnmk4404dsm9mpoqsf0la7f', 3, 2),
('l6lmbe6tldnmk4404dsm9mpoqsf0la7f', 5, 2),
('l6lmbe6tldnmk4404dsm9mpoqsf0la7f', 6, 1),
('l6lmbe6tldnmk4404dsm9mpoqsf0la7f', 4, 1),
('l6lmbe6tldnmk4404dsm9mpoqsf0la7f', 2, 1),
('s5duckk93955v03oscqmo4h38c41t3fh', 2, 3),
('kcfs2j77t51fv1mlvrlh6rb9d1vkn4vc', 1, 1),
('kcfs2j77t51fv1mlvrlh6rb9d1vkn4vc', 3, 1),
('kcfs2j77t51fv1mlvrlh6rb9d1vkn4vc', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `comment`, `date`, `item_id`) VALUES
(1, 'Алексей', 'Что мне понравилось:\r\n- Цена (брал по скидке за 900 рублей).\r\n- Удобный софт в комплекте.\r\n- Неплохой диапазон dpi (200-8000).\r\n- Наличие двух боковых кнопок, которые вполне удобно ложатся под большой палец.\r\n- Настраиваемая подсветка. Настраиваются цвет и тип подсветки. Мелочь, но приятно.\r\n- Поддержка от Logitech.', '2021-02-10 20:45:42', 4),
(2, 'Василий', 'Прежде использовал накамерный микрофон Rode. Разница в качестве записи голоса колоссальная. Микрофон Boya однозначно стоит своих денег. Основной блок микрофона выполнен из металла, а не пластика. В комплекте идет батарейка, но при использовании со смартфоном ее установка не требуется. Микрофон полностью готов к использованию, как говорится, сразу из коробки. Установка дополнительного софта не требуется.', '2021-02-10 20:45:42', 1),
(3, 'Артемий', 'Несмотря на плохую надежность, все еще есть желание ей пользоваться. Так как гарантия не закончилась, планирую обменять на новую. Однако прямо сейчас думаю о покупке такой же. Будет у меня две)) Буду их по очереди менять) Все таки она действительно оставляет хорошие впечатления, пусть и работает всего лишь полгода-год.', '2021-02-10 20:51:50', 4),
(4, 'Павел', 'Сделал пока только пару тестовых записей, но звук приятно удивил за свои деньги. До этого писал на конденсаторный стационарный микрофон, что влечет за собой много лишнего при плохой акустике помещения, установку его на столе, расположение, поп фильтр и так далее. Тут же всё просто, повесил на грудь и не паришься что сейчас куда-то повернешься и на записи будет сильный провал по уровню. Голос слышно хорошо и даже лишних отражений минимум. Буду обкатывать дальше. Испоьзую его через внешнюю звуковую карту, хорошо был переходник с jack на xlr, на компьютерах были проблемы с прямым подключением, так как иногда компьютер пытается в него вывести звук (думает это гарнитура), либо вообще игнориует сам факт подключения, так что удобней просто доверить все эти хлопоты внешней звуковой карте. Пробовал mac, win и linux.', '2021-02-10 20:45:50', 1),
(59, 'testuser', 'testcomment', '2021-02-16 16:45:38', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `about` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `about`, `price`, `image`) VALUES
(1, 'Микрофон', 'Футляр в комплекте: кожанный мешок<br>\r\nТип: конденсаторный<br>\r\nКонструкция: петличный (клипса)<br>\r\nНазначение: для подкастов/радио/телевидения', 1850, 'microphone.jpg'),
(2, 'Фотоаппарат', 'Компактная фотокамера<br>\r\nМатрица 21.1 МП (1/2.3\")<br>\r\nМаксимальная выдержка: 15 с<br>\r\nЧувствительность 80 - 3200 ISO , AutoISO<br>\r\nСъемка видео Full HD<br>\r\nОптический зум 12x , режим макросъемки<br>\r\nЭкран 3\"<br>\r\nКарты памяти SDHC, Secure Digital, SDXC<br>\r\nИнтерфейсы Wi-Fi, видео, USB, аудио, HDMI, NFC<br>\r\nВес с элементами питания 147 г\r\n100х23х58 мм', 9000, 'camera.jpg'),
(3, 'Карта памяти', 'Тип карты памяти: microSDHC<br>\r\nОбъем памяти: 32 ГБ<br>\r\nСкорость чтения/записи данных: 95 / 20 МБ/с<br>\r\nКласс скорости: Class 10', 500, 'sdcard.jpg'),
(4, 'Мышь компьютерная', 'Принцип работы: оптическая светодиодная<br>\r\nРазрешение оптического сенсора: 1000 dpi<br>\r\nТип подключения: беспроводной (радиоканал)<br>\r\nИнтерфейс подключения: USB<br>\r\nКоличество клавиш: 4<br>\r\nБесшумное нажатие клавиш: да<br>\r\nДизайн: для правой и левой руки, с подсветкой<br>\r\nИсточник питания: 1xAA<br>\r\nВес: 140 г', 1000, 'mouse.jpg'),
(5, 'Клавиатура', 'Тип: мембранная<br>\r\nПодключение: проводная<br>\r\nПодсветка: да<br>\r\nКабель: USB<br>\r\nКоличество клавиш: 114, с цифровым блоком<br>\r\nКоличество дополнительных клавиш: 10<br>\r\nРазмеры: 480x15x150 мм, вес: 640 г', 1500, 'keyboard.jpg'),
(6, 'Монитор', 'Тип матрицы: *VA, 75 Гц<br>\r\nРазрешение: 1920x1080 (16:9)<br>\r\nВремя отклика: 4 мс<br>\r\nРазъемы: HDMI, VGA (D-Sub)<br>\r\nЯркость: 250 кд/м²<br>\r\nУглы обзора: по горизонтали 178°, по вертикали 178°', 7000, 'monitor.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `popularity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `popularity`) VALUES
(1, '01.jpg', 0),
(2, '02.jpg', 1),
(3, '03.jpg', 0),
(4, '04.jpg', 1),
(5, '05.jpg', 0),
(6, '06.jpg', 2),
(7, '07.jpg', 0),
(8, '08.jpg', 0),
(9, '09.jpg', 16),
(10, '10.jpg', 0),
(11, '11.jpg', 0),
(12, '12.jpg', 4),
(13, '13.jpg', 4),
(14, '14.jpg', 1),
(15, '15.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `session_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `phone`, `session_id`) VALUES
(15, '+9(999)999-99-99', 'vq1jaij4vda8ttjlsiv8vc5b4eu8i77g'),
(16, '+9(218)732-89-10', 'l6lmbe6tldnmk4404dsm9mpoqsf0la7f'),
(17, '+8(929)231-13-33', 's5duckk93955v03oscqmo4h38c41t3fh'),
(18, '+1(231)231-23-13', 'kcfs2j77t51fv1mlvrlh6rb9d1vkn4vc');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_permission` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_permission`) VALUES
(1, 'admin', '$2y$10$BPrWdQRNPrVLtprnB6yJAuHKMHvKuhqsMtGtAzpRnw8QYmzjzLVDq', 'admin'),
(4, 'sdff', '$2y$10$2X.iGuiq2AE4vKE.wrn4Su.DD96dMYyFIpTDM4WZdmGSLCRy3IfAG', 'user'),
(5, 'asdasd', '$2y$10$hYTlcEhWHogIsSiFEPZncuCPVSgQT1ZOFx2jsAytlIoo8wmJiSTMy', 'user'),
(6, '2q3w45rtyuykjhgre', '$2y$10$4j2/fFxUSp1TrXTYn1MdEu9P0aHrMhYgJY7IVd54DtbibD7hPJy4a', 'user'),
(8, 'test user', '$2y$10$gX.U8LEBqB6y7K7b7NO5GOwJTf9Z.I.h4.ByJ.kNM3dTumjTSDwce', 'user'),
(9, 'qweqwe', '$2y$10$l/AAi5/K7mP17cgZ.dkJVuVcFNHDkMKop8Y8oiMZm8atlUxOytWLK', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
