-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 05:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `colors` varchar(15) NOT NULL,
  `clothes` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `fruits` varchar(15) NOT NULL,
  `vegetables` varchar(15) NOT NULL,
  `transportation` varchar(15) NOT NULL,
  `organs` varchar(15) NOT NULL,
  `occupations` varchar(15) NOT NULL,
  `birds` varchar(15) NOT NULL,
  `sports` varchar(15) NOT NULL,
  `animals` varchar(15) NOT NULL,
  `musical` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`colors`, `clothes`, `country`, `fruits`, `vegetables`, `transportation`, `organs`, `occupations`, `birds`, `sports`, `animals`, `musical`) VALUES
('Orange', 'Sweater', 'Nepal', 'Blueberry', 'Potato', 'Truck', 'Lungs', 'Police', 'Sparrow', 'Boxing', 'Giraffe', 'Guitar'),
('Purple', 'Gown', 'Italy', 'Cherry', 'Cauliflower', 'Bicycle', 'Brain', 'Doctor', 'Crow', 'Volleyball', 'Tiger', 'Keyboard'),
('Brown', 'Jacket', 'France', 'Coconut', 'Cucumber', 'Ambulance', 'Heart', 'Teacher', 'Dove', 'Soccer', 'Camel', 'Trumpet'),
('Gray', 'Jumper', 'Germany', 'Guava', 'Peas', 'Helicopter', 'Muscles', 'Scientist', 'Parrot', 'Basketball', 'Elephant', 'Drum'),
('Maroon', 'Hoodie', 'Vietnam', 'Apple', 'Peas', 'Van', 'Liver', 'Housekeeper', 'Vulture', 'Tennis', 'Koala', 'Piano'),
('Magenta', 'Pants', 'Spain', 'Orange', 'Radish', 'Lorry', 'Stomach', 'Dentist', 'Eagle', 'Hockey', 'Monkey', 'Saxophone'),
('Lavender', 'Frock', 'Iran', 'Pineapple', 'Spinach', 'Ship', 'Kidney', 'Postman', 'Kingfisher', 'Cricket', 'Leopard', 'Violin'),
('Sliver', 'Coat', 'Greece', 'Pear', 'Broccoli', 'Subway', 'Venis', 'Pilot', 'Ostrich', 'Surfing', 'Hippopotamus', 'Flute'),
('Coral', 'Jeans', 'Russia', 'Peach', 'Corn', 'Tractor', 'Pancreas', 'Photographer', 'Turkey', 'Judo', 'Panda', 'Sitar'),
('violent', 'Skirt', 'Turkey', 'Watermelon', 'Pumpkin', 'Train', 'Skeleton', 'Painter', 'Flamingo', 'Swimming', 'Zebra', 'Banjo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
