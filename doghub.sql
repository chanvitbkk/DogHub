-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 26, 2021 at 02:43 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `doghub`
--

-- --------------------------------------------------------

--
-- Table structure for table `hashlist`
--

CREATE TABLE `hashlist` (
  `HID` bigint(10) NOT NULL,
  `UID` bigint(10) NOT NULL,
  `Hashkey` varchar(255) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `Assignment` varchar(5) NOT NULL,
  `Note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hashlist`
--

INSERT INTO `hashlist` (`HID`, `UID`, `Hashkey`, `Filename`, `Assignment`, `Note`) VALUES
(2, 1, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test0', 'Yes', '-'),
(3, 17, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test1', 'Yes', '-'),
(4, 23, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test2', 'No', '-'),
(5, 24, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test2', 'Yes', '-'),
(6, 26, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test3', 'No', '-'),
(7, 28, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test4', 'No', '-'),
(8, 29, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test5', 'No', '-'),
(9, 36, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'Test6', 'Yes', '-'),
(10, 1, 'QmNjvRrZUGLxGQpZTfthk2kBq5rphjMbKBNZZjbtXkwmdn', 'now', 'No', '-'),
(11, 17, 'QmWEz5UzBqRVXqKhzeUGvmZ1SA1kHP1EGuJ6rT4vKCzqDf', 'timhere', 'Yes', '-');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `UID` bigint(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Ustatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`UID`, `Username`, `Password`, `Fname`, `Lname`, `Ustatus`) VALUES
(1, 'chaneiei', '1234', 'Chanvit', 'Moungyoo', 'Student'),
(17, 'timfrei', '1234', 'Tim', 'Friedhoff', 'Teacher'),
(18, 'unknown', '1234', 'Tanakorn', 'Kantasuwan', 'Student'),
(19, 'nutty74', '1234', 'Nutchaya', 'Phumekam', 'Student'),
(20, 'davidgu', '1234', 'David', 'Guetta', 'Teacher'),
(21, 'edhshee', '1234', 'Ed', 'Sheeran', 'Teacher'),
(22, 'nickistarship', '1234', 'Nicki', 'Minaj', 'Teacher'),
(23, 'kanomjeen', '1234', 'Pattraporn', 'Pajariyapong', 'Student'),
(24, 'calvinharris', '1234', 'Calvin', 'Harris', 'Teacher'),
(26, 'helloadele', '1234', 'Adele', 'Adkins', 'Teacher'),
(27, 'diamondme', '1234', 'Sam', 'Smith', 'Student'),
(28, 'austinxxx', '1234', 'Austin', 'Wolf', 'Teacher'),
(29, 'kimfer', '1234', 'Kim', 'Fershishi', 'Student'),
(30, 'keviddle', '1234', 'Kevin', 'Honne', 'Student'),
(31, 'aofmax', '1234', 'Aoffy', 'Maxim', 'Teacher'),
(32, 'michaelbu', '1234', 'Michael', 'Blube', 'Teacher'),
(33, 'petergrif', '1234', 'Peter', 'Griffin', 'Student'),
(34, 'ahmadal', '1234', 'Ahamd', 'Al-Maktoum', 'Teacher'),
(35, 'cocofrance', '1234', 'Coco', 'Chanel', 'Teacher'),
(36, 'cardiloveoffset', 'okruuuu', 'Cardi', 'B', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hashlist`
--
ALTER TABLE `hashlist`
  ADD PRIMARY KEY (`HID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hashlist`
--
ALTER TABLE `hashlist`
  MODIFY `HID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personalinfo`
--
ALTER TABLE `personalinfo`
  MODIFY `UID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hashlist`
--
ALTER TABLE `hashlist`
  ADD CONSTRAINT `hashlist_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `personalinfo` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
