-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2015 at 10:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsaledatatracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tleavemanagement`
--

CREATE TABLE IF NOT EXISTS `tleavemanagement` (
  `ID` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tleavemanagement`
--

INSERT INTO `tleavemanagement` (`ID`, `flag`) VALUES
(2015072426, -1),
(2015072402, 0),
(2015072403, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tsalesteaminformation`
--

CREATE TABLE IF NOT EXISTS `tsalesteaminformation` (
  `id` int(11) NOT NULL,
  `TeamName` varchar(20) NOT NULL DEFAULT '',
  `TeamLeadID` int(11) DEFAULT NULL,
  `CreatedDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsalesteaminformation`
--

INSERT INTO `tsalesteaminformation` (`id`, `TeamName`, `TeamLeadID`, `CreatedDate`) VALUES
(1, 'decryptors', 201506, '2015-06-16'),
(4, 'Rangers', 201509, '2015-07-09'),
(5, 'The Elite Group', 201513, '2015-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `tteammemberinfo`
--

CREATE TABLE IF NOT EXISTS `tteammemberinfo` (
  `ID` int(11) DEFAULT NULL,
  `TeamName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tteammemberinfo`
--

INSERT INTO `tteammemberinfo` (`ID`, `TeamName`) VALUES
(201501, 'decryptors'),
(201502, 'decryptors'),
(201503, 'decryptors'),
(201505, 'decryptors'),
(201504, 'decryptors'),
(201507, 'Rangers'),
(201508, 'The Elite Group'),
(201509, 'Rangers'),
(201510, 'The Elite Group'),
(201511, 'The Elite Group'),
(201512, 'Rangers'),
(201513, 'The Elite Group'),
(201514, 'Rangers');

-- --------------------------------------------------------

--
-- Table structure for table `tuserinformations`
--

CREATE TABLE IF NOT EXISTS `tuserinformations` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `FullName` varchar(200) DEFAULT NULL,
  `EMailAddress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuserinformations`
--

INSERT INTO `tuserinformations` (`ID`, `FullName`, `EMailAddress`) VALUES
(201501, 'Vishwas Navada', 'navadavishwas@gmail.com'),
(201502, 'Laxmikanth Madhyasthna', 'laxmikanthmadhyastha.35@gmail.com'),
(201503, 'Manjuprasad Shetty N', 'manju.mpsn@gmail.com'),
(201504, 'Pallavi A', 'pallaviangraje@gmail.com'),
(201505, 'Dharmitha S Shetty', 'dsdishashetty@gmail.com'),
(201506, 'Hemanth Kumar G', 'hemanthjois@gmail.com'),
(201507, 'Dheerendra', 'Dheerendra@mail.in'),
(201508, 'Prateet', 'Prateet2001@mail.co.in'),
(201509, 'Harekrishna', 'krishnaHare@ymail.com'),
(201510, 'Mythili', 'Mythili@yahoo.co.com'),
(201511, 'Hemavati', 'Hemavati1996@rediff.com'),
(201512, 'Mahishmathi', 'Mahishemail@email.com'),
(201513, 'Devasena', 'devasena@live.com'),
(201514, 'Peter', 'iampeter@yahoomail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tuserleaveinformations`
--

CREATE TABLE IF NOT EXISTS `tuserleaveinformations` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `UserID` int(11) DEFAULT NULL,
  `LeaveStartDate` date DEFAULT NULL,
  `LeaveEndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuserleaveinformations`
--

INSERT INTO `tuserleaveinformations` (`ID`, `UserID`, `LeaveStartDate`, `LeaveEndDate`) VALUES
(2015072402, 201501, '2015-07-21', '2015-07-30'),
(2015072403, 201506, '2015-08-31', '2015-09-30'),
(2015072426, 201506, '2015-05-30', '2019-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `tuserreportingdelegation`
--

CREATE TABLE IF NOT EXISTS `tuserreportingdelegation` (
  `id` int(11) NOT NULL,
  `DelegatorsUserID` int(11) DEFAULT NULL,
  `DelegateesUserID` int(11) DEFAULT NULL,
  `DelegationStartDate` date DEFAULT NULL,
  `DelegationEndDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuserreportingdelegation`
--

INSERT INTO `tuserreportingdelegation` (`id`, `DelegatorsUserID`, `DelegateesUserID`, `DelegationStartDate`, `DelegationEndDate`) VALUES
(1, 201501, 201506, '2015-07-21', '2015-07-30'),
(2, 201502, 201503, '2015-07-21', '2016-07-25'),
(3, 201501, 201503, '2015-07-21', '2015-07-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tleavemanagement`
--
ALTER TABLE `tleavemanagement`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tsalesteaminformation`
--
ALTER TABLE `tsalesteaminformation`
  ADD PRIMARY KEY (`TeamName`), ADD UNIQUE KEY `ID` (`id`), ADD KEY `TeamLeadID` (`TeamLeadID`);

--
-- Indexes for table `tteammemberinfo`
--
ALTER TABLE `tteammemberinfo`
  ADD UNIQUE KEY `ID` (`ID`), ADD KEY `TeamName` (`TeamName`);

--
-- Indexes for table `tuserinformations`
--
ALTER TABLE `tuserinformations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tuserleaveinformations`
--
ALTER TABLE `tuserleaveinformations`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`), ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `tuserreportingdelegation`
--
ALTER TABLE `tuserreportingdelegation`
  ADD UNIQUE KEY `id` (`id`), ADD KEY `DelegatorsUserID` (`DelegatorsUserID`), ADD KEY `DelegateesUserID` (`DelegateesUserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tsalesteaminformation`
--
ALTER TABLE `tsalesteaminformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tuserreportingdelegation`
--
ALTER TABLE `tuserreportingdelegation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tleavemanagement`
--
ALTER TABLE `tleavemanagement`
ADD CONSTRAINT `tleavemanagement_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `tuserleaveinformations` (`ID`);

--
-- Constraints for table `tsalesteaminformation`
--
ALTER TABLE `tsalesteaminformation`
ADD CONSTRAINT `tsalesteaminformation_ibfk_1` FOREIGN KEY (`TeamLeadID`) REFERENCES `tuserinformations` (`ID`);

--
-- Constraints for table `tteammemberinfo`
--
ALTER TABLE `tteammemberinfo`
ADD CONSTRAINT `tteammemberinfo_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `tuserinformations` (`ID`),
ADD CONSTRAINT `tteammemberinfo_ibfk_2` FOREIGN KEY (`TeamName`) REFERENCES `tsalesteaminformation` (`TeamName`);

--
-- Constraints for table `tuserleaveinformations`
--
ALTER TABLE `tuserleaveinformations`
ADD CONSTRAINT `tuserleaveinformations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tuserinformations` (`ID`);

--
-- Constraints for table `tuserreportingdelegation`
--
ALTER TABLE `tuserreportingdelegation`
ADD CONSTRAINT `tuserreportingdelegation_ibfk_1` FOREIGN KEY (`DelegatorsUserID`) REFERENCES `tuserinformations` (`ID`),
ADD CONSTRAINT `tuserreportingdelegation_ibfk_2` FOREIGN KEY (`DelegateesUserID`) REFERENCES `tuserinformations` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
