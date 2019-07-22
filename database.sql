
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--- noi quy - quy dinh
CREATE TABLE IF NOT EXISTS `regulations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategory` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulations_idcategory_foreign` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(10) unsigned NOT NULL,
  `idnew` int(10) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_iduser_foreign` (`iduser`),
  KEY `comment_idnew_foreign` (`idnew`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--loaitin = groupnew
CREATE TABLE IF NOT EXISTS `groupnew` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategory` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupnew_idcategory_foreign` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--theloai = category

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL, 
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-----tintuc  = new , loaitin=groupnew , theloai=category

CREATE TABLE IF NOT EXISTS `new` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotnew` int(11) NOT NULL DEFAULT '0',
  `numberview` int(11) NOT NULL DEFAULT '0',
  `idgroupnew` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `new_idgroupnew_foreign` (`idgroupnew`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255),
  `gender` tinyint default '1',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



INSERT INTO `users` (`id`, `name`, `email`, `level`,`address`,`gender`, `password`, `remember_token`, `created_at`, `updated_at`) 
VALUES
(1, 'User_3', 'admin@gmail.com', 1,NULL,1, '$2y$10$DES3NL8tozlU99dvO9o4lOfYyYcaM9n86gJcJV5.fz2G8b6qLa6Gq', NULL, '2016-06-09 03:05:09', NULL),
(2, 'User_4', 'thuydung.hn1@gmail.com', 0,NULL,1, '$2y$10$xqfx9motmrCAEuEjCyQroOo/eFqum1hPhgwnz5LSLkhdyGHvf6l8O', NULL, '2016-06-09 03:05:10', NULL),
(3, 'User_5', 'bksoft@gmail.com', 0,NULL,1, '$2y$10$rTviORV94uWv/KcNK7s0UeGwlQ2DSN5UGSOAzMkZ6sGgfr9nE2fSq', NULL, '2016-06-09 03:05:10', NULL);
---
--tintuc  = new , loaitin=groupnew , theloai=category
---
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idnew_foreign` FOREIGN KEY (`idnew`) REFERENCES `new` (`id`),
  ADD CONSTRAINT `comment_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);


ALTER TABLE `groupnew`
  ADD CONSTRAINT `groupnew_idcategory_foreign` FOREIGN KEY (`idcategory`) REFERENCES `category` (`id`);


ALTER TABLE `new`
  ADD CONSTRAINT `new_idgroupnew_foreign` FOREIGN KEY (`idgroupnew`) REFERENCES `groupnew` (`id`);

