-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 14. Apr 2023 um 13:05
-- Server-Version: 10.5.15-MariaDB-0+deb11u1
-- PHP-Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `OHL`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Access`
--

CREATE TABLE `Access` (
  `ID` int(11) NOT NULL,
  `Pers_ID` varchar(5) NOT NULL,
  `Card_ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `Locked` int(1) NOT NULL,
  `Logged` int(1) NOT NULL,
  `Logins` int(6) NOT NULL,
  `Permission` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Access`
--

INSERT INTO `Access` (`ID`, `Pers_ID`, `Card_ID`, `Name`, `Lastname`, `Locked`, `Logged`, `Logins`, `Permission`) VALUES
(16, '1858', 304430658, 'Artur', 'Stern', 0, 0, 113, 'Teamleiter'),
(17, '1976', 316043414, 'Maria', 'D\' Angelo', 0, 1, 250, 'Admin'),
(18, '1822', 323598820, 'Lara', 'Führmann', 0, 0, 205, 'Admin'),
(21, '6358', 318149044, 'Zyma', 'Oleh', 0, 1, 390, 'Mitarbeiter'),
(22, '6389', 318149816, 'Nicolae', 'Antohi', 0, 0, 108, 'Mitarbeiter'),
(23, '2085', 324293626, 'Andrei', 'Dodan ', 0, 0, 287, 'Mitarbeiter'),
(24, '2083', 324290919, 'Xenia', 'Dodan ', 0, 0, 363, 'Mitarbeiter'),
(25, '6414', 318149951, 'Catalina', 'Demcenco ', 0, 1, 200, 'Mitarbeiter'),
(27, '6415', 318151640, 'Dmitri', 'Russu ', 0, 0, 44, 'Mitarbeiter'),
(29, '2096', 323593826, 'Kateryna', 'Zakharko ', 0, 1, 298, 'Mitarbeiter'),
(30, '2017', 313949184, 'Kevin', 'Gabriel ', 0, 1, 102, 'Mitarbeiter'),
(31, '730', 313945462, 'Silke', 'Conow', 0, 0, 589, 'Admin'),
(34, '2016', 318154283, 'Nick', 'Harring ', 0, 1, 265, 'Admin'),
(35, '6397', 318150271, 'Finn', 'Rosner ', 0, 1, 280, 'Mitarbeiter'),
(36, '818', 323593078, 'Markus', 'Wagner ', 0, 1, 142, 'Admin'),
(37, '6382', 313947794, 'Ivan', 'Tovstopiat ', 0, 1, 361, 'Mitarbeiter'),
(38, '6409', 313948766, 'Valeriu', 'Dinu ', 0, 0, 107, 'Mitarbeiter'),
(39, '6410', 313949208, 'Daryna', 'Herasymenko ', 0, 1, 285, 'Mitarbeiter'),
(40, '6412', 318154794, 'Crina', 'Lisnic', 0, 0, 0, 'Mitarbeiter'),
(41, '6411', 313947160, 'Igor', 'Lisnic ', 0, 0, 0, 'Mitarbeiter'),
(42, '2042', 318154508, 'Franka', 'Krabbe', 0, 1, 272, 'Mitarbeiter'),
(44, '6423', 313948733, 'Andrei ', 'Sineares ', 0, 0, 276, 'Mitarbeiter'),
(45, '6424', 313948252, 'Ekaterina', 'Sinearenes ', 0, 0, 269, 'Mitarbeiter'),
(46, '6425', 313948920, 'Halyna', 'Danylo ', 0, 0, 363, 'Mitarbeiter'),
(47, '6426', 318153942, 'Norbert Sebastian ', 'Pliszka ', 0, 1, 441, 'Mitarbeiter'),
(50, '1298', 323601168, 'Florian ', 'Frahm', 0, 0, 154, 'Admin'),
(52, '6450', 318149591, 'Serdar ', 'Coskun ', 0, 0, 301, 'Mitarbeiter'),
(53, '6459', 318149726, 'Cristina', 'Vinevschi ', 0, 0, 464, 'Mitarbeiter'),
(54, '6460', 318148914, 'Marian', ' Vladislava', 0, 0, 456, 'Mitarbeiter'),
(55, '6461', 318149549, 'Viktoriia', 'Baranovska ', 0, 0, 277, 'Mitarbeiter'),
(56, '6462', 318149098, 'Olha', 'Zhyhar ', 0, 1, 301, 'Mitarbeiter'),
(57, '6470', 318149829, 'Ahmed', 'Tabarik ', 0, 1, 336, 'Mitarbeiter'),
(59, '2072', 318149918, 'Kateryna', ' Baloh', 0, 1, 343, 'Mitarbeiter'),
(60, '6359', 318149863, 'Snizhana ', 'Shevchenko', 0, 1, 304, 'Mitarbeiter'),
(61, '1054', 504097159, 'Maike ', 'Bezaz-Hagen', 0, 1, 259, 'Mitarbeiter'),
(63, '2011', 313946113, 'Melissa', 'Brinkmann', 0, 0, 123, 'Teamleiter'),
(64, '6486', 318149546, 'Stanislav', 'Enachi', 0, 0, 336, 'Mitarbeiter'),
(65, '6487', 318150055, 'Olga', 'Enachi', 0, 0, 269, 'Mitarbeiter'),
(66, '2071', 318149139, 'Ivan', 'Baloh', 0, 0, 337, 'Mitarbeiter'),
(67, '6388', 318149416, 'Antohi ', 'Nadejda', 0, 1, 115, 'Mitarbeiter'),
(70, '6432', 318149666, 'Alexander ', 'Schmidt ', 0, 1, 418, 'Mitarbeiter'),
(71, '1897', 318148678, 'Patrick', 'Wendt', 0, 0, 80, 'Teamleiter'),
(72, '6469', 318149201, 'Berhane', 'Yemane', 0, 0, 373, 'Mitarbeiter'),
(73, '6489', 318150070, 'Natalia', 'Jelez', 0, 1, 296, 'Mitarbeiter'),
(77, '6490', 318150294, 'Rene', 'Lange', 0, 1, 467, 'Mitarbeiter'),
(78, '1250', 292815281, 'Ute', 'Hübner', 0, 0, 44, 'Mitarbeiter'),
(79, '6501', 318152402, 'Tamara', 'Gogolewska', 0, 0, 148, 'Mitarbeiter'),
(81, '1190', 309111999, 'Hartmut', 'Lund', 0, 0, 161, 'Admin'),
(82, '1994', 318149684, 'Maik ', 'Holsten ', 0, 1, 124, 'Mitarbeiter'),
(83, '1479', 308834187, 'Markus ', 'Jessen', 0, 1, 313, 'Mitarbeiter'),
(84, '6447', 318155068, 'Natalia', 'Herasevych', 0, 1, 321, 'Mitarbeiter'),
(85, '6488', 318152021, 'Alexandr', 'Reabciuc', 0, 1, 309, 'Mitarbeiter'),
(86, '6491', 318149263, 'Aaj', 'Kotiba', 0, 0, 175, 'Mitarbeiter'),
(87, '39', 504166541, 'Raissa', 'Raabe', 0, 1, 134, 'Mitarbeiter'),
(88, '1102', 308936295, 'Johann', 'Raabe', 0, 1, 159, 'Mitarbeiter'),
(89, '6466', 318154124, 'Ella', 'Jecov', 0, 0, 0, 'Mitarbeiter'),
(90, '6449', 318149361, 'Felicia', 'Mitrea', 0, 1, 280, 'Mitarbeiter'),
(93, '1824', 298779425, 'Marvin', 'Schmidt', 0, 0, 77, 'Mitarbeiter'),
(94, '6510', 318150069, 'Nataliia', 'Navitska', 0, 0, 2, 'Mitarbeiter'),
(95, '2031', 313948245, 'Robin Marc', 'Jacobsen', 0, 0, 362, 'Mitarbeiter'),
(97, '1916', 309112824, 'Aisha', 'Nasif ', 0, 0, 49, 'Mitarbeiter'),
(98, '1546', 504116585, 'Rositzki', 'Eric Alexander', 0, 0, 20, 'Admin'),
(99, '6515', 318150355, 'Hubert', 'Kandulski', 0, 0, 109, 'Mitarbeiter'),
(100, '2060', 318149387, 'Yannik Elias ', 'Werner', 0, 1, 215, 'Mitarbeiter'),
(101, '6516', 318150006, 'Akram', 'Gaafar', 0, 0, 6, 'Mitarbeiter'),
(102, '989', 299236271, 'Matthias', 'Möller', 0, 0, 89, 'Teamleiter'),
(103, '1058', 308835127, 'Jan', 'Völkel', 0, 0, 91, 'Teamleiter'),
(104, '1463', 504171769, 'Dennis', 'Antweiler', 0, 0, 8, 'Teamleiter'),
(105, '945', 504177787, 'Riewert', 'Hinrichs', 0, 0, 5, 'Teamleiter'),
(106, '1905', 308833217, 'Saskia', 'Ebersbach', 0, 0, 11, 'Teamleiter'),
(108, '6517', 318149548, 'Dimitriadi', 'Gkagiane', 0, 1, 7, 'Mitarbeiter'),
(109, '6518', 318149228, 'Hasib', 'Pitravic', 0, 0, 47, 'Mitarbeiter'),
(110, '6519', 318149574, 'Manuela', 'Volkmer Kolasinski', 0, 1, 19, 'Mitarbeiter'),
(111, '6520', 318150077, 'Angela', 'Olaru', 0, 0, 102, 'Mitarbeiter'),
(112, '6521', 318150295, 'Serghei', 'Ghideev', 0, 1, 35, 'Mitarbeiter'),
(113, '6522', 318149727, 'Yasmin', 'Tefikoglou', 0, 0, 44, 'Mitarbeiter'),
(114, '6523', 318149232, 'Moustafa', 'Chasan', 0, 1, 32, 'Mitarbeiter'),
(115, '6524', 318150450, 'Abdulrahman', 'Naji', 0, 0, 299, 'Mitarbeiter'),
(116, '6525', 318149014, 'Ilias', 'Karapetian', 0, 0, 135, 'Mitarbeiter'),
(117, '1578', 318151496, 'Matthias ', 'Richter', 0, 0, 18, 'Teamleiter'),
(118, '2067', 318150079, 'Björn', 'Brogmus', 0, 1, 160, 'Mitarbeiter'),
(119, '2063', 318149168, 'Pauls', 'Christoph', 0, 0, 169, 'Teamleiter'),
(120, '6529', 318152044, 'Mareike', 'Daniel', 0, 1, 136, 'Mitarbeiter'),
(121, '6530', 318149580, 'Mardan', 'Zaghla', 0, 1, 182, 'Mitarbeiter'),
(122, '6532', 318149485, 'Diego', 'Ogara', 0, 0, 0, 'Mitarbeiter'),
(123, '6533', 318150012, 'Ahmad', 'Mosari', 0, 0, 157, 'Mitarbeiter'),
(124, '6534', 318151102, 'Sascha ', 'Eich', 0, 0, 0, 'Mitarbeiter'),
(126, 'G3', 318149703, 'Besucher', 'OHL', 0, 0, 45, 'Mitarbeiter'),
(127, 'G2', 318149415, 'Besucher', 'OHL', 0, 1, 100, 'Mitarbeiter'),
(128, 'G1', 318149856, 'Besucher', 'OHL', 0, 0, 86, 'Mitarbeiter'),
(129, 'G4', 318150976, 'OHL ', 'Security', 0, 0, 764, 'Admin'),
(130, '6557', 324288625, 'Danil', 'Ciumas', 0, 0, 159, 'Mitarbeiter'),
(131, '6427', 318149360, 'Gheorghe', 'Ciumas', 0, 0, 144, 'Mitarbeiter'),
(136, '1571', 315802994, 'Anil', 'Chikmet Oglou', 0, 0, 49, 'Super User'),
(137, '1939', 309070544, 'Milad', 'Ebadi', 0, 0, 71, 'Mitarbeiter'),
(138, '6467', 318150270, 'Soltanica-Simona', 'Prisecaru', 0, 0, 161, 'Mitarbeiter'),
(139, 'G5', 318150394, 'Bayersdorf', 'OHL', 0, 0, 43, 'Mitarbeiter'),
(140, 'G6', 318149354, 'Besucher', 'OHL', 0, 0, 97, 'Mitarbeiter'),
(141, 'G7', 318151894, 'Besucher', 'OHL', 0, 0, 95, 'Mitarbeiter'),
(144, '2079', 318149483, 'Rasmus', 'Korff', 0, 0, 146, 'Mitarbeiter'),
(145, '6559', 318149055, 'Manuela', 'Scherer', 0, 0, 122, 'Mitarbeiter'),
(146, '6560', 318150084, 'Iryna', 'Piatykhatka', 0, 1, 128, 'Mitarbeiter'),
(147, '2078', 318149941, 'Dorina', 'Fitsak', 0, 0, 149, 'Mitarbeiter'),
(149, '06535', 318149137, ' Mohammad Khaneghah', 'Mohammadi', 0, 1, 192, 'Teamleiter'),
(150, '6546', 318152246, 'Larisa', 'Doni', 0, 1, 201, 'Mitarbeiter'),
(151, '6542', 318148723, 'Alexandru', 'Vitan', 0, 0, 169, 'Mitarbeiter'),
(152, '6541', 318149298, 'Diana', 'Vitan', 0, 0, 187, 'Mitarbeiter'),
(153, '6545', 318149363, 'Dumitru', 'Ceban', 0, 1, 236, 'Mitarbeiter'),
(154, '6544', 318149958, 'Stefan', 'Tabac', 0, 1, 32, 'Mitarbeiter'),
(155, '6543', 318150109, 'Dumitrita', 'Tabac', 0, 1, 36, 'Mitarbeiter'),
(156, '6320', 318149783, 'Karyna', 'Solomashkina', 0, 1, 167, 'Mitarbeiter'),
(157, '6347', 318148786, 'Mykola', 'Braschenko', 0, 0, 140, 'Mitarbeiter'),
(158, '6550', 318150262, 'Ilie', 'Ciobanu', 0, 0, 164, 'Mitarbeiter'),
(159, '6348', 318150116, 'Valeriia', 'Domashenko', 0, 1, 212, 'Mitarbeiter'),
(163, '6349', 318149234, 'Yuliia', 'Butko', 0, 0, 215, 'Mitarbeiter'),
(164, '6455', 318149610, 'Lennard', 'Mertineit', 0, 0, 151, 'Mitarbeiter'),
(165, '2080', 324296481, 'Emilia', 'Carabulea', 0, 0, 147, 'Mitarbeiter'),
(166, '6340', 318149487, 'Sveatoslav', 'Bogoev', 0, 0, 154, 'Mitarbeiter'),
(167, '6547', 318149765, 'Ana', 'Tincu', 0, 0, 205, 'Mitarbeiter'),
(168, '6551', 318148887, 'Elena', 'Ciobanu', 0, 0, 163, 'Mitarbeiter'),
(169, '6554', 318149170, 'Faris', 'Hussein Ashur', 0, 0, 209, 'Mitarbeiter'),
(171, '6555', 318148787, 'Arivan', 'Hussein', 0, 0, 102, 'Mitarbeiter'),
(172, '6540', 318148851, 'Leon', 'Bohlscheid', 0, 0, 193, 'Mitarbeiter'),
(173, '6553', 318149323, 'Phillip', 'Semrau', 0, 1, 176, 'Mitarbeiter'),
(174, '1421', 324292635, 'Dennis', 'Kopp', 0, 0, 191, 'Mitarbeiter'),
(175, '2061', 318149047, 'Slava', 'Dmitriev', 0, 1, 85, 'Mitarbeiter'),
(176, '6339', 318149880, 'Lila', 'Kuzmina', 0, 0, 181, 'Mitarbeiter'),
(177, '6556', 318150117, 'Alla', 'Netsiuk', 0, 1, 147, 'Mitarbeiter'),
(178, '6539', 318149878, 'Mansour', 'Ahmadi', 0, 1, 5, 'Mitarbeiter'),
(179, '06552', 318149581, 'Lena', 'Sturm', 0, 0, 29, 'Mitarbeiter'),
(180, '06549', 318150164, 'Asiha', 'Alrehaifa', 0, 1, 139, 'Mitarbeiter'),
(181, '6495', 323596869, 'Albina', 'Fakhantidis', 0, 1, 212, 'Teamleiter'),
(182, 'p9', 504172537, 'Praktikant ', 'Ingram ', 0, 0, 42, 'Mitarbeiter'),
(183, '2013', 313945493, 'Sven', 'Peter', 0, 0, 24, 'Mitarbeiter'),
(184, '1160', 504166172, 'Helge', 'Petersen', 0, 0, 14, 'Admin'),
(185, '1995', 318149840, 'Mohamed', 'Ibrahim', 0, 0, 19, 'Mitarbeiter'),
(186, '6271', 323601144, 'Lliuta', 'Nedelcu', 0, 0, 71, 'Mitarbeiter'),
(187, '6272', 323595790, 'Antonia', 'Sandu', 0, 0, 80, 'Mitarbeiter'),
(189, '340', 318154368, 'Stephan ', 'Weide', 0, 0, 7, 'Teamleiter'),
(190, '1847', 304431525, 'Said', 'Samir', 0, 0, 68, 'Mitarbeiter'),
(191, '1923', 309112096, 'Jeremy', 'Eckel', 0, 0, 14, 'Mitarbeiter'),
(192, '1872', 305031067, 'Hussain', 'Muhi Alddin', 0, 0, 11, 'Mitarbeiter'),
(193, '1974', 316044314, 'Hosam', 'AlMoheb', 0, 0, 22, 'Mitarbeiter'),
(194, '2082', 324296490, 'Salim', 'Abdullah Almohamad', 0, 0, 126, 'Mitarbeiter'),
(195, '6562', 324289880, 'Mohammadi', 'Alireza', 0, 0, 156, 'Mitarbeiter'),
(196, '6563', 324297485, 'Hamed', 'Moradi', 0, 0, 79, 'Mitarbeiter'),
(197, '6564', 324293593, 'Juan Carlos', 'Puccini', 0, 0, 139, 'Mitarbeiter'),
(198, '6565', 324299265, 'Yevhen ', 'Kovalov', 0, 0, 165, 'Mitarbeiter'),
(199, '2066', 323593864, 'Michael', 'Hartenberger', 0, 0, 40, 'Mitarbeiter'),
(200, '1969', 316042713, 'Christian ', 'Schellmann', 0, 0, 29, 'Teamleiter'),
(201, '2058', 318148816, 'Mario', 'Bruhn', 0, 0, 134, 'Mitarbeiter'),
(202, '583', 504116806, 'Maik', 'Strodtmann', 0, 0, 0, 'Mitarbeiter'),
(203, '6566', 324297520, 'Christian', 'Pischke', 0, 0, 93, 'Mitarbeiter'),
(204, '1918', 309112942, 'Karina', 'Zakusilov', 0, 1, 58, 'Mitarbeiter'),
(205, '1998', 318149891, 'Mustafa', 'Alani', 0, 0, 12, 'Mitarbeiter'),
(207, '2089', 323593119, 'Farah', 'Noury', 0, 0, 150, 'Mitarbeiter'),
(208, '6568', 323591592, 'Kevin', 'Rasch', 0, 0, 134, 'Mitarbeiter'),
(209, '6569', 323594916, 'Alice', 'Got', 0, 1, 107, 'Mitarbeiter'),
(210, '2009', 313945414, 'Aris', 'Pawslowski', 0, 0, 52, 'Mitarbeiter'),
(211, '2010', 313948470, 'Lucas', 'Dethlefs', 0, 0, 23, 'Mitarbeiter'),
(212, '1917', 308935828, 'Alina', 'Taton', 0, 0, 24, 'Mitarbeiter'),
(214, '2093', 323599616, 'Aurelia', 'Morari', 0, 0, 105, 'Mitarbeiter'),
(215, '2092', 323593065, 'Anatoliy', 'Ladey', 0, 0, 109, 'Mitarbeiter'),
(216, '2091', 323601765, 'Tamara', 'Roscovan ', 0, 0, 92, 'Mitarbeiter'),
(217, '2094', 323597780, 'Catalina', 'Demcenco', 0, 0, 88, 'Mitarbeiter'),
(218, '2097', 323598825, 'Timothy', 'Eckel', 0, 1, 72, 'Mitarbeiter'),
(219, '2098', 323593069, 'Dorota', 'Kozak', 0, 0, 107, 'Mitarbeiter'),
(220, '2095', 323598840, 'Marvin', 'Kaiser', 0, 1, 28, 'Mitarbeiter'),
(221, '6570', 323598814, 'Italia', 'Raid', 0, 1, 96, 'Mitarbeiter'),
(222, '1576', 299370208, 'Ann-Christin', 'Still', 0, 0, 2, 'Mitarbeiter'),
(223, '6571', 323600543, 'Choi', 'Junghwan', 0, 1, 59, 'Mitarbeiter'),
(224, '2101', 323601737, 'Luca', 'Schröder', 0, 0, 12, 'Mitarbeiter'),
(225, '00533', 504115986, 'Andre', 'Melsbach', 0, 1, 2, 'Teamleiter'),
(226, '0397', 504116162, 'Martin', 'Rieck', 0, 0, 5, 'Teamleiter'),
(227, '1118', 280067280, 'Svenja', 'Schmitt', 0, 0, 1, 'Mitarbeiter'),
(228, '2104', 323600546, 'Ana', 'Cucos', 0, 0, 34, 'Mitarbeiter'),
(229, '2102', 324298361, 'Karina', 'Annaeva', 0, 1, 43, 'Mitarbeiter'),
(230, '6597', 324296470, 'Karimishad', 'Fereshteh', 0, 0, 13, 'Mitarbeiter'),
(231, '6606', 323599684, 'Odin', 'Jessen', 0, 1, 7, 'Mitarbeiter'),
(232, '6607', 323241969, 'Fahad', 'Abbas', 0, 1, 7, 'Mitarbeiter'),
(233, '6608', 323240950, 'Adina', 'Verbitchi', 0, 1, 9, 'Mitarbeiter'),
(234, '2105', 323242316, 'Mariana', 'Tataru', 0, 0, 0, 'Mitarbeiter'),
(238, '2112', 323239155, 'Yannic', 'Konczak', 0, 0, 0, 'Mitarbeiter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Settings`
--

CREATE TABLE `Settings` (
  `ID` int(11) NOT NULL,
  `Lock_percent` int(11) NOT NULL,
  `Hupe` tinyint(1) NOT NULL,
  `excelLogs` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Settings`
--

INSERT INTO `Settings` (`ID`, `Lock_percent`, `Hupe`, `excelLogs`) VALUES
(1, 5, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Website`
--

CREATE TABLE `Website` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Permission` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Website`
--

INSERT INTO `Website` (`ID`, `Name`, `Lastname`, `Username`, `Password`, `Permission`) VALUES
(7, 'Anil', 'Chikmet Oglou', 'anil', '$2y$10$sigTsFz0K5nUrJ7Qd46hWO57/jt6pre37ScjTWD.x4PL0ERQdr/EC', 'Super User'),
(9, 'Florian', 'Frahm', 'FF1298', '$2y$10$VgpHf0CwmQBSgFQ9IW1xLu5GYfQI8t8JR2BBRfCy122L5l2MmHIA6', 'Super User'),
(10, 'Markus', 'Wagner', 'mw818', '$2y$10$.uxD5g/jjz35d06lTqNVzO6toPClu3sir9m7NCSZ9.8kfkamfSN/e', 'Admin'),
(13, 'Nick', 'Harring', 'nh2016', '$2y$10$xoJ8B2hinR3ZjXfQdjWQ/OmralyxFoBrV5EjpvyiTUne91C3.eV5e', 'Admin'),
(14, 'Silke', 'Conow', 'sc730', '$2y$10$7dXgfBY1JYpI2SjArzxkLuSBi0wTHFdPjTGLvnQkeypUWq/2lf2ye', 'Admin'),
(15, 'Lara', 'Fuehrmann', 'lf1822', '$2y$10$rFRRKu3Z9nDI1NKAmoNNh..O5h0I6J9LRWjZttC8DzNf3oWtNFkVG', 'Admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Access`
--
ALTER TABLE `Access`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Card_ID` (`Card_ID`);

--
-- Indizes für die Tabelle `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `Website`
--
ALTER TABLE `Website`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Access`
--
ALTER TABLE `Access`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT für Tabelle `Settings`
--
ALTER TABLE `Settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Website`
--
ALTER TABLE `Website`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
