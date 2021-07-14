ALTER TABLE `users` ADD `theme` VARCHAR(255) NOT NULL DEFAULT 'light' AFTER `rank`;
ALTER TABLE `users` ADD `visible` ENUM('0', '1') NOT NULL DEFAULT '1' AFTER `online`;
ALTER TABLE `users` ADD `premiar` INT(11) NOT NULL DEFAULT '0' AFTER `points`;
ALTER TABLE `users` ADD `home_color` VARCHAR(255) NOT NULL DEFAULT 'https://i.imgur.com/5yg7tXG.png' AFTER `visible`;
ALTER TABLE `users` ADD `home_image` VARCHAR(555) NOT NULL DEFAULT '' AFTER `home_color`;
ALTER TABLE `users` ADD `promos` INT(11) NOT NULL DEFAULT '0' AFTER `home_image`;
ALTER TABLE `users` ADD `eventos` INT(11) NOT NULL DEFAULT '0' AFTER `promos`;
ALTER TABLE `users` ADD `funcao` VARCHAR(255) NOT NULL DEFAULT 'Sua função é servir ao Brytch' AFTER `eventos`;