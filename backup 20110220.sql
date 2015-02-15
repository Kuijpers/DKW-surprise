-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 Feb 2011 om 01:58
-- Serverversie: 5.5.8
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testsite`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `breeding`
--

INSERT INTO `breeding` (`id`, `stallion`, `mare`, `breedmonth`, `breedyear`, `stamp`) VALUES
(7, '  WMM Thrillers Cloud Walker ', 'S.S.M. StarÂ´s Wild Rose ', 3, 2011, 1296684242),
(6, 'WMM Thrillers Cloud Walker', '  S.S.M. StarÂ´s Wild Rose ', 3, 2011, 1296678649),
(8, '  WMM Thrillers Cloud Walker ', 'Sky van de Hazelberg', 3, 2011, 1296684242),
(9, 'WMM Thrillers Cloud Walker', '  Sky van de Hazelberg ', 3, 2011, 1296729702),
(10, '  Presco ', 'Texas Girl', 4, 2011, 1296743177),
(11, 'Presco', '  Texas Girl ', 4, 2011, 1296744610);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_about`
--

INSERT INTO `en_about` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Example message', 0x5468697320697320616e206578616d706c65206d6573736167652e0d0a0d0a576974682074686973206d65737361676520796f752063616e20736565207768617420697420646f65732e0d0a0d0a4c6574c382c2b47320736565, 1293804837),
(2, 'About us', 0x412073686f72742073746f72792061626f75742075732e, 1296673912);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_horses`
--

INSERT INTO `en_horses` (`id`, `title`, `text`, `stamp`) VALUES
(9, '', '', 1296743177),
(10, 'information', 0x497420697320616c736f20706f737369626c6520746f2062757920466c6563686120696e20666f616c206f662050726573636f20666f7220c3a2e2809ac2ac20313235302c3030, 1296745499),
(11, 'Information', 0x497420697320616c736f20706f737369626c6520746f2062757920436f727269656e20696e20666f616c206f662050726573636f20666f7220c3a2e2809ac2ac20313235302c30300d0a0d0a436f727269656e2068617320676176652075732062656175746966756c6c20617070616c6f6f736120666f616c732e20416d69676f207761732070616c6f6d696e6f20617070616c6f6f736120616e6420426f62627920776173206275636b736b696e20617070616c6f6f73612e0d0a0d0a54686973206d65616e73207468617420436f727269656e2068617320746f20686176652031206372656d652067656e65732e, 1296746430),
(8, 'Result color test', 0x57616c6b657220686173206265656e2074657374656420617420636f6c6f723a0d0a0d0a452f453a20486f6d6f7a79676f757320666f7220426c61636b0d0a5342312f5342313a20436172726965732074776f20536162696e6f2d312067656e65732e0d0a4c574f3a204e656761746976650d0a, 1296684242),
(12, 'Information', 0x497420697320616c736f20706f737369626c6520746f20627579205374617220696e20666f616c206f662050726573636f20666f7220c3a2e2809ac2ac20313730302c30300d0a0d0a54686520666f616c7320746861742053746172206761766520757320776865726520626c61636b2070696e74616c6f6f736120616e642062726f776e2070696e746f, 1296745862),
(13, 'Result color test', 0x4e2f47206f7220472f473a204261636f2069732063617272696572206f6620746865206772617920636f6c6f720d0a652f653a204261636f20697320736f7272656c0d0a612f613a20426c61636b207069676d656e74206973206576657279207765726520696e2074686520686169722e0d0a4e2f4f3a204261636f2069732063617272696573206f6620746865204f7665726f20666163746f72202843617272696572206f66204f4c5753292c206865206973204f7665722e, 1296677799),
(14, 'Result color test', 0x4e2f5342313a20204f6e6520636f706965206f662074686520536162696e6f2067656e20697320666f756e642e2054686973206d65616e732074686174204a6f65277320666f616c732063616e20686176652070696e746f206d61726b696e67732e0d0a612f613a2020426c61636b207069676d656e7420697320657665727920776865726520696e2074686520686169722e0d0a452f653a20205468652072656420616e642074686520426c61636b20666163746f722061726520666f756e6465642e, 1296683526),
(15, 'Result color test', 0x612f613a2020426c61636b207069676d656e7420697320657665727920776865726520696e2074686520686169722e0d0a452f653a20205468652072656420616e642074686520626c61636b20666163746f7220686173206265656e20666f756e642e, 1296740469),
(16, 'Result color test', 0x4e2f5a3a2020566179612063617272696573206f6e652053696c7665722044696c7574696f6e, 1296741800);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `en_index`
--

INSERT INTO `en_index` (`id`, `title`, `text`, `stamp`) VALUES
(12, 'Welkom ', 0x53696e64732032303032207a696a6e2077696a2064652074726f74736520656967656e6172656e2076616e20656e6b656c65207363686974746572656e64206d696e6961747575722070616172646a65732e0d0a496e206f6e7a65207374616c6c656e2076696e642075206d696e6961747575722070616172646a6573206d657420646976657273652061667374616d6d696e67656e207a6f616c733a200d0a0d0a20202020202020202020202020202020202020202020202020202020202d20414d48410d0a20202020202020202020202020202020202020202020202020202020202d20414d48520d0a20202020202020202020202020202020202020202020202020202020202d20426572676d616e6e0d0a20202020202020202020202020202020202020202020202020202020202d20417070616c6f6f73610d0a20202020202020202020202020202020202020202020202020202020202d2046616c6162656c6c610d0a0d0a486574206973206f6e732064616e206f6f6b2065656e2067726f6f742067656e6f6567656e206f6d206f6e7a65206b6c65696e7374652061616e207520766f6f72207465206d6f67656e207374656c6c656e2e0d0a0d0a, 1296590071),
(11, 'Test without picture', 0x4c6574c382c2b4732073656520776861742068617070656e73206e6f77, 1293783413),
(13, 'New text', 0x68616c616c616c616c61, 1296672960);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `general_contact`
--

CREATE TABLE IF NOT EXISTS `general_contact` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `stable` varchar(250) COLLATE utf8_bin NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `adres` varchar(250) COLLATE utf8_bin NOT NULL,
  `postcode` varchar(100) COLLATE utf8_bin NOT NULL,
  `city` varchar(250) COLLATE utf8_bin NOT NULL,
  `state` varchar(250) COLLATE utf8_bin NOT NULL,
  `country` varchar(250) COLLATE utf8_bin NOT NULL,
  `tel` varchar(100) COLLATE utf8_bin NOT NULL,
  `cell` varchar(100) COLLATE utf8_bin NOT NULL,
  `fax` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `web` varchar(250) COLLATE utf8_bin NOT NULL,
  `contactdetails` mediumint(5) NOT NULL,
  `contactform` mediumint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `general_contact`
--

INSERT INTO `general_contact` (`id`, `stable`, `name`, `adres`, `postcode`, `city`, `state`, `country`, `tel`, `cell`, `fax`, `email`, `web`, `contactdetails`, `contactform`) VALUES
(1, 'Put name of stable here', 'Put you own name here', 'Put your adres here', 'put your postcode here', 'put your city here', 'put you state here', 'put your country here', 'put your phonenumber here', 'put your cellphonenumber here', 'put your faxnumber here', 'put your email adres here', 'put your website here', 1, 1);

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
  `color` varchar(100) COLLATE utf8_bin NOT NULL,
  `height` varchar(100) COLLATE utf8_bin NOT NULL,
  `unit` int(5) NOT NULL,
  `spot` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

--
-- Gegevens worden uitgevoerd voor tabel `horses`
--

INSERT INTO `horses` (`id`, `callname`, `fullname`, `gender`, `dobday`, `dobmonth`, `dobyear`, `sire`, `dam`, `fofs`, `mofs`, `fofd`, `mofd`, `stamp`, `sale`, `sale_price`, `sold_date`, `color`, `height`, `unit`, `spot`) VALUES
(19, 'Lady', 'S.S.M. Walkers Dynasty Lady', 2, 1, 5, 2010, 'WMM Thrillers Cloud Walker', 'Vaya of the Surprise Stables', 'Magic Mans Thriller', 'LTDÂ´S Magical Grace', 'Special effort''s Pablo Picasso', 'Patty', 1296727731, 0, '', '0000-00-00', '', '', 0, 0),
(17, 'Joe', 'S.S.M. WalkerÂ´s Call Me Blue I Joe', 1, 11, 5, 2009, 'WMM Thrillers Cloud Walker', 'S.S.M. StarÂ´s Wild Rose', 'Magic Mans Thriller', 'LTDÂ´S Magical Grace', 'Rabbit Hutch Ranch Charro Star', 'Sky van de Hazelberg', 1296683526, 1, '1850', '0000-00-00', '', '', 0, 0),
(18, 'Walker', 'WMM Thrillers Cloud Walker', 1, 5, 6, 2006, 'Magic Mans Thriller', 'LTD`S Magical Grace', 'Magic Man of LTDS', 'Heritage Sandy Buckeroo', 'Marystowns Renegade', 'Samples Wendy Blue Eyed', 1296684242, 0, '', '0000-00-00', '', '', 0, 0),
(15, 'Baco', 'S.S.M. Eross Bacardi & Coke', 1, 14, 6, 2008, 'H &  Hs Eros of Olympus', 'Sky van de Hazelberg', 'Vermilyea Farms Olympus', 'Deiles Little Girl', 'Special Effort''s Naughty Doll', 'Oleandra van de Piekenhof', 1296677799, 0, 'request', '0000-00-00', '', '', 0, 0),
(16, 'Rose', 'S.S.M. StarÂ´s Wild Rose', 2, 17, 6, 2005, 'Rabbit Hutch Ranch Charro Star', 'Sky van de Hazelberg', 'Flying W Charro of Arenosa', 'Monastry Miss Tique', 'Special Effort''s Naughty Doll', 'Oleandra van de Piekenhof', 1296678649, 0, '', '0000-00-00', '', '', 0, 0),
(20, 'Dean', 'S.S.M. Presco''s Dean Maddy', 1, 5, 5, 2010, 'Presco', 'Patty', 'Bergmann''s Boli', 'Bergmann''s Bella', 'Jiggs', 'Paola', 1296728660, 1, '950', '0000-00-00', '', '', 0, 0),
(21, 'Dobby', 'S.S.M. Presco''s Double Jeopardy', 1, 1, 5, 2010, 'Presco', 'Texas Girl', 'Bergmann''s Boli', 'Bergmann''s Bella', 'Special Effort''s Navajo', 'Bergmann''s Taperi', 1296729136, 0, '', '0000-00-00', '', '', 0, 0),
(22, 'Sky', 'Sky van de Hazelberg', 2, 22, 5, 2002, 'Special Effort''s Naughty Doll', 'Oleandra van de Piekenhof', 'NFC Egyptian King Special Effort', 'Terry''s China Doll', 'Kerswell Puck', 'Arlington Shoescroft Passion', 1296729702, 0, '', '0000-00-00', '', '', 0, 0),
(23, 'Cha Cha', 'S.S.M. Presco''s Cha Cha Cha', 2, 4, 5, 2009, 'Presco', 'Patty', 'Bergmann''s Boli', 'Bergmann''s Bella', 'Jiggs', 'Paola', 1296730770, 1, '1000', '0000-00-00', '', '', 0, 0),
(24, 'Bailey', 'S.S.M. Eross Baileys & Cream', 2, 14, 5, 2008, 'H &  Hs Eros of Olympus', 'Silver Star of the Fairy Tale Ranch', 'Vermilyea Farms Olympus', 'Deiles Little Girl', 'Caddy van de Berkenhoeve', 'Silverdown Christobel', 1296731806, 0, '', '0000-00-00', '', '', 0, 0),
(25, 'Aysha', 'S.S.M. Em Pacs Aysha', 2, 4, 5, 2007, 'HCM Bucks Em Pac', 'Vaya of the Surprise Stables', 'Little Kings Almighty Buck', 'Marks Yogas Ima Super Charmer', 'Special effort''s Pablo Picasso', 'Patty', 1296734632, 0, '', '0000-00-00', '', '', 0, 0),
(26, 'Bubbles', 'S.S.M. Presco''s Bubble Gum', 2, 9, 6, 2008, 'Presco', 'Patty', 'Bergmann''s Boli', 'Bergmann''s Bella', 'Jiggs', 'Paola', 1296740469, 0, '', '0000-00-00', '', '', 0, 0),
(27, 'Beyonce', 'S.S.M. Eross Beyonce', 2, 11, 5, 2008, 'H &  Hs Eros of Olympus', 'Vaya of the Surprise Stables', 'Vermilyea Farms Olympus', 'Deiles Little Girl', 'Special effort''s Pablo Picasso', 'Patty', 1296741595, 0, '', '0000-00-00', '', '', 0, 0),
(28, 'Vaya', 'Vaya of the Surprise stables', 2, 27, 5, 2004, 'Special Effort''s Pablo Picasso', 'Patty', 'NFC Egyptian King Special Effort', 'Bergmann''s Gata', 'Jiggs', 'Paola', 1296741800, 0, '', '0000-00-00', '', '', 0, 0),
(29, 'Patty', 'Patty', 2, 18, 5, 1993, 'Jiggs', 'Paola', 'Julius Caesar', 'Pat', 'Milord von den Drei Tannen', 'Perlkoenigin', 1296742444, 0, '', '0000-00-00', '', '', 0, 0),
(30, 'Presco', 'Presco', 1, 25, 4, 2000, 'Bergmann''s Boli', 'Bergmann''s Bella', 'Bergmann''s Bolita', 'Bergmann''s Mahala', 'Bergmann''s Arpisto', 'Bergmann''s Harmosa', 1296743177, 0, '', '0000-00-00', '', '', 0, 0),
(31, 'Texas', 'Texas Girl', 2, 1, 5, 2003, 'Special Effort''s Navajo', 'Bergmann''s Taperi', 'NFC Egyptian King Special Effort', 'Bergmann''s Snow Maulita', 'Bergmann''s Paye', 'Bergmann''s Yiya', 1296744610, 0, '', '0000-00-00', '', '', 0, 0),
(32, 'Casjmira', 'S.S.M. Presco''s Casjmira', 2, 12, 5, 2009, 'Presco', 'Bergmann''s Flecha Veloz', 'Bergmann''s Boli', 'Bergmann''s Bella', 'Bergmann''s Poroto', 'Bergmann''s Btania', 1296745039, 1, '1450', '0000-00-00', '', '', 0, 0),
(33, 'Flecha', 'Bergmann''s Flecha Veloz', 2, 10, 10, 1997, 'Bergmann''s Poroto', 'Bergmann''s Tania', 'Bergmann''s Juancho', 'Bergmann''s Porota', 'Bergmann''s Sarahuasi', 'Bergmann''s Saraj', 1296745499, 1, '1000', '0000-00-00', '', '', 0, 0),
(34, 'Star', 'Carina Star', 2, 10, 4, 2003, 'La Hacienda Manuel', 'Bergmann''s Flor Salvaje', 'Falabella Gilette', 'Bergmann''s Spoty', 'Bergmann''s Washishu', 'Bergmann''s Atardecer', 1296745862, 1, '1450', '0000-00-00', '', '', 0, 0),
(35, 'Corrien', 'Corrien van de Heesbeekhoeve', 2, 11, 7, 2001, 'Norman van Bromishet', 'Lisa La Chico Caballo ', 'Bayerns Falco', 'Remy van de Nieuwe Eisch', 'Freddy van de Ijsselhof', 'Fabiola la Chico Caballo ', 1296746430, 1, '1000', '0000-00-00', '', '', 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_about`
--

INSERT INTO `nl_about` (`id`, `title`, `text`, `stamp`) VALUES
(1, 'Voorbeeld bericht', 0x4469742069732065656e20766f6f726265656c6420626572696368742e0d0a0d0a486965726d6565206b756e206a65207a69656e207761742068657420696e686f75642e, 1293804837),
(2, 'Over ons', 0x45656e206b6c65696e207374756b6a65206f766572206f6e73, 1296673912);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_horses`
--

INSERT INTO `nl_horses` (`id`, `title`, `text`, `stamp`) VALUES
(9, 'Informatie', 0x50726573636f20686565667420696e2032303039207a696a6e206c6576656e73676f65646b657572696e672062656861616c642062696a20686574204e4d5052530d0a0d0a496e20323031302062656861616c64652068696a207a696a6e206465726465203141207072656d69652c2068696572206d65652062656861616c64652068696a207a696a6e205374657220656e20776572642076616e77656765207a696a6e206e616b6f6d656c696e67656e206f6f6b206e6f6720507265666572656e742e0d0a0d0a0d0a, 1296743177),
(8, 'Uitslag kleuren test', 0x57616c6b657220697320676574657374206f70206b6c6575723a0d0a0d0a452f453a20486f6d6f7a79676f757320766f6f72207a776172740d0a5342312f5342313a20447261616774207477656520536162696e6f2d312067656e65732e0d0a4c776f3a204e65676174696566, 1296684242),
(10, 'informatie', 0x486574206973206f6f6b206d6f67656c696a6b206f6d20466c656368612064726163687469672076616e2050726573636f207465206b6f70656e20766f6f722065656e207072696a732076616e20c3a2e2809ac2ac20313235302c3030, 1296745499),
(11, 'Informatie', 0x486574206973206f6f6b206d6f67656c696a6b206f6d20436f727269656e2064726163687469672076616e2050726573636f207465206b6f70656e20766f6f722065656e207072696a732076616e20c3a2e2809ac2ac20313235302c30300d0a0d0a436f727269656e206865656674206f6e73207a656572206d6f6f696520617070616c6f6f7361207665756c656e73206765676576656e2e20416d69676f207761732070616c6f6d696e6f20617070616c6f6f736120656e20426f626279207761732076616c6b20617070616c6f6f73612e0d0a0d0a44697420626574656b656e642064616e206f6f6b2064617420436f727269656e20696e206865742062657a69742069732076616e20696e20656c6b20676576616c2031206372656d652067656e2e, 1296746430),
(12, 'Informatie', 0x486574206973206f6f6b206d6f67656c696a6b206f6d20537461722064726163687469672076616e2050726573636f207465206b6f70656e20766f6f722065656e207072696a732076616e20c3a2e2809ac2ac20313730302c30300d0a0d0a4465207665756c656e73206469652053746172206f6e73206865656674206765676576656e20776172656e207a776172742070696e74616c6f6f736520656e20627275696e626f6e742e, 1296745862),
(13, 'Uitslag kleuren test', 0x4e2f47206f6620472f473a204261636f20697320647261676572206f6620686f6d6f7a79676f6f7420766f6f72206465206d7574617469652064696520766572616e74776f6f7264656c696a6b20697320766f6f72206465206b6c65757220736368696d6d656c2e200d0a652f653a204261636f20697320766f730d0a612f613a205a77617274207069676d656e74206973206f766572616c20696e20646520686161722061616e77657a69672e0d0a4e2f4f3a20204261636f206973206472616765722076616e206465204f7665726f20666163746f722028447261676572204f4c5753292c2068696a20697320647573204f7665726f2e0d0a0d0a, 1296677799),
(14, 'Uitslag kleuren test', 0x4e2f5342313a2045656e206b6f7069652076616e20646520536162696e6f31206d7574617469652069732061616e6765746f6f6e642e2044697420626574656b656e7420646174204a6f652064757320626f6e746520616674656b656e696e67656e2061616e207a696a6e207665756c656e7320646f6f72206b616e20676576656e2e0d0a612f613a20207a77617274207069676d656e74206973206f766572616c2061616e77657a696720696e20646520686161722e0d0a452f653a20205a6f77656c20646520726f646520616c73206465207a776172746520666163746f722069732061616e77657a69672e0d0a, 1296683526),
(15, 'Uitslag kleuren test', 0x612f613a20205a77617274207069676d656e74206973206f7665722061616e77657a696720696e20646520686161722e0d0a452f653a20205a6f77656c20646520726f646520616c73206465207a776172746520666163746f722069732061616e77657a69672e0d0a, 1296740469),
(16, 'Uitslag kleuren test', 0x4e2f5a3a2020566179612069732068657465726f7a79676f6f742c2076657264756e742c2065656e206b6f7069652076616e206865742053696c766572646170706c652067656e2e0d0a, 1296741800);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `nl_index`
--

INSERT INTO `nl_index` (`id`, `title`, `text`, `stamp`) VALUES
(12, 'Welkom ', 0x53696e64732032303032207a696a6e2077696a2064652074726f74736520656967656e6172656e2076616e20656e6b656c65207363686974746572656e64206d696e6961747575722070616172646a65732e0d0a496e206f6e7a65207374616c6c656e2076696e642075206d696e6961747575722070616172646a6573206d657420646976657273652061667374616d6d696e67656e207a6f616c733a200d0a0d0a20202020202020202020202020202020202020202020202020202020202d20414d48410d0a20202020202020202020202020202020202020202020202020202020202d20414d48520d0a20202020202020202020202020202020202020202020202020202020202d20426572676d616e6e0d0a20202020202020202020202020202020202020202020202020202020202d20417070616c6f6f73610d0a20202020202020202020202020202020202020202020202020202020202d2046616c6162656c6c610d0a0d0a486574206973206f6e732064616e206f6f6b2065656e2067726f6f742067656e6f6567656e206f6d206f6e7a65206b6c65696e7374652061616e207520766f6f72207465206d6f67656e207374656c6c656e2e0d0a0d0a, 1296590071),
(11, 'Test zonder foto', 0x45656e73206b696a6b656e207761742065722067656265757264207a6f6e64657220666f746f, 1293783413),
(13, 'Nieuwe tekst', 0x426c616c616c616c616c61, 1296672960);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Gegevens worden uitgevoerd voor tabel `offspring`
--

INSERT INTO `offspring` (`id`, `name`, `gender`, `dobday`, `dobmonth`, `dobyear`, `parent`, `results`, `stamp`) VALUES
(22, ' S.S.M. Eross Bacardi & Coke', 1, 14, 6, 2008, ' H &  Hs Eros of Olympus', '', 1296729702),
(21, 'S.S.M. WalkerÂ´s Dynasty Lady', 2, 1, 5, 2010, 'Vaya of the Surprise Stables', '', 1296684242),
(20, '  S.S.M. StarÂ´s Wild Rose', 1, 11, 5, 2009, '  S.S.M. StarÂ´s Wild Rose', '', 1296684242),
(19, 'S.S.M. Walkers Call Me Blue I Joe', 1, 11, 5, 2009, 'WMM Thrillers Cloud Walker', '', 1296678649),
(23, ' S.S.M. StarÂ´s Wild Rose', 2, 17, 6, 2005, ' Rabbit Hutch Ranch Charro Star', '', 1296729702),
(24, 'Toet''s Casey Black', 1, 26, 5, 2009, 'Star''sToetanchamon', '', 1296729702),
(25, 'Star''s Aim for Fame', 1, 27, 6, 2007, 'Rabbit Hutch Ranch Charro Star', '', 1296729702),
(26, ' Vaya of the Surprise stables', 2, 27, 5, 2004, ' Special Effort''s Pablo Picasso', '', 1296742444),
(27, ' S.S.M. Presco''s Bubble Gum', 2, 9, 6, 2008, ' Presco', '', 1296742444),
(28, ' S.S.M. Presco''s Dean Maddy', 1, 5, 5, 2010, ' Presco', '', 1296742444),
(29, ' S.S.M. Presco''s Cha Cha Cha', 2, 4, 5, 2009, ' Presco', '', 1296742444),
(30, 'S.S.M. Star''s Waterfall Riverdance', 1, 29, 4, 2005, 'Rabbit Hutch Ranch Charro Star', '', 1296742444),
(31, 'S.S.M. Superstar''s Zita Jones', 2, 8, 5, 2006, 'MH Superstar', '', 1296742444),
(32, '  Patty', 1, 5, 5, 2010, '  Patty', '', 1296743177),
(33, '  Texas Girl', 1, 1, 5, 2010, '  Texas Girl', '', 1296743177),
(34, '  Patty', 1, 4, 5, 2009, '  Patty', '', 1296743177),
(35, '  Patty', 1, 9, 6, 2008, '  Patty', '', 1296743177),
(36, ' S.S.M. Presco''s Double Jeopardy', 1, 1, 5, 2010, ' Presco', '', 1296744610),
(37, 'S.S.M. Menecucho''s Black Jack', 1, 10, 7, 2008, 'Falabella Menecucho', '', 1296744610),
(38, ' S.S.M. Presco''s Casjmira', 2, 12, 5, 2009, ' Presco', '', 1296745499),
(39, 'S.S.M. Presco''s Armani & Gucci 2n1', 1, 1, 6, 2007, 'Presco', 0x317374207072656d69756d, 1296745862),
(40, 'S.S.M. Presco''s Coco Chanell', 2, 20, 3, 2009, 'Presco', '', 1296745862),
(41, 'S.S.M. Stage Hunters Amigo', 1, 20, 5, 2007, 'Stage Hunter of the Fairy Tale Ranch', '', 1296746430),
(42, 'S.S.M. Presco''s Bobby Brown', 1, 14, 8, 2008, 'Presco', '', 1296746430);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=206 ;

--
-- Gegevens worden uitgevoerd voor tabel `picture`
--

INSERT INTO `picture` (`id`, `image`, `stamp`, `main_image`, `gallery`) VALUES
(130, '1296683862.jpg', '1296683526', 0, 0),
(142, '1296728202.jpg', '1296727731', 0, 0),
(136, '1296684710.jpg', '1296684242', 0, 0),
(128, '1296679081.jpg', '1296678649', 0, 0),
(127, '1296679015.jpg', '1296678649', 1, 0),
(141, '1296728145.jpg', '1296727731', 0, 0),
(140, '1296728031.jpg', '1296727731', 0, 0),
(139, '1296728004.jpg', '1296727731', 0, 0),
(138, '1296727975.jpg', '1296727731', 0, 0),
(135, '1296684669.jpg', '1296684242', 0, 0),
(131, '1296683917.jpg', '1296683526', 0, 0),
(134, '1296684618.jpg', '1296684242', 1, 0),
(133, '1296684063.jpg', '1296683526', 0, 0),
(126, '1296677980.jpg', '1296677799', 0, 0),
(125, '1296677939.jpg', '1296677799', 0, 0),
(137, '1296727933.jpg', '1296727731', 1, 0),
(129, '1296683781.jpg', '1296683526', 1, 0),
(124, '1296677882.jpg', '1296677799', 1, 0),
(143, '1296728894.jpg', '1296728660', 1, 0),
(144, '1296728931.jpg', '1296728660', 0, 0),
(145, '1296728971.jpg', '1296728660', 0, 0),
(146, '1296729023.jpg', '1296728660', 0, 0),
(147, '1296729061.jpg', '1296728660', 0, 0),
(148, '1296729401.jpg', '1296729136', 1, 0),
(149, '1296729488.jpg', '1296729136', 0, 0),
(150, '1296729555.jpg', '1296729136', 0, 0),
(151, '1296729594.jpg', '1296729136', 0, 0),
(152, '1296729919.jpg', '1296729702', 1, 0),
(153, '1296729948.jpg', '1296729702', 0, 0),
(154, '1296729985.jpg', '1296729702', 0, 0),
(155, '1296730921.jpg', '1296730770', 1, 0),
(156, '1296730950.jpg', '1296730770', 0, 0),
(157, '1296730980.jpg', '1296730770', 0, 0),
(158, '1296731012.jpg', '1296730770', 0, 0),
(159, '1296734244.jpg', '1296731806', 1, 0),
(160, '1296734297.jpg', '1296731806', 0, 0),
(161, '1296734334.jpg', '1296731806', 0, 0),
(162, '1296734362.jpg', '1296731806', 0, 0),
(163, '1296734390.jpg', '1296731806', 0, 0),
(164, '1296734948.jpg', '1296734632', 1, 0),
(165, '1296734981.jpg', '1296734632', 0, 0),
(166, '1296735006.jpg', '1296734632', 0, 0),
(167, '1296735038.jpg', '1296734632', 0, 0),
(168, '1296735052.jpg', '1296734632', 0, 0),
(169, '1296735066.jpg', '1296734632', 0, 0),
(170, '1296740607.jpg', '1296740469', 1, 0),
(171, '1296740625.jpg', '1296740469', 0, 0),
(172, '1296740676.jpg', '1296740469', 0, 0),
(173, '1296740701.jpg', '1296740469', 0, 0),
(174, '1296740729.jpg', '1296740469', 0, 0),
(175, '1296741733.jpg', '1296741595', 1, 0),
(176, '1296741746.jpg', '1296741595', 0, 0),
(182, '1296742645.jpg', '1296742444', 1, 0),
(178, '1296742088.jpg', '1296741800', 0, 0),
(179, '1296742159.jpg', '1296741800', 0, 0),
(180, '1296742201.jpg', '1296741800', 1, 0),
(181, '1296742231.jpg', '1296741800', 0, 0),
(183, '1296742685.jpg', '1296742444', 0, 0),
(184, '1296742702.jpg', '1296742444', 0, 0),
(185, '1296742715.jpg', '1296742444', 0, 0),
(186, '1296742729.jpg', '1296742444', 0, 0),
(187, '1296743356.jpg', '1296743177', 1, 0),
(188, '1296743385.jpg', '1296743177', 0, 0),
(189, '1296743401.jpg', '1296743177', 0, 0),
(190, '1296743422.jpg', '1296743177', 0, 0),
(191, '1296743474.jpg', '1296743177', 0, 0),
(192, '1296743517.jpg', '1296743177', 0, 0),
(193, '1296743551.jpg', '1296743177', 0, 0),
(194, '1296744777.jpg', '1296744610', 1, 0),
(195, '1296744813.jpg', '1296744610', 0, 0),
(196, '1296744848.jpg', '1296744610', 0, 0),
(197, '1296745219.jpg', '1296745039', 0, 0),
(198, '1296745250.jpg', '1296745039', 0, 0),
(199, '1296745289.jpg', '1296745039', 0, 0),
(200, '1296745321.jpg', '1296745039', 0, 0),
(201, '1296745356.jpg', '1296745039', 1, 0),
(202, '1296745711.jpg', '1296745499', 1, 0),
(203, '1296746020.jpg', '1296745862', 1, 0),
(204, '1296746034.jpg', '1296745862', 0, 0),
(205, '1296746630.jpg', '1296746430', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Gegevens worden uitgevoerd voor tabel `registration`
--

INSERT INTO `registration` (`id`, `organisation`, `registration`, `stamp`) VALUES
(37, 'NMPRS', 'VRA16236VRA', 1296729702),
(36, 'NMPRS', '528007201000581', 1296729136),
(35, 'NMPRS', '528007201000580', 1296728660),
(34, 'NMPRS', '528007201000582', 1296727731),
(33, 'NMPRS', '528007200602717', 1296684242),
(32, 'AMHR ', '278139A', 1296684242),
(31, 'NMPRS', '528007200900428', 1296683526),
(30, 'BMP', '170605V0247', 1296678649),
(29, 'NMPRS', '528007200501228', 1296678649),
(28, 'NMPRS', '528007200804147', 1296677799),
(38, 'NMPRS', '528007200900431', 1296730770),
(39, 'NMPRS', '528007200804148', 1296731806),
(40, 'NMPRS', '528007200702917', 1296734632),
(41, 'NMPRS', '528007200804144', 1296740469),
(42, 'NMPRS', '528007200804145', 1296741595),
(43, 'NMPRS', '528013020043475', 1296741800),
(44, 'NAS', '2059', 1296742444),
(45, 'BMP', '180593V0246', 1296742444),
(46, 'NMPRS', 'CKLM7759VRAC', 1296743177),
(47, 'NMPRS', 'VRA16534VRA', 1296744610),
(48, 'NMPRS', '528007200900435', 1296745039),
(49, 'NAS', '973239', 1296745499),
(50, 'NMPRS', 'VRA15297VRA', 1296745499),
(51, 'NMPRS', 'VRA16510VRA', 1296745862),
(52, 'BMP', '100403V0250', 1296745862),
(53, 'NAS', '010465', 1296746430),
(54, 'NMPRS', 'VRA16821VRA', 1296746430);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Gegevens worden uitgevoerd voor tabel `results`
--

INSERT INTO `results` (`id`, `resday`, `resmonth`, `resyear`, `organisation`, `showname`, `showclass`, `result`, `stamp`) VALUES
(8, 12, 5, 2008, 'ICAMH', 'Miniature Extravaganza', 'Liberty 34" & under', '2nd place', 1296684242),
(7, 12, 5, 2008, 'ICAMH', 'Miniature Extravaganza ', 'Two year old stallion 33"  & under', '2nd place', 1296684242),
(5, 30, 8, 2008, 'NMPRS', 'Merriekeuring', 'hengstveulens minimaat luxe ', '1e premie', 1296677799),
(6, 30, 7, 2005, 'NMPRS', 'Merriekeuring', 'merrie veulens minimaat luxe', '2e premie', 1296678649),
(9, 12, 5, 2008, 'ICAMH', 'Miniature Extravaganza', 'Solid color A Division Stallion', '1st place', 1296684242),
(10, 19, 7, 2008, 'ICAMH', 'Summershow', 'Model stallions 2yr & older  34" & under', '2nd place', 1296684242),
(11, 19, 7, 2008, 'ICAMH', 'Summershow', 'Solid color A Division Stallion', '1st place', 1296684242),
(12, 4, 4, 2009, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '2e premie', 1296684242),
(13, 10, 4, 2010, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '1e premie', 1296684242),
(14, 10, 8, 2002, 'NMPRS', 'Merriekeuring', 'merrie veulens minimaat luxe', '2e premie', 1296729702),
(15, 9, 8, 2003, 'NMPRS', 'Merriekeuring', 'enters minimaat luxe', '1e premie', 1296729702),
(16, 31, 7, 2004, 'NMPRS', 'Merriekeuring', 'Twenters minimaat luxe', '2e premie', 1296729702),
(17, 30, 7, 2005, 'NMPRS', 'Merriekeuring', '3 jarige merries ', '2e premie', 1296729702),
(18, 31, 7, 2005, 'NMPRS', 'Merriekeuring', 'Stamboek opname', 'goedgekeurd', 1296729702),
(19, 29, 7, 2006, 'NMPRS', 'Merriekeuring', '3 jarige merries', '2e premie', 1296729702),
(20, 23, 8, 2008, 'NMPRS', 'Merriekeuring', 'merrie veulens minimaat luxe', '2e premie', 1296731806),
(21, 28, 8, 2010, 'NMPRS', 'Merriekeuring', 'Twenters minimaat luxe', '2e premie', 1296731806),
(22, 23, 8, 2008, 'NMPRS', 'Merriekeuring', 'merrie veulens kleine maat luxe', '1e premie', 1296740469),
(23, 28, 8, 2010, 'NMPRS', 'Merriekeuring', 'Twenters kleine maat luxe', '2e premie', 1296740469),
(24, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', '2yr old mares 33 - 37', '2nd place  NMPRS judge', 1296740469),
(25, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', '2yr old mares 33 - 37', '2nd place  AMHA judge', 1296740469),
(26, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Solid Color  ', '2nd place  AMHA Judge', 1296740469),
(27, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Solid Color', '3rd place', 1296740469),
(28, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Mares Oversized', '1st place', 1296740469),
(29, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Solid Color', '1st place', 1296740469),
(30, 16, 9, 2005, 'NAS', 'Merriekeuring', 'merrie veulens  luxe', '2e premie', 1296741800),
(31, 6, 8, 2005, 'MHCE', 'Danish Open', 'Solid Color', '6th place', 1296741800),
(32, 14, 6, 2005, 'NAS', 'Stamboek opname', 'Stamboek opname', '96cm at the withers', 1296742444),
(33, 28, 2, 2004, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '2e premie', 1296743177),
(34, 28, 2, 2004, 'NMPRS', 'Hengstenkeuring', 'Stamboek opname', '89cm', 1296743177),
(35, 31, 3, 2007, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '1A  premie', 1296743177),
(36, 11, 4, 2009, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '1A  premie', 1296743177),
(37, 10, 4, 2010, 'NMPRS', 'Hengstenkeuring', 'kleine maat luxe', '1A  premie', 1296743177),
(38, 29, 8, 2009, 'NMPRS', 'Merriekeuring', 'merrieveulens kleine maat luxe', '2e premie', 1296745039),
(39, 6, 6, 2000, 'NAS', 'Stamboek opname', 'Stamboek opname', '85cm at the withers', 1296745499),
(40, 29, 8, 2009, 'NMPRS', 'Stamboek opname', 'Stamboek opname', '90cm at the withers', 1296745862),
(41, 29, 6, 2004, 'NAS', 'Stamboek opname', 'Stamboek opname', '89.5cm at the withers', 1296746430),
(42, 6, 9, 2004, 'NAS', 'Merriekeuring', 'kleine maat luxe', '1A  premie', 1296746430),
(43, 28, 8, 2007, 'NMPRS', 'Merriekeuring', 'merrie veulens minimaat luxe', '2e premie', 1296734632),
(44, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Senior Mares 32 - 38"', '1st place AMHA judge', 1296734632),
(45, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Senior Mares 32 - 38"', '1st place NM{PRS judge', 1296734632),
(46, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Solid Color', '1st place AMHA judge', 1296734632),
(47, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Solid Color', '2nd place  NMPRS judge', 1296734632),
(48, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Champion Classe', 'Grand Champion AMHA Judge', 1296734632),
(49, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Champion Classe', 'Grand Champion NMPRS Judge', 1296734632),
(50, 1, 5, 2010, 'ICAMH', 'Spring Fling Funshow', 'Champion Classe', 'Supreme Champion AMHA Judge', 1296734632),
(51, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Solid Color', '2nd place', 1296734632),
(52, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Senior Mares 32 - 34"', '2nd place', 1296734632),
(53, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Senior Mares Non AMHA', '1st place', 1296734632),
(54, 15, 5, 2010, 'MHCE', 'Belgium International Open', 'Champion Classe', 'Grand Champion Non AMHA', 1296734632);

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
(59, 'Lorem Ipsum', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e2050686173656c6c7573206e6f6e20636f6d6d6f646f206469616d2e20536564207072657469756d20656c69742061206e69626820616c697175616d2068656e6472657269742e20496e2073697420616d6574206e756c6c612061756775652c206e6f6e20706f7274612073617069656e2e204e616d206469616d2076656c69742c206c6163696e696120616320766976657272612065742c206d6f6c6c697320696420617263752e204372617320736564206e756c6c6120657261742e204e616d207669766572726120766573746962756c756d2066656c6973206575206c75637475732e20496e7465676572207661726975732065676573746173206d6f6c6c69732e20446f6e656320636f6e73656374657475722065726f732075742065726f732072686f6e637573206567657420636f6e76616c6c697320697073756d20617563746f722e20496e20666575676961742066656c697320656765742066656c697320666163696c69736973207175697320766172697573206469616d206d61747469732e2050656c6c656e746573717565206861626974616e74206d6f726269207472697374697175652073656e6563747573206574206e65747573206574206d616c6573756164612066616d65732061632074757270697320656765737461732e2050726f696e2076697665727261206c65637475732061632075726e6120706861726574726120656c656966656e642e20446f6e6563207361676974746973206c6f626f72746973206e756c6c612e20416c697175616d206572617420766f6c75747061742e204675736365206174207175616d2076656e656e61746973206f726369206c756374757320756c7472696365732e0d0a0d0a53757370656e6469737365206175677565206e6962682c20696e74657264756d2065742076617269757320656765742c20756c6c616d636f72706572207669746165206d61676e612e2043756d20736f63696973206e61746f7175652070656e617469627573206574206d61676e6973206469732070617274757269656e74206d6f6e7465732c206e61736365747572207269646963756c7573206d75732e20566976616d7573207661726975732072697375732073616769747469732066656c697320666175636962757320736f6c6c696369747564696e2e205072616573656e7420636f6e7365637465747572207175616d20617420616e746520706c616365726174206d616c6573756164612e205365642064756920657261742c207661726975732076656c206d6f6c65737469652065752c207472697374697175652069642073617069656e2e20457469616d2071756973206c656f206e756e632c20657420657569736d6f6420617263752e204e756c6c612074696e636964756e742073656d706572206e756c6c612c206163206665726d656e74756d206469616d2073616769747469732065752e2050686173656c6c7573206469676e697373696d20726973757320657420746f72746f7220616363756d73616e20756c7472696365732e20517569737175652075742065726f73207475727069732e2053656420656765742074656c6c7573206964206e756c6c612066657567696174206c6f626f72746973206e65632073697420616d65742061756775652e20566976616d757320736564206d69206a7573746f2c2061742073757363697069742073656d2e204e756c6c616d2074656d706f72206d616c65737561646120656e696d207669746165207661726975732e204375726162697475722076697461652065726f73206f64696f2c20657520657569736d6f642061756775652e20446f6e6563207669766572726120766f6c757470617420706f73756572652e204e756c6c616d20766573746962756c756d2c206172637520616320626962656e64756d20696163756c69732c20656c6974206a7573746f206d616c65737561646120616e74652c2061206c6163696e69612064756920656c6974206163206d61757269732e204d616563656e617320616c697175616d20666163696c697369732070757275732c20612070656c6c656e7465737175652074656c6c757320616c697175616d2075742e2053757370656e646973736520747269737469717565206e756c6c6120637572737573206c656f20766f6c7574706174206163206c75637475732064756920677261766964612e2043756d20736f63696973206e61746f7175652070656e617469627573206574206d61676e6973206469732070617274757269656e74206d6f6e7465732c206e61736365747572207269646963756c7573206d75732e2041656e65616e2065676574206d61676e612076656c206c6967756c6120706c6163657261742073616769747469732e0d0a0d0a4d616563656e617320696e2070656c6c656e746573717565206c6967756c612e204e756e632068656e647265726974206665726d656e74756d206d6173736120766974616520636f6e64696d656e74756d2e20496e746567657220706c61636572617420706f7375657265207475727069732076656c20706f7274612e2041656e65616e20696e206d65747573206f64696f2c206567657420696d706572646965742061756775652e204e616d207669766572726120636f6e76616c6c6973206c6f626f727469732e204e756c6c6120666163696c6973692e20496e7465676572206e6563206e756e6320736564206c656f20636f6d6d6f646f206772617669646120696e20696e2075726e612e20416c697175616d206572617420656e696d2c20656765737461732071756973207661726975732061742c20616c6971756574206163206d617373612e20416c697175616d20657569736d6f6420766f6c75747061742073656d7065722e204d616563656e617320766f6c757470617420766573746962756c756d206d61676e612073697420616d657420616c69717565742e20566976616d75732073617069656e20656e696d2c20756c6c616d636f7270657220766974616520656c656966656e6420696e2c206567657374617320696e206c6967756c612e20496e746567657220706f737565726520656c6974206e6f6e2073656d2068656e647265726974206174206d617474697320656e696d20666163696c697369732e204475697320636f6e76616c6c6973206c756374757320766f6c75747061742e2050726f696e206e756c6c61206d61757269732c2070656c6c656e7465737175652076656c2070756c76696e61722075742c2072757472756d207574206c616375732e20496e2061206d6173736120746f72746f722e20437572616269747572206575206c65637475732072697375732c20696420636f6d6d6f646f206e6973692e20, '1287766418'),
(60, 'html test', 0x3c6120687265663d22687474703a2f2f6c6f63616c686f73742f74657374736974652f696e6465782e7068703f6c616e673d656e223e576562736974653c2f613e, '1287786244'),
(61, 'html test 2', 0x687474703a2f2f6c6f63616c686f73742f74657374736974652f696e6465782e7068703f6c616e673d656e, '1287786297'),
(62, 'Try out', 0x45656e732065656e206b6565722065656e20616e6465726520746974656c2e0d0a0d0a0d0a486168616861686168610d0a0d0a0d0a45656e73206b696a6b656e20776174206572206e7520676562657572642e, '1287818223'),
(63, 'En dan nog een keertje', 0x50666666666666666620646965206572726f7273207765677765726b656e206973206e69657420656368742065656e206c65756b206b6c75736a652e0d0a0d0a4d61617220616c6c6573206761617420676f6564206b6f6d656e2064656e6b20696b2e, '1287818374'),
(64, 'aint no time no reason', 0x4c657420676f206c657420676f2068617070656e2e, '1287818539'),
(65, 'Pffffffff tis wa', 0x546973207761206d656a20646965206572726f72732e, '1287818601'),
(66, 'weer iets proberen', 0x45656e73206b696a6b656e206f6620646974206465206f706c6f7373696e672069732e, '1287818984'),
(67, 'Daar gaan we weer', 0x576f72642065656e20626565746a6520676573746f6f7264206869657276616e2e, '1287819161'),
(68, 'We komen er wel', 0x416c7468616e732064617420686f6f7020696b206d6161722e, '1287819287'),
(69, 'En dan nog een keertje', 0x486f657665656c206b656572206e7520616c3f3f3f3f3f3f3f3f3f3f3f3f3f3f, '1287819438');
