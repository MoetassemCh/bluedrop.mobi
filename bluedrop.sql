-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 07:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluedrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220817131825', '2022-08-17 15:18:36', 474),
('DoctrineMigrations\\Version20220817152123', '2022-08-17 17:21:34', 1174),
('DoctrineMigrations\\Version20220818122943', '2022-08-18 14:29:50', 661),
('DoctrineMigrations\\Version20220818123057', '2022-08-18 14:31:06', 193),
('DoctrineMigrations\\Version20220818154026', '2022-08-18 17:40:34', 1020),
('DoctrineMigrations\\Version20220820141244', '2022-08-20 16:12:55', 1264),
('DoctrineMigrations\\Version20220823145755', '2022-08-23 16:58:19', 628),
('DoctrineMigrations\\Version20220825135725', '2022-08-25 15:57:35', 547),
('DoctrineMigrations\\Version20220825140815', '2022-08-25 16:08:25', 348),
('DoctrineMigrations\\Version20220825150308', '2022-08-25 17:03:15', 1116),
('DoctrineMigrations\\Version20220825150443', '2022-08-25 17:04:48', 1153),
('DoctrineMigrations\\Version20220825152555', '2022-08-25 17:26:00', 344),
('DoctrineMigrations\\Version20220825152933', '2022-08-25 17:29:57', 2160),
('DoctrineMigrations\\Version20220825153334', '2022-08-25 17:34:39', 1566),
('DoctrineMigrations\\Version20220825154425', '2022-08-25 17:44:35', 2647),
('DoctrineMigrations\\Version20220826144437', '2022-08-26 16:45:31', 1411),
('DoctrineMigrations\\Version20220826144638', '2022-08-26 16:46:46', 1545),
('DoctrineMigrations\\Version20220826150749', '2022-08-26 17:08:01', 948),
('DoctrineMigrations\\Version20220826150837', '2022-08-26 17:08:42', 319),
('DoctrineMigrations\\Version20220828165653', '2022-08-28 18:57:02', 605),
('DoctrineMigrations\\Version20220828171734', '2022-08-28 19:17:39', 379),
('DoctrineMigrations\\Version20220828171845', '2022-08-28 19:18:52', 177),
('DoctrineMigrations\\Version20220829123023', '2022-08-29 14:30:28', 785),
('DoctrineMigrations\\Version20220830154830', '2022-08-30 17:48:36', 1459),
('DoctrineMigrations\\Version20220907161659', '2022-09-07 18:17:21', 4602),
('DoctrineMigrations\\Version20220907165708', '2022-09-07 18:57:14', 672),
('DoctrineMigrations\\Version20220908152303', '2022-09-08 17:23:13', 3648);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `created_at`, `updated_at`, `text`, `ticket_id`) VALUES
(2, NULL, '2022-09-08 18:07:47', NULL, '<div>hello<br><br></div>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_at`, `updated_at`, `project_name`, `price`, `status`) VALUES
(26, 1, '2022-09-01 17:38:21', '2022-09-06 16:23:26', 'E-commerce', '550.00', 'progrès'),
(29, 1, NULL, NULL, 'open data', '52530.00', NULL),
(32, 1, NULL, NULL, 'Portfolio', '53550.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `service`, `description`, `image`, `cost`, `created_at`, `updated_at`) VALUES
(18, 'E-commerce', '<div>Un site Web qui permet aux gens d\'acheter et de vendre des biens physiques, des services et des produits numériques sur Internet plutôt que sur un site physique. Grâce à un site Web de commerce électronique, une entreprise peut traiter des commandes,', 'p9.png', '56320.00', '2022-09-01 17:34:49', '2022-09-01 17:36:57'),
(20, 'open data', '<div>Drupal Audit, Drupal Development, Artistic Management</div>', 'logo-solidere_0.png', '52530.00', '2022-09-01 17:37:53', NULL),
(21, 'Portfolio', '<div><br>De nombreux indépendants ou consultants créent leurs propres portefeuilles personnels ou sites de CV. Ce sont des sites qui présentent leur travail, leurs projets, et disposent d\'un simple formulaire de contact. Ils sont destinés à mettre en vale', 'p4.png', '53550.00', '2022-09-01 18:05:55', '2022-09-01 18:06:04'),
(22, 'test', '<div><br>De nombreux indépendants ou consultants créent leurs propres portefeuilles personnels ou sites de CV. Ce sont des sites qui présentent leur travail, leurs projets, et disposent d\'un simple formulaire de contact. Ils sont destinés à mettre en vale', 'p4.png', '53550.00', '2022-09-01 18:05:55', '2022-09-01 18:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `user_id`, `created_at`, `updated_at`, `status`, `contenu`, `description`) VALUES
(2, NULL, '2022-09-07 18:58:16', NULL, NULL, 'i have some questions', NULL),
(3, NULL, '2022-09-07 18:58:28', NULL, NULL, 'i have atjoer questions', NULL),
(4, 1, NULL, NULL, NULL, 'i have some questions', 'dadad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `full_name`, `username`, `region`, `image`, `phonenumber`, `dob`) VALUES
(1, 'john@gmail.com', '[]', '$2y$13$w5UYOSjov805dNGE3CDVFeZ1IVSzZSz2e.W6UM0FYfxETJEqm18bO', 'John Doe', 'john_doe', 'lebanon', NULL, '1351232', '2022-08-09'),
(2, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$qh77XWr/sVsKb86q5AJmqOOEcW.Vj2xTyn7cgVI/22OaK3G0ICOxu', 'admin13', 'admin_13', 'lebanon', NULL, '31341431414', '2000-08-15'),
(6, 'mike@gmail.com', '[]', '$2y$13$Zz6vKTGQR4VNcB3ZATBTpemVu4kBn77cxYS99wwUE4FfjO/AzX562', 'Mike Smith', 'mike_smith', 'lebanon', NULL, '34124141', '1914-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_11BA68CA76ED395` (`user_id`),
  ADD KEY `IDX_11BA68C700047D2` (`ticket_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5299398A76ED395` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_97A0ADA3A76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_11BA68C700047D2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `FK_11BA68CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_97A0ADA3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
