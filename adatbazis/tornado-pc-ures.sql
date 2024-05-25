-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 15. 11:34
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tornado-pc`
--
CREATE DATABASE IF NOT EXISTS `tornado-pc` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `tornado-pc`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `akciok`
--

CREATE TABLE `akciok` (
  `id` int(11) NOT NULL,
  `megnevezes` text NOT NULL,
  `szazalek` int(11) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `aktiv` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arkategoriak`
--

CREATE TABLE `arkategoriak` (
  `id` int(11) NOT NULL,
  `megnevezes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `arkategoriak`
--

INSERT INTO `arkategoriak` (`id`, `megnevezes`) VALUES
(1, 'alacsony'),
(2, 'közepes'),
(3, 'magas'),
(4, 'nagyon magas');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles`
--

CREATE TABLE `ertekeles` (
  `id` int(11) NOT NULL,
  `konfig_id` int(11) NOT NULL,
  `felh_id` int(11) NOT NULL,
  `ertekeles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` text NOT NULL,
  `email` text NOT NULL,
  `jelszo` char(255) NOT NULL,
  `teljes_nev` text NOT NULL,
  `telefonszam` text NOT NULL,
  `szallitasi_cim` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `jelszo`, `teljes_nev`, `telefonszam`, `szallitasi_cim`, `admin`) VALUES
(1, 'admin', 'admin@gmail.com', '0befd4d807762b96c55453edd686a53583f70886', '', '', '', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fizetes_modok`
--

CREATE TABLE `fizetes_modok` (
  `id` int(11) NOT NULL,
  `megnevezes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `fizetes_modok`
--

INSERT INTO `fizetes_modok` (`id`, `megnevezes`) VALUES
(1, 'készpénz - utánvét'),
(2, 'bankkártya - utánvét');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jellemzok`
--

CREATE TABLE `jellemzok` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `megnevezes` varchar(255) NOT NULL,
  `jellemzo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jellemzok`
--

INSERT INTO `jellemzok` (`id`, `termek_id`, `megnevezes`, `jellemzo`) VALUES
(1, 1, 'Processzor foglalat', 'Intel LGA-1700'),
(2, 1, 'Processzor órajel', '2.5 GHz'),
(3, 1, 'Maximum órajel', '5.4 GHz'),
(4, 1, 'Magok száma', '16 db'),
(5, 1, 'Szálak száma', '24 db'),
(6, 2, 'Processzor foglalat', 'AMD Socket AM4'),
(7, 2, 'Processzor órajel', '3.6 GHz'),
(8, 2, 'Maximum órajel', '4.2 GHz'),
(9, 2, 'Magok száma', '6 db'),
(10, 2, 'Szálak száma', '12 db'),
(11, 3, 'Csatolófelület', 'PCI-Express'),
(12, 3, 'Video chipset', 'AMD Radeon'),
(13, 3, 'Hűtés típusa', 'Aktív hűtés'),
(14, 3, 'Ventilátorok száma', '3 db'),
(15, 3, 'Grafikus chip sebessége', '2680 MHz'),
(21, 3, 'Grafikus memória sebessége', '20000 MHz'),
(22, 4, 'Csatolófelület', 'PCI-Express'),
(23, 4, 'Video chipset', 'Nvidia GeForce'),
(24, 4, 'Memória mérete', '12 GB'),
(25, 4, 'Hűtés típusa', 'Aktív hűtés'),
(26, 4, 'Ventilátorok száma', '3 db'),
(27, 4, 'Grafikus chip sebessége', '2760 MHz'),
(28, 4, 'Grafikus memória sebessége', '21000 MHz'),
(29, 31, 'Processzor foglalat', 'Intel LGA-1700'),
(30, 31, 'Processzor órajel', '2.5 GHz'),
(31, 31, 'Maximum órajel', '4.4 GHz'),
(32, 31, 'Magok száma', '6 db'),
(33, 31, 'Szálak száma', '12 db'),
(34, 32, 'Processzor foglalat', 'Intel LGA-1700'),
(35, 32, 'Processzor órajel', '2.4 GHz'),
(36, 32, 'Maximum órajel', '6 GHz'),
(37, 32, 'Magok száma', '24 db'),
(38, 32, 'Szálak száma', '32 db'),
(39, 33, 'Processzor foglalat', 'AMD Socket AM5'),
(40, 33, 'Processzor órajel', '4.5 GHz'),
(41, 33, 'Maximum órajel', '5.4 GHz'),
(42, 33, 'Magok száma', '8 db'),
(43, 33, 'Szálak száma', '16 db'),
(44, 34, 'Processzor foglalat', 'AMD Socket AM5'),
(45, 34, 'Processzor órajel', '4.2 GHz'),
(46, 34, 'Maximum órajel', '5.7 GHz'),
(47, 34, 'Magok száma', '16 db'),
(48, 34, 'Szálak száma', '32 db'),
(49, 44, 'Processzor', 'Apple M3 Pro'),
(50, 44, 'Memória típusa', 'DDR5'),
(51, 44, 'Memória mérete', '18 GB'),
(52, 44, 'Operációs rendszer', 'macOS'),
(53, 44, 'Kijelző mérete', '14.2\"'),
(54, 45, 'Processzor', 'AMD Ryzen 5'),
(55, 45, 'Memória típusa', 'DDR5'),
(56, 45, 'Memória mérete', '16 GB'),
(57, 45, 'Operációs rendszer', 'FreeDOS'),
(58, 45, 'Kijelző mérete', '15.6\"'),
(59, 46, 'Processzor', 'AMD Ryzen 5'),
(60, 46, 'Memória típusa', 'DDR4'),
(61, 46, 'Memória mérete', '16 GB'),
(62, 46, 'Operációs rendszer', 'Windows 11 Home'),
(63, 46, 'Kijelző mérete', '15.6\"'),
(64, 47, 'Processzor', 'Intel Core i7'),
(65, 47, 'Memória típusa', 'DDR5'),
(66, 47, 'Memória mérete', '16 GB'),
(67, 47, 'Operációs rendszer', 'Windows 11 Home'),
(68, 47, 'Kijelző mérete', '16\"'),
(69, 48, 'Kialakítás', 'Összecsukható'),
(70, 48, 'Kijelző mérete', '7.6\"'),
(71, 48, 'Processzor', 'Qualcomm Snapdragon 8 Gen 2'),
(72, 48, 'Háttértár mérete', '1000 GB'),
(73, 48, 'Memória mérete', '12 GB'),
(74, 48, 'Operációs rendszer', 'Android'),
(75, 49, 'Kijelző mérete', '6.7\"'),
(76, 49, 'Processzor', 'Apple A17 Pro'),
(77, 49, 'Háttértár mérete', '512 GB'),
(78, 49, 'Memória mérete', '8 GB'),
(79, 49, 'Operációs rendszer', 'iOS'),
(80, 50, 'Kijelző mérete', '6.78\"'),
(81, 50, 'Processzor', 'Qualcomm Snapdragon 8+ Gen 1'),
(82, 50, 'Háttértár mérete', '256 GB'),
(83, 50, 'Memória mérete', '12 GB'),
(84, 50, 'Operációs rendszer', 'Android'),
(85, 51, 'Kijelző mérete', '6.67\"'),
(86, 51, 'Processzor', 'Qualcomm Snapdragon 7s Gen 2'),
(87, 51, 'Háttértár mérete', '256 GB'),
(88, 51, 'Memória mérete', '8 GB'),
(89, 51, 'Operációs rendszer', 'Android'),
(90, 3, 'Memória mérete', '24 GB'),
(91, 67, 'Csatolófelület', 'PCI-Express'),
(92, 67, 'Video chipset', 'Nvidia GeForce'),
(93, 67, 'Memória mérete', '24 GB'),
(94, 67, 'Hűtés típusa', 'Aktív hűtés'),
(95, 67, 'Ventilátorok száma', '3 db'),
(96, 67, 'Grafikus chip sebessége', '2595 MHz'),
(97, 67, 'Grafikus memória sebessége', '21000 MHz'),
(98, 68, 'Csatolófelület', 'PCI-Express'),
(99, 68, 'Video chipset', 'Nvidia GeForce'),
(100, 68, 'Memória mérete', '16 GB'),
(101, 68, 'Hűtés típusa', 'Aktív hűtés'),
(102, 68, 'Ventilátorok száma', '3 db'),
(103, 68, 'Grafikus chip sebessége', '2670 MHz'),
(104, 68, 'Grafikus memória sebessége', '23000 MHz'),
(105, 69, 'Csatolófelület', 'PCI-Express'),
(106, 69, 'Video chipset', 'Nvidia GeForce'),
(107, 69, 'Memória mérete', '8 GB'),
(108, 69, 'Hűtés típusa', 'Aktív hűtés'),
(109, 69, 'Ventilátorok száma', '2 db'),
(110, 69, 'Grafikus chip sebessége', '2535 MHz'),
(111, 69, 'Grafikus memória sebessége', '17000 MHz'),
(112, 70, 'Csatolófelület', 'PCI-Express'),
(113, 70, 'Video chipset', 'AMD Radeon'),
(114, 70, 'Memória mérete', '16 GB'),
(115, 70, 'Hűtés típusa', 'Aktív hűtés'),
(116, 70, 'Ventilátorok száma', '3 db'),
(117, 70, 'Grafikus chip sebessége', '2565 MHz'),
(118, 70, 'Grafikus memória sebessége', '19500 MHz'),
(119, 5, 'CPU foglalat', 'Socket 1700'),
(120, 5, 'Memória típusa', 'DDR5'),
(121, 5, 'Memória foglalatok száma', '4'),
(122, 6, 'CPU foglalat', 'Socket 1700'),
(123, 6, 'Memória típusa', 'DDR5'),
(124, 6, 'Memória foglalatok száma', '4'),
(125, 71, 'CPU foglalat', 'Socket 1700'),
(126, 71, 'Memória típusa', 'DDR5'),
(127, 71, 'Memória foglalatok száma', '4'),
(128, 72, 'CPU foglalat', 'Socket 1700'),
(129, 72, 'Memória típusa', 'DDR4'),
(130, 72, 'Memória foglalatok száma', '4'),
(131, 73, 'CPU foglalat', 'Socket AM4'),
(132, 73, 'Memória típusa', 'DDR4'),
(133, 73, 'Memória foglalatok száma', '4'),
(134, 74, 'CPU foglalat', 'Socket AM5'),
(135, 74, 'Memória típusa', 'DDR5'),
(136, 74, 'Memória foglalatok száma', '4'),
(147, 7, 'Memória típusa', 'DDR4'),
(148, 7, 'Sebesség', '3200 MHz'),
(149, 8, 'Memória típusa', 'DDR4'),
(150, 8, 'Sebesség', '3600 MHz'),
(151, 76, 'Memória típusa', 'DDR5'),
(152, 76, 'Sebesség', '6000 MHz'),
(153, 77, 'Memória típusa', 'DDR5'),
(154, 77, 'Sebesség', '6000 MHz'),
(155, 78, 'Memória típusa', 'DDR5'),
(156, 78, 'Sebesség', '5600 MHz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvencek`
--

CREATE TABLE `kedvencek` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `id` int(11) NOT NULL,
  `hova` int(1) NOT NULL,
  `megjelenitett_id` int(11) NOT NULL,
  `utvonal` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kepek`
--

INSERT INTO `kepek` (`id`, `hova`, `megjelenitett_id`, `utvonal`) VALUES
(1, 1, 1, 'kepek\\kategoriak\\processzor.jpg'),
(2, 1, 2, 'kepek\\kategoriak\\videokartya.jpg'),
(3, 1, 3, 'kepek\\kategoriak\\alaplap.jpg'),
(4, 1, 4, 'kepek\\kategoriak\\memoria.jpg'),
(5, 1, 5, 'kepek\\kategoriak\\merevlemez.jpg'),
(6, 1, 6, 'kepek\\kategoriak\\ssd.jpg'),
(7, 1, 7, 'kepek\\kategoriak\\tapegyseg.jpg'),
(8, 1, 8, 'kepek\\kategoriak\\proc_huto.jpg'),
(9, 1, 9, 'kepek\\kategoriak\\szamitogephaz.jpg'),
(10, 1, 10, 'kepek\\kategoriak\\monitor.jpg'),
(11, 1, 11, 'kepek\\kategoriak\\eger.jpg'),
(12, 1, 12, 'kepek\\kategoriak\\billentyuzet.jpg'),
(13, 1, 13, 'kepek\\kategoriak\\fejhallgato.jpg'),
(14, 1, 14, 'kepek\\kategoriak\\konzol.jpg'),
(15, 1, 15, 'kepek\\kategoriak\\nyomtato.jpg'),
(16, 1, 16, 'kepek\\kategoriak\\dron.jpg'),
(17, 1, 17, 'kepek\\kategoriak\\laptop.jpg'),
(18, 1, 18, 'kepek\\kategoriak\\tablet.jpg'),
(19, 1, 19, 'kepek\\kategoriak\\mobiltelefon.jpg'),
(20, 1, 20, 'kepek\\kategoriak\\VR_eszkoz.jpg'),
(21, 1, 21, 'kepek\\kategoriak\\fenykepezogep.jpg'),
(23, 2, 1, 'kepek\\termekek\\1.jpg'),
(24, 2, 2, 'kepek\\termekek\\2.jpg'),
(25, 2, 3, 'kepek\\termekek\\3.jpg'),
(26, 2, 4, 'kepek\\termekek\\4.jpg'),
(27, 2, 5, 'kepek\\termekek\\5.jpg'),
(28, 2, 6, 'kepek\\termekek\\6.jpg'),
(29, 2, 7, 'kepek\\termekek\\7.jpg'),
(30, 2, 8, 'kepek\\termekek\\8.jpg'),
(31, 2, 9, 'kepek\\termekek\\9.jpg'),
(32, 2, 10, 'kepek\\termekek\\10.jpg'),
(33, 2, 11, 'kepek\\termekek\\11.jpg'),
(34, 2, 12, 'kepek\\termekek\\12.jpg'),
(35, 2, 13, 'kepek\\termekek\\13.jpg'),
(36, 2, 14, 'kepek\\termekek\\14.jpg'),
(37, 2, 15, 'kepek\\termekek\\15.jpg'),
(38, 2, 16, 'kepek\\termekek\\16.jpg'),
(39, 2, 17, 'kepek\\termekek\\17.jpg'),
(40, 2, 18, 'kepek\\termekek\\18.jpg'),
(41, 2, 19, 'kepek\\termekek\\19.jpg'),
(42, 2, 20, 'kepek\\termekek\\20.jpg'),
(43, 2, 21, 'kepek\\termekek\\21.jpg'),
(44, 2, 22, 'kepek\\termekek\\22.jpg'),
(45, 2, 23, 'kepek\\termekek\\23.jpg'),
(46, 2, 24, 'kepek\\termekek\\24.jpg'),
(47, 2, 25, 'kepek\\termekek\\25.jpg'),
(48, 2, 26, 'kepek\\termekek\\26.jpg'),
(49, 2, 27, 'kepek\\termekek\\27.jpg'),
(50, 2, 28, 'kepek\\termekek\\28.jpg'),
(51, 2, 29, 'kepek\\termekek\\29.jpg'),
(52, 2, 30, 'kepek\\termekek\\30.jpg'),
(53, 2, 35, 'kepek\\termekek\\35.jpg'),
(54, 2, 36, 'kepek\\termekek\\36.jpg'),
(55, 2, 37, 'kepek\\termekek\\37.jpg'),
(56, 2, 38, 'kepek\\termekek\\38.jpg'),
(57, 2, 39, 'kepek\\termekek\\39.jpg'),
(58, 2, 40, 'kepek\\termekek\\40.jpg'),
(59, 2, 41, 'kepek\\termekek\\41.jpg'),
(60, 2, 42, 'kepek\\termekek\\42.jpg'),
(61, 2, 43, 'kepek\\termekek\\43.jpg'),
(62, 2, 31, 'kepek\\termekek\\31.jpg'),
(63, 2, 32, 'kepek\\termekek\\32.jpg'),
(64, 2, 33, 'kepek\\termekek\\33.jpg'),
(65, 2, 34, 'kepek\\termekek\\34.jpg'),
(66, 2, 44, 'kepek\\termekek\\44.jpg'),
(67, 2, 45, 'kepek\\termekek\\45.jpg'),
(68, 2, 46, 'kepek\\termekek\\46.jpg'),
(69, 2, 47, 'kepek\\termekek\\47.jpg'),
(70, 2, 48, 'kepek\\termekek\\48.jpg'),
(71, 2, 49, 'kepek\\termekek\\49.jpg'),
(72, 2, 50, 'kepek\\termekek\\50.jpg'),
(73, 2, 51, 'kepek\\termekek\\51.jpg'),
(74, 2, 52, 'kepek\\termekek\\52.jpg'),
(75, 2, 53, 'kepek\\termekek\\53.jpg'),
(76, 2, 54, 'kepek\\termekek\\54.jpg'),
(77, 2, 55, 'kepek\\termekek\\55.jpg'),
(78, 2, 56, 'kepek\\termekek\\56.jpg'),
(79, 2, 57, 'kepek\\termekek\\57.jpg'),
(80, 2, 58, 'kepek\\termekek\\58.jpg'),
(81, 2, 59, 'kepek\\termekek\\59.jpg'),
(82, 2, 60, 'kepek\\termekek\\60.jpg'),
(83, 2, 61, 'kepek\\termekek\\61.jpg'),
(84, 2, 62, 'kepek\\termekek\\62.jpg'),
(85, 2, 63, 'kepek\\termekek\\63.jpg'),
(86, 2, 64, 'kepek\\termekek\\64.jpg'),
(87, 2, 65, 'kepek\\termekek\\65.jpg'),
(88, 2, 66, 'kepek\\termekek\\66.jpg'),
(89, 2, 67, 'kepek\\termekek\\67.jpg'),
(90, 2, 68, 'kepek\\termekek\\68.jpg'),
(91, 2, 69, 'kepek\\termekek\\69.jpg'),
(92, 2, 70, 'kepek\\termekek\\70.jpg'),
(93, 2, 71, 'kepek\\termekek\\71.jpg'),
(94, 2, 72, 'kepek\\termekek\\72.jpg'),
(95, 2, 73, 'kepek\\termekek\\73.jpg'),
(96, 2, 74, 'kepek\\termekek\\74.jpg'),
(97, 2, 76, 'kepek\\termekek\\76.jpg'),
(98, 2, 77, 'kepek\\termekek\\77.jpg'),
(99, 2, 78, 'kepek\\termekek\\78.jpg'),
(100, 2, 79, 'kepek\\termekek\\79.jpg'),
(101, 2, 80, 'kepek\\termekek\\80.jpg'),
(102, 2, 81, 'kepek\\termekek\\81.jpg'),
(103, 2, 82, 'kepek\\termekek\\82.jpg'),
(104, 2, 83, 'kepek\\termekek\\83.jpg'),
(105, 2, 84, 'kepek\\termekek\\84.jpg'),
(106, 2, 85, 'kepek\\termekek\\85.jpg'),
(107, 2, 86, 'kepek\\termekek\\86.jpg'),
(108, 2, 87, 'kepek\\termekek\\87.jpg'),
(109, 2, 88, 'kepek\\termekek\\88.jpg'),
(110, 2, 89, 'kepek\\termekek\\89.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konfig`
--

CREATE TABLE `konfig` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `konf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konfig_id`
--

CREATE TABLE `konfig_id` (
  `id` int(11) NOT NULL,
  `felh_id` int(11) NOT NULL,
  `konfig` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `allapot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `markak`
--

CREATE TABLE `markak` (
  `id` int(11) NOT NULL,
  `megnevezes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `markak`
--

INSERT INTO `markak` (`id`, `megnevezes`) VALUES
(1, 'Intel'),
(2, 'AMD'),
(3, 'Asus'),
(4, 'LG'),
(5, 'GIGABYTE'),
(6, 'KINGSTON'),
(7, 'Western Digital'),
(8, 'Seagate'),
(9, 'Samsung'),
(10, 'Crucial'),
(11, 'Corsair'),
(12, 'EVGA'),
(13, 'Cooler Master'),
(14, 'Noctua'),
(15, 'NZXT'),
(16, 'Fractal Design'),
(17, 'Logitech'),
(18, 'Razer'),
(19, 'HyperX'),
(20, 'Sony'),
(21, 'Microsoft'),
(22, 'Epson'),
(23, 'HP'),
(24, 'Dell'),
(25, 'Apple'),
(26, 'Nintendo'),
(27, 'Ocolus'),
(28, 'Valve Corp.'),
(29, 'DJI'),
(30, 'Parrot'),
(31, 'Canon'),
(32, 'Olympus'),
(33, 'Nikon'),
(34, 'Panasonic'),
(35, 'Lenovo'),
(36, 'Xiaomi'),
(37, 'Honor'),
(38, 'Xerox'),
(39, 'HTC'),
(40, 'Hama'),
(41, 'Sennheiser'),
(42, 'Acer'),
(43, 'ARCTIC');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `vegosszeg` int(11) NOT NULL,
  `fiz_mod_id` int(11) NOT NULL,
  `leadas_datuma` datetime NOT NULL,
  `allapot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `marka_id` int(11) NOT NULL,
  `megn` text NOT NULL,
  `ar` int(11) NOT NULL,
  `ar_kat_id` int(11) NOT NULL,
  `megjelenes_ev` int(11) NOT NULL,
  `raktaron` tinyint(1) NOT NULL,
  `leiras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `kategoria_id`, `marka_id`, `megn`, `ar`, `ar_kat_id`, `megjelenes_ev`, `raktaron`, `leiras`) VALUES
(1, 1, 1, 'Core i7-13700KF', 178190, 3, 2022, 0, ''),
(2, 1, 2, 'Ryzen 5 5500', 39489, 2, 2023, 0, ''),
(3, 2, 2, 'Radeon RX 7900 XTX', 414865, 4, 2022, 0, ''),
(4, 2, 3, 'GeForce RTX 4070 Ti', 346199, 4, 2023, 0, ''),
(5, 3, 3, 'ROG MAXIMUS Z790 HERO', 273390, 3, 2022, 0, ''),
(6, 3, 5, 'Z790 AORUS Elite AX', 110291, 3, 2022, 0, ''),
(7, 4, 6, 'FURY Beast DIMM 2x32GB', 57090, 2, 2021, 0, ''),
(8, 4, 6, 'FURY Renegade RGB DIMM 2x8GB', 27189, 3, 2021, 0, ''),
(9, 5, 7, 'WD Blue 1TB WD10EZRZ', 19290, 2, 2022, 0, ''),
(10, 5, 8, 'Exos X20 20TB', 124729, 3, 2021, 0, ''),
(11, 6, 9, '970 EVO Plus 500GB', 31490, 2, 2019, 0, ''),
(12, 6, 10, 'MX500 500GB', 21990, 2, 2017, 0, ''),
(13, 7, 11, 'RM750x', 58790, 2, 2021, 0, ''),
(14, 7, 12, 'SuperNOVA 650 G5', 55289, 2, 2019, 0, ''),
(15, 8, 14, 'NH-D15', 45410, 2, 2014, 0, ''),
(16, 8, 13, 'Hyper 212 RGB ', 9790, 1, 2018, 0, ''),
(17, 9, 15, 'H510', 39990, 2, 2019, 0, ''),
(18, 9, 16, 'Design Meshify C', 46290, 2, 2017, 0, ''),
(19, 10, 9, 'Odyssey G7', 174900, 2, 2020, 0, ''),
(20, 10, 4, '32GQ950P-B 32 4K UHD', 393393, 2, 2022, 0, ''),
(21, 11, 17, 'G Pro X Superlight', 39990, 3, 2020, 0, ''),
(22, 11, 18, 'DeathAdder Elite', 19890, 2, 2016, 0, ''),
(23, 12, 11, 'K95 Platinum XT', 87000, 4, 2020, 0, ''),
(24, 12, 17, 'G Pro X mechanical keyboard', 47799, 2, 2019, 0, ''),
(25, 13, 19, 'Cloud II', 45790, 2, 2015, 0, ''),
(26, 13, 17, 'G Pro X Gaming Headset', 36890, 2, 2019, 0, ''),
(27, 14, 20, 'PlayStation 5', 174790, 2, 2020, 0, ''),
(28, 14, 21, 'Xbox Series X', 169990, 2, 2020, 0, ''),
(29, 15, 22, 'EcoTank ET-4750 multifunctional', 279990, 3, 2017, 0, ''),
(30, 15, 23, 'LaserJet Pro M404dn', 136000, 2, 2019, 0, ''),
(31, 1, 1, 'Core i5-12400F', 55890, 1, 2019, 0, ''),
(32, 1, 1, 'Core i9-14900K', 250190, 4, 2023, 0, ''),
(33, 1, 2, 'Ryzen 7 7700X', 131290, 2, 2022, 0, ''),
(34, 1, 2, 'Ryzen 9 7950X3D', 263790, 3, 2022, 0, ''),
(35, 16, 29, 'Mini 2 SE', 125040, 2, 2023, 0, ''),
(36, 16, 29, 'Mavic 3 Pro RC', 809000, 3, 2023, 0, ''),
(37, 16, 29, 'Inspire 3', 6039490, 4, 2023, 0, ''),
(38, 16, 30, 'ANAFI 4K', 298990, 2, 2020, 0, ''),
(39, 21, 31, 'EOS R6 Mark II', 999990, 3, 2022, 0, ''),
(40, 21, 20, 'Alpha 6400 Body', 919890, 2, 2019, 0, ''),
(41, 21, 32, 'OM-1 II Body', 959990, 3, 2024, 0, ''),
(42, 21, 33, 'Z8', 1499900, 4, 2023, 0, ''),
(43, 21, 34, 'Lumix S5 II X 24-105mm f/4 macro O.I.S', 1299690, 4, 2024, 0, ''),
(44, 17, 25, 'MacBook Pro 14 M3 Pro', 1020500, 4, 2023, 0, ''),
(45, 17, 3, 'TUF Gaming A15', 369900, 2, 2023, 0, ''),
(46, 17, 35, 'IdeaPad Gaming 3', 229000, 1, 2022, 0, ''),
(47, 17, 35, 'Legion Pro 5', 717490, 3, 2021, 0, ''),
(48, 19, 9, 'Galaxy Z Fold5', 799990, 4, 2023, 0, ''),
(49, 19, 25, 'iPhone 15 Pro Max', 583790, 4, 2023, 0, ''),
(50, 19, 3, 'ROG Phone 6', 357990, 3, 2022, 0, ''),
(51, 19, 36, 'Redmi Note 13 Pro', 114890, 2, 2021, 0, ''),
(52, 18, 25, 'iPad 10.9 2022', 153300, 2, 2022, 0, ''),
(53, 18, 25, 'iPad Pro 11 2024', 499990, 3, 2024, 0, ''),
(54, 18, 9, 'Galaxy Tab S9', 157790, 2, 2023, 0, ''),
(55, 18, 37, 'Pad X8', 59490, 1, 2022, 0, ''),
(56, 15, 38, 'Phaser 3020V_BI', 38490, 1, 2022, 0, ''),
(57, 20, 20, 'PlayStation VR2', 238790, 2, 2023, 0, ''),
(58, 20, 39, 'VIVE Pro 2 Full Kit', 549990, 3, 2021, 0, ''),
(59, 12, 40, 'uRage Exodus 700S', 7990, 1, 2022, 0, ''),
(60, 12, 13, 'CK352 ', 21490, 1, 2021, 0, ''),
(61, 11, 18, 'Basilisk V3 Pro', 79590, 2, 2023, 0, ''),
(62, 11, 17, 'G502 X Lightspeed White', 50990, 2, 2021, 0, ''),
(63, 13, 41, 'HD-650', 115990, 3, 2021, 0, ''),
(64, 13, 18, 'Blackshark V2 X', 26990, 2, 2020, 0, ''),
(65, 10, 42, 'EK221QE3bi', 29990, 1, 2023, 0, ''),
(66, 10, 24, 'S2722QC', 131290, 2, 2021, 0, ''),
(67, 2, 3, 'GeForce RTX 4090 TUF GAMING', 922990, 4, 2022, 0, ''),
(68, 2, 3, 'ROG Strix GeForce RTX 4080 SUPER', 755900, 3, 2022, 0, ''),
(69, 2, 3, 'GeForce RTX 4060 Dual', 142990, 1, 2023, 0, ''),
(70, 2, 5, 'Radeon RX 7800 XT', 233990, 2, 2023, 0, ''),
(71, 3, 3, 'Rog Strix B760-F', 88990, 2, 2022, 0, ''),
(72, 3, 3, 'PRIME Z690-P D4-CSM', 72990, 2, 2021, 0, ''),
(73, 3, 3, 'TUF GAMING A520M-PLUS II', 29390, 1, 2021, 0, ''),
(74, 3, 5, 'B650 EAGLE AX', 72490, 2, 2023, 0, ''),
(75, 9, 15, 'H5 Flow', 40390, 3, 2021, 0, ''),
(76, 4, 6, 'FURY Beast 2x16GB', 59990, 2, 2023, 0, ''),
(77, 4, 11, 'VENGEANCE 2x16GB', 53790, 2, 2022, 0, ''),
(78, 4, 6, 'FURY Beast 8GB', 15990, 2, 2023, 0, ''),
(79, 8, 43, 'Liquid Freezer II', 29990, 2, 2024, 0, ''),
(80, 5, 8, 'BarraCuda 3.5 2TB', 23990, 2, 2023, 0, ''),
(81, 6, 9, '2.5 870 EVO 1TB', 38990, 2, 2021, 0, ''),
(82, 7, 11, 'AX1600i 1600W Titanium', 220790, 3, 2023, 0, ''),
(83, 13, 25, 'AirPods Max', 190990, 3, 2023, 0, ''),
(84, 12, 17, '915 TKL GL Tactile', 83790, 3, 2022, 0, ''),
(85, 12, 25, 'Magic Keyboard', 65990, 3, 2020, 0, ''),
(86, 11, 17, 'MX Master 3S', 38380, 2, 2023, 0, ''),
(87, 11, 3, 'Rog Keris Aimpoint', 29290, 2, 2022, 0, ''),
(88, 11, 11, 'Sabre Pro', 27590, 2, 2022, 0, ''),
(89, 10, 9, 'Odyssey Neo G9 S57CG952NU', 823990, 4, 2023, 0, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek_akciok`
--

CREATE TABLE `termekek_akciok` (
  `termek_id` int(11) NOT NULL,
  `akcio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek_kategoriak`
--

CREATE TABLE `termek_kategoriak` (
  `id` int(11) NOT NULL,
  `megnevezes` text NOT NULL,
  `kat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termek_kategoriak`
--

INSERT INTO `termek_kategoriak` (`id`, `megnevezes`, `kat_id`) VALUES
(1, 'Processzor', 1),
(2, 'Videókártya', 1),
(3, 'Alaplap', 1),
(4, 'Memória', 1),
(5, 'Merevlemez', 1),
(6, 'SSD', 1),
(7, 'Tápegység', 1),
(8, 'Processzor hűtő', 1),
(9, 'Számítógépház', 1),
(10, 'Monitor', 2),
(11, 'Egér', 2),
(12, 'Billentyűzet', 2),
(13, 'Fejhallgató', 2),
(14, 'Konzol', 3),
(15, 'Nyomtató', 3),
(16, 'Drón', 3),
(17, 'Laptop', 3),
(18, 'Tablet', 3),
(19, 'Mobiltelefon', 3),
(20, 'VR eszköz', 3),
(21, 'Fényképezőgép', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetelek`
--

CREATE TABLE `tetelek` (
  `id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `kosar_id` int(11) NOT NULL,
  `rendeles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `akciok`
--
ALTER TABLE `akciok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `arkategoriak`
--
ALTER TABLE `arkategoriak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ertekeles`
--
ALTER TABLE `ertekeles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `fizetes_modok`
--
ALTER TABLE `fizetes_modok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `jellemzok`
--
ALTER TABLE `jellemzok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`);

--
-- A tábla indexei `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `fh_id` (`fh_id`);

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `konfig`
--
ALTER TABLE `konfig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`,`konf_id`),
  ADD KEY `konf_id` (`konf_id`);

--
-- A tábla indexei `konfig_id`
--
ALTER TABLE `konfig_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felh_id` (`felh_id`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `fh_id` (`fh_id`);

--
-- A tábla indexei `markak`
--
ALTER TABLE `markak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiz_mod_id` (`fiz_mod_id`),
  ADD KEY `fh_id` (`fh_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `marka_id` (`marka_id`),
  ADD KEY `ar_kat_id` (`ar_kat_id`);

--
-- A tábla indexei `termekek_akciok`
--
ALTER TABLE `termekek_akciok`
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `akcio_id` (`akcio_id`);

--
-- A tábla indexei `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tetelek`
--
ALTER TABLE `tetelek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kosar_id` (`kosar_id`),
  ADD KEY `rendeles_id` (`rendeles_id`),
  ADD KEY `fh_id` (`fh_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `akciok`
--
ALTER TABLE `akciok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `arkategoriak`
--
ALTER TABLE `arkategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `ertekeles`
--
ALTER TABLE `ertekeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `fizetes_modok`
--
ALTER TABLE `fizetes_modok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `jellemzok`
--
ALTER TABLE `jellemzok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT a táblához `konfig`
--
ALTER TABLE `konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `konfig_id`
--
ALTER TABLE `konfig_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `markak`
--
ALTER TABLE `markak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT a táblához `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `tetelek`
--
ALTER TABLE `tetelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jellemzok`
--
ALTER TABLE `jellemzok`
  ADD CONSTRAINT `jellemzok_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`);

--
-- Megkötések a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD CONSTRAINT `kedvencek_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `kedvencek_ibfk_2` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `konfig`
--
ALTER TABLE `konfig`
  ADD CONSTRAINT `konfig_ibfk_1` FOREIGN KEY (`konf_id`) REFERENCES `konfig_id` (`id`);

--
-- Megkötések a táblához `konfig_id`
--
ALTER TABLE `konfig_id`
  ADD CONSTRAINT `konfig_id_ibfk_1` FOREIGN KEY (`felh_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `kosar_ibfk_3` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `kosar_ibfk_4` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_ibfk_3` FOREIGN KEY (`fiz_mod_id`) REFERENCES `fizetes_modok` (`id`),
  ADD CONSTRAINT `rendeles_ibfk_4` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `termekek_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `markak` (`id`),
  ADD CONSTRAINT `termekek_ibfk_3` FOREIGN KEY (`kategoria_id`) REFERENCES `termek_kategoriak` (`id`),
  ADD CONSTRAINT `termekek_ibfk_4` FOREIGN KEY (`ar_kat_id`) REFERENCES `arkategoriak` (`id`);

--
-- Megkötések a táblához `termekek_akciok`
--
ALTER TABLE `termekek_akciok`
  ADD CONSTRAINT `termekek_akciok_ibfk_2` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `termekek_akciok_ibfk_3` FOREIGN KEY (`akcio_id`) REFERENCES `akciok` (`id`);

--
-- Megkötések a táblához `tetelek`
--
ALTER TABLE `tetelek`
  ADD CONSTRAINT `tetelek_ibfk_1` FOREIGN KEY (`kosar_id`) REFERENCES `kosar` (`id`),
  ADD CONSTRAINT `tetelek_ibfk_3` FOREIGN KEY (`rendeles_id`) REFERENCES `rendeles` (`id`),
  ADD CONSTRAINT `tetelek_ibfk_4` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
