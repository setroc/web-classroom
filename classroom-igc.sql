-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--
CREATE SCHEMA IF NOT EXISTS `classroom-igc` DEFAULT CHARACTER SET utf8 ;
USE `classroom-igc` ;

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `idAdministrador` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `numEmpleado` varchar(12) NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'admin','admin','admin','admin@admin.com','123456','123456789101');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `idAlumno` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `correoSecundario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `boleta` varchar(10) NOT NULL,
  `nombreTutor` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `alta` tinyint NOT NULL DEFAULT '0',
  `curso_idCurso` int NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `fk_alumno_curso1_idx` (`curso_idCurso`),
  CONSTRAINT `fk_alumno_curso1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificacion` (
  `idCalificacion` int NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(45) DEFAULT NULL,
  `ejercicio_idEjercicio` int NOT NULL,
  `alumno_idAlumno` int NOT NULL,
  PRIMARY KEY (`idCalificacion`),
  KEY `fk_calificacion_ejercicio1_idx` (`ejercicio_idEjercicio`),
  KEY `fk_calificacion_alumno1_idx` (`alumno_idAlumno`),
  CONSTRAINT `fk_calificacion_alumno1` FOREIGN KEY (`alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`),
  CONSTRAINT `fk_calificacion_ejercicio1` FOREIGN KEY (`ejercicio_idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `idCurso` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'matemáticas');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tema` (
  `idTema` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `curso_idCurso` int NOT NULL,
  PRIMARY KEY (`idTema`),
  KEY `fk_tema_curso1_idx` (`curso_idCurso`),
  CONSTRAINT `fk_tema_curso1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
insert into tema (idTema,nombre, curso_idCurso) values (1,'Decenas', 1);
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

--
-- Table structure for table `ejercicio`
--

DROP TABLE IF EXISTS `ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ejercicio` (
  `idEjercicio` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(150) NOT NULL,
  `a` varchar(150) NOT NULL,
  `b` varchar(150) NOT NULL,
  `c` varchar(150) NOT NULL,
  `correcta` varchar(45) NOT NULL,
  `tema_idTema` int NOT NULL,
  PRIMARY KEY (`idEjercicio`),
  KEY `fk_ejercicio_tema1_idx` (`tema_idTema`),
  CONSTRAINT `fk_ejercicio_tema1` FOREIGN KEY (`tema_idTema`) REFERENCES `tema` (`idTema`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejercicio`
--

LOCK TABLES `ejercicio` WRITE;
/*!40000 ALTER TABLE `ejercicio` DISABLE KEYS */;
INSERT INTO `ejercicio` VALUES (1,'Selecciona quien tiene mas','luz','amanda','adrian','amanda',1),(2,'Selecciona quien tiene mas','cecilia','oscar','jimena','cecilia',1),(3,'¿Cuáles tienen la misma cantidad?','a,b,d','b,c,d','a,c,d','a,b,d',1),(4,'Ana usó fichas para formar grupos de 8, ¿Qué grupos no tienen 8 fichas?','a,b','b,c','a,d','a,b',1);
/*!40000 ALTER TABLE `ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material` (
  `idMaterial` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo` int NOT NULL,
  `tema_idTema` int NOT NULL,
  PRIMARY KEY (`idMaterial`),
  KEY `fk_material_tema1_idx` (`tema_idTema`),
  CONSTRAINT `fk_material_tema1` FOREIGN KEY (`tema_idTema`) REFERENCES `tema` (`idTema`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesor` (
  `idProfesor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `numEmpleado` varchar(12) NOT NULL,
  PRIMARY KEY (`idProfesor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-02 16:57:25
