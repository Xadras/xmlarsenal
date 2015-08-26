This SQL-dump can be used to create the necessary database structure in the arsenal database (see [Config](Config.md)).

```
-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 12. April 2010 um 11:00
-- Server Version: 5.1.34
-- PHP-Version: 5.2.8-x64

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `arsenal`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_accounts`
--

DROP TABLE IF EXISTS `arsenal_accounts`;
CREATE TABLE `arsenal_accounts` (
  `entry_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password_hash` varchar(512) NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `idx_user_pw` (`user_name`(5),`user_password_hash`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_achievementladder`
--

DROP TABLE IF EXISTS `arsenal_achievementladder`;
CREATE TABLE `arsenal_achievementladder` (
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_arenaladder`
--

DROP TABLE IF EXISTS `arsenal_arenaladder`;
CREATE TABLE `arsenal_arenaladder` (
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_arenateams`
--

DROP TABLE IF EXISTS `arsenal_arenateams`;
CREATE TABLE `arsenal_arenateams` (
  `entry_id` int(11) NOT NULL,
  `arenateam_id_on_realm` int(11) NOT NULL,
  `realm_id` int(11) NOT NULL,
  `arenateam_name` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `idx_arenateam_name` (`arenateam_name`(5))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_characters`
--

DROP TABLE IF EXISTS `arsenal_characters`;
CREATE TABLE `arsenal_characters` (
  `entry_id` int(11) NOT NULL,
  `char_id_on_realm` int(11) NOT NULL,
  `realm_id` int(11) NOT NULL,
  `char_name` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `idx_char_name` (`char_name`(5))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_failed_logins`
--

DROP TABLE IF EXISTS `arsenal_failed_logins`;
CREATE TABLE `arsenal_failed_logins` (
  `IP` varchar(40) NOT NULL,
  `num_fails` int(11) NOT NULL,
  `last_fail` int(11) NOT NULL,
  PRIMARY KEY (`IP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_guilds`
--

DROP TABLE IF EXISTS `arsenal_guilds`;
CREATE TABLE `arsenal_guilds` (
  `entry_id` int(11) NOT NULL,
  `guild_id_on_realm` int(11) NOT NULL,
  `realm_id` int(11) NOT NULL,
  `guild_name` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `idx_guild_name` (`guild_name`(5))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_searches`
--

DROP TABLE IF EXISTS `arsenal_searches`;
CREATE TABLE `arsenal_searches` (
  `entry_id` int(11) NOT NULL,
  `query_string` varchar(100) NOT NULL,
  `data` mediumtext NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `idx_querystring` (`query_string`(5))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arsenal_xmlcache`
--

DROP TABLE IF EXISTS `arsenal_xmlcache`;
CREATE TABLE `arsenal_xmlcache` (
  `file_name` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `file_contents` mediumtext NOT NULL,
  PRIMARY KEY (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='for saving xml in the database instead of files (optional)';
```