-- Normalize modules content field with other db systems. Add default value.
ALTER TABLE `carf_modules` MODIFY `content` text NOT NULL DEFAULT '';
