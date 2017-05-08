-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 29 apr 2017 om 12:54
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IMDterest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `image`, `description`, `FK_userid`) VALUES
(18, './images/posts/6_1493296758.jpeg', 'testerzsddqds', 6),
(19, './images/posts/6_1493299345.jpeg', 'Wallpaper', 6),
(20, './images/posts/6_1493299356.jpeg', 'Drawing', 6),
(21, './images/posts/6_1493299363.jpeg', 'Another drawing', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `topics`
--

INSERT INTO `topics` (`id`, `name`) VALUES
(1, 'Design '),
(3, 'Development'),
(4, 'Koken'),
(5, 'Tuin'),
(6, 'Sport');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topics` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `topics`) VALUES
(1, 'Kenny', 'Mala Ngombe', 'kenny.malangombe@gmail.com', '$2y$12$LHfkFRW5.iBq5VWtRxqLf.NH0BqZZrygaXnH4Nk5KuMEmeDl12Dc6', ''),
(2, 'Dirk', 'Jan', 'test@test.com', '$2y$12$So.Ts9Ll1wBF60JNH3P6VOzSXgJgocgTmvwjxZm9QnmjksG2TA9Bm', ''),
(3, 'Kenny', 'hallo', 'dikke@teen.be', '$2y$12$uy6TGYkAYqcRf0QI8.9jJO6JOkwgNGgx4DjTQrxjUcQyTz5AiADzy', ''),
(4, 'Kenny', 'Mala Ngombe', 'kenny.malangombe@gmail.com', '$2y$12$/y1.C0dn5/sdwYaIQMQMIuupHuGYZ090TEF5tJb4LkUeho12xrKjm', ''),
(5, 'kenny', 'test', 'hallo@daag.be', '$2y$12$TfAh7bk5dYZVcu3LbN9XTOLhx4Gh.MspEjdHk5zl3qZNSvYIfPjh6', ''),
(6, 'pieter', 'slangen', 'Pieterslangen@live.nl', '$2y$12$dT5wWir99SZF1s7H2GDkru0.ZYef9Axur5UfPZQZkdVTbFfzYPWsa', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid` (`FK_userid`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
