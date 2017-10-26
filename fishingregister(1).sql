-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05.10.2017 klo 17:28
-- Palvelimen versio: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishingregister`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `array_answers`
--

CREATE TABLE `array_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `bool_answers`
--

CREATE TABLE `bool_answers` (
  `question_id` int(11) NOT NULL,
  `answer` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `fishes`
--

CREATE TABLE `fishes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `fish_amounts`
--

CREATE TABLE `fish_amounts` (
  `collection_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `method_id` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `lakes`
--

CREATE TABLE `lakes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `research_area_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `methods`
--

CREATE TABLE `methods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `method_stats`
--

CREATE TABLE `method_stats` (
  `collection_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `tries` int(11) NOT NULL,
  `amount_per_day` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `monthly_number_answers`
--

CREATE TABLE `monthly_number_answers` (
  `question_id` int(11) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `multiple_choice_answers`
--

CREATE TABLE `multiple_choice_answers` (
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `survey_id` int(11) UNSIGNED NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `question`) VALUES
(1, 2, 'Onko tullut paljon kaljaa'),
(2, 2, 'Tämä on kyllä paskaa');

-- --------------------------------------------------------

--
-- Rakenne taululle `research_areas`
--

CREATE TABLE `research_areas` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `research_areas`
--

INSERT INTO `research_areas` (`id`, `name`, `province`) VALUES
(1, 'Kuopio', 'Itä-Suomi'),
(2, 'Utsjoki', 'Lappi'),
(3, 'Helsinki', 'Etelä-Suomen lääni');

-- --------------------------------------------------------

--
-- Rakenne taululle `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `research_area_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `surveys`
--

INSERT INTO `surveys` (`id`, `name`, `research_area_id`) VALUES
(1, 'Lomake Etelä-Suomelle', 3),
(2, 'Lomake Lappiin', 2),
(3, 'Lomake Itä-Suomelle', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `text_answers`
--

CREATE TABLE `text_answers` (
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(10) DEFAULT '1',
  `research_area_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `research_area_id`) VALUES
(2, 'admin', '$2y$10$r.6422yIOw597lbJhFSbq.TFUTU0.HYTlO7pdbmk32oU0I3Pu98dS', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `array_answers`
--
ALTER TABLE `array_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishes`
--
ALTER TABLE `fishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_amounts`
--
ALTER TABLE `fish_amounts`
  ADD KEY `fish_amounts_fk0` (`collection_id`),
  ADD KEY `fish_amounts_fk1` (`method_id`),
  ADD KEY `fish_amounts_fk2` (`fish_id`);

--
-- Indexes for table `lakes`
--
ALTER TABLE `lakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lakes_fk0` (`research_area_id`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `method_stats`
--
ALTER TABLE `method_stats`
  ADD KEY `method_stats_fk0` (`collection_id`),
  ADD KEY `method_stats_fk1` (`method_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `research_areas`
--
ALTER TABLE `research_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_area_id` (`research_area_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_area_id` (`research_area_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fishes`
--
ALTER TABLE `fishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lakes`
--
ALTER TABLE `lakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `research_areas`
--
ALTER TABLE `research_areas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`);

--
-- Rajoitteet taululle `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_ibfk_1` FOREIGN KEY (`research_area_id`) REFERENCES `research_areas` (`id`);

--
-- Rajoitteet taululle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`research_area_id`) REFERENCES `research_areas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
