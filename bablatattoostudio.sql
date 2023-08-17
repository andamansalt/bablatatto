-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:10 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bablatattoostudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(10) NOT NULL,
  `artist_name` text NOT NULL,
  `artist_lastname` text NOT NULL,
  `artist_nickname` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_lastname`, `artist_nickname`, `phone`) VALUES
(1, 'Angkana', 'Meelap', 'mek', '080-xxxxxxx'),
(2, 'yanisa', 'supantakarn', 'yok', '092-xxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE `book_detail` (
  `order_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `position` text NOT NULL,
  `order_size` text NOT NULL,
  `order_detail` text NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `status` text NOT NULL,
  `tatto_id` int(10) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `time_stamp` datetime(6) NOT NULL,
  `book_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_detail`
--

INSERT INTO `book_detail` (`order_id`, `date`, `time`, `position`, `order_size`, `order_detail`, `start_time`, `end_time`, `status`, `tatto_id`, `artist_id`, `user_id`, `time_stamp`, `book_type`) VALUES
(87, '2023-02-25', '15:00 น.', 'หลังซ้าย', 'L', 'สีเข้มมากที่สุด', '00:00:00.000000', '00:00:00.000000', 'ยกเลิกการจอง', 21, 1, 22, '2023-02-03 15:00:19.000000', 1),
(89, '2023-02-25', '17:00 น.', 'หลังซ้าย', 'L', 'test', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 20, 2, 22, '2023-02-03 15:03:55.000000', 1),
(90, '2023-02-06', '14:00 น.', 'หัวไหล่', 'M', 'test', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 17, 1, 22, '2023-02-03 15:05:31.000000', 1),
(91, '2023-02-07', '15:00 น.', 'ต้นแขนขวา', 'XL', 'test', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 11, 1, 22, '2023-02-03 15:55:41.000000', 1),
(92, '2023-02-08', '', 'แขนขวา', '12X14', 'test', '00:00:00.000000', '00:00:00.000000', 'รอการดำเนินการ', 0, 2, 22, '2023-02-03 16:23:48.000000', 2),
(95, '2023-02-25', '', 'แขนขวา', '12X14', 'test222', '00:00:00.000000', '00:00:00.000000', 'รอการดำเนินการ', 0, 1, 16, '2023-02-03 18:05:02.000000', 2),
(99, '2023-02-18', '12:00 น.', 'ต้นแขนขวา', 'L', 'test', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 11, 1, 16, '2023-02-03 18:28:12.000000', 1),
(100, '0000-00-00', '', '', '', '', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 0, 0, 7, '2023-02-03 19:33:44.000000', 1),
(101, '2023-02-09', '', 'แขนขวา', 'M', 'สีเข้มมากที่สุด', '00:00:00.000000', '00:00:00.000000', 'รอการดำเนินการ', 0, 1, 7, '2023-02-03 19:34:12.000000', 2),
(102, '2023-02-15', '', 'หัวไหล่', '12X12', 'test222', '00:00:00.000000', '00:00:00.000000', 'รอการดำเนินการ', 0, 0, 7, '2023-02-03 19:35:43.000000', 3),
(103, '2023-02-14', '16:00 น.', 'หัวไหล่', '', 'test324', '16:00:00.000000', '18:40:00.000000', 'จองสำเร็จ', 6, 2, 7, '2023-02-03 19:36:41.000000', 1),
(105, '2023-02-27', '16:00 น.', 'หลังซ้าย', 'XL', 'test', '00:00:00.000000', '00:00:00.000000', 'จองสำเร็จ', 21, 1, 7, '2023-02-03 19:41:17.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(0, 'Minimal'),
(1, 'Quote '),
(2, 'Geometric ');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `design_id` int(10) NOT NULL,
  `design_ref_pic` text NOT NULL,
  `design_position` text NOT NULL,
  `design_color` text NOT NULL,
  `design_size` text NOT NULL,
  `design_detail` text NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`design_id`, `design_ref_pic`, `design_position`, `design_color`, `design_size`, `design_detail`, `order_id`) VALUES
(1, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'ต้นแขนขวา', '#6d2251', '12X14', 'เพิ่มรูปหัวใจ', 42),
(2, 'Capture.JPG', 'แขนขวา', '#fc0303', '12X12', 'สีเข้มมากที่สุด', 43),
(3, 'original.jpg', 'ต้นแขนขวา', '#000000', '12X14', 'เพิ่มรูปหัวใจ', 54),
(4, 'tatto (15).jpg', 'หลังขวา', '#000000', '12X14', 'test', 76),
(5, 'bg1.jpg', 'หน้าท้อง', '#000000', '12X12', 'test', 83),
(6, 'shield.png', 'หัวไหล่', '#6d2222', '12X12', 'test222', 102);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `payment_status` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_date` datetime(6) NOT NULL,
  `payment_bank` text NOT NULL,
  `order_id` int(10) NOT NULL,
  `pay_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_status`, `payment_amount`, `payment_date`, `payment_bank`, `order_id`, `pay_pic`) VALUES
(1, 'ชำระเงินแล้ว', '1600', '2023-01-06 16:31:11.000000', '', 45, ''),
(2, 'ชำระเงินแล้ว', '2100', '2023-01-06 16:51:13.000000', '', 46, ''),
(3, 'ชำระเงินแล้ว', '1100', '2023-01-07 01:27:10.000000', '', 47, ''),
(4, 'ชำระเงินแล้ว', '1600', '2023-01-07 01:31:56.000000', '', 49, ''),
(5, 'ชำระเงินแล้ว', '1600', '2023-01-07 01:55:37.000000', '', 50, ''),
(6, 'ชำระเงินแล้ว', '2100', '2023-01-07 05:43:56.000000', '', 51, ''),
(7, 'ชำระเงินแล้ว', '1600', '2023-01-07 10:09:16.000000', '', 52, ''),
(8, 'ชำระเงินแล้ว', '1600', '2023-01-12 16:12:26.000000', '', 55, ''),
(9, 'ชำระเงินแล้ว', '1600', '2023-01-12 18:28:41.000000', '', 56, ''),
(10, 'ชำระเงินแล้ว', '1100', '2023-01-18 05:50:57.000000', '', 57, ''),
(11, 'ชำระเงินแล้ว', '1600', '2023-01-19 20:11:56.000000', '', 58, ''),
(12, 'ชำระเงินแล้ว', '1600', '2023-01-19 20:27:00.000000', '', 59, ''),
(13, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:32:03.000000', 'Visa', 60, ''),
(14, 'ชำระเงินแล้ว', '1100', '2023-01-25 17:33:52.000000', 'Visa', 61, ''),
(15, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:39:39.000000', 'Visa', 62, ''),
(16, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:41:57.000000', 'Visa', 63, ''),
(17, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:43:42.000000', 'Visa', 64, ''),
(18, 'ชำระเงินแล้ว', '1100', '2023-01-25 17:46:12.000000', 'Visa', 65, ''),
(19, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:48:54.000000', 'Visa', 66, ''),
(20, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:53:23.000000', 'Visa', 67, ''),
(21, 'ชำระเงินแล้ว', '1600', '2023-01-25 17:55:14.000000', 'Visa', 68, ''),
(22, 'ชำระเงินแล้ว', '1600', '2023-01-26 02:00:16.000000', 'Visa', 69, ''),
(23, 'ชำระเงินแล้ว', '2100', '2023-01-26 02:59:17.000000', 'Visa', 70, ''),
(24, 'ชำระเงินแล้ว', '1600', '2023-01-26 03:00:53.000000', 'Visa', 71, ''),
(25, 'ชำระเงินแล้ว', '1600', '2023-01-26 03:20:09.000000', 'Visa', 72, ''),
(26, 'ชำระเงินแล้ว', '1100', '2023-01-26 03:21:05.000000', 'Visa', 73, ''),
(27, 'ชำระเงินแล้ว', '1600', '2023-01-30 20:09:16.000000', 'Visa', 75, ''),
(28, 'ชำระเงินแล้ว', '2100', '2023-01-31 17:11:19.000000', 'Visa', 77, ''),
(29, 'ชำระเงินแล้ว', '1600', '2023-02-01 18:36:01.000000', 'Visa', 79, ''),
(30, 'ชำระเงินแล้ว', '1600', '2023-02-02 17:58:39.000000', 'Visa', 80, ''),
(31, 'ชำระเงินแล้ว', '2100', '2023-02-02 19:15:24.000000', 'Visa', 85, ''),
(32, 'ชำระเงินแล้ว', '1600', '2023-02-03 14:54:49.000000', 'Visa', 86, ''),
(33, 'ชำระเงินแล้ว', '1600', '2023-02-03 15:00:19.000000', 'Visa', 87, ''),
(34, 'ชำระเงินแล้ว', '2100', '2023-02-03 15:03:08.000000', 'Visa', 88, ''),
(35, 'ชำระเงินแล้ว', '1600', '2023-02-03 15:03:55.000000', 'Visa', 89, ''),
(36, 'ชำระเงินแล้ว', '1100', '2023-02-03 15:05:31.000000', 'Visa', 90, ''),
(37, 'ชำระเงินแล้ว', '2100', '2023-02-03 15:55:41.000000', 'Visa', 91, ''),
(38, 'ชำระเงินแล้ว', '2100', '2023-02-03 18:03:14.000000', 'Visa', 93, ''),
(39, 'ชำระเงินแล้ว', '1600', '2023-02-03 18:03:52.000000', 'Visa', 94, ''),
(40, 'ชำระเงินแล้ว', '1600', '2023-02-03 18:07:30.000000', 'Visa', 96, ''),
(41, 'ชำระเงินแล้ว', '2100', '2023-02-03 18:14:25.000000', 'Visa', 97, ''),
(42, 'ชำระเงินแล้ว', '1100', '2023-02-03 18:18:57.000000', 'Visa', 98, ''),
(43, 'ชำระเงินแล้ว', '1600', '2023-02-03 18:28:12.000000', 'Visa', 99, ''),
(44, 'ชำระเงินแล้ว', '1600', '2023-02-03 19:33:44.000000', 'Visa', 100, ''),
(45, 'ชำระเงินแล้ว', '1600', '2023-02-03 19:36:41.000000', 'Visa', 103, ''),
(46, 'ชำระเงินแล้ว', '2100', '2023-02-03 19:41:17.000000', 'Visa', 105, '');

-- --------------------------------------------------------

--
-- Table structure for table `proficiency`
--

CREATE TABLE `proficiency` (
  `proficiency_id` int(10) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_id` int(10) NOT NULL,
  `reviews_point` int(10) NOT NULL,
  `reviews_detail` text NOT NULL,
  `artist_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tatto`
--

CREATE TABLE `tatto` (
  `tatto_id` int(10) NOT NULL,
  `tatto_name` text NOT NULL,
  `tatto_color` text NOT NULL,
  `tatto_pic` text NOT NULL,
  `tatto_time` text NOT NULL,
  `tatto_detail` text NOT NULL,
  `status_tatt` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tatto`
--

INSERT INTO `tatto` (`tatto_id`, `tatto_name`, `tatto_color`, `tatto_pic`, `tatto_time`, `tatto_detail`, `status_tatt`, `category_id`) VALUES
(6, 'Japanese letter', 'black and red', 'tatto (5).png', '01:30', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(7, 'minimal cat', 'black and pink', 'tatto (6).png', '01:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 0, 0),
(8, '3 cats', 'black and red', 'tatto (7).png', '02:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(9, 'red flower', 'red and black', 'tatto (8).png', '01:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(10, 'butterfly_3', 'black and pink', 'tatto (9).png', '01:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(11, 'black space', 'black', 'tatto (10).png', '02:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(12, 'sunflower', 'yellow and green', 'tatto (11).png', '02:00', 'ไซส์ M 5cm x 10cm (1,000 บาท) \r\nไซส์ L 8cm x 16cm (1,500 บาท) \r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(13, 'trust', 'black', 'tatto (12).jpg', '02:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(14, 'moon and rose', 'black', 'tatto (13).jpg', '02:00', 'ไซส์ M 5cm x 10cm (1,000 บาท)\r\nไซส์ L 8cm x 16cm (1,500 บาท)\r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(17, 'yin&yang', 'black and white', 'tatto (15).jpg', '01:30', 'ไซส์ M 5cm x 10cm (1,100 บาท)\r\nไซส์ L 8cm x 16cm (1,600 บาท) \r\nไซส์ XL 10cm x 20cm (2,100 บาท)', 1, 0),
(18, 'ufo', 'black', 'tatto (16).jpg', '01:00', 'ไซส์ M 5cm x 10cm (1,100 บาท) \r\nไซส์ L 8cm x 16cm (1,600 บาท) \r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(20, 'd0', 'black', 'tatto (10).png', '01:00', 'ไซส์ M 5cm x 10cm (1,000 บาท) \r\nไซส์ L 8cm x 16cm (1,500 บาท) \r\nไซส์ XL 10cm x 20cm (2,000 บาท)', 1, 0),
(21, 'the sun', '#000000', 'tatto (1).png', '01:30', 'ไซส์ M 5cm x 10cm (1,100 บาท) \r\nไซส์ L 8cm x 16cm (1,600 บาท) \r\nไซส์ XL 10cm x 20cm (2,100 บาท)', 1, 0),
(22, 'starry night', '#077ae9', 'tatto (2).png', '02:00', 'ไซส์ M 5cm x 10cm (1,100 บาท) \r\nไซส์ L 8cm x 16cm (1,600 บาท) \r\nไซส์ XL 10cm x 20cm (2,100 บาท)', 1, 0),
(23, 'the snake', '#ff0f0f', 'tatto (3).png', '01:30', 'ไซส์ M 5cm x 10cm (1,100 บาท) \r\nไซส์ L 8cm x 16cm (1,600 บาท)\r\nไซส์ XL 10cm x 20cm (2,100 บาท)', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload_picture`
--

CREATE TABLE `upload_picture` (
  `uploadpic_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `uploadpic_pic` text NOT NULL,
  `detail` text NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_picture`
--

INSERT INTO `upload_picture` (`uploadpic_id`, `order_id`, `uploadpic_pic`, `detail`, `size`) VALUES
(1, 0, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'สีเข้มมากที่สุด', '12X12'),
(2, 0, 'original.jpg', 'เพิ่มรูปหัวใจ', '12X12'),
(3, 0, 'tatto (14).jpg', 'สีเข้มมากที่สุด', '12X14'),
(4, 0, 'original.jpg', 'สีเข้มมากที่สุด', '12X14'),
(5, 0, 'original.jpg', 'สีเข้มมากที่สุด', '12X14'),
(6, 0, 'original.jpg', 'เพิ่มรูปหัวใจ', 'M'),
(7, 0, 'original.jpg', 'สีเข้มมากที่สุด', '12X14'),
(8, 0, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'เพิ่มรูปหัวใจ', '12X12'),
(9, 38, 'original.jpg', 'เพิ่มรูปหัวใจ', '12X14'),
(10, 39, 'Capture.JPG', 'เพิ่มรูปหัวใจ', '12X14'),
(11, 40, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'เพิ่มรูปหัวใจ', '12X12'),
(12, 41, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'สีเข้มมากที่สุด', '12X14'),
(13, 44, 'original.jpg', 'เพิ่มรูปหัวใจ', '12X14'),
(14, 48, '7bc85c2f423e04f269a8c3f0b42838bd.jpg', 'เพิ่มรูปหัวใจ', '12X14'),
(15, 53, 'original.jpg', 'เพิ่มรูปหัวใจ', '12X14'),
(16, 74, 'tatto (10).png', 'test', '12X14'),
(17, 78, '', 'test', '12X14'),
(18, 81, 'care.png', 'test', '12X14'),
(19, 82, '', 'test', '12X14'),
(20, 84, 'tatto (1).png', 'สีเข้มมากที่สุด', '12X14'),
(21, 92, 'tatto (1).png', 'test', '12X14'),
(22, 95, 'bg1.jpg', 'test222', '12X14'),
(23, 101, 'tatto (1).png', 'สีเข้มมากที่สุด', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `type` int(10) NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `birthday` date NOT NULL,
  `code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `phone`, `type`, `email`, `gender`, `address`, `firstname`, `lastname`, `birthday`, `code`) VALUES
(2, 'ddd', '698d51a19d8a121ce581499d7b701668', '800000000', 0, 'cchinyz@gmail.com', 'Male', '', '', '', '2005-07-13', 229503),
(3, 'ee1', '827ccb0eea8a706c4c34a16891f84e7b', '2999999', 1, 'potogasmix@gmail.com', 'Male', '', '', '', '2022-10-01', 0),
(6, 'uu', '81dc9bdb52d04dc20036dbd8313ed055', '069484742', 0, 'possssix@gmail.com', 'etc', '165/1 ม.5', 'โจอี้', 'กาน่า', '2022-07-06', 0),
(7, 'dd', '202cb962ac59075b964b07152d234b70', '29959999', 0, 'potogattsmix@gmail.com', 'Male', '', '', '', '2022-10-26', 0),
(8, 'ee', '202cb962ac59075b964b07152d234b70', '123456778', 0, 'potogaddffttsmix@gmail.com', 'Male', '', '', '', '2022-10-26', 0),
(9, 'db', '202cb962ac59075b964b07152d234b70', '0292312312', 0, 'potogsqssixs1@gmail.com', 'Male', '', '', '', '2022-09-06', 0),
(10, 'tt', '202cb962ac59075b964b07152d234b70', '0290312312', 0, 'wiil@hotmail.com', 'Male', '', '', '', '2022-01-05', 0),
(11, 'jau', '202cb962ac59075b964b07152d234b70', '08539382891', 0, 'wii123l@hotmail.com', 'Female', '', '', '', '2022-03-07', 0),
(12, 'rr', '202cb962ac59075b964b07152d234b70', '098765234', 0, '', 'Male', 'adasdasd', 'sds', 'ads', '2022-11-09', 141647),
(13, 'addmin', '202cb962ac59075b964b07152d234b70', '0847788712', 1, 'joke123@hotmail.com', 'Male', '', '', '', '1996-10-16', 0),
(14, 'yuuu', '202cb962ac59075b964b07152d234b70', '09765431', 0, 'hui777@hotmail.com', 'Female', '165/1 ม.5', 'โจอี้', 'กาน่า', '2022-12-08', 0),
(15, 'test01', '202cb962ac59075b964b07152d234b70', '0624293051', 0, 'yutio_@hotmail.com', 'Male', '402/2 ', 'มินเนี่ยน', 'บ็อบ', '2001-01-01', 0),
(16, 'test2', '202cb962ac59075b964b07152d234b70', '0844450542', 0, 'boogy@hotmail.com', 'Male', '165/1 ม.5', 'john', 'doe', '2003-06-10', 0),
(22, 'test3', '202cb962ac59075b964b07152d234b70', '0876554123', 0, 'john113@gmail.com', 'Male', '', '', '', '2002-05-07', 0),
(23, 'test4', '202cb962ac59075b964b07152d234b70', '0876554123', 0, 'john1123@gmail.com', 'Male', '', '', '', '2023-02-17', 0),
(30, 'test6', '202cb962ac59075b964b07152d234b70', '0987654321', 0, 'aasedsa610111122@gmail.com', 'Male', 'ิbrooklyn 42/8 st.bond', 'john', 'cena', '2023-02-16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `proficiency`
--
ALTER TABLE `proficiency`
  ADD PRIMARY KEY (`proficiency_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_id`);

--
-- Indexes for table `tatto`
--
ALTER TABLE `tatto`
  ADD PRIMARY KEY (`tatto_id`);

--
-- Indexes for table `upload_picture`
--
ALTER TABLE `upload_picture`
  ADD PRIMARY KEY (`uploadpic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_detail`
--
ALTER TABLE `book_detail`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `design_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `proficiency`
--
ALTER TABLE `proficiency`
  MODIFY `proficiency_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tatto`
--
ALTER TABLE `tatto`
  MODIFY `tatto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `upload_picture`
--
ALTER TABLE `upload_picture`
  MODIFY `uploadpic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
