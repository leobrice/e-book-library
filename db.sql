-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `Library`;

SET NAMES utf8mb4;

CREATE TABLE `Admin` (
  `Admin_Id` int(3) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `Privilage` int(1) NOT NULL DEFAULT 1 COMMENT 'All Access (Super User)',
  PRIMARY KEY (`Admin_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Admin` (`Admin_Id`, `Username`, `Email`, `Password`, `CreatedAt`, `Privilage`) VALUES
(1,	'Admin',	'mushibrayson07@gmail.com',	'123',	'2023-04-21 17:03:25',	1);

CREATE TABLE `Books_table` (
  `Book_Id` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Category_Id` int(3) DEFAULT NULL,
  `Author` varchar(200) DEFAULT NULL,
  `Image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Book_Id`),
  KEY `Category_Id` (`Category_Id`),
  CONSTRAINT `Books_table_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`Category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Books_table` (`Book_Id`, `Name`, `Category_Id`, `Author`, `Image`, `Path`, `CreatedAt`) VALUES
(13,	'Chess The Complete Begginner\\\'s Guide',	3,	'Henry Ingram',	'./assets/images/image.MPQ7U2.png',	'./assets/books/Chess_The_Complete_Beginner\'s_Guide_to_Playing_Chess_Chess_Openings(2).pdf',	'2024-10-16 09:20:15');

CREATE TABLE `category` (
  `Category_Id` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`Category_Id`, `Name`, `CreatedAt`) VALUES
(1,	'Science',	'2024-10-15 16:54:09'),
(2,	'Arts',	'2024-10-15 16:54:14'),
(3,	'Sports',	'2024-10-15 16:54:22'),
(4,	'Novel',	'2024-10-15 16:54:29');

CREATE TABLE `message` (
  `Id` int(3) NOT NULL COMMENT 'UserID',
  `Subject` varchar(50) NOT NULL COMMENT 'Subject of Message',
  `Message` varchar(250) NOT NULL COMMENT 'Message',
  KEY `Id` (`Id`),
  CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `message` (`Id`, `Subject`, `Message`) VALUES
(4,	'Books',	'new Css book');

CREATE TABLE `users` (
  `Id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'UserID',
  `Username` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `token` varchar(255) NOT NULL,
  `Privilage` int(1) NOT NULL DEFAULT 0 COMMENT 'Limited Access (Normal User)',
  `CreatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`Id`, `Username`, `Email`, `Password`, `token`, `Privilage`, `CreatedAt`) VALUES
(4,	'Bry',	'bry@gmail.com',	'321',	'bry',	0,	'2023-05-05 05:14:21'),
(35,	'Kelvin',	'kelvinaloyce001@gmail.com',	'12345',	'3417176e5832ea0b501441e67effcb77',	0,	'2023-05-04 15:53:19'),
(46,	'bryce',	'bryce@gmail.com',	'321',	'',	0,	'2023-05-03 05:12:05'),
(50,	'pixon301',	'pixon@123.com',	'123pixon',	'9c5d1ad69229b33e8a123406fe185325',	0,	'2023-05-02 06:59:50'),
(55,	'faraja kingsley',	'farajakingsley89@gmail.com',	'asdfghjkl',	'88aeec6c3741b8b545d3f8059d68135a',	0,	'2023-05-08 02:37:52'),
(56,	'max',	'max03@gmail.com',	'max0',	'472874330c0ab89c23675bae7ec5ac0f',	0,	'2023-05-08 03:22:15'),
(57,	'dada',	'dada@gmail.com',	'1234567890',	'81f97f53e9248be22b810f444d97e957',	0,	'2023-05-08 06:10:15');

CREATE TABLE `User_Favourites` (
  `No` int(3) NOT NULL AUTO_INCREMENT,
  `Id` int(3) NOT NULL COMMENT 'UserID',
  `Book_Id` int(4) NOT NULL,
  `Status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`No`),
  KEY `Id` (`Id`),
  KEY `Book_Id` (`Book_Id`),
  CONSTRAINT `User_Favourites_ibfk_3` FOREIGN KEY (`Id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE,
  CONSTRAINT `User_Favourites_ibfk_4` FOREIGN KEY (`Book_Id`) REFERENCES `Books_table` (`Book_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2024-10-16 09:35:12
