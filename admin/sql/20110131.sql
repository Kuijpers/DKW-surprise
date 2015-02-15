-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 31 Jan 2011 om 19:41
-- Serverversie: 5.1.37
-- PHP-Versie: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `testsite`
--
CREATE DATABASE `testsite` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `testsite`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `breeding`
--

CREATE TABLE IF NOT EXISTS `breeding` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `stallion` varchar(255) COLLATE utf8_bin NOT NULL,
  `mare` varchar(255) COLLATE utf8_bin NOT NULL,
  `breedmonth` int(5) NOT NULL,
  `breedyear` int(10) NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `breeding`
--

INSERT INTO `breeding` (`id`, `stallion`, `mare`, `breedmonth`, `breedyear`, `stamp`) VALUES
(1, 'DS I''m a sinsation ', '  Fullname mare ', 3, 2012, 1293961231),
(2, '  DS I''m a sinsation ', 'Fullname mare ', 2, 2011, 1293959987);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `en_about`
--

CREATE TABLE IF NOT EXISTS `en_about` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_about`
--

INSERT INTO `en_about` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Example message', 'This is an example message.\r\n\r\nWith this message you can see what it does.', 1293804837);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `en_horses`
--

CREATE TABLE IF NOT EXISTS `en_horses` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_horses`
--

INSERT INTO `en_horses` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Rebel arived', 'Rebel has finally arrived.\r\n\r\nIt took a while but finally he''s here.', 1293959987),
(2, 'Test number 2', 'Test number 2 to see what will happen.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nI have added a few enters\r\n\r\n\r\n\r\n\r\nAs you can see now.', 1293959987),
(3, 'What is going to happen', 'Let''s see if this runs smooth.', 1293959987);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `en_index`
--

CREATE TABLE IF NOT EXISTS `en_index` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_index`
--

INSERT INTO `en_index` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Test', 'Test GB', 1291455156),
(8, '', '', 1293716229),
(3, 'blegh test', 'Blabla\r\n\r\n\r\n\r\n\r\n\r\n\r\nEn nog meer blabla\r\n\r\n\r\n\r\n\r\n\r\n\r\nNog meer bla bla', 1291455318),
(9, 'Just another test', 'Lets see if it will be shown in dutch.', 1293716546),
(7, 'Test so many for removal', 'This test is for removal of the information.', 1291713240);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `horses`
--

CREATE TABLE IF NOT EXISTS `horses` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `callname` varchar(255) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` int(5) NOT NULL,
  `dobday` int(5) NOT NULL,
  `dobmonth` int(5) NOT NULL,
  `dobyear` int(10) NOT NULL,
  `sire` varchar(255) COLLATE utf8_bin NOT NULL,
  `dam` varchar(255) COLLATE utf8_bin NOT NULL,
  `fofs` varchar(255) COLLATE utf8_bin NOT NULL,
  `mofs` varchar(255) COLLATE utf8_bin NOT NULL,
  `fofd` varchar(255) COLLATE utf8_bin NOT NULL,
  `mofd` varchar(255) COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  `sale` int(5) NOT NULL,
  `sale_price` varchar(10) COLLATE utf8_bin NOT NULL,
  `sold_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Gegevens worden uitgevoerd voor tabel `horses`
--

INSERT INTO `horses` (`id`, `callname`, `fullname`, `gender`, `dobday`, `dobmonth`, `dobyear`, `sire`, `dam`, `fofs`, `mofs`, `fofd`, `mofd`, `stamp`, `sale`, `sale_price`, `sold_date`) VALUES
(8, 'Rebel', 'DS I''m a sinsation', 1, 4, 4, 2005, 'Vader van Rebel', 'Moeder van Rebel', 'Father of sire', 'Mother of sire', 'Father of dam', 'Mother of dam', 1293959987, 0, '0', '0000-00-00'),
(9, 'Callname', 'Fullname mare', 2, 1, 1, 2010, 'Sire', 'Dam', 'Father of sire', 'Mother of sire', 'Father of dam', 'Mother of dam', 1293961231, 1, '3000', '0000-00-00'),
(10, 'Callname', 'Fullname Gelding', 3, 1, 1, 2010, 'Sire', 'Dam', 'Father of sire', 'Mother of sire', 'Father of dam', 'Mother of dam', 1293997919, 0, '0', '0000-00-00'),
(12, 'Testhengst', 'Test manneke', 1, 17, 1, 2011, 'jjfdjjf', 'jgjijojwoiji', 'jvoijdijoifjwoiejgoiejwoi', 'cjoidwjiwjfiuhwdcsjeii', 'oigjoiwjiufhwe', 'oicjijdswjofij', 1294390420, 1, 'request', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) COLLATE utf8_bin NOT NULL,
  `pass` varchar(60) COLLATE utf8_bin NOT NULL,
  `firstlog` int(11) DEFAULT '1',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Gegevens worden uitgevoerd voor tabel `members`
--

INSERT INTO `members` (`member_id`, `login`, `pass`, `firstlog`) VALUES
(1, 'beheer', 'f5212ff3f9bac5439368462f2e791558', 1),
(2, 'admin', '1603c99b82b5f200f8c635d533b64922', 1),
(23, 'dennis', '4a6aa76f9ae1616c07dc35e71e439565', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nl_about`
--

CREATE TABLE IF NOT EXISTS `nl_about` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_about`
--

INSERT INTO `nl_about` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Voorbeeld bericht', 'Dit is een voorbeeld bericht.\r\n\r\nHiermee kun je zien wat het inhoud.', 1293804837);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nl_horses`
--

CREATE TABLE IF NOT EXISTS `nl_horses` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_horses`
--

INSERT INTO `nl_horses` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Rebel is gearriveerd', 'Rebel is vandaag eindelijk bij ons gearriveerd.\r\n\r\nEens kijken wat een aanpassing doet.', 1293959987),
(3, 'Wat gaat er gebeuren', 'Eens kijken of dit soepel verloopt.', 1293959987);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nl_index`
--

CREATE TABLE IF NOT EXISTS `nl_index` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_index`
--

INSERT INTO `nl_index` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Test', 'Test NL\r\n\r\nEens kijken wat er gebeurd.\r\n\r\nWeer een extra test maar nu voor de foto.', 1291455156),
(9, 'Test voor blank spot', 'Eens kijken wat hij doet met een blank spot voor een taal.\r\n\r\nGeen idee wat er nu gebeurd', 1293716229),
(3, 'bla test', 'Blabla\r\n\r\n\r\n\r\n\r\n\r\n\r\nEn nog meer blabla\r\n\r\n\r\n\r\n\r\n\r\n\r\nNog meer bla bla', 1291455318),
(10, 'Test voor leeg invulvak', '', 1293716546),
(8, '', '', 1291713240),
(11, 'Test zonder foto', 'Eens kijken wat er gebeurd zonder foto', 1293783413);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `offspring`
--

CREATE TABLE IF NOT EXISTS `offspring` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` int(5) NOT NULL,
  `dobday` int(5) NOT NULL,
  `dobmonth` int(5) NOT NULL,
  `dobyear` int(10) NOT NULL,
  `parent` varchar(255) COLLATE utf8_bin NOT NULL,
  `results` text COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `offspring`
--

INSERT INTO `offspring` (`id`, `name`, `gender`, `dobday`, `dobmonth`, `dobyear`, `parent`, `results`, `stamp`) VALUES
(15, 'DS I''m a sinsation', 1, 4, 4, 2005, 'Vader van Rebel', 'Multiple champion', 1293961231),
(14, 'Fullname Gelding', 3, 1, 1, 2010, 'Sire', 'Multiple champion AMHA\r\n\r\nMultiple champion MHCE\r\n\r\n1A premie NMPRS merriekeuring\r\n\r\n', 1293961231),
(18, ' Test manneke', 1, 17, 1, 2011, ' jjfdjjf', 'sdgfsrggr', 1293961231);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image` varchar(225) COLLATE utf8_bin NOT NULL,
  `stamp` varchar(12) COLLATE utf8_bin NOT NULL,
  `main_image` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=113 ;

--
-- Gegevens worden uitgevoerd voor tabel `picture`
--

INSERT INTO `picture` (`id`, `image`, `stamp`, `main_image`, `gallery`) VALUES
(111, '1296498971.jpg', '', 0, 1),
(78, '1291455290.jpg', '1291455266', 0, 0),
(79, '1291455369.jpg', '1291455318', 1, 0),
(94, '1293804918.jpg', '1293804837', 0, 1),
(85, '1293716261.jpg', '1293716229', 0, 1),
(112, '1296499121.jpg', '', 0, 1),
(84, '1291713303.jpg', '1291713240', 1, 1),
(95, '1294053518.jpg', '1293959987', 0, 1),
(96, '1294053617.jpg', '1293959987', 1, 0),
(98, '1294054181.jpg', '1293959987', 0, 0),
(99, '1294054283.jpg', '1293959987', 0, 0),
(100, '1294054919.jpg', '0', 0, 1),
(103, '1294280629.jpg', '1293959987', 0, 1),
(109, '1295393117.jpg', '0', 1, 1),
(108, '1295393001.jpg', '0', 0, 0),
(107, '1295392967.jpg', '0', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `organisation` varchar(50) COLLATE utf8_bin NOT NULL,
  `registration` varchar(50) COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Gegevens worden uitgevoerd voor tabel `registration`
--

INSERT INTO `registration` (`id`, `organisation`, `registration`, `stamp`) VALUES
(9, 'AMHA', '1225883763', 1293959987),
(10, 'AMHR', '2147483647', 1293959987),
(11, 'NMPRS', 'NMPRS-2539948875', 1293959987),
(12, 'AMHA', '188366387882', 1293961231),
(13, 'AMHR', '299775465399', 1293961231),
(14, 'BMP', '28776478839001', 1293961231),
(15, 'NMPRS', 'NMPRS-38881900382', 1293961231),
(16, 'AMHA', '299774889930', 1293997919),
(17, 'AMHR', '299846638888222', 1293997919),
(18, 'BMHS', '29947739', 1293997919),
(20, 'BMP', '39984767772', 1293959987);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resday` int(5) NOT NULL,
  `resmonth` int(5) NOT NULL,
  `resyear` int(10) NOT NULL,
  `organisation` varchar(100) COLLATE utf8_bin NOT NULL,
  `showname` varchar(100) COLLATE utf8_bin NOT NULL,
  `showclass` varchar(100) COLLATE utf8_bin NOT NULL,
  `result` varchar(100) COLLATE utf8_bin NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `results`
--

INSERT INTO `results` (`id`, `resday`, `resmonth`, `resyear`, `organisation`, `showname`, `showclass`, `result`, `stamp`) VALUES
(1, 2, 3, 2004, 'ICAMH', 'Summershow', 'stallions 32"', '1st place', 1293959987),
(3, 16, 1, 2007, 'ICAMH', 'Summershow', 'stallions 32', '1st place', 1293959987),
(4, 2, 3, 2005, 'ICAMH', 'Summershow', 'stallions 32"', '1st place', 1293959987);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `text` mediumtext COLLATE utf8_bin NOT NULL,
  `stamp` varchar(12) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=70 ;

--
-- Gegevens worden uitgevoerd voor tabel `text`
--

INSERT INTO `text` (`id`, `title`, `text`, `stamp`) VALUES
(59, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non commodo diam. Sed pretium elit a nibh aliquam hendrerit. In sit amet nulla augue, non porta sapien. Nam diam velit, lacinia ac viverra et, mollis id arcu. Cras sed nulla erat. Nam viverra vestibulum felis eu luctus. Integer varius egestas mollis. Donec consectetur eros ut eros rhoncus eget convallis ipsum auctor. In feugiat felis eget felis facilisis quis varius diam mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin viverra lectus ac urna pharetra eleifend. Donec sagittis lobortis nulla. Aliquam erat volutpat. Fusce at quam venenatis orci luctus ultrices.\r\n\r\nSuspendisse augue nibh, interdum et varius eget, ullamcorper vitae magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus varius risus sagittis felis faucibus sollicitudin. Praesent consectetur quam at ante placerat malesuada. Sed dui erat, varius vel molestie eu, tristique id sapien. Etiam quis leo nunc, et euismod arcu. Nulla tincidunt semper nulla, ac fermentum diam sagittis eu. Phasellus dignissim risus et tortor accumsan ultrices. Quisque ut eros turpis. Sed eget tellus id nulla feugiat lobortis nec sit amet augue. Vivamus sed mi justo, at suscipit sem. Nullam tempor malesuada enim vitae varius. Curabitur vitae eros odio, eu euismod augue. Donec viverra volutpat posuere. Nullam vestibulum, arcu ac bibendum iaculis, elit justo malesuada ante, a lacinia dui elit ac mauris. Maecenas aliquam facilisis purus, a pellentesque tellus aliquam ut. Suspendisse tristique nulla cursus leo volutpat ac luctus dui gravida. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna vel ligula placerat sagittis.\r\n\r\nMaecenas in pellentesque ligula. Nunc hendrerit fermentum massa vitae condimentum. Integer placerat posuere turpis vel porta. Aenean in metus odio, eget imperdiet augue. Nam viverra convallis lobortis. Nulla facilisi. Integer nec nunc sed leo commodo gravida in in urna. Aliquam erat enim, egestas quis varius at, aliquet ac massa. Aliquam euismod volutpat semper. Maecenas volutpat vestibulum magna sit amet aliquet. Vivamus sapien enim, ullamcorper vitae eleifend in, egestas in ligula. Integer posuere elit non sem hendrerit at mattis enim facilisis. Duis convallis luctus volutpat. Proin nulla mauris, pellentesque vel pulvinar ut, rutrum ut lacus. In a massa tortor. Curabitur eu lectus risus, id commodo nisi. ', '1287766418'),
(60, 'html test', '<a href="http://localhost/testsite/index.php?lang=en">Website</a>', '1287786244'),
(61, 'html test 2', 'http://localhost/testsite/index.php?lang=en', '1287786297'),
(62, 'Try out', 'Eens een keer een andere titel.\r\n\r\n\r\nHahahahaha\r\n\r\n\r\nEens kijken wat er nu gebeurd.', '1287818223'),
(63, 'En dan nog een keertje', 'Pffffffff die errors wegwerken is niet echt een leuk klusje.\r\n\r\nMaar alles gaat goed komen denk ik.', '1287818374'),
(64, 'aint no time no reason', 'Let go let go happen.', '1287818539'),
(65, 'Pffffffff tis wa', 'Tis wa mej die errors.', '1287818601'),
(66, 'weer iets proberen', 'Eens kijken of dit de oplossing is.', '1287818984'),
(67, 'Daar gaan we weer', 'Word een beetje gestoord hiervan.', '1287819161'),
(68, 'We komen er wel', 'Althans dat hoop ik maar.', '1287819287'),
(69, 'En dan nog een keertje', 'Hoeveel keer nu al??????????????', '1287819438');
