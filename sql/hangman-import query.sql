-- Create the 'hangman' database if not exists
CREATE DATABASE IF NOT EXISTS `hangman`;

-- Switch to the 'hangman' database
USE `hangman`;

-- Create the 'role' table
CREATE TABLE IF NOT EXISTS `role` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` char(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into 'role' table
INSERT INTO `role` VALUES (1,'user'), (2,'admin');

-- Create the 'login_data' table
CREATE TABLE IF NOT EXISTS `login_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `login_data_FK` (`role`),
  CONSTRAINT `login_data_FK` FOREIGN KEY (`role`) REFERENCES `role` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into 'login_data' table
INSERT INTO `login_data` VALUES (1,'ram123','1234567','ram@gmail.com',1);
