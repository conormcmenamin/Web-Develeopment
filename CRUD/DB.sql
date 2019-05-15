-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 04:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ebook_metadata`
--

CREATE TABLE `ebook_metadata` (
  `id` int(10) NOT NULL,
  `creator` text NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `identifier` text NOT NULL,
  `date` date NOT NULL,
  `language` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook_metadata`
--

INSERT INTO `ebook_metadata` (`id`, `creator`, `title`, `type`, `identifier`, `date`, `language`, `description`) VALUES
(30, 'Hello', 'Hi', 'Whatsup', '66', '2023-01-01', 'En', 'Nice one!'),
(32, 'jk rowling', '3', 'adventure', '294721374-5463', '2018-06-04', 'English', 'Ah, it\'s okay'),
(33, 'jk rowling', 'harry potter', 's', '294721374-5463', '2013-01-01', 'Russian', 'Sugar'),
(34, 'jk rowling', '3', 's', '294721374-5462', '2013-01-01', 'English', 'Ah, it\'s okay'),
(35, '3', 'harry potter', 'Science & Technology', '294721374-5462', '2018-06-04', 'English', 'Absolutely brilliant'),
(36, 'rob', 'harry potter', 'action', 'I don\'t need an ISBN', '3030-07-02', 'Russian', 'YES QUEEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ebook_metadata`
--
ALTER TABLE `ebook_metadata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ebook_metadata`
--
ALTER TABLE `ebook_metadata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
