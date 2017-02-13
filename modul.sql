-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 13 2017 г., 12:03
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `modul`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Спорт'),
(2, 'Культура'),
(3, 'Наука и Мирт'),
(4, 'Общество'),
(5, 'Политика'),
(6, 'Здоровье'),
(7, 'Наша Планета'),
(8, 'Психология'),
(9, 'Археология'),
(10, 'История');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` smallint(5) NOT NULL,
  `id_news` int(11) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `id_parent` int(10) UNSIGNED DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cnt_like` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cnt_dislike` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_news`, `comment`, `id_parent`, `date_time`, `cnt_like`, `cnt_dislike`, `is_active`) VALUES
(242, 48, 12, 'erwewe', 0, '2017-02-12 00:09:41', 1, 0, 1),
(243, 48, 12, 'weewe', 0, '2017-02-12 00:12:48', 0, 0, 1),
(244, 48, 12, 'qqqq', 0, '2017-02-12 00:12:53', 0, 0, 1),
(245, 48, 12, 'qqq', 0, '2017-02-12 00:13:53', 0, 0, 1),
(246, 48, 8, 'sdsdsd', 0, '2017-02-12 12:56:46', 1, 0, 1),
(247, 48, 8, 'sdsddd', 246, '2017-02-12 12:56:59', 0, 0, 1),
(248, 48, 8, 'qwqwqwqw', 0, '2017-02-12 18:17:14', 2, 3, 1),
(252, 48, 8, '111', 0, '2017-02-13 01:37:29', 0, 0, 1),
(253, 48, 42, '11', 0, '2017-02-13 01:37:50', 0, 0, 1),
(254, 48, 42, 'dddd', 253, '2017-02-13 01:39:53', 0, 0, 1),
(255, 48, 42, 'qsqsqs', 0, '2017-02-13 01:40:38', 0, 0, 1),
(256, 48, 42, '11111', 255, '2017-02-13 01:40:57', 0, 0, 1),
(257, 48, 42, 'sdsdsd', 0, '2017-02-13 01:43:33', 0, 0, 1),
(258, 48, 42, 'qqqq', 257, '2017-02-13 01:43:37', 0, 0, 1),
(259, 48, 29, '1111', 0, '2017-02-13 08:11:14', 0, 0, 1),
(260, 48, 29, '1w1w', 0, '2017-02-13 08:11:59', 0, 0, 1),
(261, 48, 29, 'wdwdwd', 0, '2017-02-13 08:12:21', 0, 0, 1),
(262, 48, 29, 'qsqs', 0, '2017-02-13 08:15:34', 0, 0, 1),
(263, 48, 29, '121212', 0, '2017-02-13 08:18:12', 0, 0, 1),
(264, 48, 29, '4444444', 263, '2017-02-13 08:18:16', 0, 0, 1),
(265, 48, 29, 'qwqwqe', 0, '2017-02-13 08:20:46', 0, 1, 1),
(266, 48, 29, 'fdfd', 0, '2017-02-13 08:21:21', 1, 0, 1),
(267, 48, 29, 'qqqqqqqqqqq', 266, '2017-02-13 08:21:32', 0, 0, 1),
(268, 48, 8, 'DSD', 0, '2017-02-13 08:55:12', 0, 0, 1),
(269, 48, 8, 'SDSD', 268, '2017-02-13 08:55:16', 0, 0, 1),
(270, 48, 8, 'AAAAAAAAAAA', 268, '2017-02-13 08:55:27', 0, 0, 1),
(271, 50, 1, 'sdsd', 0, '2017-02-13 12:27:32', 0, 0, 0),
(272, 50, 1, 'ddd', 0, '2017-02-13 12:27:35', 0, 0, 0),
(273, 50, 29, 'ыыыыыыыы', 0, '2017-02-13 12:45:55', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `parent_id` tinyint(5) DEFAULT NULL,
  `href` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `href`) VALUES
(1, 'Home', 0, ''),
(2, 'Menu', 0, '#'),
(3, 'SubMenu', 2, '#'),
(4, 'SubMenu2', 2, '#'),
(5, 'Drop3', 3, '#'),
(6, 'Search', 0, 'searchNews');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_analitic` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `visit` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `title`, `content`, `date`, `is_analitic`, `category_id`, `img`, `visit`) VALUES
(1, 'Proin leo odio, porttitor id, consequat in, conseq', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2016-06-29 03:01:04', 1, 5, '2', 29),
(2, 'In hac habitasse platea dictumst.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit.', '2016-02-13 21:04:54', 1, 2, '1', 19),
(3, 'Nam ultrices, libero non mattis pulvinar, nulla pe', 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.', '2016-07-29 21:16:52', 0, 9, '6', 594),
(4, 'Proin leo odio, porttitor id, consequat in, conseq', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2017-01-28 00:38:30', 1, 6, '6', 654),
(5, 'Vestibulum quam sapien, varius ut, blandit non, in', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.', '2016-06-13 02:24:21', 1, 9, '6', 32),
(6, 'Aenean fermentum.', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', '2016-08-03 23:07:41', 0, 5, '5', NULL),
(7, 'Vestibulum sed magna at nunc commodo placerat.', 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2016-12-05 00:41:17', 0, 9, '1', 30),
(8, 'Phasellus sit amet erat.', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.', '2016-10-11 16:36:01', 1, 1, '4', 59),
(9, 'Quisque erat eros, viverra eget, congue eget, semp', 'Nulla ut erat id mauris vulputate elementum. Nullam varius.', '2017-01-26 20:17:22', 0, 7, '5', NULL),
(10, 'Fusce lacus purus, aliquet at, feugiat non, pretiu', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', '2016-04-22 16:18:04', 0, 3, '1', 17),
(11, 'Vivamus tortor.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.', '2016-04-11 20:24:14', 0, 8, '5', NULL),
(12, 'Vestibulum ante ipsum primis in faucibus orci luct', 'Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2016-03-26 08:55:19', 0, 1, '5', 43),
(13, 'In quis justo.', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', '2016-11-21 16:44:11', 0, 5, '4', NULL),
(14, 'Nullam molestie nibh in lectus.', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.', '2016-03-04 11:30:30', 1, 9, '3', 5),
(15, 'Donec semper sapien a libero.', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2016-08-07 13:10:10', 1, 7, '1', NULL),
(16, 'In hac habitasse platea dictumst.', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', '2016-06-29 09:18:20', 0, 5, '5', 1),
(17, 'Suspendisse accumsan tortor quis turpis.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim.', '2016-07-19 20:45:50', 0, 4, '1', NULL),
(18, 'In quis justo.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2016-10-10 01:41:01', 0, 6, '3', NULL),
(19, 'In est risus, auctor sed, tristique in, tempus sit', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', '2016-08-30 01:24:20', 0, 4, '6', NULL),
(20, 'Nunc nisl.', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', '2016-06-16 20:20:55', 1, 3, '2', NULL),
(21, 'Fusce posuere felis sed lacus.', 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2016-04-22 03:49:49', 1, 1, '6', NULL),
(22, 'Curabitur convallis.', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', '2016-05-26 12:43:08', 1, 8, '5', NULL),
(23, 'Cras in purus eu magna vulputate luctus.', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', '2017-01-05 09:39:31', 1, 9, '6', 36),
(24, 'Donec odio justo, sollicitudin ut, suscipit a, feu', 'Fusce consequat.', '2017-01-06 05:19:39', 0, 6, '1', 23),
(25, 'Donec diam neque, vestibulum eget, vulputate ut, u', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '2017-01-07 17:46:42', 1, 7, '1', 11),
(26, 'Maecenas leo odio, condimentum id, luctus nec, mol', 'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', '2016-07-22 00:34:03', 0, 2, '4', NULL),
(27, 'In blandit ultrices enim.', 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', '2016-10-21 13:26:42', 1, 6, '5', NULL),
(28, 'In hac habitasse platea dictumst.', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', '2016-06-12 10:20:20', 0, 2, '5', NULL),
(29, 'Donec ut mauris eget massa tempor convallis.', 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2016-11-19 21:55:40', 1, 1, '4', 21),
(30, 'Fusce congue, diam id ornare imperdiet, sapien urn', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2016-09-02 20:59:24', 1, 2, '1', NULL),
(31, 'Vestibulum rutrum rutrum neque.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', '2016-05-01 23:22:04', 1, 8, '6', NULL),
(32, 'Donec ut dolor.', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit.', '2016-11-24 23:56:25', 1, 3, '2', NULL),
(33, 'Mauris enim leo, rhoncus sed, vestibulum sit amet,', 'Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue.', '2016-11-26 08:38:31', 1, 5, '1', NULL),
(34, 'Donec ut dolor.', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', '2016-06-26 15:55:25', 1, 9, '4', NULL),
(35, 'Donec odio justo, sollicitudin ut, suscipit a, feu', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', '2016-06-22 11:48:50', 1, 9, '5', NULL),
(36, 'Nulla suscipit ligula in lacus.', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2016-08-12 13:54:59', 1, 10, '3', NULL),
(37, 'Integer ac neque.', 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2016-05-30 14:15:17', 1, 2, '1', NULL),
(38, 'Morbi vestibulum, velit id pretium iaculis, diam e', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2016-02-08 08:10:19', 1, 4, '3', NULL),
(39, 'Curabitur in libero ut massa volutpat convallis.', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.', '2016-02-20 20:00:28', 1, 1, '4', NULL),
(40, 'Praesent blandit.', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', '2016-11-14 18:34:22', 0, 8, '4', NULL),
(41, 'Donec diam neque, vestibulum eget, vulputate ut, u', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', '2016-05-04 22:10:57', 1, 10, '5', NULL),
(42, 'Cum sociis natoque penatibus et magnis dis parturi', 'Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2016-06-06 05:49:02', 1, 3, '3', 11),
(43, 'Vestibulum ante ipsum primis in faucibus orci luct', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2016-06-30 22:32:54', 1, 8, '6', NULL),
(44, 'Mauris sit amet eros.', 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', '2016-09-07 08:45:30', 0, 10, '3', NULL),
(45, 'Aenean sit amet justo.', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', '2016-06-13 14:23:16', 1, 6, '2', NULL),
(46, 'Pellentesque viverra pede ac diam.', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2016-05-19 10:16:51', 1, 4, '6', 1),
(47, 'Cras mi pede, malesuada in, imperdiet et, commodo ', 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', '2016-03-20 18:17:59', 0, 4, '3', NULL),
(48, 'Proin risus.', 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla.', '2016-02-11 10:17:39', 0, 5, '2', NULL),
(49, 'Morbi non lectus.', 'Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2016-10-10 15:47:39', 0, 4, '2', 2),
(50, 'Integer non velit.', 'Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '2016-03-17 22:05:52', 1, 3, '5', NULL),
(51, 'Nunc nisl.', 'In congue.', '2016-02-22 12:20:38', 1, 9, '6', NULL),
(52, 'Phasellus sit amet erat.', 'Integer non velit.', '2016-07-25 00:03:23', 0, 4, '4', NULL),
(53, 'Vestibulum rutrum rutrum neque.', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '2016-08-16 13:10:02', 1, 2, '4', NULL),
(54, 'Phasellus id sapien in sapien iaculis congue.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', '2016-07-11 02:17:34', 0, 6, '2', 11),
(55, 'In quis justo.', 'Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2017-01-10 15:24:56', 1, 3, '5', NULL),
(56, 'Suspendisse potenti.', 'Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', '2016-09-08 15:58:11', 0, 9, '1', NULL),
(57, 'Vestibulum ante ipsum primis in faucibus orci luct', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2016-09-15 10:27:19', 0, 7, '4', NULL),
(58, 'Vestibulum ante ipsum primis in faucibus orci luct', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2016-11-20 08:10:43', 1, 4, '4', NULL),
(59, 'Morbi vestibulum, velit id pretium iaculis, diam e', 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2017-02-05 11:52:40', 1, 3, '6', NULL),
(60, 'Vestibulum ante ipsum primis in faucibus orci luct', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2016-11-29 04:21:31', 0, 10, '4', 3),
(61, 'Integer a nibh.', 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus.', '2016-05-01 08:20:59', 1, 8, '2', NULL),
(62, 'Integer ac leo.', 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2016-12-06 17:48:12', 0, 8, '6', NULL),
(63, 'Nam dui.', 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2016-06-10 08:14:47', 0, 4, '3', NULL),
(64, 'Mauris sit amet eros.', 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', '2016-07-29 23:33:58', 0, 7, '3', NULL),
(65, 'Nulla neque libero, convallis eget, eleifend luctu', 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', '2016-04-21 15:02:22', 0, 9, '3', NULL),
(66, 'Cras mi pede, malesuada in, imperdiet et, commodo ', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.', '2016-10-22 20:59:01', 1, 2, '1', NULL),
(67, 'In hac habitasse platea dictumst.', 'Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', '2016-11-23 09:01:55', 0, 10, '3', NULL),
(68, 'Cras in purus eu magna vulputate luctus.', 'Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', '2016-08-25 20:21:49', 0, 4, '1', NULL),
(69, 'Pellentesque viverra pede ac diam.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', '2016-05-11 23:20:01', 1, 8, '6', NULL),
(70, 'Cras mi pede, malesuada in, imperdiet et, commodo ', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', '2016-07-24 07:00:17', 1, 1, '2', NULL),
(71, 'Curabitur at ipsum ac tellus semper interdum.', 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.', '2016-06-17 14:37:37', 1, 5, '2', NULL),
(72, 'Aenean auctor gravida sem.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', '2016-09-08 03:25:40', 0, 5, '5', NULL),
(73, 'Curabitur at ipsum ac tellus semper interdum.', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', '2016-08-20 20:40:05', 0, 5, '4', NULL),
(74, 'Nam tristique tortor eu pede.', 'Aenean lectus.', '2016-08-16 16:13:19', 0, 5, '2', 3),
(75, 'Nam ultrices, libero non mattis pulvinar, nulla pe', 'Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2016-06-22 09:01:57', 1, 2, '2', NULL),
(76, 'Nulla ac enim.', 'Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo.', '2017-01-03 11:45:13', 1, 8, '3', NULL),
(77, 'Vivamus vestibulum sagittis sapien.', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.', '2016-06-01 07:50:03', 1, 8, '6', NULL),
(78, 'Aliquam augue quam, sollicitudin vitae, consectetu', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2016-11-03 04:56:41', 0, 4, '6', NULL),
(79, 'Mauris ullamcorper purus sit amet nulla.', 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '2016-12-16 09:40:02', 0, 6, '3', NULL),
(80, 'Pellentesque at nulla.', 'Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula.', '2017-01-12 13:55:02', 1, 7, '6', NULL),
(81, 'Maecenas leo odio, condimentum id, luctus nec, mol', 'Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.', '2016-06-19 02:00:08', 0, 8, '4', NULL),
(82, 'Donec posuere metus vitae ipsum.', 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', '2017-02-07 10:35:20', 0, 6, '6', NULL),
(83, 'Integer tincidunt ante vel ipsum.', 'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum.', '2016-08-21 04:27:31', 0, 5, '5', NULL),
(84, 'Etiam pretium iaculis justo.', 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', '2017-01-13 16:28:40', 0, 3, '1', NULL),
(85, 'In eleifend quam a odio.', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', '2016-12-09 18:04:44', 1, 9, '2', NULL),
(86, 'Nulla ut erat id mauris vulputate elementum.', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.', '2017-01-20 20:30:49', 0, 4, '6', NULL),
(87, 'Phasellus sit amet erat.', 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', '2016-12-18 09:46:05', 1, 7, '3', NULL),
(88, 'Donec diam neque, vestibulum eget, vulputate ut, u', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2016-03-02 04:48:51', 0, 10, '1', NULL),
(89, 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pul', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor.', '2016-02-25 12:19:54', 0, 9, '2', 24),
(90, 'Donec posuere metus vitae ipsum.', 'Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '2016-05-10 10:42:03', 1, 1, '3', NULL),
(91, 'Donec semper sapien a libero.', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2016-07-15 17:05:04', 0, 6, '4', NULL),
(92, 'Curabitur in libero ut massa volutpat convallis.', 'Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2016-12-23 02:46:44', 0, 10, '2', NULL),
(93, 'Donec vitae nisi.', 'Vestibulum ac est lacinia nisi venenatis tristique.', '2017-01-05 13:40:31', 1, 9, '3', NULL),
(94, 'In hac habitasse platea dictumst.', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2016-07-02 00:50:58', 1, 1, '3', NULL),
(95, 'Vestibulum ante ipsum primis in faucibus orci luct', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '2016-11-10 07:57:28', 1, 3, '4', NULL);
INSERT INTO `news` (`id_news`, `title`, `content`, `date`, `is_analitic`, `category_id`, `img`, `visit`) VALUES
(96, 'Etiam faucibus cursus urna.', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum.', '2017-01-12 06:21:52', 1, 3, '2', NULL),
(97, 'Quisque porta volutpat erat.', 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', '2016-03-21 02:53:04', 0, 4, '4', NULL),
(98, 'Donec quis orci eget orci vehicula condimentum.', 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', '2016-12-07 03:33:28', 0, 5, '1', NULL),
(99, 'Aliquam sit amet diam in magna bibendum imperdiet.', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', '2016-10-31 02:07:13', 0, 5, '2', NULL),
(100, 'Cum sociis natoque penatibus et magnis dis parturi', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', '2017-01-02 02:03:36', 0, 3, '6', 157);

-- --------------------------------------------------------

--
-- Структура таблицы `promotion`
--

CREATE TABLE `promotion` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` text NOT NULL,
  `price` double NOT NULL,
  `firm` tinytext NOT NULL,
  `cnt` smallint(6) NOT NULL DEFAULT '0',
  `site` varchar(100) NOT NULL DEFAULT 'http://www.logitech.com/ru-ru/mice-pointers/mice',
  `is_active` tinyint(1) UNSIGNED DEFAULT '1',
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `promotion`
--

INSERT INTO `promotion` (`id`, `product_name`, `price`, `firm`, `cnt`, `site`, `is_active`, `img`) VALUES
(1, 'm171-wireless-mouse', 285, 'Logitech', 18, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(2, 'Wireless Mouse M175 Black ', 325, 'Logitech', 0, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(3, 'Wireless Mouse M280 Black', 555, 'Logitech', 2, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(4, 'B100', 189, 'Logitech', 1, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(5, 'Wireless Mouse M185 Gray', 339, 'Logitech', 3, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(6, 'Wireless Mouse M170 Grey-Black ', 299, 'Logitech', 5, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(7, 'Wireless Mouse M171 Grey-Black', 329, 'Logitech', 5, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL),
(8, 'Logitech M100 White ', 215, 'Logitech', 8, 'http://www.logitech.com/ru-ru/mice-pointers/mice', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `config` enum('body','head') NOT NULL,
  `value` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `config`, `value`) VALUES
(1, 'head', '#09242b'),
(2, 'body', '#ffffff');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) UNSIGNED NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id_tag`, `tag_name`) VALUES
(1, 'Bank'),
(2, 'Tag'),
(3, 'Sport'),
(4, 'Cry'),
(5, 'Dota'),
(6, 'Ast');

-- --------------------------------------------------------

--
-- Структура таблицы `tag_news`
--

CREATE TABLE `tag_news` (
  `id_news` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag_news`
--

INSERT INTO `tag_news` (`id_news`, `id_tag`) VALUES
(25, 1),
(25, 3),
(25, 4),
(18, 3),
(12, 1),
(12, 3),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(53, 3),
(46, 2),
(46, 3),
(46, 4),
(54, 1),
(54, 6),
(1, 1),
(1, 3),
(2, 2),
(2, 4),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 4),
(4, 6),
(4, 1),
(5, 3),
(6, 6),
(6, 1),
(6, 2),
(7, 3),
(7, 4),
(7, 6),
(8, 1),
(8, 2),
(8, 3),
(9, 4),
(9, 6),
(9, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 6),
(11, 1),
(11, 2),
(12, 5),
(13, 5),
(13, 4),
(13, 3),
(14, 5),
(14, 1),
(14, 2),
(15, 6),
(15, 5),
(15, 4),
(16, 1),
(16, 2),
(16, 3),
(17, 4),
(17, 5),
(17, 1),
(18, 1),
(18, 2),
(19, 2),
(19, 3),
(19, 4),
(20, 5),
(20, 6),
(20, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 5),
(22, 6),
(22, 1),
(23, 2),
(23, 3),
(23, 4),
(24, 5),
(24, 6),
(24, 1),
(26, 2),
(26, 3),
(26, 4),
(27, 5),
(27, 6),
(27, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 5),
(29, 6),
(29, 1),
(30, 2),
(30, 3),
(30, 4),
(31, 6),
(31, 5),
(31, 4),
(32, 3),
(32, 5),
(32, 2),
(33, 1),
(33, 2),
(33, 3),
(34, 4),
(34, 5),
(34, 6),
(35, 1),
(35, 2),
(35, 3),
(36, 4),
(36, 5),
(36, 6),
(37, 1),
(37, 2),
(37, 3),
(38, 4),
(38, 5),
(38, 6),
(39, 1),
(39, 2),
(39, 3),
(40, 4),
(40, 5),
(40, 6),
(41, 1),
(41, 2),
(41, 3),
(42, 4),
(42, 6),
(42, 5),
(43, 4),
(43, 4),
(43, 2),
(44, 1),
(44, 6),
(44, 5),
(45, 4),
(45, 4),
(45, 2),
(47, 1),
(47, 6),
(47, 5),
(48, 4),
(48, 3),
(48, 2),
(50, 1),
(50, 6),
(50, 5),
(51, 6),
(51, 5),
(51, 4),
(52, 3),
(52, 2),
(52, 1),
(53, 2),
(53, 1),
(54, 2),
(55, 6),
(55, 5),
(55, 4),
(56, 3),
(56, 2),
(56, 1),
(57, 1),
(57, 2),
(57, 3),
(58, 1),
(58, 2),
(58, 3),
(59, 1),
(59, 2),
(59, 3),
(60, 4),
(60, 5),
(60, 6),
(61, 4),
(61, 5),
(61, 6),
(62, 4),
(62, 5),
(62, 6),
(63, 2),
(63, 3),
(63, 4),
(64, 2),
(64, 3),
(64, 4),
(65, 2),
(65, 3),
(65, 4),
(66, 1),
(66, 2),
(66, 4),
(67, 2),
(67, 3),
(67, 5),
(68, 1),
(68, 4),
(68, 5),
(69, 3),
(69, 4),
(69, 5),
(70, 3),
(70, 1),
(70, 2),
(71, 6),
(71, 5),
(71, 4),
(72, 3),
(72, 2),
(72, 1),
(73, 6),
(73, 5),
(73, 4),
(74, 1),
(74, 3),
(74, 2),
(83, 1),
(75, 6),
(75, 5),
(75, 4),
(76, 3),
(76, 2),
(76, 1),
(77, 6),
(77, 2),
(77, 4),
(78, 3),
(78, 2),
(78, 1),
(79, 6),
(79, 5),
(79, 4),
(80, 3),
(80, 2),
(80, 1),
(81, 6),
(81, 5),
(81, 4),
(82, 3),
(82, 2),
(82, 1),
(83, 2),
(83, 3),
(84, 1),
(84, 2),
(84, 3),
(85, 1),
(85, 2),
(85, 3),
(86, 1),
(86, 2),
(86, 3),
(87, 4),
(87, 5),
(87, 6),
(88, 4),
(88, 5),
(88, 6),
(89, 4),
(89, 5),
(89, 6),
(90, 4),
(90, 5),
(90, 6),
(91, 4),
(91, 5),
(91, 6),
(92, 4),
(92, 5),
(92, 6),
(93, 4),
(93, 5),
(93, 6),
(94, 4),
(94, 5),
(94, 6),
(95, 4),
(95, 5),
(95, 6),
(96, 4),
(96, 3),
(96, 2),
(97, 3),
(97, 2),
(97, 1),
(98, 6),
(98, 5),
(98, 4),
(99, 5),
(99, 4),
(99, 1),
(100, 1),
(100, 3),
(100, 2),
(5, 1),
(5, 6),
(1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` smallint(5) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL,
  `password` char(65) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `is_active`) VALUES
(34, 'Aqa', 'sdd@d.netd', '', '$2y$10$fpqp1rLCwZZlRAbr67Fk6udWJTiQDEIX9O0UbOopl/ayn4AeIrCsq', 1),
(36, 'test', 'test@test.ru', '', '$2y$10$fpqp1rLCwZZlRAbr67Fk6udWJTiQDEIX9O0UbOopl/ayn4AeIrCsq', 1),
(39, 'aasssd', 'sass@ukassr.net', '', '$2y$10$fpqp1rLCwZZlRAbr67Fk6udWJTiQDEIX9O0UbOopl/ayn4AeIrCsq', 1),
(40, 'qwert', 'qwert@qw.r', '', '$2y$10$fpqp1rLCwZZlRAbr67Fk6udWJTiQDEIX9O0UbOopl/ayn4AeIrCsq', 1),
(48, '111111', 'qqq@qqq.com', '', '$2y$10$fpqp1rLCwZZlRAbr67Fk6udWJTiQDEIX9O0UbOopl/ayn4AeIrCsq', 1),
(50, 'Admin', 'Admin@admin.com', 'admin', '$2y$10$HTnKFRK660hw0ToWnPOktez0oYL4DXAE.tnT4Lny84cs7tXwkBJ1O', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `votes_comment`
--

CREATE TABLE `votes_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `votes_comment`
--

INSERT INTO `votes_comment` (`id`, `id_comment`, `id_user`) VALUES
(3, 3, 34),
(17, 15, 34),
(18, 16, 34),
(23, 242, 48),
(24, 246, 48),
(25, 266, 48),
(26, 265, 48);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_comments_news` (`id_news`),
  ADD KEY `FK_comments_users` (`id_user`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Индексы таблицы `tag_news`
--
ALTER TABLE `tag_news`
  ADD KEY `FK_tag_news_tags` (`id_tag`),
  ADD KEY `FK_tag_news_news` (`id_news`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `votes_comment`
--
ALTER TABLE `votes_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_votes_comment_comments` (`id_comment`),
  ADD KEY `FK_votes_comment_users` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT для таблицы `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `votes_comment`
--
ALTER TABLE `votes_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
