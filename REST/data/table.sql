-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 04:57 PM
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `url` text NOT NULL,
  `thedesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `date`, `url`, `thedesc`) VALUES
(11, 'bgfhjf', '0000-00-00', 'up', ''),
(13, 'how is this happening plz help', '2019-05-02', 'https://wikihow.coom/requesthere', 'hallo'),
(14, 'conor', '2019-05-02', 'a json', ''),
(16, 'adventures of sinead ', '2019-05-02', 'https://hello.com', ''),
(17, 'yessss', '2019-05-02', 'https://hello.com', ''),
(18, 'Captain America', '2019-05-02', 'Iron man - sad', ''),
(20, 'hello there', '2019-05-02', 'hello', ''),
(21, 'adventures', '2019-05-02', 'Thanos - The Untold Story', ''),
(22, 'yessss', '2019-05-02', 'Thanos - The Untold Story', ''),
(23, 'Thanos - The Untold Truth about his methods', '2019-05-03', 'marvel.com', 'dissatisfying, one could say.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
