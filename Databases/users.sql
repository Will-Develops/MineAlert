-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2015 at 11:17 PM
-- Server version: 5.6.23
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minealer_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(75) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `password` varchar(70) NOT NULL,
  `temp_password` varchar(16) NOT NULL,
  `group` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `joined` datetime NOT NULL,
  `current_ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `salt`, `password`, `temp_password`, `group`, `name`, `verified`, `joined`, `current_ip`) VALUES
(2, 'smellyjelly1998', 'Jack@MineAlert.net', '•ý©CN©¬G€;Ü^ldñú=L’Þ4MIðf°_ÿ', '5ab6979be90ff9fae3262fb19f0876af87ddb18b7d935e1d8377966315591376', '0c375d5be70c0466', 4, 'Jack Chappell', 0, '2014-08-11 00:00:00', '217.113.172.252'),
(1, 'Darkcop', 'Will@MineAlert.net', 'šÁ\0êR­%Úy€ÂgDÂShEè¶\0]ÐH)¼õÄú', 'c14f1b9790554ff94d083b05236b1cfe00361369a9a3ab33233540eae375eb17', '4b9647d62156acf0', 3, 'Will M', 0, '2014-03-14 00:00:00', '141.101.99.181'),
(3, 'averythomas', 'averythomas@me.com', 'ÿ[÷™ø•Äbõ.[?qÉÇãæmFE•\nT+^]¼ˆ¤', 'ba062c80295fcf8c7d86eb162189758d8802d9907b7e29810f621ff35f4c77fd', 'ea8a2e5673ee30cd', 10, 'avery thomas', 0, '2014-03-14 00:00:00', '108.162.219.109'),
(4, 'xxchxppellxx', 'test@test.com', 'µX†3¬ñt}ên²nEPnÓÒ¤ÎJÏñ''³&uÀ', '3f5f569813387b7834776d8bc6c438ef3c181b75cd6ad63f2eab96d13a8b65b0', '28ee6698f568875e', 1, 'Test Account', 0, '2014-12-07 00:00:00', '141.101.98.207'),
(5, 'TestAccount', 'TestAccount@MineAlert.net', 'e† G4\r‚ÙIÖ6K1NŽº_.dºµè-ÃÖÀ}¯í¼ú', '0fc8a969c7c22ae1462fc425cf1ecbef878bacebbe3457800e9d57e752f686d0', '36c91aa55e02bc14', 1, 'MineAlert Test Accou', 0, '2014-12-07 00:00:00', '141.101.98.221'),
(6, 'DarkCubed', 'Darkcop@hotmail.co.uk', 'kº.p,1bštêpßå´†ìÃ¡-õÞ4~¾àÉœÄ&q', 'c9401a03e0fa9d2557bc798555905286388b1fa115b066e9c9a60e5fb4bec6fc', '30096ae6f1dab9c7', 1, 'Darkcop2', 0, '2014-12-13 00:00:00', '141.101.99.181'),
(7, 'hubertus09', 'hubbyissoawesome@gmail.com', 'ˆ$žêŠ\rï´­§¸ŒÝA\\3Î—…6ˆ­ûà»5Íàuv', '612a82d15bd6d5335a61261e8d413bbedcbde916f19a894c4a4a6a14ab5515f8', 'f7febd9b264fc698', 1, 'Hubert Kaluzny', 0, '2014-12-13 00:00:00', '141.101.99.178');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
