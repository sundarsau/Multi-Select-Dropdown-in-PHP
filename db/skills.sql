CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `skills` (`id`, `skill_name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'C++'),
(4, 'Python'),
(5, 'Html and CSS'),
(6, 'MySQL'),
(7, 'Oracle'),
(8, 'JavaScript'),
(9, 'jQuery'),
(10, 'Wordpress'),
(11, 'Android');


ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


