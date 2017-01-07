-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 12:30 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_pass` varchar(200) NOT NULL,
  `real_pass` varchar(200) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_name`, `admin_email`, `admin_pass`, `real_pass`, `register_date`) VALUES
(1, 'Osemeke Samuel', 'info@aol.com', '7b84020a833f215daf983cb9f48043dd06ecf709', 'church2', '2016-12-12 18:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `articleID` int(200) NOT NULL,
  `article_title` varchar(400) NOT NULL,
  `article_category` int(20) NOT NULL,
  `article_body` text NOT NULL,
  `article_image` text NOT NULL,
  `article_music` varchar(200) NOT NULL,
  `article_video` varchar(200) NOT NULL,
  `article_counter` int(200) NOT NULL,
  `article_source` varchar(400) NOT NULL,
  `article_url` varchar(200) NOT NULL,
  `article_author` varchar(200) NOT NULL,
  `article_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `article_title`, `article_category`, `article_body`, `article_image`, `article_music`, `article_video`, `article_counter`, `article_source`, `article_url`, `article_author`, `article_date`) VALUES
(7, 'I love Web Designing and Development', 4, 'I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer I am a web designer', '14650232_10205780067655722_7045072381415977637_n.jpg', '', '', 29, 'source.com', 'i-love-web-designing-and-development.html', 'admin', '2016-12-21 11:54:19'),
(8, 'Merry Christmas: The Season of Love', 3, 'Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,Merry Christmas, The season of love,', '14572783_10205756810674312_8169103769961686346_n.jpg', '', '', 29, 'source.net', 'merry-christmas--the-season-of-love.html', 'admin', '2016-12-25 23:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `category_url` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `category`, `category_url`) VALUES
(1, 'Editorials', 'editorials.html'),
(2, 'News', 'news.html'),
(3, 'Videos', 'videos.html'),
(4, 'Music', 'music.html');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(200) NOT NULL,
  `comment_name` varchar(250) NOT NULL,
  `comment_message` text NOT NULL,
  `comment_url` varchar(300) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `comment_name`, `comment_message`, `comment_url`, `comment_date`) VALUES
(1, 'osemeke', 'i love web designing', 'i-love-my.html', '2016-12-12 18:54:28'),
(2, 'osemske', 'You are so beautiful. Come on, i see no changes, pull the trigger, kill the niger is the order of the day. i swear that the way it is.You are so beautiful. Come on, i see no changes, pull the trigger, kill the niger is the order of the day. i swear that the way it is.You are so beautiful. Come on, i see no changes, pull the trigger, kill the niger is the order of the day. i swear that the way it is.You are so beautiful. Come on, i see no changes, pull the trigger, kill the niger is the order of the day. i swear that the way it is.', 'merry-christmas--the-season-of-love.html', '2016-12-28 17:55:09'),
(3, 'chaadaf', 'adskajdsklas', 'i-love-web-designing-and-development.html', '2017-01-05 14:39:24'),
(4, 'osemeke samuel', 'jkawejdfaldf;asldkfcas', 'merry-christmas--the-season-of-love.html', '2017-01-05 15:42:34'),
(5, 'osemeke samuel', 'djtukygdtyjyh', 'merry-christmas--the-season-of-love.html', '2017-01-05 15:43:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`), ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleID` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
