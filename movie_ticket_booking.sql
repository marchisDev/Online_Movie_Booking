-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 08:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `no_ticket` int(11) NOT NULL,
  `seat_dt_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `total_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cust_id`, `show_id`, `no_ticket`, `seat_dt_id`, `booking_date`, `total_amount`) VALUES
(46, 0, 4, 1, 60, '2023-04-13', '60000'),
(47, 0, 4, 1, 61, '2023-04-13', '60000'),
(48, 1, 4, 2, 62, '2023-04-13', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `location`, `city`) VALUES
(1, 'DDK Bình Tân', '101-104 Trần Thanh Mại', 'Thành Phố Hồ Chí Minh'),
(2, 'DDK Quận 10', '34-36 Vĩnh Viễn', 'Thành Phố Hồ Chí Minh'),
(3, 'DDK Quận 1', '36-40 Lê Lợi, ROL Mall', 'Thành Phố Hồ Chí Minh'),
(4, 'DDK Đà Lạt', '40 Hai Bà Trưng', 'Thành Phố Đà Lạt'),
(5, 'DDK Bình Tân 2', 'AEON mall Bình Tân', 'Thành Phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `num` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `msg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `num`, `msg`, `msg_date`) VALUES
(1, 'Duy', 'duydla86@gmail.com', '0349245678', 'hello', '2023-04-09'),
(2, 'Anh', '520H0624@student.tdtu.edu.vn', '0349245678', 'hi', '2023-04-09'),
(3, 'Anh', '520H0624@student.tdtu.edu.vn', '0349245678', 'hi', '2023-04-09'),
(4, 'Anh', '520H0624@student.tdtu.edu.vn', '0349245678', 'hi', '2023-04-09'),
(5, 'Khiem', 'khiem@gmail.com', '0987334568', 'want to check your branch at Binh Tan', '2023-04-09'),
(6, 'Khiem', 'khiem@gmail.com', '0987334568', 'want to check your branch at Binh Tan', '2023-04-09'),
(7, 'Khiem', 'khiem@gmail.com', '0987334568', 'Check my account ID', '2023-04-10'),
(8, 'Khiem', 'khiem@gmail.com', '0987334568', 'Check my account ID', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellno` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `cellno`, `gender`, `password`) VALUES
(0, 'nhanvien', 'nhanvien@gmail.com', '09388888', 'nam', '123456'),
(1, 'Thanh Duy', 'duy456@gmail.com', '0456787635', 'male', '123456'),
(2, 'Gia Khiem', 'khiem111@gmail.com', '0344564335', 'male', '123456'),
(5, 'Việt Anh', 'viet123@gmail.com', '0123456789', 'male', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure'),
(4, 'Crime and mystery'),
(5, 'Fantasy'),
(6, 'Historical'),
(7, 'Horror'),
(8, 'Romance'),
(9, 'Science fiction');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry_name`) VALUES
(1, 'Hollywood'),
(2, 'Bollywood'),
(3, 'Lollywood'),
(4, 'Warner Bros'),
(5, ' Marvel Studio'),
(6, 'Universal'),
(7, 'Sony'),
(8, 'Paramount');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `lang_name`) VALUES
(1, 'English'),
(2, 'Vietnamese'),
(3, 'French'),
(4, 'Dutch'),
(5, 'Chinese'),
(6, 'German'),
(7, 'Portuguese'),
(8, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `movie_banner` varchar(100) NOT NULL,
  `movie_desc` varchar(300) NOT NULL,
  `rel_date` date NOT NULL,
  `industry_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `movie_desc`, `rel_date`, `industry_id`, `genre_id`, `lang_id`, `duration`) VALUES
(2, 'Spider-man 1', 'images\\movie\\spidermain1.jpg', '', '2023-04-02', 1, 1, 1, '2 hours'),
(3, 'Spider-man 2', 'images\\movie\\spiderman2.jpg', '', '2023-04-03', 1, 1, 1, '2 hours'),
(4, 'WarCraft', 'images\\movie\\warcraft.png', '', '2023-05-10', 1, 3, 1, '3 hours'),
(6, 'Lật mặt 6', 'images\\movie\\latmat6.jpg', '', '2023-06-08', 2, 2, 2, '2 hours'),
(7, 'Chàng Vợ Của Em', 'images\\movie\\changvocuaem.jpg', '', '2023-06-12', 2, 2, 1, '2 hours'),
(8, 'Catch Me If You Can', 'images\\movie\\catchmeifyoucan.jpg', '', '2023-05-23', 1, 6, 3, '3 hours'),
(9, 'Lookism', 'images\\movie\\Lookism.jpg', '', '2023-05-23', 6, 2, 4, '3 hours'),
(24, 'Avatar', 'images\\movie\\avatar.jpg', '', '2023-03-08', 4, 1, 7, '2 hours'),
(25, 'John Wick2', 'images\\movie\\johnwick2.jpg', '', '2023-04-10', 2, 1, 1, '2 hours'),
(26, 'Creed', 'images\\movie\\creed.jpg', '', '2023-04-09', 3, 5, 1, '2 hours'),
(27, 'Puss in Boots', 'images\\movie\\pussinboots.jpg', '', '2023-04-02', 3, 2, 1, '2 hours'),
(28, 'Marvel: End Game', 'images\\movie\\endgame.jpg', '', '2023-04-01', 5, 5, 4, '2 hours');

-- --------------------------------------------------------

--
-- Table structure for table `seat_detail`
--

CREATE TABLE `seat_detail` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_detail`
--

INSERT INTO `seat_detail` (`id`, `cust_id`, `show_id`, `seat_no`) VALUES
(60, 0, 4, '1'),
(61, 0, 4, '1'),
(62, 1, 4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `seat_number` varchar(50) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `show_id`, `cust_id`, `seat_number`, `reserved`) VALUES
(109, 4, 0, '11', 0),
(110, 4, 0, '12', 0),
(111, 4, 1, '71', 0),
(112, 4, 1, '72', 0);

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `movie_id`, `show_date`, `show_time_id`, `no_seat`, `cinema_id`, `ticket_price`) VALUES
(1, 8, '2023-05-28', 6, 40, 1, 60000),
(2, 8, '2023-04-13', 11, 40, 2, 60000),
(3, 24, '2023-04-13', 8, 40, 2, 60000),
(4, 2, '2023-04-15', 12, 40, 1, 60000),
(5, 2, '2023-04-16', 11, 40, 3, 60000),
(6, 28, '2023-04-21', 2, 40, 3, 60000),
(7, 28, '2023-04-17', 8, 40, 2, 60000),
(8, 27, '2023-04-18', 11, 40, 4, 60000),
(9, 28, '2023-04-21', 2, 40, 2, 60000),
(10, 3, '2023-04-18', 11, 40, 5, 60000),
(11, 25, '2023-05-01', 9, 40, 2, 60000),
(12, 25, '2023-05-02', 2, 40, 5, 60000),
(13, 25, '2023-04-14', 8, 40, 1, 60000),
(14, 26, '2023-04-15', 6, 40, 2, 60000),
(15, 24, '2023-04-26', 6, 40, 3, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `time`) VALUES
(1, '8:00 AM - 11:00 AM'),
(2, '11:00 AM - 2:00 PM'),
(3, '1:00 PM - 3:00 PM'),
(4, '4:00 PM - 6:00 PM'),
(5, '1:30 PM - 3:30 PM'),
(6, '4:30 PM - 7:30 PM'),
(7, '5:00 PM - 7:00 PM'),
(8, '7:00 AM - 10:00 AM'),
(9, '7:00 PM - 10:00 PM'),
(10, '9:30 AM - 1:30 PM'),
(11, '8:30 AM - 12:30 PM'),
(12, '7:00 AM - 10:00 AM'),
(13, '8:00 AM - 11:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img_path`, `alt`) VALUES
(1, 'images/banner1.jpg', 'First slide'),
(2, 'images/banner2.jpg', 'Second slide'),
(3, 'images/banner3.png', 'Third slide'),
(4, 'images/banner4.jpg', 'Fourth slide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `seat_dt_id` (`seat_dt_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cellno` (`cellno`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_id` (`industry_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `show_time_id` (`show_time_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seat_detail`
--
ALTER TABLE `seat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`seat_dt_id`) REFERENCES `seat_detail` (`id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `movie_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `language` (`id`);

--
-- Constraints for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD CONSTRAINT `seat_detail_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `seat_detail_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`);

--
-- Constraints for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD CONSTRAINT `seat_reserved_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `seat_reserved_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `show_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `show_ibfk_3` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `show_ibfk_4` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
