-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2016 at 10:10 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(34, 'PHP'),
(35, 'Javascript'),
(36, 'Jquery'),
(37, 'Ajax'),
(38, 'Ahsan'),
(39, 'CMS'),
(40, 'Example Category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(9, 3, 'Danish khan', 'danishsnd@gmail.com', 'Sample Comment', 'approve', '2016-03-29'),
(11, 6, 'Author is me ', 'Author@gmail.com', 'Author content', 'approve', '2016-03-30'),
(12, 6, 'Its me', 'Itsme@gmail.com', 'Its my comment', 'approve', '2016-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(250) NOT NULL,
  `post_comment_count` varchar(250) NOT NULL,
  `post_status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 34, 'Content Management System', 'Ahsan ahmed khan', '2016-03-30', 'ajax.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie,', 'php', '7', 'Published'),
(2, 34, 'Ahsan Ahmed', 'karim', '2016-03-30', '12654572_10207443050668891_5959101952124823629_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie,', 'jquery', '7', 'Published'),
(3, 34, 'Example category', 'Ali Khan', '2016-03-30', 'CMS.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie,', 'cms', '7', 'Published'),
(4, 34, 'Ahsan Ahmed', 'Ali Khan', '2016-03-30', '12733493_224672211213397_6808019146815875398_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie,', 'ajax', '7', 'Published'),
(6, 34, 'Example Post', 'Ahsan ', '2016-03-30', '12654572_10207443050668891_5959101952124823629_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie,', 'php is awesome ', '2', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `randsalt` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(14, 'Ahsan ahmed pathan', '', 'Ahsan', 'Ahmed', 'ahsan@gmail.com', '12654572_10207443050668891_5959101952124823629_n.jpg', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
