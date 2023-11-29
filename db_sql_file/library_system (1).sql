-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 26 2023 г., 08:00
-- Версия сервера: 5.7.39
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE `Books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(80) DEFAULT NULL,
  `Author` varchar(30) DEFAULT NULL,
  `Publisher` varchar(30) DEFAULT NULL,
  `Language` varchar(50) DEFAULT NULL,
  `Category` enum('Fiction','Nonfiction','Reference') DEFAULT 'Fiction',
  `ImagePath` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Available',
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Books` (`BookID`, `Title`, `Author`, `Publisher`, `Language`, `Category`, `ImagePath`, `status`, `StatusID`) VALUES
(80, 'The Fellowship of the Ring', 'J.R.R. Tolkien', 'Oxford', 'Nonfiction', 'Reference', 'The_Fellowship_of_the_Ring_cover.gif', 'Onloan', 2),
(81, 'Harry Potter and the Prisoner of Azkaba', 'Harry Potter', 'Oxford', 'Fiction', 'Fiction', 'Harry_Potter_and_the_Prisoner_of_Azkaban.jpg', 'Available', 1),
(82, 'The Hound of the Baskervilles', 'Arthur Conan Doyle', 'Oxford', 'Reference', 'Reference', 'Cover_(Hound_of_Baskervilles,_1902).jpg', 'Available', 1),
(83, 'Gone Girl', 'Gillian Flynn', 'Oxford', 'Fiction', 'Reference', 'Gone_Girl_(Flynn_novel).jpg', 'Available', 1),
(90, 'Heretics of Dune', 'Frank Herbert', 'Putnam', 'Fiction', 'Fiction', 'Heretics_of_Dune-Frank_Herbert_(1984)_First_edition.jpg', 'Available', 1),
(91, 'Gone Girl', 'Gillian Flynn', 'Crown Publishing Group', 'Reference', 'Reference', 'Gone_Girl_(Flynn_novel).jpg', 'Onloan', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `bookstatus`
--

CREATE TABLE `bookstatus` (
  `StatusID` int(11) NOT NULL,
  `BookID` int(11) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `DueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookstatus`
--

INSERT INTO `bookstatus` (`StatusID`, `BookID`, `MemberID`, `Status`, `DueDate`) VALUES
(12, 80, 9, 'Returned', NULL),
(13, 81, 9, 'Returned', NULL),
(92, 81, 9, 'Returned', NULL),
(93, 81, 9, 'Returned', NULL),
(94, 80, 9, 'Returned', NULL),
(95, 82, 9, 'Returned', NULL),
(96, 81, 9, 'Returned', NULL),
(97, 91, 9, 'Onloan', '2023-12-12'),
(98, 81, 9, 'Returned', NULL),
(99, 82, 39, 'Returned', NULL),
(100, 80, 9, 'Returned', NULL),
(101, 81, 9, 'Returned', NULL),
(102, 80, 43, 'Onloan', '2023-12-15');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `MemberID` int(11) NOT NULL,
  `MemberType` enum('Member','Admin') DEFAULT 'Member',
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`MemberID`, `MemberType`, `FirstName`, `LastName`, `Email`, `PasswordHash`) VALUES
(5, 'Member', 'Viktoriia', 'Krot', 'krotvika95@gmail.com', 'd3aeb350524cc9b584e5d69d0b4242e4'),
(6, 'Admin', 'Steve', 'Stevenson', 'steve123@gmail.com', 'c12f7c83a2322ad01464bba72185e88f'),
(8, 'Admin', 'Mykhailo', 'Troshchenko', 'bobrov093@gmail.com', '$2y$10$UbgvQ8Ff594.pZPkKMjkZ.SJY3F1j26WrFkNXXdcsvuwjXhOObUj6'),
(9, 'Member', 'Viktoriia', 'Krot', '1-krotvika95@gmail.com', '$2y$10$uEzc/5rzuIStlbRJW7BuGeayu2f0LQQ50Eyf1I7EMEKHb6mA.SDdW'),
(39, 'Member', 'Mykhailo', 'Troshchenko', '124bobrov093@gmail.com', '$2y$10$H6Mo42UtUvxUoozsANSBHOTP7gs8mNQZSex2bElfp.Z9JUM0LT9YK'),
(43, 'Member', 'Mykhailo', 'Troshchenko', '1bobrov093@gmail.com', '$2y$10$7HByJcX2PyfwtVG8abV0bOofvto0NsxM5tH9hkp2H2V69GQWiWph6'),
(54, 'Member', 'Mykhailo', 'Troshchenko', 'bobrov093@gmail.c', '$2y$10$C5TERxY39cCpSinmYfPqX.BP0.K9J.oqS2cZWN3XhFRc7Bn.MRRQS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`BookID`);

--
-- Индексы таблицы `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`StatusID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `fk_bookstatus_BookID` (`BookID`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`MemberID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Books`
--
ALTER TABLE `Books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD CONSTRAINT `bookstatus_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `Books` (`BookID`),
  ADD CONSTRAINT `bookstatus_ibfk_2` FOREIGN KEY (`MemberID`) REFERENCES `User` (`MemberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
