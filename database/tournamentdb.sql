-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2019 at 01:29 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tournamentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `usertype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chris Jim Egot', 'jimegot@yahoo.com.ph', '2019-04-08 16:00:00', 'Administrator', '$2y$10$/2EBMqbmnWE51OZETZ8KTuMNuuWMCtWX6yiAiGZzR4mQtXCK9M.Iy', NULL, '2019-04-08 16:00:00', '2019-04-08 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buyin`
--

CREATE TABLE `buyin` (
  `id` int(50) NOT NULL,
  `totalplayers` int(50) NOT NULL,
  `totalbuyer` int(50) NOT NULL,
  `buyinamount` int(50) NOT NULL,
  `totalchips` int(50) NOT NULL,
  `averagechips` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyin`
--

INSERT INTO `buyin` (`id`, `totalplayers`, `totalbuyer`, `buyinamount`, `totalchips`, `averagechips`) VALUES
(101, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chips`
--

CREATE TABLE `chips` (
  `id` int(50) NOT NULL,
  `value` int(50) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chips`
--

INSERT INTO `chips` (`id`, `value`, `images`) VALUES
(1, 10, '10.png'),
(2, 25, 't5.png'),
(3, 100, '100.png'),
(4, 1000, '1000.png'),
(6, 10000, '10000.png');

-- --------------------------------------------------------

--
-- Table structure for table `ebuyin`
--

CREATE TABLE `ebuyin` (
  `id` int(50) NOT NULL,
  `etotalplayers` int(50) NOT NULL,
  `etotalbuyer` int(50) NOT NULL,
  `ebuyinamount` int(50) NOT NULL,
  `etotalchips` int(50) NOT NULL,
  `eaveragechips` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebuyin`
--

INSERT INTO `ebuyin` (`id`, `etotalplayers`, `etotalbuyer`, `ebuyinamount`, `etotalchips`, `eaveragechips`) VALUES
(101, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `echips`
--

CREATE TABLE `echips` (
  `id` int(50) NOT NULL,
  `value` int(50) DEFAULT NULL,
  `images` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `echips`
--

INSERT INTO `echips` (`id`, `value`, `images`) VALUES
(121, 10, '10.png'),
(122, 25, 't5.png'),
(123, 100, '100.png'),
(124, 1000, '1000.png'),
(125, 10000, '10000.png');

-- --------------------------------------------------------

--
-- Table structure for table `eprizemoney`
--

CREATE TABLE `eprizemoney` (
  `id` int(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eprizemoney`
--

INSERT INTO `eprizemoney` (`id`, `place`, `amount`) VALUES
(101, '1st', '.45'),
(102, '2nd', '.3375'),
(103, '3rd', '.2124');

-- --------------------------------------------------------

--
-- Table structure for table `everydayprize`
--

CREATE TABLE `everydayprize` (
  `id` int(50) NOT NULL,
  `totalprize` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `everydayprize`
--

INSERT INTO `everydayprize` (`id`, `totalprize`) VALUES
(101, '0');

-- --------------------------------------------------------

--
-- Table structure for table `everydaytournament`
--

CREATE TABLE `everydaytournament` (
  `id` int(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `blinds` varchar(50) NOT NULL,
  `in_minutes` int(50) NOT NULL,
  `in_seconds` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `everydaytournament`
--

INSERT INTO `everydaytournament` (`id`, `level`, `blinds`, `in_minutes`, `in_seconds`) VALUES
(101, 'Level 1', '50/100', 10, 600),
(102, 'Level 2', '100/200', 10, 600),
(103, 'Level 3', '200/400', 10, 600),
(104, 'Break Time - 10 mins', 'Chip Raise 25', 10, 600),
(105, 'Level 4', '300/600', 10, 600),
(106, 'Level 5', '400/800', 10, 600),
(107, 'Level 6', '500/1,000', 10, 600),
(108, 'Level 7', '600/1,200', 10, 600),
(109, 'Break Time - 5 mins', '-', 5, 300),
(110, 'Level 8', '700 Ante 100/1,400', 10, 600),
(111, 'Level 9', '800/1,600', 10, 600),
(112, 'Level 10', '900/1,800', 10, 600),
(113, 'Level 11', '1,000/2,000', 10, 600),
(114, 'END OF TOURNAMENT', '-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE `prize` (
  `id` int(50) NOT NULL,
  `totalprize` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`id`, `totalprize`) VALUES
(101, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prizemoney`
--

CREATE TABLE `prizemoney` (
  `id` int(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prizemoney`
--

INSERT INTO `prizemoney` (`id`, `place`, `amount`) VALUES
(101, '1st', '.29'),
(102, '2nd', '.1865'),
(103, '3rd', '.1375'),
(104, '4th', '.095'),
(105, '5th', '.0775'),
(106, '6th', '.0630'),
(107, '7th', '.0525'),
(108, '8th', '.0415'),
(109, '9th', '.0315'),
(110, '10th', '.0250');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `blinds` varchar(50) NOT NULL,
  `in_minutes` int(50) NOT NULL,
  `in_seconds` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `level`, `blinds`, `in_minutes`, `in_seconds`) VALUES
(1, 'Level 1', '25/50', 20, 1200),
(2, 'Level 2', '50/100', 20, 1200),
(3, 'Level 3', '100/200', 20, 1200),
(4, 'Level 4', '200/400', 20, 1200),
(5, 'Level 5', '300/600', 20, 1200),
(6, 'Level 6', '400/800', 20, 1200),
(7, 'Break Time - 30 Mins', 'Dinner', 30, 1800),
(8, 'Level 7', '500/1,000 Ante 50', 20, 1200),
(9, 'Level 8', '600/1,200 Ante 50', 20, 1200),
(10, 'Level 9', '700/1,400 Ante 100', 20, 1200),
(11, 'Level 10', '800/1,600 Ante 100', 20, 1200),
(12, 'Level 11', '900/1,800 Ante 200', 20, 1200),
(13, 'Level 12', '1,000/2,000 Ante 200', 20, 1200),
(14, 'Break Time - 10 Mins', 'Chip-Up', 10, 600),
(15, 'Level 13', '1,200/2,400 Ante 300', 20, 1200),
(16, 'Level 14', '1,300/2,600 Ante 300', 20, 1200),
(17, 'Level 15', '1,400/2,800 Ante 400', 20, 1200),
(18, 'Level 16', '1,500/3,000 Ante 400', 20, 1200),
(19, 'Level 17', '1,600/3,200 Ante 400', 20, 1200),
(20, 'Level 18', '1,800/3,600 Ante 500', 20, 1200),
(21, 'Break Time - 10 Mins', '-', 10, 600),
(22, 'Level 19', '2,000/4,000 Ante 500', 20, 1200),
(23, 'Level 20', '2,200/4,400 Ante 500', 20, 1200),
(24, 'Level 21', '2,500/5,000 Ante 1,000', 20, 1200),
(25, 'Level 22', '3,000/6,000 Ante 1,000', 20, 1200),
(26, 'Level 23', '3,500/7,000 Ante 2,000', 20, 1200),
(27, 'Level 24', '4,000/8,000 Ante 2,000', 20, 1200),
(28, 'Break Time - 5 Mins', '-', 5, 300),
(29, 'Level 25', '4,500/9,000 Ante 3,000', 20, 1200),
(30, 'Level 26', '5,000/10,000 Ante 4,000', 20, 1200),
(31, 'Level 27', '6,000/12,000 Ante 5,000', 20, 1200),
(32, 'Level 28', '8,000/16,000 Ante 5,000', 20, 1200),
(33, 'Level 29', '10,000/20,000 Ante 10,000', 20, 1200),
(34, 'Level 30', '20,000/40,000 Ante 10,000', 20, 1200),
(35, 'END OF TOURNAMENT', '-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usertype`) VALUES
(3, 'Admin', 'admin@yahoo.com', NULL, '$2y$10$xXpUtLD5mw6dBldIdchMU.pTE/ewDQKi8t1quqOLdG5vSsB/e.YHC', NULL, '2019-08-24 05:27:07', '2019-08-24 05:27:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `buyin`
--
ALTER TABLE `buyin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chips`
--
ALTER TABLE `chips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebuyin`
--
ALTER TABLE `ebuyin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `echips`
--
ALTER TABLE `echips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eprizemoney`
--
ALTER TABLE `eprizemoney`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `everydayprize`
--
ALTER TABLE `everydayprize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `everydaytournament`
--
ALTER TABLE `everydaytournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prizemoney`
--
ALTER TABLE `prizemoney`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyin`
--
ALTER TABLE `buyin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `chips`
--
ALTER TABLE `chips`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ebuyin`
--
ALTER TABLE `ebuyin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `echips`
--
ALTER TABLE `echips`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `eprizemoney`
--
ALTER TABLE `eprizemoney`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `everydayprize`
--
ALTER TABLE `everydayprize`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `everydaytournament`
--
ALTER TABLE `everydaytournament`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `prize`
--
ALTER TABLE `prize`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `prizemoney`
--
ALTER TABLE `prizemoney`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
