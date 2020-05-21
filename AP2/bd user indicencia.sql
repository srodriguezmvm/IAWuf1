DROP DATABASE IF EXISTS `AP2`;
CREATE DATABASE IF NOT EXISTS `AP2`;
USE `AP2`;

DROP TABLE IF EXISTS `incidencies`;
CREATE TABLE `incidencies` (
`id` INT NOT NULL AUTO_INCREMENT,
`tipus` VARCHAR(20),
`data` DATE,
`descripcio` VARCHAR(250),
`estat` VARCHAR(20),
`usuari` VARCHAR(30),
PRIMARY KEY (`id`)
)ENGINE=innodb;

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE `usuaris` (
`id` INT NOT NULL AUTO_INCREMENT,
`usuari` VARCHAR(30),
`contrasenya` VARCHAR(40),
`rol` VARCHAR(30),
PRIMARY KEY (`id`)
)ENGINE=innodb;

INSERT INTO usuaris (`usuari`,`contrasenya`,`rol`) VALUES
('Sergi','1234','Admin');

INSERT INTO incidencies (`tipus`,`data`,`descripcio`,`estat`,`usuari`) VALUES
('Software',NOW(),'sa roto','Abierta','Sergi'),
('Hardware',NOW(),'sa rompio','Abierta','Manuel'),
('Software',NOW(),'sa roto','Cerrada','Pepe'),
('Hardware',NOW(),'sa roto','Abierta','Sergi');

