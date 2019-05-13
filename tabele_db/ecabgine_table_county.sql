
-- --------------------------------------------------------

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
CREATE TABLE `county` (
  `id_county` int(100) NOT NULL,
  `county` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id_county`, `county`) VALUES
(1, 'Alba'),
(2, 'Arad'),
(3, 'Arges'),
(4, 'Bacau'),
(5, 'Bihor'),
(6, 'Bistrita-Nasaud'),
(7, 'Botosani'),
(8, 'Braila'),
(9, 'Brasov'),
(10, 'Buzau'),
(11, 'Calarasi'),
(12, 'Caras-Severin'),
(13, 'Cluj'),
(14, 'Constanta'),
(15, 'Covasna'),
(16, 'Dambovita'),
(17, 'Dolj'),
(18, 'Galati'),
(19, 'Giurgiu'),
(20, 'Gorj'),
(21, 'Harghita'),
(22, 'Hunedoara'),
(23, 'Ialomita'),
(24, 'Iasi'),
(25, 'Ilfov'),
(26, 'Maramures'),
(27, 'Mehedinti'),
(28, 'Mures'),
(29, 'Neamt'),
(30, 'Olt'),
(31, 'Prahova'),
(32, 'Salaj'),
(33, 'Satu Mare'),
(34, 'Sibiu'),
(35, 'Suceava'),
(36, 'Teleorman'),
(37, 'Timis'),
(38, 'Tulcea'),
(39, 'Valcea'),
(40, 'Vaslui'),
(41, 'Vrancea'),
(53, 'BUCURESTI');
