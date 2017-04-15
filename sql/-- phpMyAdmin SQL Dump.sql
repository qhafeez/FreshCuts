-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2017 at 10:43 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `FreshCuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `picture_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`picture_id`, `image`, `caption`) VALUES
(104, 'uploads/13709772_1813267032239033_4761442755264718208_n.jpg', 'The Team'),
(105, 'uploads/13710056_1813271178905285_6634826581933916769_n.jpg', 'Balayage'),
(106, 'uploads/13754228_1813968098835593_6520791486808993062_n.jpg', 'Fun Times!'),
(107, 'uploads/13939557_1826466457585757_1525156473581384687_n.jpg', 'Straightening');

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `service_id` int(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `service_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `service_price` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`service_id`, `category_id`, `service_name`, `service_price`) VALUES
(90, 2, 'Men&#39;s HairCut34', '23.00'),
(94, 2, 'Women&#39;s Cut', '20.00'),
(95, 2, 'Senior Men&#39;s Cut', '20.00'),
(96, 2, 'Senior Women&#39;s Cut', '20.00'),
(97, 3, 'Coloring', '40.00'),
(98, 3, 'Red', '400.00'),
(100, 3, 'blue', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `Service_Category`
--

CREATE TABLE `Service_Category` (
  `category_id` int(50) NOT NULL,
  `CategoryName` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Service_Category`
--

INSERT INTO `Service_Category` (`category_id`, `CategoryName`) VALUES
(15, 'Baldness'),
(21, 'Best Category'),
(3, 'Color Services'),
(5, 'Extensions'),
(2, 'Hair Cuts'),
(17, 'HairStyles'),
(4, 'Keratin Treatment'),
(8, 'Nails'),
(6, 'Permanent'),
(7, 'Style & Bridal'),
(18, 'The New Category'),
(9, 'Treatments'),
(24, 'asdfghjkl;'),
(22, 'bestest category'),
(26, 'categorically'),
(27, 'ff'),
(25, 'the greatest category'),
(20, 'the new new category'),
(23, 'the real bestest category again');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `first_name`, `last_name`, `user_name`, `password`) VALUES
(1, '', '', 'misaq', '9876'),
(2, '', '', 'qasim', '1234'),
(3, '', '', 'qwerty', '98765'),
(4, '', '', 'cats', 'dogs'),
(5, '', '', 'dogs', 'doggies'),
(6, '', '', 'kitties', 'cats'),
(7, '', '', 'THUGGIN', 'THUGSS'),
(8, '', '', 'port', 'trop'),
(9, '', '', 'PIG', 'GIP'),
(10, '', '', 'hunter', 'beef'),
(11, '', '', 'you', 'tube'),
(12, '', '', 'catsup', 'mayo'),
(15, '', '', 'TENSOPLAST', '$2y$10$/ujTXtNR1c4w30XmglYF9OUvRvmL/XYwGoaeWtcrn9XRZ2NmD/G2.'),
(16, '', '', 'polar', '$2y$10$kSJAl9vmqxdtlTsIUWjfBOMhvgYk6WdkqpID.DgvboFDSMA5QjFxK'),
(17, '', '', 'glide', '$2y$10$.icu0KQggCzO14J1n3my.u9H4GZcogpnNE4v85anBt4qYSBrpSZmu'),
(18, '', '', 'lew', '$2y$10$7wJmiVO7JaCoVMME6GwJoepOktaw7h42g/Sls9wywzfNrLl5.k1e6'),
(19, '', '', 'mike', '$2y$10$H5pM3xcYCQiBzWZUtucmyejaKPjPiJaGQYW5YE.YWCkqgHLjQ7Ic.'),
(20, '', '', 'fasfsadf', '$2y$10$AqYWIZcMRnQn7mCZv9HU9.z4RYN/Jt4cF3f3BQXdQgBeQPLBOsWd6'),
(21, '', '', 'q', '$2y$10$13bb3Fwr8x0w3RwTFwYHpepDqvozYo7gvOY4Z/6FNmZlgBnacUSUe'),
(22, '', '', 'macys', '$2y$10$HG/7ghPN3od1cxLUVdkMQe7Xgqa1wiAi0EhZqGZ4KFPT.npLhsj/S'),
(23, '', '', 'burdine', '$2y$10$UzbUzknzqOLQoj5NWz1vauRzEs6yX8yiRx617D2wbwHw7YfcjCpJi'),
(24, '', '', 'dillard', '$2y$10$uIjShvIjbc8mzGelzwtRsOnu0dC8gG7EXRz4xJw1CfhxiA2V/fq0m'),
(25, '', '', 'polo', '$2y$10$FePOo3yULqm3ktqrmbRx3edTlcgfog52bDq6wnMSB6om470/eUp9i'),
(26, 'Qasim', 'Hafeez', 'LysolNatural', '$2y$10$bMuDumRszlXB.nuDN01/N.fSD0hQcmfEtIhYVTQuAXR6hrcpZWLBO'),
(27, 'Bhagwan', 'Rajneesh', 'bhagwanshreerajneesh', '$2y$10$jmfKdTd7nTJDlBBJqagwOenNGYusMwnz8yoxZyS7o4i/JT4rfcdnS'),
(28, 'tensoplast', 'tape', 'tapetape', '$2y$10$RaWe.lNUChIOhulC4ZXrOOQvyA.hzXDri7rTPqF/2CFzHbs6lDBoK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- Indexes for table `Service_Category`
--
ALTER TABLE `Service_Category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `Service_Category`
--
ALTER TABLE `Service_Category`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;