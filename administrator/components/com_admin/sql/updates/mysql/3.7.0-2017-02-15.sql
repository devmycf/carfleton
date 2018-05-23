-- Normalize redirect_links table default values.
ALTER TABLE `carf_redirect_links` MODIFY `comment` varchar(255) NOT NULL DEFAULT '';
