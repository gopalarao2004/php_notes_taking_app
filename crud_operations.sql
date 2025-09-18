-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 07:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- creating data table
--

CREATE TABLE `data` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL PRIMARY_KEY,
  `title` varchar(128) NOT NULL,
  `content` varchar(255) NOT NULL,
  `Date` DateTime() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- inserting values into the  `data` table
--


INSERT INTO `data` (`user_id`, `id`, `title`, `content`, `date`) VALUES (11, NULL, 'php', 'php is a programming language', '2025-09-09 08:30:38');


--
-- updating values  the  `data` table
--

UPDATE `data` SET `title` = 'new title', `content` = 'content of the changing' `date` = '2025-09-09 08:30:38' WHERE `data`.`id` = 11;

--
-- deleting values from the  `data` table
--

DELETE FROM `data` WHERE `id`=11;