-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 20:09:56
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCustomer` (IN `vidusuario` INT)  NO SQL
BEGIN
	select idusuario,cedula,nombre,apellido,correo,tipoUsuario_idTipoUsuario,usuario,password,puntos from usuario where cedula=vidusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarEstante` (`videstante` INT)  BEGIN
	select codigo,categoria,descripcion from estante where idestante=videstante;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarLaboratorio` (`vidlaboratorio` INT)  BEGIN
	select nombre,descrip from laboratorio where idlaboratorio=vidlaboratorio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarMedi` (IN `vidmedicamento` INT)  BEGIN
	select nombre, descrip, fecha_venc, cant, fecha_creado, precio, usuario_idusuario, laboratorio_idlaboratorio, proveedor_id, estante_idestante from medicamento where idmedicamento=vidmedicamento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProveedor` (IN `vidproveedor` INT)  BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor where id=vidproveedor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarUsuario` (`vidusuario` INT)  BEGIN
	select cedula,nombre,apellido,correo,tipoUsuario_idTipoUsuario,usuario,password from usuario where idusuario=vidusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar4` (`vid` INT)  BEGIN
	select u.nombre,u.apellido,u.cedula,u.usuario,count(*) as ventas, sum(v.valor_total) as ingresos  from usuario u join venta v on v.usuario_idusuario
	= u.idusuario group by v.usuario_idusuario order by ventas desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar5` (`vid` INT)  BEGIN
	select v.fecha_venta,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
	group by v.fecha_venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar6` (`vid` INT)  BEGIN
	SET lc_time_names = 'es_ES';
	select DAYNAME(v.fecha_venta) as dia,count(*) as ventas,sum(v.valor_total) as ingresos from venta v
	group by dia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCliente` (`vidcliente` INT)  BEGIN
	select idcliente,nombre,apellido,cedula,genero,fecha_naci from cliente order by idcliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarClientes` (IN `vidcliente` INT)  BEGIN
	select idusuario,cedula,nombre,apellido,correo,usuario from usuario where tipoUsuario_idTipoUsuario = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCustomer` (IN `vidusuario` INT)  NO SQL
BEGIN
	select u.idusuario,u.cedula,u.nombre,u.apellido,u.correo, tp.nombre as tipousuario,u.usuario,u.password,u.puntos from usuario u join tipousuario tp on u.tipoUsuario_idTipoUsuario = tp.idTipoUsuario where u.tipoUsuario_idTipoUsuario = 3 order by idusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarDetalleV` (`viddetalle_venta` INT)  BEGIN
	select d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa=viddetalle_venta 
        order by iddetalle_venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarEstante` (`videstante` INT)  BEGIN
	select idestante,codigo,categoria,descripcion from estante order by idestante;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarGenero` (`vid` INT)  BEGIN
	select c.genero,count(*) as total  from cliente c group by genero;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarhc` (IN `vcedula` INT)  NO SQL
select v.idventa,DATE_FORMAT(fecha_venta,'%d/%m/%Y') as fecha_venta, valor_total,u.nombre as cliente, u.idusuario as usuario_idusuario from venta v join usuario u on v.cliente_idcliente=u.idusuario where u.cedula=vcedula order by idventa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarHistorialCustomer` (IN `vcedula` INT)  NO SQL
select v.idventa,DATE_FORMAT(fecha_venta,'%d/%m/%Y') as fecha_venta, valor_total,u.nombre as cliente, u.idusuario as usuario_idusuario from venta v join usuario u on v.cliente_idcliente=u.idusuario where u.cedula=8990 order by idventa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarLaboratorio` (`vidlaboratorio` INT)  BEGIN
	select idlaboratorio,nombre,descrip from laboratorio order by idlaboratorio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarMedi` (IN `vidmedicamento` INT)  BEGIN
	select m.idmedicamento,m.nombre, m.descrip as descripcion, m.fecha_venc as vencimiento, m.cant as cantidad, m.fecha_creado as registro, m.precio as precio, u.usuario as usuario, l.nombre as laboratorio,p.nombre as proveedor, e.categoria as estanteria from medicamento m join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio join usuario u on m.usuario_idusuario = u.idusuario join proveedor p on m.proveedor_id = p.id join estante e on m.estante_idestante = e.idestante order by idmedicamento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPlCuatro` ()  BEGIN
	select v.fecha_venta,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
	group by v.fecha_venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPlDos` ()  BEGIN
	select u.nombre,u.apellido,u.cedula,u.usuario,count(*) as ventas, sum(v.valor_total) as ingresos  from usuario u join venta v on v.usuario_idusuario
	= u.idusuario group by v.usuario_idusuario order by ventas desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPlTres` ()  BEGIN
	select m.nombre,l.nombre as laboratorio,m.descrip as descripcion,sum(dv.cant) as cantidad from medicamento m join detalle_venta dv on dv.medicamento_idmedicamento
	= m.idmedicamento join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio
	group by dv.medicamento_idmedicamento order by cantidad desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPlUno` ()  BEGIN
	select c.nombre,c.apellido,c.cedula,count(*) as compras, sum(v.valor_total) as invertido  from cliente c join venta v on v.cliente_idcliente
	= c.idcliente group by v.cliente_idcliente order by compras desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarProd` (`vid` INT)  BEGIN
	select m.nombre, sum(cant) as cantidad  from medicamento m group by nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarProveedor` (IN `vidproveedor` INT)  BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor order by id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarUsuario` (IN `vidusuario` INT)  BEGIN
	select u.idusuario,u.cedula,u.nombre,u.apellido,u.correo, tp.nombre as tipousuario,u.usuario,u.password,u.puntos from usuario u join tipousuario tp on u.tipoUsuario_idTipoUsuario = tp.idTipoUsuario order by idusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarVenta` (`vidventa` INT)  BEGIN
	select v.idventa,DATE_FORMAT(fecha_venta,'%d/%m/%Y') as fecha_venta, valor_total,c.nombre as cliente, u.usuario as usuario_idusuario from venta v join cliente c on v.cliente_idcliente = c.idcliente join usuario u on v.usuario_idusuario=u.idusuario order by idventa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarVentaProd` (`vid` INT)  BEGIN
select m.nombre,sum(dv.cant) as cantidad, sum(dv.cant * m.precio) as ganancia from medicamento m join detalle_venta dv on dv.medicamento_idmedicamento
= m.idmedicamento group by dv.medicamento_idmedicamento order by cantidad desc;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `editarMedicamento` (`vidmedicamento` INT, `vnombre` VARCHAR(45), `vdescrip` VARCHAR(45), `vfecha_venc` DATE, `vcant` INT, `vfecha_creado` DATE, `vprecio` INT, `vusuario_idusuario` INT, `vlaboratorio_idlaboratorio` INT, `vproveedor_id` INT, `vestante_idestante` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
	IF EXISTS(select idmedicamento from medicamento 
		where idmedicamento=vidmedicamento)
	THEN
		update medicamento set nombre=vnombre,descrip=vdescrip,fecha_venc=vfecha_venc,cant=vcant,  
fecha_creado=vfecha_creado,precio=vprecio,usuario_idusuario=vusuario_idusuario,laboratorio_idlaboratorio=vlaboratorio_idlaboratorio,
proveedor_id=vproveedor_id, estante_idestante=vestante_idestante where idmedicamento = vidmedicamento;
        
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

CREATE DEFINER=`root`@`localhost` FUNCTION `eliminarProveedor` (`vidproveedor` INT) RETURNS INT(1) READS SQL DATA
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

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarMedicamento` (`vnombre` VARCHAR(45), `vdescrip` VARCHAR(45), `vfecha_venc` DATE, `vcant` INT, `vfecha_creado` DATE, `vprecio` INT, `vusuario_idusuario` INT, `vlaboratorio_idlaboratorio` INT, `vproveedor_id` INT, `vestante_idestante` INT) RETURNS INT(1) READS SQL DATA
    DETERMINISTIC
    COMMENT 'no se que estoy haciendo'
BEGIN
	DECLARE res INT DEFAULT 0;
	IF NOT EXISTS(select idmedicamento from medicamento 
		where nombre=vnombre and laboratorio_idlaboratorio = vlaboratorio_idlaboratorio)
	THEN
		insert into medicamento(nombre, descrip, fecha_venc, cant, fecha_creado, 	 precio,usuario_idusuario, laboratorio_idlaboratorio,proveedor_id,estante_idestante)
        values(vnombre,vdescrip,vfecha_venc,vcant,vfecha_creado,vprecio,vusuario_idusuario,
	vlaboratorio_idlaboratorio,vproveedor_id,vestante_idestante);
        set res = 1;
	END IF;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarProveedor` (`vnit` VARCHAR(45), `vnombre` VARCHAR(45), `vciudad` VARCHAR(45), `vdireccion` VARCHAR(45), `vtelefono` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
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

CREATE DEFINER=`root`@`localhost` FUNCTION `guardarVenta` (`vtotal` INT(20), `vinv` VARCHAR(2000), `vcant` VARCHAR(2000), `vcliente` INT(20), `vusuario` INT(20), `vpuntos` INT(20)) RETURNS INT(11) NO SQL
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
UPDATE usuario SET puntos = puntos + vpuntos WHERE idusuario = vcliente;
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

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarProveedor` (`vidproveedor` INT, `vnit` VARCHAR(45), `vnombre` VARCHAR(45), `vciudad` VARCHAR(45), `vdireccion` VARCHAR(45), `vtelefono` VARCHAR(45)) RETURNS INT(1) READS SQL DATA
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

CREATE DEFINER=`root`@`localhost` FUNCTION `modificarUsuario` (`vidusuario` INT, `vcedula` INT, `vnombre` VARCHAR(45), `vapellido` VARCHAR(45), `vcorreo` VARCHAR(45), `vtipoUsuario` INT, `vusuario` VARCHAR(45), `vpassword` INT) RETURNS INT(1) READS SQL DATA
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
(2, 'willy', 'colon', '971', 'Masculino', '1987-03-12'),
(3, 'juan', 'palacio', '2147483647', 'Masculino', '1998-02-08'),
(4, 'juana', 'de arco', '1245787', 'Femenino', '2020-04-21');

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
(1, 1, 2, 2),
(2, 1, 6, 3),
(3, 1, 6, 4),
(4, 3, 6, 5),
(5, 2, 6, 6),
(6, 1, 2, 7),
(7, 1, 6, 7),
(8, 3, 6, 8),
(9, 2, 2, 9),
(10, 8, 2, 10),
(11, 9, 2, 11),
(12, 10, 2, 12),
(13, 9, 2, 13),
(14, 14, 2, 14),
(15, 8, 2, 15),
(16, 8, 2, 16),
(17, 13, 2, 17),
(18, 7, 2, 18),
(19, 9, 2, 19),
(20, 8, 2, 20),
(21, 8, 2, 21),
(22, 7, 2, 22),
(23, 3, 2, 23),
(24, 1, 2, 24),
(25, 1, 2, 25),
(26, 8, 2, 26),
(27, 7, 2, 27),
(28, 8, 2, 28),
(29, 1, 6, 30),
(30, 1, 2, 31),
(31, 1, 2, 32),
(32, 1, 6, 32),
(33, 20, 2, 33),
(34, 1, 6, 33),
(35, 1, 2, 34),
(36, 14, 6, 34),
(37, 10, 2, 35),
(38, 10, 6, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

CREATE TABLE `estante` (
  `idestante` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estante`
--

INSERT INTO `estante` (`idestante`, `codigo`, `categoria`, `descripcion`) VALUES
(3, 'a-1', 'Jeringas', 'Agujas para aplicar medicamentos'),
(4, 'b-1', 'Medicamentos', 'Medicina general'),
(5, 'c-1', 'Suplemetos', 'Vitaminas, Mega-Gainer .. etc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idlaboratorio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descrip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`idlaboratorio`, `nombre`, `descrip`) VALUES
(1, 'genfar', 'medicamentos pre-condición'),
(2, 'mk', 'lab mk company'),
(5, 'PRUEBA', 'prueba'),
(6, 'test', 'no se');

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
  `usuario_idusuario` int(11) DEFAULT NULL,
  `laboratorio_idlaboratorio` int(11) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `estante_idestante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idmedicamento`, `nombre`, `descrip`, `fecha_venc`, `cant`, `fecha_creado`, `precio`, `usuario_idusuario`, `laboratorio_idlaboratorio`, `proveedor_id`, `estante_idestante`) VALUES
(1, 'ACETAMINOFEN', 'no sea', '2032-02-02', '200', '2020-02-02', 1, 13, 1, 1, 3),
(2, 'IBUPRO', 'ajkn', '2019-12-31', '621', '2021-12-02', 1500, 13, 2, 3, 4),
(3, 'ADW', 'jn', '2017-12-31', '100', '2017-12-26', 100, 13, 1, 2, 5),
(6, 'prueba', 'prueba', '2017-12-31', '83', '2017-12-01', 1, 13, 5, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nit` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nit`, `nombre`, `ciudad`, `direccion`, `telefono`) VALUES
(1, '989890809', 'UIUIOUIOUIO', 'UIOUIOUOIU', 'IUIUIOUO', '8909890809'),
(2, '33', 'armenia', 'njkaaaa', 'cra5', '22'),
(3, '777', 'a', 'a', 'a', '1'),
(4, '111111111', 'XXXXXX', 'XXXXX', 'XXXX', '9090909'),
(5, '8789787', 'uyuyyi', 'yiuyuyuyi', 'yuyyuiuyi', '78789789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

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
  `password` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `cedula`, `nombre`, `apellido`, `correo`, `tipoUsuario_idTipoUsuario`, `usuario`, `password`, `puntos`) VALUES
(13, 1, 'willi', 'ortiz', 'w@o.com', 1, 'williadmin', 123, 0),
(14, 12321312, 'PRUEBA', 'prueba', 'p@a.com', 2, 'prueba', 123, 0),
(15, 14355, 'cliente1', 'gomez', 'korreo@ocr.com', 3, 'ufho3', 5343, 1100),
(16, 8990, 'pruebaC1', 'pruebaC1', 'pruebaC1@correo.com', 3, 'pruebaC1', 123, 0),
(18, 123, 'johnny', 'salazar', 'salazar@quest.com', 3, 'johnny', 123, 700),
(19, 321, 'sebas', 'pala', 'sebas@pala.com', 1, 'sebasAdmin', 123, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha_venta` date DEFAULT current_timestamp(),
  `valor_total` int(11) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha_venta`, `valor_total`, `cliente_idcliente`, `usuario_idusuario`) VALUES
(2, '2020-05-28', 55, 15, 14),
(3, '2020-05-28', 1, 15, 14),
(4, '2020-05-28', 1, 15, 14),
(5, '2020-05-28', 3, 15, 14),
(6, '2020-05-28', 2, 15, 14),
(7, '2020-05-28', 56, 15, 14),
(8, '2020-05-28', 3, 15, 14),
(9, '2020-05-28', 110, 15, 14),
(10, '2020-05-28', 12000, 15, 14),
(11, '2020-05-28', 13500, 15, 14),
(12, '2020-05-28', 15000, 15, 14),
(13, '2020-05-28', 13500, 15, 14),
(14, '2020-05-28', 21000, 15, 14),
(15, '2020-05-28', 12000, 15, 14),
(16, '2020-05-28', 12000, 15, 14),
(17, '2020-05-28', 19500, 15, 14),
(18, '2020-05-28', 10500, 15, 14),
(19, '2020-05-28', 13500, 15, 14),
(20, '2020-05-28', 12000, 15, 14),
(21, '2020-05-28', 12000, 15, 14),
(22, '2020-05-28', 10500, 15, 14),
(23, '2020-05-28', 4500, 15, 14),
(24, '2020-05-28', 1500, 15, 14),
(25, '2020-05-28', 1500, 15, 14),
(26, '2020-05-28', 12000, 15, 14),
(27, '2020-05-28', 10500, 15, 14),
(28, '2020-05-28', 12000, 15, 14),
(30, '2020-05-29', 1, 15, 14),
(31, '2020-05-29', 1500, 16, 14),
(32, '2020-05-29', 1501, 18, 14),
(33, '2020-05-29', 30001, 18, 14),
(34, '2020-05-29', 1514, 18, 14),
(35, '2020-05-29', 15000, 18, 14),
(36, '2020-05-29', 10, 18, 14);

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
-- Indices de la tabla `estante`
--
ALTER TABLE `estante`
  ADD PRIMARY KEY (`idestante`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

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
  ADD KEY `laboratorio_idlaboratorio` (`laboratorio_idlaboratorio`) USING BTREE,
  ADD KEY `estante_idestante` (`estante_idestante`) USING BTREE,
  ADD KEY `medicamento_ibfk_3` (`proveedor_id`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
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
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `estante`
--
ALTER TABLE `estante`
  MODIFY `idestante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idlaboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idmedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  ADD CONSTRAINT `medicamento_ibfk_2` FOREIGN KEY (`laboratorio_idlaboratorio`) REFERENCES `laboratorio` (`idlaboratorio`),
  ADD CONSTRAINT `medicamento_ibfk_3` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `medicamento_ibfk_4` FOREIGN KEY (`estante_idestante`) REFERENCES `estante` (`idestante`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tipoUsuarioFK` FOREIGN KEY (`tipoUsuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_clietne` FOREIGN KEY (`cliente_idcliente`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
