--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `date_of_birth`, `phone_number`) VALUES
(1, 'Pardess', 'pardess@gmail.com', '1e0fa38366348f5a258b213b8199f4ab', '1990-07-22', 1233456789),
(2, 'Fareed', 'fareed@gmail.com', '287991bc0a634b67a92c2c5881d2abff', '1989-01-01', 2147483647),
(3, 'mb', 'mb@gmail.com', 'a9ddcf51419881bdee445181e32ede58', '1991-01-01', 232342343);


--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(2, 'Staff', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(3, 'Finance', '2017-11-22 05:59:11', '2017-11-22 05:59:11'),
(4, 'HR', '2017-11-22 05:59:11', '2017-11-22 05:59:11');

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(2, 'user_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(3, 'user_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(4, 'user_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(5, 'role_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(6, 'role_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(7, 'role_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(8, 'role_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(9, 'transaction_view', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(10, 'transaction_add', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(11, 'transaction_edit', '2017-11-22 05:56:18', '2017-11-22 05:56:18'),
(12, 'transaction_delete', '2017-11-22 05:56:18', '2017-11-22 05:56:18');


--
-- Table structure for table `role_has_permission`
--

CREATE TABLE `role_has_permission` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY(`permission_id`, `role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(5, 2),
(9, 2),
(1, 3),
(5, 3),
(9, 3),
(1, 4),
(5, 4),
(9, 4);


--
-- Table structure for table `user_has_role`
--

CREATE TABLE `user_has_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY(`user_id`, `role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `user_has_role`
--

INSERT INTO `user_has_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4);