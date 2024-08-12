-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 12 2024 г., 16:18
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kidsdb`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`%` PROCEDURE `GetRecordCounts` ()   BEGIN
                SELECT
                    'categories' AS tablename,
                    COUNT(*) AS record_count
                  FROM categories
                  UNION ALL
                  SELECT
                    'lessons' AS lessons,
                    COUNT(*) AS record_count
                  FROM lessons
                  UNION ALL
                  SELECT
                    'articles' AS articles,
                    COUNT(*) AS record_count
                  FROM articles
                  UNION ALL
                  SELECT
                    'teachers' AS teachers,
                    COUNT(*) AS record_count
                  FROM teachers;
            END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Aut illo nulla aut l', '<p><span style=\"color: rgb(121, 120, 118); font-family: &quot;Times New Roman&quot;; font-size: 16px; letter-spacing: 0.32px; background-color: rgb(250, 250, 250);\">In Bobo office commodo auctor eget congue sit. Ultrices eget pretium sit euismod mi id. Risus, aliquam odio posuere ac in in nisl sed augue. Porta aenean egestas malesuada in pulvinar enim viverra.</span></p><p><span style=\"color: rgb(121, 120, 118); font-family: &quot;Times New Roman&quot;; font-size: 16px; letter-spacing: 0.32px; background-color: rgb(250, 250, 250);\">In commodo auctor eget congue sit. Ultrices eget pretium sit euismod mi id. Risus, aliquam odio posuere ac in in nisl sed augue. Porta aenean egestas malesuada in pulvinar enim viverra.</span><span style=\"color: rgb(121, 120, 118); font-family: &quot;Times New Roman&quot;; font-size: 16px; letter-spacing: 0.32px; background-color: rgb(250, 250, 250);\"><br></span></p>', '1720463051.jpg', NULL, '2024-07-08 15:28:32');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `publish_date` date NOT NULL DEFAULT '2024-07-08',
  `author` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `order`, `published`, `publish_date`, `author`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Consequatur non est', 'Esse, adipisci autem.<span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span>Consequatur non est<span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span>', 20, 0, '2024-07-09', 3, '1720544127.jpg', '2024-07-09 13:55:27', '2024-07-11 16:35:12'),
(2, 'Consequuntur officia', 'Molestias sunt, laud.<span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span><span style=\"font-size: 13.2px;\">Molestias sunt, laud.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Esse, adipisci autem.</span><span style=\"font-size: 13.2px;\">Consequatur non est</span>', 7, 1, '2024-07-09', 3, '1720727162.jpg', '2024-07-09 13:55:58', '2024-07-11 16:46:02'),
(3, 'Earum sint maiores ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, aliquam autem commodi cupiditate error fuga ipsa ipsum minima non obcaecati porro quasi, quidem rerum. Corporis, iste, recusandae. Accusantium dicta eaque perspiciatis recusandae. Ab accusamus amet atque aut delectus dolores ducimus eius eligendi exercitationem mollitia, nam necessitatibus similique sint temporibus, ullam!Ipsum voluptatem, co.Autem nesciunt, dolo.Enim molestiae aliqu.Ut distinctio. Dolor.Molestias sunt, laud.Esse, adipisci autem.Esse, adipisci autem.Consequatur non estMolestias sunt, laud.Esse, adipisci autem.Esse, adipisci autem.Consequatur non est', 10, 1, '2024-07-09', 3, '1720544374.jpg', '2024-07-09 13:59:34', '2024-07-09 14:12:58'),
(4, 'Neque qui eligendi s', 'Qui corporis id assu.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis doloremque, excepturi fuga harum ipsa, libero maiores maxime mollitia natus nisi perspiciatis quaerat saepe sed suscipit temporibus tenetur vel. Beatae, dolores fugit magnam obcaecati officiis quo quod? Aliquid fuga quaerat quibusdam. Autem doloremque dolores exercitationem explicabo molestiae sed voluptate? Ad, adipisci asperiores consectetur deleniti dignissimos ducimus eum eveniet expedita in inventore ipsa iure laudantium molestias qui quia repellendus repudiandae tempora tenetur totam!&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab assumenda consectetur culpa deleniti dicta, dignissimos dolor doloremque doloribus eius et eum ex facilis fuga inventore iure laboriosam magni minus necessitatibus nesciunt nisi nulla numquam, porro quae quam quasi quibusdam quisquam ratione repellendus rerum sed sint soluta, totam ullam veniam vitae voluptate? Ab accusamus adipisci blanditiis commodi corporis, cum delectus facilis incidunt laborum magni maiores minima modi nam nemo nobis nostrum officiis omnis, perspiciatis quaerat quas quibusdam quod quos ratione saepe sit voluptatibus?', 9, 0, '2024-07-09', 1, '1720544436.jpg', '2024-07-09 14:00:36', '2024-07-09 14:09:49'),
(6, 'Aut accusamus facili', 'Numquam ea ut dolor .<span style=\"font-size: 13.2px;\">Qui corporis id assu.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis doloremque, excepturi fuga harum ipsa, libero maiores maxime mollitia natus nisi perspiciatis quaerat saepe sed suscipit temporibus tenetur vel. Beatae, dolores fugit magnam obcaecati officiis quo quod? Aliquid fuga quaerat quibusdam. Autem doloremque dolores exercitationem explicabo molestiae sed voluptate? Ad, adipisci asperiores consectetur deleniti dignissimos ducimus eum eveniet expedita in inventore ipsa iure laudantium molestias qui quia repellendus repudiandae tempora tenetur totam!&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab assumenda consectetur culpa deleniti dicta, dignissimos dolor doloremque doloribus eius et eum ex facilis fuga inventore iure laboriosam magni minus necessitatibus nesciunt nisi nulla numquam, porro quae quam quasi quibusdam quisquam ratione repellendus rerum sed sint soluta, totam ullam veniam vitae voluptate? Ab accusamus adipisci blanditiis commodi corporis, cum delectus facilis incidunt laborum magni maiores minima modi nam nemo nobis nostrum officiis omnis, perspiciatis quaerat quas quibusdam quod quos ratione saepe sit voluptatibus?</span>', 76, 1, '2024-07-09', 1, '1720544503.jpg', '2024-07-09 14:01:43', '2024-07-09 14:01:43'),
(7, 'Voluptas est corrup', 'Mollit sunt, enim es.<span style=\"font-size: 13.2px;\">Numquam ea ut dolor .</span><span style=\"font-size: 13.2px;\">Qui corporis id assu.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis doloremque, excepturi fuga harum ipsa, libero maiores maxime mollitia natus nisi perspiciatis quaerat saepe sed suscipit temporibus tenetur vel. Beatae, dolores fugit magnam obcaecati officiis quo quod? Aliquid fuga quaerat quibusdam. Autem doloremque dolores exercitationem explicabo molestiae sed voluptate? Ad, adipisci asperiores consectetur deleniti dignissimos ducimus eum eveniet expedita in inventore ipsa iure laudantium molestias qui quia repellendus repudiandae tempora tenetur totam!&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab assumenda consectetur culpa deleniti dicta, dignissimos dolor doloremque doloribus eius et eum ex facilis fuga inventore iure laboriosam magni minus necessitatibus nesciunt nisi nulla numquam, porro quae quam quasi quibusdam quisquam ratione repellendus rerum sed sint soluta, totam ullam veniam vitae voluptate? Ab accusamus adipisci blanditiis commodi corporis, cum delectus facilis incidunt laborum magni maiores minima modi nam nemo nobis nostrum officiis omnis, perspiciatis quaerat quas quibusdam quod quos ratione saepe sit voluptatibus?</span>', 87, 1, '2024-07-09', 2, '1720545423.jpg', '2024-07-09 14:17:03', '2024-07-09 14:17:03');

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` enum('Mugallymlar','Galereýa','Makalalar','Jadyly sandyk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mugallymlar', 'testimonial-bg.jpg', NULL, '2024-08-07 03:07:33'),
(3, 'Galereýa', 'slider-image2.jpg', NULL, '2024-08-07 03:07:41'),
(4, 'Makalalar', 'slider-image.jpg', NULL, '2024-08-07 03:08:06'),
(5, 'Jadyly sandyk', 'testimonial-bg.jpg', NULL, '2024-08-07 03:08:22');

-- --------------------------------------------------------

--
-- Структура таблицы `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facilis dignissimos ', '1720726411.jpg', 1, 1, '2024-07-11 16:33:31', '2024-07-11 16:33:31'),
(2, 'Cillum quia aut exce', '1720726429.jpg', 2, 1, '2024-07-11 16:33:49', '2024-07-11 16:33:49'),
(3, 'Molestias rerum face', '1720726442.jpg', 3, 1, '2024-07-11 16:34:02', '2024-07-11 16:35:16'),
(4, 'Iusto non obcaecati ', '1720726452.jpg', 5, 0, '2024-07-11 16:34:12', '2024-07-11 16:34:58');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `order`, `icon`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Linus Barron', 1, 'game-icons--wrapped-sweet.svg', 'bg-red', '2024-07-22 15:16:39', '2024-08-09 14:38:08'),
(2, 'Medge Sosa', 2, 'hugeicons--natural-food.svg', 'bg-green', '2024-07-22 15:16:46', '2024-08-09 14:38:16'),
(3, 'Jaquelyn Powers', 3, 'mdi--art.svg', 'bg-yellow', '2024-07-22 15:16:52', '2024-08-09 14:38:29'),
(4, 'Marcia Terry', 5, 'material-symbols--abc.svg', 'bg-blue', '2024-07-22 15:16:59', '2024-08-09 14:38:37');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'bg-red', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(2, 'bg-green', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(3, 'bg-blue', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(4, 'bg-yellow', '2024-08-09 14:36:46', '2024-08-09 14:36:46');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Office', '730 Glenstone, Springfield, USA', '(510)710-3464', 'office@mail.tm', NULL, '2024-07-12 17:22:56'),
(2, 'Management', '730 Glenstone, Springfield, USA', '(510)987-3216', 'managment@mail.tm', NULL, '2024-07-14 23:11:45');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `desc`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '1720730855.jpg', 'Hic blanditiis qui s', 2, 1, '2024-07-11 17:47:35', '2024-07-11 18:07:04'),
(2, '1720731599.jpg', 'Animi placeat aspe', 4, 1, '2024-07-11 17:59:59', '2024-07-11 17:59:59'),
(3, '1720731939.jpg', 'Exercitationem labor', 9, 1, '2024-07-11 18:05:39', '2024-07-11 18:07:03'),
(4, '1720732015.jpg', 'Deserunt in eveniet', 4, 1, '2024-07-11 18:06:55', '2024-07-12 14:29:54'),
(5, '1720732035.jpg', 'Ratione laboris nobi', 1, 1, '2024-07-11 18:07:15', '2024-07-12 14:29:43'),
(6, '1720732049.jpg', 'Temporibus tempore ', 2, 1, '2024-07-11 18:07:29', '2024-07-12 14:29:27'),
(8, '1720786638.jpg', 'Cupidatat quia dolor', 11, 1, '2024-07-12 09:17:18', '2024-07-12 14:30:05');

-- --------------------------------------------------------

--
-- Структура таблицы `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `icons`
--

INSERT INTO `icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'ant-design--read-outlined.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(2, 'game-icons--wrapped-sweet.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(3, 'hugeicons--natural-food.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(4, 'ic--twotone-face-retouching-natural.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(5, 'icon-park-outline--natural-mode.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(6, 'material-symbols--abc.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(7, 'material-symbols--computer-outline.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(8, 'material-symbols--house-outline.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(9, 'mdi--art.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(10, 'mdi--book-open-page-variant.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(11, 'mdi--car.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(12, 'mdi--city.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(13, 'mdi--gamepad-variant.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(14, 'mdi--music-note-outline.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(15, 'mdi--palette.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(16, 'mdi--playground-slide.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(17, 'mdi--rocket.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(18, 'mdi--tractor.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(19, 'mingcute--baby-fill.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46'),
(20, 'system-uicons--write.svg', '2024-08-09 14:36:46', '2024-08-09 14:36:46');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `until_date` date NOT NULL DEFAULT '2027-07-22',
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `content`, `image`, `video`, `audio`, `file`, `status`, `order`, `until_date`, `available`, `category_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 'Qui libero quis in e', 'Cupiditate repudiand.&nbsp;&nbsp;<span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span>', '1723463753.jpg', 'Maroon 5 - Sugar (Official Music Video).mp4', '1723463844.mp3', '1723463844.docx', 1, 0, '2024-08-07', 1, 3, 2, '2024-08-07 16:24:11', '2024-08-12 08:57:24'),
(3, 'Qui libero quis in e', 'Cupiditate repudiand.&nbsp;&nbsp;<span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span><span style=\"font-size: 13.2px;\">Cupiditate repudiand.&nbsp;</span>', '1723463699.jpg', '1723464156.mp4', 'Top_100_Shazam-All_The_Stars_(RU.ZK-FM.CAM).mp3', '1723464866.docx', 1, 0, '2024-08-07', 1, 3, 2, '2024-08-07 16:25:02', '2024-08-12 09:14:26'),
(4, 'Iure est laudantium', 'Sint dolorum digniss.&nbsp;<span style=\"font-size: 13.2px;\">Sint dolorum digniss.&nbsp;</span><span style=\"font-size: 13.2px;\">Sint dolorum digniss.&nbsp;</span><span style=\"font-size: 13.2px;\">Sint dolorum digniss.&nbsp;</span>', 'bg2.jpg', 'Maroon 5 - Sugar (Official Music Video).mp4', 'Capone - Streets Favorite-music-2021.ru.mp3', 'ТАБЛИЦЫ DELPHI_2016.pdf', 1, 0, '2024-08-07', 1, 3, 2, '2024-08-07 16:26:34', '2024-08-07 16:26:34'),
(5, 'Occaecat consequatur', 'Error quibusdam temp.ggg&nbsp;<span style=\"font-size: 13.2px;\">Error quibusdam temp.ggg</span><span style=\"font-size: 13.2px;\">Error quibusdam temp.ggg</span><span style=\"font-size: 13.2px;\">Error quibusdam temp.ggg</span>', 'salary.jpg', 'Maroon 5 - Sugar (Official Music Video).mp4', 'Top_100_Shazam-Back_to_Me_(RU.ZK-FM.CAM).mp3', 'Бриф на разработку Landing Page.docx', 1, 0, '2024-08-07', 1, 2, 2, '2024-08-07 16:42:44', '2024-08-07 16:42:44'),
(6, 'Ab ullamco fugiat u', 'Autem voluptatibus t.<span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span><span style=\"font-size: 13.2px;\">Autem voluptatibus t.</span>', 'bg2.jpg', NULL, 'Fly Boy Fu - Laffy Taffy (Remix)-music-2021.ru.mp3', 'CRM система.docx', 1, 0, '2024-08-12', 1, 1, 2, '2024-08-12 09:11:02', '2024-08-12 09:11:02'),
(7, 'Recusandae Et non t', 'Quos aut enim elit, .<span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span><span style=\"font-size: 13.2px;\">Quos aut enim elit, .</span>', 'bg1.jpg', 'Maroon 5 - Sugar (Official Music Video).mp4', 'intelligency_-_august_muzter.net.mp3', 'Бриф на разработку Landing Page.docx', 1, 0, '2024-08-12', 1, 4, 2, '2024-08-12 09:21:30', '2024-08-12 09:21:30');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `text`, `read`, `created_at`, `updated_at`) VALUES
(1, 'Dale Herring', 'wuzydogiho@mailinator.com', '+1 (653) 722-3589', 'Quia nihil tempora c', 'Sed blanditiis eaque', 0, '2024-07-15 15:43:04', '2024-07-15 15:43:04'),
(2, 'Rhiannon Mcintyre', 'fojotywy@mailinator.com', '+1 (571) 108-8949', 'Culpa provident ut', 'Dicta suscipit asper', 0, '2024-07-15 15:43:18', '2024-07-15 15:43:18'),
(3, 'Maya Gross', 'nopa@mailinator.com', '+1 (524) 632-5487', 'Accusantium dolorum ', 'Dolorum eos blanditi', 0, '2024-07-15 15:43:27', '2024-07-15 15:43:27'),
(4, 'Barclay Orr', 'kutewe@mailinator.com', '+1 (853) 178-6042', 'Ullamco nulla cupidi', 'Sed explicabo Quide', 1, '2024-07-15 15:43:30', '2024-07-16 02:31:19'),
(5, 'Charde Frank', 'rulug@mailinator.com', '+1 (647) 537-1803', 'Consequatur assumen', 'Asperiores velit se', 1, '2024-07-15 15:43:34', '2024-07-15 15:43:46'),
(6, 'Caryn Mccoy', 'gogekad@mailinator.com', '+1 (351) 692-8395', 'Velit laboriosam co', 'Est in ratione delec', 0, '2024-07-16 02:30:46', '2024-07-16 02:30:46');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_02_051652_create_teachers_table', 1),
(6, '2024_07_06_082806_create_abouts_table', 2),
(7, '2024_07_08_185919_create_articles_table', 3),
(8, '2024_07_10_121930_add_user_type_field', 4),
(9, '2024_07_11_055731_create_carousels_table', 4),
(11, '2024_07_11_201808_create_galleries_table', 5),
(14, '2024_07_12_175719_create_companies_table', 6),
(16, '2024_07_12_175923_create_messages_table', 7),
(17, '2024_07_18_125015_create_categories_table', 8),
(18, '2024_07_18_134922_create_lessons_table', 8),
(19, '2024_07_23_063014_add_user_id_field_to_teachers_table', 9),
(20, '2024_07_27_122559_lessons_add_audio_field', 9),
(21, '2024_07_30_062322_add_file_upload_field_to_lesson', 9),
(22, '2024_08_05_065604_create_get_record_counts_procedure', 9),
(23, '2024_08_05_095324_create_banners_table', 9),
(24, '2024_08_08_053339_categories_add_icon_and_color_fields', 10),
(25, '2024_08_09_053627_create_icons_table', 10),
(26, '2024_08_09_053633_create_colors_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `lastname`, `position`, `image`, `desc`, `order`, `published`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Morgan', 'Sherman', 'Mollitia et blanditi', '1720176324.jpg', 'Nesciunt consequatu', 68, 1, '2024-07-05 07:45:24', '2024-07-05 07:45:24', NULL),
(2, 'Mikayla', 'Johnston', 'Voluptatem voluptate', '1720176533.jpg', 'Atque commodi maiore', 24, 1, '2024-07-05 07:48:53', '2024-07-05 07:48:53', NULL),
(3, 'Ray', 'Webb', 'Accusantium repudian', '1720176702.jpg', 'Possimus id fugit', 100, 1, '2024-07-05 07:51:42', '2024-07-08 16:29:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('USR','ADM','TCH') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(2, 'Babamurad', 'bobo@tm.tm', NULL, '$2y$10$Of6Xnsu.XPLMfgxgvY9ce.2pkJQ2Ft4QmF8hWHqH7Nob.AFqJ.8ni', NULL, '2024-07-12 08:56:41', '2024-07-12 08:56:41', 'ADM'),
(3, 'Madonna Compton', 'ziko@mailinator.com', NULL, '$2y$10$urJr4rMMSK8yKoBq.mS4MOWzfynYjteRYZjsdvgJVra3qONVZfHBe', NULL, '2024-07-22 15:13:16', '2024-07-22 15:13:16', 'TCH');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_category_id_foreign` (`category_id`),
  ADD KEY `lessons_teacher_id_foreign` (`teacher_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `lessons_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
