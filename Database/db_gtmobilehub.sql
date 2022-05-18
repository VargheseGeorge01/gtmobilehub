-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2021 at 11:23 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gtmobilehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'varghese', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `payment_status` int(11) NOT NULL default '0',
  `booking_date` date NOT NULL,
  `booking_qty` int(11) NOT NULL,
  `booking_amt` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL default '0',
  `booking_assignstatus` int(11) NOT NULL default '0',
  `staff_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `payment_status`, `booking_date`, `booking_qty`, `booking_amt`, `product_id`, `customer_id`, `booking_status`, `booking_assignstatus`, `staff_id`) VALUES
(1, 0, '2021-12-03', 2, 0, 4, 0, 0, 0, 0),
(2, 0, '2021-12-03', 3, 147000, 4, 1, 1, 2, 1),
(3, 0, '2021-12-03', 2, 98000, 4, 1, 1, 0, 0),
(4, 0, '2021-12-10', 1, 3400, 3, 3, 2, 0, 0),
(5, 0, '2021-12-11', 1, 49000, 4, 3, 1, 0, 0),
(6, 1, '2021-12-11', 2, 6800, 3, 3, 1, 2, 6),
(7, 1, '2021-12-13', 3, 10200, 3, 3, 1, 1, 7),
(8, 1, '2021-12-13', 3, 10200, 3, 3, 1, 2, 6),
(9, 1, '2021-12-18', 3, 147000, 4, 4, 2, 0, 0),
(10, 1, '2021-12-18', 1, 49000, 4, 4, 1, 0, 0),
(11, 1, '2021-12-18', 2, 6800, 3, 4, 1, 2, 1),
(12, 1, '2021-12-18', 1, 49000, 4, 4, 1, 0, 0),
(13, 1, '2021-12-18', 1, 49000, 4, 4, 0, 0, 0),
(14, 1, '2021-12-18', 6, 294000, 4, 4, 0, 0, 0),
(15, 1, '2021-12-18', 1, 75000, 5, 4, 0, 0, 0),
(16, 1, '2021-12-18', 2, 150000, 5, 4, 0, 0, 0),
(17, 1, '2021-12-18', 3, 225000, 5, 4, 1, 0, 0),
(18, 1, '2021-12-18', 2, 150000, 5, 4, 1, 2, 7),
(19, 1, '2021-12-22', 2, 150000, 5, 5, 1, 2, 1),
(20, 1, '2021-12-27', 1, 75000, 5, 3, 0, 0, 0),
(21, 1, '2021-12-28', 1, 75000, 5, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(4, 'Smart Phone'),
(6, 'Headphones'),
(9, 'Smart Watch');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_date` date NOT NULL,
  `complaint_content` varchar(500) NOT NULL,
  `complaint_status` int(11) NOT NULL default '0',
  `customer_id` int(11) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL default '0',
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_content`, `complaint_status`, `customer_id`, `complaint_reply`) VALUES
(2, '2021-12-29', 'too bad', 1, 3, 'sorry for the trouble');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL auto_increment,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_status` int(11) NOT NULL,
  `customer_photo` varchar(150) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_password`, `customer_status`, `customer_photo`, `place_id`) VALUES
(1, 'manu', '999678422', 'aj@gmail.com', 'bcd', 'ab', 0, 'product-jpeg-500x500.jpg', 5),
(2, 'varun', '999678422', 'hj@gmail.com', 'ad villa', '123', 0, 'product-jpeg-500x500.jpg', 1),
(3, 'Bheem', '8547658757', 'bheem@gmail.com', 'Bheem villa', 'bheem4u', 0, '530205.jpg', 7),
(4, 'Vignesh KP', '8547658757', 'aj@gmail.com', 'vignesh villa', 'Vignesh@01', 0, 'girl-kids-shorts-250x250.jpg', 5),
(5, 'Dhanya Job', '9747042100', 'dhanyajob@gmail.com', 'BPC college ,Piravom', 'dhanyajob', 0, 'images.jfif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Thiruvananthapuram'),
(2, 'Kollam'),
(3, 'Pathanamthitta'),
(4, 'Alappuzha'),
(5, 'Kottayam'),
(6, 'Idukki'),
(7, 'Ernakulam'),
(8, 'Thrissur'),
(9, 'Palakkad'),
(10, 'Malappuram'),
(11, 'Kozhikode'),
(12, 'Waynad'),
(13, 'Kannur'),
(14, 'Kasargode');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_content` varchar(400) NOT NULL,
  `feedback_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `customer_id`) VALUES
(1, 'Nice service and good behaviour', '2021-12-10', 0),
(2, 'Good service', '2021-12-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `gallery_image` varchar(150) NOT NULL,
  `gallery_description` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_image`, `gallery_description`, `product_id`) VALUES
(2, 'Apple-iPhone-XR-Red-64GB.jpg', 'abc', 4),
(3, '61eDXs9QFNL._SL1500_.jpg', 'Apple iphone XR Blue 64', 4),
(4, '81hB-X3SMtL._SL1500_.jpg', 'Apple iphone 12 128gb blue', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Kakkanad', 7),
(2, 'Ettumanoor', 5),
(3, 'Adoor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_images` varchar(150) NOT NULL,
  `product_details` varchar(300) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_images`, `product_details`, `subcategory_id`) VALUES
(3, 'miband', 3400, 'tv.jpg', 'sgfhsaha', 2),
(5, 'iphone 12', 75000, '71ZOtNdaZCL._SL1500_.jpg', 'Iphone 12 128gb', 3),
(6, 'IQOOZ3', 18000, '615CXlFtDDS._SL1200_.jpg', 'LCD display ,snapdragon 870 5G', 4),
(7, 'iphone 12', 49, '71ZOtNdaZCL._SL1500_.jpg', 'iphone 12 64gb', 3),
(8, 'Noice', 5000, '61epn29QG0L._SL1500_.jpg', 'Noice smart watch', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL auto_increment,
  `staff_name` varchar(50) NOT NULL,
  `staff_contact` varchar(50) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_photo` varchar(150) NOT NULL,
  `staff_proof` varchar(150) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY  (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_contact`, `staff_email`, `staff_address`, `staff_photo`, `staff_proof`, `staff_password`, `place_id`) VALUES
(1, 'Manu', '999678422', 'aj@gmail.com', 'ghsjaksa', '41lmHbdE46L._AC_UX385_.jpg', 'SHOPPING CART.png', '123', 0),
(6, 'Aby', '8547658757', 'aby@gmail.com', 'Aby villa', 'Apple-iPhone-XR-Red-64GB.jpg', 'download.jpg', 'Aby', 4),
(7, 'Manu', '9494456776', 'manu@gmail.com', 'manu villa', 'product-jpeg-500x500.jpg', 'Shop.png', 'manu@123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL auto_increment,
  `stock_date` date NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY  (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `stock_qty`, `product_id`) VALUES
(1, '2021-10-11', 0, 0),
(4, '0000-00-00', 4, 5),
(5, '2021-12-18', 5, 4),
(6, '2021-12-18', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL auto_increment,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Bluetooth', 4),
(2, 'Fitness ', 6),
(3, 'Iphone', 4),
(4, 'Android', 4);
