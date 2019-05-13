
-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id_patient` int(12) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `id_county` int(100) DEFAULT NULL,
  `id_city` int(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `CNP` bigint(13) DEFAULT NULL,
  `marital_status` enum('married','notmarried') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_patient`, `first_name`, `last_name`, `birth_date`, `id_county`, `id_city`, `address`, `job`, `company`, `phone_number`, `email`, `CNP`, `marital_status`) VALUES
(1, 'nume', 'pren', '2085-01-01', 53, 1812, 'adresa', 'job', 'comp', '12345678', 'asdf@dfghj', 12312345678, 'married');
