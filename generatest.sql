-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2016 a las 14:17:18
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `generatest`
--
CREATE DATABASE IF NOT EXISTS `generatest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `generatest`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` varchar(9) NOT NULL,
  `ape_paterno` varchar(35) NOT NULL,
  `ape_materno` varchar(35) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `tel_casa` varchar(13) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_grupo` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `ape_paterno`, `ape_materno`, `nombre`, `direccion`, `tel_casa`, `celular`, `email`, `id_grupo`) VALUES
('1010', 'VEGA', 'CASTILLO', 'ROSA ISELA', 'CHOCOLINES', '05551673280', '05551673280', 'cn_correo', '0000'),
('2', 'VEGA', 'CASTILLO', 'VERENICE ', 'CAPUL&Iacute;N LT.853 MZ.34 COL.PLUTARCO ELIAS CALLES IXTAPA', '5517100853', '55345738451', 'cn_correo', '0000'),
('201023704', 'L&Oacute;PEZ', 'SANTILL&Aacute;N', 'MIGUEL ANGEL', 'CALLE TIERRA Y LIBERTAD S/N COL. VICENTE GUERRERO SAN VICENT', '5514236987', 'cn_correo', 'vpa_porcayo@hotmail.com', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE IF NOT EXISTS `asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_materia` varchar(6) NOT NULL,
  `id_profesor` varchar(9) NOT NULL,
  PRIMARY KEY (`id_asignacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `id_grupo`, `id_materia`, `id_profesor`) VALUES
(1, 2, '2655', '1010'),
(2, 5, '2555', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(4) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `grupo`) VALUES
(1, '2251'),
(5, '2551'),
(2, '2651'),
(3, '2851'),
(4, '2951');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` varchar(6) NOT NULL,
  `nom_materia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nom_materia`) VALUES
(' 2955', 'TECNOLOGÃAS INNOVADORAS'),
('2555', 'TECNOLOGÃAS E INTERFACES DE COMPUTADORAS'),
('2655', 'TALLER DE LEGISLACIÓN INFORMÁTICA'),
('2855', 'DESARROLLO DE APLICACIONES PARA DISPOSITIVOS MÓVILES ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(6) DEFAULT NULL,
  `pregunta` text,
  `opc1` varchar(200) DEFAULT NULL,
  `opc2` varchar(200) DEFAULT NULL,
  `opc3` varchar(200) DEFAULT NULL,
  `opc4` varchar(200) DEFAULT NULL,
  `resp_correcta` int(11) DEFAULT NULL,
  `id_profesor` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_materia`, `pregunta`, `opc1`, `opc2`, `opc3`, `opc4`, `resp_correcta`, `id_profesor`) VALUES
(2, '2655', 'Se explica como el conjunto de normas, principios e instituciones que congregan los valores permanentes, inmutables y eternos de la razÃ³n humana; constituye el ordenamiento modelo universalmente justo.', 'DERECHO SUBJETIVO', 'DERECHO  NATURAL', 'DERECHO VIGENTE', 'NINGUNO DE LOS ANTERIORES', 0, '1010'),
(3, '2655', 'Conjunto de normas integrado como un sistema, por lo cual se le define como el orden legal del estado, al hablar del derecho mexicano se hace referencia al conjunto de normas que regulan la realidad jurÃƒÂ­dica de MÃƒÂ©xico; es una regla jurÃƒÂ­dica que permite o que prohÃƒÂ­be.', 'DERECHO NATURAL', 'DERECHO SUBJETIVO', 'DERECHO OBJETIVO', 'DERECHO VIGENTE', 0, '1010'),
(4, '2655', 'Cuando se habla de fuentes de derecho, nos referimos  a quiÃ©n hace el derecho, de dÃ³nde surge y cÃ³mo se manifiesta en el exterior. En nuestro sistema jurÃ­dico se pueden clasificar las fuentes  del derecho en:', 'Fuentes directas e indirectas', 'Fuentes objetivas y subjetivas', 'Fuentes vigentes ', 'Ninguna de las anteriores', 0, '1010'),
(5, '2655', 'Sistema de normas, principios e instituciones que rigen de manera obligatoria, el actuar social del hombre para alcanzar la justicia la seguridad y el bien comÃºn, a travÃ©s de Ã©l se puede alcanzar la organizaciÃ³n perfecta, la paz en las relaciones y hasta la felicidad.', 'DERECHO POSITIVO', 'DERECHO', 'DERECHO NATURAL', 'MARCO LEGAL', 0, '1010'),
(6, '2655', 'Se le estudia como el sistema de normas jurÃ­dicas promulgadas por el poder pÃºblico, con carÃ¡cter coercitivo en un tiempo y lugar determinados aplicÃ¡ndose a la colectividad, no depende de la aceptaciÃ³n de sus destinatarios sino de la voluntad obligatoria del Estado', 'DERECHO VIGENTE', 'DERECHO PÃšBLICO', 'DERECHO NATURAL', 'DERECHO SOCIAL', 0, '1010'),
(7, '2655', 'Regula la actividad del Estado y de los entes pÃºblicos entre sÃ­, asÃ­ como sus relaciones cuando actÃºan de forma oficial con los particulares.', 'DERECHO POSITIVO', 'DERECHO', 'DERECHO PÃšBLICO', 'DERECHO VIGENTE', 0, '1010'),
(8, '2655', 'Se define como el poder o la facultad con que cuenta una persona para reclamar el cumplimiento de las normas jurÃ­dicas que le favorecen y tutelan, es la contrapartida de una obligaciÃ³n o un deber legales, a cargo de un sujeto jurÃ­dico obligado.', 'DERECHO SUBJETIVO', 'DERECHO PÃšBLICO', 'DERECHO SOCIAL', 'DERECHO VIGENTE', 0, '1010'),
(9, '2655', 'Conjunto de normas jurÃ­dicas que tienen por objeto la regulaciÃ³n de las relaciones entre particulares con diferencias marcadas, procurando la equidad y la justicia social, procurando proteger a las clases econÃ³micamente dÃ©biles', 'DERECHO POSITIVO', 'DERECHO SOCIAL', 'DERECHO NATURAL', 'DERECHO VIGENTE', 0, '1010'),
(10, '2655', 'Es el conjunto de normas jurÃ­dicas que se aplican de manera efectiva en una Ã©poca y lugar determinados, representa el orden jurÃ­dico eficaz y en realidad observado; su creaciÃ³n es exclusiva del estado como exigencia del orden, seguridad y libertad', 'DERECHO SUBJETIVO', 'DERECHO  NATURAL', 'DERECHO POSITIVO', 'DERECHO VIGENTE', 0, '1010'),
(11, '2655', 'Regula las relaciones entre particulares, o de Ã©stos y del Estado y los organismos pÃºblicos cuando actÃºan de forma privada', 'DERECHO PRIVADO', 'DERECHO PÃšBLICO', 'DERECHO PÃšBLICO', 'DERECHO VIGENTE', 0, '1010'),
(12, '2655', 'Es una  rama de las ciencias jurÃ­dicas que considera a la informÃ¡tica como instrumento y objeto de estudio del derecho.', 'DERECHO INFORMÃTICO', 'LEGISLACIÃ“N INFORMÃTICA', 'DERECHO DE LA INFORMACIÃ“N', 'INFORMÃTICA JURÃDICA', 0, '1010'),
(13, '2655', 'Se refiere a un conjunto de reglas jurÃ­dicas de carÃ¡cter preventivo y correctivo derivadas del uso de la informÃ¡tica.', 'INFORMÃTICA JURÃDICA', 'LEGISLACIÃ“N INFORMÃTICA', 'DERECHO INFORMÃTICO', 'NINGUNO DE LOS ANTERIORES', 0, '1010'),
(14, '2655', 'Mencione dentro de los fundamentos del derecho a la informaci&oacute;n, qu&eacute; art&iacute;culo resguarda la libertad de pensamiento y de expresi&oacute;n.', 'ART.13', 'ART.10', 'ART.42', 'ART.19', 0, '1010'),
(16, '2555', 'En este fen&oacute;meno las ondas de radio est&aacute;n expuestas a sufrir una desviaci&oacute;n en su trayectoria cuando atraviesan de un medio a otro con densidad distinta, en comunicaciones este efecto sucede cuando las ondas electromagn&eacute;ticas atraviesan las distintas capas de la atm&oacute;sfera variando su trayectoria en un cierto &aacute;ngulo', 'REFLEXI&Oacute;N', 'DIFRACCI&Oacute;N', 'REFRACCI&Oacute;N', 'NINGUNA DE LAS ANTERIORES', 0, '2'),
(17, '2555', 'Para realizar este tipo de propagaci&oacute;n es necesario que exista una l&iacute;nea de vista entre el emisor y el receptor. En este tipo de comunicaci&oacute;n se manejan frecuencias por encima de los 50Mhz, dado que las frecuencias altas se ven menos afectadas por fen&oacute;menos atmosf&eacute;ricos, se utiliza generalmente para la televisi&oacute;n y la radio FM.', 'PROPARACI&Oacute;N POR ONDA DIRECTA', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR ONDA TERRESTRE', 'NINGUNA DE LAS ANTERIORES', 0, '2'),
(18, '2555', '. Este fen&oacute;meno ocurre cuando las ondas de radio atraviesan alguna masa de electrones o peque&ntilde;as gotas de agua en &aacute;reas suficientemente grandes; en comunicaciones de radio la se&ntilde;al generada depende de  la comparaci&oacute;n del tama&ntilde;o de la longitud de onda de la se&ntilde;al y el di&aacute;metro de la gota de lluvia. ', 'DIFRACCI&Oacute;N', 'DISPERSI&Oacute;N', 'REFRACCI&Oacute;N', 'REFLEXI&Oacute;N', 0, '2'),
(19, '2555', 'En este tipo propagaci&oacute;n  las ondas de radio siguen la curvatura de la tierra por la cual la se&ntilde;al de RF es capaz de alcanzar grandes distancias antes de que la se&ntilde;al sea absorbida por la tierra, sorteando edificios, monta&ntilde;as,  etc. es com&uacute;nmente utilizada  por las radiodifusoras de media onda y de onda larga', 'PROPAGACI&Oacute;N POR ONDA TERRESTRE', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR ONDA DIFRACTADA', 'PROPAGACI&Oacute;N POR DIFRACCI&Oacute;N METE&Oacute;RICA', 0, '2'),
(20, '2555', 'Se puede entender  este fen&oacute;meno como el esparcimiento de las ondas en los l&iacute;mites de una superficie, esto quiere decir que para que exista tiene que haber un obst&aacute;culo, as&iacute; como este fen&oacute;meno permite que parte de la se&ntilde;al llegue al otro lado del objeto. ', 'DISPERSI&Oacute;N', 'REFRACCI&Oacute;N', 'DIFRACCI&Oacute;N', 'REFLEXI&Oacute;N', 0, '2'),
(21, '2555', 'En este tipo de propagaci&oacute;n influye la atm&oacute;sfera como reflector y esto a su vez ocurre en la ion&oacute;sfera, cuando esta capa se encuentra el&eacute;ctricamente cargada hace que la se&ntilde;al comience a cambiar en un cierto &aacute;ngulo, esto lo hace sucesivamente hasta que se realiza la reflexi&oacute;n total y la se&ntilde;al regresa a la tierra', 'PROPAGACI&Oacute;N POR ONDA REFRACTADA O IONOSF&Eacute;RICA', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR ONDA TERRESTRE', 'PROPAGACI&Oacute;N POR DIFRACCI&Oacute;N METE&Oacute;RICA', 0, '2'),
(22, '2555', 'Este fen&oacute;meno ocurre cuando las ondas de radio atraviesan las diversas capas de la atm&oacute;sfera, desde la trop&oacute;sfera hasta la ion&oacute;sfera y si los &iacute;ndices de refractividad de cada una de estas capas son muy diferentes se puede producir de manera total siendo las frecuencias VHF y superiores las m&aacute;s propensas a esta desviaci&oacute;n de trayectoria.', 'DISPERSI&Oacute;N', 'DIFRACCI&Oacute;N', 'REFLEXI&Oacute;N', 'REFRACCI&Oacute;N', 0, '2'),
(23, '2555', 'En este tipo de propagaci&oacute;n la ion&oacute;sfera se alimenta por el frotamiento de los meteoritos que vienen a gran velocidad del espacio exterior; este tipo de transmisi&oacute;n se utiliza para comunicarse a corta distancia y s&oacute;lo funciona a horas y condiciones precisas', 'PROPAGACI&Oacute;N POR ONDA TERRESTRE', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR DIFRACCI&Oacute;N METE&Oacute;RICA', 'PROPAGACI&Oacute;N POR ONDA DISPERSA', 0, '2'),
(24, '2555', 'Este tipo de propagaci&oacute;n se produce cuando las ondas emitidas son superiores a los 30Mhz, debido a su frecuencia la se&ntilde;al no ser&aacute; reflejada por la ion&oacute;sfera, pero si ser&aacute; difractada, por lo que una peque&ntilde;a parte de la se&ntilde;al llegar&aacute; a la tierra y s&oacute;lo podr&aacute; ser captada por un receptor especialmente sensible.', 'PROPAGACI&Oacute;N POR DIFRACCI&Oacute;N IONOSF&Eacute;RICA', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR ONDA TERRESTRE', 'PROPAGACI&Oacute;N POR ONDA DISPERSA', 0, '2'),
(25, '2555', 'Son los dos tipos de propagaci&oacute;n por reflexi&oacute;n m&aacute;s all&aacute; de la atm&oacute;sfera.', 'PROPAGACI&Oacute;N POR REFLEXI&Oacute;N DE LA LUNA Y PROPAGACI&Oacute;N POR SAT&Eacute;LITES ARTIFICIALES', 'PROPAGACI&Oacute;N POR L&Iacute;NEA DIRECTA', 'PROPAGACI&Oacute;N POR DIFRACCI&Oacute;N METE&Oacute;RICA', 'PROPAGACI&Oacute;N POR ONDA DISPERSA', 0, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasc`
--

CREATE TABLE IF NOT EXISTS `preguntasc` (
  `id_preguntac` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(6) DEFAULT NULL,
  `preguntac` varchar(100) DEFAULT NULL,
  `respuesta` varchar(80) DEFAULT NULL,
  `id_profesor` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_preguntac`),
  KEY `id_materia_idz` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `preguntasc`
--

INSERT INTO `preguntasc` (`id_preguntac`, `id_materia`, `preguntac`, `respuesta`, `id_profesor`) VALUES
(1, '2655', 'Conjunto de derechos que corresponden a los autores y a otros titulares respecto obras y prestacione', 'PROPIEDAD INTELECTUAL', '1010'),
(2, '2655', 'Los programas de c&oacute;mputo se pueden considerar como el conjunto de procedimientos o reglas que', 'ASPECTO T&Eacute;CNICO', '1010'),
(3, '2655', 'En este tipo de implicaci&oacute;n la constante lucha por dominar el mercado de la industria inform&', 'PILLAJE', '1010'),
(4, '2655', 'Son aquellos programas que se realizan para satisfacer las necesidades de los usuarios y que permite', 'PROGRAMAS OBJETO', '1010'),
(5, '2655', 'En este tipo de implicaci&oacute;n la misma falta de protecci&oacute;n provoca que las empresas crea', 'DESPILFARRO', '1010'),
(6, '2655', 'Este tipo de programas est&aacute;n ligados al funcionamiento mismo de la m&aacute;quina, guardando ', 'PROGRAMAS FUENTE', '1010'),
(7, '2655', 'Se refiere a los atributos legales que tiene los autores sobre las obras art&iacute;sticas y literar', 'DERECHOS DE AUTOR', '1010'),
(8, '2655', '&Eacute;ste tipo de implicaci&oacute;n se ha dado bajo la forma de un resguardo bajo secreto de los ', 'INTENTOS DE SOLUCI&Oacute;N', '1010'),
(9, '2655', 'Es la ciencia y arte de escribir mensajes en forma cifrada o en c&oacute;digo como parte de un campo', 'CRIPTOGRAF&Iacute;A', '1010'),
(10, '2655', 'Consiste en la adquisici&oacute;n, la revelaci&oacute;n, la transferencia o la utilizaci&oacute;n de', 'ESPIONAJE INFORM&Aacute;TICO', '1010'),
(11, '2655', 'El derecho de petici&oacute;n, desde el punto de vista del inter&eacute;s que con &eacute;l se persi', 'INTER&Eacute;S GENERAL E INTER&Eacute;S PARTICULAR', '1010'),
(12, '2655', 'Son las tres facultades que comprenden el derecho a la informaci&oacute;n', 'INVESTIGAR, RECIBIR Y DIFUNDIR INFORMACI&Oacute;N', '1010'),
(13, '2655', 'Hace referencia a la planificaci&oacute;n mediante normas para un desarrollo adecuado de la inform&a', 'POL&Iacute;TICA INFORM&Aacute;TICA', '1010'),
(14, '2655', 'Se refiere a un conjunto de reglas jur&iacute;dicas de car&aacute;cter preventivo y correctivo deriv', 'LEGISLACI&Oacute;N INFORM&Aacute;TICA', '1010'),
(15, '2655', 'Dependiendo el n&uacute;mero de firmantes de la petici&oacute;n &eacute;sta puede ser:', 'DE PETICI&Oacute;N &Uacute;NICA O PETICI&Oacute;N M&Uacute;LTIPLE', '1010'),
(16, '2555', 'Son algunos de los &aacute;mbitos de aplicaci&oacute;n de los sensores actualmente:', 'Gesti&oacute;n de confort, iluminaci&oacute;n,  contra incendios, seguridad, con', '2'),
(17, '2555', 'Son las tres funciones que desempe&ntilde;a el puerto de sonido en cada uno de los conectores integr', 'Line in, line out y microphone', '2'),
(18, '2555', 'Es la forma en que se encuentra clasificado el  puerto DVI de acuerdo a la se&ntilde;al que admite', 'DVI-D, DVI-A y DVI-I', '2'),
(19, '2555', 'Este tipo de sensores &oacute;pticos tienen el emisor de luz y el detector muy pr&oacute;ximos y ded', 'Sensores basados en la reflexi&oacute;n', '2'),
(20, '2555', 'Son los puertos de video modernos que existen y se utilizan actualmente', 'DisplayPort, HDMI, S-Video,DVI', '2'),
(21, '2555', 'Es el tipo de conector que se utiliza para la terminal del puerto de audio:', 'Pin out Jack 3.5mm', '2'),
(22, '2555', 'Este tipo se sensores &oacute;pticos tienen la fuente a cierta distancia enfrente del sensor y solo ', 'Sensores modo barrera', '2'),
(23, '2555', 'Es un dispositivo capaz de transformar magnitudes f&iacute;sicas, qu&iacute;micas, biol&oacute;gicas', 'Sensor', '2'),
(24, '2555', 'Este tipo de sensor es un transductor que detecta objetos o se&ntilde;ales que se encuentran cerca d', 'Sensor de proximidad', '2'),
(25, '2555', 'Se componen de dos elementos principales, un sensor y un emisor de luz, pudiendo estar este &uacute;', 'Sensores &oacute;pticos', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasfv`
--

CREATE TABLE IF NOT EXISTS `preguntasfv` (
  `id_preguntafv` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(6) DEFAULT NULL,
  `preguntafv` varchar(100) DEFAULT NULL,
  `respuestafv` varchar(1) DEFAULT NULL,
  `id_profesor` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_preguntafv`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `preguntasfv`
--

INSERT INTO `preguntasfv` (`id_preguntafv`, `id_materia`, `preguntafv`, `respuestafv`, `id_profesor`) VALUES
(1, '2655', 'La informaci&oacute;n debe ser concebida como un bien y no como una mercanc&iacute;a.', '1', '1010'),
(2, '2655', 'Una de las principales problem&aacute;ticas por las cu&aacute;les no se ha podido sistematizar el de', '1', '1010'),
(3, '2655', 'Dentro de la conceptualizaci&oacute;n del derecho de la informaci&oacute;n el conjunto de normas jur', '0', '1010'),
(4, '2655', 'Las respuestas a las peticiones de consulta, deben darse dentro del t&eacute;rmino de treinta d&iacu', '1', '1010'),
(5, '2655', '. El car&aacute;cter de reservado de un documento no le es oponible a las autoridades que lo solicit', '1', '1010'),
(6, '2655', 'El hecho de haber sido recibida una petici&oacute;n por funcionario que no es competente  lo exime d', '0', '1010'),
(7, '2655', 'La manera formal de dar  respuesta a una petici&oacute;n es adoptar la decisi&oacute;n mediante acto', '1', '1010'),
(8, '2655', 'Las peticiones pueden hacerse por cualquier medio eficaz  para comunicar el pensamiento: por escrito', '1', '1010'),
(9, '2655', 'El Art&iacute;culo 18 enuncia que: &ldquo;Los funcionarios y empleados p&uacute;blicos respetar&aacu', '0', '1010'),
(10, '2655', 'Algunos de los antecedentes del derecho de petici&oacute;n son al art.37 del Decreto Constitucional ', '1', '1010'),
(11, '2555', 'SPP, PS/2, EPP  Y EPC son los cuatro tipos de puerto paralelo que existen', '0', '2'),
(12, '2555', 'Las principales problem&aacute;ticas que enfrentaba el puerto LPT radicaban en la incompatibilidad d', '0', '2'),
(13, '2555', 'El puerto LPT maneja un conjunto de 4 l&iacute;neas de control, 5 l&iacute;neas de estado, 8 l&iacut', '1', '2'),
(14, '2555', 'Dentro de las caracter&iacute;sticas mec&aacute;nicas del puerto RS-232 el conector macho est&aacute', '1', '2'),
(15, '2555', 'Cuando el puerto LPT  requiere la acci&oacute;n de la CPU lanza una interrupci&oacute;n.', '0', '2'),
(16, '2555', 'Algunas de las principales caracter&iacute;sticas del puerto USB es que permiten la arquitectura Plu', '1', '2'),
(17, '2555', 'Las transferencias de volumen en el puerto USB no son transferencias peri&oacute;dicas, son paquetes', '1', '2'),
(18, '2555', 'Las l&iacute;neas el&eacute;ctricas que maneja el puerto USB 3.0 son 4, las centrales conducen datos', '0', '2'),
(19, '2555', 'Al igual que el puerto USB , los nuevos est&aacute;ndares del puerto LPT permiten la facilidad de la', '0', '2'),
(20, '2555', 'En un enlace sin l&iacute;nea de vista se obtiene una mayor facilidad de uso, mayor movilidad y robu', '1', '2'),
(21, '2555', 'ZigBee maneja tres diferentes topolog&iacute;as estrella, &aacute;rbol y red malla, donde siempre ha', '0', '2'),
(22, '2555', 'ZigBee tiene una velocidad de transmisi&oacute;n de 250 Mbps y un rango de cobertura de 10 a  75 met', '0', '2'),
(23, '2555', 'En los sistemas infrarrojos los enlaces dirigidos emplean emisores y receptores altamente omnidirecc', '0', '2'),
(24, '2555', 'Para ZigBee entre m&aacute;s nodos existan dentro de una red, mayor n&uacute;mero de rutas existir&a', '1', '2'),
(25, '2555', 'Seg&uacute;n su papel en la red  los dispositivos ZigBee se clasifican en: Coordinador ZigBee, Route', '1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasr`
--

CREATE TABLE IF NOT EXISTS `preguntasr` (
  `id_preguntar` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(6) DEFAULT NULL,
  `concepto` varchar(100) DEFAULT NULL,
  `opcion` varchar(255) NOT NULL,
  `respuesta` varchar(35) DEFAULT NULL,
  `id_profesor` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_preguntar`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `preguntasr`
--

INSERT INTO `preguntasr` (`id_preguntar`, `id_materia`, `concepto`, `opcion`, `respuesta`, `id_profesor`) VALUES
(1, '2655', 'Son todos aquellos elementos que forman el sistema en cuanto al hardware, ya sea la unidad central d', '6', 'OPTANTE, COMPRA-VENTA Y PLAZO DEL E', '1010'),
(2, '2655', 'Es aquella cuyo objeto sea un bien o un servicio inform&aacute;tico o ambos o que una de las prestac', '8', 'CONTRATO DE PRESTACI&Oacute;N DE SE', '1010'),
(3, '2655', 'Los tipos de contrato inform&aacute;tico pueden darse respecto a:', '4', 'CONTRATO DE HARDWARE', '1010'),
(4, '2655', 'Aqu&eacute;llos en los que hay que conceptuar como hardware todo aquello que, f&iacute;sicamente, fo', '2', 'CONTRATO INFORM&Aacute;TICO', '1010'),
(5, '2655', 'Cuando sea un contrato en el que el suministrador, o vendedor en  este caso, se obliga a entregar un', '5', 'CONTRATO DE VENTA', '1010'),
(6, '2655', 'Son los tres requisitos del contrato de opci&oacute;n de compra', '1', 'BIENES INFORM&Aacute;TICOS ', '1010'),
(7, '2655', 'Consiste en el compromiso de una de las partes, en nuestro caso el suministrador del bien o servicio', '10', 'ART. 211 BIS', '1010'),
(8, '2655', 'Aqu&eacute;llos en los que incluir&iacute;amos an&aacute;lisis, especificaciones, horas m&aacute;qui', '7', 'CONTRATO DE EJECUCI&Oacute;N DE OBR', '1010'),
(9, '2655', 'Se caracteriza porque una parte entrega a otra el bien inform&aacute;tico para que use  durante un t', '3', 'AL OBJETO Y AL NEGOCIO JUR&Iacute;D', '1010'),
(10, '2655', 'A quien revele, divulgue o utilice indebidamente o en perjuicio de otro, informaci&oacute;n o im&aac', '9', 'Contrato de pr&eacute;stamo', '1010'),
(11, '2655', 'Es la fuente del derecho formal m&aacute;s importante y representa las etapas que integran  el proce', '7', 'DOCTRINA', '1010'),
(12, '2655', 'Es la interpretaci&oacute;n del derecho sustentada en los tribunales por medio de sus sentencias y d', '8', 'PRINCIPIOS GENERALES DEL DERECHO', '1010'),
(13, '2655', 'Es la pr&aacute;ctica repetida de ciertos actos aceptados por la colectividad como jur&iacute;dicame', '6', 'REGLAMENTOS ', '1010'),
(14, '2655', 'Son acuerdos celebrados entre los estados con el fin de regular sus relaciones rec&iacute;procas en ', '5', 'CONSTITUCI&Oacute;N POL&Iacute;TICA', '1010'),
(15, '2655', 'Conjunto de reglas fundamentales que rigen la organizaci&oacute;n y las relaciones de los poderes p&', '4', 'TRATADOS INTERNACIONALES', '1010'),
(16, '2655', 'Conjunto de normas obligatorias de car&aacute;cter general emanadas del poder Ejecutivo para el cump', '3', 'COSTUMBRE', '1010'),
(17, '2655', 'Conjunto de teor&iacute;as y estudios cient&iacute;ficos que se realizan con el prop&oacute;sito de ', '1', 'PROCEDIMIENTO LEGISLATIVO', '1010'),
(18, '2655', 'Son los valores u orientaciones universales en los cuales se apoya el juzgador para resolver  las co', '2', 'JURISPRUDENCIA', '1010'),
(19, '2655', 'Son las caracter&iacute;sticas de las normas jur&iacute;dicas', '10', 'HETER&Oacute;NOMAS, EXTERNAS, UNILA', '1010'),
(20, '2655', '.Son las caracter&iacute;sticas de las normas convencionales', '9', 'HETER&Oacute;NOMAS, EXTERIORES, BIL', '1010'),
(21, '2555', 'Diferencia entre los l&iacute;mites de medida', '10', 'SENSIBILIDAD', '2'),
(22, '2555', 'Patr&oacute;n conocido de la variable medida que se aplica mientras se observa la se&ntilde;al de me', '8', 'PRECISI&Oacute;N', '2'),
(23, '2555', 'Diferencia entre el valor medido y el valor real', '6', 'FIABLIDAD', '2'),
(24, '2555', 'Concordancia entre el valor medido y el valor real', '4', 'EXACTITUD', '2'),
(25, '2555', 'Relaci&oacute;n entre la salida y la variable medida', '2', 'CALIBRACI&Oacute;N', '2'),
(26, '2555', 'Probabilidad de no error', '1', 'AMPLITUD', '2'),
(27, '2555', 'Diferente recorrido de la medida al aumentar y disminuir esta', '3', 'ERROR', '2'),
(28, '2555', 'Dispersi&oacute;n de los valores de salida', '5', 'FACTOR DE ESCALA', '2'),
(29, '2555', 'Perturbaci&oacute;n no deseada que modifica el valor', '7', 'HIST&Eacute;RESIS', '2'),
(30, '2555', 'Relaci&oacute;n entre la salida y el cambio en la variable medida', '9', 'RUIDO', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id_resultado` int(6) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(9) DEFAULT NULL,
  `calificacion` double DEFAULT NULL,
  `respuestas` text,
  `id_materia` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_resultado`),
  KEY `calificacion` (`calificacion`),
  KEY `id_materia` (`id_materia`),
  KEY `matricula` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `matricula`, `calificacion`, `respuestas`, `id_materia`) VALUES
(1, '201023704', 0, '<table width="600" border="0" align="center" style="background:rgba(179,223,225,0.79)">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas de opciÃ³n mÃºltiple</font></p></td>\r\n    </tr>\r\n    <tr>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Pregunta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Respuesta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Tu Respuesta</font></td>\r\n    </tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">1</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">4</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">5</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">6</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">7</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">8</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">9</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">10</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n	</tr>\r\n  </tbody>\r\n</table><br/><table width="600" border="0" align="center" style="background:rgba(240,173,78,0.70)">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas de falso y verdadero</font></p></td>\r\n    </tr>\r\n    <tr>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Pregunta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Respuesta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Tu Respuesta</font></td>\r\n    </tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">1</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">4</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">5</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">6</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">7</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">8</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">9</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n    <tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">10</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n  </tbody>\r\n</table><br/><table width="600" border="0" align="center" style="background:rgba(92,184,92,0.70)">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas de relaciÃ³n de columnas</font></p></td>\r\n    </tr>\r\n    <tr>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Pregunta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Respuesta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Tu Respuesta</font></td>\r\n    </tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">1</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">4</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">5</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">6</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">7</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">8</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">9</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">10</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n  </tbody>\r\n</table><br/><table width="600" border="0" align="center" style="background:rgba(217,83,79,0.70)">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan="3" align="center"><p><font face="Impact" color="#323232" size="3">Aciertos en preguntas abiertas</font></p></td>\r\n    </tr>\r\n    <tr>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Pregunta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Respuesta</font></td>\r\n      <td width="200" align="center"><font face="Impact" color="#323232" size="3">Tu Respuesta</font></td>\r\n    </tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">1</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">2</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">3</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">4</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">5</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">6</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">7</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">8</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">9</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n	<tr>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">10</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3">0</font></td>\r\n      <td align="center" width="200"><font face="Impact" color="#323232" size="3"></font></td>\r\n	</tr>\r\n\r\n  </tbody>\r\n</table><br/>', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `matricula` varchar(9) NOT NULL,
  `nom_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`matricula`, `nom_usuario`, `password`, `tipo_usuario`) VALUES
('050883', 'victor', 'victor', '3'),
('1010', 'isve', '1010', '1'),
('2', 'verenice', '2', '1'),
('201023704', 'MIGUEL ANGEL', '201023704', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
