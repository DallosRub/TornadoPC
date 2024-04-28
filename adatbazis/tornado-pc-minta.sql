-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 26. 10:56
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

--
-- A tábla adatainak kiíratása `ertekeles`
--

INSERT INTO `ertekeles` (`id`, `konfig_id`, `felh_id`, `ertekeles`) VALUES
(1, 0, 1, 1),
(2, 2, 2, 1),
(3, 0, 2, 2),
(4, 1, 2, 2);

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
(1, 'Lajos', 'szialajos@gmail.com', '0d46787fad4321360c88a72e14c2f66dc6f02682', 'Halo Lajos', '06702223344', '2600 Vác, Kossuth tér 1.', 0),
(2, 'admin', 'admin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin Aladár', '06304050600', '2687 Bercel, Rákóczi út 12.', 1);

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
(24, 4, 'Video chipset termékcsalád', 'RTX 4070'),
(25, 4, 'Hűtés típusa', 'Aktív hűtés'),
(26, 4, 'Ventilátorok száma', '2 db'),
(27, 4, 'Grafikus chip sebessége', '2550 MHz'),
(28, 4, 'Grafikus memória sebessége', '21000 MHz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvencek`
--

CREATE TABLE `kedvencek` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kedvencek`
--

INSERT INTO `kedvencek` (`id`, `termek_id`, `fh_id`) VALUES
(1, 1, 1),
(2, 11, 2),
(3, 23, 2);

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
(52, 2, 30, 'kepek\\termekek\\30.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konfig`
--

CREATE TABLE `konfig` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `konf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `konfig`
--

INSERT INTO `konfig` (`id`, `termek_id`, `konf_id`) VALUES
(1, 1, 2),
(19, 2, 4),
(2, 3, 2),
(11, 3, 3),
(20, 3, 4),
(3, 5, 2),
(12, 5, 3),
(21, 5, 4),
(4, 7, 2),
(22, 7, 4),
(13, 8, 3),
(5, 9, 2),
(14, 9, 3),
(23, 9, 4),
(6, 11, 2),
(15, 11, 3),
(24, 12, 4),
(7, 13, 2),
(25, 13, 4),
(16, 14, 3),
(8, 15, 2),
(17, 15, 3),
(26, 15, 4),
(9, 17, 2),
(27, 17, 4),
(18, 18, 3),
(10, 32, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konfig_id`
--

CREATE TABLE `konfig_id` (
  `id` int(11) NOT NULL,
  `felh_id` int(11) NOT NULL,
  `konfig` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `konfig_id`
--

INSERT INTO `konfig_id` (`id`, `felh_id`, `konfig`) VALUES
(2, 1, 0),
(3, 1, 0),
(4, 2, 0);

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

--
-- A tábla adatainak kiíratása `kosar`
--

INSERT INTO `kosar` (`id`, `termek_id`, `fh_id`, `mennyiseg`, `allapot`) VALUES
(1, 1, 1, 1, 1),
(2, 3, 1, 1, 1),
(3, 5, 1, 1, 1),
(4, 7, 1, 1, 1),
(5, 9, 1, 1, 1),
(6, 11, 1, 1, 1),
(7, 13, 1, 1, 1),
(8, 15, 1, 1, 1),
(9, 17, 1, 1, 1),
(10, 2, 1, 1, 0),
(16, 12, 2, 3, 1),
(19, 17, 2, 1, 1),
(20, 27, 2, 2, 1);

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
(31, 'Canon');

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

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`id`, `fh_id`, `vegosszeg`, `fiz_mod_id`, `leadas_datuma`, `allapot`) VALUES
(1, 1, 1118505, 1, '2024-04-26 10:48:03', 'leadva'),
(2, 2, 115560, 2, '2024-04-26 10:54:47', 'leadva'),
(3, 2, 349580, 2, '2024-04-26 10:55:36', 'leadva');

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
(1, 1, 1, 'Core i7-13700KF', 178190, 1, 2022, 0, '?'),
(2, 1, 2, 'Ryzen 5 5500', 39489, 2, 2023, 0, ''),
(3, 2, 2, 'Radeon RX 7900 XTX', 414865, 3, 2022, 0, ''),
(4, 2, 3, 'GeForce RTX 4070', 226280, 4, 2023, 0, ''),
(5, 3, 3, 'ROG MAXIMUS Z790 HERO', 273390, 1, 2022, 0, ''),
(6, 3, 5, 'Z790 AORUS Elite AX', 110291, 1, 2022, 0, ''),
(7, 4, 6, 'FURY Beast DIMM 2x32GB', 57090, 2, 2021, 0, ''),
(8, 4, 6, 'FURY Renegade RGB DIMM 2x8GB', 27189, 3, 2021, 0, ''),
(9, 5, 7, 'WD Blue 1TB WD10EZRZ', 19290, 2, 2022, 0, ''),
(10, 5, 8, 'Exos X20 3.5\'\' HDD', 124729, 1, 2021, 0, ''),
(11, 6, 9, '970 EVO Plus SSD', 31490, 2, 2019, 0, ''),
(12, 6, 10, 'MX500', 25190, 3, 2017, 0, ''),
(13, 7, 11, 'RM750x', 58790, 4, 2021, 0, ''),
(14, 7, 12, 'SuperNOVA 650 G5', 55289, 1, 2019, 0, ''),
(15, 8, 14, 'NH-D15', 45410, 2, 2014, 0, ''),
(16, 8, 13, 'Hyper 212 RGB ', 9790, 1, 2018, 0, ''),
(17, 9, 15, 'H510', 39990, 4, 2019, 0, ''),
(18, 9, 16, 'Design Meshify C', 46290, 2, 2017, 0, ''),
(19, 10, 9, 'Odyssey G7', 174900, 2, 2020, 0, ''),
(20, 10, 4, '32GQ950P-B 32 4K UHD', 393393, 2, 2022, 0, ''),
(21, 11, 17, 'G Pro X Superlight', 39990, 3, 2020, 0, ''),
(22, 11, 18, 'DeathAdder Elite', 19890, 4, 2016, 0, ''),
(23, 12, 11, 'K95 Platinum XT', 87000, 4, 2020, 0, ''),
(24, 12, 17, 'G Pro X mechanical keyboard', 47799, 1, 2019, 0, ''),
(25, 13, 19, 'Cloud II', 45790, 2, 2015, 0, ''),
(26, 13, 17, 'G Pro X Gaming Headset', 36890, 3, 2019, 0, ''),
(27, 14, 20, 'PlayStation 5', 174790, 4, 2020, 0, ''),
(28, 14, 21, 'Xbox Series X', 169990, 2, 2020, 0, ''),
(29, 15, 22, 'EcoTank ET-4750 multifunctional', 279990, 3, 2017, 0, ''),
(30, 15, 23, 'LaserJet Pro  M404dn', 136000, 4, 2019, 0, ''),
(31, 1, 1, 'Core i5-12400F', 55890, 1, 2019, 1, ''),
(32, 1, 1, 'Core i9-14900K', 250190, 4, 2023, 1, ''),
(33, 1, 2, 'Ryzen 7 7700X', 131290, 2, 2022, 1, ''),
(34, 1, 2, 'Ryzen 9 7950X3D', 263790, 3, 2022, 1, '');

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
-- A tábla adatainak kiíratása `tetelek`
--

INSERT INTO `tetelek` (`id`, `fh_id`, `kosar_id`, `rendeles_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 2, 16, 2),
(11, 2, 19, 2),
(12, 2, 20, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `ertekeles`
--
ALTER TABLE `ertekeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `fizetes_modok`
--
ALTER TABLE `fizetes_modok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `jellemzok`
--
ALTER TABLE `jellemzok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT a táblához `konfig`
--
ALTER TABLE `konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `konfig_id`
--
ALTER TABLE `konfig_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `markak`
--
ALTER TABLE `markak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `tetelek`
--
ALTER TABLE `tetelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
