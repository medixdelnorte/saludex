-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 22:33:22
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saludex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_almacen`
--

CREATE TABLE `t_almacen` (
  `almacen_id` int(11) NOT NULL,
  `almacen_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `almacen_fecha_alta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_almacen`
--

INSERT INTO `t_almacen` (`almacen_id`, `almacen_nombre`, `sucursal_id`, `usuario_id`, `almacen_fecha_alta`) VALUES
(1, 'ALMACEN 10', 1, 1, '2016-12-06 16:48:59'),
(2, 'ALMACEN 2', 1, 1, '2016-12-06 17:45:53'),
(3, 'NUEVO ALMACEN', 1, 1, '2016-12-12 17:25:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente`
--

CREATE TABLE `t_cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_razon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_rfc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_num_externo` int(10) DEFAULT NULL,
  `cliente_num_interno` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_cp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_colonia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_ciudad` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_nombre_comercial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_status_id` int(11) NOT NULL DEFAULT '1',
  `cliente_fecha_alta` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_dias_credito` int(11) DEFAULT NULL,
  `cliente_limite_credito` float DEFAULT NULL,
  `cliente_telefono` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_celular` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_numero_cliente` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_observaciones` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_cliente`
--

INSERT INTO `t_cliente` (`cliente_id`, `cliente_razon`, `cliente_rfc`, `cliente_direccion`, `cliente_num_externo`, `cliente_num_interno`, `cliente_cp`, `cliente_colonia`, `cliente_ciudad`, `cliente_estado`, `cliente_nombre_comercial`, `cliente_correo`, `cliente_status_id`, `cliente_fecha_alta`, `usuario_id`, `cliente_dias_credito`, `cliente_limite_credito`, `cliente_telefono`, `cliente_celular`, `cliente_numero_cliente`, `cliente_observaciones`) VALUES
(1, 'OSCAR ALBERTO SOTERO SILVA', 'SBB961118TIA', 'MONTES URDIALES', 620, 'PISO 2', '11000', 'LOMAS DE CHAPULTEPEC', 'MIGUEL HIDALGO', 'DISTRITO FEDERAL', NULL, NULL, 2, '2016-11-30 11:38:13', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'CLIENTE PRUEBA 1XY', 'XAXAXAXAXAXA', 'DIRECCION DE PRUEBA', 0, '', '0123456', 'COLONIA DE PRUEBA', 'MONTERREY', 'NUEVO LEON', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(3, 'dewiohdewiodoewdew', 'dewiodjewiodjewiodje', 'ewdioewjdewiodjewiodjiewodw', 0, '', 'ediewjdkjjkk', 'ljkljmkljkljkljkl', 'lkjkljkljkljkljklj', 'lkjkljkljkljkljklj', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(4, 'cliente prueba 45', 'dewdewdewdewewf', 'dewdewdewfewf', 0, '', 'dewdewdewdwe', 'ewdewdewdeewf', 'dewdewdewewfew', 'dewdewdewdefwwf', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(5, 'cliente prueba 23', 'dewdewdewdewdew', 'dewddewdewdewdewd', 0, '', 'ewdewdewdewd', 'dewdwedwedwedewd', 'ewdewdewdewdewdew', 'dewdewdewdewdew', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(6, 'dqwqwdqdq', 'wdqwddqwdqw', 'qwdqwdqdqwdq', 0, '', 'wdqwdqwd', 'qwdqwdqw', 'dqwqwdqwd', 'dqwdqwdqw', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(7, 'fhty', 'CCCCCCCCCCC', 'DIRECCION DIRECCCION', 0, '', '93939393', 'NUEVO REPUEBLO', 'MONTERREY', 'NUEVO LEON', 'EL NOMBRE COMERCIAL DEL CLIENTE', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(8, 'XXXXXXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXX', 0, '', 'XXXXXXXXX', 'XXXXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXXX', '', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(9, '5 t5freferferfedddddsqws', 'tyjtyj tyj', 'thr hthrthtrhrthtrh', 0, '', 'rhDERFER', 'rh rthrth', 'trh rthtrh', 'rt gtrghrtgtrgr', 'f erferfer f', '', 1, '0000-00-00 00:00:00', 0, 0, 0, '', '', '', ''),
(10, 'LA RAZON SOCIAL DEL CLIENTE', 'SURFCDELCLIENTE', 'LA DIRECCION DEL CLIENTE', 0, '', 'CPCPCPCPCPC', 'COLONIA DEL CLIENTE', 'CIUDAD DEL CLIENTE', 'ESTADO DEL CLIENTE', '', '', 1, '0000-00-00 00:00:00', 1, 0, 0, '', '', '', ''),
(11, 'LA RAZON SOCIAL DEL CLIENTEd', 'dewfewfewewfww', 'fewfewewfewfewf', 0, '', 'ewfewfewfewe', 'fewfewfewfewew', 'wefewfewefewfew', 'ewfewfewfewfew', '', '', 1, '0000-00-00 00:00:00', 1, 0, 0, '', '', '', ''),
(12, 'fewfewffeewfewfewf', 'ewfewfewfewfew', 'fewfewfewfewfewf', 0, '', 'ewfewfewfewf', 'fewfewfewfewfeww', 'fewfewfewfewfew', 'fewfewfewfewf', '', '', 1, '0000-00-00 00:00:00', 1, 0, 0, '', '', '', ''),
(13, 'g 4rgergergergerger', 'r34t534rt345f', 'evrfer gergr', 0, '', 'reg erg erg', 'ferg ergergerg', 'fsgf ergergerg', 'g ergergergeg', '', '', 1, '0000-00-00 00:00:00', 1, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente_status`
--

CREATE TABLE `t_cliente_status` (
  `cliente_status_id` int(11) NOT NULL,
  `cliente_status_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_cliente_status`
--

INSERT INTO `t_cliente_status` (`cliente_status_id`, `cliente_status_nombre`) VALUES
(1, 'ACTIVO'),
(2, 'SUSPENDIDO'),
(3, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empresa`
--

CREATE TABLE `t_empresa` (
  `empresa_id` int(11) NOT NULL,
  `empresa_razon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_rfc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_num_externo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_num_interno` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa_colonia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_cp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_ciudad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_nombre_comercial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `empresa_fecha_alta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_empresa`
--

INSERT INTO `t_empresa` (`empresa_id`, `empresa_razon`, `empresa_rfc`, `empresa_direccion`, `empresa_num_externo`, `empresa_num_interno`, `empresa_colonia`, `empresa_cp`, `empresa_ciudad`, `empresa_estado`, `empresa_nombre_comercial`, `usuario_id`, `empresa_fecha_alta`) VALUES
(1, 'EMPRESA 1', 'XXXXXXXXXXXX', 'DEW DEWDEWDEWDEW', 'E DEWDEW', '', 'ED EWDEWDEWDEW', 'D EWDEW', 'DEW DEWDEW', 'WEDEWDEWD', 'EMP1', 1, NULL),
(2, 'EMPRESA 2', 'XAXAXAAXXAXA', 'DIRECCION DE EMPRESA 2', '100', '', 'COLONIA DE EM', '00000', 'CIUDAD 2', 'ESTADO 2', 'EMP2', 1, '2016-12-05 17:21:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_existencia`
--

CREATE TABLE `t_existencia` (
  `existencia_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `existencia_cantidad` int(11) NOT NULL DEFAULT '0',
  `existencia_maximo` int(11) NOT NULL DEFAULT '0',
  `existencia_minimo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_existencia`
--

INSERT INTO `t_existencia` (`existencia_id`, `producto_id`, `almacen_id`, `existencia_cantidad`, `existencia_maximo`, `existencia_minimo`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 2, 1, 5, 0, 0),
(3, 3, 1, 0, 0, 0),
(4, 4, 1, 0, 0, 0),
(5, 1, 2, 0, 0, 0),
(6, 2, 2, 3, 0, 0),
(7, 3, 2, 0, 0, 0),
(8, 4, 2, 0, 0, 0),
(12, 5, 1, 0, 0, 0),
(13, 5, 2, 0, 0, 0),
(15, 6, 1, 0, 0, 0),
(16, 6, 2, 0, 0, 0),
(17, 1, 3, 0, 0, 0),
(18, 5, 3, 0, 0, 0),
(19, 6, 3, 0, 0, 0),
(20, 2, 3, 0, 0, 0),
(21, 3, 3, 0, 0, 0),
(22, 4, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_partidavt`
--

CREATE TABLE `t_partidavt` (
  `partidavt_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `partidavt_precio` float NOT NULL,
  `partidavt_descuento` int(11) NOT NULL DEFAULT '0',
  `partidavt_cantidad` int(11) NOT NULL DEFAULT '1',
  `partidavt_iva` int(11) NOT NULL,
  `partidavt_pref` float NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `partidavt_fecha` datetime DEFAULT NULL,
  `partidavt_comentario` text COLLATE utf8_unicode_ci,
  `venta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_partidavt`
--

INSERT INTO `t_partidavt` (`partidavt_id`, `producto_id`, `partidavt_precio`, `partidavt_descuento`, `partidavt_cantidad`, `partidavt_iva`, `partidavt_pref`, `usuario_id`, `partidavt_fecha`, `partidavt_comentario`, `venta_id`) VALUES
(1, 1, 100.23, 0, 1, 0, 70, 1, '2016-12-16 07:26:30', NULL, 1),
(30, 5, 300, 0, 1, 0, 300, 1, '2016-12-16 15:47:54', NULL, 1),
(33, 4, 100, 0, 1, 16, 100, 1, '2016-12-16 16:18:59', NULL, 1),
(34, 4, 100, 0, 1, 16, 100, 1, '2016-12-16 16:19:32', NULL, 1),
(35, 6, 80, 0, 1, 0, 80, 1, '2016-12-16 16:19:41', NULL, 1),
(36, 5, 300, 0, 1, 0, 300, 1, '2016-12-16 16:19:46', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pedido`
--

CREATE TABLE `t_pedido` (
  `pedido_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pedido_fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_permiso`
--

CREATE TABLE `t_permiso` (
  `permiso_id` int(11) NOT NULL,
  `permiso_descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `permiso_valor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `permiso_modulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_permiso`
--

INSERT INTO `t_permiso` (`permiso_id`, `permiso_descripcion`, `permiso_valor`, `permiso_modulo`) VALUES
(2, 'Acceso Control de Clientes', '1100', 'CLIENTES'),
(4, 'Acceso Control de Productos', '2100', 'PRODUCTOS'),
(6, 'Acceso a Existencias', '3100', 'ALMACEN'),
(8, 'Acceso Control de Usuarios', '4100', 'CONFIGURACION'),
(9, 'Acceso Perfiles de Usuario', '4200', 'CONFIGURACION'),
(10, 'Acceso Control de Departamentos', '4300', 'CONFIGURACION'),
(11, 'Acceso Control Empresa', '4400', 'CONFIGURACION'),
(12, 'Acceso Control Sucursal', '4500', 'CONFIGURACION'),
(13, 'Acceso Control Almacen', '4600', 'CONFIGURACION'),
(14, 'Acceso Control de Proveedores', '5100', 'PROVEEDORES'),
(15, 'Acceso Control de Pedidos', '6100', 'VENTAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_producto`
--

CREATE TABLE `t_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_codigob` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `producto_fecha_alta` datetime DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `producto_ppublico` float NOT NULL,
  `producto_pfarm` float NOT NULL,
  `producto_pref` float NOT NULL,
  `producto_ultimo_costo` float DEFAULT NULL,
  `producto_costo_prom` float DEFAULT NULL,
  `producto_iva` int(11) NOT NULL DEFAULT '0',
  `producto_limitado` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producto_sustancia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producto_ieps` int(11) NOT NULL DEFAULT '0',
  `producto_controlado` int(11) NOT NULL DEFAULT '0',
  `producto_status_id` int(11) NOT NULL DEFAULT '1',
  `producto_tipo_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_producto`
--

INSERT INTO `t_producto` (`producto_id`, `producto_codigob`, `producto_fecha_alta`, `usuario_id`, `producto_descripcion`, `producto_ppublico`, `producto_pfarm`, `producto_pref`, `producto_ultimo_costo`, `producto_costo_prom`, `producto_iva`, `producto_limitado`, `producto_sustancia`, `producto_ieps`, `producto_controlado`, `producto_status_id`, `producto_tipo_id`) VALUES
(1, '1234567890', '2016-12-06 16:48:39', 1, 'PRIMER PRODUCTO', 90, 80, 70, NULL, NULL, 0, '', '', 0, 0, 1, 1),
(2, '987654321', '2016-12-06 16:49:23', 1, 'SEGUNDO PRODUCTO', 900, 780, 690, NULL, NULL, 0, '', '', 0, 0, 1, 1),
(3, 'SERVICIO1', '2016-12-06 17:13:05', 1, 'PRIMER SERVICIO', 100, 100, 100, NULL, NULL, 0, '', '', 0, 0, 1, 2),
(4, 'SERVICIO2', '2016-12-06 17:18:25', 1, 'SEGUNDO SERVICIO', 100, 100, 100, NULL, NULL, 16, '', '', 0, 0, 1, 2),
(5, '828282828282', '2016-12-06 18:20:57', 1, 'OTRO PRODUCTO', 900, 500, 300, NULL, NULL, 0, '', '', 0, 0, 1, 1),
(6, '8283938747', '2016-12-06 18:22:05', 1, 'PRODUCTO PRODUCTO', 100, 90, 80, NULL, NULL, 0, '', '', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_producto_status`
--

CREATE TABLE `t_producto_status` (
  `producto_status_id` int(11) NOT NULL,
  `producto_status_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_producto_status`
--

INSERT INTO `t_producto_status` (`producto_status_id`, `producto_status_nombre`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_producto_tipo`
--

CREATE TABLE `t_producto_tipo` (
  `producto_tipo_id` int(11) NOT NULL,
  `producto_tipo_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_producto_tipo`
--

INSERT INTO `t_producto_tipo` (`producto_tipo_id`, `producto_tipo_nombre`) VALUES
(1, 'PRODUCTO'),
(2, 'SERVICIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proveedor`
--

CREATE TABLE `t_proveedor` (
  `proveedor_id` int(11) NOT NULL,
  `proveedor_razon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `proveedor_rfc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor_direccion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor_telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor_dias_credito` int(11) DEFAULT NULL,
  `proveedor_limite_credito` float DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `proveedor_fecha_alta` datetime DEFAULT NULL,
  `proveedor_nombre_comercial` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor_correo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`proveedor_id`, `proveedor_razon`, `proveedor_rfc`, `proveedor_direccion`, `proveedor_telefono`, `proveedor_dias_credito`, `proveedor_limite_credito`, `usuario_id`, `proveedor_fecha_alta`, `proveedor_nombre_comercial`, `proveedor_correo`) VALUES
(1, 'PROVEEDOR 1', 'ewdewdewdewd', '', '', 0, 0, 1, '2016-12-12 12:07:13', '', ''),
(2, 'PROVEEDOR 3', '', '', '', 0, 0, 1, '2016-12-12 12:07:59', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_sucursal`
--

CREATE TABLE `t_sucursal` (
  `sucursal_id` int(11) NOT NULL,
  `sucursal_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `sucursal_fecha_alta` datetime DEFAULT NULL,
  `sucursal_direccion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_num_externo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_num_interno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_colonia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_cp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_ciudad` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucursal_estado` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_sucursal`
--

INSERT INTO `t_sucursal` (`sucursal_id`, `sucursal_nombre`, `empresa_id`, `usuario_id`, `sucursal_fecha_alta`, `sucursal_direccion`, `sucursal_num_externo`, `sucursal_num_interno`, `sucursal_colonia`, `sucursal_cp`, `sucursal_ciudad`, `sucursal_estado`) VALUES
(1, 'PRINCIPAL', 1, 1, '2016-12-06 10:28:37', '', '', '', '', '', '', ''),
(2, 'MATRIZ 10', 2, 1, '2016-12-06 10:33:53', 'DIRECCION DE LA SUCURSAL', '', '', '', '', '', ''),
(3, 'SUCURSAL 3', 2, 1, '2016-12-14 11:54:47', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_fecha_alta` datetime DEFAULT NULL,
  `usuario_registro` int(11) NOT NULL,
  `usuario_perfil_id` int(11) NOT NULL DEFAULT '1',
  `usuario_departamento_id` int(11) NOT NULL DEFAULT '1',
  `usuario_correo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario_user`, `usuario_pwd`, `usuario_fecha_alta`, `usuario_registro`, `usuario_perfil_id`, `usuario_departamento_id`, `usuario_correo`) VALUES
(1, 'Jorge', 'Gomez', '', 'administrador', '595b396dfee50a8df152d747ae3103d3', '2016-12-07 11:20:38', 1, 1, 1, 'correo@correo.com'),
(2, 'George', 'Gmess', '', 'georgegmes', '595b396dfee50a8df152d747ae3103d3', '2016-12-07 11:39:07', 1, 6, 1, 'gmes@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario_departamento`
--

CREATE TABLE `t_usuario_departamento` (
  `usuario_departamento_id` int(11) NOT NULL,
  `usuario_departamento_nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_departamento_fecha_alta` datetime DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuario_departamento`
--

INSERT INTO `t_usuario_departamento` (`usuario_departamento_id`, `usuario_departamento_nombre`, `usuario_departamento_fecha_alta`, `usuario_id`) VALUES
(1, 'SISTEMAS', '2016-12-07 10:32:30', 1),
(2, 'VENTAS', '2016-12-07 10:49:10', 1),
(3, 'COMPRAS', '2016-12-07 10:49:25', 1),
(8, 'ALMACEN', '2016-12-13 10:48:58', 1),
(9, 'CONTABILIDAD', '2016-12-13 10:49:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario_perfil`
--

CREATE TABLE `t_usuario_perfil` (
  `usuario_perfil_id` int(11) NOT NULL,
  `usuario_perfil_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_perfil_permisos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_perfil_fecha_alta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuario_perfil`
--

INSERT INTO `t_usuario_perfil` (`usuario_perfil_id`, `usuario_perfil_nombre`, `usuario_perfil_permisos`, `usuario_id`, `usuario_perfil_fecha_alta`) VALUES
(1, 'ADMINISTRADOR', '||1100||2100||3100||4100||4200||4300||4400||4500||4600||5100||6100', 1, '2016-12-07 10:27:15'),
(2, 'VENTAS', NULL, 1, '2016-12-07 10:50:13'),
(3, 'SUPER-USUARIO', NULL, 1, '2016-12-08 14:20:08'),
(6, 'COMPRAS', '||2100', 1, '2016-12-08 17:37:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_venta`
--

CREATE TABLE `t_venta` (
  `venta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `venta_fecha` datetime DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `venta_status_id` int(11) NOT NULL DEFAULT '1',
  `pedido_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `venta_subtotal` float DEFAULT NULL,
  `venta_iva` float DEFAULT NULL,
  `venta_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_venta`
--

INSERT INTO `t_venta` (`venta_id`, `usuario_id`, `venta_fecha`, `sucursal_id`, `venta_status_id`, `pedido_id`, `cliente_id`, `venta_subtotal`, `venta_iva`, `venta_total`) VALUES
(1, 1, '2016-12-13 08:23:42', 1, 1, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_venta_status`
--

CREATE TABLE `t_venta_status` (
  `venta_status_id` int(11) NOT NULL,
  `venta_status_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `t_venta_status`
--

INSERT INTO `t_venta_status` (`venta_status_id`, `venta_status_nombre`) VALUES
(1, 'COTIZACION'),
(2, 'COTIZACION CERRADA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_almacen`
--
ALTER TABLE `t_almacen`
  ADD PRIMARY KEY (`almacen_id`);

--
-- Indices de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `t_cliente_status`
--
ALTER TABLE `t_cliente_status`
  ADD PRIMARY KEY (`cliente_status_id`);

--
-- Indices de la tabla `t_empresa`
--
ALTER TABLE `t_empresa`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Indices de la tabla `t_existencia`
--
ALTER TABLE `t_existencia`
  ADD PRIMARY KEY (`existencia_id`);

--
-- Indices de la tabla `t_partidavt`
--
ALTER TABLE `t_partidavt`
  ADD PRIMARY KEY (`partidavt_id`);

--
-- Indices de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indices de la tabla `t_permiso`
--
ALTER TABLE `t_permiso`
  ADD PRIMARY KEY (`permiso_id`);

--
-- Indices de la tabla `t_producto`
--
ALTER TABLE `t_producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD UNIQUE KEY `producto_codigob` (`producto_codigob`);

--
-- Indices de la tabla `t_producto_status`
--
ALTER TABLE `t_producto_status`
  ADD PRIMARY KEY (`producto_status_id`);

--
-- Indices de la tabla `t_producto_tipo`
--
ALTER TABLE `t_producto_tipo`
  ADD PRIMARY KEY (`producto_tipo_id`);

--
-- Indices de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `t_sucursal`
--
ALTER TABLE `t_sucursal`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `t_usuario_departamento`
--
ALTER TABLE `t_usuario_departamento`
  ADD PRIMARY KEY (`usuario_departamento_id`);

--
-- Indices de la tabla `t_usuario_perfil`
--
ALTER TABLE `t_usuario_perfil`
  ADD PRIMARY KEY (`usuario_perfil_id`);

--
-- Indices de la tabla `t_venta`
--
ALTER TABLE `t_venta`
  ADD PRIMARY KEY (`venta_id`);

--
-- Indices de la tabla `t_venta_status`
--
ALTER TABLE `t_venta_status`
  ADD PRIMARY KEY (`venta_status_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_almacen`
--
ALTER TABLE `t_almacen`
  MODIFY `almacen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `t_cliente_status`
--
ALTER TABLE `t_cliente_status`
  MODIFY `cliente_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_empresa`
--
ALTER TABLE `t_empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_existencia`
--
ALTER TABLE `t_existencia`
  MODIFY `existencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `t_partidavt`
--
ALTER TABLE `t_partidavt`
  MODIFY `partidavt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_permiso`
--
ALTER TABLE `t_permiso`
  MODIFY `permiso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `t_producto`
--
ALTER TABLE `t_producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `t_producto_status`
--
ALTER TABLE `t_producto_status`
  MODIFY `producto_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_producto_tipo`
--
ALTER TABLE `t_producto_tipo`
  MODIFY `producto_tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  MODIFY `proveedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_sucursal`
--
ALTER TABLE `t_sucursal`
  MODIFY `sucursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_usuario_departamento`
--
ALTER TABLE `t_usuario_departamento`
  MODIFY `usuario_departamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `t_usuario_perfil`
--
ALTER TABLE `t_usuario_perfil`
  MODIFY `usuario_perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `t_venta`
--
ALTER TABLE `t_venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `t_venta_status`
--
ALTER TABLE `t_venta_status`
  MODIFY `venta_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
