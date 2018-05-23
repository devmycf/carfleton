

CREATE TABLE IF NOT EXISTS `#__vikrentcar_busy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcar` int(10) NOT NULL,
  `ritiro` int(11) DEFAULT NULL,
  `consegna` int(11) DEFAULT NULL,
  `realback` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_caratteristiche` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `align` varchar(64) DEFAULT NULL,
  `textimg` varchar(128) DEFAULT NULL,
  `ordering` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `idcat` varchar(128) DEFAULT NULL,
  `idcarat` varchar(128) DEFAULT NULL,
  `idopt` varchar(128) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `idplace` varchar(128) DEFAULT NULL,
  `avail` tinyint(1) NOT NULL DEFAULT 1,
  `units` int(10) NOT NULL DEFAULT 1,
  `idretplace` varchar(128) DEFAULT NULL,
  `moreimgs` varchar(256) DEFAULT NULL,
  `startfrom` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT 'cat',
  `descr` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `param` varchar(128) NOT NULL,
  `setting` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `percentot` tinyint(1) NOT NULL DEFAULT 1,
  `value` decimal(12,2) DEFAULT NULL,
  `datevalid` varchar(64) DEFAULT NULL,
  `allvehicles` tinyint(1) NOT NULL DEFAULT 1,
  `idcars` varchar(512) DEFAULT NULL,
  `mintotord` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_custfields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT 'text',
  `choose` text DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `ordering` int(10) NOT NULL DEFAULT 1,
  `isemail` tinyint(1) NOT NULL DEFAULT 0,
  `poplink` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_dispcost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcar` int(10) NOT NULL,
  `days` int(10) NOT NULL,
  `idprice` int(10) NOT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `attrdata` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_dispcosthours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcar` int(10) NOT NULL,
  `hours` int(10) NOT NULL,
  `idprice` int(10) NOT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `attrdata` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_gpayments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `file` varchar(64) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `charge` decimal(12,2) DEFAULT NULL,
  `setconfirmed` tinyint(1) NOT NULL DEFAULT 0,
  `shownotealw` tinyint(1) NOT NULL DEFAULT 0,
  `val_pcent` tinyint(1) NOT NULL DEFAULT 1,
  `ch_disc` tinyint(1) NOT NULL DEFAULT 1,
  `params` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_hourscharges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcar` int(10) NOT NULL,
  `ehours` int(10) NOT NULL,
  `idprice` int(10) NOT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_iva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `aliq` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_locfees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) NOT NULL,
  `to` int(10) NOT NULL,
  `daily` tinyint(1) NOT NULL DEFAULT 0,
  `cost` decimal(12,2) DEFAULT NULL,
  `idiva` int(10) DEFAULT NULL,
  `invert` tinyint(1) NOT NULL DEFAULT 0,
  `losoverride` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_oldorders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tsdel` int(11) DEFAULT NULL,
  `custdata` text,
  `ts` int(11) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `idcar` int(10) DEFAULT NULL,
  `days` int(10) DEFAULT NULL,
  `ritiro` int(11) DEFAULT NULL,
  `consegna` int(11) DEFAULT NULL,
  `idtar` int(10) DEFAULT NULL,
  `optionals` varchar(128) DEFAULT NULL,
  `custmail` varchar(128) DEFAULT NULL,
  `sid` varchar(128) DEFAULT NULL,
  `idplace` int(10) DEFAULT NULL,
  `idreturnplace` int(10) DEFAULT NULL,
  `totpaid` decimal(12,2) DEFAULT NULL,
  `hourly` tinyint(1) NOT NULL DEFAULT 0,
  `coupon` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_optionals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `descr` text,
  `cost` decimal(12,2) DEFAULT NULL,
  `perday` tinyint(1) NOT NULL DEFAULT 0,
  `hmany` tinyint(1) NOT NULL DEFAULT 1,
  `img` varchar(128) DEFAULT NULL,
  `idiva` int(10) DEFAULT NULL,
  `maxprice` decimal(12,2) DEFAULT NULL,
  `forcesel` tinyint(1) NOT NULL DEFAULT 0,
  `forceval` varchar(32) DEFAULT NULL,
  `ordering` int(10) NOT NULL DEFAULT 1,
  `forceifdays` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbusy` int(10) DEFAULT NULL,
  `custdata` text,
  `ts` int(11) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `idcar` int(10) DEFAULT NULL,
  `days` int(10) DEFAULT NULL,
  `ritiro` int(10) DEFAULT NULL,
  `consegna` int(10) DEFAULT NULL,
  `idtar` int(10) DEFAULT NULL,
  `optionals` varchar(128) DEFAULT NULL,
  `custmail` varchar(128) DEFAULT NULL,
  `sid` varchar(128) DEFAULT NULL,
  `idplace` int(10) DEFAULT NULL,
  `idreturnplace` int(10) DEFAULT NULL,
  `totpaid` decimal(12,2) DEFAULT NULL,
  `idpayment` varchar(128) DEFAULT NULL,
  `ujid` int(10) NOT NULL DEFAULT 0,
  `hourly` tinyint(1) NOT NULL DEFAULT 0,
  `coupon` varchar(128) DEFAULT NULL,
  `order_total` decimal(12,2) DEFAULT NULL,
  `locationvat` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT 'where',
  `lat` varchar(16) DEFAULT NULL,
  `lng` varchar(16) DEFAULT NULL,
  `descr` varchar(512) DEFAULT NULL,
  `opentime` varchar(16) DEFAULT NULL,
  `closingdays` varchar(1024) DEFAULT NULL,
  `idiva` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT 'cost',
  `attr` varchar(128) DEFAULT NULL,
  `idiva` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `diffcost` decimal(12,2) DEFAULT NULL,
  `idcars` varchar(256) DEFAULT NULL,
  `locations` int(10) NOT NULL DEFAULT 0,
  `spname` varchar(64) DEFAULT NULL,
  `wdays` varchar(16) DEFAULT NULL,
  `pickupincl` tinyint(1) NOT NULL DEFAULT 0,
  `val_pcent` tinyint(1) NOT NULL DEFAULT 2,
  `losoverride` varchar(512) DEFAULT NULL,
  `keepfirstdayrate` tinyint(1) NOT NULL DEFAULT 0,
  `roundmode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ts` int(11) NOT NULL,
  `ip` varchar(128) DEFAULT NULL,
  `place` varchar(64) DEFAULT NULL,
  `cat` varchar(64) DEFAULT NULL,
  `ritiro` int(11) DEFAULT NULL,
  `consegna` int(11) DEFAULT NULL,
  `res` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `param` varchar(128) NOT NULL,
  `exp` text,
  `setting` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_tmplock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcar` int(10) NOT NULL,
  `ritiro` int(11) NOT NULL,
  `consegna` int(11) NOT NULL,
  `until` int(11) NOT NULL,
  `realback` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__vikrentcar_usersdata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ujid` int(10) NOT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('showfooter','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('timeopenstore','');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('hoursmorerentback','0');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('hoursmorecaravail','0');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('placesfront','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('allowrent','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('dateformat','%d/%m/%Y');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('showcategories','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('fronttitletag','h3');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('fronttitletagclass','');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('searchbtnclass','button');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('ivainclusa','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('tokenform','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('ccpaypal','');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('paytotal','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('payaccpercent','50');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('minuteslock','20');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('oldorders','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('sendjutility','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('allowstats','0');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('sendmailstats','0');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('currencyname','EUR');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('currencysymb','&euro;');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('currencycodepp','EUR');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('sitelogo','vikrentcar.jpg');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('showpartlyreserved','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('numcalendars','3');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('requirelogin','0');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('loadjquery','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('calendar','jqueryui');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('ehourschbasp','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('enablecoupons','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('theme','default');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('sendpdf','1');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('numberformat','2:.:,');
INSERT INTO `#__vikrentcar_config` (`param`,`setting`) VALUES ('setdropdplus','0');

INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('disabledrentmsg','Disabled Rental Message','');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('fronttitle','Page Title','VikRentCar');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('searchbtnval','Search Button Text','Search');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('intromain','Main Page Introducing Text','');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('closingmain','Main Page Closing Text','Powered by VikRentCar');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('paymentname','Paypal Transaction Name','Cars Rental');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('disclaimer','Disclaimer Text','');
INSERT INTO `#__vikrentcar_texts` (`param`,`exp`,`setting`) VALUES ('footerordmail','Footer Text Order eMail','');

INSERT INTO `#__vikrentcar_gpayments` (`name`,`file`,`published`,`note`,`charge`,`setconfirmed`,`shownotealw`,`val_pcent`,`ch_disc`) VALUES ('Bank Transfer','bank_transfer.php','0','<p>Bank Transfer Info...</p>','0.00','1','1','1','1');
INSERT INTO `#__vikrentcar_gpayments` (`name`,`file`,`published`,`note`,`charge`,`setconfirmed`,`shownotealw`,`val_pcent`,`ch_disc`) VALUES ('PayPal','paypal.php','0','<p></p>','0.00','0','0','1','1');
INSERT INTO `#__vikrentcar_gpayments` (`name`,`file`,`published`,`note`,`charge`,`setconfirmed`,`shownotealw`,`val_pcent`,`ch_disc`) VALUES ('Authorize.net AIM','authorizenet_aim.php','0','<p></p>','0.00','0','0','1','1');
INSERT INTO `#__vikrentcar_gpayments` (`name`,`file`,`published`,`note`,`charge`,`setconfirmed`,`shownotealw`,`val_pcent`,`ch_disc`) VALUES ('Offline Credit Card','offline_credit_card.php','0','<p></p>','0.00','0','0','1','1');

INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('VRCSEPDRIVERD','separator','','0','1','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_NAME','text','','1','2','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_LNAME','text','','1','3','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_EMAIL','text','','1','4','1','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_PHONE','text','','0','5','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_ADDRESS','text','','0','6','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_ZIP','text','','0','7','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_CITY','text','','0','8','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_STATE','text','','0','9','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_DBIRTH','text','','1','10','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_FLIGHTNUM','text','','0','11','0','');
INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES ('ORDER_NOTES','textarea','','0','12','0','');
