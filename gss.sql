-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 08:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gss`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(2, 'Registrar', 'registrar', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(3, 'Principal', 'principal', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(4, 'Director', 'director', '2020-09-19 16:33:27', '2020-09-19 16:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7f54ade8-179f-4fc7-adfc-a4d6e57f3ee7\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-19 16:36:05.816837\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600533365, 1600533355),
(2, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"1\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 16:36:55\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 16:36:55\\\";s:2:\\\"id\\\";i:1;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600533415, 1600533415),
(3, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"1\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 16:36:55\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 16:36:55\\\";s:2:\\\"id\\\";i:1;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600533415, 1600533415),
(4, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"0aff137d-083a-464f-8d3d-fb7f59aee8ab\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-19 17:12:31.099703\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600535551, 1600535541),
(5, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"2\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 17:12:28\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 17:12:28\\\";s:2:\\\"id\\\";i:2;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600535548, 1600535548),
(6, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"2\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 17:12:28\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 17:12:28\\\";s:2:\\\"id\\\";i:2;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600535548, 1600535548),
(7, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5a396466-3fc8-44a7-83bf-2315274823cc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-19 17:14:35.920172\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600535675, 1600535665),
(8, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"3\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 17:14:33\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 17:14:33\\\";s:2:\\\"id\\\";i:3;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600535673, 1600535673),
(9, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"3\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 17:14:33\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 17:14:33\\\";s:2:\\\"id\\\";i:3;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600535673, 1600535673),
(10, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"e3f565d6-34b0-437e-a155-cd3ce8506c5e\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-19 18:29:39.720535\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600540179, 1600540169),
(11, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"4\\\";s:12:\\\"adminremarks\\\";s:7:\\\"huyuyuy\\\";s:4:\\\"fund\\\";s:4:\\\"1000\\\";s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 18:31:11\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 18:31:11\\\";s:2:\\\"id\\\";i:4;}s:24:\\\"serviceActionAuthorities\\\";a:2:{i:0;s:9:\\\"Registrar\\\";i:1;s:9:\\\"Principal\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600540271, 1600540271),
(12, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"4\\\";s:12:\\\"adminremarks\\\";s:7:\\\"huyuyuy\\\";s:4:\\\"fund\\\";s:4:\\\"1000\\\";s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 18:31:11\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 18:31:11\\\";s:2:\\\"id\\\";i:4;}s:24:\\\"serviceActionAuthorities\\\";a:2:{i:0;s:9:\\\"Registrar\\\";i:1;s:9:\\\"Principal\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600540271, 1600540271),
(13, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5010cd12-1fcc-4edf-adc9-dea734243e66\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-19 18:54:25.189850\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600541665, 1600541655),
(14, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"5\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 18:54:29\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 18:54:29\\\";s:2:\\\"id\\\";i:5;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600541669, 1600541669),
(15, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"5\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-19 18:54:29\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-19 18:54:29\\\";s:2:\\\"id\\\";i:5;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600541669, 1600541669),
(16, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"872b5bce-05cd-471e-a3b9-7b63267c70fc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-20 13:57:17.922722\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600610237, 1600610227),
(17, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"6\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 13:57:26\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 13:57:26\\\";s:2:\\\"id\\\";i:6;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610246, 1600610246),
(18, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"6\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 13:57:26\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 13:57:26\\\";s:2:\\\"id\\\";i:6;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610247, 1600610247),
(19, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"32a5ad76-4846-4ff6-bfd2-7a1b57f7c851\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-20 14:00:23.469777\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600610423, 1600610413),
(20, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"7\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:00:23\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:00:23\\\";s:2:\\\"id\\\";i:7;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610423, 1600610423),
(21, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"7\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:00:23\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:00:23\\\";s:2:\\\"id\\\";i:7;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610423, 1600610423),
(22, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"08cea533-971c-4d92-85c9-0e593462da3c\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-20 14:07:55.301829\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600610875, 1600610865),
(23, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"8\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:07:57\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:07:57\\\";s:2:\\\"id\\\";i:8;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610877, 1600610877),
(24, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"8\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:07:57\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:07:57\\\";s:2:\\\"id\\\";i:8;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610877, 1600610877),
(25, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"6f72d1c2-1d58-4a03-8f3d-a3a8b3e59d0f\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-20 14:08:58.918982\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600610938, 1600610928),
(26, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"9\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:08:56\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:08:56\\\";s:2:\\\"id\\\";i:9;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610936, 1600610936),
(27, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:1:\\\"9\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:08:56\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:08:56\\\";s:2:\\\"id\\\";i:9;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600610936, 1600610936),
(28, 'default', '{\"displayName\":\"App\\\\Notifications\\\\TicketRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:36:\\\"App\\\\Notifications\\\\TicketRegistration\\\":11:{s:44:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000ticket\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:10:\\\"App\\\\Ticket\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:47:\\\"\\u0000App\\\\Notifications\\\\TicketRegistration\\u0000recipient\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"3fc281bf-9603-4f97-ba59-b9c85b5a5734\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-09-20 14:57:07.321014\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";r:24;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1600613827, 1600613817),
(29, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:48:\\\"App\\\\Listeners\\\\SendServiceActionNotificationEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:2:\\\"10\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:57:09\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:57:09\\\";s:2:\\\"id\\\";i:10;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600613829, 1600613829),
(30, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendServiceApprovalEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":8:{s:5:\\\"class\\\";s:38:\\\"App\\\\Listeners\\\\SendServiceApprovalEmail\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:29:\\\"App\\\\Events\\\\ServiceActionEvent\\\":3:{s:13:\\\"serviceAction\\\";a:6:{s:10:\\\"service_id\\\";s:2:\\\"10\\\";s:12:\\\"adminremarks\\\";N;s:4:\\\"fund\\\";N;s:10:\\\"updated_at\\\";s:19:\\\"2020-09-20 14:57:09\\\";s:10:\\\"created_at\\\";s:19:\\\"2020-09-20 14:57:09\\\";s:2:\\\"id\\\";i:10;}s:24:\\\"serviceActionAuthorities\\\";a:0:{}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:10:\\\"retryAfter\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1600613829, 1600613829);

-- --------------------------------------------------------

--
-- Table structure for table `location_infos`
--

CREATE TABLE `location_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_infos`
--

INSERT INTO `location_infos` (`id`, `block`, `department`, `floor`, `room`, `created_at`, `updated_at`) VALUES
(1, 'Admin Block', 'Admin', 'Ground Floor', 'G01', '2020-09-19 16:33:28', '2020-09-19 16:33:28'),
(2, 'Admin Block', 'Admin', 'Ground Floor', 'G02', '2020-09-19 16:33:28', '2020-09-19 16:33:28'),
(3, 'Main Block', 'CSE', 'Ground Floor', 'G01', '2020-09-19 16:33:28', '2020-09-19 16:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_07_10_092622_create_status_infos_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_05_091436_create_service_infos_table', 1),
(5, '2020_07_05_154624_create_authorities_table', 1),
(6, '2020_07_06_052754_create_location_infos_table', 1),
(7, '2020_07_06_090715_create_ticket_infos_table', 1),
(8, '2020_07_06_165109_create_priority_infos_table', 1),
(9, '2020_07_06_212543_create_users_table', 1),
(10, '2020_07_06_222543_create_tickets_table', 1),
(11, '2020_07_06_233543_create_services_table', 1),
(12, '2020_07_11_071120_create_service_actions_table', 1),
(13, '2020_07_14_080500_create_permissions_table', 1),
(14, '2020_07_14_080516_create_roles_table', 1),
(15, '2020_07_14_080617_create_users_permissions_table', 1),
(16, '2020_07_14_081228_create_users_roles_table', 1),
(17, '2020_07_14_081432_create_roles_permissions_table', 1),
(18, '2020_07_16_034418_create_service_actions_authorities_table', 1),
(19, '2020_07_24_060134_create_jobs_table', 1),
(20, '2020_08_08_062201_create_profiles_table', 1),
(21, '2020_09_13_075042_add_services_foreign_tickets_table', 1),
(22, '2020_09_14_093458_create_workers_table', 1),
(23, '2020_09_14_154317_create_tickets_feedback_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Create Ticket', 'create-ticket', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(2, 'Delete Ticket', 'delete-ticket', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(3, 'Close Ticket', 'close-ticket', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(4, 'Create User', 'create-user', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(5, 'Manage Users', 'manage-users', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(6, 'Service Action', 'service-action', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(7, 'Service Approval', 'service-approval', '2020-09-19 16:33:42', '2020-09-19 16:33:42'),
(8, 'View Dashboard', 'view-dashboard', '2020-09-20 07:58:49', '2020-09-20 07:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `priority_infos`
--

CREATE TABLE `priority_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priority_infos`
--

INSERT INTO `priority_infos` (`id`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Low', NULL, NULL),
(2, 'Medium', NULL, NULL),
(3, 'High', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `dob`, `department`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-03', 'CSE', 'Hello World', '9043309074', '2020-09-19 11:05:38', '2020-09-19 11:05:38'),
(2, 6, '2020-09-02', 'CSE', 'Hello World', '9043309074', '2020-09-20 02:30:12', '2020-09-20 02:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2020-09-19 16:33:43', '2020-09-19 16:33:43'),
(2, 'Faculty', 'faculty', '2020-09-19 16:33:43', '2020-09-19 16:33:43'),
(3, 'Worker', 'worker', '2020-09-19 16:33:43', '2020-09-19 16:33:43'),
(4, 'Registrar', 'registrar', '2020-09-19 16:33:43', '2020-09-19 16:33:43'),
(5, 'Principal', 'principal', '2020-09-19 16:33:43', '2020-09-19 16:33:43'),
(6, 'Director', 'director', '2020-09-19 16:33:43', '2020-09-19 16:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 2, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 3, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 4, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 5, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 6, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(1, 7, '2020-09-19 11:05:25', '2020-09-19 11:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assetcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ticket_id`, `priority_id`, `category`, `subcategory`, `block`, `department`, `floor`, `room`, `assetcode`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'HouseKeeping', 'Cleaning', 'Admin Block', 'Admin', 'Ground Floor', 'G01', NULL, '20', 'op', '2020-09-19 11:42:21', '2020-09-19 11:42:21'),
(3, 3, 1, 'Plumbing', 'WashBasin', 'Admin Block', 'Admin', 'Ground Floor', 'G02', '1234', '2', 'jo', '2020-09-19 11:44:25', '2020-09-19 11:44:25'),
(4, 4, 2, 'Plumbing', 'WashBasin', 'Admin Block', 'Admin', 'Ground Floor', 'G02', '1234', '2', '565', '2020-09-19 12:59:29', '2020-09-19 12:59:29'),
(5, 5, 2, 'Plumbing', 'WashBasin', 'Admin Block', 'Admin', 'Ground Floor', 'G02', NULL, '2', 'ko', '2020-09-19 13:24:15', '2020-09-19 13:24:15'),
(6, 6, 2, 'Painting', 'Wall', 'Main Block', 'CSE', 'Ground Floor', 'G01', NULL, '2', 'huuiiii', '2020-09-20 08:27:07', '2020-09-20 08:27:07'),
(7, 7, 2, 'Electrical', 'Fan', 'Admin Block', 'Admin', 'Ground Floor', 'G02', NULL, '2', 'ko', '2020-09-20 08:30:13', '2020-09-20 08:30:13'),
(8, 8, 2, 'Plumbing', 'WashBasin', 'Main Block', 'CSE', 'Ground Floor', 'G01', NULL, '2', 'jo', '2020-09-20 08:37:45', '2020-09-20 08:37:45'),
(9, 9, 2, 'Electrical', 'Fan', 'Admin Block', 'Admin', 'Ground Floor', 'G02', NULL, '2', 'ty', '2020-09-20 08:38:48', '2020-09-20 08:38:48'),
(10, 10, 1, 'Plumbing', 'WashBasin', 'Main Block', 'CSE', 'Ground Floor', 'G01', NULL, '2', 'h', '2020-09-20 09:26:57', '2020-09-20 09:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `service_actions`
--

CREATE TABLE `service_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `adminremarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fund` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eta` bigint(20) DEFAULT NULL,
  `tat` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_actions`
--

INSERT INTO `service_actions` (`id`, `service_id`, `worker_id`, `adminremarks`, `fund`, `eta`, `tat`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, 'h', '2000', NULL, 1, '2020-09-19 11:42:28', '2020-09-19 11:43:24'),
(3, 3, NULL, NULL, '3000', NULL, NULL, '2020-09-19 11:44:33', '2020-09-19 11:44:33'),
(4, 4, NULL, 'hoioioi', '1000', NULL, 1, '2020-09-19 13:01:11', '2020-09-19 13:05:29'),
(5, 5, NULL, 'hlooo', '4000', NULL, NULL, '2020-09-19 13:24:29', '2020-09-20 07:36:34'),
(6, 6, NULL, 'hyuuuoi', NULL, NULL, NULL, '2020-09-20 08:27:26', '2020-09-20 08:29:03'),
(7, 7, NULL, NULL, NULL, NULL, NULL, '2020-09-20 08:30:23', '2020-09-20 08:30:23'),
(8, 8, NULL, 'killoo', NULL, NULL, NULL, '2020-09-20 08:37:57', '2020-09-20 08:38:19'),
(9, 9, 9, 'io', NULL, NULL, NULL, '2020-09-20 08:38:56', '2020-09-20 09:24:46'),
(10, 10, 10, 'rtiuo', NULL, NULL, NULL, '2020-09-20 09:27:09', '2020-09-20 09:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `service_actions_authorities`
--

CREATE TABLE `service_actions_authorities` (
  `service_action_id` bigint(20) UNSIGNED NOT NULL,
  `authority_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_actions_authorities`
--

INSERT INTO `service_actions_authorities` (`service_action_id`, `authority_id`, `approved`, `remarks`) VALUES
(4, 2, 1, 'ap'),
(4, 3, 1, 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `service_infos`
--

CREATE TABLE `service_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_infos`
--

INSERT INTO `service_infos` (`id`, `category`, `subcategory`, `created_at`, `updated_at`) VALUES
(1, 'Painting', 'Wall', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(2, 'Painting', 'Window', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(3, 'Painting', 'Door', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(4, 'Painting', 'Others', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(5, 'Plumbing', 'WashBasin', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(6, 'Plumbing', 'Tap', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(7, 'Plumbing', 'HealthFaucet', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(8, 'Plumbing', 'WBC', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(9, 'Plumbing', 'Others', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(10, 'HouseKeeping', 'Cleaning', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(11, 'HouseKeeping', 'Shifting', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(12, 'HouseKeeping', 'Others', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(13, 'Airconditioner', 'GeneralService', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(14, 'Airconditioner', 'GasFilling', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(15, 'Airconditioner', 'Others', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(16, 'Electrical', 'Fan', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(17, 'Electrical', 'LightFittings', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(18, 'Electrical', 'UPS', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(19, 'Electrical', 'Stabilizer', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(20, 'Electrical', 'Telecom', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(21, 'Electrical', 'PowerSockets', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(22, 'Electrical', 'Others', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(23, 'Interior', 'Fan', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(24, 'Interior', 'Cabin', '2020-09-19 16:33:27', '2020-09-19 16:33:27'),
(25, 'Interior', 'Workstation', '2020-09-19 16:33:27', '2020-09-19 16:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `status_infos`
--

CREATE TABLE `status_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_infos`
--

INSERT INTO `status_infos` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2020-09-19 16:33:26', '2020-09-19 16:33:26'),
(2, 'In Progress', '2020-09-19 16:33:26', '2020-09-19 16:33:26'),
(3, 'On Hold', '2020-09-19 16:33:26', '2020-09-19 16:33:26'),
(4, 'Closed', '2020-09-19 16:33:26', '2020-09-19 16:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `authority_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `type_id`, `authority_id`, `status_id`, `created_at`, `updated_at`, `service_id`) VALUES
(2, 1, 1, 1, 4, '2020-09-19 11:42:20', '2020-09-19 11:43:24', 2),
(3, 1, 1, 1, 2, '2020-09-19 11:44:25', '2020-09-19 11:44:33', 3),
(4, 1, 1, 1, 4, '2020-09-19 12:59:29', '2020-09-19 13:05:29', 4),
(5, 1, 1, 1, 2, '2020-09-19 13:24:14', '2020-09-19 13:24:29', 5),
(6, 1, 1, 1, 2, '2020-09-20 08:27:07', '2020-09-20 08:27:26', 6),
(7, 1, 1, 1, 2, '2020-09-20 08:30:13', '2020-09-20 08:30:23', 7),
(8, 1, 1, 1, 2, '2020-09-20 08:37:45', '2020-09-20 08:37:57', 8),
(9, 1, 1, 1, 2, '2020-09-20 08:38:48', '2020-09-20 08:38:56', 9),
(10, 1, 1, 1, 2, '2020-09-20 09:26:57', '2020-09-20 09:27:09', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_feedback`
--

CREATE TABLE `tickets_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `rating` bigint(20) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `web_app` tinyint(1) NOT NULL DEFAULT 0,
  `work` tinyint(1) NOT NULL DEFAULT 0,
  `management` tinyint(1) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_infos`
--

CREATE TABLE `ticket_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_infos`
--

INSERT INTO `ticket_infos` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Service', '2020-09-19 16:33:28', '2020-09-19 16:33:28'),
(2, 'Consumable', '2020-09-19 16:33:28', '2020-09-19 16:33:28'),
(3, 'Capital Equipment', '2020-09-19 16:33:28', '2020-09-19 16:33:28'),
(4, 'Hall Booking', '2020-09-19 16:33:28', '2020-09-19 16:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rudr', 'rudrakshacmkt777@gmail.com', NULL, '$2y$10$ba5GMr5I16VqeDZedAWuA.feEmQ3zNE4M0Ho9rnahABB7GkVybXLe', NULL, '2020-09-19 11:05:25', '2020-09-19 11:05:25'),
(2, 'Ankur', 'ankur.saini34@gmail.com', NULL, '$2y$10$AHilyZ./4BmfaHtBVM6IcOuHGss6ERMrlTVJwI0f4.1P0s1cqHRtK', NULL, '2020-09-19 11:06:09', '2020-09-19 11:06:09'),
(3, 'Ankur Saini', '5@gmail.com', NULL, '$2y$10$rOozZpNJ5bUkrx70G3ijteRD36GXJ1.yvEp7BGrqJkqU5SoSGwxk2', NULL, '2020-09-19 11:08:13', '2020-09-19 11:08:13'),
(6, 'Hello-2', '6@gmail.com', NULL, '$2y$10$HLdUe/ju83Wwk7z06QSaNuaEQTFBWYCIvUhU.VLv5tE2vWp4/oE5a', NULL, '2020-09-20 02:29:44', '2020-09-20 02:29:44'),
(7, 'Ross Geller', 'rossgeller@gmail.com', NULL, '$2y$10$Lvhi2A4WqDHR4pexOcIHkuyUST0puySXimTNJ61lgfIqSRbq.URL2', NULL, '2020-09-20 06:38:05', '2020-09-20 06:38:05'),
(8, 'Rachel Green', 'rachellovesshopping@gmail.com', NULL, '$2y$10$YWf0XJBmUb0DobgDsfq3WO68z4JzDCmHrd2AcfItAN7Hzw3oJRWVy', NULL, '2020-09-20 06:38:52', '2020-09-20 06:38:52'),
(9, 'Monica Geller Bing', 'monicawantsitclean@gmail.com', NULL, '$2y$10$yxP8ScLSiHrOdBzP1VrTB.BBvBMRczeK5PNFlKcZYkw6PXwluem8W', NULL, '2020-09-20 06:40:36', '2020-09-20 06:40:36'),
(10, 'Joey Tribbiani', 'joeydoesntsharefood@gmail.com', NULL, '$2y$10$1bS8cAUKX.ZsgsBwXOwYDeUpbgpJeMviByFOoMSzGZ6QNFQ9vHG2u', NULL, '2020-09-20 06:55:37', '2020-09-20 06:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(1, 8, NULL, NULL),
(2, 7, NULL, NULL),
(3, 1, NULL, NULL),
(6, 6, NULL, NULL),
(7, 8, NULL, NULL),
(8, 1, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_actions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `num_workingdays` bigint(20) DEFAULT NULL,
  `num_leavedays` bigint(20) DEFAULT NULL,
  `salary` bigint(20) NOT NULL,
  `avg_tat` bigint(20) DEFAULT NULL,
  `rating` bigint(20) DEFAULT NULL,
  `tat_Painting` bigint(20) NOT NULL DEFAULT 4,
  `tat_Plumbing` bigint(20) NOT NULL DEFAULT 6,
  `tat_HouseKeeping` bigint(20) NOT NULL DEFAULT 2,
  `tat_Airconditioner` bigint(20) NOT NULL DEFAULT 3,
  `tat_Electrical` bigint(20) NOT NULL DEFAULT 8,
  `tat_Interior` bigint(20) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `user_id`, `service_id`, `service_actions_id`, `available`, `num_workingdays`, `num_leavedays`, `salary`, `avg_tat`, `rating`, `tat_Painting`, `tat_Plumbing`, `tat_HouseKeeping`, `tat_Airconditioner`, `tat_Electrical`, `tat_Interior`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL, 1, NULL, NULL, 0, 1, 12, 4, 6, 12, 3, 11, 10, '2020-09-19 11:08:14', '2020-09-19 13:05:29'),
(2, 6, NULL, NULL, 1, NULL, NULL, 0, NULL, 80, 4, 6, 18, 3, 20, 10, '2020-09-20 02:29:44', '2020-09-20 02:29:44'),
(3, 7, NULL, NULL, 1, NULL, NULL, 0, NULL, 67, 4, 3, 17, 3, 8, 10, '2020-09-20 06:38:05', '2020-09-20 06:38:05'),
(4, 8, NULL, NULL, 1, NULL, NULL, 0, NULL, 42, 4, 6, 16, 3, 12, 10, '2020-09-20 06:38:52', '2020-09-20 06:38:52'),
(5, 9, NULL, NULL, 1, NULL, NULL, 0, NULL, 100, 4, 6, 19, 10, 8, 10, '2020-09-20 06:40:36', '2020-09-20 09:24:46'),
(6, 10, 10, 10, 0, NULL, NULL, 0, NULL, NULL, 4, 1, 20, 3, 8, 10, '2020-09-20 06:55:37', '2020-09-20 09:28:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `location_infos`
--
ALTER TABLE `location_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority_infos`
--
ALTER TABLE `priority_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_ticket_id_foreign` (`ticket_id`),
  ADD KEY `services_priority_id_foreign` (`priority_id`);

--
-- Indexes for table `service_actions`
--
ALTER TABLE `service_actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_actions_service_id_unique` (`service_id`),
  ADD KEY `service_actions_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `service_actions_authorities`
--
ALTER TABLE `service_actions_authorities`
  ADD PRIMARY KEY (`service_action_id`,`authority_id`),
  ADD KEY `service_actions_authorities_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `service_infos`
--
ALTER TABLE `service_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_infos`
--
ALTER TABLE `status_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_type_id_foreign` (`type_id`),
  ADD KEY `tickets_authority_id_foreign` (`authority_id`),
  ADD KEY `tickets_status_id_foreign` (`status_id`),
  ADD KEY `tickets_service_id_foreign` (`service_id`);

--
-- Indexes for table `tickets_feedback`
--
ALTER TABLE `tickets_feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_feedback_ticket_id_unique` (`ticket_id`),
  ADD KEY `tickets_feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_infos`
--
ALTER TABLE `ticket_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workers_user_id_foreign` (`user_id`),
  ADD KEY `workers_service_id_foreign` (`service_id`),
  ADD KEY `workers_service_actions_id_foreign` (`service_actions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `location_infos`
--
ALTER TABLE `location_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `priority_infos`
--
ALTER TABLE `priority_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_actions`
--
ALTER TABLE `service_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_infos`
--
ALTER TABLE `service_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `status_infos`
--
ALTER TABLE `status_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets_feedback`
--
ALTER TABLE `tickets_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_infos`
--
ALTER TABLE `ticket_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priority_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_actions`
--
ALTER TABLE `service_actions`
  ADD CONSTRAINT `service_actions_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_actions_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_actions_authorities`
--
ALTER TABLE `service_actions_authorities`
  ADD CONSTRAINT `service_actions_authorities_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `authorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_actions_authorities_service_action_id_foreign` FOREIGN KEY (`service_action_id`) REFERENCES `service_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `authorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `ticket_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets_feedback`
--
ALTER TABLE `tickets_feedback`
  ADD CONSTRAINT `tickets_feedback_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_service_actions_id_foreign` FOREIGN KEY (`service_actions_id`) REFERENCES `service_actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `workers_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `workers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
