-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 31, 2017 at 09:35 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishingregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `kalastusalueet`
--

DROP TABLE IF EXISTS `kalastusalueet`;
CREATE TABLE IF NOT EXISTS `kalastusalueet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutkimusalue_id` int(11) NOT NULL,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kalastusalue_id` (`tutkimusalue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kalastusalueet`
--

INSERT INTO `kalastusalueet` (`id`, `tutkimusalue_id`, `nimi`) VALUES
(1, 1, 'Nuorajärvi'),
(2, 1, 'Koitajoki, yläosa'),
(3, 1, 'Koitajoki, alaosa'),
(4, 1, 'Kelsimänjoki');

-- --------------------------------------------------------

--
-- Table structure for table `kayttajat`
--

DROP TABLE IF EXISTS `kayttajat`;
CREATE TABLE IF NOT EXISTS `kayttajat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutkimusalue_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(350) COLLATE utf8_bin NOT NULL,
  `osoite` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `postinumero` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `toimipaikka` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kalastusalue_id` (`tutkimusalue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kayttajat`
--

INSERT INTO `kayttajat` (`id`, `tutkimusalue_id`, `username`, `password`, `osoite`, `postinumero`, `toimipaikka`, `status`) VALUES
(1, 1, 'admin', '$2y$10$r.6422yIOw597lbJhFSbq.TFUTU0.HYTlO7pdbmk32oU0I3Pu98dS', 'Katutie 1', '57100', 'Savonlinna', 1),
(2, 1, 'mikaovaskainen', '$2y$10$r.6422yIOw597lbJhFSbq.TFUTU0.HYTlO7pdbmk32oU0I3Pu98dS', 'Tiekatu 1', '57710', 'Savonlinna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kyselyt`
--

DROP TABLE IF EXISTS `kyselyt`;
CREATE TABLE IF NOT EXISTS `kyselyt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nimi` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `luontipvm` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kyselyt`
--

INSERT INTO `kyselyt` (`id`, `nimi`, `luontipvm`) VALUES
(5, 'nuorajärvi-koitajoki-kelsimänjoki', '2016-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `kysymykset`
--

DROP TABLE IF EXISTS `kysymykset`;
CREATE TABLE IF NOT EXISTS `kysymykset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kysely_id` int(11) NOT NULL,
  `kysymystyyppi_id` int(11) NOT NULL,
  `kysymysnro` int(11) NOT NULL,
  `kysymysotsikko` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kysely_id` (`kysely_id`),
  KEY `kysymystyyppi_id` (`kysymystyyppi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kysymykset`
--

INSERT INTO `kysymykset` (`id`, `kysely_id`, `kysymystyyppi_id`, `kysymysnro`, `kysymysotsikko`) VALUES
(6, 5, 2, 1, 'Kalastiko joku ruokakuntanne jäsenistä Nuorajärvessä, Koitajoessa tai Kelsimänjoessa vuonna 2016?'),
(7, 5, 3, 2, 'Pääasiallisin kalastusalueenne (rasti ruutuun, valitkaa vain yksi alue)'),
(8, 5, 4, 3, 'Kuinka monena päivänä olette keskimäärin kalastaneet kunkin kuukauden aikana?'),
(9, 5, 2, 4, 'Omistatteko vesialueen tai oletteko osakaskunnan osakas?'),
(10, 5, 5, 5, 'Arvioikaa alla olevaan taulukkoon ruokakuntanne saama saalis vuonna 2016.'),
(11, 5, 8, 6, 'Mitkä lajit ovat yleistyneet tai vähentyneet viimeisen viiden vuoden aikana tutkimusalueella?'),
(12, 5, 1, 7, 'Oletteko havainneet kalojen vaellusta selvitysalueella? Jos kyllä, niin millaista?'),
(13, 5, 9, 8, 'Kalastusta haittaavia tekijöitä selvitysalueella. Merkitkää rasti kuvaavimman vaihtoehdon kohdalle.'),
(14, 5, 10, 9, 'Arvioikaa kalastusalueenne merkitystä kalojen lisääntymisalueena.'),
(15, 5, 1, 10, 'Kirjoittakaa alle huomioitanne kalaston tai ravun esiintymisen muutoksista, istutusten tuloksellisuudesta, vedenlaadun vaihtelusta yms.');

-- --------------------------------------------------------

--
-- Table structure for table `kysymystyypit`
--

DROP TABLE IF EXISTS `kysymystyypit`;
CREATE TABLE IF NOT EXISTS `kysymystyypit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kysymystyypit`
--

INSERT INTO `kysymystyypit` (`id`, `nimi`) VALUES
(1, 'Vapaa teksti'),
(2, 'Kyllä/Ei'),
(3, 'Pääasiallisen kalastusalueen valinta'),
(4, 'Kalastuspäivien määrä kuukaudessa'),
(5, 'Kalamäärät per pyydystyyppi'),
(6, 'Koentakertojen/Kalastusvuorokausien määrä per pyydys'),
(7, 'Keskimääräinen pyydysten lukumäärä per päivä'),
(8, 'Lajien yleistyminen/vähentyminen'),
(9, 'Kalastuksen haittatekijät'),
(10, 'Alueen merkitys kalojen lisääntymisalueena');

-- --------------------------------------------------------

--
-- Table structure for table `kysymys_kentat`
--

DROP TABLE IF EXISTS `kysymys_kentat`;
CREATE TABLE IF NOT EXISTS `kysymys_kentat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kysymys_id` int(11) NOT NULL,
  `sarake_resurssi_id` int(11) DEFAULT NULL,
  `rivi_resurssi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kysymys_id` (`kysymys_id`),
  KEY `sarake_resurssi_id` (`sarake_resurssi_id`),
  KEY `rivi_resurssi_id` (`rivi_resurssi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kysymys_kentat`
--

INSERT INTO `kysymys_kentat` (`id`, `kysymys_id`, `sarake_resurssi_id`, `rivi_resurssi_id`) VALUES
(5, 10, 1, 30),
(6, 10, 2, 30),
(7, 10, 3, 30),
(8, 10, 4, 30),
(9, 10, 5, 30),
(10, 10, 6, 30),
(11, 10, 7, 30),
(12, 10, 8, 30),
(13, 10, 9, 30),
(14, 10, 10, 30),
(15, 10, 11, 30),
(16, 10, 1, 31),
(17, 10, 2, 31),
(18, 10, 3, 31),
(19, 10, 4, 31),
(20, 10, 5, 31),
(21, 10, 6, 31),
(22, 10, 7, 31),
(23, 10, 8, 31),
(24, 10, 9, 31),
(25, 10, 10, 31),
(26, 10, 11, 31),
(27, 10, 1, 32),
(28, 10, 2, 32),
(29, 10, 3, 32),
(30, 10, 4, 32),
(31, 10, 5, 32),
(32, 10, 6, 32),
(33, 10, 7, 32),
(34, 10, 8, 32),
(35, 10, 9, 32),
(36, 10, 10, 32),
(37, 10, 11, 32),
(38, 10, 1, 33),
(39, 10, 2, 33),
(40, 10, 3, 33),
(41, 10, 4, 33),
(42, 10, 5, 33),
(43, 10, 6, 33),
(44, 10, 7, 33),
(45, 10, 8, 33),
(46, 10, 9, 33),
(47, 10, 10, 33),
(48, 10, 11, 33),
(49, 10, 1, 34),
(50, 10, 2, 34),
(51, 10, 3, 34),
(52, 10, 4, 34),
(53, 10, 5, 34),
(54, 10, 6, 34),
(55, 10, 7, 34),
(56, 10, 8, 34),
(57, 10, 9, 34),
(58, 10, 10, 34),
(59, 10, 11, 34),
(60, 10, 1, 35),
(61, 10, 2, 35),
(62, 10, 3, 35),
(63, 10, 4, 35),
(64, 10, 5, 35),
(65, 10, 6, 35),
(66, 10, 7, 35),
(67, 10, 8, 35),
(68, 10, 9, 35),
(69, 10, 10, 35),
(70, 10, 11, 35),
(71, 10, 1, 36),
(72, 10, 2, 36),
(73, 10, 3, 36),
(74, 10, 4, 36),
(75, 10, 5, 36),
(76, 10, 6, 36),
(77, 10, 7, 36),
(78, 10, 8, 36),
(79, 10, 9, 36),
(80, 10, 10, 36),
(81, 10, 11, 36),
(82, 10, 1, 37),
(83, 10, 2, 37),
(84, 10, 3, 37),
(85, 10, 4, 37),
(86, 10, 5, 37),
(87, 10, 6, 37),
(88, 10, 7, 37),
(89, 10, 8, 37),
(90, 10, 9, 37),
(91, 10, 10, 37),
(92, 10, 11, 37),
(93, 11, 1, NULL),
(94, 11, 2, NULL),
(95, 11, 3, NULL),
(96, 11, 4, NULL),
(97, 11, 5, NULL),
(98, 11, 6, NULL),
(99, 11, 7, NULL),
(100, 11, 8, NULL),
(101, 11, 9, NULL),
(102, 11, 10, NULL),
(103, 11, 11, NULL),
(104, 13, 39, NULL),
(105, 13, 40, NULL),
(106, 13, 41, NULL),
(107, 13, 42, NULL),
(108, 13, 43, NULL),
(109, 13, 44, NULL),
(110, 13, 45, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resurssit`
--

DROP TABLE IF EXISTS `resurssit`;
CREATE TABLE IF NOT EXISTS `resurssit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resurssityyppi_id` int(11) NOT NULL,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resurssityyppi_id` (`resurssityyppi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `resurssit`
--

INSERT INTO `resurssit` (`id`, `resurssityyppi_id`, `nimi`) VALUES
(1, 1, 'ahven'),
(2, 1, 'hauki'),
(3, 1, 'kuha'),
(4, 1, 'särki'),
(5, 1, 'lahna'),
(6, 1, 'säyne'),
(7, 1, 'made'),
(8, 1, 'muikku'),
(9, 1, 'siika'),
(10, 1, 'taimen'),
(11, 1, 'rapu'),
(30, 2, 'harvat verkot, kesäpyynti'),
(31, 2, 'harvat verkot, talvipyynti'),
(32, 2, 'muikkuverkot'),
(33, 2, 'katiskat'),
(34, 2, 'mato-onki'),
(35, 2, 'pilkkivapa'),
(36, 2, 'heittouistin'),
(37, 2, 'vetouistin'),
(39, 3, 'pyydysten likaantuminen'),
(40, 3, 'vedenlaadun heikentyminen'),
(41, 3, 'kalojen makuvirheet'),
(42, 3, 'kalastajien runsaus'),
(43, 3, 'pyyntirajojitukset'),
(44, 3, 'roskakalojen runsaus'),
(45, 3, 'vesistön säännöstely');

-- --------------------------------------------------------

--
-- Table structure for table `resurssityypit`
--

DROP TABLE IF EXISTS `resurssityypit`;
CREATE TABLE IF NOT EXISTS `resurssityypit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `resurssityypit`
--

INSERT INTO `resurssityypit` (`id`, `nimi`) VALUES
(1, 'Kala'),
(2, 'Pyydys'),
(3, 'Haittatekijä');

-- --------------------------------------------------------

--
-- Table structure for table `tutkimusalueet`
--

DROP TABLE IF EXISTS `tutkimusalueet`;
CREATE TABLE IF NOT EXISTS `tutkimusalueet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vesisto_id` int(11) NOT NULL,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vesisto_id` (`vesisto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tutkimusalueet`
--

INSERT INTO `tutkimusalueet` (`id`, `vesisto_id`, `nimi`) VALUES
(1, 1, 'Tutkimusalue 1'),
(2, 1, 'Tutkimusalue 2');

-- --------------------------------------------------------

--
-- Table structure for table `tutkimusalue_kyselyt`
--

DROP TABLE IF EXISTS `tutkimusalue_kyselyt`;
CREATE TABLE IF NOT EXISTS `tutkimusalue_kyselyt` (
  `tutkimusalue_id` int(11) NOT NULL,
  `kysely_id` int(11) NOT NULL,
  `kyselypvm` date NOT NULL,
  PRIMARY KEY (`kysely_id`,`tutkimusalue_id`),
  KEY `kalastusalue_id` (`tutkimusalue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tutkimusalue_kyselyt`
--

INSERT INTO `tutkimusalue_kyselyt` (`tutkimusalue_id`, `kysely_id`, `kyselypvm`) VALUES
(1, 5, '2017-10-03'),
(2, 5, '2017-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `vastaukset`
--

DROP TABLE IF EXISTS `vastaukset`;
CREATE TABLE IF NOT EXISTS `vastaukset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kysymys_id` int(11) NOT NULL,
  `kayttaja_id` int(11) DEFAULT NULL,
  `vastauspvm` date NOT NULL,
  `vastaus` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kysymys_id` (`kysymys_id`),
  KEY `kayttaja_id` (`kayttaja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vastaus_kentat`
--

DROP TABLE IF EXISTS `vastaus_kentat`;
CREATE TABLE IF NOT EXISTS `vastaus_kentat` (
  `kysymys_kentta_id` int(11) NOT NULL,
  `vastaus_id` int(11) NOT NULL,
  `vastaus` int(11) DEFAULT NULL,
  PRIMARY KEY (`kysymys_kentta_id`,`vastaus_id`),
  KEY `vastaus_id` (`vastaus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vesistot`
--

DROP TABLE IF EXISTS `vesistot`;
CREATE TABLE IF NOT EXISTS `vesistot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nimi` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vesistot`
--

INSERT INTO `vesistot` (`id`, `nimi`) VALUES
(1, 'Vuoksen vesistö');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kalastusalueet`
--
ALTER TABLE `kalastusalueet`
  ADD CONSTRAINT `kalastusalueet_ibfk_1` FOREIGN KEY (`tutkimusalue_id`) REFERENCES `tutkimusalueet` (`id`);

--
-- Constraints for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD CONSTRAINT `kayttajat_ibfk_1` FOREIGN KEY (`tutkimusalue_id`) REFERENCES `tutkimusalueet` (`id`);

--
-- Constraints for table `kysymykset`
--
ALTER TABLE `kysymykset`
  ADD CONSTRAINT `kysymykset_ibfk_1` FOREIGN KEY (`kysely_id`) REFERENCES `kyselyt` (`id`),
  ADD CONSTRAINT `kysymykset_ibfk_2` FOREIGN KEY (`kysymystyyppi_id`) REFERENCES `kysymystyypit` (`id`);

--
-- Constraints for table `kysymys_kentat`
--
ALTER TABLE `kysymys_kentat`
  ADD CONSTRAINT `kysymys_kentat_ibfk_1` FOREIGN KEY (`kysymys_id`) REFERENCES `kysymykset` (`id`),
  ADD CONSTRAINT `kysymys_kentat_ibfk_2` FOREIGN KEY (`sarake_resurssi_id`) REFERENCES `resurssit` (`id`),
  ADD CONSTRAINT `kysymys_kentat_ibfk_3` FOREIGN KEY (`rivi_resurssi_id`) REFERENCES `resurssit` (`id`);

--
-- Constraints for table `resurssit`
--
ALTER TABLE `resurssit`
  ADD CONSTRAINT `resurssit_ibfk_1` FOREIGN KEY (`resurssityyppi_id`) REFERENCES `resurssityypit` (`id`);

--
-- Constraints for table `tutkimusalueet`
--
ALTER TABLE `tutkimusalueet`
  ADD CONSTRAINT `tutkimusalueet_ibfk_1` FOREIGN KEY (`vesisto_id`) REFERENCES `vesistot` (`id`);

--
-- Constraints for table `tutkimusalue_kyselyt`
--
ALTER TABLE `tutkimusalue_kyselyt`
  ADD CONSTRAINT `tutkimusalue_kyselyt_ibfk_1` FOREIGN KEY (`tutkimusalue_id`) REFERENCES `tutkimusalueet` (`id`),
  ADD CONSTRAINT `tutkimusalue_kyselyt_ibfk_2` FOREIGN KEY (`kysely_id`) REFERENCES `kyselyt` (`id`);

--
-- Constraints for table `vastaukset`
--
ALTER TABLE `vastaukset`
  ADD CONSTRAINT `vastaukset_ibfk_1` FOREIGN KEY (`kysymys_id`) REFERENCES `kysymykset` (`id`),
  ADD CONSTRAINT `vastaukset_ibfk_2` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`id`);

--
-- Constraints for table `vastaus_kentat`
--
ALTER TABLE `vastaus_kentat`
  ADD CONSTRAINT `vastaus_kentat_ibfk_1` FOREIGN KEY (`kysymys_kentta_id`) REFERENCES `kysymys_kentat` (`id`),
  ADD CONSTRAINT `vastaus_kentat_ibfk_2` FOREIGN KEY (`vastaus_id`) REFERENCES `vastaukset` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
