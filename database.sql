-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 10:00 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TableSpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID_Customer` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_Customer`),
  KEY `ID_Customer` (`ID_Customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID_Customer`, `Firstname`, `Lastname`, `Phone`, `Email`, `Password`) VALUES
(1, 'test', 'klant', 2147483647, 'test@klant.be', '9c7ae8cd039e70c2d42fd950356004f9');

-- --------------------------------------------------------

--
-- Table structure for table `gerecht`
--

CREATE TABLE `gerecht` (
  `ID_Gerecht` int(11) NOT NULL AUTO_INCREMENT,
  `Gerecht` varchar(400) NOT NULL,
  `Prijs` int(10) NOT NULL,
  `FK_Menu_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Gerecht`),
  KEY `FK_Menu_ID` (`FK_Menu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_Menu` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Discription` varchar(1000) NOT NULL,
  `FK_Restaurants_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Menu`),
  KEY `FK_Restaurants_ID` (`FK_Restaurants_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `openinghours`
--

CREATE TABLE `openinghours` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Dag` varchar(255) NOT NULL,
  `OpenHour` time NOT NULL,
  `CloseHour` time NOT NULL,
  `Status` int(11) NOT NULL,
  `FK_restaurants_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `openinghours`
--

INSERT INTO `openinghours` (`ID`, `Dag`, `OpenHour`, `CloseHour`, `Status`, `FK_restaurants_ID`) VALUES
(1, 'Monday', '11:30:00', '18:00:00', 0, 33),
(2, 'Tuesday', '11:30:00', '18:00:00', 0, 33),
(3, 'Wednesday', '11:30:00', '18:00:00', 0, 33),
(4, 'Thursday', '11:30:00', '18:00:00', 0, 33),
(5, 'Friday', '11:30:00', '18:00:00', 0, 33),
(6, 'Saturday', '11:30:00', '18:00:00', 0, 33),
(7, 'Sunday', '11:30:00', '18:00:00', 0, 33),
(8, 'Monday', '00:00:00', '00:00:00', 1, 34),
(9, 'Tuesday', '11:30:00', '18:00:00', 0, 34),
(10, 'Wednesday', '11:30:00', '20:00:00', 0, 34),
(11, 'Thursday', '11:30:00', '18:00:00', 0, 34),
(12, 'Friday', '11:30:00', '18:00:00', 0, 34),
(13, 'Saturday', '00:00:00', '00:00:00', 1, 34),
(14, 'Sunday', '11:30:00', '18:00:00', 0, 34),
(15, 'Monday', '00:00:00', '18:00:00', 0, 35),
(16, 'Tuesday', '11:30:00', '18:00:00', 0, 35),
(17, 'Wednesday', '11:30:00', '18:00:00', 0, 35),
(18, 'Thursday', '11:30:00', '18:00:00', 0, 35),
(19, 'Friday', '11:30:00', '18:00:00', 0, 35),
(20, 'Saturday', '11:30:00', '18:00:00', 0, 35),
(21, 'Sunday', '11:30:00', '18:00:00', 0, 35),
(22, 'Monday', '00:00:00', '18:00:00', 0, 36),
(23, 'Tuesday', '11:30:00', '18:00:00', 0, 36),
(24, 'Wednesday', '11:30:00', '18:00:00', 0, 36),
(25, 'Thursday', '11:30:00', '18:00:00', 0, 36),
(26, 'Friday', '11:30:00', '18:00:00', 0, 36),
(27, 'Saturday', '11:30:00', '18:00:00', 0, 36),
(28, 'Sunday', '11:30:00', '18:00:00', 0, 36),
(29, 'Monday', '00:00:00', '18:00:00', 0, 37),
(30, 'Tuesday', '11:30:00', '18:00:00', 0, 37),
(31, 'Wednesday', '11:30:00', '18:00:00', 0, 37),
(32, 'Thursday', '11:30:00', '18:00:00', 0, 37),
(33, 'Friday', '11:30:00', '18:00:00', 0, 37),
(34, 'Saturday', '11:30:00', '18:00:00', 0, 37),
(35, 'Sunday', '11:30:00', '18:00:00', 0, 37),
(36, 'Monday', '00:00:00', '00:00:00', 1, 38),
(37, 'Tuesday', '11:30:00', '11:00:00', 0, 38),
(38, 'Wednesday', '11:30:00', '10:00:00', 0, 38),
(39, 'Thursday', '11:30:00', '18:00:00', 0, 38),
(40, 'Friday', '11:30:00', '18:00:00', 0, 38),
(41, 'Saturday', '11:30:00', '18:00:00', 0, 38),
(42, 'Sunday', '11:30:00', '18:00:00', 0, 38),
(43, 'Monday', '00:00:00', '18:00:00', 0, 39),
(44, 'Tuesday', '11:30:00', '18:00:00', 0, 39),
(45, 'Wednesday', '11:30:00', '18:00:00', 0, 39),
(46, 'Thursday', '11:30:00', '18:00:00', 0, 39),
(47, 'Friday', '11:30:00', '18:00:00', 0, 39),
(48, 'Saturday', '11:30:00', '18:00:00', 0, 39),
(49, 'Sunday', '11:30:00', '18:00:00', 0, 39);

-- --------------------------------------------------------

--
-- Table structure for table `placing`
--

CREATE TABLE `placing` (
  `ID_Placing` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Actif` int(1) NOT NULL,
  `FK_Restaurant_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Placing`),
  KEY `FK_Restaurant_ID` (`FK_Restaurant_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `placing`
--

INSERT INTO `placing` (`ID_Placing`, `Name`, `Actif`, `FK_Restaurant_ID`) VALUES
(1, 'ZondagAvond opstelling', 0, 2),
(9, 'Zomer', 1, 2),
(10, 'Vacation Arrangement', 0, 3),
(11, 'Busy weekdays', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID_Resevation` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `AmountPeople` int(255) NOT NULL,
  `FK_Customer_ID` int(11) NOT NULL,
  `FK_Table_ID` int(11) NOT NULL,
  `FK_Restaurant_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Resevation`),
  KEY `FK_Customer_ID` (`FK_Customer_ID`),
  KEY `FK_Table_ID` (`FK_Table_ID`),
  KEY `FK_Restaurant_ID` (`FK_Restaurant_ID`),
  KEY `FK_Customer_ID_2` (`FK_Customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID_Resevation`, `Date`, `Time`, `AmountPeople`, `FK_Customer_ID`, `FK_Table_ID`, `FK_Restaurant_ID`) VALUES
(44, '2014-05-14', '16:00:00', 3, 1, 10, 2),
(45, '2014-05-14', '16:00:00', 3, 1, 10, 2),
(46, '2014-05-14', '16:00:00', 3, 1, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `ID_Restaurant` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `FK_Keeper_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Restaurant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`ID_Restaurant`, `Name`, `Discription`, `Categorie`, `FK_Keeper_ID`) VALUES
(2, 'Onsgedacht', 'lekker', 'chinees', 1),
(3, 'Vleesindustrie', 'vlees van de beste kwaliteit', 'vlees', 2),
(4, 'Frituur Mark', 'Best french fries in the world', 'fastfood', 2),
(34, 'Mc Donalds', 'Not quick', 'Fastfood', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_keeper`
--

CREATE TABLE `restaurant_keeper` (
  `ID_Keeper` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_Keeper`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `restaurant_keeper`
--

INSERT INTO `restaurant_keeper` (`ID_Keeper`, `Firstname`, `Lastname`, `Email`, `Password`) VALUES
(1, 'Hannes', 'Verdoodt', 'hannesverdoodt@gmail.com', '1b814575ac90d8723b10206e95189def'),
(2, 'test', 'houder', 'test@houder.be', '9c7ae8cd039e70c2d42fd950356004f9');

-- --------------------------------------------------------

--
-- Table structure for table `tablesspots`
--

CREATE TABLE `tablesspots` (
  `ID_Table` int(11) NOT NULL AUTO_INCREMENT,
  `Status` int(1) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Place` int(255) NOT NULL,
  `FK_Placing_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Table`),
  KEY `FK_Placing_ID` (`FK_Placing_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tablesspots`
--

INSERT INTO `tablesspots` (`ID_Table`, `Status`, `Time`, `Date`, `Place`, `FK_Placing_ID`) VALUES
(1, 1, '18:52:35', '2014-04-23', 8, 1),
(2, 0, '18:52:35', '2014-04-23', 8, 1),
(3, 1, '18:52:35', '2014-04-23', 8, 1),
(4, 0, '18:52:35', '2014-04-23', 8, 1),
(5, 0, '00:00:00', '0000-00-00', 5, 0),
(6, 0, '00:00:00', '0000-00-00', 4, 0),
(7, 0, '00:00:00', '0000-00-00', 2, 0),
(8, 0, '00:00:00', '0000-00-00', 5, 0),
(9, 0, '00:00:00', '0000-00-00', 4, 0),
(10, 1, '00:00:00', '0000-00-00', 4, 9),
(11, 0, '00:00:00', '0000-00-00', 3, 9),
(12, 0, '00:00:00', '0000-00-00', 5, 9),
(13, 0, '00:00:00', '0000-00-00', 2, 9),
(14, 0, '00:00:00', '0000-00-00', 1, 9),
(15, 0, '00:00:00', '0000-00-00', 4, 10),
(16, 0, '00:00:00', '0000-00-00', 3, 10),
(17, 0, '00:00:00', '0000-00-00', 2, 10),
(18, 0, '00:00:00', '0000-00-00', 1, 10),
(19, 0, '00:00:00', '0000-00-00', 4, 10),
(20, 0, '00:00:00', '0000-00-00', 5, 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gerecht`
--
ALTER TABLE `gerecht`
  ADD CONSTRAINT `gerecht_ibfk_1` FOREIGN KEY (`FK_Menu_ID`) REFERENCES `menu` (`ID_Menu`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`FK_Restaurants_ID`) REFERENCES `restaurants` (`ID_Restaurant`);

--
-- Constraints for table `placing`
--
ALTER TABLE `placing`
  ADD CONSTRAINT `placing_ibfk_1` FOREIGN KEY (`FK_Restaurant_ID`) REFERENCES `restaurants` (`ID_Restaurant`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`FK_Table_ID`) REFERENCES `tablesspots` (`ID_Table`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`FK_Restaurant_ID`) REFERENCES `restaurants` (`ID_Restaurant`);
