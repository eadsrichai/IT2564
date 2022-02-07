-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 02:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krabi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(3) NOT NULL,
  `a_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `a_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(10) NOT NULL,
  `c_text` text COLLATE utf8_unicode_ci NOT NULL,
  `c_date` datetime NOT NULL,
  `c_postid` int(5) NOT NULL,
  `c_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `f_id` int(6) NOT NULL,
  `f_ownerid` int(3) NOT NULL,
  `f_friendid` int(3) NOT NULL,
  `f_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(3) NOT NULL,
  `m_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `m_address` text COLLATE utf8_unicode_ci NOT NULL,
  `m_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_img` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'def.jpg',
  `m_count` int(10) NOT NULL DEFAULT 0,
  `m_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_name`, `m_mobile`, `m_address`, `m_email`, `m_password`, `m_img`, `m_count`, `m_status`) VALUES
(1, 'ทวีชัย จันทะภา', '', '', 'dome@gmail.com', '123', 'def.jpg', 0, 0),
(2, 'ธีระภูวนัย ชะนะชัยสมบัติ', '', '', 'pouse@gmail.com', '123', 'def.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(5) NOT NULL,
  `p_text` text COLLATE utf8_unicode_ci NOT NULL,
  `p_img` text COLLATE utf8_unicode_ci NOT NULL,
  `p_count` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `p_date` datetime NOT NULL,
  `p_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `p_love` int(10) NOT NULL DEFAULT 0,
  `p_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `f_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
