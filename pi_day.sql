-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Mar 2023, 21:17
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pi_day`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `attempts`
--

CREATE TABLE `attempts` (
  `PointsGeined` int(1) NOT NULL,
  `QuestID` int(2) NOT NULL,
  `StudentID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quests`
--

CREATE TABLE `quests` (
  `QuestID` int(2) NOT NULL,
  `QuestName` varchar(50) NOT NULL,
  `Description` varchar(120) NOT NULL,
  `MaxPoints` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

CREATE TABLE `students` (
  `StudentID` int(3) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Class` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `attempts`
--
ALTER TABLE `attempts`
  ADD KEY `QuestID` (`QuestID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indeksy dla tabeli `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`QuestID`);

--
-- Indeksy dla tabeli `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_ibfk_1` FOREIGN KEY (`QuestID`) REFERENCES `quests` (`QuestID`),
  ADD CONSTRAINT `attempts_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
