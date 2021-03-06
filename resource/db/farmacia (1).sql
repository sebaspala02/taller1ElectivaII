-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2020 a las 18:33:07
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET utf8 ;
USE `farmacia` ;
--

--
-- Base de datos: `farmacia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCliente` (`vidcliente` INT)  BEGIN
	select nombre,apellido,cedula,genero,fecha_naci from cliente where idcliente=vidcliente;
END$$

CREATE PROCEDURE  buscarProveedor(vidproveedor int)
	COMMENT'buscar'
BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor where id=vidproveedor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarMedi` (`vidmedicamento` INT)  BEGIN
	select nombre, descrip, fecha_venc, cant, fecha_creado, precio, usuario_idusuario, laboratorio_idlaboratorio from medicamento where idmedicamento=vidmedicamento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarUsuario` (`vidusuario` INT)  BEGIN
	select cedula,nombre,apellido,correo,tipoUsuario_idTipoUsuario,usuario,password from usuario where idusuario=vidusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarLaboratorio` (`vidlaboratorio` INT)  BEGIN
	select nombre,descrip from laboratorio where idlaboratorio=vidlaboratorio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarEstante` (`videstante` INT)  BEGIN
	select codigo,categoria,descripcion from estante where idestante=videstante;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCliente` (`vidcliente` INT)  BEGIN
	select idcliente,nombre,apellido,cedula,genero,fecha_naci from cliente order by idcliente;
END$$

CREATE PROCEDURE listarProveedor(vidproveedor int)
	COMMENT'listar'
BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor order by id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarMedi` (`vidmedicamento` INT)  BEGIN
	select m.idmedicamento,m.nombre, m.descrip as descripcion, m.fecha_venc as vencimiento, m.cant as cantidad, m.fecha_creado as registro, m.precio as precio, u.usuario as usuario, l.nombre as laboratorio, l.idlaboratorio from medicamento m join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio join usuario u on m.usuario_idusuario = u.idusuario order by idmedicamento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarUsuario` (`vidusuario` INT)  BEGIN
	select u.idusuario,u.cedula,u.nombre,u.apellido,u.correo, tp.nombre as tipousuario,u.usuario,u.password from usuario u join tipousuario tp on u.tipoUsuario_idTipoUsuario = tp.idTipoUsuario order by idusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarLaboratorio` (`vidlaboratorio` INT)  BEGIN
	select idlaboratorio,nombre,descrip from laboratorio order by idlaboratorio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarEstante` (`videstante` INT)  BEGIN
	select idestante,codigo,categoria,descripcion from estante order by idestante;
END$$


-- detalleVenta

-- LISTAR

-- DELIMITER//
CREATE PROCEDURE listarDetalleV(viddetalle_venta int)
	COMMENT'listar'
BEGIN
	select d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa=viddetalle_venta 
        order by iddetalle_venta;
END$$

-- call listarDetalleV(2);


-- venta

-- LISTAR

-- DELIMITER// select idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario from venta  order by idventa;
CREATE PROCEDURE listarVenta(vidventa int)
	COMMENT'listar'
BEGIN
	select v.idventa,DATE_FORMAT(fecha_venta,'%d/%m/%Y') as fecha_venta, valor_total,c.nombre as cliente, u.usuario as usuario_idusuario from venta v join cliente c on v.cliente_idcliente = c.idcliente join usuario u on v.usuario_idusuario=u.idusuario order by idventa;
END$$

-- call listarVenta(0);

-- Grafico 1

CREATE PROCEDURE listarGenero(vid INT)
BEGIN
	select c.genero,count(*) as total  from cliente c group by genero;
END$$

-- call listarGenero(0);

-- Grafico 2

CREATE PROCEDURE listarProd(vid INT)
BEGIN
	select m.nombre, sum(cant) as cantidad  from medicamento m group by nombre;
END$$

-- call listarProd(0);

-- Grafico 3
CREATE PROCEDURE listarVentaProd(vid INT)
BEGIN
select m.nombre,sum(dv.cant) as cantidad, sum(dv.cant * m.precio) as ganancia from medicamento m join detalle_venta dv on dv.medicamento_idmedicamento
= m.idmedicamento group by dv.medicamento_idmedicamento order by cantidad desc;
END$$

-- call listarVentaProd(0);

-- Grafico 4 
CREATE PROCEDURE listar4(vid INT)
BEGIN
	select u.nombre,u.apellido,u.cedula,u.usuario,count(*) as ventas, sum(v.valor_total) as ingresos  from usuario u join venta v on v.usuario_idusuario
	= u.idusuario group by v.usuario_idusuario order by ventas desc;
END$$

-- call listar4(0);

-- Grafico 5

CREATE PROCEDURE listar5(vid INT)
BEGIN
	select v.fecha_venta,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
	group by v.fecha_venta;
END$$

-- call listar5(0);

-- Grafico 5

CREATE PROCEDURE listar6(vid INT)
BEGIN
	SET lc_time_names = 'es_ES';
	select DAYNAME(v.fecha_venta) as dia,count(*) as ventas,sum(v.valor_total) as ingresos from venta v
	group by dia;
END$$

-- call listar6(0);

-- PL 1 EXCEL

CREATE PROCEDURE listarPlUno()
BEGIN
	select c.nombre,c.apellido,c.cedula,count(*) as compras, sum(v.valor_total) as invertido  from cliente c join venta v on v.cliente_idcliente
	= c.idcliente group by v.cliente_idcliente order by compras desc;
END$$


-- PL 2 EXCEL = grafico 4

CREATE PROCEDURE listarPlDos()
BEGIN
	select u.nombre,u.apellido,u.cedula,u.usuario,count(*) as ventas, sum(v.valor_total) as ingresos  from usuario u join venta v on v.usuario_idusuario
	= u.idusuario group by v.usuario_idusuario order by ventas desc;
END$$

-- PL 3 EXCEL

CREATE PROCEDURE listarPlTres()
BEGIN
	select m.nombre,l.nombre as laboratorio,m.descrip as descripcion,sum(dv.cant) as cantidad from medicamento m join detalle_venta dv on dv.medicamento_idmedicamento
	= m.idmedicamento join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio
	group by dv.medicamento_idmedicamento order by cantidad desc;
END$$


-- PL 4 EXCEL = grafico 5

CREATE PROCEDURE listarPlCuatro()
BEGIN
	select v.fecha_venta,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
	group by v.fecha_venta;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `editarMedicamento` (`vidmedicamento` INT, `vnombre` VARCHAR(45), `vdescrip` VARCHAR(45), `vfecha_venc` DATE, `vcant` INT, `vfecha_creado` DATE, `vprecio` INT, `vusuario_idusuario` INT, `vlaboratorio_idlaboratorio` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
	IF EXISTS(select idmedicamento from medicamento 
		where idmedicamento=vidmedicamento)
	THEN
		update medicamento set nombre=vnombre,descrip=vdescrip,fecha_venc=vfecha_venc,cant=vcant,
        fecha_creado=vfecha_creado,precio=vprecio,usuario_idusuario=vusuario_idusuario,
        laboratorio_idlaboratorio=vlaboratorio_idlaboratorio where idmedicamento = vidmedicamento;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarCliente` (`vidcliente` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select idcliente from cliente where idcliente=vidcliente)
	THEN
		DELETE FROM cliente WHERE (`idcliente` = `vidcliente`);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE FUNCTION eliminarProveedor (
  `vidproveedor` INT
  ) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select id from proveedor where id=id)
	THEN
		DELETE FROM proveedor WHERE (`id` = `vidproveedor`);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarMedicamento` (`vidmedicamento` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
	IF EXISTS(select idmedicamento from medicamento 
		where idmedicamento=vidmedicamento)
	THEN
		delete from medicamento where idmedicamento = vidmedicamento;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarUsuario` (`vidusuario` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select idusuario from usuario where idusuario=vidusuario)
	THEN
		DELETE FROM usuario WHERE (`idusuario` = `vidusuario`);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarLaboratorio` (`vidlaboratorio` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select idlaboratorio from laboratorio where idlaboratorio=vidlaboratorio)
	THEN
		DELETE FROM laboratorio WHERE (`idlaboratorio` = `vidlaboratorio`);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarEstante` (`videstante` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select idestante from estante where idestante=videstante)
	THEN
		DELETE FROM estante WHERE (`idestante` = `videstante`);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarLaboratorio` (`vnombre` VARCHAR(45), `vdescrip` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select nombre from laboratorio where nombre=vnombre)
	THEN
		insert into laboratorio(nombre,descrip)
        values(vnombre,vdescrip);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarProveedor` (`vnit` VARCHAR(45),`vnombre` VARCHAR(45),`vciudad` VARCHAR(45),`vdireccion` VARCHAR(45), `vtelefono` VARCHAR(45)) RETURNS INT(1)
  READS SQL DATA
  DETERMINISTIC
  BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select nit from proveedor where nit=vnit)
	THEN
		insert into proveedor(nit,nombre,ciudad,direccion,telefono)
        values(vnit,vnombre,vciudad,vdireccion,vtelefono);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarEstante` (`vcodigo` VARCHAR(45), `vcategoria` VARCHAR(45), `vdescripcion` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select codigo from estante where codigo=vcodigo)
	THEN
		insert into estante(codigo,categoria,descripcion)
        values(vcodigo,vcategoria,vdescripcion);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarCliente` (`vnombre` VARCHAR(45), `vapellido` VARCHAR(45), `vcedula` INT, `vgenero` VARCHAR(45), `vfecha_naci` DATE) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from cliente where cedula=vcedula)
	THEN
		insert into cliente(nombre,apellido,cedula,genero,fecha_naci)
        values(vnombre,vapellido,vcedula,vgenero,vfecha_naci);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarMedicamento` (`vnombre` VARCHAR(45), `vdescrip` VARCHAR(45), `vfecha_venc` DATE, `vcant` INT, `vfecha_creado` DATE, `vprecio` INT, `vusuario_idusuario` INT, `vlaboratorio_idlaboratorio` INT, `vproveedor_id` INT, `vestante_idestante` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
	IF NOT EXISTS(select idmedicamento from medicamento 
		where nombre=vnombre and laboratorio_idlaboratorio = vlaboratorio_idlaboratorio and proveedor_id = vproveedor_id and estante_idestante = vestante_idestante)
	THEN
		insert into medicamento(nombre, descrip, fecha_venc, cant, fecha_creado, precio, usuario_idusuario, laboratorio_idlaboratorio,proveedor_id,estante_idestante)
        values(vnombre,vdescrip,vfecha_venc,vcant,vfecha_creado,vprecio,vusuario_idusuario,vlaboratorio_idlaboratorio,vproveedor_id,vestante_idestante);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarUsuario` (`vcedula` INT, `vnombre` VARCHAR(45), `vapellido` VARCHAR(45), `vcorreo` VARCHAR(45), `vtipoUsuario` INT, `vusuario` VARCHAR(45), `vpassword` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from usuario where cedula=vcedula)
	THEN
		insert into usuario(cedula,nombre,apellido,correo,tipoUsuario_idTipoUsuario,usuario,password)
        values(vcedula,vnombre,vapellido,vcorreo,vtipoUsuario,vusuario,vpassword);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarVenta` (`vtotal` INT(20), `vinv` VARCHAR(2000), `vcant` VARCHAR(2000), `vcliente` INT(20), `vusuario` INT(20)) RETURNS INT(11) NO SQL
    DETERMINISTIC
BEGIN
DECLARE res INT DEFAULT 0;
DECLARE inv INT DEFAULT -1;
DECLARE can INT DEFAULT -1;
DECLARE id_ven INT DEFAULT -1;
DECLARE inv_old INT DEFAULT 0;
DECLARE inv_update INT;
insert into venta(valor_total,cliente_idcliente,usuario_idusuario)
VALUES (vtotal, vcliente, vusuario);

WHILE (LOCATE(',', vinv) > 0) DO

SET inv = ELT(1, vinv);
SET can = ELT(1, vcant);



SET inv_old = (SELECT cant FROM medicamento where idmedicamento = inv);
SET inv_update = inv_old - can;

SET id_ven = (SELECT MAX(idventa) from venta where cliente_idcliente=vcliente and usuario_idusuario=vusuario);

SET vinv = SUBSTRING(vinv, LOCATE(',',vinv) + 1);
SET vcant = SUBSTRING(vcant, LOCATE(',',vcant) + 1);

IF inv <> ',' THEN
INSERT INTO detalle_venta(cant, venta_idventa, medicamento_idmedicamento) VALUES (can, id_ven, inv);
UPDATE medicamento SET cant = inv_update WHERE idmedicamento = inv;
END IF;
END WHILE;
SET res = 1;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarCliente` (`vidcliente` INT, `vnombre` VARCHAR(45), `vapellido` VARCHAR(45), `vcedula` INT, `vgenero` VARCHAR(45), `vfecha_naci` DATE) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from cliente where cedula=vcedula and idcliente<>vidcliente)
	THEN
		update cliente
        set nombre=vnombre, apellido=vapellido, cedula=vcedula, genero=vgenero, fecha_naci=vfecha_naci
        where idcliente=vidcliente;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE FUNCTION modificarProveedor (
  `vidproveedor` INT,
  `vnit` VARCHAR(45),
  `vnombre` VARCHAR(45),
  `vciudad` VARCHAR(45),
  `vdireccion` VARCHAR(45),
  `vtelefono` VARCHAR(45)
  ) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select nit from proveedor where nit=vnit and id<>vidproveedor)
	THEN
		update proveedor
        set nit=vnit, nombre=vnombre, ciudad=vciudad, direccion=vdireccion, telefono=vtelefono
        where id=vidproveedor;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarUsuario` (`vidusuario` INT, `vcedula` INT, `vnombre` VARCHAR(45), `vapellido` VARCHAR(45), `vcorreo` VARCHAR(45),  `vtipoUsuario` INT, `vusuario` VARCHAR(45), `vpassword` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from usuario where cedula=vcedula and idusuario<>vidusuario)
	THEN
		update usuario
        set cedula=vcedula, nombre=vnombre, apellido=vapellido, correo=vcorreo, tipoUsuario_idTipoUsuario=vtipoUsuario, usuario=vusuario, password=vpassword
        where idusuario=vidusuario;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarLaboratorio` (`vidlaboratorio` INT, `vnombre` VARCHAR(45), `vdescrip` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select idlaboratorio from laboratorio where idlaboratorio=vidlaboratorio and nombre<>vnombre)
	THEN
		update laboratorio
        set nombre=vnombre, descrip=vdescrip
        where idlaboratorio=vidlaboratorio;
        
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarEstante` (`videstante` INT, `vcodigo` VARCHAR(45), `vcategoria` VARCHAR(45), `vdescripcion` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
    -- select idestante from estante where idestante=videstante and codigo<>vcodigo
IF NOT EXISTS(select codigo from estante where codigo=vcodigo and idestante<>videstante)
	THEN
		update estante
        set codigo=vcodigo, categoria=vcategoria, descripcion=vdescripcion
        where idestante=videstante;
        
        set res = 1;
	END IF;
RETURN res;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `fecha_naci` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `cedula`, `genero`, `fecha_naci`) VALUES
(1, 'Jairo', 'Salazar', '12345', 'Masculino', '2032-02-02'),
(2, 'willy', 'colon', '971', 'Masculino', '1987-03-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL,
  `medicamento_idmedicamento` int(11) NOT NULL,
  `venta_idventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `cant`, `medicamento_idmedicamento`, `venta_idventa`) VALUES
(1, 1, 2, 5),
(2, 1, 2, 6),
(3, 1, 1, 7),
(4, 1, 3, 7),
(5, 2, 3, 8),
(6, 1, 2, 9),
(7, 1, 2, 10),
(8, 2, 3, 10),
(9, 1, 2, 11),
(10, 1, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idlaboratorio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descrip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

CREATE TABLE `farmacia`.`estante` (
  `idestante` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL,
  `categoria` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idestante`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC));

-- CREATE TABLE `farmacia`.`estante` ( `idestante` INT(11) NOT NULL AUTO_INCREMENT , `codigo` VARCHAR(45) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL , `categoria` VARCHAR(45) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL , `descripcion` VARCHAR(45) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL , PRIMARY KEY (`idestante`(11)), UNIQUE `indice_codigo` (`codigo`(45))) ENGINE = InnoDB;

-- CREATE TABLE `estante` (
--  `idestante` int(11) NOT NULL,
--  `codigo` varchar(45) DEFAULT NULL,
--  `categoria` varchar(45) DEFAULT NULL,
--  `descripcion` varchar(45) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`idlaboratorio`, `nombre`, `descrip`) VALUES
(1, 'genfar', 'jajajajajajaja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idmedicamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descrip` varchar(45) DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `cant` varchar(45) DEFAULT NULL,
  `fecha_creado` date DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `laboratorio_idlaboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idmedicamento`, `nombre`, `descrip`, `fecha_venc`, `cant`, `fecha_creado`, `precio`, `usuario_idusuario`, `laboratorio_idlaboratorio`) VALUES
(1, 'ACETAMINOFEN', 'no sea', '2032-02-02', '0', '2020-02-02', 1, 13, 1),
(2, 'IBUPRO', 'ajkn', '2019-12-31', '16', '2021-12-02', 55, 13, 1),
(3, 'ADW', 'jn', '2017-12-31', '0', '2017-12-26', 100, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `cedula` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `tipoUsuario_idTipoUsuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `nombre`, `apellido`, `correo`, `tipoUsuario_idTipoUsuario`, `usuario`, `password`) VALUES
(1, 1094, 'sebas', 'pala', 'sebas@pala.com', 1, 'admin', 123),
(2, 1, 'Brian', 'Lopez', 'empl@asd.com', 2, 'empleado', 341),
(3, 22, 'da', 'dwa', 'daw@as.com', 3, 'cliente', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoUsuario`
--

CREATE TABLE `tipoUsuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoUsuario`
--

INSERT INTO `tipoUsuario` (`idTipoUsuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `valor_total` int(11) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha_venta`, `valor_total`, `cliente_idcliente`, `usuario_idusuario`) VALUES
(5, '2020-01-12', 55, 1, 13),
(6, '2020-02-21', 55, 1, 13),
(7, '2020-03-27', 101, 1, 13),
(8, '2020-04-01', 55, 2, 13),
(9, '2020-09-23', 255, 1, 13),
(10, '2020-11-12', 55, 2, 13),
(11, '2020-12-31', 55, 1, 13),
(12, '2017-12-31', 55, 1, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `medicamento_idmedicamento` (`medicamento_idmedicamento`),
  ADD KEY `venta_idventa` (`venta_idventa`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`idlaboratorio`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idmedicamento`),
  ADD KEY `usuario_idusuario` (`usuario_idusuario`),
  ADD KEY `laboratorio_idlaboratorio` (`laboratorio_idlaboratorio`);

-- tipoUsuario
-- Indices de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `tipoUsuario_idTipoUsuario` (`tipoUsuario_idTipoUsuario`);
  

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `cliente_idcliente` (`cliente_idcliente`),
  ADD KEY `usuario_idusuario` (`usuario_idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idlaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- tipoUsuario
-- AUTO_INCREMENT de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`medicamento_idmedicamento`) REFERENCES `medicamento` (`idmedicamento`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`venta_idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `medicamento_ibfk_1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `medicamento_ibfk_2` FOREIGN KEY (`laboratorio_idlaboratorio`) REFERENCES `laboratorio` (`idlaboratorio`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoUsuario_idTipoUsuario`) REFERENCES `tipoUsuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;