-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2024 at 04:43 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u957918675_pointrover`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_maping`
--

CREATE TABLE `address_maping` (
  `mid` int(11) NOT NULL,
  `driver_trips_id` int(11) NOT NULL,
  `departure_city` varchar(200) NOT NULL,
  `departure_postal` varchar(80) DEFAULT NULL,
  `departure_province` varchar(80) DEFAULT NULL,
  `dropping_city` varchar(200) NOT NULL,
  `dropping_postal` varchar(80) DEFAULT NULL,
  `dropping_province` varchar(80) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `estimate_time` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_maping`
--

INSERT INTO `address_maping` (`mid`, `driver_trips_id`, `departure_city`, `departure_postal`, `departure_province`, `dropping_city`, `dropping_postal`, `dropping_province`, `distance`, `estimate_time`) VALUES
(189, 215, 'Brantford', '', 'ON', 'Tiverton', 'N0G 2T0', 'ON', '196 km', '2 hours 34 mins'),
(187, 213, 'Kitchener', '', 'ON', 'Listowel', '', 'ON', '55.3 km', '47 mins'),
(188, 214, 'Brantford', '', 'ON', 'Waterloo', '', 'ON', '55.0 km', '55 mins'),
(185, 211, 'Brantford', '', 'ON', 'Kitchener', '', 'ON', '52.2 km', '55 mins'),
(186, 212, 'Brantford', '', 'ON', 'Listowel', '', 'ON', '106 km', '1 hour 29 mins'),
(184, 210, 'Brantford', 'N3R 3Y7', 'ON', 'Brantford', 'N3V 1G3', 'ON', '6.3 km', '10 mins'),
(183, 209, 'Brantford', 'N3V 1G3', 'ON', 'Brantford', 'N3R 3Y7', 'ON', '6.3 km', '10 mins'),
(182, 208, 'Brantford', 'N3V 1G3', 'ON', 'Brantford', 'N3R 3Y7', 'ON', '6.3 km', '10 mins'),
(181, 207, 'Brampton', '', 'ON', 'Brantford', '', 'ON', '104 km', '1 hour 5 mins'),
(180, 206, 'Brantford', 'N3T 5L5', 'ON', 'Mississauga', 'L5P', 'ON', '105 km', '1 hour 8 mins'),
(179, 205, '', '', '', 'Brantford', 'N3R 3Y7', 'ON', '-', '-'),
(178, 204, 'Kitchener', '', 'ON', 'Oshawa', '', 'ON', '152 km', '1 hour 39 mins'),
(177, 203, 'Hamilton', 'L0R 1W0', 'ON', 'Brantford', 'N3T 5L5', 'ON', '34.0 km', '35 mins'),
(176, 202, 'Brantford', 'N3T 5L5', 'ON', 'Hamilton', 'L0R 1W0', 'ON', '34.0 km', '35 mins'),
(175, 201, 'Brantford', '', 'ON', 'Tiverton', 'N0G 2T0', 'ON', '196 km', '2 hours 34 mins'),
(174, 200, 'Brantford', '', 'ON', 'Toronto', '', 'ON', '105 km', '1 hour 17 mins'),
(173, 199, 'Brantford', '', 'ON', 'Toronto', '', 'ON', '105 km', '1 hour 17 mins'),
(172, 198, 'Brampton', 'L6P 0V2', 'ON', 'Toronto', 'M5K 1A2', 'ON', '48.1 km', '41 mins'),
(171, 197, 'Toronto', 'M5J 2Z3', 'ON', 'Toronto', 'M5J 0A9', 'ON', '0.4 km', '2 mins'),
(170, 196, 'Toronto', 'M5V 2V4', 'ON', 'Toronto', 'M5B 0C3', 'ON', '4.8 km', '17 mins'),
(169, 195, 'Toronto', 'M9W 3W8', 'ON', 'Toronto', 'M9W 3W8', 'ON', '1 m', '1 min'),
(167, 193, 'Oakville', 'L6L 0B6', 'ON', 'Toronto', 'M5B 0C3', 'ON', '47.6 km', '42 mins'),
(168, 194, 'Toronto', 'M9W 3W8', 'ON', 'Toronto', 'M5B 0C3', 'ON', '29.0 km', '28 mins'),
(164, 190, 'Vancouver', 'V5Y 1M8', 'BC', 'Toronto', 'M9W 3W8', 'ON', '4,354 km', '1 day 15 hours'),
(165, 191, 'Vancouver', 'V5Y 1M8', 'BC', 'Oakville', 'L6H 7G9', 'ON', '4,338 km', '1 day 15 hours'),
(166, 192, 'Oakville', 'L6L 0B6', 'ON', 'Burnaby', 'V3J 0A4', 'BC', '4,305 km', '1 day 15 hours'),
(163, 189, 'Vancouver', 'V5Y 1M8', 'BC', 'Oakville', 'L6L 0B6', 'ON', '4,323 km', '1 day 15 hours'),
(161, 187, 'Mississauga', 'L4T 0A5', 'ON', 'Toronto', 'M5B 0C3', 'ON', '32.5 km', '38 mins'),
(162, 188, 'Toronto', 'M5V 0E9', 'ON', 'Brampton', 'L7A 2L6', 'ON', '50.6 km', '46 mins'),
(160, 186, 'Toronto', 'M9W 3W8', 'ON', 'Mississauga', 'L4T 0A5', 'ON', '12.2 km', '15 mins'),
(190, 216, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 6G6', 'ON', '5.6 km', '10 mins'),
(191, 217, 'Toronto', 'M6R 2Z3', 'ON', 'Brantford', 'N3T 6G6', 'ON', '97.5 km', '1 hour 10 mins'),
(192, 218, 'Hamilton', 'L8M 2W1', 'ON', 'Brantford', '', 'ON', '42.0 km', '40 mins'),
(193, 219, 'Toronto', 'M1B 5N1', 'ON', 'Toronto', 'M5G 1S4', 'ON', '27.0 km', '30 mins'),
(194, 220, 'Toronto', 'M5V 1M5', 'ON', 'Brantford', 'N3T 5L5', 'ON', '108 km', '1 hour 17 mins'),
(195, 221, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 2H5', 'ON', '5.5 km', '9 mins'),
(196, 222, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 2H5', 'ON', '5.5 km', '9 mins'),
(197, 223, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 2H5', 'ON', '5.5 km', '9 mins'),
(198, 224, '', '', '', '', '', '', '-', '-'),
(199, 225, 'Sooke', 'V9Z 0L2', 'BC', 'Brantford', 'N3T 6G6', 'ON', '4,125 km', '1 day 17 hours'),
(200, 226, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 6G6', 'ON', '5.4 km', '10 mins'),
(201, 227, 'Brantford', 'N3T 5L5', 'ON', 'Greater Sudbury', 'P3E', 'ON', '480 km', '4 hours 42 mins'),
(202, 228, 'Toronto', 'M5V 1M5', 'ON', 'Toronto', 'M5K 1E6', 'ON', '2.4 km', '11 mins'),
(203, 229, 'Mississauga', 'L4Y 4G6', 'ON', 'Brampton', 'L6Y 4M3', 'ON', '16.4 km', '18 mins'),
(204, 230, 'Mississauga', 'L5N 2L3', 'ON', 'Mississauga', 'L4Y 4G6', 'ON', '16.8 km', '20 mins'),
(205, 231, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 6G6', 'ON', '5.4 km', '10 mins'),
(206, 232, 'Toronto', 'M5H 2R2', 'ON', 'New Westminster', 'V3M', 'BC', '4,187 km', '1 day 16 hours'),
(207, 233, 'Mississauga', 'L4Y 4G6', 'ON', 'Toronto', 'M5J 1E6', 'ON', '23.9 km', '24 mins'),
(208, 234, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 6G6', 'ON', '5.4 km', '10 mins'),
(209, 235, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 6G6', 'ON', '5.4 km', '10 mins'),
(210, 236, 'Mississauga', 'L4Y 4G6', 'ON', 'Toronto', 'M5J 1E6', 'ON', '23.9 km', '24 mins'),
(211, 237, 'Mississauga', 'L4W 2L2', 'ON', 'Toronto', 'M9C 2Z4', 'ON', '10.3 km', '12 mins'),
(212, 238, 'Mississauga', 'L4W 2L2', 'ON', 'Toronto', 'M9C 2Z4', 'ON', '10.3 km', '12 mins'),
(213, 239, 'Brampton', '', 'ON', 'Brantford', '', 'ON', '103 km', '1 hour 4 mins'),
(214, 240, 'Surrey', '', 'BC', 'Calgary', '', 'AB', '945 km', '10 hours 1 min'),
(215, 241, 'Brantford', 'N3T 5L5', 'ON', 'Brantford', 'N3T 2H5', 'ON', '5.5 km', '9 mins'),
(216, 242, 'Oakville', 'L6H 7G9', 'ON', 'Toronto', 'M5G 1S4', 'ON', '35.6 km', '39 mins');

-- --------------------------------------------------------

--
-- Table structure for table `driver_trips`
--

CREATE TABLE `driver_trips` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `alfa_code` varchar(15) NOT NULL,
  `type` int(5) NOT NULL COMMENT '1:driver|2:passenger',
  `departure` varchar(255) NOT NULL,
  `drop_location` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `gender` int(11) DEFAULT 3 COMMENT '1:Male|2:female|3:all',
  `available_seats` int(11) NOT NULL,
  `fare` decimal(10,2) DEFAULT NULL,
  `note` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_trips`
--

INSERT INTO `driver_trips` (`id`, `uid`, `alfa_code`, `type`, `departure`, `drop_location`, `date`, `time`, `gender`, `available_seats`, `fare`, `note`, `time_stamp`) VALUES
(195, 39, 'DRsacGrIO6', 1, '2260 Islington Avenue, Etobicoke, ON, Canada', '2260 Islington Avenue, Etobicoke, ON, Canada', '2023-10-28', '12:00:00', 3, 2, 8.00, '', '2023-10-28 05:22:58'),
(194, 39, 'DRjmNKu8ad', 1, '2260 Islington Avenue, Etobicoke, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '02:00:00', 3, 2, 7.25, '', '2023-10-28 05:22:20'),
(193, 39, 'DRguQEpxiw', 1, '3465 Wyecroft Road, Oakville, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-31', '10:35:00', 3, 2, 11.90, '', '2023-10-28 05:21:59'),
(192, 39, 'DRm7QgeqJX', 1, '3465 Wyecroft Road, Oakville, ON, Canada', '3433 North Road, Burnaby, BC, Canada', '2023-10-28', '12:00:00', 3, 3, 35.00, '', '2023-10-28 05:21:29'),
(191, 39, 'CUGj77YvdE', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '5 Drive-In, Ninth Line, Oakville, ON, Canada', '2023-10-28', '12:00:00', 0, 3, 0.00, '', '2023-10-28 05:20:33'),
(186, 39, 'CU0xXvdxoC', 2, '2260 Islington Avenue, Etobicoke, ON, Canada', '2960 Drew Road, Mississauga, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '', '2023-10-28 05:13:51'),
(187, 39, 'DRJK8Vkth7', 1, '2960 Drew Road, Mississauga, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '12:00:00', 3, 2, 8.13, '', '2023-10-28 05:15:32'),
(188, 39, 'CU3YoquPdk', 2, '300 Front Street West, Toronto, ON, Canada', '28 Ridgemore Crescent, Brampton, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '', '2023-10-28 05:18:06'),
(189, 39, 'CUoKF5XaCk', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '3465 Wyecroft Road, Oakville, ON, Canada', '2023-10-28', '12:00:00', 0, 3, 0.00, '', '2023-10-28 05:19:06'),
(190, 39, 'CU6imjumQO', 2, '33 Acres Brewing Company, West 8th Avenue, Vancouver, BC, Canada', '2260 Islington Avenue, Etobicoke, ON, Canada', '2023-10-28', '12:00:00', 0, 2, 0.00, '2', '2023-10-28 05:20:02'),
(196, 39, 'DRDC12tYMY', 1, '1 Hotel Toronto, Wellington Street West, Toronto, ON, Canada', '251 Jarvis Street, Toronto, ON, Canada', '2023-10-28', '02:00:00', 3, 2, 8.00, '', '2023-10-28 05:23:23'),
(197, 40, 'CUSZ6DNyFg', 2, '33 Bay Street, Toronto, ON, Canada', '12 York Street, Toronto, ON, Canada', '2023-10-28', '03:20:00', 0, 3, 0.00, 'I have 2 bags', '2023-10-29 00:18:53'),
(198, 41, 'DRt2WiS7rQ', 1, '34 John Carroll Drive, Brampton, ON, Canada', '66 Wellington Street West, Toronto, ON, Canada', '2023-10-29', '10:00:00', 3, 4, 15.00, 'No smoking, pets', '2023-10-29 00:34:48'),
(199, 42, 'DRkwIDrFrO', 1, 'Brantford, ON, Canada', 'Toronto, ON, Canada', '2023-10-29', '03:00:00', 3, 3, 26.25, 'Text me!', '2023-10-29 16:53:09'),
(200, 42, 'DR1sgezep4', 1, 'Brantford, ON, Canada', 'Toronto, ON, Canada', '2023-10-29', '03:00:00', 3, 3, 26.25, 'Text me!', '2023-10-29 16:53:09'),
(201, 43, 'DRLtgXmOUw', 1, 'Brantford, ON, Canada', 'Tiverton, ON, Canada', '2023-11-01', '05:00:00', 1, 7, 49.00, 'Via Cambridge, Kitchener, Waterloo, Elmira, Listowel', '2023-10-29 17:26:58'),
(202, 44, 'DR2w3QLZwM', 1, 'West Brant, Brantford, ON, Canada', 'Hamilton Airport, Airport Road, Mount Hope, ON, Canada', '2023-10-30', '06:45:00', 3, 3, 13.00, 'Via Ancaster Business park\nFortinos\nAncaster downtown', '2023-10-29 17:31:40'),
(203, 44, 'DRExlZX49m', 1, 'Hamilton Airport, Airport Road, Mount Hope, ON, Canada', 'West Brant, Brantford, ON, Canada', '2023-10-30', '04:30:00', 3, 3, 8.50, 'Via Ancaster\nBrantford downtown', '2023-10-29 17:34:53'),
(204, 45, 'DRbLsMLklz', 1, 'Kitchener, ON, Canada', 'Oshawa, ON, Canada', '2023-10-29', '04:00:00', 3, 3, 38.00, '', '2023-10-29 18:14:59'),
(205, 46, 'CUoad1aPBh', 2, 'Clearence labour center', '109 Sydenham Street, Brantford, ON, Canada', '2023-10-30', '04:30:00', 0, 2, 0.00, '', '2023-10-30 20:29:14'),
(206, 47, 'CULJkhLgZW', 2, '32 Carroll Lane, Brantford, ON, Canada', 'Pearson Airport Terminal 1 Parking, Mississauga, ON, Canada', '2023-11-02', '03:00:00', 0, 2, 0.00, 'Return as well if you can', '2023-10-30 20:31:47'),
(207, 48, 'DRAqtLdIFj', 1, 'Brampton, ON, Canada', 'Brantford, ON, Canada', '2023-11-03', '07:00:00', 3, 4, 26.00, '', '2023-10-30 22:51:07'),
(208, 46, 'CUlCKPWna1', 2, 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '109 Sydenham Street, Brantford, ON, Canada', 'Abdulmalik Ali Khail', '07:15:00', 0, 2, 0.00, '', '2023-11-01 17:22:44'),
(209, 46, 'CUiRt5uxtM', 2, 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '109 Sydenham Street, Brantford, ON, Canada', 'Abdulmalik Ali Khail', '07:15:00', 0, 2, 0.00, '', '2023-11-01 17:22:46'),
(210, 46, 'CUfcqPaJgD', 2, '109 Sydenham Street, Brantford, ON, Canada', 'Ferrero Canada, Ferrero Boulevard, Brantford, ON, Canada', '2023-11-02', '06:00:00', 0, 3, 0.00, '', '2023-11-01 23:51:18'),
(211, 43, 'DR2c2fiokb', 1, 'Brantford, ON, Canada', 'Kitchener, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 15.00, '', '2023-11-03 13:12:49'),
(212, 43, 'DRufoXeFBk', 1, 'Brantford, ON, Canada', 'Listowel, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 26.50, '', '2023-11-03 13:19:31'),
(213, 43, 'DRtty46kfS', 1, 'Kitchener, ON, Canada', 'Listowel, ON, Canada', '2023-11-08', '06:00:00', 3, 7, 15.00, '', '2023-11-03 13:20:17'),
(214, 43, 'DRWRtxh0W9', 1, 'Brantford, ON, Canada', 'Waterloo, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 15.00, '', '2023-11-03 13:24:53'),
(215, 43, 'DRyRRZaeeP', 1, 'Brantford, ON, Canada', 'Tiverton, ON, Canada', '2023-11-08', '05:00:00', 3, 7, 49.00, '', '2023-11-03 13:25:46'),
(216, 39, 'CUYVz8zGT5', 2, '32 Carroll Lane, Brantford, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-05-17', '12:25:00', 0, 1, 0.00, '', '2024-05-16 22:27:37'),
(217, 39, 'DRPnCpTdAz', 1, 'High Park, Bloor Street West, Toronto, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-05-17', '06:00:00', 3, 5, 24.38, '', '2024-05-16 22:41:24'),
(218, 39, 'CUHF6dE91Z', 2, '32 Carrick Avenue, Hamilton, ON, Canada', 'Brantford, ON, Canada', '2024-05-27', '05:00:00', 0, 3, 0.00, 'we have large luguage', '2024-05-27 20:39:36'),
(219, 39, 'CUR3PKKR4I', 2, '325 Milner Avenue, Scarborough, ON, Canada', '225 Simcoe Street, Toronto, ON, Canada', '2024-06-14', '12:00:00', 0, 4, 0.00, '', '2024-06-14 02:43:14'),
(220, 39, 'CUg8NnkKRd', 2, '44 Toronto, King Street West, Toronto, ON, Canada', '32 Carroll Lane, Brantford, ON, Canada', '2024-06-15', '06:00:00', 0, 5, 0.00, 'I have a lugguage', '2024-06-14 13:46:25'),
(221, 49, 'DR3wklz6XY', 1, '16 Witteveen Drive, Brantford, ON, Canada', '274 Colborne Street, Brantford, ON, Canada', '2024-07-26', '12:00:00', 3, 3, 20.00, '', '2024-07-11 17:21:49'),
(222, 49, 'DRknVSWuJf', 1, '16 Witteveen Drive, Brantford, ON, Canada', '274 Colborne Street, Brantford, ON, Canada', '2024-07-26', '12:00:00', 3, 3, 20.00, '', '2024-07-11 17:22:03'),
(223, 50, 'DRPbFUkHxF', 1, '16 Witteveen Drive, Brantford, ON, Canada', '274 Colborne Street, Brantford, ON, Canada', '2024-07-26', '12:00:00', 3, 3, 20.00, '', '2024-07-11 17:22:11'),
(224, 50, 'CUHF15BJ50', 2, 'dwhqj', 'hjdwnhq', '2024-07-12', '12:00:00', 0, 2, 0.00, '', '2024-07-12 03:56:05'),
(225, 50, 'DR3UYOF4pl', 1, '16 Witter Place, Sooke, BC, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-07-12', '12:00:00', 3, 1, 1031.25, '', '2024-07-12 03:57:34'),
(226, 50, 'DR1Q2lPsHi', 1, '16 Witteveen Drive, Brantford, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-07-12', '02:00:00', 3, 1, 8.00, '', '2024-07-12 04:00:06'),
(227, 39, 'DR3Qx4FtOn', 1, '32 Carroll Lane, Brantford, ON, Canada', 'Transit Terminal, Greater Sudbury, ON, Canada', '2024-07-14', '12:00:00', 3, 3, 120.00, '', '2024-07-12 04:00:58'),
(228, 39, 'CUCU2OTY5E', 2, '44 Toronto, King Street West, Toronto, ON, Canada', '66 Wellington Street West, Toronto, ON, Canada', '2024-07-14', '12:00:00', 0, 1, 0.00, '', '2024-07-12 04:01:46'),
(229, 40, 'DR4rsTsI9u', 1, '888 Dundas Street East, Mississauga, ON, Canada', '7700 Hurontario Street, Brampton, ON, Canada', '2024-07-13', '12:00:00', 3, 3, 4.10, '', '2024-07-12 04:02:40'),
(230, 40, 'CULN9yZwQ5', 2, '6750 Mississauga Road, Mississauga, ON, Canada', '888 Dundas Street East, Mississauga, ON, Canada', '2024-07-13', '12:00:00', 0, 5, 0.00, '', '2024-07-12 04:03:17'),
(231, 50, 'DR9F9cQK86', 1, '16 Witteveen Drive, Brantford, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-07-12', '02:00:00', 3, 1, 8.00, '', '2024-07-12 04:05:53'),
(232, 41, 'DRaqwPVYQU', 1, '333 Bay Street, Toronto, ON, Canada', '22nd Street, New Westminster, BC, Canada', '2024-07-19', '12:00:00', 3, 3, 1046.75, '', '2024-07-12 04:06:48'),
(233, 50, 'DRtYt1yX6h', 1, '888 Dundas Street East, Mississauga, ON, Canada', '81 Bay Street, Toronto, ON, Canada', '2024-07-13', '12:00:00', 3, 8, 5.97, '', '2024-07-12 04:15:00'),
(234, 50, 'DRafnIt8BY', 1, '16 Witteveen Drive, Brantford, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-07-14', '12:00:00', 3, 2, 8.00, '', '2024-07-12 04:21:43'),
(235, 50, 'DRX49B5dpg', 1, '16 Witteveen Drive, Brantford, ON, Canada', 'Transit Terminal, Brantford, ON, Canada', '2024-07-13', '12:00:00', 1, 4, 10.00, '', '2024-07-12 04:24:47'),
(236, 40, 'DRi6woCjdt', 1, '888 Dundas Street East, Mississauga, ON, Canada', '81 Bay Street, Toronto, ON, Canada', '2024-07-13', '12:00:00', 3, 8, 5.97, '', '2024-07-12 04:27:09'),
(237, 40, 'DRnySX1SfN', 1, '5444 Dixie Road, Mississauga, ON, Canada', '666 Burnhamthorpe Road, Etobicoke, ON, Canada', '2024-07-13', '12:00:00', 3, 4, 8.00, '', '2024-07-12 04:27:57'),
(238, 40, 'DR45eZu2RD', 1, '5444 Dixie Road, Mississauga, ON, Canada', '666 Burnhamthorpe Road, Etobicoke, ON, Canada', '2024-07-13', '12:00:00', 3, 4, 8.00, '', '2024-07-12 04:31:44'),
(239, 51, 'DRTnxiZsKX', 1, 'Brampton, ON, Canada', 'Brantford, ON, Canada', '2024-07-13', '12:00:00', 3, 4, 25.75, '', '2024-07-12 13:34:47'),
(240, 51, 'DRJoPlk1AK', 1, 'Surrey, BC, Canada', 'Calgary, AB, Canada', '2024-07-14', '12:00:00', 3, 3, 236.25, '', '2024-07-12 13:35:56'),
(241, 51, 'DR8PpcQJDD', 1, '16 Witteveen Drive, Brantford, ON, Canada', '274 Colborne Street, Brantford, ON, Canada', '2024-07-13', '12:00:00', 3, 3, 8.00, 'latest ride', '2024-07-12 13:36:52'),
(242, 54, 'CULvZbOEGs', 2, '5 Drive-In, Ninth Line, Oakville, ON, Canada', '225 Simcoe Street, Toronto, ON, Canada', '2024-08-03', '12:00:00', 0, 3, 0.00, '', '2024-08-02 13:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `uid` int(11) NOT NULL,
  `google_id` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT 'D:1|P:2',
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email_verify` int(11) NOT NULL DEFAULT 0,
  `avatar_url` varchar(255) DEFAULT NULL,
  `reset_token` text DEFAULT NULL,
  `reset_expires` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`uid`, `google_id`, `type`, `name`, `email`, `password`, `phone`, `email_verify`, `avatar_url`, `reset_token`, `reset_expires`, `time_stamp`) VALUES
(52, '106787553110631631610', 2, 'Navjot Singh', 'urlshotner000@gmail.com', NULL, '', 1, 'https://lh3.googleusercontent.com/a/ACg8ocLU4hbsD06GvSi05djCHhOCdkbMI37LXeQJ-pMvCP6wT6Xukw=s96-c', '9af044db1553f97f640e870da8faa5ca56ce89157bd14a1510b4c35ba4dda4f964ed45bb40b7077327e8614b2af1cf7d70ac', '2024-08-15 05:58:46', '2024-08-15 08:58:46'),
(54, '100897174879377600495', 2, 'Navjot singh', 'web.dev.nav@gmail.com', NULL, '', 1, 'https://lh3.googleusercontent.com/a/ACg8ocLx695uALK2Q-qaZ1ynmXFYcj6TBxk3feafy4v-JH1o7AvXqJs=s96-c', NULL, NULL, '2024-07-29 03:24:49'),
(55, '115000788831718990916', 2, 'Navjot Singh', 'web.navjot@gmail.com', NULL, '', 1, 'https://lh3.googleusercontent.com/a/ACg8ocJrdxh2dD5h9WWW0k3s71CwxAAc4x7RY3-j4KucpjC3Go8D8UM=s96-c', NULL, NULL, '2024-07-29 05:23:49'),
(56, '105709831055064227488', 2, 'Shivasav Bhasin', 'shivasavbhasin@gmail.com', '$2y$10$O2GB5VETMNfJ4K.y7QWRHO01JewfHJIC4o8HfOQNPzpDW6GhWgWRS', '', 1, 'https://lh3.googleusercontent.com/a/ACg8ocKQrKgfbE-Zw83aa5nYPdYz0wcr7hH1GETnDuC3j11umWkz6mE=s96-c', NULL, NULL, '2024-08-15 16:27:39'),
(57, '106113870857726670274', 2, 'AMnaaz', 'aayatnaaz01@gmail.com', NULL, '', 1, 'https://lh3.googleusercontent.com/a/ACg8ocLJSsqh3cB8eM_uxRoLtFiwGNIgWsO6uWnOLmLu6ycL_ff43i7f2A=s96-c', NULL, NULL, '2024-08-02 13:28:53'),
(58, NULL, 1, '', 'ns9496405@gmail.com', NULL, '', 0, NULL, NULL, NULL, '2024-08-15 06:14:26'),
(59, NULL, 1, '', 'support@codelone.com', NULL, '', 0, NULL, NULL, NULL, '2024-08-15 06:21:26'),
(60, NULL, 1, '', 'mohitsethi148@gmail.com', NULL, '', 0, NULL, NULL, NULL, '2024-08-15 06:22:39'),
(61, NULL, 1, '', 'mohitsethi1438@gmail.com', '$2y$10$5TN5ntE9TR0i.HGyza64g.BH.nDL.FlVs/KwUl4Kro9JU3/0q.2mW', '', 0, NULL, NULL, NULL, '2024-08-15 06:25:27'),
(62, NULL, 1, 'Nav', 'ns949405@gmail.com', '$2y$10$gDgzOt1.kXzthqyTyYkmEeMOpS.q1VFBc85LsQACz.vQAHCu4Sge.', '', 0, NULL, '266e61eb85541335f171fc893d2f497659b1983f0f309c4dbe34539519c6d07ab722f789c56d13afc5a3213850692460c4a0', '2024-08-15 13:35:48', '2024-08-15 16:35:48'),
(63, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$vGi6MKv4eyVGJvPvXkevZ.e//UGUWc295alQ7PYy90mO6TbBDKOG.', '', 0, NULL, '06dabdcf68716d7da083a3106bafac4831532b5d71e138d1df1fcddb3d1160f7e55a57ef4aff9491b7cfa54755f5c7669c34', '2024-08-15 13:25:49', '2024-08-15 16:25:49'),
(64, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$IJ.ZQRAaOg1klmBfIIVAse5WhJ.co/k.tw.yu.4ZfKzdh6dbD.ka.', '', 0, NULL, NULL, NULL, '2024-08-15 16:25:19'),
(65, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$gVDD2zo5cypq6u..wUqFVugEQYdTJb3gQA096OeKUAxvCSCB9SvU6', '', 0, NULL, NULL, NULL, '2024-08-15 16:25:19'),
(66, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$0FGTsNq1ssc0hCO8U2FlduEKBj7DmXMIs1/z8aIWEBMNbPg6lIt66', '', 0, NULL, NULL, NULL, '2024-08-15 16:25:19'),
(67, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$6VYnrNvHwJ.HCkYcgzKWgucWmDSWSUvXMfGtqISA5VWp5KEDhQspO', '', 0, NULL, NULL, NULL, '2024-08-15 16:25:19'),
(68, NULL, 1, 'Shiv', 'sbhsn2001@gmail.com', '$2y$10$xspX1zAho2GyXSPdfr8KheuhgFttzEGXK/wqSy1ob1W1IClDPvE2O', '', 0, NULL, NULL, NULL, '2024-08-15 16:25:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_maping`
--
ALTER TABLE `address_maping`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `driver_trips`
--
ALTER TABLE `driver_trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_maping`
--
ALTER TABLE `address_maping`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `driver_trips`
--
ALTER TABLE `driver_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
