-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 03:41 PM
-- Server version: 10.1.25-MariaDB
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
-- Database: `speedhunters_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `barang_id` int(10) DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `barang_id`, `gambar`, `link`, `status`) VALUES
(1, 1, 'AGV_PISTA_GPR_SOLELUNA_2016_JOYSTICK_4.jpg', 'index.php?page=detail&barang_id=1', 'on'),
(2, 2, 'AGV_K3_SV_TARTARUGA_4.jpg', 'index.php?page=detail&barang_id=2', 'on'),
(3, 7, 'NOLAN_N64_STONER_SUZUKA_METAL_WHITE_2.jpg', 'index.php?page=detail&barang_id=7', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(10) NOT NULL,
  `kategori_id` int(10) DEFAULT NULL,
  `merk_id` int(3) DEFAULT NULL,
  `nama_barang` varchar(250) DEFAULT NULL,
  `spesifikasi` text,
  `gambar` varchar(300) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `stok` int(1) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `merk_id`, `nama_barang`, `spesifikasi`, `gambar`, `harga`, `stok`, `status`) VALUES
(1, 5, 1, 'AGV Pista GPR Soleluna 2016', '<p>Size:</p><ul><li>ML</li><li>L</li><li>XL</li></ul><p>Europe Fit</p><p>&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_PISTA_GPR_SOLELUNA_2016_JOYSTICK_4.jpg', 15800000, 3, 'on'),
(2, 5, 1, 'AGV K3 SV Tartaruga', '<p>Size:</p><ul><li>ML</li><li>XXL</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_K3_SV_TARTARUGA_2.jpg', 3300000, 5, 'on'),
(3, 5, 5, 'NOLAN N64 PETRUCCI SCRATCH CHROME', '<p>Size:</p><ul><li>M</li><li>L</li></ul><p>Bonus Dark Visor</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'NOLAN_N64_PETRUCCI_SCRATCH_CHROME_1.jpg', 3100000, 5, 'on'),
(4, 5, 9, 'X-lite X802RR Ultra Carbon Puro', '<p>Size:</p><ul><li>M</li><li>L</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '17265447_186522465180711_7254571921860198400_n.jpg', 6700000, 3, 'on'),
(5, 5, 4, 'HJC Rpha 11 Venom', '<p>Size: M</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '21568882_957280027745391_5458558869464678400_n.jpg', 6200000, 6, 'on'),
(6, 5, 4, 'HJC Rpha 11 Military White Sand', '<p>Size: XL</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'HJC_RPHA_11_MILITARY_WHITE_SAND_3.jpg', 5900000, 4, 'on'),
(7, 5, 5, 'Nolan N64 Stoner White', '<p>Size: L</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'NOLAN_N64_STONER_SUZUKA_METAL_WHITE_2.jpg', 2500000, 7, 'on'),
(8, 5, 5, 'Nolan N64 Stoner Chrome', '<p>Size:</p><ul><li>M</li><li>L</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'NOLAN_N64_STONER_SUZUKA_SCRATCH_CHROME_4.jpg', 3100000, 3, 'on'),
(9, 5, 7, 'Shark SKWAL Lorenzo', '<p>Size:</p><ul><li>L</li><li>XL</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'SHARK_SKWALL_LORENZO_LED_HELMET_3.jpg', 3800000, 5, 'on'),
(10, 5, 7, 'Shark skwal Carbon Black Grey Matt', '<p>Size:</p><ul><li>M</li><li>L</li><li>XL</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '21149778_711779585694722_511624170816143360_n.jpg', 3500000, 2, 'on'),
(11, 5, 1, 'AGV Pista GPR Iannone Winter Test Limited Edition', '<p>Size:</p><ul><li>ML</li><li>L</li><li>XL</li><li>XXL</li></ul><p>Europe Fit</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_CORSA_IANNONE_WINTERTEST_2016_LIMITED_EDITION.jpg', 9800000, 8, 'on'),
(12, 5, 1, 'AGV Pista GPR Iannone 2016', '<p>Size:</p><ul><li>ML</li><li>L</li><li>XXL</li></ul><p>Europe Fit</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '20066010_445846155802101_2368068774571016192_n.jpg', 15800000, 6, 'on'),
(13, 5, 1, 'AGV Corsa R Mugiallo 2016', '<p>Size:</p><ul><li>M</li><li>L</li><li>XL</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_CORSA_R_ROSSI_MUGIALLO_2016_1.jpg', 11000000, 7, 'on'),
(14, 5, 1, 'AGV Corsa Misano 2015 Limited Edition', '<p>&nbsp;Size:</p><ul><li>ML</li><li>L</li></ul><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_CORSA_MISANO_2015_LIMITED_EDITON_4.jpg', 11500000, 9, 'on'),
(15, 5, 7, 'Shark R Pro Lorenzo', '<p>Size XL</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '19051363_226087651234775_6774930048920059904_n.jpg', 6500000, 4, 'on'),
(16, 5, 8, 'Shoei X12 Marquez', '<p>Size M</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '18251427_1727254377572996_5738565779108921344_n.jpg', 7000000, 6, 'on'),
(17, 13, 3, 'Dainese Torque D1 out', '<p>Size 41-44</p><p>Black-Grey,&nbsp;Black-Red,&nbsp;Black-Yellow</p>', '1509255173450.png', 4900000, 6, 'on'),
(18, 13, 3, 'Dainese Course D1 out', '<p>Size 41-45</p><p>Black-Grey(41-45), Black-Red-White(43),Black-Yellow(41-44)</p>', '1509255147413.png', 4400000, 3, 'on'),
(19, 13, 3, 'Dainese Tempest DWP Waterproof Boots', '<p>Size 40-44</p><p>Black-Yellow(40-42), Black(40-44), Black-Red(40-44)</p>', '1509255113271.png', 2400000, 5, 'on'),
(20, 13, 3, 'Dainese Dyno D1', '<p>Size 42-46</p><p>Black-Grey(45), Black-Red(42-46)</p>', '1509255093268.png', 3200000, 3, 'on'),
(21, 13, 3, 'Dainese Vera Cruz D1', '<p>Size 41</p><p>Black</p>', '1509255071634.png', 3150000, 2, 'on'),
(22, 13, 2, 'Alpinestars Faster 2', '<p>Black Gunmetal(Waterproof Size 40-44, Non-Waterproof 40-45)</p><p>Black-Yellow-Red(41-44)</p><p>Black-Silver(41-42)</p><p>Black-Red Vented(41-45)</p><p>Black-White-Red Vented(41-45)</p>', '1509255194100.png', 2100000, 3, 'on'),
(23, 13, 2, 'Alpinestars SMX1R Boots', '<p>Vented Size 43-45</p><p>Non-Vented Size 41-42</p>', '1509255049173.png', 2400000, 4, 'on'),
(24, 16, 3, 'Dainese MIG Leather', '<p>Black</p><p>Size 50</p>', '21985424_962955217175952_1784985393150558208_n.jpg', 5500000, 5, 'on'),
(25, 16, 3, 'Dainese Super Speed', '<p>Size 48&amp;54 Only</p><p>Black-White-Red</p>', '21985137_367977473633667_484100409770639360_n.jpg', 4800000, 9, 'on'),
(26, 16, 3, 'Dainese VR46 Airtex', '<p>Size 48 &amp; 50 Only</p>', '22069262_181723865706757_3328128844379979776_n.jpg', 7800000, 3, 'on'),
(27, 14, 2, 'Alpinestars Motegi 2pc Leather Suit', '<p>Size 48 50 52</p><p>Black-White</p>', '21827645_1727434890895257_2059656742232391680_n.jpg', 4200000, 3, 'on'),
(28, 14, 2, 'Alpinestars Wearpack GP Pro Suit', '<p>Size 52&amp;54 Only</p><p>Black</p>', '21980561_2172140569468965_4346940214212558848_n.jpg', 14500000, 5, 'on'),
(29, 14, 2, 'Alpinestars Wearpack SP 1 Suit', '<p>Size 54</p><p>White</p>', '22070613_120903138616422_34245067036164096_n.jpg', 8800000, 4, 'on'),
(30, 14, 2, 'Alpinestars Wearpack Racing Replica for Teck Air System Leather Suit', '<p>Size 50</p><p>Black-Yellow Fluo</p>', '21910793_133654443938038_7824705440012304384_n.jpg', 24000000, 3, 'on'),
(31, 14, 6, 'Rev It Wearpack One Piece Hunter', '<p>Size 52 &amp; 56</p><p>Black-White</p>', '21879702_517320891947445_8896461408573587456_n.jpg', 10000000, 4, 'on'),
(32, 5, 1, 'AGV K3 SV Myth', '<p>Size XL</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '21568755_103015493778313_6425963221680652288_n.jpg', 3200000, 3, 'on'),
(33, 14, 2, 'Alpinestars Wearpack Challenger 2PC Suit', '<p>Size 50</p><p>Black</p>', '21980610_1724246741212651_5076484454327779328_n.jpg', 9500000, 2, 'on'),
(34, 5, 8, 'Shoei X14 Black Glossy', '<p>Size S</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'SHOEI_X14_BLACK_GLOSSY_1.jpg', 7200000, 6, 'on'),
(35, 5, 1, 'AGV CORSA R ESPARGARO', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_CORSA_R_ESPARGARO_4.jpg', 10200000, 2, 'on'),
(36, 5, 1, 'AGV PISTA GPR MONO CARBON MATTE', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'AGV_PISTA_GPR_MONO_CARBON_MATTE_2.jpg', 13800000, 8, 'on'),
(37, 5, 7, 'SHARK SPEED R CARBON SKIN REDDING', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'SHARK_SPEED_R_CARBON_SKIN_REDDING__2.jpg', 6500000, 4, 'on'),
(38, 5, 9, 'XLITE X802RR DANNY KENT AQUAMARINE', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'XLITE_X802RR_DANNY_KENT_AQUAMARINE_3.jpg', 6000000, 7, 'on'),
(39, 14, 3, 'DAINESE AVRO D2 2PC SUIT', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'DAINESE_AVRO_D2_2PC_SUIT_BLACK_WHITE_RED_FLUO.jpg', 12000000, 3, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori` varchar(150) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'Gloves', 'off'),
(5, 'Helmet', 'on'),
(13, 'Shoes', 'on'),
(14, 'Wearpack', 'on'),
(16, 'Jacket', 'on'),
(17, 'Helmet Visor', 'on'),
(21, 'Seatbelt', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `pesanan_id` int(10) DEFAULT NULL,
  `nomor_rekening` varchar(20) DEFAULT NULL,
  `nama_account` varchar(150) DEFAULT NULL,
  `tanggal_transfer` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(10) NOT NULL,
  `kota` varchar(150) DEFAULT NULL,
  `tarif` int(10) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(1, 'Jabodetabek', 25000, 'on'),
(2, 'Cikarang', 28500, 'on'),
(3, 'Bandung', 35000, 'on'),
(4, 'Surabaya', 41000, 'on'),
(5, 'Medan', 50000, 'on'),
(6, 'Lampung', 50000, 'on'),
(7, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` int(3) NOT NULL,
  `merk` varchar(65) DEFAULT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`merk_id`, `merk`, `gambar`, `status`) VALUES
(1, 'agv', 'agv-new-logo-1618D29943-seeklogo.com.png', 'on'),
(2, 'alpinestars', 'Alpinestars-logo-8811BB17F3-seeklogo.com.png', 'on'),
(3, 'DAINESE', 'DAINESE_Organization_Logo.png', 'on'),
(4, 'HJC', 'hjc-logo-1.png', 'on'),
(5, 'NOLAN', 'Nolan-logo-1B17CBC631-seeklogo.com.png', 'on'),
(6, 'REV IT', 'revit_logo_150x150.png', 'on'),
(7, 'SHARK', 'Shark-Helmets-logo.jpg', 'on'),
(8, 'SHOEI', 'shoei-logo-CDA8A5C43A-seeklogo.com.png', 'on'),
(9, 'X-lite', 'x-ite-logo.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `kota_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `nama_penerima` varchar(150) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_pemesanan` datetime DEFAULT NULL,
  `status` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `barang_id` int(10) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(2, 36, 1, 13800000),
(27, 12, 1, 15800000),
(28, 3, 1, 3100000),
(29, 2, 1, 3300000),
(29, 29, 1, 8800000),
(30, 15, 1, 6500000),
(30, 17, 1, 4900000),
(30, 24, 2, 5500000),
(31, 11, 1, 9800000),
(32, 13, 1, 11000000),
(33, 37, 1, 6500000),
(34, 2, 1, 3300000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `email` varchar(160) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `no_telepon`, `password`, `status`) VALUES
(1, 'administrator', 'administrator', 'admin@email.com', 'jl. administrasi', '08123456789', '5f4dcc3b5aa765d61d8327deb882cf99', 'on'),
(2, 'costumer', 'customer1', 'customer1@email.com', 'jl. txt', '08123456789', '5f4dcc3b5aa765d61d8327deb882cf99', 'on'),
(3, 'costumer', 'customer2', 'customer2@email.com', 'Jl. jalan', '081221', '5f4dcc3b5aa765d61d8327deb882cf99', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `merk_id` (`merk_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`) USING BTREE;

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `barang_id` (`barang_id`) USING BTREE,
  ADD KEY `pesanan_id` (`pesanan_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `merk_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`merk_id`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
