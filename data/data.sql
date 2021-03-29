DROP DATABASE IF EXISTS `practice`;
CREATE DATABASE IF NOT EXISTS `practice` DEFAULT CHARACTER SET 'UTF8';
USE `practice`;
CREATE TABLE IF NOT EXISTS `practice_user`(
    `id` INT UNSIGNED AUTO_INCREMENT KEY,
    `username` VAARCHAR(20) NOT NULL UNIQUE,
    `password` CHAR(32) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `token` CHAR(32) NOT NULL COMMENT '激活 TOKEN',
    `token_exptime` INT UNSIGNED NOT NULL COMMENT 'TOKEN 過期時間',
    `regTime` INT UNSIGNED NOT NULL,
    `status` TINYINT UNSIGNED DEFAULT 0 COMMENT '0 代表未激活，1 代表激活'
);