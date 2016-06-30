-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 04:39 
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quotation`
--
CREATE DATABASE IF NOT EXISTS `quotation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quotation`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Name` varchar(50) DEFAULT NULL,
  `Customer_Short_Name` varchar(20) DEFAULT NULL,
  `Customer_Administrative_Address` text,
  `Office_Phone` varchar(15) DEFAULT NULL,
  `Office_Fax` varchar(15) DEFAULT NULL,
  `Customer_Factory` varchar(50) DEFAULT NULL,
  `Factory_Phone` varchar(20) DEFAULT NULL,
  `Factory_Fax` varchar(15) DEFAULT NULL,
  `Office_Email` varchar(100) DEFAULT NULL,
  `Industrial_Sector` varchar(50) DEFAULT NULL,
  `NPWP` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(50) DEFAULT NULL,
  `Short_Name` varchar(20) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Job_Position` varchar(50) DEFAULT NULL,
  `Home_Address` text,
  `Hand_Phone_1` varchar(15) DEFAULT NULL,
  `Hand_Phone_2` varchar(15) DEFAULT NULL,
  `Home_Phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Full_Name`, `Short_Name`, `Department`, `Job_Position`, `Home_Address`, `Hand_Phone_1`, `Hand_Phone_2`, `Home_Phone`) VALUES
(1, 'root root', 'root', 'A', 'B', 'AA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Order_No` int(11) NOT NULL AUTO_INCREMENT,
  `Job_No` varchar(20) NOT NULL,
  `Handed_Over_To_Petrolab_By` varchar(50) NOT NULL,
  `Petrolab_Courier` int(5) DEFAULT NULL,
  `Received_By_Petrolab_CS` varchar(50) NOT NULL,
  `Receiving_Date` datetime NOT NULL,
  `Customer_Name` int(5) NOT NULL,
  `Sub_Customer_Name` int(5) DEFAULT NULL,
  `Analysis_Time_Agreed` int(5) DEFAULT NULL,
  `Sales_Department` varchar(20) DEFAULT NULL,
  `Total_Sales_Price` double DEFAULT NULL,
  `Alarm_For_Late_In_Reporting` varchar(50) DEFAULT NULL,
  `Electronic_Reporting_Date` datetime DEFAULT NULL,
  `Report_Sent_By` int(255) DEFAULT NULL,
  `Electronic_Report_Sent_By` varchar(50) DEFAULT NULL,
  `Hardcopy_Reporting_Date` datetime DEFAULT NULL,
  `Hardcopy_Report_Sent_By` varchar(20) DEFAULT NULL,
  `CS_Module_Closed_Date` datetime DEFAULT NULL,
  `CS_Module_Closed_By` varchar(50) DEFAULT NULL,
  `Alarm_For_Late_In_Invoicing` varchar(50) DEFAULT NULL,
  `Invoice_Number` varchar(50) DEFAULT NULL,
  `PO_Number` varchar(50) DEFAULT NULL,
  `PR_Number` varchar(50) DEFAULT NULL,
  `Electronic_Invoice_Date` datetime DEFAULT NULL,
  `Electronic_Invoice_Sent_By` int(5) DEFAULT NULL,
  `Hardcopy_Invoice_Date` datetime DEFAULT NULL,
  `Hardcopy_Invoice_Sent_By` int(5) DEFAULT NULL,
  `Payment_Term_Agreement` varchar(20) DEFAULT NULL,
  `Payment_Due_Date` datetime DEFAULT NULL,
  `Payment_Alarm` varchar(50) DEFAULT NULL,
  `Payment_Received_Date` datetime DEFAULT NULL,
  `Method_Of_Payment` varchar(20) DEFAULT NULL,
  `Finance_Completion_Date` datetime DEFAULT NULL,
  `Complete_Confirmation_By` varchar(20) DEFAULT NULL,
  `Lab_Report_ID` varchar(50) DEFAULT NULL,
  `Lab_Report_Release_Date` datetime DEFAULT NULL,
  `Lab_Report_Released_By` int(5) DEFAULT NULL,
  `Lab_Note` text,
  `Lab_Manager_Approval` enum('N','Y') DEFAULT 'N',
  `Lab_Manager_Note` text,
  `Kode_Nomor_Seri_Faktur_Pajak` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Order_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Order_No` int(11) NOT NULL,
  `Package_ID` int(11) NOT NULL,
  `Sample_ID` varchar(20) NOT NULL,
  `Laboratory_Service_Description` text NOT NULL,
  `Notes` text,
  `Sales_Price` decimal(10,0) NOT NULL,
  `Sales_Quantity` int(5) NOT NULL,
  `Total_Sales` decimal(10,0) DEFAULT NULL,
  `Tanggal_Analisa` datetime DEFAULT NULL,
  `Site` varchar(50) DEFAULT NULL,
  `Nomor_PK` varchar(20) DEFAULT NULL,
  `Unit_Number` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `Package_ID` varchar(225) NOT NULL,
  `Package_Name` varchar(50) DEFAULT NULL,
  `Short_Package_Name` varchar(50) DEFAULT NULL,
  `Description` text,
  `Price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Package_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Package_ID`, `Package_Name`, `Short_Package_Name`, `Description`, `Price`, `created_at`) VALUES
('PETROLAB-29062016150654', 'Package 1', 'P1', 'Lorem ipsum dolor sit amet', 9034, '2016-06-29 16:16:36'),
('PETROLAB-29062016300622', 'oke', 'oke', 'oke', 675, '2016-06-29 16:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_child`
--

CREATE TABLE IF NOT EXISTS `quotation_child` (
  `Quotation_Number` varchar(20) NOT NULL,
  `Package_ID` int(11) NOT NULL,
  `Laboratory_Service_Description` longtext NOT NULL,
  `Temporary_Lab_Number` varchar(10) NOT NULL,
  `Sales_Price` double NOT NULL,
  `Sales_Quantity` double NOT NULL,
  `Notes` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_master`
--

CREATE TABLE IF NOT EXISTS `quotation_master` (
  `Quotation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Quotation_Number` varchar(20) NOT NULL,
  `Quotation_Date` date NOT NULL,
  `Customer_Name` int(5) NOT NULL,
  `Sub_Customer_Name` int(5) NOT NULL,
  `Revision_Number` varchar(20) NOT NULL,
  `Analysis_Time_Agreed` date NOT NULL,
  `Sales_Department` varchar(20) NOT NULL,
  `Petrolab_PIC` int(11) NOT NULL,
  `Attachment_File` text NOT NULL,
  PRIMARY KEY (`Quotation_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `id_employee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`, `id_employee`) VALUES
(1, 'root', 'root', 'mursit-12345', 'mumu2937412912zzzz', 'Admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
