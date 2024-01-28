-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 28 Ιαν 2024 στις 12:44:58
-- Έκδοση διακομιστή: 10.4.28-MariaDB
-- Έκδοση PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `members_catalog`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `contacts`
--

INSERT INTO `contacts` (`ID`, `name`, `phone`, `email`, `pic`) VALUES
(6, 'Jane Smith', '555-5678', 'jane.smith@example.com', './pics/65b63cd35fff1.jpg'),
(7, 'Bob Johnson', '555-8765', 'bob.johnson@example.com', './pics/65b63d3331aad.jpg'),
(8, 'Alice Brown', '555-4321', 'alice.brown@example.com', './pics/65b63d4a0bf8f.jpg'),
(9, 'David Wilson', '555-9876', 'david.wilson@example.com', './pics/65b63d0c4fc36.jpg'),
(10, 'Emily Davis', '555-6543', 'emily.davis@example.com', './pics/65b63d13530ef.jpg'),
(12, 'Olivia White', '555-7654', 'olivia.white@example.com', './pics/65b63d1f9e484.jpg'),
(13, 'Daniel Miller', '555-3456', 'daniel.miller@example.com', './pics/65b63d570ce27.jpg'),
(14, 'Sophia Garcia', '555-6789', 'sophia.garcia@example.com', './pics/65b63d60b6de1.jpg'),
(22, 'Fatjon Lleshi', '6986838737', 'johnlesis91@gmail.com', './pics/65b63d7b8d8e6.jpg'),
(23, 'Fatjon Lleshidad', '6986838737dada', 'johnlesis91@gmail.comada', './pics/65b63d8a9ba39.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'johnlesis', 'loutraki'),
(2, 'iwanna', 'korinthos'),
(5, 'john_doe', 'hashed_password_for_john_doe'),
(6, 'jane_smith', 'hashed_password_for_jane_smith'),
(7, 'bob_johnson', 'hashed_password_for_bob_johnson'),
(8, 'alice_brown', 'hashed_password_for_alice_brown'),
(9, 'david_wilson', 'hashed_password_for_david_wilson'),
(10, 'emily_davis', 'hashed_password_for_emily_davis'),
(11, 'michael_lee', 'hashed_password_for_michael_lee'),
(12, 'olivia_white', 'hashed_password_for_olivia_white'),
(13, 'daniel_miller', 'hashed_password_for_daniel_miller'),
(14, 'sophia_garcia', 'hashed_password_for_sophia_garcia');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
