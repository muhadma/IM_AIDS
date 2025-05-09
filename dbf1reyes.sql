-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 01:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbf1reyes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbeneficiary`
--

CREATE TABLE `tblbeneficiary` (
  `beneficiary_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbeneficiary`
--

INSERT INTO `tblbeneficiary` (`beneficiary_id`, `uid`, `address`) VALUES
(3, 13, '123 Charity St, Manila'),
(4, 17, '456 Relief Ave, Cebu'),
(5, 20, '789 Bayanihan Rd, Davao'),
(6, 24, '321 Hope Blvd, Baguio'),
(7, 29, 'Talisay City'),
(8, 32, 'Secret, Mo adto pa nya ka'),
(9, 37, 'Secret, Mo adto pa nya ka');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonator`
--

CREATE TABLE `tbldonator` (
  `donator_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `amount` double DEFAULT NULL,
  `donation_type` enum('Cash','Goods','Medicine','Supplies') DEFAULT 'Cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldonator`
--

INSERT INTO `tbldonator` (`donator_id`, `uid`, `organization`, `amount`, `donation_type`) VALUES
(1, 14, 'Hope Foundation', 5000, 'Cash'),
(2, 15, 'Save Lives Org', 3000, 'Goods'),
(3, 16, 'Helping Hands', 1500, 'Medicine'),
(4, 17, 'Community Aid', 2000, 'Supplies'),
(5, 18, 'Health for All', 4000, 'Cash'),
(6, 19, 'Relief Team', 2500, 'Goods'),
(7, 20, 'Charity for Children', 3500, 'Supplies'),
(8, 21, 'Benevolent Hearts', 6000, 'Cash'),
(9, 33, 'Secret', NULL, 'Cash'),
(10, 34, 'hgfds', NULL, 'Cash'),
(11, 35, 'Jeje', NULL, 'Cash'),
(12, 35, '', 56700, 'Cash'),
(13, 36, 'gfd', NULL, 'Cash'),
(14, 36, '', 23000, ''),
(15, 36, '', 2000, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `employee_id` int(11) NOT NULL,
  `salary` double NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`employee_id`, `salary`, `uid`) VALUES
(4, 40000, 15),
(5, 42000, 18),
(6, 38000, 22),
(10, 100000, 28),
(11, 99987, 30),
(12, 87654, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tblrecieved`
--

CREATE TABLE `tblrecieved` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `donator_id` int(11) NOT NULL,
  `urgency` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `tblrecieved`
--

INSERT INTO `tblrecieved` (`rid`, `uid`, `donator_id`, `urgency`) VALUES
(1, 37, 1, NULL),
(2, 37, 5, NULL),
(3, 37, 8, NULL),
(4, 37, 9, NULL),
(5, 37, 10, NULL),
(6, 37, 11, NULL),
(7, 37, 12, NULL),
(8, 37, 13, NULL),
(9, 37, 3, NULL),
(10, 37, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `uid` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_employee` tinyint(1) DEFAULT NULL,
  `is_beneficiary` tinyint(1) DEFAULT NULL,
  `is_donator` tinyint(1) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `fname`, `lname`, `password`, `is_employee`, `is_beneficiary`, `is_donator`, `username`, `date_created`, `date_modified`) VALUES
(13, 'Ben', 'Cruz', '1d4598d1949b47f7f211134b639ec32238ce73086a83c2f745713b3f12f817e5', 0, 1, 0, 'ben_cruz', '2025-05-06', '2025-05-06'),
(14, 'Dana', 'Lopez', '0c8bd057cfd39a58ad863323619fffb282b7de764a26f9a5d2b89a0b17cc7257', 0, 0, 1, 'dana_lopez', '2025-05-06', '2025-05-06'),
(15, 'Ethan', 'Garcia', '1490fce0a2729eb6df2697a700e1c67e63cf3e047096c09800f5683f9b334fd3', 1, 0, 0, 'ethan_g', '2025-05-06', '2025-05-06'),
(16, 'Faith', 'Reyes', '5f36cf8fc7f8b0589825a11f204396f3cc4db195197ecf42c0a2d7177d797186', 0, 0, 1, 'faith_rey', '2025-05-06', '2025-05-06'),
(17, 'George', 'Lim', 'e8ad1df23a9cfa0a1f45401fdfeecc415b924b46cd367ae86ee6e1ab940eb57b', 0, 1, 0, 'george_lim', '2025-05-06', '2025-05-06'),
(18, 'Hannah', 'De Vera', '7fd29712e32c2d0412e3804b3ef27718a3014c9dee325c3664b617f4310dfb24', 1, 0, 0, 'hannah_dv', '2025-05-06', '2025-05-06'),
(19, 'Ivan', 'Mercado', '0fc828119a6f0be48f4a0082853252471c9e7887fdfb9407a24ed8237dd2ce4e', 0, 0, 1, 'ivan_m', '2025-05-06', '2025-05-06'),
(20, 'Julia', 'Navarro', '5d2f0b9dd1123514f39b9ffc0af5e9aec33bfdb5b560e620c71a262a47f790a3', 0, 1, 0, 'julia_nav', '2025-05-06', '2025-05-06'),
(21, 'Kevin', 'Santos', '16da6b5c6874b8ed2adfb9b5378797cb451d54dda9606484624eb05ace01063e', 0, 0, 1, 'kevin_s', '2025-05-06', '2025-05-06'),
(22, 'Lara', 'Mendoza', '4c59f5e0b4f5f4c0e8af97dc23e87f524afbfb5120c232029884daa6287e2efc', 1, 0, 0, 'lara_m', '2025-05-06', '2025-05-06'),
(23, 'Marco', 'Villanueva', 'c07f92f7d674d0470cb2c631f70c25022e0b52e747b2b67120504d9a54f1a4bb', 0, 0, 1, 'marco_v', '2025-05-06', '2025-05-06'),
(24, 'Nina', 'Ramos', '09e10ba28dcebef4afe87ebdf88945c11593f54b06070acee21c22cea1977aec', 0, 1, 0, 'nina_r', '2025-05-06', '2025-05-06'),
(28, 'harley', 'reyes', '$2y$10$04A92Z6j2fAcUZydbsb4YO16LcLKJZb6a0ADlXz8CFC4wpZnpXIGi', 1, 0, 0, 'harley', '2025-05-07', '2025-05-07'),
(29, 'earl', 'echavez', '$2y$10$zT1msYFaj8ap9puIht0.BePXBB046Wla90a63mSSLY5Czr14.uWFW', 0, 1, 0, 'earl', '2025-05-07', '2025-05-07'),
(30, 'kjhfds', 'uyufg', '$2y$10$hA78j5qI/lJe/k5GTYEt3u3c9U0IWEb0qcZWFJUZkIjvMIiKR5Udm', 1, 0, 0, 'ggdfsfsfd', '2025-05-08', '2025-05-08'),
(31, 'Me', 'Me', '$2y$10$FWYVWMudTmDZW0hrJdFgr.K7xSU.vDokmiVyVSMd6Qweh3tr98pEe', 1, 0, 0, 'Meme', '2025-05-08', '2025-05-08'),
(32, 'Haha', 'Haha', '$2y$10$aOy5WLORw0he1JaxYERNwOef.wRzAW9VPBR.sMx1ybvD3czXGz5uW', 0, 1, 0, 'Ehe', '2025-05-08', '2025-05-08'),
(33, 'John', 'Ode', '$2y$10$IGLN.TJgwJhOa18fcu7koubiGXVXRNy3VkshVkJN.eMOOJXXuzInq', 0, 0, 1, 'Lol', '2025-05-08', '2025-05-08'),
(34, 'ramil', 'gfd', '$2y$10$EQVVf.FCEd8z6p22P0veJ.dn9D4V54n2QCZWXAzlWDWOE71P6xnRK', 0, 0, 1, 'Eheg', '2025-05-08', '2025-05-08'),
(35, 'Peter', 'Pan', '$2y$10$7n2YYY3WS8Yu5OxpdjQImuLYWCBeXU8vWaf7pGLseT2DwY951hjkC', 0, 0, 1, 'Peter', '2025-05-08', '2025-05-08'),
(36, 'julian', 'ands', '$2y$10$z7owPeTSj9.G1nPy.TstUeLNKQUJWjEVeHPeZyEYQeSRO.iXCs2oa', 0, 0, 1, 'juls', '2025-05-08', '2025-05-08'),
(37, 'Mike', 'Rama', '$2y$10$Z08vhKp4eK9Zgk/AsuBsj.BZgTmLoLwO32Vu7SRfxfdKlWAmSHi4i', 0, 1, 0, 'Tehee', '2025-05-08', '2025-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbeneficiary`
--
ALTER TABLE `tblbeneficiary`
  ADD PRIMARY KEY (`beneficiary_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbldonator`
--
ALTER TABLE `tbldonator`
  ADD PRIMARY KEY (`donator_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tblrecieved`
--
ALTER TABLE `tblrecieved`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbeneficiary`
--
ALTER TABLE `tblbeneficiary`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbldonator`
--
ALTER TABLE `tbldonator`
  MODIFY `donator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblrecieved`
--
ALTER TABLE `tblrecieved`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbeneficiary`
--
ALTER TABLE `tblbeneficiary`
  ADD CONSTRAINT `tblbeneficiary_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`);

--
-- Constraints for table `tbldonator`
--
ALTER TABLE `tbldonator`
  ADD CONSTRAINT `tbldonator_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`);

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `tblemployee_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
