-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Dec 11. 11:30
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `pc-webshop`
--
CREATE DATABASE IF NOT EXISTS `pc-webshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `pc-webshop`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nev` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` text NOT NULL,
  `email` text NOT NULL,
  `jelszo` char(255) NOT NULL,
  `telefonszam` int(11) NOT NULL,
  `lakcim` text NOT NULL,
  `szallitasi_cim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo_konfiguraciok`
--

CREATE TABLE `felhasznalo_konfiguraciok` (
  `id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `publikus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fizetes_modok`
--

CREATE TABLE `fizetes_modok` (
  `id` int(11) NOT NULL,
  `megnevezes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jellemzok`
--

CREATE TABLE `jellemzok` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `megnevezes` text NOT NULL,
  `jelelmzo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `kep` text NOT NULL
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
(31, 'Canon');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `tetelek_id` int(11) NOT NULL,
  `vegosszeg` int(11) NOT NULL,
  `fiz_mod_id` int(11) NOT NULL,
  `leadas_datuma` date NOT NULL,
  `allapot` text NOT NULL
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
(1, 1, 1, 'Core i7-13700KF', 178190, 1, 2022, 0, '?'),
(2, 1, 2, 'Ryzen 5 5500 6-Core 3.6 GHz', 39489, 2, 2023, 0, ''),
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
(30, 15, 23, 'LaserJet Pro  M404dn', 136000, 4, 2019, 0, '');

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
  `megnevezes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termek_kategoriak`
--

INSERT INTO `termek_kategoriak` (`id`, `megnevezes`) VALUES
(1, 'cpu'),
(2, 'gpu'),
(3, 'alaplap'),
(4, 'ram'),
(5, 'hdd'),
(6, 'ssd'),
(7, 'tápegység'),
(8, 'cpu hűtő'),
(9, 'pc ház'),
(10, 'monitor'),
(11, 'egér'),
(12, 'billentyűzet'),
(13, 'fejhallgató'),
(14, 'konzol'),
(15, 'nyomtató'),
(16, 'összeépített pc'),
(17, 'laptop'),
(18, 'tablet'),
(19, 'telefon'),
(20, 'Nintendo'),
(21, 'VR eszköz'),
(22, 'drón'),
(23, 'fényképezőgép');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetelek`
--

CREATE TABLE `tetelek` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `fh_id` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalo_konfiguraciok`
--
ALTER TABLE `felhasznalo_konfiguraciok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fh_id` (`fh_id`),
  ADD KEY `termek_id` (`termek_id`);

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
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`);

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
  ADD KEY `fh_id` (`fh_id`),
  ADD KEY `tetelek_id` (`tetelek_id`),
  ADD KEY `fiz_mod_id` (`fiz_mod_id`);

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
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `fh_id` (`fh_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalo_konfiguraciok`
--
ALTER TABLE `felhasznalo_konfiguraciok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `fizetes_modok`
--
ALTER TABLE `fizetes_modok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `jellemzok`
--
ALTER TABLE `jellemzok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `markak`
--
ALTER TABLE `markak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `tetelek`
--
ALTER TABLE `tetelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `felhasznalo_konfiguraciok`
--
ALTER TABLE `felhasznalo_konfiguraciok`
  ADD CONSTRAINT `felhasznalo_konfiguraciok_ibfk_2` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `felhasznalo_konfiguraciok_ibfk_3` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `jellemzok`
--
ALTER TABLE `jellemzok`
  ADD CONSTRAINT `jellemzok_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`);

--
-- Megkötések a táblához `kepek`
--
ALTER TABLE `kepek`
  ADD CONSTRAINT `kepek_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`);

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_ibfk_1` FOREIGN KEY (`tetelek_id`) REFERENCES `tetelek` (`id`),
  ADD CONSTRAINT `rendeles_ibfk_2` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`),
  ADD CONSTRAINT `rendeles_ibfk_3` FOREIGN KEY (`fiz_mod_id`) REFERENCES `fizetes_modok` (`id`);

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
  ADD CONSTRAINT `tetelek_ibfk_3` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `tetelek_ibfk_4` FOREIGN KEY (`fh_id`) REFERENCES `felhasznalok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
