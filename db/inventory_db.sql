-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2025 at 12:33 PM
-- Server version: 10.11.9-MariaDB-0+deb12u1
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

CREATE TABLE `categories` (
    `category_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`category_id`, `name`, `created_at`) VALUES
(1, 'SoftDrinks', '2026-05-10 00:00:00'),
(2, 'Canned Goods', '2026-05-10 00:00:00'),
(3, 'Junk Foods', '2026-05-10 00:00:00');

CREATE TABLE `stocks` (
    `id` INT(20) AUTO_INCREMENT PRIMARY KEY,
    `product` VARCHAR(100) NOT NULL,
    `quantity` INT DEFAULT 0,
    `price` DECIMAL(10,2),
    `expire` VARCHAR(100)  DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `category_id` INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `sales` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `total` DECIMAL(10,2),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sale_items` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sale_id` INT,
    `product_id` INT,
    `quantity` INT,
    `price` DECIMAL(10,2),
    `subtotal` DECIMAL(10,2),
    FOREIGN KEY (sale_id) REFERENCES sales(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES stocks(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `supplies` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `supplier_name` VARCHAR(255),
    `total_items` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `supply_items` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `supply_id` INT,
    `product_id` INT,
    `quantity` INT,
    `cost` DECIMAL(10,2) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;