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
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `date_of_birth`, `phone_number`) VALUES
(1, 'Pardess', 'pardess@gmail.com', '1e0fa38366348f5a258b213b8199f4ab', '1990-07-22', 1233456789),
(2, 'Fareed', 'fareed@gmail.com', '287991bc0a634b67a92c2c5881d2abff', '1989-01-01', 2147483647),
(3, 'mb', 'mb@gmail.com', 'a9ddcf51419881bdee445181e32ede58', '1991-01-01', 232342343);


