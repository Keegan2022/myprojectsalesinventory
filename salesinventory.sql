-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 02:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_full_names` varchar(50) NOT NULL,
  `admin_phone_number` varchar(50) NOT NULL,
  `admin_email_address` varchar(50) NOT NULL,
  `admin_login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_full_names`, `admin_phone_number`, `admin_email_address`, `admin_login_id`) VALUES
(1, 'admin main check', '0788998877', 'admin@gmail.com', 2),
(2, 'admi two', '0722991100', 'updatde@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_location` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_location`, `customer_email`, `customer_contact`) VALUES
(1, 'corrected names', 'okdkdkd', 'emailed@gmail.com', '0788997766');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_products_id` int(11) NOT NULL,
  `inventory_sales_id` int(11) DEFAULT NULL,
  `inventory_quantity` int(11) NOT NULL,
  `inventory_purchases_id` int(11) NOT NULL,
  `inventory_sales_returns` varchar(50) NOT NULL DEFAULT '0',
  `inventory_purchases_returns` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `inventory_products_id`, `inventory_sales_id`, `inventory_quantity`, `inventory_purchases_id`, `inventory_sales_returns`, `inventory_purchases_returns`) VALUES
(1, 1, NULL, 15, 2, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(50) NOT NULL,
  `login_password` varchar(50) NOT NULL,
  `login_rank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`) VALUES
(1, 'intruder', '5f4dcc3b5aa765d61d8327deb882cf99', 'user'),
(2, 'adminadmin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin'),
(3, 'dededededede', '99b0e8da24e29e4ccb5d7d76e677c2ac', 'supplier'),
(6, 'adminupdated', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_sub_category` varchar(50) NOT NULL,
  `product_description` varchar(5000) NOT NULL,
  `product_date_of_manufacture` varchar(50) NOT NULL,
  `product_batch_number` varchar(11) NOT NULL,
  `product_expiry_date` varchar(50) NOT NULL,
  `product_unit_price` int(10) NOT NULL,
  `product_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category`, `product_name`, `product_sub_category`, `product_description`, `product_date_of_manufacture`, `product_batch_number`, `product_expiry_date`, `product_unit_price`, `product_amount`) VALUES
(1, 'Computers', 'Laptop', 'Dell Machines', 'dedededdeded', '2022-03-08', 'dde987', '2022-04-01', 34, 344),
(2, 'Food', 'Rice', 'Cereals', 'Nice Rice Grains', '2022-03-01', '876120', '2022-03-31', 1000, 150);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchases_id` int(11) NOT NULL,
  `purchases_date` varchar(50) NOT NULL,
  `purchases_supplier_id` int(11) NOT NULL,
  `purchases_product_id` int(11) NOT NULL,
  `purchases_quantity` int(11) NOT NULL,
  `purchases_product_unit_price` int(11) NOT NULL,
  `purchases_total_amount` int(11) NOT NULL,
  `purchases_returns` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchases_id`, `purchases_date`, `purchases_supplier_id`, `purchases_product_id`, `purchases_quantity`, `purchases_product_unit_price`, `purchases_total_amount`, `purchases_returns`) VALUES
(1, '2022-03-03', 1, 1, 100, 400000, 40000000, 100000),
(2, '04-03-22', 1, 1, 200, 40000, 8000000, NULL),
(3, '04-03-2022', 1, 1, 15, 50000, 750000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_date` varchar(50) NOT NULL,
  `sales_customer_id` varchar(50) NOT NULL,
  `sales_product_id` varchar(50) NOT NULL,
  `sales_quantity` varchar(50) NOT NULL,
  `sales_product_unit_price` varchar(50) NOT NULL,
  `sales_total_amount` varchar(50) NOT NULL,
  `sales_returns` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_date`, `sales_customer_id`, `sales_product_id`, `sales_quantity`, `sales_product_unit_price`, `sales_total_amount`, `sales_returns`) VALUES
(1, '2022-03-04', '1', '1', '10', '40000', '400000', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_login_id` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_company` varchar(150) NOT NULL,
  `supplier_location` varchar(5000) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_login_id`, `supplier_name`, `supplier_company`, `supplier_location`, `supplier_contact`) VALUES
(1, '3', 'dededeveede', 'dedede updated', 'deded', '0722332233');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full_names` varchar(50) NOT NULL,
  `user_phone_number` varchar(50) NOT NULL,
  `user_email_address` varchar(50) NOT NULL,
  `user_login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full_names`, `user_phone_number`, `user_email_address`, `user_login_id`) VALUES
(1, 'dedede', '0722883321', 'intruder@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchases_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchases_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
