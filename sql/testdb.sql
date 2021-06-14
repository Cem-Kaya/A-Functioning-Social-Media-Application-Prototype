-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 10:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` char(50) NOT NULL,
  `text` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE `creates` (
  `uid` char(20) NOT NULL,
  `tid` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `picture_post`
--

CREATE TABLE `picture_post` (
  `pid` char(20) NOT NULL,
  `picture_URL` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` char(20) NOT NULL,
  `Likes` int(11) DEFAULT NULL,
  `Dislikes` int(11) DEFAULT NULL,
  `Text` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply_under`
--

CREATE TABLE `reply_under` (
  `date` date DEFAULT NULL,
  `cid1` char(50) NOT NULL,
  `cid2` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_makes`
--

CREATE TABLE `thread_makes` (
  `tid` char(20) NOT NULL,
  `pid` char(20) NOT NULL,
  `uid` char(20) DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` char(20) NOT NULL,
  `Username` char(30) DEFAULT NULL,
  `Picture_profile_url` char(100) DEFAULT NULL,
  `Info` char(100) DEFAULT NULL,
  `Join_date` date DEFAULT NULL,
  `Email` char(50) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_post`
--

CREATE TABLE `video_post` (
  `pid` char(20) NOT NULL,
  `Video_URL` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `cid` char(50) NOT NULL,
  `uid` char(20) NOT NULL,
  `pid` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `creates`
--
ALTER TABLE `creates`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `picture_post`
--
ALTER TABLE `picture_post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reply_under`
--
ALTER TABLE `reply_under`
  ADD PRIMARY KEY (`cid1`),
  ADD KEY `cid2` (`cid2`);

--
-- Indexes for table `thread_makes`
--
ALTER TABLE `thread_makes`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `video_post`
--
ALTER TABLE `video_post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `uid` (`uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creates`
--
ALTER TABLE `creates`
  ADD CONSTRAINT `creates_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `thread_makes` (`tid`) ON DELETE NO ACTION;

--
-- Constraints for table `picture_post`
--
ALTER TABLE `picture_post`
  ADD CONSTRAINT `picture_post_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `reply_under`
--
ALTER TABLE `reply_under`
  ADD CONSTRAINT `reply_under_ibfk_1` FOREIGN KEY (`cid1`) REFERENCES `comment` (`cid`) ON DELETE NO ACTION,
  ADD CONSTRAINT `reply_under_ibfk_2` FOREIGN KEY (`cid2`) REFERENCES `comment` (`cid`) ON DELETE NO ACTION;

--
-- Constraints for table `thread_makes`
--
ALTER TABLE `thread_makes`
  ADD CONSTRAINT `thread_makes_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `thread_makes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION;

--
-- Constraints for table `video_post`
--
ALTER TABLE `video_post`
  ADD CONSTRAINT `video_post_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `comment` (`cid`),
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
