-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2017 at 04:03 PM
-- Server version: 5.5.58-0+deb8u1-log
-- PHP Version: 7.0.26-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhufournier`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `ID` varchar(20) NOT NULL,
  `mdp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`ID`, `mdp`) VALUES
('Damien', '$2y$10$NL4bhRb2ssPw//ojSoRCYeB8aTMXmYqDhAjjob8FhPy925Matlk32'),
('Hugo', '$2y$10$USThZo8OaNzvj0oSYsuZF.PLJJ5lvJOynizzKsonyaR0830e/i6im'),
('ssalva', '$2y$10$EzCjCkuIKHPueNFVbAxhLO/5VaPx73YTjJbBWHXtd1uxb8a6Pjih6');

-- --------------------------------------------------------

--
-- Table structure for table `Flux`
--

CREATE TABLE `Flux` (
  `ID` varchar(500) NOT NULL,
  `lien` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Flux`
--

INSERT INTO `Flux` (`ID`, `lien`) VALUES
('flux.com', 'flux.com'),
('info.com', 'info.com'),
('lego.com', 'lego.com'),
('rss.net', 'rss.net');

-- --------------------------------------------------------

--
-- Table structure for table `NEWS`
--

CREATE TABLE `NEWS` (
  `guid` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(5000) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `lien` varchar(200) NOT NULL,
  `origine` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NEWS`
--

INSERT INTO `NEWS` (`guid`, `date`, `description`, `titre`, `lien`, `origine`) VALUES
('ent.uca.fr', '2017-11-01 00:00:00', 'ent de l\'uca', 'ENT UCA', 'ent.uca.fr', 'flux.com'),
('www.facebook.com', '2017-07-02 00:00:00', 'social', 'Facebook', 'www.facebook.com', 'flux.com'),
('www.ibey.com', '2017-11-17 00:00:00', 'vente', 'Ibey', 'www.ibey.com', 'info.com'),
('www.youtube.com', '2017-11-15 00:00:00', 'video', 'Youtube', 'www.youtube.com', 'info.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Flux`
--
ALTER TABLE `Flux`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `lien` (`lien`);

--
-- Indexes for table `NEWS`
--
ALTER TABLE `NEWS`
  ADD PRIMARY KEY (`guid`),
  ADD KEY `fk_flux_lien` (`origine`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `NEWS`
--
ALTER TABLE `NEWS`
  ADD CONSTRAINT `fk_flux_lien` FOREIGN KEY (`origine`) REFERENCES `Flux` (`lien`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
