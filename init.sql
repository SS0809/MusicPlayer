CREATE TABLE `player` (
  `id` int(10) NOT NULL,
  `timeline` varchar(100) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `ytcode` varchar(20) DEFAULT NULL,
  `playlist` varchar(50) DEFAULT NULL,
  `temp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `timeline`, `username`, `ytcode`, `playlist`, `temp`) VALUES
(1, '0', '', '', NULL, 0),
(2, '12.780612', 'saurabhss', 'deprecated', 'PLKw0genvrqvkuwSACwjvroI4I9IlZ9ERz', 4),
(3, '0', 'yogesh', 'M7lc1UVf-VE', 'PLKw0genvrqvkuwSACwjvroI4I9IlZ9ERz', 0),
(4, '100', '', 'a5BsZ1MrhXc', NULL, 0),
(7, NULL, '[value-1]', NULL, '[value-2]', 0),
(8, NULL, '[value-1]', NULL, '[value-2]', 0),
(9, NULL, '', NULL, '', 0),
(10, NULL, 'saurabhs', NULL, '14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
