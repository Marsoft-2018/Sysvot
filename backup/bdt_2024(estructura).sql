/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - sisvot_bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sisvot_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sisvot_bd`;

/*Table structure for table `candidatos` */

DROP TABLE IF EXISTS `candidatos`;

CREATE TABLE `candidatos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(3) COLLATE utf8_bin NOT NULL,
  `photo` char(150) COLLATE utf8_bin DEFAULT 'default',
  `studentId` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `partido` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'Personero',
  PRIMARY KEY (`id`,`numero`),
  KEY `fk_candidatosvot_alumnos1_idx` (`studentId`),
  CONSTRAINT `fk_candidatosvot_alumnos1` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Table structure for table `institucion` */

DROP TABLE IF EXISTS `institucion`;

CREATE TABLE `institucion` (
  `idInstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(150) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idInstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Table structure for table `registrovotos` */

DROP TABLE IF EXISTS `registrovotos`;

CREATE TABLE `registrovotos` (
  `idEstudiante` varchar(30) COLLATE utf8_bin NOT NULL,
  `Numero` int(11) unsigned NOT NULL,
  `Anio` char(5) COLLATE utf8_bin NOT NULL DEFAULT '2024',
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEstudiante`,`Anio`,`type`),
  KEY `Numero` (`Numero`),
  CONSTRAINT `registrovotos_ibfk_1` FOREIGN KEY (`Numero`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` char(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `grade` double DEFAULT NULL,
  `group` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `firstLastName` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `secondLastName` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `firstName` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `secondName` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT 'Inactivo',
  `institucionId` int(11) NOT NULL DEFAULT 1,
  `gender` char(2) COLLATE utf8_bin NOT NULL,
  `role` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'Estudiante',
  `password` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '123456',
  PRIMARY KEY (`id`),
  KEY `fk_alumnos_Institucion1_idx` (`institucionId`),
  CONSTRAINT `fk_alumnos_Institucion1` FOREIGN KEY (`institucionId`) REFERENCES `institucion` (`idInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(150) COLLATE utf8_spanish_ci NOT NULL,
  `name` char(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `role` char(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` char(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucionId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_Institucion1_idx` (`institucionId`),
  CONSTRAINT `usu` FOREIGN KEY (`institucionId`) REFERENCES `institucion` (`idInstitucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
