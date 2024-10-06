-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2024 a las 02:52:45
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
(1, 'Acerca de Nosotros', '\r\nEn nuestra empresa, nos comprometemos a conectar personas y destinos, facilitando experiencias de viaje que combinan comodidad, seguridad y satisfacción. Nos destacamos por ofrecer un servicio integral que abarca transporte, vuelos y hospedajes, siempre orientado a superar las expectativas de nuestros clientes. Nuestro enfoque es ser un puente entre culturas y lugares, garantizando un respaldo confiable antes, durante y después de cada viaje. Con un extenso portafolio de productos y servicios, buscamos ser el asesor de confianza que nuestros clientes necesitan para disfrutar de la mejor experiencia en sus aventuras.\r\n', '1727302558_a4fa1fab84ead56ea857.jpg');

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
(1, 1, 'Yarlin', 'cha', '+573117229684', 'Brr Caraño', 'admin@gmail.com', '1727305232_9db965cc919545598256.pdf', '2024-09-25 18:00:32', 'Si', 'Ingeniero', '2024-09-26', '2024-09-27', '2024-09-17', 'Quibdó', 'No', 'Español', 'Aplicado');

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
(2, 'Digna Luz', 'Cordoba', 123457689, '3124943456', 'Calle 46 Barrio Buenos Aires', 'digna@gmail.com', 1),
(4, 'Evinton', 'Chala', 2147483647, '437839489849', 'calle 23', 'evinton@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `nit` varchar(12) NOT NULL,
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
(1, 'Planear Volar', 'agenciadeviajesplanearvolar@gmail.com', '3135034707', 'San Francisco de Quibdo', 'Cr 2 #24A-35 Frente a la alcaldía de Quibdó', '', '', '', '', '');

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
(5, 'La guajira', '14 municipios', 'La Guajira es una región situada en el extremo norte de Colombia, conocida por su impresionante diversidad cultural, paisajes desérticos y costas bañadas por el mar Caribe. Este departamento es el hogar del pueblo indígena Wayuu, que ha mantenido sus tradiciones y costumbres a lo largo de los siglos, ofreciendo una rica experiencia cultural para los visitantes.\r\n\r\nLa capital de La Guajira es Riohacha, una ciudad costera que sirve como punto de entrada a las maravillas naturales de la región. Desde allí, los viajeros pueden explorar destinos emblemáticos como el Cabo de la Vela, un pintoresco pueblo pesquero famoso por sus espectaculares atardeceres y playas de aguas turquesas, y Punta Gallinas, el punto más septentrional de América del Sur, donde el desierto se encuentra con el mar en un paisaje de dunas y acantilados.\r\n\r\nLa Guajira es también conocida por su clima árido y caliente, con temperaturas que a menudo superan los 30°C. La fauna y flora de la región son únicas, con cactus, matorrales espinosos y una variedad de aves que habitan en el desierto. Además, el Parque Nacional Natural Macuira, una rara cadena montañosa en medio del desierto, ofrece un contraste sorprendente con su vegetación más verde y microclima fresco.\r\n\r\nLa cultura Wayuu es una parte integral de la identidad de La Guajira, y sus tejidos artesanales, como las mochilas y hamacas, son altamente valorados. La región es también conocida por sus festivales y celebraciones, donde la música tradicional, como la gaita y el vallenato, cobra vida.\r\n\r\nLa Guajira, con su mezcla única de paisajes desérticos, playas vírgenes y riqueza cultural, es un destino fascinante para aquellos que buscan explorar uno de los rincones más auténticos y menos explorados de Colombia.', '1727301771_95dbd1d05f88778f4067.jpg', 1),
(6, 'San Andres', '2 municipios', 'San Andrés es una hermosa isla caribeña perteneciente a Colombia, ubicada a unos 775 kilómetros al noroeste de la costa continental del país. Conocida por sus playas de arena blanca, aguas cristalinas de múltiples tonos de azul y su vibrante cultura isleña, San Andrés es un destino turístico popular tanto para colombianos como para visitantes internacionales.\r\n\r\nLa isla es parte del Archipiélago de San Andrés, Providencia y Santa Catalina, y ha sido designada como Reserva de la Biosfera por la UNESCO bajo el nombre de \"Seaflower\", debido a su rica biodiversidad marina y terrestre. Los arrecifes de coral que rodean la isla son un paraíso para los amantes del buceo y el snorkel, ofreciendo una oportunidad única de explorar una vida marina abundante, que incluye peces tropicales, rayas y tortugas.\r\n\r\nSan Andrés también es conocida por su mezcla cultural, resultado de la influencia de diversas poblaciones, incluyendo africanos, ingleses, españoles y piratas, que han dejado su huella en la lengua, la música, y las costumbres de la isla. El idioma criollo sanandresano, una mezcla de inglés, español y dialectos africanos, es ampliamente hablado por los isleños.\r\n\r\nLa capital, San Andrés, es una ciudad pequeña pero vibrante, con una amplia oferta de restaurantes, tiendas libres de impuestos y una vida nocturna animada. Lugares icónicos como la Cueva de Morgan, la Laguna Big Pond, y las playas de Spratt Bight y Johnny Cay son algunas de las principales atracciones turísticas.\r\n\r\nEl clima de San Andrés es tropical, con temperaturas que varían entre los 25°C y 30°C durante todo el año, lo que lo convierte en un destino ideal para quienes buscan disfrutar del sol y el mar. Además de sus bellezas naturales, la hospitalidad de los isleños y su rica cultura musical, con ritmos como el reggae, el calipso y el soca, hacen de San Andrés un lugar único en el Caribe colombiano.', '1727301807_0a6535cbd3639b5296e6.jpg', 1),
(7, 'Santa marta ', '9 comunas', 'Santa Marta es una ciudad portuaria ubicada en la región Caribe de Colombia, en la costa norte del país. Fundada en 1525, es una de las ciudades más antiguas de América del Sur. Santa Marta se encuentra a los pies de la Sierra Nevada de Santa Marta, la montaña costera más alta del continente, y está rodeada de playas tropicales y paisajes naturales impresionantes.\r\n\r\nLa ciudad es conocida por su clima cálido y soleado, con temperaturas promedio que oscilan entre los 24°C y 30°C durante todo el año. Santa Marta ofrece una mezcla vibrante de cultura e historia, con atracciones destacadas como la Catedral de Santa Marta, el Parque de los Novios y la Quinta de San Pedro Alejandrino, la finca histórica donde Simón Bolívar pasó sus últimos días.\r\n\r\nAdemás de su importancia histórica, Santa Marta es famosa por sus playas de arena blanca y aguas cristalinas, como Playa Rodadero y Playa Blanca. La ciudad también sirve como puerta de entrada a destinos turísticos cercanos, como el Parque Nacional Natural Tayrona, conocido por sus paisajes selváticos y playas vírgenes, y la Ciudad Perdida, una antigua ciudad precolombina ubicada en la Sierra Nevada.\r\n\r\nSanta Marta combina su rica herencia cultural con una creciente oferta de actividades turísticas, convirtiéndola en un destino popular tanto para los viajeros nacionales como internacionales.', '1727301846_96b4241dc9dc2c3132f5.jpg', 1),
(8, 'Amazonas', '11 municipios', 'El departamento de Amazonas, ubicado en el extremo sur de Colombia, es el más grande del país, conocido por su vasta selva tropical y rica biodiversidad. Es una región mayoritariamente cubierta por la Amazonía, con un clima tropical húmedo y lluvioso. Su capital es Leticia, una ciudad fronteriza que limita con Brasil y Perú. La población del Amazonas está compuesta en su mayoría por comunidades indígenas, que mantienen sus tradiciones y formas de vida en armonía con la naturaleza. El departamento es un destino clave para el ecoturismo, ofreciendo experiencias únicas en la selva y el río Amazonas.', '1727301883_a46fab9fed82acae35fe.jpg', 1),
(9, 'Puerto Plata', '9 municipios', 'Puerto Plata, conocida como “La Novia del Atlántico”, es una joya caribeña en la costa norte de la República Dominicana, famosa por sus playas de arena dorada, su rica historia colonial y su vibrante cultura. Fundada en 1502, la ciudad ofrece una mezcla única de arquitectura victoriana, impresionantes paisajes naturales como el Pico Isabel de Torres y las 27 Charcos de Damajagua, y atracciones turísticas como la Fortaleza San Felipe y el teleférico.', '1727301665_b49b007aa3244f3b962a.jpg', 1),
(10, 'Europa', 'Internacional', 'Europa es un destino turístico incomparable, conocido por su rica diversidad cultural, histórica y natural. Desde las icónicas ciudades como París, Londres y Roma, con sus monumentos emblemáticos y museos de renombre mundial, hasta los paisajes impresionantes de los Alpes suizos y las playas mediterráneas de España y Grecia, Europa ofrece algo para todos los gustos.', '1727301622_0b98d4cd7b48ab10df53.jpg', 1),
(11, 'Cartagena', '46 municipios', 'Cartagena, oficialmente conocida como Cartagena de Indias, es una vibrante ciudad portuaria situada en la costa norte de Colombia, a orillas del mar Caribe. Fundada en 1533, Cartagena es famosa por su rica historia, su arquitectura colonial y sus imponentes fortificaciones, que han sido declaradas Patrimonio de la Humanidad por la UNESCO.\r\n\r\nEl corazón histórico de la ciudad, conocido como el Centro Histórico o la Ciudad Amurallada, está lleno de calles adoquinadas, coloridas casas coloniales con balcones de madera, y plazas llenas de vida. Entre sus principales atracciones se encuentran la Torre del Reloj, el Castillo de San Felipe de Barajas, y la Plaza de Santo Domingo, donde se encuentran numerosos restaurantes y tiendas.\r\n\r\nCartagena también es conocida por sus playas, que ofrecen un contraste perfecto con la historia que envuelve la ciudad. Playas como Bocagrande y Playa Blanca en la cercana isla de Barú son populares entre los turistas. La ciudad también es un importante centro cultural y artístico, con festivales internacionales de cine, música y literatura que atraen a visitantes de todo el mundo.\r\n\r\nEl clima cálido y tropical de Cartagena, con temperaturas que rondan los 30°C durante todo el año, junto con su oferta gastronómica, que mezcla sabores afrocaribeños, criollos y europeos, hacen de esta ciudad un destino inigualable para aquellos que buscan combinar historia, cultura y relajación en el Caribe colombiano.', '1727301922_82bd3bfab53052cb5dbc.jpg', 1);

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
(24, 3, 2),
(25, 3, 6),
(26, 3, 7),
(27, 3, 8),
(28, 3, 10),
(29, 3, 11),
(30, 3, 12);

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
(7, 'Ricardo Lemus Lemus', 'https://www.facebook.com/', 'https://www.instagram.com/', '1717290430_c992cf5d978c39dc0bd0.jpg', 1);

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
  `ciudad_id` int(11) NOT NULL,
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

INSERT INTO `paquetes` (`id`, `nombre_paquete`, `ciudad_id`, `tiempo_estadia`, `cant_personas`, `descripcion`, `costo`, `foto`, `estado`) VALUES
(3, '2X1', 5, '4 días', '2 personas', 'hola Bienvenidos al Paquete Turístico Reconciliación\r\n\r\nExplora la belleza de 2X1 con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de 4 días y 4 noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Todo incluido\r\nTiquete aéreo: Si\r\nAlojamiento: 4 noches\r\nAlimentación: Todo incluido\r\nTarjeta de asistencia Médica menores de 75 años: Si\r\n\r\nVenta hasta el 31 de agosto\r\nNO INCLUYE: **EXCEPTO DEL 11-15 ABRIL 2025** Gastos no especificados en la tarifa.\r\nTarifas en persos por personas, sujeta a disponibilidad y cambio sin previo aviso.\r\n\r\nCONSULTA CON NUESTROS ASESORES POR OTRAS ACOMODACIONES Y/O FECHAS DE VIAJE\r\nAPLICAN TÉRMINOS Y CONDICIONES / RNT 84507', 1809000.00, '1727301158_ca4e1eabf29d92115839.jpg', 1),
(7, 'Juernes Ofertas', 11, '3 dias', '2 personas', 'hola Bienvenidos al Paquete Turístico de Juernes Ofertas\r\n\r\nExplora la belleza de Cartagena con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de 3 días y 3 noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Si\r\nTraslado aéreo-hotel -aéreo: Si\r\nArticulo personal: Si\r\nAlojamiento: 3 noches\r\nAlimentación: Todo incluido\r\nTour Barú terrestre más City tour (Chiva): Si\r\nTarjeta de asistencia Médica menores de 75 años: Si\r\n\r\nVenta hasta el 31 de agosto\r\nNO INCLUYE: Gastos no especificados en la tarifa\r\nNOTA: Habitación superior - Consulta con su asesor en el plan de pago\r\nTARIFA EN PESO POR PERSONA SUJETA A DISPONIBILIDAD Y CAMBIOS DIN PREVIO AVISO', 1219000.00, '1727301112_a3c0c3fbc88017ec5f45.jpg', 1),
(8, 'Europa', 10, '7 dias', '2 personas', 'hola Bienvenidos al Paquete Turístico Europa\r\n\r\nExplora la belleza de [Nombre del Destino] con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de [Número de días] días y [Número de noches] noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nRecorrido:\r\n Madrid, Burdeos, Blois, París, Lucerna, Zúrich, Verona, Venecia, Florencia, Roma, Pisa, Niza, Barcelona y Costa azul, Zaragoza.\r\n\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 11699000.00, '1727301082_edea87d47f2985d1dad9.jpg', 1),
(9, '2X1 Amazonas', 8, '4 dias', '2 personas', 'hola Bienvenidos al Paquete 2X1 Amazonas\r\n\r\nExplora la belleza de Amazonas con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de 4 días y 3 noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel de [Número de estrellas] estrellas, con todas las comodidades y servicios que necesitas para una estancia placentera.\r\nTransporte: Traslados ida y vuelta desde el aeropuerto, y transporte interno a los principales puntos turísticos.\r\nDesayuno diario: Disfruta de un desayuno buffet cada mañana, con una amplia variedad de opciones locales e internacionales.\r\n\r\nAsistencia 24/7: Nuestro equipo estará disponible las 24 horas del día para asistirte con cualquier necesidad o consulta durante tu viaje.', 1649000.00, '1727301195_d8ae032cb6219c223e4d.jpg', 1),
(10, '2X1', 6, '4 dias', '2 personas', 'hola Bienvenidos al Paquete Turístico 2 x 1\r\n\r\nExplora la belleza de San andres con nuestro paquete turístico especialmente diseñado para ofrecerte una experiencia inolvidable. Este paquete incluye una estancia de 4 días y 4 noches en los mejores alojamientos de la zona, asegurando comodidad y lujo durante tu visita.\r\n\r\nLo que incluye el paquete:\r\n\r\nAlojamiento: Hospédate en un hotel \r\nAlimentación: Todo Incluido\r\nTarjeta de asistencia médica: Menores de 75 años\r\nTiquete aéreo: Si\r\n\r\nVenta hasta el 31 de agosto\r\nNO INCLUYE: **EXCEPTO DEL 11-15 ABRIL 2025** Gastos no especificados en la tarifa.\r\nTarifas en personas por personas, sujeta a disponibilidad y cambio sin previo aviso.\r\n\r\nCONSULTA CON NUESTROS ASESORES POR OTRAS ACOMODACIONES Y/O FECHAS DE VIAJE\r\nAPLICAN TÉRMINOS Y CONDICIONES / RNT 84507', 1699000.00, '1727301221_18d8c9892d5b77f0e485.jpg', 1),
(11, 'Puerto Plata', 9, '4 dias', '2', 'Puerto Plata, conocida como “La Novia del Atlántico”, es una joya caribeña en la costa norte de la República Dominicana, famosa por sus playas de arena dorada, su rica historia colonial y su vibrante cultura. Fundada en 1502, la ciudad ofrece una mezcla única de arquitectura victoriana, impresionantes paisajes naturales como el Pico Isabel de Torres y las 27 Charcos de Damajagua, y atracciones turísticas como la Fortaleza San Felipe y el teleférico.', 3339000.00, '1727301360_9a03878590172e37ac4e.jpg', 1);

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
(1, 'Maria', 'Mena', 2147483647, 'mafia00796@hotmail.com', 3, 'Contactado'),
(2, 'Juan Carlos', 'Palacios', 2147483647, 'mafia00796@hotmail.com', 8, 'Contactado'),
(3, 'Tatiana', 'Gamboa', 2147483647, 'mafia00796@hotmail.com', 8, 'Contactado'),
(4, 'Luz Leiby', 'Perea', 2147483647, 'mafia00796@hotmail.com', 9, 'Contactar'),
(5, 'Yoyler', 'Ruiz', 2147483647, 'mafia00796@hotmail.com', 1, 'Contactar'),
(15, 'Admin', 'Admin', 2147483647, 'prueba@gmail.com', 3, 'Contactar'),
(16, 'Admin', 'Admin', 2147483647, 'prueba@gmail.com', 3, 'Contactar'),
(17, 'Haminton', 'Mena Mena', 2147483647, 'hamintonjair@gmail.com', 1, 'Contactar'),
(18, 'Haminton', 'Mena Mena', 2147483647, 'hamintonjair@gmail.com', 1, 'Contactado'),
(19, 'Haminton', 'Mena Mena', 2147483647, 'hamintonjair@gmail.com', 8, 'Contactado'),
(20, 'Luz', 'Perez', 2147483647, 'hamintonjair@gmail.com', 3, 'Contactado'),
(21, 'prueba', 'planear', 2147483647, 'admin@gmail.com', 3, 'Contactar'),
(22, 'horcio ', 'palacios', 2147483647, 'horassi.20@gmail.com', 10, 'Contactar'),
(23, 'horacio ', 'palacios', 2147483647, 'horassi.200@gmail.com', 11, 'Contactado'),
(24, 'horacio ', 'palacios', 2147483647, 'horassi.200@gmail.com', 11, 'Contactado'),
(25, 'Yarlin', 'cha', 2147483647, 'yarlinsonchala@gmail.com', 3, 'Contactado'),
(26, 'Evinton', 'Cjhala', 326353673, 'evinton@gmail.com', 7, 'Contactado');

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
  `estado` varchar(20) DEFAULT NULL,
   `abono` decimal(10,2) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_turistica`
--

INSERT INTO `reservas_turistica` (`id`, `cliente_id`, `paquete_id`, `guia_id`, `fecha_reserva`, `costo`, `estado`, `abono`) VALUES
(1, 2, 1, 1, '2024-05-31', 150000.00, 'Reservado', 150000.00),
(2, 2, 1, 2, '2024-06-01', 350000.00, 'Reservado', 350000.00),
(3, 2, 9, 0, '2024-06-12', 350000.00, 'Reservado', 350000.00),
(4, 1, 7, 2, '2024-06-27', 350000.00, 'Reservado', 350000.00),
(5, 1, 3, 0, '2024-10-11', 650000.00, 'Reservado', 650000.00),
(6, 2, 7, 1, '2024-10-03', 450000.00, 'Reservado', 450000.00),
(7, 2, 8, 0, '2024-10-04', 750000.00, 'Reservado', 750000.00),
(8, 1, 7, 2, '2024-10-04', 450000.00, 'Reservado', 450000.00),
(9, 1, 8, 6, '2024-10-04', 750000.00, 'Anulada', 750000.00);
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
(1, 'quibdo', '2024-09-26', '0000-00-00', '1', 'medellin', 'Yarlin', 'Cha', '2436771283', 'admin@gmail.com', '3117229684', 'Contactar'),
(2, 'barranquilla', '2024-09-25', '2024-09-26', '1', 'armenia', 'Yarlin', 'Cha', '2436771283', 'admin@gmail.com', '3117229684', 'Contactado'),
(3, 'armenia', '2024-09-30', '0000-00-00', '1', 'barranquilla', 'Carlos', 'Benzema', '5368276378', 'carlos@gmail.com', '2346677888', 'Contactado');

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
(1, 'Guía de Turismo Especializado en Inglés', 'Quibdó - Chocó', 'Planear Volar', '¿Te apasiona compartir la historia y la cultura de nuestra región? Estamos en busca de un guía de turismo con alto nivel de inglés para liderar recorridos por las principales atracciones turísticas. El postulante debe ser capaz de explicar con claridad y entusiasmo todos los aspectos de los lugares visitados, asegurando una experiencia memorable para los turistas angloparlantes. Se requiere flexibilidad horaria y disponibilidad para trabajar fines de semana.\r\n\r\nResponsabilidades:\r\n- Realizar recorridos turísticos en inglés, asegurando una experiencia agradable y educativa para los visitantes.\r\n- Elaborar y presentar itinerarios que resalten los aspectos culturales e históricos de los destinos.\r\n- Actuar como representante de la empresa, manteniendo una actitud profesional y amigable en todo momento.\r\n- Gestionar posibles situaciones imprevistas durante los tours, garantizando la seguridad y satisfacción de los clientes.\r\n- Proporcionar recomendaciones sobre actividades, restaurantes y compras en la zona.\r\n\r\nRequisitos:\r\n- Nivel avanzado de inglés, tanto hablado como escrito.\r\n- Experiencia previa en el sector turístico, preferiblemente como guía turístico.\r\n- Habilidad para interactuar con personas de diversas culturas.\r\n- Pasión por la historia y la cultura local.\r\n- Disponibilidad para trabajar en horarios flexibles, incluyendo fines de semana y días festivos.\r\n\r\nSueldo:\r\n$2,000,000 a $3,000,000 COP mensuales, con posibilidad de recibir comisiones y propinas.', 1, '2024-05-30 19:41:37'),
(2, 'Guía Turístico Bilingüe Inglés-Español', 'Quibdó - Chocó', 'Planear volar', 'Buscamos un guía turístico con dominio avanzado del inglés para acompañar y asistir a grupos de turistas internacionales. El candidato ideal debe tener conocimientos sólidos de historia, cultura y geografía locales, así como habilidades excepcionales de comunicación para proporcionar experiencias enriquecedoras y educativas. Se valorará la experiencia previa en el sector turístico y la capacidad de adaptarse a grupos diversos.\r\n\r\nResponsabilidades:\r\n- Conducir y guiar a grupos de turistas internacionales en recorridos por las principales atracciones turísticas.\r\n- Proporcionar información detallada sobre la historia, cultura, y tradiciones locales en inglés.\r\n- Resolver dudas y atender las necesidades de los turistas de manera oportuna y profesional.\r\n- Coordinar con el equipo de logística para asegurar el buen desarrollo de las actividades programadas.\r\n- Adaptar las explicaciones y recorridos a las características e intereses del grupo.\r\n\r\n\r\nRequisitos:\r\n- Dominio avanzado del inglés (mínimo C1).\r\n- Experiencia mínima de 2 años como guía turístico o en posiciones similares.\r\n- Conocimiento profundo de la historia y cultura locales.\r\n- Excelentes habilidades de comunicación y presentación.\r\n- Flexibilidad horaria y disponibilidad para trabajar fines de semana y feriados.\r\n\r\nSueldo:\r\n$1,800,000 a $2,500,000 COP mensuales, según experiencia y habilidades.\r\nComisiones adicionales por cada grupo guiado y propinas.', 1, '2024-05-30 19:42:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reservas_turistica`
--
ALTER TABLE `reservas_turistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reservas_vuelos`
--
ALTER TABLE `reservas_vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
