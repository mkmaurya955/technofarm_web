-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 12:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `technofarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE IF NOT EXISTS `chemicals` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`id`, `pname`, `quantity`, `price`, `rdate`, `edate`) VALUES
(1, 'osho herbicides', 20, 1500, '2015-05-06', '2015-05-06'),
(2, 'Fungicide', 15, 400, '2015-05-04', '2015-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE IF NOT EXISTS `fertilizers` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`id`, `description`, `quantity`, `price`, `date`, `category`) VALUES
(1, 'DaP', 70, 4500, '2015-05-04', 'Nitrogen Fertilizers'),
(2, 'Ammonia', 40, 3700, '2015-05-04', 'Blended Fertilizers');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `truck` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `type`, `quantity`, `price`, `date`, `truck`) VALUES
(1, 'Diesel', 1500, 120, '2015-05-04', 'KBA 415S');

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE IF NOT EXISTS `harvest` (
  `id` int(11) NOT NULL,
  `acreage` int(11) NOT NULL,
  `machinery` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `fuel` int(11) NOT NULL,
  `yields` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE IF NOT EXISTS `machinery` (
  `id` int(11) NOT NULL,
  `snumber` varchar(12) NOT NULL,
  `pname` text NOT NULL,
  `category` text NOT NULL,
  `pdate` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`id`, `snumber`, `pname`, `category`, `pdate`, `price`) VALUES
(1, '10120', 'Massey Furgeson', 'Tractors', '2015-05-05', 150000),
(2, '3460', 'John Deere Harvester', 'Harvestors', '2015-05-04', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE IF NOT EXISTS `plant` (
  `id` int(11) NOT NULL,
  `acreage` int(11) NOT NULL,
  `fertilizers` int(11) NOT NULL,
  `date` date NOT NULL,
  `fuel` int(11) NOT NULL,
  `seeds` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE IF NOT EXISTS `seeds` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`id`, `description`, `quantity`, `price`, `date`, `category`) VALUES
(1, 'Durum Wheat', 20, 3000, '2015-05-04', 'Bread Wheat'),
(2, 'Baley', 15, 3500, '2015-05-04', 'Durum Wheat');

-- --------------------------------------------------------

--
-- Table structure for table `spray`
--

CREATE TABLE IF NOT EXISTS `spray` (
  `id` int(11) NOT NULL,
  `acreage` int(11) NOT NULL,
  `machine` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `chemicals` int(11) NOT NULL,
  `fuel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spray`
--

INSERT INTO `spray` (`id`, `acreage`, `machine`, `date`, `chemicals`, `fuel`) VALUES
(1, 11, 'KBA 230C', '2015-05-04', 20, 30),
(1, 11, 'KBA 230C', '2015-05-04', 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `till`
--

CREATE TABLE IF NOT EXISTS `till` (
  `id` int(11) NOT NULL,
  `acreage` int(11) NOT NULL,
  `tractor` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `fuel` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `till`
--

INSERT INTO `till` (`id`, `acreage`, `tractor`, `date`, `fuel`, `type`) VALUES
(1, 15, 'KBA 130K', '2015-05-04', 40, 'Plowing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `idno` int(11) NOT NULL,
  `email` text NOT NULL,
  `tel` varchar(10) NOT NULL,
  `county` text NOT NULL,
  `district` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `category` text NOT NULL,
  `date` date NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `idno`, `email`, `tel`, `county`, `district`, `password`, `category`, `date`, `gender`) VALUES
(1, 'Kiplangat', 'Duncan', 28635582, 'kiplangatdan@gmail.com', '0729164119', 'Buret', 'Kericho', '1228', 'Store Clerk', '2015-05-04', 'Male'),
(2, 'Moses', 'Shitote', 12345678, 'shitmoz@gmail.com', '0702129210', 'Kakamega', 'Bungoma', '1234', 'Garage Attendant', '2015-05-04', 'Male'),
(3, 'Dan', 'Bailyor', 1228, 'bailyor@kip.com', '0711242797', 'Mombasa', 'Mikindani', '1228', 'Store Clerk', '2015-05-04', 'Male'),
(4, 'Jane', 'Jolie', 1201, 'jane@outlook.com', '0712891292', 'Kisumu', 'Kondele', '1201', 'Field Operator', '2015-05-04', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
