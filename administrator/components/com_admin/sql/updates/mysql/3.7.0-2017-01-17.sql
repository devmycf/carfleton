-- Sync menutype for admin menu and set client_id correct
UPDATE `carf_menu` SET `menutype` = 'main', `client_id` = 1  WHERE `menutype` = 'main' OR `menutype` = 'menu';
