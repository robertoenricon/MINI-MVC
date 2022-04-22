-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.37 - MySQL Community Server (GPL)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela docker_database.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) DEFAULT NULL,
  `CPF` varchar(11) NOT NULL DEFAULT '',
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONE` varchar(50) DEFAULT NULL,
  `ENDERECO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `CPF` (`CPF`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela docker_database.cliente: ~32 rows (aproximadamente)
INSERT INTO `cliente` (`ID`, `NOME`, `CPF`, `EMAIL`, `TELEFONE`, `ENDERECO`) VALUES
	(1, 'Ifeoma Gordon', '23432343212', 'inceptos@icloud.com', '1-794-176-7381', '662-2203 In Street'),
	(2, 'Baxter Saunders', '23433243212', 'scelerisque@outlook.edu', '(763) 813-0761', 'Ap #855-5337 Eu Avenue'),
	(3, 'Kirby Mcmillan', '11132432124', 'placerat@aol.com', '1-815-283-6159', 'Ap #848-4797 Nunc. Rd.'),
	(4, 'Caleb Pickett', '23430932124', 'orci.lobortis@icloud.edu', '(182) 321-6124', 'P.O. Caixa 764, 8551 Dolor. St.'),
	(5, 'Forrest Pitts', '23430000124', 'parturient.montes@yahoo.edu', '1-817-724-8571', '689-3757 Elit. Avenue'),
	(6, 'Daria Valdez', '23111132124', 'fames.ac@icloud.couk', '1-845-355-3487', 'Ap #833-9477 Eu, St.'),
	(7, 'Aurora Cherry', '24598532124', 'ligula.aenean.euismod@icloud.edu', '1-477-654-8019', '717-7575 Aliquam Road'),
	(8, 'Elvis Castaneda', '30098532124', 'mauris.erat@aol.net', '(545) 782-4721', 'Ap #672-9165 Interdum. Rd.'),
	(9, 'Phoebe Graham', '23432432987', 'eu.metus.in@yahoo.ca', '1-564-210-7771', '859-4152 Ante Street'),
	(10, 'Tatiana Collins', '23092132124', 'arcu.et@icloud.ca', '(452) 582-4052', '794-3270 Tempus Road'),
	(11, 'Zeph Guy', '23432343999', 'urna.ut@protonmail.couk', '1-687-848-8123', '4381 Fames Road'),
	(12, 'Stewart Willis', '34332333212', 'risus.in@yahoo.edu', '(656) 522-4147', '984-2230 Penatibus St.'),
	(13, 'Rajah Vinson', '23342343212', 'a.tortor@icloud.ca', '1-403-818-8023', '5042 Aliquet Rd.'),
	(14, 'Violet Kelly', '23432343230', 'enim@yahoo.org', '(733) 418-1622', '736-9074 Aliquam Rd.'),
	(15, 'Dillon Diaz', '23432458212', 'at.velit@google.org', '1-761-397-5707', 'Ap #464-9325 Semper Avenue'),
	(16, 'Joseph Stephens', '23444443212', 'aliquam.erat@protonmail.couk', '(773) 504-5554', '740-2092 Lorem Rd.'),
	(17, 'David Sweet', '23332343212', 'vehicula.aliquet@outlook.couk', '(327) 752-9305', '5716 Nec, Avenue'),
	(18, 'Rana Herring', '23432312172', 'natoque.penatibus.et@icloud.ca', '1-758-777-1562', '135-428 Mauris Av.'),
	(19, 'Quinn Sargent', '23235321200', 'blandit.congue.in@icloud.edu', '(757) 676-9799', '499-9479 Nulla Rd.'),
	(20, 'Joshua Pierce', '23432356712', 'integer.sem@hotmail.couk', '(902) 645-2563', 'Ap #754-2162 Massa. Av.'),
	(21, 'Miranda Gregory', '23411156712', 'duis.dignissim@hotmail.com', '(347) 493-6384', '3654 Scelerisque St.'),
	(22, 'Laura Franklin', '23430000712', 'ornare@protonmail.ca', '(842) 532-7276', 'Ap #887-4393 Fringilla. St.'),
	(23, 'Kirestin Payne', '23111156712', 'purus.mauris@icloud.com', '(283) 285-6512', 'Ap #534-4522 Suspendisse Avenue'),
	(24, 'Kelly Norris', '10092356712', 'gravida@yahoo.com', '(435) 682-7171', '450-5713 Pulvinar Street'),
	(25, 'Nathaniel Ray', '10112356712', 'lorem@yahoo.net', '(227) 277-0486', 'P.O. Caixa 443, 9133 Nunc Rd.'),
	(26, 'Chandler Monroe', '23432350000', 'scelerisque.scelerisque@hotmail.ca', '(753) 367-2264', '8358 Egestas Road'),
	(27, 'Zenaida Solomon', '23111116712', 'nisl@aol.net', '(507) 667-6622', 'Ap #816-1951 Pellentesque Avenue'),
	(28, 'Mariam Guy', '23432309089', 'enim.nisl.elementum@aol.com', '(935) 259-5752', '1465 Arcu Road'),
	(29, 'Hermione Cortez', '0011356712', 'ultrices@icloud.ca', '1-434-977-2644', '1140 Pellentesque St.'),
	(30, 'Damon Burris', '11211212712', 'non.nisi.aenean@yahoo.com', '(624) 815-6573', 'P.O. Caixa 566, 2420 Orci. Ave');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
