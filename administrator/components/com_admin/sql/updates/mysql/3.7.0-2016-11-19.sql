ALTER TABLE `carf_menu_types` ADD COLUMN `client_id` int(11) NOT NULL DEFAULT 0;

UPDATE `carf_menu` SET `published` = 1 WHERE `menutype` = 'main' OR `menutype` = 'menu';
