
create database pizzeria;

use pizzeria;

CREATE TABLE `clientes` (
  `ID_CLIENTES` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(300) DEFAULT NULL,
  `CLAVE` varchar(255) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `pizza` (
  `ID_PIZZA` int(11) NOT NULL,
  `ID_TIPOCARNE` int(11) DEFAULT NULL,
  `ID_TIPOVEGETALES` int(11) DEFAULT NULL,
  `ID_TIPO_MASA` int(11) DEFAULT NULL,
  `ID_TAMANHO` int(11) DEFAULT NULL,
  `PRECIO_FINAL` decimal(20,2) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ID_CLIENTES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `tamanho_pizza` (
  `ID_TAMANHO` int(11) NOT NULL,
  `TAMANHO` varchar(50) NOT NULL,
  `PRECIO` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tamanho_pizza` (`ID_TAMANHO`, `TAMANHO`, `PRECIO`) VALUES
(1, 'Personal - 4 pedazos', '1500.00'),
(2, 'Pequeña - 8 pedazos', '2000.00'),
(3, 'Mediana - 12 pedazos', '2500.00'),
(4, 'Grande - 16 pedazos', '3000.00'),
(5, 'Familiar - 20 pedazos', '6000.00');

-- --------------------------------------------------------



CREATE TABLE `tipos_vegetales` (
  `ID_TIPOVEGETALES` int(11) NOT NULL,
  `TIPO_VEGETALES` varchar(100) NOT NULL,
  `PRECIO` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tipos_vegetales` (`ID_TIPOVEGETALES`, `TIPO_VEGETALES`, `PRECIO`) VALUES
(1, 'Chile dulce', '50.00'),
(2, 'Cebolla', '50.00'),
(3, 'Tomate', '40.00'),
(4, 'Aceituna negra', '80.00'),
(5, 'Chile jalapeño', '30.00');



CREATE TABLE `tipo_carnes` (
  `ID_TIPOCARNE` int(11) NOT NULL,
  `TIPO_CARNE` varchar(100) NOT NULL,
  `PRECIO` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tipo_carnes` (`ID_TIPOCARNE`, `TIPO_CARNE`, `PRECIO`) VALUES
(1, 'Pepperoni', '300.00'),
(2, 'Jamón', '524.23'),
(3, 'Carne de res', '850.00'),
(4, 'Tocineta', '910.12'),
(5, 'Carne italiana', '1200.00');



CREATE TABLE `tipo_masas` (
  `ID_TIPO_MASA` int(11) NOT NULL,
  `TIPO_MASA` varchar(100) NOT NULL,
  `PRECIO` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tipo_masas` (`ID_TIPO_MASA`, `TIPO_MASA`, `PRECIO`) VALUES
(1, 'Pasta delgada', '1000.00'),
(2, 'Pasta gruesa', '1100.00'),
(3, 'Clásica', '1200.00'),
(4, 'Borde de queso', '1500.00');



ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENTES`),
  ADD UNIQUE KEY `correo` (`correo`);

  
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`ID_PIZZA`),
  ADD KEY `ID_TAMANHO` (`ID_TAMANHO`),
  ADD KEY `ID_TIPOCARNE` (`ID_TIPOCARNE`),
  ADD KEY `ID_TIPOVEGETALES` (`ID_TIPOVEGETALES`),
  ADD KEY `ID_TIPO_MASA` (`ID_TIPO_MASA`),
  ADD KEY `Clientes_ID` (`ID_CLIENTES`);


ALTER TABLE `tamanho_pizza`
  ADD PRIMARY KEY (`ID_TAMANHO`);


  
ALTER TABLE `tipos_vegetales`
  ADD PRIMARY KEY (`ID_TIPOVEGETALES`);


  
ALTER TABLE `tipo_carnes`
  ADD PRIMARY KEY (`ID_TIPOCARNE`);


  
ALTER TABLE `tipo_masas`
  ADD PRIMARY KEY (`ID_TIPO_MASA`);



ALTER TABLE `clientes`
  MODIFY `ID_CLIENTES` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `pizza`
  MODIFY `ID_PIZZA` int(11) NOT NULL AUTO_INCREMENT;




ALTER TABLE `pizza`
  ADD CONSTRAINT `Clientes_ID` FOREIGN KEY (`ID_CLIENTES`) REFERENCES `clientes` (`ID_CLIENTES`),
  ADD CONSTRAINT `pizza_ibfk_1` FOREIGN KEY (`ID_TAMANHO`) REFERENCES `tamanho_pizza` (`ID_TAMANHO`),
  ADD CONSTRAINT `pizza_ibfk_2` FOREIGN KEY (`ID_TIPOCARNE`) REFERENCES `tipo_carnes` (`ID_TIPOCARNE`),
  ADD CONSTRAINT `pizza_ibfk_3` FOREIGN KEY (`ID_TIPOVEGETALES`) REFERENCES `tipos_vegetales` (`ID_TIPOVEGETALES`),
  ADD CONSTRAINT `pizza_ibfk_4` FOREIGN KEY (`ID_TIPO_MASA`) REFERENCES `tipo_masas` (`ID_TIPO_MASA`);
COMMIT;

