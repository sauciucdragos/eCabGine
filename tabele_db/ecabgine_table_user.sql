
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `user` varchar(50) NOT NULL,
  `active_user` varchar(50) NOT NULL,
  `locked_user` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` enum('Nurse','Doctor','Secretary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `active_user`, `locked_user`, `first_name`, `last_name`, `password`, `position`) VALUES
(1, 'admin', 'activ', '', 'admin', 'admin', '1234', '');
