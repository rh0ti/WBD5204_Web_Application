-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 17. Okt 2020 um 16:23
-- Server-Version: 5.7.26
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wish_list`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `image`) VALUES
(10, 'John', 'john@gmail.com', '$2y$10$eJNONmgketYy/.aT5j75YucQ5leEXpTLSnLfBLUWLLSSG/lZ67J3a', NULL),
(11, 'Emma', 'emma@gmail.com', '$2y$10$n5mCzznzoSRZYWXJZNw3wuacvYkghEOd0v.NBK.UQmeEYKAcXajTK', NULL),
(12, 'Rhottana', 'rhottana.truy@gmail.com', '$2y$10$2SNcHSrwlOolCSb.GtwRhuDmVq2eNVQO9e8aQeSnABxXFWsrLokZS', NULL),
(13, 'Jordi', 'jordi@gmail.com', '$2y$10$x/whqLv6ugicFWKn2QKIo.WBbGATdmwgSV4YSujK8SLxHfaU9d1Ve', NULL),
(14, 'Maria', 'maria@gmail.com', '$2y$10$T9JUYuyxdd1relUvZrimkelASjSoBDWvuSzCzmgj.LE98NhTnpQqO', NULL),
(16, 'Kevin', 'kevin@gmail.com', '$2y$10$YCe2wWqy/g.jahJJHIN01Oqh.VZ1zFwuiLVk/NlA/bWnlF3AcbqX.', NULL),
(17, 'Alida', 'alida@gmail.com', '$2y$10$kp5xGGy.Efbtytce8hjJ4.OmnygNW/DIRfYK76ZP6wAqJLg9StmNq', NULL),
(18, 'Lena', 'lena@gmail.com', '$2y$10$fAg94HixHV6XtCQY67G8Ju5rABw26GuuP6xmokblwlqPFUpvhspCu', NULL),
(21, 'Tina', 'tina@gmail.com', '$2y$10$yT34LtKeZE1ghCnEg1veeOcqWYnNcliwg1212ZhJXYqyh27zl7KnC', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wishes`
--

CREATE TABLE `wishes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`);

--
-- Constraints der Tabelle `wishes`
--
ALTER TABLE `wishes`
  ADD CONSTRAINT `wishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
