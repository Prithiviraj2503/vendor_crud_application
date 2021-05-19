-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 03:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendordetails`
--

CREATE TABLE `vendordetails` (
  `vendorid` int(5) NOT NULL,
  `vendorcode` varchar(30) NOT NULL,
  `vendorname` varchar(30) NOT NULL,
  `address1` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `pincode` int(10) NOT NULL,
  `contactperson` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `gstnumber` varchar(30) NOT NULL,
  `pannumber` varchar(30) NOT NULL,
  `stocktype` varchar(100) NOT NULL,
  `deliverytime` varchar(30) NOT NULL,
  `reorderlevel` varchar(30) NOT NULL,
  `minimumstock` varchar(30) NOT NULL,
  `maximumstock` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendordetails`
--

INSERT INTO `vendordetails` (`vendorid`, `vendorcode`, `vendorname`, `address1`, `address2`, `pincode`, `contactperson`, `contact`, `mailid`, `gstnumber`, `pannumber`, `stocktype`, `deliverytime`, `reorderlevel`, `minimumstock`, `maximumstock`) VALUES
(1, 'VEN0001', 'prithiviraj', '126 kamarajaburam street', 'Melathaniyam', 622002, 'Prithiviraj K', '6381268718', 'prithivirajk2503@gmail.com', '01ABCDE2345F6Z7', 'ABCDE1234F', 'apple															,Orange															,Strawberry												,Grapes											', '10', 'Yes', '100', '600'),
(2, 'VEN0002', 'Rajesh Kumar', '7G, rainbow colony', 'Covai', 622018, 'Prithiviraj K', '9876543298', 'rajesh@gmail.com', '51ABCDE2345F6Z9', 'EACBD7654G', 'Petrol,Diesel,Kerosine,Lignite', '20', 'No', '1000', '15000'),
(12, 'VEN0007', 'Name7', '132, BGT', 'Trichy', 6000012, 'Prithiviraj K', '8462121218', 'user99@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Fruits, Vegetables', '20', 'No', '200', '2000'),
(14, 'VEN0009', 'Name', '287, TVS Street', 'Trichy', 6000014, 'Prithiviraj K', '8723486324', 'user4@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Meat, Vegetables', '10', 'Medium', '400', '4000'),
(15, 'VEN0004', 'Name5', '879, RDS', 'Madurai', 6000014, 'Prithiviraj K', '9876543210', 'user5@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Cosmetics, Stationary', '11', 'No', '500', '5000'),
(16, 'VEN0010', 'Name10', '765, RDS', 'Salem', 6000015, 'Prithiviraj K', '8654973465', 'user199@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Paper, Wood', '15', 'Medium', '600', '6000'),
(17, 'VEN0003', 'Name3', '887, KVB', 'Namakkal', 6000016, 'Prithiviraj K', '9642176543', 'user752343526@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Kerosine, Petrol', '20', 'High', '700', '7000'),
(18, 'VEN0005', 'Name5', '546, TVS Street', 'Salem', 6000018, 'Prithiviraj K', '9654321876', 'nae5@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Meat, Vegetables', '23', 'High', '900', '9000'),
(19, 'VEN0006', 'Name6', '123, TVS Street', 'Chennai', 6000011, 'Prithiviraj K', '9823121218', 'user2@gmail.com', 'KGUT7733Y', '51ABCDE2345F6Z9', 'Paper, Wood', '10', 'Yes', '100', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendordetails`
--
ALTER TABLE `vendordetails`
  ADD PRIMARY KEY (`vendorid`),
  ADD UNIQUE KEY `mailid` (`mailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendordetails`
--
ALTER TABLE `vendordetails`
  MODIFY `vendorid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
