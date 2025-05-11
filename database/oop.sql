-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 07:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Emma', '5G7EIEfxnMO+qcwZ/ZreSGpjZytrb0tjWWczb20wSkE0dU00SGdDaE1nPT0=', '123456', '02-04-2025'),
(2, 'RhjD/vXoKlP9+xHsIopJxHZLQys2dz09', '7+2T7/S4HV1BhSkdbegQiW11emJYV0JTRjY0bUE2ZjV1a1dYNTVZVFdqZz0=', '$2y$10$6h1RbVNGRku/W9k4SSNReeol6UjpeDA5DCuk719GuPtYErJll4PIG', 'Saturday - 2025/05/03 - 16:48:42'),
(3, 'sgW7A41TJm47j7ehLJQsGWpzK3VoQT09', 'pGBCZFURkG6xQBJbEIt4MjZYL21CSUpnRDdDT05QNjVERjVsakhhYzRqb2k=', '$2y$10$5ohJwGnzky8LOlrze.U16ueXEHGeT.27okBu/1KA9bohpwwMfMMKu', 'Saturday - 2025/05/03 - 17:34:06'),
(4, 'PtDoGcSN4LWQOasEm4RT5TlyV2k3Zz09', 'FYHIh6mIlDs9I/7jLw3O4WNkS0w3YkIzR2o4aldIMFpvY2tBZUhZMVhPK0c=', '$2y$10$mKPWSeXhg6n/T7U22EQVROvYSFEOdcN.NCry7fiIF81w5oFlLoFju', 'Saturday - 2025/05/03 - 17:41:26'),
(5, '44ehm95SqYvxfckFx0QiGUVQL1U2UT09', 'jeg4RgV6XMhNwpAAQseFCFl1TnZ5NGR4ZWhlbWthTFQvMFkwUFMzN1VtVks=', '$2y$10$uvb/mbemVgB9e.OMviEdbeXhWFg3A1lE3y.zR31Xfrm0L.akByZH6', 'Sunday - 2025/05/11 - 11:44:56'),
(6, 'PRb/nxM9jOoFwmXJSu9rXUhOb1VFUT09', 'LUfVLMl0b9CYjp+2WuzGlVloVDFQbGw5bEMvM253cFBjVGZjaWhja2FVQ3U=', '$2y$10$P3ysn4YtDIiazXh0EapWlOP7oVBp5.TyUwA1cRCKp7rj4.LyYWxTi', 'Sunday - 2025/05/11 - 15:31:22'),
(7, 'AvGsidcjx9jBR8UMafwZZVQyOW5xQnV5dzZ2dHV3bU5HQT09', 'AQdWXKDDUjU6KMoMv+l+TEVjU2ZHZTlKUU9DWDJXMFltZXJaSXc9PQ==', '$2y$10$R2fC2cQ4ES/9Sa6lA1MAtODNm60t0PyLM.XBDYFk.gn51VhWuTDgK', 'Sunday - 2025/05/11 - 20:12:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
