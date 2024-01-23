-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 23. 09:57
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

UPDATE `termek_kategoriak` SET megnevezes = 'Processzor', kat_id = '1' WHERE id='1';
UPDATE `termek_kategoriak` SET megnevezes = 'Videókártya', kat_id = '1' WHERE id='2';
UPDATE `termek_kategoriak` SET megnevezes = 'Alaplap', kat_id = '1' WHERE id='3';
UPDATE `termek_kategoriak` SET megnevezes = 'Memória', kat_id = '1' WHERE id='4';
UPDATE `termek_kategoriak` SET megnevezes = 'Merevlemez', kat_id = '1' WHERE id='5';
UPDATE `termek_kategoriak` SET megnevezes = 'SSD', kat_id = '1' WHERE id='6';
UPDATE `termek_kategoriak` SET megnevezes = 'Tápegység', kat_id = '1' WHERE id='7';
UPDATE `termek_kategoriak` SET megnevezes = 'Processzor hűtő', kat_id = '1' WHERE id='8';
UPDATE `termek_kategoriak` SET megnevezes = 'Számítógépház', kat_id = '1' WHERE id='9';

UPDATE `termek_kategoriak` SET megnevezes = 'Monitor', kat_id = '2' WHERE id='10';
UPDATE `termek_kategoriak` SET megnevezes = 'Egér', kat_id = '2' WHERE id='11';
UPDATE `termek_kategoriak` SET megnevezes = 'Billentyűzet', kat_id = '2' WHERE id='12';
UPDATE `termek_kategoriak` SET megnevezes = 'Fejhallgató', kat_id = '2' WHERE id='13';

UPDATE `termek_kategoriak` SET megnevezes = 'Konzol', kat_id = '3' WHERE id='14';
UPDATE `termek_kategoriak` SET megnevezes = 'Nyomtató', kat_id = '3' WHERE id='15';
UPDATE `termek_kategoriak` SET megnevezes = 'Drón', kat_id = '3' WHERE id='16';
UPDATE `termek_kategoriak` SET megnevezes = 'Laptop', kat_id = '3' WHERE id='17';
UPDATE `termek_kategoriak` SET megnevezes = 'Tablet', kat_id = '3' WHERE id='18';
UPDATE `termek_kategoriak` SET megnevezes = 'Mobiltelefon', kat_id = '3' WHERE id='19';
UPDATE `termek_kategoriak` SET megnevezes = 'VR eszköz', kat_id = '3' WHERE id='20';
UPDATE `termek_kategoriak` SET megnevezes = 'Fényképezőgép', kat_id = '3' WHERE id='21';
UPDATE `termek_kategoriak` SET megnevezes = 'Összeépített pc', kat_id = '3' WHERE id='22';

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `termek_kategoriak`
--
ALTER TABLE `termek_kategoriak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
