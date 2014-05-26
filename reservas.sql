-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2014 a las 10:04:07
-- Versión del servidor: 5.5.37
-- Versión de PHP: 5.4.28-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rsv_reservation`
--

CREATE TABLE IF NOT EXISTS `rsv_reservation` (
  `ID_Reservation` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_Reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `rsv_reservation`
--

INSERT INTO `rsv_reservation` (`ID_Reservation`, `Name`, `Time`) VALUES
(1, 'Null Reservation', '2014-05-18 06:47:35'),
(2, 'Arandi López', '2014-05-23 05:19:49'),
(3, 'Arandi López Alonzo', '2014-05-23 05:37:04'),
(4, 'Arandi López', '2014-05-23 05:51:29'),
(5, 'Arandi López Alonzo', '2014-05-23 06:30:41'),
(6, 'Arand', '2014-05-23 06:41:35'),
(7, 'Arandi Jesus', '2014-05-23 06:46:44'),
(8, 'Arandi López Alonzo', '2014-05-23 07:12:38'),
(9, 'Randy', '2014-05-23 07:36:09'),
(10, 'Patito Feo', '2014-05-23 07:41:49'),
(11, 'Inugami', '2014-05-23 07:55:48'),
(12, 'Randy López', '2014-05-23 08:17:35'),
(13, 'Juan Perez', '2014-05-23 08:29:36'),
(14, 'Lorem Ipsun', '2014-05-23 08:31:18'),
(15, 'Joe Doe', '2014-05-23 08:33:16'),
(16, 'Pikachu', '2014-05-23 08:35:46'),
(17, 'Takashi', '2014-05-23 18:39:23'),
(18, 'Kurumi', '2014-05-23 18:39:25'),
(19, 'Miguel Coronel', '2014-05-23 18:42:11'),
(20, 'Yuceli Polanco', '2014-05-23 18:42:11'),
(21, 'Yuceli Polanco', '2014-05-23 18:43:48'),
(22, 'Coronel', '2014-05-23 18:44:37'),
(23, 'Arandi López', '2014-05-23 18:45:45'),
(24, 'Perro del Mal', '2014-05-23 18:59:50'),
(25, 'Hijo del Perro del Mal', '2014-05-23 19:02:07'),
(26, 'Megano', '2014-05-23 19:24:10'),
(27, 'Fulano', '2014-05-23 19:24:12'),
(28, 'Pedro', '2014-05-23 19:29:20'),
(29, 'Roco', '2014-05-23 19:33:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rsv_seat`
--

CREATE TABLE IF NOT EXISTS `rsv_seat` (
  `ID_Seat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Position` varchar(3) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Reservation` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_Seat`),
  KEY `Reservation` (`Reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `rsv_seat`
--

INSERT INTO `rsv_seat` (`ID_Seat`, `Position`, `Status`, `Reservation`) VALUES
(1, 'A1', 'free', 1),
(2, 'B1', 'free', 1),
(3, 'C1', 'free', 1),
(4, 'D1', 'free', 1),
(5, 'E1', 'free', 1),
(6, 'F1', 'free', 1),
(7, 'G1', 'free', 1),
(8, 'H1', 'free', 1),
(9, 'I1', 'free', 1),
(10, 'J1', 'free', 1),
(11, 'A2', 'free', 1),
(12, 'B2', 'free', 1),
(13, 'C2', 'free', 1),
(14, 'D2', 'reserved', 14),
(15, 'E2', 'reserved', 14),
(16, 'F2', 'reserved', 14),
(17, 'G2', 'reserved', 14),
(18, 'H2', 'reserved', 14),
(19, 'I2', 'free', 1),
(20, 'J2', 'free', 1),
(21, 'A3', 'free', 1),
(22, 'B3', 'free', 1),
(23, 'C3', 'free', 1),
(24, 'D3', 'free', 1),
(25, 'E3', 'free', 1),
(26, 'F3', 'free', 1),
(27, 'G3', 'free', 1),
(28, 'H3', 'reserved', 21),
(29, 'I3', 'free', 1),
(30, 'J3', 'free', 1),
(31, 'A4', 'free', 1),
(32, 'B4', 'free', 1),
(33, 'C4', 'free', 1),
(34, 'D4', 'reserved', 9),
(35, 'E4', 'reserved', 9),
(36, 'F4', 'reserved', 9),
(37, 'G4', 'free', 1),
(38, 'H4', 'reserved', 22),
(39, 'I4', 'free', 1),
(40, 'J4', 'free', 1),
(41, 'A5', 'reserved', 26),
(42, 'B5', 'reserved', 26),
(43, 'C5', 'free', 1),
(44, 'D5', 'reserved', 8),
(45, 'E5', 'reserved', 8),
(46, 'F5', 'reserved', 8),
(47, 'G5', 'reserved', 8),
(48, 'H5', 'free', 1),
(49, 'I5', 'free', 1),
(50, 'J5', 'free', 1),
(51, 'A6', 'reserved', 27),
(52, 'B6', 'reserved', 27),
(53, 'C6', 'free', 1),
(54, 'D6', 'reserved', 13),
(55, 'E6', 'reserved', 13),
(56, 'F6', 'reserved', 13),
(57, 'G6', 'free', 1),
(58, 'H6', 'free', 1),
(59, 'I6', 'free', 1),
(60, 'J6', 'free', 1),
(61, 'A7', 'free', 1),
(62, 'B7', 'free', 1),
(63, 'C7', 'free', 1),
(64, 'D7', 'free', 1),
(65, 'E7', 'free', 1),
(66, 'F7', 'reserved', 28),
(67, 'G7', 'reserved', 28),
(68, 'H7', 'free', 1),
(69, 'I7', 'reserved', 25),
(70, 'J7', 'reserved', 25),
(71, 'A8', 'free', 1),
(72, 'B8', 'free', 1),
(73, 'C8', 'reserved', 12),
(74, 'D8', 'reserved', 12),
(75, 'E8', 'reserved', 12),
(76, 'F8', 'reserved', 12),
(77, 'G8', 'free', 1),
(78, 'H8', 'free', 1),
(79, 'I8', 'free', 1),
(80, 'J8', 'free', 1),
(81, 'A9', 'free', 1),
(82, 'B9', 'free', 1),
(83, 'C9', 'free', 1),
(84, 'D9', 'reserved', 18),
(85, 'E9', 'reserved', 18),
(86, 'F9', 'reserved', 18),
(87, 'G9', 'free', 1),
(88, 'H9', 'free', 1),
(89, 'I9', 'reserved', 29),
(90, 'J9', 'reserved', 29),
(91, 'A10', 'free', 1),
(92, 'B10', 'free', 1),
(93, 'C10', 'reserved', 17),
(94, 'D10', 'reserved', 17),
(95, 'E10', 'free', 1),
(96, 'F10', 'free', 1),
(97, 'G10', 'reserved', 16),
(98, 'H10', 'reserved', 16),
(99, 'I10', 'free', 1),
(100, 'J10', 'free', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rsv_seat`
--
ALTER TABLE `rsv_seat`
  ADD CONSTRAINT `rsv_seat_ibfk_1` FOREIGN KEY (`Reservation`) REFERENCES `rsv_reservation` (`ID_Reservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
