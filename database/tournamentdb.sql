-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2019 at 09:38 PM
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
(1, 'Chris Jim Egot', 'jimegot@yahoo.com.ph', '2019-04-08 16:00:00', 'Administrator', '$2y$10$csTMdGnSkNrwJsW/wgIuXOD9d0fTKzjVE.I9K91X5nHGdLnR4YZ3e', NULL, '2019-04-08 16:00:00', '2019-04-08 16:00:00');

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
(101, 0, 0, 20000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chips`
--

CREATE TABLE `chips` (
  `id` int(50) NOT NULL,
  `value` int(50) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(114, 10, '10.png'),
(115, 25, 't5.png'),
(116, 100, '100.png'),
(117, 1000, '1000.png'),
(119, 10000, '10000.png');

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
  `in_seconds` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `everydaytournament`
--

INSERT INTO `everydaytournament` (`id`, `level`, `blinds`, `in_seconds`) VALUES
(101, 'Level 1', '50/100', '60'),
(102, 'Level 2', '100/200', '60'),
(103, 'Level 3', '200/400', '60'),
(104, 'Break Time - 10 mins', 'Chip Raise 25', '600'),
(105, 'Level 4', '300/600', '600'),
(106, 'Level 5', '400/800', '600'),
(107, 'Level 6', '500/1,000', '600'),
(108, 'Level 7', '600/1,200', '600'),
(109, 'Break Time - 5 mins', '-', '300'),
(110, 'Level 8', '700 Ante 100/1,400', '600'),
(111, 'Level 9', '800/1,600', '600'),
(112, 'Level 10', '900/1,800', '60'),
(113, 'Level 11', '1,000/2,000', '60'),
(114, 'END OF TOURNAMENT', '-', '0');

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
(101, 100000);

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
  `in_seconds` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `level`, `blinds`, `in_seconds`) VALUES
(101, 'Level 1', '25/50', '1200'),
(102, 'Level 2', '50/100', '1200'),
(103, 'Level 3', '100/200', '1200'),
(104, 'Level 4', '200/400', '1200'),
(105, 'Level 5', '300/600', '1200'),
(106, 'Level 6', '400/800', '1200'),
(107, 'Level 7', '200/500', 'active');

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
(2, 'Chris Jim Egot', 'sabosidochrisjim@yahoo.com', NULL, '$2y$10$csTMdGnSkNrwJsW/wgIuXOD9d0fTKzjVE.I9K91X5nHGdLnR4YZ3e', 'p71FgbOygfrOcfmtnzPiDb7yRT0PIeSekwkvoJG9NmcpVLzZNsunllzigaC6', '2019-04-08 08:05:47', '2019-04-08 08:05:47', NULL);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebuyin`
--
ALTER TABLE `ebuyin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `echips`
--
ALTER TABLE `echips`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `eprizemoney`
--
ALTER TABLE `eprizemoney`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
