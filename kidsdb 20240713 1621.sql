--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 13.07.2024 16:21:21
-- Версия сервера: 5.7.39
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE kidsdb;

--
-- Удалить таблицу `abouts`
--
DROP TABLE IF EXISTS abouts;

--
-- Удалить таблицу `articles`
--
DROP TABLE IF EXISTS articles;

--
-- Удалить таблицу `carousels`
--
DROP TABLE IF EXISTS carousels;

--
-- Удалить таблицу `companies`
--
DROP TABLE IF EXISTS companies;

--
-- Удалить таблицу `failed_jobs`
--
DROP TABLE IF EXISTS failed_jobs;

--
-- Удалить таблицу `galleries`
--
DROP TABLE IF EXISTS galleries;

--
-- Удалить таблицу `messages`
--
DROP TABLE IF EXISTS messages;

--
-- Удалить таблицу `migrations`
--
DROP TABLE IF EXISTS migrations;

--
-- Удалить таблицу `password_reset_tokens`
--
DROP TABLE IF EXISTS password_reset_tokens;

--
-- Удалить таблицу `personal_access_tokens`
--
DROP TABLE IF EXISTS personal_access_tokens;

--
-- Удалить таблицу `teachers`
--
DROP TABLE IF EXISTS teachers;

--
-- Удалить таблицу `users`
--
DROP TABLE IF EXISTS users;

--
-- Установка базы данных по умолчанию
--
USE kidsdb;

--
-- Создать таблицу `users`
--
CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  type enum ('USR', 'ADM', 'TCH') NOT NULL DEFAULT 'USR',
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 12,
AVG_ROW_LENGTH = 2048,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `users_email_unique` для объекта типа таблица `users`
--
ALTER TABLE users
ADD UNIQUE INDEX users_email_unique (email);

--
-- Создать таблицу `teachers`
--
CREATE TABLE teachers (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  firstname varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  image varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `order` smallint(6) NOT NULL DEFAULT 0,
  published tinyint(1) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 10,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `personal_access_tokens`
--
CREATE TABLE personal_access_tokens (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  tokenable_type varchar(255) NOT NULL,
  tokenable_id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  token varchar(64) NOT NULL,
  abilities text DEFAULT NULL,
  last_used_at timestamp NULL DEFAULT NULL,
  expires_at timestamp NULL DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `personal_access_tokens_token_unique` для объекта типа таблица `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD UNIQUE INDEX personal_access_tokens_token_unique (token);

--
-- Создать индекс `personal_access_tokens_tokenable_type_tokenable_id_index` для объекта типа таблица `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD INDEX personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type, tokenable_id);

--
-- Создать таблицу `password_reset_tokens`
--
CREATE TABLE password_reset_tokens (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (email)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `migrations`
--
CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(255) NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 13,
AVG_ROW_LENGTH = 1638,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `messages`
--
CREATE TABLE messages (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(255) DEFAULT NULL,
  subject varchar(255) NOT NULL,
  text text NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `galleries`
--
CREATE TABLE galleries (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  image varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `order` smallint(6) NOT NULL DEFAULT 0,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 2340,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `failed_jobs`
--
CREATE TABLE failed_jobs (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  uuid varchar(255) NOT NULL,
  `connection` text NOT NULL,
  queue text NOT NULL,
  payload longtext NOT NULL,
  exception longtext NOT NULL,
  failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `failed_jobs_uuid_unique` для объекта типа таблица `failed_jobs`
--
ALTER TABLE failed_jobs
ADD UNIQUE INDEX failed_jobs_uuid_unique (uuid);

--
-- Создать таблицу `companies`
--
CREATE TABLE companies (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `carousels`
--
CREATE TABLE carousels (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT 0,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `articles`
--
CREATE TABLE articles (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  content longtext NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT 0,
  published tinyint(1) NOT NULL DEFAULT 1,
  publish_date date NOT NULL DEFAULT '2024-07-09',
  author bigint(20) DEFAULT NULL,
  image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `abouts`
--
CREATE TABLE abouts (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  content longtext NOT NULL,
  image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'Babamurad', 'bobo@tm.tm', NULL, '$2y$10$LN0uP4384pBlDKnAm0UZj.vYrokKO4QoasSJgkzeIYldcwynqvWPq', NULL, '2024-07-10 11:03:45', '2024-07-10 11:03:45', 'ADM'),
(2, 'McKenzie Solomon', 'paletovi@mailinator.com', NULL, 'Pa$$w0rd!', NULL, '2024-07-10 18:00:45', '2024-07-10 18:00:45', 'USR'),
(3, 'Ocean Franks', 'bacisale@mailinator.com', NULL, 'Pa$$w0rd!', NULL, '2024-07-10 18:06:06', '2024-07-10 18:06:06', 'USR'),
(4, 'Colin Bright', 'jadosowibi@mailinator.com', NULL, 'Pa$$w0rd!', NULL, '2024-07-10 18:12:54', '2024-07-10 18:12:54', 'USR'),
(5, 'Carolyn Velazquez', 'jofytisud@mailinator.com', NULL, '123123', NULL, '2024-07-10 18:13:43', '2024-07-10 18:13:43', 'USR'),
(6, 'Jacob Hoffman', 'vywipap@mailinator.com', NULL, 'Pa$$w0rd!', NULL, '2024-07-10 18:40:20', '2024-07-10 18:40:20', 'USR'),
(7, 'Helen Morrison', 'tyzyw@mailinator.com', NULL, 'Pa$$w0rd!', NULL, '2024-07-10 19:49:47', '2024-07-10 19:49:47', 'USR'),
(10, 'Gabriel Moreno', 'ziku@mailinator.com', NULL, '$2y$10$O7YB4.aKBQxGFBWFbzR.pOAEts6QfMWwYtZlbsD392N5Ol3sxfp4.', NULL, '2024-07-10 19:54:45', '2024-07-10 19:54:45', 'ADM'),
(11, 'Babamurad', 'bobo2@tm.tm', NULL, '$2y$10$H7VCjWjMn0sBOB4RAVCeJeiPDreM0shtY3Q0xaxlGdmnakF9nTHzW', NULL, '2024-07-12 12:00:03', '2024-07-12 12:00:03', 'ADM');

-- 
-- Вывод данных для таблицы teachers
--
INSERT INTO teachers VALUES
(2, 'Felix', 'Doyle', 'Recusandae Explicab', '1720253714.jpg', 'Veritatis proident ', 93, 1, '2024-07-06 08:15:14', '2024-07-06 08:53:33'),
(3, 'Nell', 'Hamilton', 'Aspernatur architect', '1720254117.jpg', 'Deserunt molestiae e', 63, 1, '2024-07-06 08:21:57', '2024-07-06 08:42:20'),
(4, 'Holmes', 'Glenn', 'Enim totam optio qu', '1720254195.jpg', 'Ipsum dolorum ut lab', 46, 1, '2024-07-06 08:23:16', '2024-07-06 08:23:16'),
(5, 'Patrick', 'Turner', 'Et corrupti fugit ', '1720255277.jpg', 'Voluptas quam nisi d', 10, 1, '2024-07-06 08:41:17', '2024-07-06 08:41:17'),
(6, 'Gavin', 'Fernandez', 'Nisi id modi eaque i', '1720255290.jpg', 'Dolore officia ipsum', 90, 1, '2024-07-06 08:41:30', '2024-07-06 08:42:07'),
(7, 'Jennifer', 'Gray', 'Est quis hic volupt', '1720255307.jpg', 'Sed nisi voluptatum ', 87, 1, '2024-07-06 08:41:47', '2024-07-06 08:41:58'),
(8, 'Jaquelyn', 'Dyer', 'Quis officiis earum ', '1720255352.jpg', 'Adipisicing Nam dolo', 24, 1, '2024-07-06 08:42:32', '2024-07-06 08:53:25'),
(9, 'Colette', 'Matthews', 'Anim enim in accusantium velit voluptates earum mollitia sunt sunt labore eos unde dolores sint suscipit facere', '1720851847.jpg', 'Ex consequatur ut soluta elit et cum nulla facere', 59, 1, '2024-07-13 05:23:39', '2024-07-13 06:24:07');

-- 
-- Вывод данных для таблицы personal_access_tokens
--
-- Таблица kidsdb.personal_access_tokens не содержит данных

-- 
-- Вывод данных для таблицы password_reset_tokens
--
-- Таблица kidsdb.password_reset_tokens не содержит данных

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_02_051652_create_teachers_table', 1),
(6, '2024_07_06_082806_create_abouts_table', 2),
(7, '2024_07_08_185919_create_articles_table', 3),
(8, '2024_07_10_121930_add_user_type_field', 4),
(9, '2024_07_11_055731_create_carousels_table', 5),
(10, '2024_07_11_201808_create_galleries_table', 6),
(11, '2024_07_12_175719_create_companies_table', 7),
(12, '2024_07_12_175923_create_messages_table', 7);

-- 
-- Вывод данных для таблицы messages
--
INSERT INTO messages VALUES
(1, 'fdsa', 'fds@tm.tm', '123456', 'subject', 'text', 0, '2024-07-13 12:05:15', '2024-07-13 12:05:17');

-- 
-- Вывод данных для таблицы galleries
--
INSERT INTO galleries VALUES
(1, '1720767043.jpg', 'Omnis rerum amet ut pariatur Vel quia ad saepe dolor do corrupti atque', 1, 1, '2024-07-12 06:50:43', '2024-07-12 06:50:43'),
(2, '1720767078.jpg', 'Do cum ut id sequi officia saepe magna perferendis labore quia et sunt enim', 2, 1, '2024-07-12 06:51:18', '2024-07-12 06:51:41'),
(3, '1720767096.jpg', 'Tempora molestiae aut aliqua Dolorem sit eos deserunt qui voluptates facere', 3, 1, '2024-07-12 06:51:36', '2024-07-12 06:51:36'),
(4, '1720767113.jpg', 'Quidem sunt harum ipsum in ipsum quae corporis non exercitation assumenda placeat facere ut ratione obcaecati delectus alias veritatis', 4, 1, '2024-07-12 06:51:53', '2024-07-12 06:51:53'),
(5, '1720767130.jpg', 'Odit officia corrupti minus odio qui laboriosam et deserunt in quod dignissimos culpa omnis voluptatem corrupti ut', 5, 1, '2024-07-12 06:52:11', '2024-07-12 06:52:11'),
(6, '1720767162.jpg', 'Est magni velit tenetur quo a fugit consequatur tenetur sit delectus in accusantium harum voluptatum accusamus', 6, 1, '2024-07-12 06:52:43', '2024-07-12 06:53:10'),
(7, '1720772484.jpg', 'Eiusmod ea eveniet atque veritatis enim quis iste consequuntur cillum id velit Nam dolore dolore quia non', 7, 1, '2024-07-12 08:21:24', '2024-07-12 08:21:24');

-- 
-- Вывод данных для таблицы failed_jobs
--
-- Таблица kidsdb.failed_jobs не содержит данных

-- 
-- Вывод данных для таблицы companies
--
INSERT INTO companies VALUES
(1, 'Office', '732  Glenstone, Springfield, USA', '+1 (261) 793-1625', 'begy@mailinator.com', '2024-07-13 11:04:28', '2024-07-13 06:30:45'),
(2, 'Managment', '30 E Lake St, Chicago, USA Empire', '+1 (654) 603-3512', 'zukibagyn@mailinator.com', '2024-07-13 11:04:47', '2024-07-13 06:31:03');

-- 
-- Вывод данных для таблицы carousels
--
INSERT INTO carousels VALUES
(1, 'Recusandae Consequuntur incidunt', '1720721986.jpg', 3, 1, '2024-07-11 07:19:48', '2024-07-11 18:19:46'),
(2, 'Irure officia at duis quo accusamus', '1720850259.jpg', 1, 1, '2024-07-11 07:21:59', '2024-07-13 05:57:39'),
(3, 'Quidem ducimus aut quaerat in et', '1720850272.jpg', 2, 1, '2024-07-11 07:22:24', '2024-07-13 05:57:52'),
(5, 'Officia placeat accusamus', '1720704287.jpg', 41, 0, '2024-07-11 09:43:02', '2024-07-13 05:23:53');

-- 
-- Вывод данных для таблицы articles
--
INSERT INTO articles VALUES
(1, 'Pariatur Nostrum as Excepturi obcaecati ', 'Excepturi obcaecati .&nbsp;Pariatur Nostrum asPariatur Nostrum asPariatur Nostrum asPariatur Nostrum as', 2, 1, '2024-07-09', 9, '1720523242.jpg', '2024-07-09 07:09:54', '2024-07-11 13:27:19'),
(2, 'Vel exercitationem c', 'Omnis minim earum be. Omnis minim earum be.Omnis minim earum be.', 2, 1, '2024-07-09', 5, '1720510831.jpg', '2024-07-09 07:40:31', '2024-07-09 11:22:55'),
(3, 'Ut voluptates volupt', 'Itaque aliqua. Dolor. Itaque aliqua. Dolor.Itaque aliqua. Dolor.Itaque aliqua. Dolor.', 4, 1, '2024-07-09', 5, '1720511446.jpg', '2024-07-09 07:50:46', '2024-07-09 12:07:25'),
(4, 'Et dolorum odio elig', 'Ea commodi molestias. Ea commodi molestias. Ea commodi molestias. Ea commodi molestias.Ea commodi molestias. Ea commodi molestias.', 5, 1, '2024-07-09', 9, '1720511608.jpg', '2024-07-09 07:53:28', '2024-07-09 12:07:27'),
(5, 'Omnis laborum aliqui', 'Illum, necessitatibu.&nbsp;<span style="font-size: 13.2px;">Illum, necessitatibu.</span><span style="font-size: 13.2px;">Illum, necessitatibu.</span><span style="font-size: 13.2px;">Illum, necessitatibu.</span><span style="font-size: 13.2px;">Illum, necessitatibu.</span><span style="font-size: 13.2px;">Illum, necessitatibu.</span>', 8, 1, '2024-07-09', 3, '1720520841.jpg', '2024-07-09 10:27:21', '2024-07-10 04:12:43'),
(6, 'Soluta saepe et est ', 'Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;<span style="font-size: 13.2px;">Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;</span><span style="font-size: 13.2px;">Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;</span><span style="font-size: 13.2px;">Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;</span><span style="font-size: 13.2px;">Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;</span><span style="font-size: 13.2px;">Tempore, qui labore .&nbsp;Soluta saepe et est&nbsp;</span>', 7, 1, '2024-07-09', 3, '1720527358.jpg', '2024-07-09 12:15:58', '2024-07-10 04:54:08'),
(7, 'Aliqua Id laborum ipsa vel', '<p>Quibusdam quia rerum et suscipit distinctio. Omnis ducimus, mollit qui in cum excepteur culpa neque ad laboris quod aperiam ad fugiat, iste consequuntur voluptas eum cum sed ut qui adipisicing rem sit, ducimus, et eiusmod facilis quasi ad facilis rem eaqu.Assumenda qui quidem velit deserunt expedita vero ipsam nostrum et molestiae non mollitia quibusdam nisi saepe in illum, perferendis.&nbsp;Fugiat exercitationem qui aute vel tenetur voluptas ex enim necessitatibus dolor tenetur ea sed mollitia irure sitQuibusdam quia rerum et suscipit distinctio. </p><ul><li>Omnis ducimus, mollit qui in cum excepteur culpa neque ad laboris quod aperiam ad fugiat, iste consequuntur voluptas eum cum sed ut qui adipisicing rem sit, ducimus, et eiusmod facilis quasi ad facilis rem eaqu.</li><li>Assumenda qui quidem velit deserunt expedita vero ipsam nostrum et molestiae non mollitia quibusdam nisi saepe in illum, perferendis.&nbsp;</li><li>Fugiat exercitationem qui aute vel tenetur voluptas ex enim necessitatibus dolor tenetur ea sed mollitia irure sit</li></ul><p><img src="data:image/jpeg;base64,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" style="width: 217.2px; float: right; height: 217.2px;" data-filename="commentor-item1.jpg" class="note-float-right">Quibusdam quia rerum et suscipit distinctio. Omnis ducimus, mollit qui in cum excepteur culpa neque ad laboris quod aperiam ad fugiat, iste consequuntur voluptas eum cum sed ut qui adipisicing rem sit, ducimus, et eiusmod facilis quasi ad facilis rem eaqu.Assumenda qui quidem velit deserunt expedita vero ipsam nostrum et molestiae non mollitia quibusdam nisi saepe in illum, perferendis.<b>&nbsp;Fugiat exercitationem</b> qui aute vel tenetur voluptas ex enim necessitatibus dolor tenetur ea sed mollitia irure sitQuibusdam quia rerum et suscipit distinctio. Omnis ducimus, mollit qui in cum excepteur culpa neque ad laboris quod aperiam ad fugiat, iste consequuntur voluptas eum cum sed ut qui adipisicing rem sit, ducimus, et eiusmod facilis quasi ad facilis rem eaqu.</p><p>Assumenda qui quidem velit deserunt expedita vero ipsam nostrum et molestiae non mollitia quibusdam nisi saepe in illum, perferendis.&nbsp;Fugiat exercitationem qui aute vel tenetur voluptas ex enim necessitatibus dolor tenetur ea sed mollitia irure sit</p>', 19, 1, '2024-07-10', 5, '1720585597.jpg', '2024-07-10 04:26:37', '2024-07-11 05:13:53');

-- 
-- Вывод данных для таблицы abouts
--
INSERT INTO abouts VALUES
(1, 'Learn As You Play In Kindergarten', '<p style="color: rgb(121, 120, 118); font-family: &quot;Times New Roman&quot;; font-size: 16px; letter-spacing: 0.32px; background-color: rgb(250, 250, 250);">Aliquet nunc vitae interdum mauris pretium lectus mauris viverra ornare quam diam felis. Ultrices eget pretium sit euismod mi id risus, aliquam odio posuere ac in in nisl sed augue. Porta aenean egestas malesuada in pulvinar enim viverra. ipsum dolor sit amet consectetur. Ipsum ipsum ut pulvinar ipsum cras metus purus mattis integer. Tellus ipsum viverra semper quisque eget nisl vel congue consectetur.</p><p style="color: rgb(121, 120, 118); font-family: &quot;Times New Roman&quot;; font-size: 16px; letter-spacing: 0.32px; background-color: rgb(250, 250, 250);">Ultrices eget pretium sit euismod mi id risus, aliquam odio posuere ac in in nisl sed augue. Porta aenean egestas malesuada in pulvinar enim viverra. ipsum dolor sit amet consectetur. Ipsum ipsum ut pulvinar ipsum cras metus purus mattis integer. Tellus ipsum viverra semper quisque eget nisl vel congue consectetur.</p>', '1720520793.jpg', NULL, '2024-07-09 10:26:33');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;