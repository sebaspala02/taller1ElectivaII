
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
--
-- Base de datos: `farmacia`
--

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
(2, '33', 'armenia', 'njkaaaa', 'cra5', '22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


-- PROVEEDORPL

CREATE FUNCTION guardarProveedor (
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
IF NOT EXISTS(select nit from proveedor where nit=vnit)
	THEN
		insert into proveedor(nit,nombre,ciudad,direccion,telefono)
        values(vnit,vnombre,vciudad,vdireccion,vtelefono);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

-- DELIMITER //
CREATE FUNCTION modificarProveedor (
  `vidproveedor` INT,
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
END//
-- DELIMITER;

-- DELIMITER //
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
END//
-- DELIMITER;

-- BUSCAR Medi

-- DELIMITER//
CREATE PROCEDURE buscarProveedor(vidproveedor int)
	COMMENT'buscar'
BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor where id=vidproveedor;
END//



-- LISTAR Medicamento

-- DELIMITER//
CREATE PROCEDURE listarProveedor(vidproveedor int)
	COMMENT'listar'
BEGIN
	select id,nit,nombre,ciudad,direccion,telefono from proveedor order by id;
END//

