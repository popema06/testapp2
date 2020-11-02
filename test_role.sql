-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
                        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                        `role` varchar(30) NOT NULL,
                        `role_name` varchar(100) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`id`, `role`, `role_name`) VALUES
(1,	'admin',	'Administrátor aplikace'),
(2,	'pedagog',	'Pedagog'),
(3,	'rodic',	'Rodič');

-- 2020-11-02 19:38:20