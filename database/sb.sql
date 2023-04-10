-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2023 at 04:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `adminpassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `adminpassword`) VALUES
(1, 'sharmakunal', 'password'),
(2, 'qwerty', 'hehehehe');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dates` date NOT NULL,
  `propertyId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `dates`, `propertyId`) VALUES
(1, 'KUNAL', 'kasdsd@gmail.com', '124234234', '2023-04-07', 0),
(2, 'wdwd', 'wdd@gmail.com', '23532535', '2023-04-08', 0),
(3, 'nunu', 'niunu@gmail.com', '12345642', '2023-04-07', 58),
(4, 'wdwd', 'wdw@gmail.com', '2141', '2023-04-07', 58),
(5, 'wdwd', 'wdw@gmail.com', '2141', '2023-04-07', 58),
(6, 'wdwdwdwd', 'wdw@gmail.com', '23r3r3', '2023-04-08', 58),
(7, 'adadadad', 'adad@gmail.com', '3t2r', '2023-04-04', 58),
(8, 'kunal', 'asds@gmail.com', '1224124', '2023-04-14', 58),
(9, 'wdwd', 'wdwd@gmail.com', '35235', '2023-04-08', 58),
(10, 'wdwd', 'wdwd@gmail.com', '35235', '2023-04-08', 58),
(11, 'wdwdgtynytntyn', 'wfw@gmail.com', '564321', '2023-04-26', 58),
(12, 'wdwdgtynytntyn', 'wfw@gmail.com', '564321', '2023-04-26', 58),
(13, 'wdwd', 'wdwd@gmail.com', '23r23r', '2023-04-04', 58),
(14, 'wdwdw', 'dwd@gmail.com', '23r3r23r', '2023-04-19', 58),
(15, 'wdwdw', 'dwd@gmail.com', '23r3r23r', '2023-04-19', 58),
(16, 'dedwd', 'dwd@gmail.com', '124124124', '2023-04-15', 58),
(17, 'darubaaz', 'kunu@gmail.com', '1235346543', '2023-04-14', 59),
(18, 'kunal', 'kunukun@gmail.com', '1234567623', '2023-04-13', 58),
(19, 'kunal', 'kunukun@gmail.com', '123234235', '2023-04-04', 60),
(20, 'janjan', 'janjan@gmail.com', '12345678', '2023-04-13', 58),
(21, 'godawri', 'gogo@gmail.com', '1234567890', '2023-04-08', 60),
(22, 'godawri', 'gogo@gmail.com', '1234567890', '2023-04-08', 60),
(23, 'godawri', 'gogo@gmail.com', '1234567890', '2023-04-08', 60);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `images` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `images`, `address`) VALUES
(43, 'nacho', 'IMG_0519.jpeg 3fe1af01-2bcd-435d-bfbd-4f4c2448bec9.jpeg IMG_0539.jpeg IMG_0087.jpeg', '345hu'),
(44, 'lalo', 'IMG_0482.jpeg 3bc91727-82e6-4eb2-bc28-4e46a9af8728.jpeg IMG_0519.jpeg IMG_9798.jpeg', '23 fofogogo'),
(45, 'daru', 'Screenshot 2023-04-02 at 20.58.08.png Screenshot 2023-03-22 at 20.45.05.png Screenshot 2023-04-02 at 21.05.55.png fa431c37-7f55-4795-884c-3daa9cc78a20.jpeg', '54 gogo momo'),
(46, 'kunalsharma', 'IMG_0436.jpeg a736fe27-ad49-4d69-9be2-e5bc61e49b6b.jpeg ec6eab5c-c88c-48d2-9cf9-87bd2c4931a3.jpeg IMG_9993.jpeg', '23 43 gobo'),
(47, 'grgrg', 'Screenshot 2023-04-02 at 20.58.08.png   ', '43 gfg '),
(48, 'lpo', 'Screenshot 2023-03-22 at 20.45.05.png Screenshot 2023-04-02 at 21.05.55.png  ', '5fvr g'),
(49, 'gobar', 'IMG_9655.jpeg 3830df34-a717-4c23-a9d3-d28d45c7eb6e.jpeg 63505c11-e8e6-4e0d-aac8-480b18fda42d.jpeg 596b8d7f-213d-4ea7-aec0-9969cd6b294c.jpeg', '123 gobarjaat'),
(50, 'raju chadda', 'IMG_6303.jpeg IMG_1140.jpeg IMG_0972.jpeg IMG_0956.jpeg', '8 silver nmaple court'),
(51, 'jojo minati', '99f7cbf2-b02a-4d15-84a7-d9fd2ddcbc4f.jpeg c3042de4-9a20-45f4-ab92-a420d57debe7.jpeg a171d838-ca5c-43b2-a011-5863d5572988.jpeg IMG_0540.jpeg', '24 wonderland ave '),
(52, 'Tinku jia', 'IMG_0087.jpeg IMG_0519.jpeg IMG_9904.jpeg IMG_6765.jpeg', '90 Aids View road'),
(53, 'poini', '   ', '23 goknma'),
(54, 'wfewf', '   ', '123fdvf');

-- --------------------------------------------------------

--
-- Table structure for table `Properties`
--

CREATE TABLE `Properties` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pimage` varchar(500) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'kunalsharma', 'Kunal', 'Sharma', 'Sharma.kunal.ks12345@gmail.com', 'qeqeqe'),
(2, 'kunalks', 'Kunal', 'Ks', 'Kunal12345@gmail.com', 'kunalks12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Properties`
--
ALTER TABLE `Properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `Properties`
--
ALTER TABLE `Properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
