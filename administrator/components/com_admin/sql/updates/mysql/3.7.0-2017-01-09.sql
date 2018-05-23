-- Normalize categories table default values.
ALTER TABLE `carf_categories` MODIFY `title` varchar(255) NOT NULL DEFAULT '';
ALTER TABLE `carf_categories` MODIFY `description` mediumtext NOT NULL DEFAULT '';
ALTER TABLE `carf_categories` MODIFY `params` text NOT NULL DEFAULT '';
ALTER TABLE `carf_categories` MODIFY `metadesc` varchar(1024) NOT NULL DEFAULT '' COMMENT 'The meta description for the page.';
ALTER TABLE `carf_categories` MODIFY `metakey` varchar(1024) NOT NULL DEFAULT '' COMMENT 'The meta keywords for the page.';
ALTER TABLE `carf_categories` MODIFY `metadata` varchar(2048) NOT NULL DEFAULT '' COMMENT 'JSON encoded metadata properties.';
ALTER TABLE `carf_categories` MODIFY `language` char(7) NOT NULL DEFAULT '';
