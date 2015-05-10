-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2015 at 03:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_forum`
--
CREATE DATABASE IF NOT EXISTS `php_forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `php_forum`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `userName` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `content` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `userEmail` varchar(45) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questionId`, `userName`, `content`, `userEmail`) VALUES
(80, 54, 'Mike', 'Hi,\r\nI am here!', NULL),
(81, 54, 'Stranger', 'I an not registered, but I can answer.', 'Stranger@asd.gg'),
(82, 54, 'Some guy', 'A am also not registered, but I am not giving my e-mail!', ''),
(84, 55, 'minka', 'Don`t know..', NULL),
(85, 55, 'admin', 'Ready enough!', NULL),
(86, 59, 'Stranger', 'I have too', ''),
(87, 59, 'Random guy', 'Ask them!', 'random@gfg.bg'),
(88, 59, 'Gosho', 'I`ve got the answers!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(20, 'Angular'),
(11, 'Common'),
(15, 'Csharp'),
(19, 'Css'),
(18, 'Html'),
(16, 'Java'),
(17, 'Javascript'),
(12, 'Php'),
(13, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `userName` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `content` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `category` varchar(45) COLLATE latin1_general_ci NOT NULL DEFAULT 'common',
  `visits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `userName`, `title`, `content`, `category`, `visits`) VALUES
(54, 'admin', 'Is there anybody?', 'Who is in D Forum?', 'Common', 16),
(55, 'Mike', 'About the forum', 'Is the forum ready?', 'Common', 11),
(59, 'qq', 'PHP problem', 'I have some questions about PHP!', 'Php', 10),
(61, 'Gosho', 'CSharp', ' When is the CSharp exam?', 'Programming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_tags`
--

DROP TABLE IF EXISTS `question_tags`;
CREATE TABLE IF NOT EXISTS `question_tags` (
  `questionId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `question_tags`
--

INSERT INTO `question_tags` (`questionId`, `tagId`) VALUES
(54, 29),
(54, 30),
(55, 31),
(55, 32),
(59, 36),
(59, 30),
(61, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `questionId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `questionId`) VALUES
(29, 'Hello', NULL),
(30, 'Programming', NULL),
(31, 'Forum', NULL),
(32, 'faq', NULL),
(36, 'Php', NULL),
(38, 'Csharp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `fname` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `lname` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `isAdmin`) VALUES
(22, 'admin', '$2y$10$Mz4TmGFKxujZMwemqRwaR.Zm4xYAZt46stEMyN/NMwM.z0kmcqwhy', 'Admin', 'Admin', 'admin@forum.coom', b'1'),
(23, 'Mike', '$2y$10$FXCk5lT5iYBnB4PtmAs8hOt/vhXL.FMNs4xN3EtclppEmxXaeg32G', 'Mike', 'Mdfka', 'mike@asd.bg', b'0'),
(24, 'minka', '$2y$10$jYaN.IXRtzWJ6mvGSv1vN.xRn.C3HQqNLbtMQE7ztfDE1SN8lBiIq', 'Minka', 'Jecheva', 'minka@asd.gg', b'0'),
(25, 'Gogo', '$2y$10$SwPCEj497jRw5QMhjy3lD.mFzOpG1sNjDPy9tAKP5h2tcO1wA7DAq', 'Gosho', 'Bicha', 'gog@asg.bg', b'0'),
(26, 'qq', '$2y$10$v/5fzncKR687BIqFSDnsKO7NVg31BiN9pKnUIUjT4U62QEEKF6E52', '', '', 'qq@qq.bg', b'0'),
(27, 'Gosho', '$2y$10$VRlxgYeKNi8jhbmZvp4HXOYPrgOFNmXPu8qL341E4iqRKSqHAIuuC', 'Gosho', 'Bicha', 'gogo@gg.gb', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`questionId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionCategories_idx` (`category`);

--
-- Indexes for table `question_tags`
--
ALTER TABLE `question_tags`
  ADD KEY `qu_idx` (`questionId`),
  ADD KEY `tg_idx` (`tagId`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `questionToAnswer` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_tags`
--
ALTER TABLE `question_tags`
  ADD CONSTRAINT `qu` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tg` FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
