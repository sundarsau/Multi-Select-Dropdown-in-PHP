CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `registration_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

