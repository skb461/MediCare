-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 07:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MediCare`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dispensaries`
--

CREATE TABLE `Dispensaries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dispensaries`
--

INSERT INTO `Dispensaries` (`id`, `name`, `address`) VALUES
(1, 'Central Pharmacy', '123 Main Street, Dhaka'),
(2, 'Rajshahi Health Center', '45 College Road, Rajshahi'),
(3, 'Barishal Medical Store', '78 Hospital Road, Barishal'),
(4, 'Rangpur Dispensary', '34 Ring Road, Rangpur'),
(5, 'Dhaka City Pharmacy', '67 Mirpur Road, Dhaka'),
(6, 'Green Life Dispensary', '56 Green Road, Dhaka'),
(7, 'Sylhet Pharmacy Hub', '101 Sylhet Avenue, Sylhet'),
(8, 'Chattogram Health Mart', '23 Bay View Road, Chattogram');

-- --------------------------------------------------------

--
-- Table structure for table `HomeDelivery`
--

CREATE TABLE `HomeDelivery` (
  `id` int(11) NOT NULL,
  `hname` varchar(255) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `haddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `HomeDelivery`
--

INSERT INTO `HomeDelivery` (`id`, `hname`, `nid`, `phone`, `email`, `haddress`) VALUES
(1, 'Sakib Hasan', '1960483764', '01757569074', 'hasansakib461@gmail.com', 'Niribily, Savar, Dhaka'),
(2, 'Sakib Hasan', '1960483764', '01757569074', 'hasansakib461@gmail.com', 'Niribily, Savar, Dhaka'),
(3, 'meem', '1960483765', '01521366612', 'meem@g.com', 'ajkdfhgvakshjCLKJBCS');

-- --------------------------------------------------------

--
-- Table structure for table `Medicines`
--

CREATE TABLE `Medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `is_most_ordered` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Medicines`
--

INSERT INTO `Medicines` (`id`, `name`, `price`, `available_quantity`, `is_most_ordered`) VALUES
(1, 'Napa', 5.00, 1000, 1),
(2, 'Paracetamol', 3.50, 500, 1),
(3, 'Cetrizine', 7.00, 300, 0),
(4, 'Aspirin', 10.00, 200, 1),
(5, 'Ranitidine', 15.00, 150, 0),
(6, 'Amoxicillin', 25.00, 80, 0),
(7, 'Vitamin', 12.00, 600, 1),
(8, 'Ibuprofen', 20.00, 250, 1),
(9, 'Antacid', 8.00, 400, 0),
(10, 'Azithromycin', 30.00, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `OrderMedicines`
--

CREATE TABLE `OrderMedicines` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderMedicines`
--

INSERT INTO `OrderMedicines` (`id`, `order_id`, `medicine_name`, `amount`) VALUES
(1, 2, 'napa', 3),
(2, 2, 'histacin', 8),
(3, 3, 'VITAMIN', 2),
(4, 3, 'napa', 5),
(5, 3, 'hexasol', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dispensaries`
--
ALTER TABLE `Dispensaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `HomeDelivery`
--
ALTER TABLE `HomeDelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Medicines`
--
ALTER TABLE `Medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OrderMedicines`
--
ALTER TABLE `OrderMedicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dispensaries`
--
ALTER TABLE `Dispensaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `HomeDelivery`
--
ALTER TABLE `HomeDelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Medicines`
--
ALTER TABLE `Medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `OrderMedicines`
--
ALTER TABLE `OrderMedicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `OrderMedicines`
--
ALTER TABLE `OrderMedicines`
  ADD CONSTRAINT `ordermedicines_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `HomeDelivery` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
