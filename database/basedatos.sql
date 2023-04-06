CREATE DATABASE smartphones;
USE smartphones;

CREATE TABLE celulares(
idcelular 			INT AUTO_INCREMENT PRIMARY KEY,
marca				VARCHAR(30) NOT NULL,
modelo 				VARCHAR(30) NOT NULL,
sistema_operativo 		VARCHAR(20) NOT NULL,
tipo_pantalla 			VARCHAR(50) NOT NULL,
bateria				VARCHAR(30) NOT NULL,
camara				VARCHAR(20) NOT NULL,
precio				DECIMAL(7,2)NOT NULL,
fecha_registro			DATETIME NOT NULL DEFAULT NOW(),
estado 				CHAR(1) NOT NULL DEFAULT '1',
CONSTRAINT un_modelo UNIQUE(modelo)
)ENGINE = INNODB;

INSERT INTO celulares(marca,modelo,sistema_operativo,tipo_pantalla,bateria,camara,precio)
VALUES
	('Apple','Iphone 13','iOS','OLED','3100mAh','14mpx',3500),
	('Xiaomi','Xiaomi 12 Lite','Android','AMOLED','4500mAh','85mpx',1500),
	('Apple','Iphone 14 Pro Max','iOS','OLED','3800mAh','45mpx',5200),
	('Sansung','Galaxy S23 Ultra','Android','AMOLED','5000mAh','200mpx',5500);
	
SELECT * FROM celulares;
	
-- PROCEDIMIENTOS ALMACENADOS



-- LISTAR	
DELIMITER $$
CREATE PROCEDURE spu_listar_celulares()
BEGIN
	SELECT 	idcelular,
				marca,
				modelo,
				sistema_operativo,
				tipo_pantalla,
				bateria,
				camara,
				precio
	FROM	celulares;
END $$

CALL spu_listar_celulares;


-- AGREGAR

DELIMITER $$
CREATE PROCEDURE spu_agregar_celular(
	IN _marca 			VARCHAR(30),
	IN _modelo 			VARCHAR(50),
	IN _sistema_operativo 		VARCHAR(20),
	IN _tipo_pantalla 		VARCHAR(50),
	IN _bateria 			VARCHAR(30),
	IN _camara 			VARCHAR(20),
	IN _precio 			DECIMAL(7,2)
)
BEGIN
	INSERT INTO celulares(marca,modelo,sistema_operativo,tipo_pantalla,bateria,camara,precio)
	VALUES(_marca,_modelo,_sistema_operativo,_tipo_pantalla,_bateria,_camara,_precio);
END$$


CALL spu_agregar_celular('Motorola','Edge 30 Pro','Android','OLED','4800mAh','50mpx',1259);

CALL spu_listar_celulares;

-- DESACTIVAR - ELIMINAR

DELIMITER $$
CREATE PROCEDURE spu_eliminar_celular(
	 IN _idcelular INT
)
BEGIN
	UPDATE celulares SET estado = '0'
	WHERE idcelular = _idcelular;
END$$
CALL spu_eliminar_celular(3);

SELECT * FROM celulares;

-- ACTIVAR CELULAR
DELIMITER $$
CREATE PROCEDURE spu_activar_celular(
	 IN _idcelular INT
)
BEGIN
	UPDATE celulares SET 
	estado = '1'
	WHERE idcelular = _idcelular;
END$$

CALL spu_activar_celular(3);