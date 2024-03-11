-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 07:27 PM
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
-- Database: `fbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `contentid`, `likes`) VALUES
(59, 'post', 58298412, '[{\"useremail\":\"leon@gmail.com\",\"date\":\"2023-08-14 18:40:26\"},{\"useremail\":\"KK@gmail.com\",\"date\":\"2023-08-14 18:41:17\"},{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-16 17:13:26\"}]'),
(60, 'post', 366342343068559374, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-14 17:25:11\"}]'),
(61, 'post', 9801682, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-14 17:25:45\"}]'),
(62, 'post', 1323277256810, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-14 18:38:54\"}]'),
(63, 'post', 1711, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-15 16:24:10\"}]'),
(64, 'post', 9874264903, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-15 16:44:18\"}]'),
(65, 'post', 2800156267699730064, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-15 17:06:26\"}]'),
(66, 'post', 745838757703, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-18 17:22:23\"}]'),
(67, 'post', 5040014991418678445, '[{\"useremail\":\"ashutoshroy453@gmail.com\",\"date\":\"2023-08-25 17:55:11\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `post` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` int(11) DEFAULT NULL,
  `has_image` tinyint(1) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `is_profile_image` tinyint(1) DEFAULT NULL,
  `is_cover_image` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `post`, `image`, `likes`, `date`, `comments`, `has_image`, `user_email`, `is_profile_image`, `is_cover_image`) VALUES
(262, 9801682, NULL, 'ada_wong.jpg', 1, '2023-08-14 17:25:45', NULL, 1, 'ashutoshroy453@gmail.com', 0, 1),
(267, 6982311029481988, 'this is jill', NULL, 0, '2023-08-12 15:30:57', NULL, 0, 'jill453@gmail.com', NULL, NULL),
(268, 4934063571137, 'sdas', NULL, 0, '2023-08-12 16:37:30', NULL, 0, 'leon@gmail.com', NULL, NULL),
(271, 2800156267699730064, 'hbbj', NULL, 1, '2023-08-15 17:06:26', NULL, 0, 'ashutoshroy453@gmail.com', NULL, NULL),
(276, 213916216343609106, 'sss', 'portada_resident-evil-11.jpg', 0, '2023-08-26 16:02:22', NULL, 1, 'ashutoshroy453@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(233) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `retype_password` varchar(255) DEFAULT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `cover_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `retype_password`, `profile_image`, `cover_image`) VALUES
(15, 'Ada', 'Wong', 'Female', 'ashutoshroy453@gmail.com', '$2y$10$dlH7pF8E5tKXjKbxJkIw9.u.ICscBLJTLF09/n78kj4UZjuMCCs5K', '$2y$10$axevYKamNJyPXqzm/wwdsumOJnQY6J/W9IY/u/rTtC/IpvPMTxeiG', 'ada_wong.jpg', 'ada_wong.jpg'),
(16, 'Chris', 'Redfield', 'Male', 'KK@gmail.com', '$2y$10$T75l/f7ukiEKJ7gq0ck1T.opA9o0Ytgmp91D6QQhSdJwDlXk5CB0a', '$2y$10$Wlkw818tJe2wVRnxF6XrguCLD9bQsxYLSuxcIu9LryZpxb4F790wa', 'Chris-Redfield-Resident-Evil-6-portrait-featured.jpg', 'header.jpg'),
(18, 'Leon', 'Kenndy', 'Male', 'leon@gmail.com', '$2y$10$zHK008CbPyfYfxMA0PLS2.zrsZx.stMb0eTSKcbQbn6npVOZib0/q', '$2y$10$8R8EGgOM70r.x3aLfUIdluicQyin4qZxI2vs2ih/ikg7xmMZO.vS2', 'Leon_Kennedy_in_Resident_Evil_Infinite_Darkness.jpg', 'leon.jpg'),
(22, 'Jill', 'valentine', 'Female', 'jill453@gmail.com', '$2y$10$NlTeTYC5iRkDBrEEgdJbCexB/hhnzLv85PsIPT0yq5yr4m20Pclf.', '$2y$10$jntyJaHUc1RFujirw1koheBe1bbN3UdTkuV6ZZDmymbBQsSdNZSXS', 'images.jpg', 'resident-evil-death-island-pelicula-cgi-jill.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types` (`type`),
  ADD KEY `contentid` (`contentid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `comments` (`comments`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
