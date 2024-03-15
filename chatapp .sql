-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 06:05 AM
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
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `unique_id`) VALUES
('admin@gmail.com', 'admin@123', 0),
('admin@gmail.com', 'admin@123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `message_id` int(11) NOT NULL,
  `message_text` varchar(1000) NOT NULL,
  `message_sender_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`message_id`, `message_text`, `message_sender_id`, `date_time`) VALUES
(1, 'hi', 1332073728, '2024-02-25 15:13:41'),
(2, 'hello', 1332073728, '2024-02-25 15:13:44'),
(3, 'first', 1332073728, '2024-02-25 15:13:48'),
(4, 'hi', 766592859, '2024-02-25 15:14:19'),
(5, 'hey', 766592859, '2024-02-25 15:14:27'),
(6, 'who r u', 766592859, '2024-02-25 15:14:32'),
(7, 'hi', 1332073728, '2024-02-25 15:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date_time`) VALUES
(1, 2147483647, 633713615, 'hello', '2024-03-04 09:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `branch`, `phone_number`) VALUES
(1, 1332073728, 'mohan', 'k', 'mohan@gmail.com', 'e9206237def4b4ef46fd933ed0f5a08f', 'profile_default.png', 'Active now', 'ISE', 0),
(2, 766592859, 'rohan', 'k', 'rohan@gmail.com', 'c916d142f0dc7f9389653a164f1d4e9d', 'profile_default.png', 'Offline now', 'AIML', 0),
(5, 633713615, 'mujahid', 'mahedi', 'mujahidmahedi10@gmail.com', 'bf91184832ff2e9b92e94ef61ad52e53', 'profile_default.png', 'Offline now', 'ISE', 2147483647),
(6, 2147483647, 'John', 'Doe', 'john.doe@example.com', 'password123', 'profile_default.png', '', 'MECH', 2147483647),
(7, 2147483647, 'Alice', 'Smith', 'alice.smith@example.com', 'password1', 'profile_default.png', '', 'ISE', 2147483647),
(8, 2147483647, 'Bob', 'Johnson', 'bob.johnson@example.com', 'password2', 'profile_default.png', '', 'AIML', 2147483647),
(9, 2147483647, 'Charlie', 'Brown', 'charlie.brown@example.com', 'password3', 'profile_default.png', '', 'AIDS', 2147483647),
(10, 2147483647, 'David', 'Miller', 'david.miller@example.com', 'password4', 'profile_default.png', '', 'CSE', 2147483647),
(11, 2147483647, 'Emily', 'Davis', 'emily.davis@example.com', 'password5', 'profile_default.png', '', 'MECH', 2147483647),
(12, 2147483647, 'Frank', 'Wilson', 'frank.wilson@example.com', 'password6', 'profile_default.png', '', 'CSE', 2147483647),
(13, 2147483647, 'Grace', 'Martinez', 'grace.martinez@example.com', 'password7', 'profile_default.png', '', 'AIML', 1526079541),
(14, 2147483647, 'Henry', 'Hernandez', 'henry.hernandez@example.com', 'password8', 'profile_default.png', '', 'CSE', 2147483647),
(15, 2147483647, 'Isabella', 'Garcia', 'isabella.garcia@example.com', 'password9', 'profile_default.png', '', 'CSE', 2147483647),
(16, 2147483647, 'Jack', 'Lopez', 'jack.lopez@example.com', 'password10', 'profile_default.png', '', 'ISE', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
