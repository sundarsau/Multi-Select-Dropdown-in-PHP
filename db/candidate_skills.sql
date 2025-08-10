
CREATE TABLE `candidate_skills` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `candidate_skills`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `candidate_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `candidate_skills`
  ADD CONSTRAINT `candidate_skills_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidate_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

  
