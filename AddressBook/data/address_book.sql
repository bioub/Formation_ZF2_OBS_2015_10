-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2015 at 04:11 PM
-- Server version: 5.6.27
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `prenom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `societe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `prenom`, `nom`, `telephone`, `email`, `societe_id`) VALUES
(1, 'Bill', 'Gates', '+1 333 987 0000', 'bill.gates@microsoft.com', 1),
(2, 'Steve', 'Jobs', '+1 999 999 9999', 'sjobs@apple.com', 2),
(3, 'Steve', 'Ballmer', '+1 333 999 0000', 'steve.ballmer@microsoft.com', NULL),
(4, 'Thierry', 'Henry', '+33 4 35 30 50 20', 'titi@gmail.com', NULL),
(5, 'Barack', 'Obama', NULL, NULL, NULL),
(7, 'Romain', 'Bohdanowicz', NULL, NULL, NULL),
(9, 'Mark', 'Zuckerberg', NULL, NULL, NULL),
(26, 'Hugo', 'Lloris', NULL, 'hugo@fff.fr', NULL),
(27, 'Romain', 'Bohdanowicz', '0630072027', 'bioub@iouweb.com', NULL),
(29, 'Romain', 'Bohdanowicz', '0630072027', 'toto@titi.com', NULL),
(30, '', '', '', 'titi@tii.Com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `societe`
--

CREATE TABLE IF NOT EXISTS `societe` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `societe`
--

INSERT INTO `societe` (`id`, `nom`, `ville`) VALUES
(1, 'Microsoft', 'Seattle'),
(2, 'Apple', 'Cupertino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `IDX_4C62E638FCF77503` (`societe_id`);

--
-- Indexes for table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638FCF77503` FOREIGN KEY (`societe_id`) REFERENCES `societe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
