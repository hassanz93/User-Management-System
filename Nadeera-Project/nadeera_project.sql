-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 04:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadeera_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(11, 'Hassan Zahra', 'hassanz93@hotmail.com', '$2y$10$2LaefWOuW7wnvbN.xqR8ZOThrJ/KIgwjbNGlyQPnItah.tnAhD4EC', '2022-03-31 16:03:10', '2022-03-31 16:03:10'),
(33, 'Nader Zein', 'naderz@hotmail.com', '$2y$10$0GrHaTEHn4KDZzayrXVoz.qKATzW2BVI9PXVAdEYzIIX8snpAuP6K', '2022-04-02 08:09:20', '2022-04-02 08:09:20'),
(38, 'Abbass Hjazi1', 'abbash1@gmail.com', '$2y$10$zAxHI1ZL3PqiXbPxMQ2s5eMekdqfpVC1uzqKWu07e4ftXEMQuKHkG', '2022-04-02 09:54:29', '2022-04-02 09:54:29'),
(40, 'Mirna Jamoul', 'mirnaj@gmail.com', '$2y$10$7Son66looAWQfpx54HahhOA8Psy3NNSQ5astp2h8eL9dG/hC7q5Gy', '2022-04-02 11:45:27', '2022-04-02 11:45:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
