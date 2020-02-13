-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 06:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datapstor`
--

-- --------------------------------------------------------

--
-- Table structure for table `alldata`
--

CREATE TABLE IF NOT EXISTS `alldata` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text,
  `Price` text,
  `Description` text,
  `img` text,
  `Type` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `alldata`
--

INSERT INTO `alldata` (`ID`, `Name`, `Price`, `Description`, `img`, `Type`) VALUES
(1, 'hp_onm_por', '30000', 'gtx_1060ti_', '/pstor/IMG/main/0.jpg', 'pc'),
(2, 'hp', '30000', 'gtx_1060ti_', '/pstor/IMG/main/1.jpg', 'pc'),
(3, 'iphon_x_x', '27000', 'rtx', '/pstor/IMG/main/3.jpg', 'phone'),
(4, 'ass', '30000', 'rhlfgalu_uewg_gfuep_uhupfuegfp_ijcdih_', '/pstor/IMG/main/4.jpg', 'pc'),
(5, 'iphon_6x', '10000', 'beuw_gfhfe_u_ehf_ue_pfihweuhf_upweh', '/pstor/IMG/main/5.jpg', 'phone'),
(6, 'msi', '23874', 'vuiagvgu', '/pstor/IMG/main/6.jpg', 'pc'),
(7, 'msi_por', '40000', 'vbrauig_fiouqrhufhwqruh_fiuhf_uqhw_fuhwqeu_fuiwqh_uifhiu', '/pstor/IMG/main/7.jpg', 'phone'),
(8, 'key_bord', '1000', 'nafdkshvlkeabviuaebruiaer_her8_huwefhio_rehfi_hefiohw_ihweiogh_wughu_whf', '/pstor/IMG/main/8.jpg', 'other'),
(9, 'joystek', '2000', 'vasdfuiguqer_hfuh_erufhw_uehfiwehfuhwe', '/pstor/IMG/main/9.jpg', 'other'),
(10, 'moues', '1000', 'cnduich_uihfpqy_efhuhefu_hewqiufpgeqwuir_gfuiqpgr_fupi_wegfu_gewufg', '/pstor/IMG/main/0.jpg', 'other'),
(11, 'kolo_pro', '3000', 'ygucgiuegw_cheuh_chue_chud', '/pstor/IMG/main/1.jpg', 'other'),
(12, 'jioghiu', '3000', 'iogjetg_jjgowi_guw_ughqoirdgoi_qhg3', '/pstor/IMG/main/6.jpg', 'other');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
