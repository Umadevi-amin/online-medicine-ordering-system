-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 02:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `zip_code`, `country`) VALUES
(34, 'Ambadas H Kulkarni', 'beside astalaxmi temple,maruti colony', 'Bijapur', '586102', 'India'),
(35, 'Vijayalaxmi', 'VIJAYALAXMI GUGAWAD,', 'Bijapur', '586103', 'Malaysia'),
(36, 'Rani', 'nearasramroadvijayapur', 'vijapur', '586103', 'Malaysia'),
(37, 'Vijayalaxmi', 'MARUTI COLONY', 'Bijapur', '586103', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturerid` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturerid`, `manufacturer_name`) VALUES
(8, 'Cipla'),
(9, 'Pfizer'),
(10, 'ACTIZA');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `med_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `med_name` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `supplier_name` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `med_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `med_descr` text COLLATE latin1_general_ci,
  `med_price` decimal(6,2) NOT NULL,
  `manufacturerid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`med_id`, `med_name`, `supplier_name`, `med_image`, `med_descr`, `med_price`, `manufacturerid`) VALUES
('1', 'Paracetamol', 'Sri Krishna Pharma Ltd', 'cefexime-ofloxacin-500x500.jpg', 'Paracetamol, also known as acetaminophen and APAP, is a medication used to treat pain and fever. It is typically used for mild to moderate pain relief. There is mixed evidence for its use to relieve fever in children. It is often sold in combination with other medications, such as in many cold medications', '35.00', 8),
('1357', 'Migraine', 'India Drug store', '1357.jpg', 'Does not contain: aspirin\r\nThis product is manufactured in united states\r\nProvides relief from the symptoms of migraine headaches.All Natural formula Non-Habit Forming Aspirin and Acetaminophen Free Can be used in conjunction with other medications.', '40.00', 10),
('2', 'Dimetapp', 'Indian Drug Distributors', '592401_1_.jpg', 'Dimetapp is a brand of over-the-counter cold and allergy medicines manufactured by Pfizer. At one point, Dimetapp as a household word referred to a single combination preparation marketed to relieve symptoms of the common cold, containing brompheniramine and phenylephrine.', '50.00', 9),
('3', 'Trifluoperazin', 'Lifetex Medical Systems (P) Ltd.', 'Trifluoperazin.jpg', 'Trifluoperazine is a typical antipsychotic primarily used to treat schizophrenia. It may also be used short term in those with generalized anxiety disorder but is less preferred to benzodiazepines. It is of the phenothiazine chemical class.', '100.00', 10),
('4', 'Nodard Plus', 'Collateral Medical Pvt Ltd', '1273.jpg', 'Nodard Plus Tablet is a combination medicine used in relieving pain and fever. It is used in many conditions such as muscle pain, back pain, toothache etc. It works by blocking the release of certain chemical messengers that cause pain, inflammation and fever.', '42.00', 8),
('5', 'Benadryl Cough Syrup', 'Modern Times', 'benadryl-syrup-500x500.jpg', 'Benadryl Syrup is used to treat cough and it relieves sneezing, runny nose, itching, watery eyes, hives, rashes, and other symptoms of allergies. It thins, loosens and decreases the stickiness of phlegm and helps in its removal from the airways.', '80.00', 9),
('6', 'Minoxidil topical solution usp 5', 'Drugs India', 'd0ed41f9-2378-40bb-9fb3-eb9098269f53.jpg', 'Minoxidil solution and foam are used to help hair growth in the treatment of male pattern baldness. It is not used for baldness at the front of the scalp or receding hairline in men.', '700.00', 10),
('7', 'Aspirin 81', 'Indian Drug Distributors', '450.jpg', 'Aspirin is used to reduce fever and relieve mild to moderate pain from conditions such as muscle aches, toothaches, common cold, and headaches. It may also be used to reduce pain and swelling in conditions such as arthritis. Aspirin is known as a salicylate and a nonsteroidal anti-inflammatory drug (NSAID). It works by blocking a certain natural substance in your body to reduce pain and swelling. Consult your doctor before treating a child younger than 12 years.', '3000.00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `ship_name`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(36, 34, '3080.00', '2019-11-11 13:14:35', 'Ambadas H Kulkarni', 'beside astalaxmi temple,maruti colony', 'Bijapur', '586102', 'India'),
(37, 35, '130.00', '2019-11-13 04:35:40', 'Vijayalaxmi', 'VIJAYALAXMI GUGAWAD,', 'Bijapur', '586103', 'Malaysia'),
(38, 36, '70.00', '2019-11-13 04:53:12', 'Rani', 'nearasramroadvijayapur', 'vijapur', '586103', 'Malaysia'),
(39, 37, '70.00', '2019-11-14 10:13:54', 'Vijayalaxmi', 'MARUTI COLONY', 'Bijapur', '586103', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `med_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `med_id`, `item_price`, `quantity`) VALUES
(36, '5', '80.00', 1),
(36, '7', '3000.00', 1),
(37, '2', '50.00', 1),
(37, '5', '80.00', 1),
(38, '1', '35.00', 2),
(39, '1', '35.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(9, 'Shashikiran', 'shashikirankulkarni@gmail.com', '0ba7eb271f1f205847be1a5341ac0914', '9900496736', 'Bijapur', 'Maruti colony'),
(10, 'vijayalaxmi', 'vijugugawad1999@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9110881273', 'Bijapur', 'VIJAYALAXMI GUGAWAD,'),
(11, 'Rani', 'ranibhuyyar1999@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '7349092418', 'Vijayapur', 'nearashranroadvijayapur'),
(12, 'AMBADAS H KULKARNI', 'ahkulkarnisir@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9341926487', 'Bijapur', 'MARUTI NAGAR BIJAPUR,, Bijapur,, Karnataka,, pincode: 586103');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`,`pass`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturerid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `publisherid` (`manufacturerid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `orderid` (`orderid`),
  ADD KEY `med_id` (`med_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_ibfk_1` FOREIGN KEY (`manufacturerid`) REFERENCES `manufacturer` (`manufacturerid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medicines` (`med_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
