-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2016 pada 13.38
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotation`
--
CREATE DATABASE IF NOT EXISTS `quotation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quotation`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
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
  `NPWP` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Customer_Name`, `Customer_Short_Name`, `Customer_Administrative_Address`, `Office_Phone`, `Office_Fax`, `Customer_Factory`, `Factory_Phone`, `Factory_Fax`, `Office_Email`, `Industrial_Sector`, `NPWP`) VALUES
(1, 'Test', 'tetr', 'tfsd', 'ssd', 'sds', 'dds', 'asf', 'sdf', 'ada@yahoo.com', 'asd', 'ads');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `Full_Name` varchar(50) DEFAULT NULL,
  `Short_Name` varchar(20) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Job_Position` varchar(50) DEFAULT NULL,
  `Home_Address` text,
  `Hand_Phone_1` varchar(15) DEFAULT NULL,
  `Hand_Phone_2` varchar(15) DEFAULT NULL,
  `Home_Phone` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Full_Name`, `Short_Name`, `Department`, `Job_Position`, `Home_Address`, `Hand_Phone_1`, `Hand_Phone_2`, `Home_Phone`) VALUES
(1, 'root root', 'root', 'A', 'B', 'AA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `Order_No` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `ID` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `Package_ID` varchar(225) NOT NULL,
  `Package_Name` varchar(50) DEFAULT NULL,
  `Short_Package_Name` varchar(50) DEFAULT NULL,
  `Description` text,
  `Price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`Package_ID`, `Package_Name`, `Short_Package_Name`, `Description`, `Price`, `created_at`) VALUES
('PETROLAB-29062016150654', 'Package 1', 'P1', 'Lorem ipsum dolor sit amet', 9034, '2016-06-29 16:16:36'),
('PETROLAB-29062016300622', 'oke', 'oke', 'oke', 675, '2016-06-29 16:30:32'),
('PETROLAB-03072016210745', 'A', 'AA', 'A', 3400, '2016-07-03 07:56:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation_child`
--

CREATE TABLE `quotation_child` (
  `id` int(11) NOT NULL,
  `Quotation_Number` varchar(40) NOT NULL,
  `Package_ID` varchar(225) NOT NULL,
  `Laboratory_Service_Description` longtext NOT NULL,
  `Temporary_Lab_Number` varchar(10) NOT NULL,
  `Sales_Price` double NOT NULL,
  `Sales_Quantity` double NOT NULL,
  `Discount` int(11) NOT NULL,
  `Price_Discount` int(11) NOT NULL,
  `Notes` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `quotation_child`
--

INSERT INTO `quotation_child` (`id`, `Quotation_Number`, `Package_ID`, `Laboratory_Service_Description`, `Temporary_Lab_Number`, `Sales_Price`, `Sales_Quantity`, `Discount`, `Price_Discount`, `Notes`) VALUES
(1, 'Q-1607201601100728', 'PETROLAB-29062016300622', 'up', '10', 675, 80, 8, 49680, 'up'),
(2, 'Q-1607201612360728', 'PETROLAB-29062016150654', 'up', '9790', 9034, 10, 9, 82209, 'up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation_master`
--

CREATE TABLE `quotation_master` (
  `Quotation_Number` varchar(20) NOT NULL,
  `Quotation_Date` date NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Sub_Customer_Name` varchar(100) NOT NULL,
  `Revision_Number` varchar(20) NOT NULL,
  `Analysis_Time_Agreed` date NOT NULL,
  `Sales_Department` varchar(20) NOT NULL,
  `Petrolab_PIC` varchar(11) NOT NULL,
  `Attachment_File` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `quotation_master`
--

INSERT INTO `quotation_master` (`Quotation_Number`, `Quotation_Date`, `Customer_Name`, `Sub_Customer_Name`, `Revision_Number`, `Analysis_Time_Agreed`, `Sales_Department`, `Petrolab_PIC`, `Attachment_File`) VALUES
('Q-1607201601100728', '2016-07-16', '0', '0', '9099988', '0000-00-00', '0', '0', ''),
('Q-1607201612360728', '2016-07-16', '0', '0', '80939', '0000-00-00', 'LUBRICANT', 'root', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `id_employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`, `id_employee`) VALUES
(1, 'root', 'root', 'mursit-12345', 'mumu2937412912zzzz', 'Admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_No`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`Package_ID`);

--
-- Indexes for table `quotation_child`
--
ALTER TABLE `quotation_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_master`
--
ALTER TABLE `quotation_master`
  ADD PRIMARY KEY (`Quotation_Number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_No` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation_child`
--
ALTER TABLE `quotation_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
