--
-- Adatbázis: `kopaj_10`
--
CREATE DATABASE `kopaj_10` ;
USE `kopaj_10` ;
-- --------------------------------------------------------
--
-- Tábla szerkezet ehhez a táblához `user`
--
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Tábla szerkezet ehhez a táblához `page`
--
CREATE TABLE  IF NOT EXISTS `page` (
  `p_id` int(10) NOT NULL PRIMARY KEY  AUTO_INCREMENT,
  `u_id` int(10) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_text` text NOT NULL,
  `p_date` date NOT NULL,
  FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
