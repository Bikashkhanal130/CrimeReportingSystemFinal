-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:27 AM
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
-- Database: `login`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerateCaseID` ()   BEGIN
    DECLARE new_case_id INT(4);
    SET new_case_id = FLOOR(RAND() * 9000) + 1000; -- Generate a random number between 1000 and 9999

    -- Check if the generated case ID already exists in the table
    WHILE EXISTS (SELECT * FROM your_table WHERE case_id = new_case_id) DO
        SET new_case_id = FLOOR(RAND() * 9000) + 1000; -- Generate a new random number if the previous one already exists
    END WHILE;

    -- Insert your new_case_id into your_table or use it as needed
    -- For example:
    -- INSERT INTO your_table (case_id, other_columns) VALUES (new_case_id, other_values);
    SELECT new_case_id; -- Return the generated case ID
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'ujwal', '$2y$10$9kU851qNmFeIwu0hiPTkluL1XgoyBBnfF29HOzYV7Lj7vjJJDh7FK'),
(2, 'ujwalzz', '$2y$10$t8y.szD3yXMxee29pGDnb.nGjHQecIwKlEM78eoo.Ghb69Hm1mTs2'),
(3, 'lsfhfsk', '$2y$10$IOVN5YloK/Efrz3AxErIgeQDBDOUpiAVfTZVabCRxWj6pK.0AUKCa'),
(4, 'bikram rathor', '$2y$10$x/99iPKmTu4domCoxoagiuIYU5G.L5dtLXa7cdDD.qtQCwoL2ZHka');

-- --------------------------------------------------------

--
-- Table structure for table `anonymous_reports`
--

CREATE TABLE `anonymous_reports` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anonymous_reports`
--

INSERT INTO `anonymous_reports` (`id`, `report_type`, `description`, `image_path`, `video_path`, `created_at`) VALUES
(14, 'assault', 'asdf', 'anon_uploads/image/image_66740fa2422f4_Firefly 20240518195141.png', 'anon_uploads/video/video_66740fa2425da_Inside the World\'s Most Luxurious Private Islands.mp4', '2024-06-20 11:16:50'),
(18, 'assault', 'ujwal', 'anon_uploads/image/image_66745b78710ff_example (1).jpg', 'anon_uploads/video/video_66745b787129b_2024_03_26_13_41_IMG_6037.MP4', '2024-06-20 16:40:24'),
(19, 'assault', 'ujwal', 'anon_uploads/image/image_6675828bad705_example (1).jpg', 'anon_uploads/video/video_6675828badd23_2024_03_26_13_41_IMG_6037.MP4', '2024-06-21 13:39:23'),
(20, 'assault', 'fefwefw', NULL, NULL, '2024-06-21 13:39:29'),
(21, 'assault', 'kljlj', 'anon_uploads/image/image_6677e4bb4f87f_2024_03_27_21_02_IMG_6039.JPG', 'anon_uploads/video/video_6677e4bb4fb9f_2024_03_26_13_41_IMG_6037.MP4', '2024-06-23 09:02:51'),
(22, 'assault', 'kljlj', 'anon_uploads/image/image_6677e535c4e63_2024_03_27_21_02_IMG_6039.JPG', 'anon_uploads/video/video_6677e535c5095_2024_03_26_13_41_IMG_6037.MP4', '2024-06-23 09:04:53'),
(23, 'assault', 'erggr', 'anon_uploads/image/image_6677e55a3a9a2_2024_03_24_21_35_IMG_6032.JPG', 'anon_uploads/video/video_6677e55a3abef_2024_03_26_13_39_IMG_6035.MP4', '2024-06-23 09:05:30'),
(24, 'assault', 'erggr', 'anon_uploads/image/image_6677e5770bf99_2024_03_24_21_35_IMG_6032.JPG', 'anon_uploads/video/video_6677e5770c22d_2024_03_26_13_39_IMG_6035.MP4', '2024-06-23 09:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp_code` varchar(6) DEFAULT NULL,
  `verified` int(11) DEFAULT 0,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `password`, `otp_code`, `verified`, `role`) VALUES
(22, 'Ujwal', 'peliso@citmo.net', '$2y$10$YmU.gAkKSVptYb1C9XD4q.INeEewETHP4dgM74fofZUe4yWDLHtae', NULL, 1, 'user'),
(23, 'Bikash Khanal ', 'recuqepo@pelagius.net', '$2y$10$CFnvZsm4V0hWXz3yOn0JnOxrZC1Tau.3DqszHM2mnw42CXU9uwS/2', NULL, 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `report_crime`
--

CREATE TABLE `report_crime` (
  `report_type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Verification` varchar(50) DEFAULT 'pending',
  `status` varchar(50) DEFAULT 'Pending',
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `case_id` varchar(4) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `admin_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_crime`
--

INSERT INTO `report_crime` (`report_type`, `name`, `phone`, `address`, `description`, `submission_date`, `Verification`, `status`, `image`, `video`, `case_id`, `id`, `admin_remarks`) VALUES
('assault', 'ujwaal', '9893283792', 'dakshin', 'dakshin', '2024-06-23 11:52:29', 'verified', 'Solved', 'uploads/images/image_66780c7deaa78_2024_03_24_21_35_IMG_6032.JPG', 'uploads/videos/video_66780c7deabfe_2024_03_26_13_39_IMG_6035.MP4', 'wEvV', 45, 'qww'),
('assault', 'df', '33443', 'sfd', 'sfd', '2024-06-23 12:06:24', 'verified', 'Solved', NULL, NULL, 'bDvK', 46, 'qww'),
('assault', 'ff', '355', 'df', 'df', '2024-06-23 15:04:04', 'pending', 'Solved', NULL, NULL, 'Ljvy', 47, 'qww');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `anonymous_reports`
--
ALTER TABLE `anonymous_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_crime`
--
ALTER TABLE `report_crime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anonymous_reports`
--
ALTER TABLE `anonymous_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `report_crime`
--
ALTER TABLE `report_crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
