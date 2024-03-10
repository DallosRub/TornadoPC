-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Feb 27. 13:47
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
(11, 1, 10, 'kepek\\kategoriak\\monitor.jpg'),
(12, 1, 11, 'kepek\\kategoriak\\eger.jpg'),
(13, 1, 12, 'kepek\\kategoriak\\billentyuzet.jpg'),
(14, 1, 13, 'kepek\\kategoriak\\fejhallgato.jpg'),
(15, 1, 14, 'kepek\\kategoriak\\konzol.jpg'),
(16, 1, 15, 'kepek\\kategoriak\\nyomtato.jpg'),
(17, 1, 16, 'kepek\\kategoriak\\dron.jpg'),
(18, 1, 17, 'kepek\\kategoriak\\laptop.jpg'),
(19, 1, 18, 'kepek\\kategoriak\\tablet.jpg'),
(20, 1, 19, 'kepek\\kategoriak\\mobiltelefon.jpg'),
(21, 1, 20, 'kepek\\kategoriak\\VR_eszkoz.jpg'),
(22, 1, 21, 'kepek\\kategoriak\\fenykepezogep.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
