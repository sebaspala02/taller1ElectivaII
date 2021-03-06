-- MySQL Script generated by MySQL Workbench
-- Fri Feb 14 20:30:33 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET utf8 ;
USE `farmacia` ;

-- -----------------------------------------------------
-- Table `farmacia`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`usuario` (
  `idusuario` INT NOT NULL auto_increment,
  `cedula` INT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NULL,
  `password` INT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`laboratorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`laboratorio` (
  `idlaboratorio` INT NOT NULL auto_increment,
  `nombre` VARCHAR(45) NULL,
  `descrip` VARCHAR(45) NULL,
  PRIMARY KEY (`idlaboratorio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`medicamento` (
  `idmedicamento` INT NOT NULL auto_increment,
  `nombre` VARCHAR(45) NULL,
  `descrip` VARCHAR(45) NULL,
  `fecha_venc` DATE NULL,
  `cant` VARCHAR(45) NULL,
  `fecha_creado` DATE NULL,
  `precio` INT NULL,
  `usuario_idusuario` INT NOT NULL,
  `laboratorio_idlaboratorio` INT NOT NULL,
  PRIMARY KEY (`idmedicamento`),
  -- INDEX `fk_medicamento_usuario_idx` (`usuario_idusuario` ASC) VISIBLE,
  -- INDEX `fk_medicamento_laboratorio1_idx` (`laboratorio_idlaboratorio` ASC) VISIBLE,
  -- CONSTRAINT `fk_medicamento_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `farmacia`.`usuario` (`idusuario`),
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION,
  -- CONSTRAINT `fk_medicamento_laboratorio1`
    FOREIGN KEY (`laboratorio_idlaboratorio`)
    REFERENCES `farmacia`.`laboratorio` (`idlaboratorio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`cliente` (
  `idcliente` INT NOT NULL auto_increment,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `cedula` VARCHAR(45) NULL,
  `genero` VARCHAR(45) NULL,
  `fecha_naci` DATE NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`venta` (
  `idventa` INT NOT NULL auto_increment,
  `fecha_venta` DATETIME NULL,
  `valor_total` INT NULL,
  `cliente_idcliente` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idventa`),
  -- INDEX `fk_venta_cliente1_idx` (`cliente_idcliente` ASC) VISIBLE,
  -- INDEX `fk_venta_usuario1_idx` (`usuario_idusuario` ASC) VISIBLE,
  -- CONSTRAINT `fk_venta_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `farmacia`.`cliente` (`idcliente`),
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION,
  -- CONSTRAINT `fk_venta_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `farmacia`.`usuario` (`idusuario`))
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`detalle_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farmacia`.`detalle_venta` (
  `iddetalle_venta` INT NOT NULL auto_increment,
  `cant` INT NULL,
  `medicamento_idmedicamento` INT NOT NULL,
  `venta_idventa` INT NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),
  -- INDEX `fk_detalle_venta_medicamento1_idx` (`medicamento_idmedicamento` ASC) VISIBLE,
  -- INDEX `fk_detalle_venta_venta1_idx` (`venta_idventa` ASC) VISIBLE,
  -- CONSTRAINT `fk_detalle_venta_medicamento1`
    FOREIGN KEY (`medicamento_idmedicamento`)
    REFERENCES `farmacia`.`medicamento` (`idmedicamento`),
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION,
  -- CONSTRAINT `fk_detalle_venta_venta1`
    FOREIGN KEY (`venta_idventa`)
    REFERENCES `farmacia`.`venta` (`idventa`))
    -- ON DELETE NO ACTION
    -- ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNmedicamento_ibfk_2IQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `farmacia`.`usuario` (`cedula`, `nombre`, `apellido`, `correo`, `usuario`, `password`) VALUES ('1094', 'sebas', 'pala', 'sebas@pala.com', 'admin', '123');

INSERT INTO `farmacia`.`laboratorio` (`nombre`, `descrip`) VALUES ('genfar', 'jajajajajajaja');

INSERT INTO `farmacia`.`medicamento` (`nombre`, `descrip`, `fecha_venc`, `cant`, `fecha_creado`, `precio`, `usuario_idusuario`, `laboratorio_idlaboratorio`) VALUES ('acetaminofem', 'no se', '2032-02-02', '1', '2020-02-02', '1', '1', '1');

INSERT INTO `farmacia`.`cliente` (`nombre`, `apellido`, `cedula`, `genero`, `fecha_naci`) VALUES ('Jairo', 'Salazar', '12345', 'Masculino', '2032-02-02');

-- GUARDAR USUARIO

DELIMITER //
CREATE FUNCTION guardarUsuario ( `vcedula` INT,
  `vnombre` VARCHAR(45),
  `vapellido` VARCHAR(45),
  `vcorreo` VARCHAR(45),
  `vusuario` VARCHAR(45),
  `vpassword` INT) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from usuario where cedula=vcedula)
	THEN
		insert into usuario(cedula,nombre,apellido,correo,usuario,password)
        values(vcedula,vnombre,vapellido,vcorreo,vusuario,vpassword);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

select guardarUsuario (4444,'alejo','hoyos','alejo@hoyos.com','hpta',0000);

-- ELIMINAR USUARIO

DELIMITER //
CREATE FUNCTION eliminarUsuario ( `vidusuario` INT) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
    -- select idusuario from usuario where idusuario=vidusuario
IF NOT EXISTS(select m.usuario_idusuario from medicamento m join usuario u  on u.idusuario = m.usuario_idusuario where idusuario=vidusuario)
	THEN
		DELETE FROM usuario WHERE (`idusuario` = `vidusuario`);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

/*select eliminarUsuario (5);*/

-- LISTAR

/*DELIMITER//*/
CREATE PROCEDURE listarUsuario(vidusuario int)
	COMMENT'listar'
BEGIN
	select idusuario,cedula,nombre,apellido,correo,usuario,password from usuario order by idusuario;
END//

call listarUsuario(1);

-- MODIFICAR USUARIO

DELIMITER //
CREATE FUNCTION modificarUsuario ( `vidusuario` INT,
  `vcedula` INT,
  `vnombre` VARCHAR(45),
  `vapellido` VARCHAR(45),
  `vcorreo` VARCHAR(45),
  `vusuario` VARCHAR(45),
  `vpassword` INT) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from usuario where cedula=vcedula and idusuario<>vidusuario)
	THEN
		update usuario
        set cedula=vcedula, nombre=vnombre, apellido=vapellido, correo=vcorreo, usuario=vusuario, password=vpassword
        where idusuario=vidusuario;
        
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

select modificarUsuario (3,3333,'hell','bad','hell@bad.com','jeje',123);


-- BUSCAR

-- DELIMITER//
CREATE PROCEDURE buscarUsuario(vidusuario int)
	COMMENT'buscar'
BEGIN
	select cedula,nombre,apellido,correo,usuario,password from usuario where idusuario=vidusuario;
END//

call buscarUsuario(3);

-- _______________________________________CLIENTE_______________________________________________________________

-- GUARDAR Cliente

-- DELIMITER //
CREATE FUNCTION guardarCliente ( `vnombre` VARCHAR(45),
  `vapellido` VARCHAR(45),
  `vcedula` INT,
  `vgenero` VARCHAR(45),
  `vfecha_naci` DATE) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
IF NOT EXISTS(select cedula from cliente where cedula=vcedula)
	THEN
		insert into cliente(nombre,apellido,cedula,genero,fecha_naci)
        values(vnombre,vapellido,vcedula,vgenero,vfecha_naci);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

select guardarCliente ('willy','colon',0971,'Masculino','1987-03-12');

-- ELIMINAR USUARIO

-- DELIMITER //
CREATE FUNCTION eliminarCliente ( `vidcliente` INT) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
IF EXISTS(select idcliente from cliente where idcliente=vidcliente)
	THEN
		DELETE FROM cliente WHERE (`idcliente` = `vidcliente`);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

-- select eliminarCliente (5);

-- LISTAR Cliente

-- DELIMITER//
CREATE PROCEDURE listarCliente(vidcliente int)
	COMMENT'listar'
BEGIN
	select idcliente,nombre,apellido,cedula,genero,fecha_naci from cliente order by idcliente;
END//

call listarCliente(0);

-- MODIFICAR Cliente

-- DELIMITER //
CREATE FUNCTION modificarCliente ( `vidcliente` INT,
  `vnombre` VARCHAR(45),
  `vapellido` VARCHAR(45),
  `vcedula` INT,
  `vgenero` VARCHAR(45),
  `vfecha_naci` DATE) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
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
END//
-- DELIMITER;

select modificarCliente (4,'pedro','navaja',2345567,'Femenino','1987-03-12');


-- BUSCAR Cliente

-- DELIMITER//
CREATE PROCEDURE buscarCliente(vidcliente int)
	COMMENT'buscar'
BEGIN
	select nombre,apellido,cedula,genero,fecha_naci from cliente where idcliente=vidcliente;
END//

call buscarCliente(3);

-- ______________________________________MEDICAMENTO_________________________________________________

-- DELIMITER //
CREATE FUNCTION guardarMedicamento (
  `vnombre` VARCHAR(45),
  `vdescrip` VARCHAR(45),
  `vfecha_venc` DATE,
  `vcant` INT,
  `vfecha_creado` DATE,
  `vprecio` INT,
  `vusuario_idusuario` INT,
  `vlaboratorio_idlaboratorio` INT
  ) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
	IF NOT EXISTS(select idmedicamento from medicamento 
		where nombre=vnombre and laboratorio_idlaboratorio = vlaboratorio_idlaboratorio)
	THEN
		insert into medicamento(nombre, descrip, fecha_venc, cant, fecha_creado, precio, usuario_idusuario, laboratorio_idlaboratorio)
        values(vnombre,vdescrip,vfecha_venc,vcant,vfecha_creado,vprecio,vusuario_idusuario,vlaboratorio_idlaboratorio);
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

-- DELIMITER //
CREATE FUNCTION editarMedicamento (
  `vidmedicamento` INT,
  `vnombre` VARCHAR(45),
  `vdescrip` VARCHAR(45),
  `vfecha_venc` DATE,
  `vcant` INT,
  `vfecha_creado` DATE,
  `vprecio` INT,
  `vusuario_idusuario` INT,
  `vlaboratorio_idlaboratorio` INT
  ) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
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
END//
-- DELIMITER;

-- DELIMITER //
CREATE FUNCTION eliminarMedicamento (
  `vidmedicamento` INT
  ) RETURNS INT(1)
  
  READS SQL DATA
  DETERMINISTIC
  COMMENT"no se que estoy haciendo"
  BEGIN
	DECLARE res INT DEFAULT 0;
	IF EXISTS(select idmedicamento from medicamento 
		where idmedicamento=vidmedicamento)
	THEN
		delete from medicamento where idmedicamento = vidmedicamento;
        
        set res = 1;
	END IF;
RETURN res;
END//
-- DELIMITER;

-- BUSCAR Medi

-- DELIMITER//
CREATE PROCEDURE buscarMedi(vidmedicamento int)
	COMMENT'buscar'
BEGIN
	select nombre, descrip, fecha_venc, cant, fecha_creado, precio, usuario_idusuario, laboratorio_idlaboratorio from medicamento where idmedicamento=vidmedicamento;
END//

call buscarMedi(3);


-- LISTAR Medicamento

-- DELIMITER//
CREATE PROCEDURE listarMedi(vidmedicamento int)
	COMMENT'listar'
BEGIN
	select m.idmedicamento,m.nombre, m.descrip as descripcion, m.fecha_venc as vencimiento, m.cant as cantidad, m.fecha_creado as registro, m.precio as precio, u.usuario as usuario, l.nombre as laboratorio, l.idlaboratorio from medicamento m join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio join usuario u on m.usuario_idusuario = u.idusuario order by idmedicamento;
END//

call listarMedi(0);

-- detalleVenta

-- LISTAR

-- DELIMITER//
CREATE PROCEDURE listarDetalleV(viddetalle_venta int)
	COMMENT'listar'
BEGIN
	select d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa=viddetalle_venta 
        order by iddetalle_venta;
END//

call listarDetalleV(2);


-- venta

-- LISTAR

-- DELIMITER//
CREATE PROCEDURE listarVenta(vidventa int)
	COMMENT'listar'
BEGIN
	select idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario from venta  order by idventa;
END//

call listarVenta(0);


-- PL 1 EXCEL

CREATE PROCEDURE listarPlUno()
BEGIN
	select c.nombre,c.apellido,c.cedula,count(*) as compras, sum(v.valor_total) as invertido  from cliente c join venta v on v.cliente_idcliente
	= c.idcliente group by v.cliente_idcliente order by compras desc;
END//


-- PL 2 EXCEL

CREATE PROCEDURE listarPlDos()
BEGIN
	select u.nombre,u.apellido,u.cedula,u.usuario,count(*) as ventas, sum(v.valor_total) as ingresos  from usuario u join venta v on v.usuario_idusuario
	= u.idusuario group by v.usuario_idusuario order by ventas desc;
END//

-- PL 3 EXCEL

CREATE PROCEDURE listarPlTres()
BEGIN
	select m.nombre,l.nombre as laboratorio,m.descrip as descripción,count(*) as cantidad from medicamento m join detalle_venta dv on dv.medicamento_idmedicamento
	= m.idmedicamento join laboratorio l on m.laboratorio_idlaboratorio = l.idlaboratorio
	group by dv.medicamento_idmedicamento order by cantidad desc;
END//


-- PL 4 EXCEL

CREATE PROCEDURE listarPlCuatro()
BEGIN
	select v.fecha_venta,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
	group by v.fecha_venta;
END//