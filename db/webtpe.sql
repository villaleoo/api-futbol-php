-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 22:55:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webtpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `id_liga` int(11) NOT NULL,
  `nombre_estadio` varchar(45) NOT NULL,
  `capacidad_estadio` int(11) NOT NULL,
  `descripcion_historia` text NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `fecha_fundacion` date NOT NULL,
  `imagen_logo` varbinary(25000) DEFAULT NULL,
  `temporada_analisis` int(11) NOT NULL,
  `cant_partidos_jugados` int(11) NOT NULL,
  `goles_en_liga` int(11) NOT NULL,
  `goles_en_copa` int(11) NOT NULL,
  `promedio_edad_equipo` int(11) NOT NULL,
  `cantidad_jugadores` int(11) NOT NULL,
  `imagen_estadio` varbinary(20000) DEFAULT NULL,
  `entidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`id`, `nombre`, `ciudad`, `id_liga`, `nombre_estadio`, `capacidad_estadio`, `descripcion_historia`, `apodo`, `fecha_fundacion`, `imagen_logo`, `temporada_analisis`, `cant_partidos_jugados`, `goles_en_liga`, `goles_en_copa`, `promedio_edad_equipo`, `cantidad_jugadores`, `imagen_estadio`, `entidad`) VALUES
(1, 'aston villa', 'birmingham', 1, 'villa park', 42000, 'El Aston Villa Football Club es un club de fútbol del Reino Unido con sede en Birmingham (Inglaterra). Disputa la Premier League, máxima categoría del fútbol inglés, ininterrumpidamente desde 2019, si bien es uno de los equipos más representativos de la élite del país y es únicamente superado por el Everton Football Club en presencias en la máxima categoría, y es uno de los miembros fundadores de la Football League en 1888 y de la Premier League en 1992.​', 'the villians', '1874-11-21', NULL, 2022, 38, 51, 51, 27, 32, NULL, 'club'),
(2, 'chelsea', 'londres', 1, 'stamford bridge', 41841, 'el chelsea football club, conocido simplemente como Chelsea, es un club de fútbol profesional de Inglaterra con sede en el distrito de fulham, Londres, que disputa actualmente la premier league, máxima competición futbolística de ese país. Fundado el 10 de marzo de 1905. Disputa sus partidos como local en el estadio de Stamford Bridge, el cual tiene una capacidad para 41 000 espectadores, y en el que ha disputado sus encuentros como local desde su fundación.', 'the blues', '1905-03-10', NULL, 2022, 38, 38, 13, 27, 32, NULL, 'club'),
(3, 'bayer leverkusen', 'leverkusen', 2, 'bayarena', 30210, 'el bayer 04 leverkusen es un club de fútbol ubicado en Leverkusen, en la metrópoli Rin-Ruhr de Renania del Norte-Westfalia, Alemania. El equipo compite en la 1. Bundesliga, la primera división del fútbol nacional. fundado el 1 de julio de 1904 por unos empleados de la compañía farmacéutica Bayer AG, también posee ramas deportivas de baloncesto, atletismo, gimnasia, entre otros.', 'die werkself', '1904-07-01', NULL, 2022, 34, 57, 22, 30, 33, NULL, 'club'),
(5, 'borussia dortmund', 'dortmund', 2, 'signal iduna park', 81365, 'el borussia dortmund es una entidad deportiva profesional sita en Dortmund, en la región Rin-Ruhr del estado federal de Renania del Norte-Westfalia, Alemania. Fue fundada el 19 de diciembre de 1909 como un club de fútbol, actividad por la que es principalmente conocido y en la que llegó a situarse como el segundo equipo más laureado del país. ', 'die schwarzgelben', '1909-12-19', NULL, 2022, 34, 83, 23, 29, 32,NULL, 'club');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `formato` varchar(80) NOT NULL,
  `reglas` varchar(300) NOT NULL,
  `cant_partidos` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `fecha_fundacion` date NOT NULL,
  `descripcion` text NOT NULL,
  `temporada` int(11) NOT NULL,
  `imagen_logo` varbinary(20000) DEFAULT NULL,
  `imagen_pais` varbinary(20000) DEFAULT NULL,
  `entidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`id`, `nombre`, `pais`, `formato`, `reglas`, `cant_partidos`, `division`, `fecha_fundacion`, `descripcion`, `temporada`, `imagen_logo`, `imagen_pais`, `entidad`) VALUES
(1, 'premier league', 'inglaterra', 'liguilla', 'Durante cada temporada (desde agosto hasta mayo) cada equipo se enfrenta dos veces con el resto (un sistema doble de todos contra todos), una vez en su estadio y otra en el de sus contrincantes, para un total de 38 partidos por cada equipo.', 38, 1, '1992-08-15', 'La Premier League, también conocida en Inglaterra como The Premiership, es la máxima categoría del sistema de ligas de fútbol de Inglaterra. Comenzó a disputarse en la temporada 1992-93. En ella pueden también participar, por motivos históricos, aquellos clubes galeses que lo deseen, siempre que hayan competido ininterrumpidamente en el sistema de fútbol federado inglés desde, al menos, el 30 de junio de 1992. Este es el caso del Swansea City y del Cardiff City, clubes radicados en Gales participantes de la liga y que han llegado a representar a Inglaterra en competiciones europeas.', 2022, NULL, NULL, 'liga'),
(2, 'bundesliga', 'alemania', 'liguilla', 'La temporada se inicia a principios de agosto y se extiende hasta finales de mayo del año siguiente, con una pausa de invierno de seis semanas (mediados de diciembre hasta finales de enero).los equipos de esta categoría se enfrentan todos contra todos siguiendo un calendario establecido por sorteo. Desde 1995, el ganador de cada partido obtiene tres puntos (antes se otorgaban dos), el empate otorga un punto y la derrota, cero puntos. El que logre más puntos al final de la temporada, será el campeón de la liga.actualmente, el campeón tiene derecho a disputar la fase de grupos de la Liga de Campeones de Europa, al igual que el segundo, tercer y cuarto calificado. El quinto equipo en la tabla pasa a la fase de grupos de la UEFA Europa League, mientras que el sexto disputa la segunda ronda previa.', 34, 1, '1963-08-24', 'La Bundesliga es la competición entre los equipos de fútbol de la máxima categoría de Alemania. Se empezó a disputar en 1963, a partir de la unificación de los antiguos campeonatos locales llamados Oberligen. Junto a la Zweite Bundesliga y Dritte Bundesliga, forman las tres divisiones nacionales del fútbol profesional en Alemania.', 2022, NULL, NULL, 'liga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasenia`) VALUES
(1, 'webadmin', '$2y$10$pITzopbsAYmLwUQr4AEyMuVG5qXM8MnflQAfUTfe4tb4T.O41FTPq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_liga` (`id_liga`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD CONSTRAINT `clubes_ibfk_1` FOREIGN KEY (`id_liga`) REFERENCES `ligas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
