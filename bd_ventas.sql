-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 23:40:47
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ventas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CantidadTotalProductos` ()  BEGIN 
  SELECT SUM(productos.stock) AS TotaldeProductos FROM productos;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Pocostock` ()  BEGIN 
  SELECT COUNT(productos.nombre) AS ProductosPocoStock, productos.stock FROM productos WHERE productos.stock<=5;
 END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `AreaCuadrado` (`Lado` INT) RETURNS INT(11) BEGIN
  return Lado*Lado;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `GetNroBoletaMax` () RETURNS INT(11) NO SQL
BEGIN
Declare Contador int DEFAULT 0;
Select max(idboleta) into Contador from boletas;
return Contador;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `idBoletaCliente` (`id` INT) RETURNS INT(11) NO SQL
BEGIN
DECLARE contador int;

Select max(b.idboleta) into contador from boletas b
WHERE b.idcliente=id;

RETURN contador;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `NuevoIdBoleta` () RETURNS INT(11) BEGIN
Declare Contador int DEFAULT 0;

Select max(idboleta) into Contador from boletas;
IF (Contador IS NULL) THEN
	set Contador=0;
end if;	
return Contador+1;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `NuevoNroBoleta` () RETURNS VARCHAR(10) CHARSET latin1 BEGIN
Declare Contador int DEFAULT 0;

Select max(right(nro,8)) into Contador from boletas;
IF (Contador IS NULL) THEN
	set Contador=0;
end if;	
return concat('B-',right(concat('00000000',Contador+1),8)) ;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `NumerosALetras` (`numero` NUMERIC(19,7)) RETURNS VARCHAR(512) CHARSET latin1 BEGIN


DECLARE lcRetorno VARCHAR(512);
DECLARE lnTerna INT;
DECLARE lcMiles VARCHAR(512);
DECLARE lcCadena VARCHAR(512);
DECLARE lnUnidades INT;
DECLARE lnDecenas INT;
DECLARE lnCentenas INT;
DECLARE lnEntero INT;
DECLARE lnDecimal INT;

Set lnEntero = truncate(numero,0);
Set lnDecimal = (numero - lnEntero)*100;

IF lnEntero > 0 THEN
SET lcRetorno = '';
SET lnTerna = 1 ;

WHILE lnEntero > 0 DO

-- Recorro columna por columna
SET lcCadena = '';

SET lnUnidades = RIGHT(lnEntero,1);
SET lnEntero = LEFT(lnEntero,LENGTH(lnEntero)-1) ;

SET lnDecenas = RIGHT(lnEntero,1);
SET lnEntero = LEFT(lnEntero,LENGTH(lnEntero)-1) ;

SET lnCentenas = RIGHT(lnEntero,1);
SET lnEntero = LEFT(lnEntero,LENGTH(lnEntero)-1) ;
-- Analizo las unidades
SET lcCadena =
CASE /* UNIDADES */
WHEN lnUnidades = 1 AND lnTerna = 1 THEN CONCAT('UNO ',lcCadena)
WHEN lnUnidades = 1 AND lnTerna <> 1 THEN CONCAT('UN',lcCadena)
WHEN lnUnidades = 2 THEN CONCAT('DOS ',lcCadena)
WHEN lnUnidades = 3 THEN CONCAT('TRES ',lcCadena)
WHEN lnUnidades = 4 THEN CONCAT('CUATRO ',lcCadena)
WHEN lnUnidades = 5 THEN CONCAT('CINCO ',lcCadena)
WHEN lnUnidades = 6 THEN CONCAT('SEIS ',lcCadena)
WHEN lnUnidades = 7 THEN CONCAT('SIETE ',lcCadena)
WHEN lnUnidades = 8 THEN CONCAT('OCHO ',lcCadena)
WHEN lnUnidades = 9 THEN CONCAT('NUEVE ',lcCadena)
ELSE lcCadena
END ;/* UNIDADES */

-- Analizo las decenas
SET lcCadena =
CASE /* DECENAS */
WHEN lnDecenas = 1 THEN
CASE lnUnidades
WHEN 0 THEN 'DIEZ '
WHEN 1 THEN 'ONCE '
WHEN 2 THEN 'DOCE '
WHEN 3 THEN 'TRECE '
WHEN 4 THEN 'CATORCE '
WHEN 5 THEN 'QUINCE '
ELSE CONCAT('DIECI',lcCadena)
END
WHEN lnDecenas = 2 AND lnUnidades = 0 THEN CONCAT('VEINTE ',lcCadena)
WHEN lnDecenas = 2 AND lnUnidades <> 0 THEN CONCAT('VEINTI',lcCadena)
WHEN lnDecenas = 3 AND lnUnidades = 0 THEN CONCAT('TREINTA ',lcCadena)
WHEN lnDecenas = 3 AND lnUnidades <> 0 THEN CONCAT('TREINTA Y ',lcCadena)
WHEN lnDecenas = 4 AND lnUnidades = 0 THEN CONCAT('CUARENTA ',lcCadena)
WHEN lnDecenas = 4 AND lnUnidades <> 0 THEN CONCAT('CUARENTA Y ',lcCadena)
WHEN lnDecenas = 5 AND lnUnidades = 0 THEN CONCAT('CINCUENTA ',lcCadena)
WHEN lnDecenas = 5 AND lnUnidades <> 0 THEN CONCAT('CINCUENTA Y ',lcCadena)
WHEN lnDecenas = 6 AND lnUnidades = 0 THEN CONCAT('SESENTA ',lcCadena)
WHEN lnDecenas = 6 AND lnUnidades <> 0 THEN CONCAT('SESENTA Y ',lcCadena)
WHEN lnDecenas = 7 AND lnUnidades = 0 THEN CONCAT('SETENTA ',lcCadena)
WHEN lnDecenas = 7 AND lnUnidades <> 0 THEN CONCAT('SETENTA Y ',lcCadena)
WHEN lnDecenas = 8 AND lnUnidades = 0 THEN CONCAT('OCHENTA ',lcCadena)
WHEN lnDecenas = 8 AND lnUnidades <> 0 THEN CONCAT('OCHENTA Y ',lcCadena)
WHEN lnDecenas = 9 AND lnUnidades = 0 THEN CONCAT('NOVENTA ',lcCadena)
WHEN lnDecenas = 9 AND lnUnidades <> 0 THEN CONCAT('NOVENTA Y ',lcCadena)
ELSE lcCadena
END ;/* DECENAS */

-- Analizo las centenas
SET lcCadena =
CASE /* CENTENAS */
WHEN lnCentenas = 1 AND lnUnidades = 0 AND lnDecenas = 0 THEN CONCAT('CIEN ',lcCadena)
WHEN lnCentenas = 1 AND NOT(lnUnidades = 0 AND lnDecenas = 0) THEN CONCAT('CIENTO ',lcCadena)
WHEN lnCentenas = 2 THEN CONCAT('DOSCIENTOS ',lcCadena)
WHEN lnCentenas = 3 THEN CONCAT('TRESCIENTOS ',lcCadena)
WHEN lnCentenas = 4 THEN CONCAT('CUATROCIENTOS ',lcCadena)
WHEN lnCentenas = 5 THEN CONCAT('QUINIENTOS ',lcCadena)
WHEN lnCentenas = 6 THEN CONCAT('SEISCIENTOS ',lcCadena)
WHEN lnCentenas = 7 THEN CONCAT('SETECIENTOS ',lcCadena)
WHEN lnCentenas = 8 THEN CONCAT('OCHOCIENTOS ',lcCadena)
WHEN lnCentenas = 9 THEN CONCAT('NOVECIENTOS ',lcCadena)
ELSE lcCadena
END ;/* CENTENAS */



-- Analizo los millares
SET lcCadena =
CASE /* TERNA */
WHEN lnTerna = 1 THEN lcCadena
WHEN lnTerna = 2 AND (lnUnidades + lnDecenas + lnCentenas <> 0) THEN CONCAT(lcCadena,' MIL ')
WHEN lnTerna = 3 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0 THEN CONCAT(lcCadena,' MILLON ')
WHEN lnTerna = 3 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND NOT (lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0) THEN CONCAT(lcCadena,' MILLONES ')
WHEN lnTerna = 4 AND (lnUnidades + lnDecenas + lnCentenas <> 0) THEN CONCAT(lcCadena,' MIL MILLONES ')
WHEN lnTerna = 5 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0 THEN CONCAT(lcCadena,' BILLON ')
WHEN lnTerna = 5 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND NOT (lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0) THEN CONCAT(lcCadena,' BILLONES ')
WHEN lnTerna = 6 AND (lnUnidades + lnDecenas + lnCentenas <> 0) THEN CONCAT(lcCadena,' MIL BILLONES ')
WHEN lnTerna = 7 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0 THEN CONCAT(lcCadena,' TRILLON ')
WHEN lnTerna = 7 AND (lnUnidades + lnDecenas + lnCentenas <> 0) AND NOT (lnUnidades = 1 AND lnDecenas = 0 AND lnCentenas = 0) THEN CONCAT(lcCadena,' TRILLONES ')
WHEN lnTerna = 8 AND (lnUnidades + lnDecenas + lnCentenas <> 0) THEN CONCAT(lcCadena,' MIL TRILLONES ')
ELSE ''
END ;/* MILLARES */


-- Armo el retorno columna a columna
SET lcRetorno = CONCAT(lcCadena,lcRetorno);

SET lnTerna = lnTerna + 1;

END WHILE ; /* WHILE */
ELSE
SET lcRetorno = 'CERO' ;
END IF ;

return concat(RTRIM(lcRetorno),' y ',lnDecimal,'/100') ;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenamiento`
--

CREATE TABLE `almacenamiento` (
  `idalmacenamiento` int(11) NOT NULL,
  `capacidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `almacenamiento`
--

INSERT INTO `almacenamiento` (`idalmacenamiento`, `capacidad`) VALUES
(1, '4 GB'),
(2, '8 GB'),
(3, '32 GB'),
(4, '64 GB'),
(5, '128 GB'),
(6, '256 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `idauditoria` int(11) NOT NULL,
  `tabla` varchar(30) DEFAULT NULL,
  `data_new` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_new`)),
  `data_old` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_old`)),
  `usuario` varchar(15) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `accion` varchar(1) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `idboleta` int(11) NOT NULL,
  `nro` varchar(15) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `total` decimal(19,7) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletas`
--

INSERT INTO `boletas` (`idboleta`, `nro`, `fecha`, `total`, `idcliente`) VALUES
(1, 'B-00000001', '2022-10-28 06:45:12', '7535.0000000', 2),
(2, 'B-00000002', '2022-11-10 18:16:16', '4599.0000000', 2),
(3, 'B-00000003', '2022-11-10 18:20:38', '1899.0000000', 2),
(4, 'B-00000004', '2022-11-10 18:21:05', '1899.0000000', 2),
(5, 'B-00000005', '2022-11-10 18:21:58', '1799.0000000', 2),
(6, 'B-00000006', '2022-11-10 18:22:34', '1799.0000000', 3),
(7, 'B-00000007', '2022-11-10 19:16:56', '1799.0000000', 3),
(8, 'B-00000008', '2022-11-10 19:29:15', '6398.0000000', 2),
(9, 'B-00000009', '2022-11-10 19:29:33', '3598.0000000', 3),
(10, 'B-00000010', '2022-11-10 19:47:45', '1799.0000000', 3);

--
-- Disparadores `boletas`
--
DELIMITER $$
CREATE TRIGGER `NuevaBoleta` BEFORE INSERT ON `boletas` FOR EACH ROW begin
	set new.idboleta=NuevoIdBoleta();
    set new.nro=NuevoNroBoleta();
    set new.fecha=now();
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(11) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `pasword` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `idperfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombres`, `apellidos`, `dni`, `login`, `pasword`, `estado`, `email`, `direccion`, `telefono`, `idperfil`) VALUES
(1, 'smartphone', 'peru', '00000000', 'admin', 'admin', '1', 'smartphoneperu@gmail.com', 'moquegua', '945984698', 1),
(2, 'Jose', 'Quispe', '45984687', 'jose', 'quispe4545', '1', 'josequispe2022@gmail.com', 'Calle Junin 203', '965984858', 2),
(3, 'Manuel', 'Nina', '45151358', 'manuel', '2022manuel', '1', 'jose@gmail.com', 'San francisco', '956987845', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesboletas`
--

CREATE TABLE `detallesboletas` (
  `iddetalle` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `pu` decimal(19,7) DEFAULT NULL,
  `subtotal` decimal(19,7) DEFAULT NULL,
  `idboleta` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallesboletas`
--

INSERT INTO `detallesboletas` (`iddetalle`, `cantidad`, `pu`, `subtotal`, `idboleta`, `idproducto`) VALUES
(6, 3, '2500.0000000', '7500.0000000', 1, 2),
(7, 1, '35.0000000', '35.0000000', 1, 3),
(8, 1, '4599.0000000', '4599.0000000', 2, 1),
(9, 1, '1899.0000000', '1899.0000000', 3, 3),
(10, 1, '1899.0000000', '1899.0000000', 4, 3),
(11, 1, '1799.0000000', '1799.0000000', 5, 2),
(12, 1, '1799.0000000', '1799.0000000', 6, 2),
(13, 1, '1799.0000000', '1799.0000000', 7, 2),
(14, 1, '4599.0000000', '4599.0000000', 8, 1),
(15, 1, '1799.0000000', '1799.0000000', 8, 2),
(16, 2, '1799.0000000', '3598.0000000', 9, 2),
(17, 1, '1799.0000000', '1799.0000000', 10, 2);

--
-- Disparadores `detallesboletas`
--
DELIMITER $$
CREATE TRIGGER `SetNroBoleta` BEFORE INSERT ON `detallesboletas` FOR EACH ROW begin
	set new.idboleta = GetNroBoletaMax();
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_producto`
--

CREATE TABLE `imagenes_producto` (
  `idimagen` int(11) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes_producto`
--

INSERT INTO `imagenes_producto` (`idimagen`, `url`, `idproducto`, `nombre`) VALUES
(1, 'Samsungsa531.jpg', 2, 'imagen 1'),
(2, 'Samsungsa532.jpg', 2, 'Imagen 02'),
(3, 'Samsungsa533.jpg', 2, 'imagen 3'),
(4, 'Samsungsa534.jpg', 2, 'imagen 4'),
(5, 'Samsungs22ultra1.jpg', 1, 'imagen 01'),
(6, 'Samsungs22ultra2.jpg', 1, 'imagen 02'),
(7, 'Samsungs22ultra3.jpg', 1, 'imagen 3'),
(8, 'Samsungs22ultra4.jpg', 1, 'imagen 4'),
(9, 'Samsungs201.jpg', 3, 'imagen 1'),
(10, 'Samsungs202.jpg', 3, 'imagen 2'),
(11, 'Samsungs203.jpg', 3, 'imagen 3'),
(12, 'Samsungz1.jpg', 4, 'imagen 1'),
(13, 'Samsungz2.jpg', 4, 'imagen 2'),
(14, 'Samsungz3.jpg', 4, 'imagen 3'),
(15, 'xiaomipocox41.avif', 5, 'imagen 1'),
(16, 'xiaomipocox42.avif', 5, 'imagen 2'),
(17, 'xiaomipocox43.avif', 5, 'imagen 3'),
(18, 'Huaweip501.jpg', 6, 'imagen 1'),
(19, 'Huaweip502.jpg', 6, 'imagen 2'),
(20, 'Huaweip503.jpg', 6, 'imagen 3'),
(21, 'xiaomi11lite5g1.jpg', 7, 'imagen 1'),
(22, 'xiaomi11lite5g2.jpg', 7, 'imagen 2'),
(23, 'xiaomi11lite5g3.jpg', 7, 'imagen 3'),
(24, 'xiaomiredminote101.avif', 8, 'imagen 1'),
(25, 'xiaomiredminote102.avif', 8, 'imagen 2'),
(26, 'xiaomiredminote11pro1.avif', 9, 'imagen 1'),
(27, 'xiaomiredminote11pro2.avif', 9, 'imagen 2'),
(28, 'samsunggalaxyzfold41.jpg', 10, 'imagen 1'),
(29, 'samsunggalaxyzfold42.jpg', 10, 'imagen 2'),
(30, 'samsunggalaxyzfold43.jpg', 10, 'imagen 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` int(11) NOT NULL,
  `marca` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarca`, `marca`) VALUES
(1, 'Samsung'),
(2, 'Xiaomi'),
(3, 'Motorola'),
(4, 'LG'),
(5, 'Huawei');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idmensaje` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `msm` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `nombre`, `email`, `tema`, `msm`) VALUES
(1, 'Jhonatan Duran', 'duran@gmail.com', 'No me llegó mi pedido', 'Necesito saber donde esta mi pedido, ya va 2 dias de retraso, quiero solucion.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paswords`
--

CREATE TABLE `paswords` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idperfil` int(11) NOT NULL,
  `perfil` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idperfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Vendedor'),
(4, 'Almacen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  `idalmacenamiento` int(11) DEFAULT NULL,
  `idram` int(11) DEFAULT NULL,
  `pu` decimal(19,7) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `idmarca`, `descripcion`, `idalmacenamiento`, `idram`, `pu`, `stock`) VALUES
(1, 'SAMSUNG GALAXY S22 ULTRA 6.8', 1, 'El Samsung Galaxy S22 con capacidad 5G es integrante de la familia mas reciente de celulares Samsung s22 y como tal se sitúa a la vanguardia de la oferta gráfica y tecnológica a nivel mundial. Una de sus cararacteristicas más destacadas es su pantalla de 6.1 Pulgadas con resolución full HD para que con este celular puedas disfrutar de tus películas y videojuegos de manera super fluida.Otro atributo que tiene este celular es su camara de 50 MP que ofrece una de las mejores calidades fotograficas en el mercado de celulares. Junto a sus 12 GB de memoria RAM y su almacenamiento de 256GB, uno tiene potencia y mucho espacio en la palma de la mano', 5, 4, '4599.0000000', 12),
(2, 'SAMSUNG GALAXY A53 6.5 128GB 6GB 32MP + 64MP + 12MP + 5MP + 5MP', 1, 'Descubre un mundo lleno nitidez y color con el nuevo Galaxy A33. Su potente sistema de cámaras traseras de alta resolución estabilizará tus tomas para mantener el movimiento fluido y las imágenes nítidas. Además, posee un zoom que te permitirá obtener fotos increíbles a distancia y te ayudará a capturar toda la majestuosidad de los paisajes sin dejar nada fuera de vista.\nMemoria	8 GB de RAM DDR4-3200 MHz (1 x 8 GB)\nAlmacenamiento	Unidad de estado ', 5, 3, '1799.0000000', 5),
(3, 'SAMSUNG GALAXY S20 FE 6.5 6GB 128GB 12MP + 12MP + 8MP', 1, 'El Samsung Galaxy S20 es el nuevo flagship para el 2020 de la serie Galaxy S de Samsung. Con una pantalla QHD+ de 6.2 pulgadas y tasa de refresco de 120 Hz, el Galaxy S20 está potenciado por un procesador Snapdragon 865 en su variante para USA o un procesador Exynos 990 en su versión internacional. ', 5, 3, '1899.0000000', 12),
(4, 'SAMSUNG GALAXY Z FLIP 4 6.7 8GB 128GB 12MP +12 MP GRAFITO', 1, 'La era de planificar los estilos en torno a tu smartphone ha terminado. Pequeño pero poderoso cuando se pliega, el Galaxy Z Flip4 es un teléfono inteligente compacto y con el tamaño justo para deslizarse en el bolsillo cuando es hora de arrasar.', 5, 4, '4699.0000000', 8),
(5, 'XIAOMI POCO X4 GT 8GB - 256GB', 2, 'El POCO X4 Pro 5G incorpora un panel AMOLED de 6,67 pulgadas en formato 20:9, con resolución FullHD+ (2.400 x 1.080 píxeles), 120 Hz de tasa de refresco y 360 Hz de muestreo táctil, todo ello acompañado de un brillo máximo de 1.200 nits y protegido por Gorilla Glass 5.', 6, 4, '2999.0000000', 6),
(6, 'HUAWEI P50 PRO 6.6\'\' 64MP + 50MP + 40MP + 13MP ', 5, 'El Huawei P50 Pro es el smartphone más avanzado de la serie P50. Con una pantalla OLED de 6.6 pulgadas a resolución 1228p y tasa de refresco de 120Hz, el P50 Pro cuenta con variantes con procesador Kirin 9000 por un lado y Snapdragon 888 por otro. A su vez, cuenta con opciones de 8GB de RAM con hasta 512GB de almacenamiento y una variante tope de gama de 12GB de RAM y 512GB de almacenamiento. La cámara principal del Huawei P50 Pro es cuádruple, con un lente principal de 50MP, lente periscópico de 64MP, ultrawide de 13MP y monocromático de 40MP, mientras que la cámara selfie es de 13MP.', 6, 4, '3799.0000000', 2),
(7, 'XIAOMI 11 LITE 5G NE TRUFFLE BLACK 128GB 64MP + 8MP + 5MP', 2, 'Xiaomi, con los años, ha ido estirando su línea Mi, inicialmente para su único buque insignia. Ya asentada con opciones de gama media, ésta se diversifica y muestra de ello la tenemos en el análisis del Xiaomi Mi 11 Lite 5G, la alternativa vitaminada con respecto a la la versión con 4G del Mi 11 Lite.', 5, 3, '1799.0000000', 4),
(8, 'XIAOMI REDMI NOTE 10 5G 128GB', 2, 'Viene con una batería de 5000 mAh y tiene una capacidad de carga de 18 W. Incluye la cámara principal de 48 MP, una cámara macro de 2 MP y una cámara frontal de 8 MP. La pantalla de este smartphone Xiaomi es una pantalla Dot Display FHD+ de 6,5” y una resolución de 2400 x 1800.', 5, 2, '1119.0000000', 2),
(9, 'XIAOMI REDMI NOTE 11 PRO PLUS 5G 128GB 6GB ', 2, '128GB de Memoria Interna.|6GB de RAM.|Pantalla 6.67 pulgadas.|Batería de 4500mAh|Cámara Trasera108MP+8MP +2MP+2MP.|Cámara Frontal 16MPx.|Sistema Ope\\', 5, 3, '1999.0000000', 5),
(10, 'SAMSUNG GALAXY Z FOLD4 7.6 12GB 256GB 50MP + 12MP + 10MP', 1, 'El Samsung Galaxy Z Fold 2 es el sucesor del Galaxy Fold original. Con una pantalla interna Dynamic AMOLED 2X de 7.6 pulgadas y una externa de 6.23 pulgadas, este smartphone plegable está potenciado por un procesador Snapdragon 865+ con 12GB de memoria RAM y 256GB de espacio de almacenamiento no expandible. La cámara posterior del Galaxy Z Fold 2 es triple, con tres lentes de 12 MP, mientras que la cámara frontal es de 10 MP, al igual que la cámara externa. Una batería de 4500 mAh de carga rápida provee la energía, y puede ser cargada de forma inalámbrica.', 6, 5, '6999.0000000', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `idram` int(11) NOT NULL,
  `capacidad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`idram`, `capacidad1`) VALUES
(1, '2 GB'),
(2, '4 GB'),
(3, '6 GB'),
(4, '8 GB'),
(5, '12 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `ruc` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`ruc`, `nombre`, `telefono`, `direccion`) VALUES
(2147483647, 'Smartphone Peru', '945960745', 'Calle Lima 30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

CREATE TABLE `tipocliente` (
  `idtipo` int(11) NOT NULL,
  `persona` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`idtipo`, `persona`) VALUES
(1, 'Persona Jurídica'),
(2, 'Persona Natural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `pasword` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechaalta` datetime DEFAULT NULL,
  `idperfil` int(11) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `login`, `pasword`, `estado`, `fechaalta`, `idperfil`, `email`, `telefono`) VALUES
(1, 'Jhonatan Duran', 'duran', '123456', 1, '2022-10-10 16:23:57', 1, 'duranjeick@gmail.com', '945960745'),
(2, 'Francis Lopez', 'lopez', '123456789', 1, '2022-11-08 07:02:26', 2, 'francis@gmail.com', '945454545');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_boletas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_boletas` (
`idboleta` int(11)
,`nro` varchar(15)
,`fecha` timestamp
,`total` decimal(19,7)
,`enLetras` varchar(512)
,`idcliente` int(11)
,`cantidad` int(11)
,`pu` decimal(19,7)
,`subtotal` decimal(19,7)
,`idproducto` int(11)
,`nombreprod` varchar(80)
,`idmarca` int(11)
,`descripcion` varchar(8000)
,`idalmacenamiento` int(11)
,`idram` int(11)
,`nombrecli` varchar(50)
,`apellidocli` varchar(50)
,`direccion` varchar(100)
,`email` varchar(80)
,`dni` varchar(11)
,`telefono` varchar(100)
,`marca` varchar(80)
,`capacidad` varchar(50)
,`capacidad1` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_cantidadproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_cantidadproductos` (
`CantidadProductos` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_clientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_clientes` (
`idcliente` int(11)
,`nombres` varchar(50)
,`apellidos` varchar(50)
,`nombrecliente` varchar(101)
,`dni` varchar(11)
,`telefono` varchar(100)
,`idperfil` int(11)
,`perfil` varchar(25)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_clientes1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_clientes1` (
`idcliente` int(11)
,`nombres` varchar(50)
,`apellidos` varchar(50)
,`nombrecliente` varchar(101)
,`dni` varchar(11)
,`estado` varchar(1)
,`telefono` varchar(100)
,`idperfil` int(11)
,`perfil` varchar(25)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_graf_modelos_x_marca`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_graf_modelos_x_marca` (
`marca` varchar(80)
,`cant` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_imgproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_imgproductos` (
`idimagen` int(11)
,`url` varchar(50)
,`idproducto` int(11)
,`nombre` varchar(250)
,`name` varchar(80)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_listapocostock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_listapocostock` (
`idproducto` int(11)
,`nombre` varchar(80)
,`stock` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_producto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_producto` (
`idproducto` int(11)
,`nombre` varchar(80)
,`idmarca` int(11)
,`descripcion` varchar(8000)
,`idalmacenamiento` int(11)
,`idram` int(11)
,`pu` decimal(19,7)
,`stock` int(11)
,`marca` varchar(80)
,`capacidad` varchar(50)
,`capacidad1` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_producto01`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_producto01` (
`idproducto` int(11)
,`nombre` varchar(80)
,`idmarca` int(11)
,`descripcion` varchar(8000)
,`idalmacenamiento` int(11)
,`idram` int(11)
,`pu` decimal(19,7)
,`stock` int(11)
,`marca` varchar(80)
,`capacidad` varchar(50)
,`capacidad1` varchar(50)
,`url` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_boletas`
--
DROP TABLE IF EXISTS `v_boletas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_boletas`  AS SELECT `b`.`idboleta` AS `idboleta`, `b`.`nro` AS `nro`, `b`.`fecha` AS `fecha`, `b`.`total` AS `total`, `NumerosALetras`(`b`.`total`) AS `enLetras`, `b`.`idcliente` AS `idcliente`, `db`.`cantidad` AS `cantidad`, `db`.`pu` AS `pu`, `db`.`subtotal` AS `subtotal`, `db`.`idproducto` AS `idproducto`, `productos`.`nombre` AS `nombreprod`, `productos`.`idmarca` AS `idmarca`, `productos`.`descripcion` AS `descripcion`, `productos`.`idalmacenamiento` AS `idalmacenamiento`, `productos`.`idram` AS `idram`, `clientes`.`nombres` AS `nombrecli`, `clientes`.`apellidos` AS `apellidocli`, `clientes`.`direccion` AS `direccion`, `clientes`.`email` AS `email`, `clientes`.`dni` AS `dni`, `clientes`.`telefono` AS `telefono`, `marcas`.`marca` AS `marca`, `almacenamiento`.`capacidad` AS `capacidad`, `ram`.`capacidad1` AS `capacidad1` FROM ((((((`boletas` `b` join `detallesboletas` `db` on(`b`.`idboleta` = `db`.`idboleta`)) join `productos` on(`db`.`idproducto` = `productos`.`idproducto`)) join `clientes` on(`b`.`idcliente` = `clientes`.`idcliente`)) join `marcas` on(`productos`.`idmarca` = `marcas`.`idmarca`)) join `almacenamiento` on(`productos`.`idalmacenamiento` = `almacenamiento`.`idalmacenamiento`)) join `ram` on(`productos`.`idram` = `ram`.`idram`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_cantidadproductos`
--
DROP TABLE IF EXISTS `v_cantidadproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cantidadproductos`  AS SELECT sum(`productos`.`stock`) AS `CantidadProductos` FROM `productos` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_clientes`
--
DROP TABLE IF EXISTS `v_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_clientes`  AS SELECT `clientes`.`idcliente` AS `idcliente`, `clientes`.`nombres` AS `nombres`, `clientes`.`apellidos` AS `apellidos`, concat(`clientes`.`nombres`,' ',`clientes`.`apellidos`) AS `nombrecliente`, `clientes`.`dni` AS `dni`, `clientes`.`telefono` AS `telefono`, `clientes`.`idperfil` AS `idperfil`, `perfiles`.`perfil` AS `perfil` FROM (`clientes` join `perfiles` on(`clientes`.`idperfil` = `perfiles`.`idperfil`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_clientes1`
--
DROP TABLE IF EXISTS `v_clientes1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_clientes1`  AS SELECT `clientes`.`idcliente` AS `idcliente`, `clientes`.`nombres` AS `nombres`, `clientes`.`apellidos` AS `apellidos`, concat(`clientes`.`nombres`,' ',`clientes`.`apellidos`) AS `nombrecliente`, `clientes`.`dni` AS `dni`, `clientes`.`estado` AS `estado`, `clientes`.`telefono` AS `telefono`, `clientes`.`idperfil` AS `idperfil`, `perfiles`.`perfil` AS `perfil` FROM (`clientes` join `perfiles` on(`clientes`.`idperfil` = `perfiles`.`idperfil`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_graf_modelos_x_marca`
--
DROP TABLE IF EXISTS `v_graf_modelos_x_marca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_graf_modelos_x_marca`  AS SELECT `marcas`.`marca` AS `marca`, count(`productos`.`idproducto`) AS `cant` FROM (`marcas` join `productos` on(`marcas`.`idmarca` = `productos`.`idmarca`)) GROUP BY `marcas`.`marca` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_imgproductos`
--
DROP TABLE IF EXISTS `v_imgproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_imgproductos`  AS SELECT `imagenes_producto`.`idimagen` AS `idimagen`, `imagenes_producto`.`url` AS `url`, `imagenes_producto`.`idproducto` AS `idproducto`, `imagenes_producto`.`nombre` AS `nombre`, `productos`.`nombre` AS `name` FROM (`imagenes_producto` left join `productos` on(`imagenes_producto`.`idproducto` = `productos`.`idproducto`)) GROUP BY `imagenes_producto`.`idimagen`, `imagenes_producto`.`url`, `imagenes_producto`.`idproducto`, `imagenes_producto`.`nombre` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_listapocostock`
--
DROP TABLE IF EXISTS `v_listapocostock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listapocostock`  AS SELECT `productos`.`idproducto` AS `idproducto`, `productos`.`nombre` AS `nombre`, `productos`.`stock` AS `stock` FROM `productos` WHERE `productos`.`stock` < 5 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_producto`
--
DROP TABLE IF EXISTS `v_producto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_producto`  AS SELECT `productos`.`idproducto` AS `idproducto`, `productos`.`nombre` AS `nombre`, `productos`.`idmarca` AS `idmarca`, `productos`.`descripcion` AS `descripcion`, `productos`.`idalmacenamiento` AS `idalmacenamiento`, `productos`.`idram` AS `idram`, `productos`.`pu` AS `pu`, `productos`.`stock` AS `stock`, `marcas`.`marca` AS `marca`, `almacenamiento`.`capacidad` AS `capacidad`, `ram`.`capacidad1` AS `capacidad1` FROM (((`productos` join `marcas` on(`productos`.`idmarca` = `marcas`.`idmarca`)) join `almacenamiento` on(`productos`.`idalmacenamiento` = `almacenamiento`.`idalmacenamiento`)) join `ram` on(`productos`.`idram` = `ram`.`idram`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_producto01`
--
DROP TABLE IF EXISTS `v_producto01`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_producto01`  AS SELECT `productos`.`idproducto` AS `idproducto`, `productos`.`nombre` AS `nombre`, `productos`.`idmarca` AS `idmarca`, `productos`.`descripcion` AS `descripcion`, `productos`.`idalmacenamiento` AS `idalmacenamiento`, `productos`.`idram` AS `idram`, `productos`.`pu` AS `pu`, `productos`.`stock` AS `stock`, `marcas`.`marca` AS `marca`, `almacenamiento`.`capacidad` AS `capacidad`, `ram`.`capacidad1` AS `capacidad1`, `imagenes_producto`.`url` AS `url` FROM ((((`productos` join `marcas` on(`productos`.`idmarca` = `marcas`.`idmarca`)) join `almacenamiento` on(`productos`.`idalmacenamiento` = `almacenamiento`.`idalmacenamiento`)) join `ram` on(`productos`.`idram` = `ram`.`idram`)) left join `imagenes_producto` on(`productos`.`idproducto` = `imagenes_producto`.`idproducto`)) GROUP BY `productos`.`idproducto`, `productos`.`nombre`, `productos`.`idmarca`, `productos`.`descripcion`, `productos`.`idalmacenamiento`, `productos`.`idram`, `productos`.`pu`, `productos`.`stock`, `marcas`.`marca`, `almacenamiento`.`capacidad`, `ram`.`capacidad1` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  ADD PRIMARY KEY (`idalmacenamiento`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`idauditoria`);

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`idboleta`),
  ADD KEY `Obtiene` (`idcliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_perfiles` (`idperfil`);

--
-- Indices de la tabla `detallesboletas`
--
ALTER TABLE `detallesboletas`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `Tiene1` (`idboleta`),
  ADD KEY `FiguraEn` (`idproducto`);

--
-- Indices de la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  ADD PRIMARY KEY (`idimagen`),
  ADD KEY `fk_productos` (`idproducto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `paswords`
--
ALTER TABLE `paswords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_marcas` (`idmarca`),
  ADD KEY `fk_almacenamiento` (`idalmacenamiento`),
  ADD KEY `fk_ram` (`idram`);

--
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`idram`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`ruc`);

--
-- Indices de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `R_19` (`idperfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallesboletas`
--
ALTER TABLE `detallesboletas`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paswords`
--
ALTER TABLE `paswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD CONSTRAINT `Obtiene` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_perfiles` FOREIGN KEY (`idperfil`) REFERENCES `perfiles` (`idperfil`);

--
-- Filtros para la tabla `detallesboletas`
--
ALTER TABLE `detallesboletas`
  ADD CONSTRAINT `FiguraEn` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`),
  ADD CONSTRAINT `Tiene1` FOREIGN KEY (`idboleta`) REFERENCES `boletas` (`idboleta`);

--
-- Filtros para la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  ADD CONSTRAINT `fk_productos` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_almacenamiento` FOREIGN KEY (`idalmacenamiento`) REFERENCES `almacenamiento` (`idalmacenamiento`),
  ADD CONSTRAINT `fk_marcas` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`),
  ADD CONSTRAINT `fk_ram` FOREIGN KEY (`idram`) REFERENCES `ram` (`idram`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `R_19` FOREIGN KEY (`idperfil`) REFERENCES `perfiles` (`idperfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
