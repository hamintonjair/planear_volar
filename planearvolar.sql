-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2024 a las 18:59:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planearvolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acercade`
--

CREATE TABLE `acercade` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acercade`
--

INSERT INTO `acercade` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Planera Volar', 'hola\r\nAcerca de Nosotros\" que incluye los campos Nombre, Descripción (textarea) e Imagen. Este formulario también incluye la funcionalidad para cargar una imagen y habilitar o deshabilitar los campos de entrada para edición, similar al formulario de configuración que hemos visto antes.', '1716899011_8ef372febbd2df644e8b.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

CREATE TABLE `aplicaciones` (
  `id` int(11) NOT NULL,
  `vacante_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `estudio` varchar(255) NOT NULL,
  `profesion` varchar(255) NOT NULL,
  `anio_inicio` date NOT NULL DEFAULT '1970-01-01',
  `anio_final` date NOT NULL DEFAULT '1970-01-01',
  `fecha_nacimiento` date NOT NULL DEFAULT '1970-01-01',
  `ciudad` varchar(255) NOT NULL,
  `otros_estudios` text DEFAULT NULL,
  `idiomas` varchar(255) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Aplicado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aplicaciones`
--

INSERT INTO `aplicaciones` (`id`, `vacante_id`, `nombre`, `apellidos`, `telefono`, `direccion`, `correo`, `curriculum`, `created_at`, `estudio`, `profesion`, `anio_inicio`, `anio_final`, `fecha_nacimiento`, `ciudad`, `otros_estudios`, `idiomas`, `estado`) VALUES
(4, 2, 'Horacio', 'Palacios Palacios', '+573124943527', 'Carrera 12 #46-136 barrio Buenos Aires', 'hpalacios@hotmail.com', '1717127320_7bd9c315262343eb589e.pdf', '2024-05-30 22:48:40', 'Bachiller academico', 'Ingeniero de sistemas', '2021-02-02', '2024-12-02', '2013-02-13', 'Chocó-Quibdo', 'Diplomado en Desarrollo web', 'Español, Ingles', 'En proceso'),
(5, 1, 'Yuber', 'Palacios ', '+573124943527', 'Carrera 12 #46-136 barrio Buenos Aires', 'mafia00796@hotmail.com', '1717188089_12f0c66f54f5066f9731.pdf', '2024-05-31 15:41:29', 'Bachiller academico', 'Ingeniero de sistemas', '2024-02-13', '2024-02-27', '2024-05-07', 'Chocó-Quibdo', 'Diplomado en Desarrollo web', 'Español', 'No continua'),
(12, 1, 'Haminton', 'Mena Mena', '+573124943527', 'Carrera 12 #46-136 barrio Buenos Aires', 'hamintonjair@gmail.com', '1717359736_a3c9e9b8a218c0c4c618.pdf', '2024-06-02 15:22:16', 'Bachiller academico', 'Ingeniero de sistemas', '2021-02-02', '2024-11-19', '2024-05-28', 'San Francisco de Quibdo', 'Diplomado en Desarrollo web', 'Español', 'Aplicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `cedula`, `telefono`, `direccion`, `correo`, `estado`) VALUES
(1, 'Raul', 'Garcia Mena', 1234567890, '3124873782', 'Calle 46 Barrio Buenos Aires', 'raul@gmail.com', 1),
(2, 'Digna Luz', 'Cordoba', 123457689, '3124943456', 'Calle 46 Barrio Buenos Aires', 'digna@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre_empresa`, `correo`, `telefono`, `ciudad`, `direccion`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`) VALUES
(1, 'Planear Volar', 'planearvolar@gmail.com', '3124943527', 'San Francisco de Quibdo', 'Calle 46 Barrio Buenos Aires', 'https://www.facebook.com/DeveloperJojama?mibextid=ZbWKwL', 'Instagram', '', 'linkedln', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `detalles` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id`, `nombre`, `municipio`, `detalles`, `foto`, `estado`) VALUES
(5, 'Quibdo', '32 municipios', 'Explora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', '1717291250_d097e883159d15bbb228.jpg', 1),
(6, 'Bogotá', '36 municipios', 'Explora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', '1717291078_7ff280087f6b36fcf791.jpg', 1),
(7, 'Medellin', '34 municipios', 'Explora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', '1717291371_d91876a09c23dbc66e2f.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_permisos`
--

CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_permisos`
--

INSERT INTO `detalle_permisos` (`id`, `id_usuarios`, `id_permisos`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 3, 2),
(17, 3, 4),
(18, 3, 6),
(19, 3, 7),
(20, 3, 8),
(21, 3, 10),
(22, 3, 11),
(23, 3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `reserva_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `nombre`, `facebook`, `instagram`, `foto`, `estado`) VALUES
(1, 'Jorge Luiz Córdoba Garces', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290112_4ca0089aca1cb08535d4.jpg', 1),
(2, 'Carlos Martinez', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290548_364bffa2eeec48db144e.jpg', 1),
(4, 'Maria Carmen Palacios', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290263_3a615dadf1c83d092769.jpg', 1),
(5, 'Luisa Fernanda Galindo', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290304_ed64a575ac1af0f36e60.jpg', 1),
(6, 'Haminton Jair Martinez', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290351_e0e09d526784e3933db4.jpg', 1),
(7, 'Ricardo Lemus Lemus', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290430_c992cf5d978c39dc0bd0.jpg', 1),
(8, 'Erika Ruiz Palacios', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290560_add0e8dc7c073764962b.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Recibido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `asunto`, `mensaje`, `estado`) VALUES
(1, 'Juan Carlos Perea', 'juanc@hotmail.com', 'consultar', 'prueba', 'Contactado'),
(2, 'Johan Saucedo', 'hpalacios@hotmail.com', 'prueba', 'prueba', 'Contactado'),
(3, 'Johan Saucedo', 'leison@miuniclaretiana.edu.co', 'consulta', 'hola como esta hola como esta hola como esta hola como esta', 'Contactado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descuento` varchar(50) NOT NULL,
  `dirigido` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'No Aplicado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `nombre`, `descuento`, `dirigido`, `descripcion`, `estado`) VALUES
(1, 'Mega Oferta', '20% OFF', 'Para luna de Miel', 'Esta oferta incluye derecho a 3 días y 3 noches en el Hotel 5 estrella, ubicado en el Departamento del Chocó.', 'No Aplicado'),
(2, 'Ultrra Oferta', '20% OFF', 'Para las Quinceañeras', 'Podrán disfrutar de un espectacular lugar, tiene piscina, un lugar para recrear y mucho más.', 'Aplicado'),
(4, 'Oferta', '40% OFF', 'Para familias', 'Disfrutaras de los momentos más hermosos y bonitos al pasarlo con tu familia.', 'No Aplicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL,
  `nombre_paquete` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `tiempo_estadia` varchar(50) NOT NULL,
  `cant_personas` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `nombre_paquete`, `ciudad`, `tiempo_estadia`, `cant_personas`, `descripcion`, `costo`, `foto`, `estado`) VALUES
(1, 'Paquete Familiar', 'Cali', '5 días', '8 personas', '\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.\r\nDESTINOS\r\nExplora los Mejores Destinos\r\n\r\n', 350000.00, '1717290719_edbdc46e71b41074dd32.jpg', 1),
(3, 'Paquete Reconciliación', 'Istmina', '5 días', '3 personas', 'hola Bienvenidos al Paquete Turístico Reconciliación\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 650000.00, '1717292465_c24b68c0b839527cfe7b.jpg', 1),
(7, 'Paquete luna de miel', 'Quibdo', '3 dias', '2 personas', 'hola Bienvenidos al Paquete Turístico de [Nombre del Paquete]\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 450000.00, '1717290965_e2bf16ab52b145f0d6aa.jpg', 1),
(8, 'Paquete Quinceañeras', 'Cali', '7 dias', '15 personas', 'hola Bienvenidos al Paquete Turístico de Quinceañera\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 750000.00, '1717292145_2a3675e893e47323c0f2.jpg', 1),
(9, 'Paquete Plus', 'Quibdo y Bogota', '4 dias', '3 personas', 'hola Bienvenidos al Paquete Turístico de Plus\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 950000.00, '1717292224_bfa990097cf22390c006.jpg', 1),
(10, 'Paquete Max Steel', 'Cartagena', '3', '3', 'hola Bienvenidos al Paquete Turístico Max Steel\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\nExcursiones guiadas: Participa en excursiones guiadas a los principales atractivos turísticos de [Nombre del Destino], incluyendo [Lista de lugares turísticos destacados].\r\nActividades recreativas: Acceso a actividades recreativas como [Lista de actividades, por ejemplo, senderismo, deportes acuáticos, visitas a museos, etc.].\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 250000.00, '1717292315_876fb4ec2cdb6e5fe4cf.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 'Acerca de nosotros'),
(2, 'Aplicados a vacantes'),
(3, 'Configuración'),
(4, 'Clientes'),
(5, 'Crear Reservas'),
(6, 'Destinos'),
(7, 'Guía de viajes'),
(8, 'Mensajes'),
(9, 'Ofertas'),
(10, 'Paquetes turísticos'),
(11, 'Reservas'),
(12, 'Solicitudes de vuelos'),
(13, 'Testimonios'),
(14, 'Usuarios'),
(15, 'Vacantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `destino` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Contactar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre`, `apellidos`, `telefono`, `correo`, `destino`, `estado`) VALUES
(1, 'Maria', 'Mena', 2147483647, 'mafia00796@hotmail.com', 5, 'Contactado'),
(2, 'Juan Carlos', 'Palacios', 2147483647, 'mafia00796@hotmail.com', 5, 'Contactado'),
(3, 'Tatiana', 'Gamboa', 2147483647, 'mafia00796@hotmail.com', 5, 'Contactado'),
(4, 'Luz Leiby', 'Perea', 2147483647, 'mafia00796@hotmail.com', 5, 'Contactar'),
(5, 'Yoyler', 'Ruiz', 2147483647, 'mafia00796@hotmail.com', 6, 'Contactar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_turistica`
--

CREATE TABLE `reservas_turistica` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `paquete_id` int(11) NOT NULL,
  `guia_id` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_turistica`
--

INSERT INTO `reservas_turistica` (`id`, `cliente_id`, `paquete_id`, `guia_id`, `fecha_reserva`, `costo`, `estado`) VALUES
(1, 2, 1, 1, '2024-05-31', 150000.00, 'Reservado'),
(2, 2, 1, 2, '2024-06-01', 350000.00, 'Reservado'),
(3, 2, 9, 0, '2024-06-12', 350000.00, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_vuelos`
--

CREATE TABLE `reservas_vuelos` (
  `id` int(11) NOT NULL,
  `desde` varchar(255) DEFAULT NULL,
  `fecha_ida` date DEFAULT NULL,
  `fecha_regreso` date DEFAULT NULL,
  `cantidad_pasajeros` varchar(30) NOT NULL,
  `hacia` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Contactar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_vuelos`
--

INSERT INTO `reservas_vuelos` (`id`, `desde`, `fecha_ida`, `fecha_regreso`, `cantidad_pasajeros`, `hacia`, `nombre`, `apellido`, `cedula`, `correo`, `telefono`, `estado`) VALUES
(1, 'quibdo', '2024-06-05', '2024-06-07', '1', 'bogota', 'Haminton', 'Mena ', '64747458', 'prueba@gmail.com', '3124943527', 'Contactar'),
(2, 'pasto', '2024-06-13', '2024-06-14', '1', 'cali', 'Horacio', 'Palacios', '7957896', 'hpalacios@hotmail.com', '3124943527', 'Contactado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `nombre_cliente`, `profesion`, `descripcion`, `foto`, `estado`, `fecha`) VALUES
(1, 'Juan Carlos Vargas', 'Ingeniero de sistema', 'Ahora tienes un modelo VacanteModel que interactúa con la tabla vacantes en tu base de datos. Este modelo proporciona una interfaz para realizar operaciones CRUD en las vacantes. Con este modelo, el controlador puede realizar estas operaciones de manera eficiente.', '1717291561_67399fa476f75efb09e9.jpg', 1, '2024-05-31'),
(2, 'Carlos Palacion', 'Estudiante', 'Ahora tienes un modelo Vacante Model que interactúa con la tabla vacantes en tu base de datos. Este modelo proporciona una interfaz para realizar operaciones CRUD en las vacantes. Con este modelo, el controlador puede realizar estas operaciones de manera eficiente.', '1717291480_b41cd2d3bc18aa289406.jpg', 1, '2024-05-31'),
(4, 'Laura Lagarejo Garces', 'Estudiante', 'Ahora tienes un modelo Vacante Model que interactúa con la tabla vacantes en tu base de datos. Este modelo proporciona una interfaz para realizar operaciones CRUD en las vacantes. Con este modelo, el controlador puede realizar estas operaciones de manera eficiente.', '1717291543_6da022a2bb6e8f61b812.jpg', 1, '2024-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `cedula`, `telefono`, `direccion`, `correo`, `rol`, `clave`, `fecha_registro`, `estado`) VALUES
(1, 'Yubeimar', 'Perea Gamboa', 78675787, 2147483647, 'Calle 46 Barrio Buenos Aires', 'admin@gmail.com', 'Administrador', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2024-05-18 22:09:15', 1),
(3, 'Carlos', 'Mena Mena', 1077367283, 2147483647, 'Carrera 12 #46-136 barrio Buenos Aires', 'operador@gmail.com', 'Operador', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2024-05-20 15:04:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha_publicacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`id`, `nombre`, `ubicacion`, `empresa`, `descripcion`, `estado`, `fecha_publicacion`) VALUES
(1, 'Desarrollador web', 'Quibdo - Chocó', 'Rentic', 'Buscamos un desarrollador web entusiasta y apasionado por la tecnología para unirse a nuestro equipo. Como desarrollador web, serás responsable de diseñar, desarrollar y mantener sitios web y aplicaciones web dinámicas utilizando las últimas tecnologías y metodologías.\r\n\r\nResponsabilidades:\r\n\r\n- Diseñar y codificar sitios web y aplicaciones web utilizando HTML, CSS, JavaScript, PHP, MySQL y frameworks modernos como React, Angular o Vue.js.\r\n- Implementar diseños atractivos y funcionales, asegurando una excelente experiencia de usuario.\r\n- Optimizar el rendimiento, la accesibilidad y la seguridad de los sitios web y aplicaciones.\r\n- Colaborar estrechamente con el equipo de diseño y el equipo de marketing para cumplir con los requisitos del proyecto.\r\n- Solucionar problemas y depurar código para garantizar un funcionamiento sin problemas.\r\n- Mantener y actualizar los sitios web y aplicaciones existentes.\r\n- Mantenerse actualizado con las últimas tendencias y tecnologías en desarrollo web.\r\n\r\nRequisitos:\r\n\r\n- Mínimo 3 años de experiencia en desarrollo web.\r\n- Sólidos conocimientos en HTML, CSS, JavaScript, PHP y MySQL.\r\n- Familiaridad con frameworks y bibliotecas de JavaScript como React, Angular o Vue.js.\r\n- Experiencia en el uso de sistemas de control de versiones como Git.\r\n- Habilidades de resolución de problemas y pensamiento crítico.\r\n- Capacidad para trabajar en equipo y comunicarse de manera efectiva.\r\n- Inglés fluido, tanto oral como escrito.\r\n\r\nOfrecemos:\r\n\r\n- Salario competitivo acorde a tu experiencia.\r\n- Oportunidades de crecimiento profesional y desarrollo de habilidades.\r\n- Ambiente de trabajo dinámico y colaborativo.\r\n- Beneficios adicionales como seguro médico, días de vacaciones y capacitación.\r\n\r\n¿Interesado en formar parte de nuestro equipo de desarrollo web? ¡Envíanos tu currículum y comencemos a trabajar juntos!', 1, '2024-05-30 19:41:37'),
(2, 'Analista de Software', 'Bogota DC', 'IO Software', 'Estamos buscando un Analista de Software entusiasta y talentoso para unirse a nuestro equipo. Como Analista de Software, serás responsable de analizar los requisitos del cliente, diseñar soluciones de software y garantizar la calidad del producto final.\r\n\r\nResponsabilidades:\r\n\r\n- Recopilar, analizar y documentar los requisitos del cliente de manera clara y detallada.\r\n- Diseñar arquitecturas de software y modelos de datos que cumplan con los requisitos del sistema.\r\n- Colaborar estrechamente con el equipo de desarrollo para traducir los requisitos en soluciones técnicas.\r\n- Crear casos de prueba y planes de prueba para garantizar la calidad del software.\r\n- Realizar pruebas de aceptación y validar que el software cumpla con los requisitos del cliente.\r\n- Identificar y resolver problemas de rendimiento, escalabilidad y seguridad.\r\n- Documentar los procesos, procedimientos y especificaciones técnicas.\r\n- Mantener una estrecha colaboración con los equipos de desarrollo, pruebas y gestión de proyectos.\r\n- Mantenerse actualizado con las últimas tendencias y mejores prácticas en análisis de software.\r\n\r\nRequisitos:\r\n\r\n- Mínimo 5 años de experiencia en el análisis y diseño de soluciones de software.\r\n- Sólidos conocimientos en metodologías ágiles, como Scrum o Kanban.\r\n- Habilidades de modelado de datos y diseño de arquitecturas de software.\r\n- Familiaridad con herramientas de gestión de requisitos y desarrollo de software.\r\n- Excelentes habilidades de comunicación y colaboración.\r\n- Capacidad de pensamiento crítico y resolución de problemas.\r\n- Experiencia en la gestión de proyectos de software.\r\n- Inglés fluido, tanto oral como escrito.\r\n\r\nOfrecemos:\r\n\r\n- Salario competitivo de acuerdo a tu experiencia.\r\n- Oportunidades de crecimiento profesional y desarrollo de habilidades.\r\n- Ambiente de trabajo dinámico y colaborativo.\r\n- Beneficios adicionales como seguro médico, días de vacaciones y capacitación.\r\n\r\n¿Estás listo para transformar los requisitos del cliente en soluciones de software innovadoras? ¡Envíanos tu currículum y unámonos para llevar nuestros proyectos al siguiente nivel!\r\nMorbi eu ante et massa malesuada dictum non ac est. Pellentesque ultricies, orci eu lobortis gravida, libero urna fringilla lorem, vel accumsan turpis mauris non odio. Nullam vel nisi in mauris cursus varius a nec elit. Nullam sem justo, dictum eu tincidunt non, bibendum vel magna. Cras varius, justo nec gravida fermentum, lacus est elementum nisi, eget dignissim ligula quam eget risus. In hac habitasse platea dictumst. Morbi bibendum elit eget libero blandit, in ullamcorper est convallis. Maecenas ac urna vel nulla dignissim congue id eget leo. Sed at arcu ipsum. In ullamcorper ipsum eu scelerisque sollicitudin. Fusce eu velit id odio pharetra iaculis. Duis luctus, purus vitae vestibulum dignissim, sapien libero consequat risus, non lacinia ligula orci a leo. Nulla fermentum lorem a mauris tristique, sit amet sollicitudin dui convallis. Suspendisse potenti. Phasellus dictum quam ac arcu ultricies, a suscipit mauris m', 1, '2024-05-30 19:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `origen`, `destino`, `fecha_salida`, `hora_salida`, `duracion`, `precio`, `created_at`, `updated_at`) VALUES
(1, 'Quibdo', 'Medellin', '2024-06-01', '08:15:00', '45 minutos', 450000.00, '2024-05-31 12:16:14', '2024-05-31 12:39:52'),
(2, 'Quibdo', 'Bogotá', '2024-06-04', '07:19:00', '60m', 650000.00, '2024-05-31 12:19:26', '2024-05-31 12:19:26'),
(3, 'Quibdo', 'Cali', '2024-06-06', '10:40:00', '45 m', 550000.00, '2024-05-31 12:40:43', '2024-05-31 12:40:43'),
(5, 'Quibdo', 'Medellin', '2024-06-04', '19:29:00', '45 minutos', 450000.00, '2024-05-31 21:29:46', '2024-05-31 21:29:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acercade`
--
ALTER TABLE `acercade`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_id` (`reserva_id`);

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas_turistica`
--
ALTER TABLE `reservas_turistica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas_vuelos`
--
ALTER TABLE `reservas_vuelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acercade`
--
ALTER TABLE `acercade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reservas_turistica`
--
ALTER TABLE `reservas_turistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas_vuelos`
--
ALTER TABLE `reservas_vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
