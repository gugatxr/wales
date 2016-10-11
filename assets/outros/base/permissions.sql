CREATE DATABASE IF NOT EXISTS projeto_elefante DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE projeto_elefante;

# Dump of table permission_groups
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `groupID` int(11) NOT NULL auto_increment,
  `groupName` varchar(200) default NULL,
  PRIMARY KEY  (`groupID`)
) DEFAULT CHARSET=utf8;



# Dump of table permission_map
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permission_map` (
  `groupID` int(11) NOT NULL default '0',
  `permissionID` int(11) NOT NULL default '0',
  PRIMARY KEY  (`groupID`,`permissionID`)
) DEFAULT CHARSET=utf8;



# Dump of table permissions
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permissions` (
  `permissionID` int(11) NOT NULL auto_increment,
  `permission` varchar(200) default NULL,
  `key` varchar(100) default NULL,
  `category` varchar(100) default NULL,
  PRIMARY KEY  (`permissionID`),
  UNIQUE KEY `key` (`key`)
) DEFAULT CHARSET=utf8;
