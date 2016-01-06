-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2015 a las 05:38:36
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anoescolar`
--

CREATE TABLE IF NOT EXISTS `anoescolar` (
`idAnoEscolar` int(11) NOT NULL,
  `inicioAnoEscolar` year(4) NOT NULL,
  `finAnoEscolar` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anoescolar`
--

INSERT INTO `anoescolar` (`idAnoEscolar`, `inicioAnoEscolar`, `finAnoEscolar`) VALUES
(1, 0000, 0000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
`idAsignatura` int(11) NOT NULL,
  `nombreAsignatura` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombreAbreviadoAsignatura` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `educT` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAsignatura`, `nombreAsignatura`, `nombreAbreviadoAsignatura`, `educT`) VALUES
(1, 'CASTELLANO Y LITERATURA', 'CL', 0),
(2, 'INGLES', 'IN', 0),
(3, 'MATEMATICA', 'MA', 0),
(4, 'HISTORIA DE VENEZUELA', 'HV', 0),
(5, 'EDUCACION FISICA', 'EF', 0),
(6, 'CIENCIAS BIOLOGICAS', 'CB', 0),
(7, 'FISICA', 'FI', 0),
(8, 'QUIMICA', 'QU', 0),
(9, 'ESTUDIOS DE LA NATURALEZA', 'EN', 0),
(10, 'EDUCACION FAMILIAR', 'EF', 0),
(11, 'GEOGRAFIA GENERAL', 'GG', 0),
(12, 'EDUCACION ARTISTICA', 'EA', 0),
(13, 'EDUCACION PARA LA SALUD', 'ES', 0),
(14, 'HISTORIA UNIVERSAL', 'HU', 0),
(15, 'GEOGRAFIA DE VENEZUEL', 'GV', 0),
(16, 'DIBUJO', 'DI', 0),
(17, 'FILOSOFIA', 'FL', 0),
(18, 'INSTRUCCIÓN PREMILITAR', 'IP', 0),
(19, 'GEOGRAFIA ECONOMICA DE VENEZUELA', 'GE', 0),
(20, 'CIENCIA DE LA TIERRA', 'CT', 0),
(21, 'EDUCACION PARA EL TRABAJO', 'ET', 0),
(22, 'INICIACION AL DIBUJO', 'ID', 1),
(23, 'TURISMO', 'TU', 1),
(24, 'AGRICULTURA', 'AG', 1),
(25, 'DIBUJO TECNICO', 'DT', 1),
(26, 'HORTICULTURA', 'HO', 1),
(27, 'FRUTICULTURA', 'FR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargopersonal`
--

CREATE TABLE IF NOT EXISTS `cargopersonal` (
`idCargoPersonal` int(11) NOT NULL,
  `cargoPersonal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargopersonal`
--

INSERT INTO `cargopersonal` (`idCargoPersonal`, `cargoPersonal`) VALUES
(1, 'DIRECTOR(A)'),
(2, 'COORDINADOR(A) DE CONTROL DE ESTUDIOS'),
(3, 'REPRESENTANTE DEL CONSEJO DE DOCENTES'),
(4, 'DOCENTES'),
(5, 'FUNCIONARIO(A) DE MINISTERIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosplantel`
--

CREATE TABLE IF NOT EXISTS `datosplantel` (
  `codigoDEA` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombrePlant` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `distritoEscolarPlant` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccPlantel` text COLLATE utf8_spanish_ci NOT NULL,
  `telefonoPlant` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `municipioPlant` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idEntidaFederal` int(11) NOT NULL,
  `zonaEducativaPlant` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datosplantel`
--

INSERT INTO `datosplantel` (`codigoDEA`, `nombrePlant`, `distritoEscolarPlant`, `direccPlantel`, `telefonoPlant`, `municipioPlant`, `idEntidaFederal`, `zonaEducativaPlant`) VALUES
('S3877D1405', 'UNIDAD EDUCATIVA SAN JOSE', '5', 'URBANIZACION LA DON LUIS, AVENIDA A ENTRE CALLES 3 Y 4', '0426-1234567', 'CAMPO ELIAS', 14, 'Mï¿½RIDAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidadfederal`
--

CREATE TABLE IF NOT EXISTS `entidadfederal` (
  `idEntidadFederal` int(11) NOT NULL,
  `entidadFederal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `AbreviadoEntidadFederal` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entidadfederal`
--

INSERT INTO `entidadfederal` (`idEntidadFederal`, `entidadFederal`, `AbreviadoEntidadFederal`) VALUES
(1, 'DISTRITO CAPITAL', 'DC'),
(2, 'AMAZONAS', 'AM'),
(3, 'ANZOÁTEGUI', 'AN'),
(4, 'APURE', 'AP'),
(5, 'ARAGUA', 'AR'),
(6, 'BARINAS', 'BA'),
(7, 'BOLÍVAR', 'BO'),
(8, 'CARABOBO', 'CA'),
(9, 'COJEDES', 'CO'),
(10, 'DELTA AMACURO', 'DA'),
(11, 'FALCÓN', 'FA'),
(12, 'GUÁRICO', 'GU'),
(13, 'LARA', 'LA'),
(14, 'MÉRIDA', 'ME'),
(15, 'MIRANDA', 'MI'),
(16, 'MONAGAS', 'MO'),
(17, 'NUEVA ESPARTA', 'NE'),
(18, 'PORTUGUESA', 'PO'),
(19, 'SUCRE', 'SU'),
(20, 'TÁCHIRA', 'TA'),
(21, 'TRUJILLO', 'TR'),
(22, 'YARACUY', 'YA'),
(23, 'ZULIA', 'ZU'),
(24, 'VARGAS', 'VA'),
(25, 'DEPENDENCIAS FEDERALES', 'DF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolaridad`
--

CREATE TABLE IF NOT EXISTS `escolaridad` (
`idEscolaridad` int(11) NOT NULL,
  `escolaridad` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `escolaridad`
--

INSERT INTO `escolaridad` (`idEscolaridad`, `escolaridad`) VALUES
(1, 'REGULAR'),
(2, 'REPITIENTE'),
(3, 'MATERIA PENDIENTE'),
(4, 'DOBLE INSCRIPCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `ciEstudiante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosEst` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombresEst` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `sexoEst` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `fechNacimientoEst` date NOT NULL,
  `lugarNacimientoEst` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idEntidaFederal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
`idGrado` int(11) NOT NULL,
  `grado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `gradoLetras` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`idGrado`, `grado`, `gradoLetras`) VALUES
(1, '1', 'PRIMERO'),
(2, '2', 'SEGUNDO'),
(3, '3', 'TERCERO'),
(4, '4', 'CUARTO'),
(5, '5', 'QUINTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insstestudiante`
--

CREATE TABLE IF NOT EXISTS `insstestudiante` (
`id` int(11) NOT NULL,
  `idAnoEscolar` int(11) NOT NULL,
  `idGrad` int(11) NOT NULL,
  `ciEstidante` varchar(12) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `insstLapso1` int(11) DEFAULT NULL,
  `insstLapso2` int(11) DEFAULT NULL,
  `insstLapso3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
`id` int(11) NOT NULL,
  `idAnoEscolar` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `ciEstudiante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `idEscolaridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notaestudiantes`
--

CREATE TABLE IF NOT EXISTS `notaestudiantes` (
`id` int(11) NOT NULL,
  `idAnoEscolar` int(11) NOT NULL,
  `ciEstudiante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `idGrdAsig` int(11) NOT NULL,
  `idAsigGrd` int(11) NOT NULL,
  `nombAsign` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `notaLapso1` float DEFAULT NULL,
  `notaLapso2` float DEFAULT NULL,
  `notaLapso3` float DEFAULT NULL,
  `promedioNotas` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaldocente`
--

CREATE TABLE IF NOT EXISTS `personaldocente` (
  `ciPersonal` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosPersonal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombresPersonal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idCargoPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaldocente_asignatura`
--

CREATE TABLE IF NOT EXISTS `personaldocente_asignatura` (
`idpdAsg` int(11) NOT NULL,
  `ciPersonal` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `idGrad` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestudio`
--

CREATE TABLE IF NOT EXISTS `planestudio` (
  `idPlanEstudio` int(11) NOT NULL,
  `nombrePlanEstudio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `mencionPlanEstudio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tituloPlanEstudio` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planestudio`
--

INSERT INTO `planestudio` (`idPlanEstudio`, `nombrePlanEstudio`, `mencionPlanEstudio`, `tituloPlanEstudio`) VALUES
(31018, 'EDUCACIÓN MEDIA GENERAL', 'CIENCIAS', 'BACHILLER EN CIENCIAS'),
(32011, 'EDUCACIï¿½N MEDIA', '', 'CERTIFICADO DE EDUCACION BASICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestudio_asignatura`
--

CREATE TABLE IF NOT EXISTS `planestudio_asignatura` (
  `idGrado` int(11) NOT NULL,
  `idPlanEstudio` int(11) NOT NULL,
  `OrdAsigPlan` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planestudio_asignatura`
--

INSERT INTO `planestudio_asignatura` (`idGrado`, `idPlanEstudio`, `OrdAsigPlan`, `idAsignatura`) VALUES
(1, 32011, 1, 1),
(1, 32011, 2, 2),
(1, 32011, 3, 3),
(1, 32011, 5, 4),
(1, 32011, 9, 5),
(1, 32011, 4, 9),
(1, 32011, 6, 10),
(1, 32011, 7, 11),
(1, 32011, 8, 12),
(1, 32011, 13, 21),
(1, 32011, 10, 22),
(1, 32011, 11, 23),
(1, 32011, 12, 24),
(2, 32011, 1, 1),
(2, 32011, 2, 2),
(2, 32011, 3, 3),
(2, 32011, 6, 4),
(2, 32011, 9, 5),
(2, 32011, 5, 6),
(2, 32011, 8, 12),
(2, 32011, 4, 13),
(2, 32011, 7, 14),
(2, 32011, 13, 21),
(2, 32011, 11, 23),
(2, 32011, 10, 25),
(2, 32011, 12, 26),
(3, 32011, 1, 1),
(3, 32011, 2, 2),
(3, 32011, 3, 3),
(3, 32011, 7, 4),
(3, 32011, 9, 5),
(3, 32011, 4, 6),
(3, 32011, 5, 7),
(3, 32011, 6, 8),
(3, 32011, 8, 15),
(3, 32011, 13, 21),
(3, 32011, 11, 23),
(3, 32011, 10, 25),
(3, 32011, 12, 27),
(4, 31018, 1, 1),
(4, 31018, 4, 2),
(4, 31018, 2, 3),
(4, 31018, 3, 4),
(4, 31018, 5, 5),
(4, 31018, 8, 6),
(4, 31018, 6, 7),
(4, 31018, 7, 8),
(4, 31018, 9, 16),
(4, 31018, 10, 17),
(4, 31018, 11, 18),
(5, 31018, 4, 1),
(5, 31018, 1, 2),
(5, 31018, 5, 3),
(5, 31018, 2, 5),
(5, 31018, 8, 6),
(5, 31018, 6, 7),
(5, 31018, 7, 8),
(5, 31018, 10, 18),
(5, 31018, 3, 19),
(5, 31018, 9, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperativo`
--

CREATE TABLE IF NOT EXISTS `recuperativo` (
  `ciEstidante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `prueb01` float DEFAULT NULL,
  `prueb02` float DEFAULT NULL,
  `prueb03` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repitiente_materiapendient`
--

CREATE TABLE IF NOT EXISTS `repitiente_materiapendient` (
`id` int(11) NOT NULL,
  `idAnoEscolar` int(11) NOT NULL,
  `idGrad` int(11) NOT NULL,
  `ciEstidante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `rMPNotaLapso1` float DEFAULT NULL,
  `rMPNotaLapso2` float DEFAULT NULL,
  `rMPNotaLapso3` float DEFAULT NULL,
  `rMPPromedioNotas` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
`idSeccion` int(11) NOT NULL,
  `seccion` char(1) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSeccion`, `seccion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(11) NOT NULL,
  `nUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nvlUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nUsuario`, `cUsuario`, `nvlUsuario`) VALUES
(1, 'SARE', '3e2bb9492bc3a32d5f8c9aafe88894c6', '3'),
(2, 'ADMIN', '73acd9a5972130b75066c82595a1fae3', '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anoescolar`
--
ALTER TABLE `anoescolar`
 ADD PRIMARY KEY (`idAnoEscolar`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
 ADD PRIMARY KEY (`idAsignatura`);

--
-- Indices de la tabla `cargopersonal`
--
ALTER TABLE `cargopersonal`
 ADD PRIMARY KEY (`idCargoPersonal`);

--
-- Indices de la tabla `datosplantel`
--
ALTER TABLE `datosplantel`
 ADD PRIMARY KEY (`codigoDEA`), ADD KEY `fk_DP_EF_idx` (`idEntidaFederal`);

--
-- Indices de la tabla `entidadfederal`
--
ALTER TABLE `entidadfederal`
 ADD PRIMARY KEY (`idEntidadFederal`);

--
-- Indices de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
 ADD PRIMARY KEY (`idEscolaridad`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
 ADD PRIMARY KEY (`ciEstudiante`), ADD KEY `fk_est_eF_idx` (`idEntidaFederal`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
 ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `insstestudiante`
--
ALTER TABLE `insstestudiante`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_aE_m_idx` (`idAnoEscolar`), ADD KEY `fk_m_est_idx` (`ciEstudiante`), ADD KEY `fk_m_esc_idx` (`idEscolaridad`), ADD KEY `fk_m_gds_idx` (`idGrado`), ADD KEY `fk_m_scs_idx` (`idSeccion`);

--
-- Indices de la tabla `notaestudiantes`
--
ALTER TABLE `notaestudiantes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ne_ae_idx` (`idAnoEscolar`), ADD KEY `fk_ne_es_idx` (`ciEstudiante`), ADD KEY `fk_ne_peAsg_idx` (`idGrdAsig`), ADD KEY `fk_ne_peAsg_idx1` (`idAsigGrd`);

--
-- Indices de la tabla `personaldocente`
--
ALTER TABLE `personaldocente`
 ADD PRIMARY KEY (`ciPersonal`), ADD KEY `fk_pd_cp_idx` (`idCargoPersona`);

--
-- Indices de la tabla `personaldocente_asignatura`
--
ALTER TABLE `personaldocente_asignatura`
 ADD PRIMARY KEY (`idpdAsg`), ADD KEY `fk_pdAsig_pd_idx` (`ciPersonal`), ADD KEY `fk_pdAsg_asg_idx` (`idAsignatura`);

--
-- Indices de la tabla `planestudio`
--
ALTER TABLE `planestudio`
 ADD PRIMARY KEY (`idPlanEstudio`);

--
-- Indices de la tabla `planestudio_asignatura`
--
ALTER TABLE `planestudio_asignatura`
 ADD PRIMARY KEY (`idGrado`,`idPlanEstudio`,`idAsignatura`), ADD KEY `fk_peAsg_ pe_idx` (`idPlanEstudio`), ADD KEY `fk_peAsg_asg_idx` (`idAsignatura`);

--
-- Indices de la tabla `repitiente_materiapendient`
--
ALTER TABLE `repitiente_materiapendient`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_rMp_es_idx` (`ciEstidante`), ADD KEY `fk_rMp_asg_idx` (`idAsignatura`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
 ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anoescolar`
--
ALTER TABLE `anoescolar`
MODIFY `idAnoEscolar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `cargopersonal`
--
ALTER TABLE `cargopersonal`
MODIFY `idCargoPersonal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
MODIFY `idEscolaridad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `insstestudiante`
--
ALTER TABLE `insstestudiante`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notaestudiantes`
--
ALTER TABLE `notaestudiantes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personaldocente_asignatura`
--
ALTER TABLE `personaldocente_asignatura`
MODIFY `idpdAsg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `repitiente_materiapendient`
--
ALTER TABLE `repitiente_materiapendient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datosplantel`
--
ALTER TABLE `datosplantel`
ADD CONSTRAINT `fk_DP_EF` FOREIGN KEY (`idEntidaFederal`) REFERENCES `entidadfederal` (`idEntidadFederal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
ADD CONSTRAINT `fk_est_eF` FOREIGN KEY (`idEntidaFederal`) REFERENCES `entidadfederal` (`idEntidadFederal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
ADD CONSTRAINT `fk_m_ae` FOREIGN KEY (`idAnoEscolar`) REFERENCES `anoescolar` (`idAnoEscolar`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_m_esc` FOREIGN KEY (`idEscolaridad`) REFERENCES `escolaridad` (`idEscolaridad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_m_est` FOREIGN KEY (`ciEstudiante`) REFERENCES `estudiantes` (`ciEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_m_gds` FOREIGN KEY (`idGrado`) REFERENCES `grados` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_m_scs` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notaestudiantes`
--
ALTER TABLE `notaestudiantes`
ADD CONSTRAINT `fk_ne_ae` FOREIGN KEY (`idAnoEscolar`) REFERENCES `anoescolar` (`idAnoEscolar`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ne_es` FOREIGN KEY (`ciEstudiante`) REFERENCES `estudiantes` (`ciEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ne_peAsg` FOREIGN KEY (`idAsigGrd`) REFERENCES `planestudio_asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ne_peAsgGrd` FOREIGN KEY (`idGrdAsig`) REFERENCES `planestudio_asignatura` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personaldocente`
--
ALTER TABLE `personaldocente`
ADD CONSTRAINT `fk_pd_cp` FOREIGN KEY (`idCargoPersona`) REFERENCES `cargopersonal` (`idCargoPersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personaldocente_asignatura`
--
ALTER TABLE `personaldocente_asignatura`
ADD CONSTRAINT `fk_pdAsg_asg` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_pdAsg_pd` FOREIGN KEY (`ciPersonal`) REFERENCES `personaldocente` (`ciPersonal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planestudio_asignatura`
--
ALTER TABLE `planestudio_asignatura`
ADD CONSTRAINT `fk_peAsg_ pe` FOREIGN KEY (`idPlanEstudio`) REFERENCES `planestudio` (`idPlanEstudio`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_peAsg_asg` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_peAsg_gds` FOREIGN KEY (`idGrado`) REFERENCES `grados` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repitiente_materiapendient`
--
ALTER TABLE `repitiente_materiapendient`
ADD CONSTRAINT `fk_rMp_asg` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_rMp_es` FOREIGN KEY (`ciEstidante`) REFERENCES `estudiantes` (`ciEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
