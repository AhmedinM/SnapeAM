-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 09:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snape`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `description`, `picture`, `quantity`) VALUES
(5, 'Unicorn hair', 'Unicorn hair was a powerful magical substance with a variety of uses, originating on the body of a unicorn. It was frequently shed from the creature.', './images/unicorn.png', 3228),
(6, 'Mandrake', 'A Mandrake, also known as Mandragora, is a magical and sentient plant which has a root that looks like a human (like a baby when the plant is young, but maturing as the plant grows). When matured, its cry can be fatal to any person who hears it.', './images/mandrake.png', 2333),
(7, 'Dittany', 'Dittany is a magical plant used in Potion-Making. It is a powerful healing herb and restorative. Its use makes fresh skin grow over a wound and after application the wound seems several days old.[2]\r\n\r\nDittany is one of the plants found in One Thousand Magical Herbs and Fungi', './images/dittany.png', 1233);

-- --------------------------------------------------------

--
-- Table structure for table `potions`
--

CREATE TABLE `potions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(150) NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `potions`
--

INSERT INTO `potions` (`id`, `name`, `picture`, `description`, `category`, `quantity`) VALUES
(3, 'Amortentia', './images/amortentia.jpg', 'Put a kettle on, boil the water. Add teabags, dissolve the honey and add vanilla. Stir and put aside to cool for 15 minutes.\r\n\r\nRemove the teabags and refrigerate for an hour.\r\n\r\nTo serve, pour half of the tea (8 oz, 250ml) and half of the lemonade (2 oz, 60ml) into a glass and add ice to serve. Alternatively, pour the mixture into individual vials/bottles.', 'cat1', 5),
(4, 'Felix Felicis', './images/felix.jpg', 'In a large bowl or cauldron combine the lemon lime soda, lemonade, apple juice and luster dust. If using, stir in the vodka and simple syrup. Chill for one hour prior to serving for best results. Enjoy your liquid luck!\r\n\r\nCombine both ingredients in a sauce pan over high heat. Simmer until thickened, about 30 minutes.', 'cat2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `potion_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `potion_id`, `description`) VALUES
(5, 3, 'Put a kettle on, boil the water. Add teabags, dissolve the honey and add vanilla. Stir and put aside to cool for 15 minutes.\r\n\r\nRemove the teabags and refrigerate for an hour.\r\n\r\nTo serve, pour half of the tea (8 oz, 250ml) and half of the lemonade (2 oz, 60ml) into a glass and add ice to serve. Alternatively, pour the mixture into individual vials/bottles.');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`recipe_id`, `ingredient_id`, `quantity`) VALUES
(5, 5, 23),
(5, 6, 30),
(5, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `permission` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`, `admin`, `photo`) VALUES
(11, 'Severus', 'Snape', 'severus@slytherin.com', '1b24dda8bee8a09a4be9a7812b7ad250', 1, 1, './images/snape.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potions`
--
ALTER TABLE `potions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_ibfk_1` (`potion_id`);

--
-- Indexes for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`recipe_id`,`ingredient_id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `ingidient_id` (`ingredient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `potions`
--
ALTER TABLE `potions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`potion_id`) REFERENCES `potions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD CONSTRAINT `recipe_ingredient_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
