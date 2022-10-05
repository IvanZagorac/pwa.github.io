-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 02:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
('Ivan', 'Zagorac', 'ivan.zagorac', '$2y$10$XGv0mmGRn3yb3SzyETcZz.XC2Yq1EWlkh7CmdRP2W4WWIMj.Ps2ZW', 0),
('Ivan', 'Zagorac', 'top123', '$2y$10$XrIkBMk4iNvy73BIGoMFDec.k.OXcFyyzoXB7nsKWxXUjmbMdyO/e', 0),
('gr', 'grg', 'gr', '$2y$10$QIn1e1GDBQEEyOJ4DAxyl.n6vI6tDHCRS4nP79m0RV66/rij/oUri', 0),
('gr', 'gr', 'g', '$2y$10$xowkgp0B2smCNYKOR0aj0.Y4c1VhTT884oynDAjun0IxSvju20Spy', 1),
('ivek', 'mandalinic', 'ivek1', '$2y$10$4jw/EGsNAb5I509om2yqTuFMLakbZIIYCgGiq5uH6l1iez1JNsjTe', 0),
('ivica', 'bozic', 'ivek2', '$2y$10$RG1cgxc7MJgvatEB2gk.w.r8Ceu1BRkwRtWqsxJviQQUuMnWanCxC', 0),
('marko', 'rozic', 'mrlic', '$2y$10$1kpTDS5.kW5A2Cy7T9MWpOPCGEWJ6mlOJa6ZLTPCvjdZflIbfxv5i', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE `vijest` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '22.5.2022', 'Modrićevo objašnjenje', '', 'Kapetan hrvatske nogometne reprezentacije Luka Modrić se priprema za novo veliko finale Lige prvaka u kojem s Real Madridom igra protiv Liverpoola. ', 'modric.jpg', 'sport', 0),
(2, '27.5.2022', 'Rebićeva budučnost', 'MILAN KREĆE U REKONSTRUKCIJU EKIPE, A TALIJANI TVRDE KAKO BI ANTE REBIĆ MOGAO BITI NEUGODNO IZNENAĐEN', 'Talijanski Milan je postao prvak Serie A nakon dugih 11 godina čekanja. Naslov prvaka je proslavljen i sada se u klubu okreću novoj sezoni. Zlatan Ibrahimović, koji je podigao ekipu, morao je na operaciju koljena i neće ga biti više od pola godine, a Milan svakako želi pojačati napadačku liniju.', 'rebic.jpg', 'sport', 0),
(3, '27.5.2022', 'Melnjakov show', 'NEKADA SAM OVDJE IGRAO SA ZELINOM U KUPU, NISAM NI SANJAO DA ĆU HAJDUKU S DVA GOLA DONIJETI JEDNOM TAJ TROFEJ', 'Dvostruki strijelac za Hajduk u finalu Kupa bio je neočekivani junak Dario Melnjak. Da je napadač dva gola u finalu bila bi mnogo, a kamoli kao nominalno bek. Pet je golova ukupno zabio Melnjak ove sezone, od toga četiri u kupu – po dva u polufinalu Gorici i finalu Rijeci! Pola Kupa donio je Hajduku Melnjak.', 'meljnjak.jpg', 'sport', 0),
(4, '26.5.2022', 'Recepti', '10 brzih recepata koje možete pripremiti za nenadane goste', 'Ovi recepti idealni su za pripremu na brzinu, a ujedno su i jako ukusni. Neki od njih su super i za goste koji su vegetarijanci, a ima i verzija za one koji ne mogu bez mesa', 'recepti.jpg', 'Hrana', 0),
(5, '21.5.2022', 'Kada jesti', 'Evo kada jesti prije treninga za postizanje najboljih rezultata', 'Nekoliko faktora trebate uzeti u obzir kada su u pitanju jelo i piće prije tjelesne aktivnosti, s tim da jedan nikako ne smijete ignorirati jer on igra kritičnu ulogu u održavanju vašeg tijela energičnim za treninge', 'kadajesti.jpg', 'Hrana', 0),
(6, '19.4.2022', 'Trajanje hrane', 'Proizvodi koji mogu trajati duže od roka: Bijela riža, sol, pasta...', 'Oznake roka valjanosti određenog proizvoda za pojedince su samo smjernice, a za druge datumi s kojima će ih, ako ih nisu ni otvorili do tada, svejedno baciti u smeće', 'trajanje.jpg', 'Hrana', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vijest`
--
ALTER TABLE `vijest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vijest`
--
ALTER TABLE `vijest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
