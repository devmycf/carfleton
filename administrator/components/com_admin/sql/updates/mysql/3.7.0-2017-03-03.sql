ALTER TABLE `carf_languages` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT 0;
ALTER TABLE `carf_menu_types` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT 0;

ALTER TABLE  `carf_content` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';
ALTER TABLE  `carf_newsfeeds` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';
