-- MySQL dump 10.13  Distrib 5.5.42, for Linux (x86_64)
--
-- Host: localhost    Database: ittg_talleres
-- ------------------------------------------------------
-- Server version	5.5.42-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Tutoriales locales(ITTG)','talleres',1,'2014-09-23 01:13:10','2014-10-23 06:48:22'),(3,'Workshops (MICAI)','workshops',1,'2014-09-23 01:13:10','2014-10-23 06:48:22');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cupo_taller` int(10) unsigned NOT NULL,
  `cupo_ocupado` int(10) unsigned NOT NULL,
  `categorias_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `contenidos_categorias_id_foreign` (`categorias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenidos`
--

LOCK TABLES `contenidos` WRITE;
/*!40000 ALTER TABLE `contenidos` DISABLE KEYS */;
INSERT INTO `contenidos` VALUES (1,'Sin taller','',NULL,NULL,0,0,1,'sin-taller','2014-09-23 01:13:10','2014-09-23 01:13:10'),(2,'Instalación de fibra optica','<p>Disculpen pero no se pudo confirmar que el taller se impartir&iacute;a, se tuvo que cerrar, les pedimos de favor que escojan otro de la lista. Gracias.</p>',NULL,NULL,0,0,1,'instalacion-de-fibra-optica','2014-09-26 04:39:42','2014-11-08 04:49:34'),(3,'Mysql y WorkBench','<p>Ing. Miguel Arturo V&aacute;quez Vel&aacute;zquez</p>\r\n<p>Martes 18 de Noviembre de 2014 de 9:00 a 13:30 horas.</p>\r\n<p>&nbsp;</p>\r\n<p>El objetivo de este taller es conocer la herramienta workbench de Mysql para el modelado, interacci&oacute;n y administraci&oacute;n de bases de datos.</p>\r\n<p>&nbsp;</p>\r\n<p>Contenido:</p>\r\n<p>1.- Intorducci&oacute;n</p>\r\n<p>2.- Modelado de Datos</p>\r\n<p>3.- Consultas</p>\r\n<p>4.- Administraci&oacute;n</p>\r\n<p>5.- Caso Pr&aacute;ctico</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Requisitos:</p>\r\n<p>&nbsp;&nbsp;&nbsp; - Lap top</p>\r\n<p>&nbsp;&nbsp;&nbsp; - Instalar previamente mysqlserver y workbench (en sus &uacute;ltimas versiones)</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',NULL,NULL,30,30,1,'mysql-y-workbench','2014-09-26 04:41:09','2014-11-09 02:59:11'),(4,'Desarrollo de aplicaciones Web con el patrón MVC.','<p>C. Manuel de Jes&uacute;s Toala P&eacute;rez</p>\r\n<p>Martes 18 de Noviembre de 2014 de 9:00 a 13:30 horas.</p>\r\n<p>En este taller veremos como desarrollar un sitio web usando el patron de dise&ntilde;o MVC. En el cual estaremos hablando punto por punto los diversos temas que requiere el desarrollo de una aplicaci&oacute;nASP.NET MVC y MVC PHP , como: controladores, vistas, modelo, entity framework, jquery, bootstrap entre otros.</p>\r\n<p>&nbsp;</p>\r\n<p>Contenido</p>\r\n<p>1) Vision General de MVC.2) Explorando una nueva aplicaci&oacute;n MVC. Modelo Vista Controlador3) Frameworks4) MVC en .NET MVC 5 Entity framework</p>\r\n<p>5) MVC en PHP Laravel. Codeigniter.</p>\r\n<p>Material Requerido</p>\r\n<p>Para MVC en PHP Xampp Composer Editor de Texto (Sublime text)Para MVC en .NET Visual Studio 2013 MVC5 o MVC 4 instalado</p>\r\n<p>Todo este material estar&aacute; disponible en el siguiente link.</p>\r\n<p>http://goo.gl/bjmz3Y</p>',NULL,NULL,28,28,1,'desarrollo-aplicaciones-web-con-patron-de-diseno-mvc','2014-09-26 04:42:38','2014-11-12 04:17:23'),(5,'Programación Orientada a Objetos con Java','<p>M.C. Octavio Ariosto Rios Tercero</p>\r\n<p>Martes 18 de Noviembre de 2014 de 9:00 a 13:30 horas.</p>\r\n<p>&nbsp;</p>\r\n<p>Objetivo:&nbsp;</p>\r\n<p>Desarrollar un programa mediante el lenguaje Java aplicando los conceptos de programaci&oacute;n</p>\r\n<p>orientada a objetos que resuelva un problema planteado por el instructor, llev&aacute;ndolo a la</p>\r\n<p>implementaci&oacute;n y prueba utilizando los entornos de desarrollo NetBeans y BlueJ.</p>\r\n<p>&nbsp;</p>\r\n<p>CONCEPTOS A APLICAR</p>\r\n<p>1. Clases y objetos</p>\r\n<p>2. M&eacute;todos</p>\r\n<p>3. Constructor</p>\r\n<p>4. Encapsulamiento</p>\r\n<p>5. Herencia</p>\r\n<p>6. Modelado con UML</p>\r\n<p>REQUERIMIENTOS</p>\r\n<p>Llevar Laptop con las siguientes herramientas instaladas (no tiene que ser la &uacute;ltima versi&oacute;n):</p>\r\n<p>- BlueJ</p>\r\n<p>- NetBeans</p>',NULL,NULL,30,13,1,'programacion-orientada-a-objetos-con-java','2014-09-26 04:43:26','2014-11-12 05:41:14'),(6,'API de Google Maps para Android (uso de GPS y Geolocalización)','<p>Ing. Carlos Aguilar Fuentes</p>\r\n<p>Martes 18 de Noviembre de 2014 de 15:30 a 20:00 horas.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Objetivo</strong></p>\r\n<p>Aprender a usar la Api de Google Maps para Android y as&iacute; poder producir Aplicaciones de</p>\r\n<p>Informaci&oacute;n sobre Mapas.</p>\r\n<p><strong>Requisitos del taller</strong></p>\r\n<p>1.- Lap Top.<br />2.- Tener Instalado Eclipce ADT.<br />3.- Tener instalado XAMPP.<br />4.- Tener el Archivo . JAR de google maps para Android. <br />5.- Conocimientos b&aacute;sicos en Java, Php, MySql.<br />6.- Un dispositivo con Android (Un telefono de preferencia)</p>\r\n<p>Temas</p>\r\n<p>1.- Manejando el Eclipce y su estructura de una app.<br />2.- Hola Mundo en Android.<br />3.- Mi primer mapa.<br />4.- Clase Marker.<br />5.- Clase Polyline.<br />6.- Conectando con el servidor.<br />7.- Proyecto Final.</p>\r\n<p>Link de descargas.</p>\r\n<p>-Eclipce ADT<br />http://developer.android.com/sdk/index.html</p>\r\n<p>- Biblioteca externa - API de Google Maps para Android &mdash; Google Developers . JAR<br />https://developers.google.com/maps/documentation/android/</p>\r\n<p>-XAMPP para Windows.<br />https://www.apachefriends.org/download.html</p>',NULL,NULL,30,5,1,'api-de-google-maps-para-android-uso-de-gps-y-geolocalizacion','2014-09-26 04:45:10','2014-11-11 21:17:10'),(7,'Programación en PHP','<p>C. Benny Eduardo Jimenez Mu&ntilde;oz</p>\r\n<p>Martes 18 de Noviembre de 2014 de 15:30 a 20:00 horas.</p>\r\n<p>&nbsp;</p>\r\n<p>Objetivo: &nbsp;Se espera despertar el gusto por la programaci&oacute;n web y que las paginas web sean de mayor calidad y con un mejor control</p>\r\n<p>&nbsp;</p>\r\n<p>Temas:</p>\r\n<div>-Conceptos B&aacute;sicos de php</div>\r\n<div>-Envio de Datos por GET y POST</div>\r\n<div>-Subir Archivos al servidor</div>\r\n<div>-cookies</div>\r\n<div>-sesiones en php</div>\r\n<div>-conexion y manejo de base de datos en php</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Requisitos:</div>\r\n<div>-xampp(intalado)</div>\r\n<div>-sublime text o note pad++</div>\r\n<div>-laptop para el taller</div>',NULL,NULL,27,27,1,'programacion-en-php','2014-09-26 04:45:38','2014-11-12 05:50:07'),(8,'Programación de Videojuegos en 2D ','<p style=\"text-align: center;\">C. Mario Alberto Moreno Aguilar</p>\r\n<p>Martes 18 de Noviembre de 2014 de 15:30 a 20:00 horas.</p>\r\n<p>Darles a conocer la manera de desarrolla videojuegos 2d basado en html5 y donde ademas conocer&aacute;n el &aacute;mbito de desarrollos de videojuegos. Ense&ntilde;ar lo b&aacute;sico para trabajar en la plataforma, creaci&oacute;n de escenario, personajes, animaciones y tener un juego basado en html5.</p>\r\n<p>&nbsp;</p>\r\n<p>Contenido</p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Que es construct 2</li>\r\n<li>Conociendo el entorno</li>\r\n<li>Que es un Layers</li>\r\n<li>Uso de sprite y animaciones</li>\r\n<li>Uso de background</li>\r\n<li>Agregando comportamientos</li>\r\n<li>Uso de controles</li>\r\n<li>Efecto parallax</li>\r\n<li>programaci&oacute;n a eventos sobre objetos</li>\r\n<li>Uso de controles de texto</li>\r\n<li>Uso de variables</li>\r\n<li>Eventos sobre layout</li>\r\n<li>Exportar para web</li>\r\n</ul>',NULL,NULL,27,27,1,'programacion-de-videojuegos-en-2d','2014-09-26 04:46:32','2014-11-11 19:04:34'),(9,'Bases de Datos NoSQL','<p>Dr. Jorge Humberto Ruiz Ovalle</p>\r\n<p>Martes 18 de Noviembre de 2014 de 15:30 a 20:00 horas.</p>\r\n<div>\r\n<h1>Introducci&oacute;n</h1>\r\n<p>Las bases de datos relacionales est&aacute;n pasando de moda, los desarrolladores optan cada vez m&aacute;s por opciones novedosas de NoSQL debido a sus altos niveles de rendimiento y f&aacute;cil escalabilidad.</p>\r\n<p><strong><em>&nbsp;</em></strong></p>\r\n<h1>&iquest;Qu&eacute; es MongoDB?</h1>\r\n<p>Es una base de datos NoSQL de c&oacute;digo abierto, este tipo de soluciones se basan en el principio de almacenar los datos en una estructura tipo llave-valor; MongoDB por su lado se enfoca espec&iacute;ficamente en que los valores de estas llaves (llamadas colecciones) son estructuras tipo JSON (llamados documentos), es decir objetos Javascript, lenguaje sobre el cual se basa esta soluci&oacute;n de base de datos. Esto facilitar&aacute; su manipulaci&oacute;n a muchos que ya conozcan el lenguaje.</p>\r\n<p>&nbsp;</p>\r\n<p>MongoDB posee varias estrategias de manejo de datos que la han posicionado donde se encuentra hoy en d&iacute;a, tales como sus procesos de divisi&oacute;n de datos en distintos equipos f&iacute;sicos o tambi&eacute;n conocido como clusterizaci&oacute;n, tambi&eacute;n el caso similar de documentos muy grandes que superen el l&iacute;mite estipulado de 16MB se aplica una estrategia llamada GridFS que autom&aacute;ticamente divide el documento en pedazos y los almacena por separado, al recuperar el documento el driver se encarga de armar autom&aacute;ticamente el documento nuevamente.</p>\r\n<p>&nbsp;</p>\r\n<p>La estructura de almacenamiento es tan flexible que uno de los hechos importantes que se comparten al introducir esta base de datos es que&nbsp; distintos documentos en la misma colecci&oacute;n no deben tener obligatoriamente los mismos campos o estructura. Inclusive documentos con campos en com&uacute;n no tienen necesariamente que tener el mismo tipo de dato.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Objetivo:</strong> Introducir a los conceptos de Bases de Datos No Relacionales y llevarlos a&nbsp; la pr&aacute;ctica mediante un caso pr&aacute;ctico.</p>\r\n<p>Temario:</p>\r\n<ol>\r\n<li>Introducci&oacute;n a NoSQL</li>\r\n<li>Conociendo MongoDB</li>\r\n<li>Instalando MongoDB</li>\r\n<li>La consola interactiva</li>\r\n<li>Conectando a Base de datos</li>\r\n<li>CRUD (Create, Read, Update, Delete)</li>\r\n<li>Busquedas</li>\r\n</ol>\r\n</div>',NULL,NULL,27,6,1,'bases-de-datos-nosql','2014-09-26 04:47:41','2014-11-12 05:55:10'),(10,'HIS 2014','<h2 align=\"center\"><a href=\"http://dcc.ccbas.uaa.mx/whis2014/\" target=\"_blank\"><font size=\"4\">Seventh International Workshop on<br /></font>Hybrid Intelligent Systems</a></h2>\r\n<p align=\"left\">Website to be announced.Contact: Dr. Carlos Alberto Ochoa Ortiz (<font color=\"#0000FF\">alberto.ochoa<img src=\"http://www.micai.org/2013/img/at-blue.GIF\" alt=\"\" width=\"14\" height=\"15\" align=\"absmiddle\" border=\"0\" />uacj.mx</font>), Dr. Julio Ponce</p>\r\n<p align=\"left\"><strong>Topics</strong>:</p>\r\n<ul>\r\n<li>Social Networks in HAIS</li>\r\n<li>HIS for Argumentation and Negotiation</li>\r\n<li>Agent-Based Social Simulation, specially using Soft Computing Techniques</li>\r\n<li>Theoretical Approaches with Social Network Analysis(e.g. Studies on Blogosphere and Virtual Communities)</li>\r\n<li>Applications on Virtual Social Networks (Web 2.0, P2P, Orkut, Myspace)</li>\r\n<li>Virtual and Intelligent Games based on Artificial Societies (like RPGs)</li>\r\n<li>Social Data Mining</li>\r\n<li>Artificial Societies and Social Simulation</li>\r\n<li>Other application domains: Blogs, Cultural Aspects, Web Fan Clubs, Topic Communities,Opinion Dynamics, Diffusion Networks, Consumer Behavior</li>\r\n</ul>\r\n<p align=\"left\">Past HIS workshops: <a href=\"http://dcc.ia.ccbas.uaa.mx/PaginaHIS/W-HIS%20Final.htm\">2013</a>, <a href=\"http://www.micai.org/2012/ws/his/HIS_2012.html\">2012</a>, <a href=\"http://www.uaeh.edu.mx/MICAI/index_archivos/workshop%20of%20hybrid%20intelligent.html\">2011</a>, <a href=\"http://www.uv.mx/fmontes/HIS2010.htm\">2010</a>, <a href=\"http://dcc.ia.ccbas.uaa.mx/dcc/HIS_Workshop_MICAI09.htm\">2009</a>.</p>\r\n<p align=\"left\">&nbsp;</p>',NULL,NULL,30,0,3,'his-2014','2014-10-07 06:31:18','2014-10-08 03:35:40');
/*!40000 ALTER TABLE `contenidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidad`
--

DROP TABLE IF EXISTS `disponibilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidad` (
  `titulo` varchar(255) DEFAULT NULL,
  `cupo_taller` int(10) unsigned DEFAULT NULL,
  `cupo_ocupado` int(10) unsigned DEFAULT NULL,
  `disp` bigint(11) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidad`
--

LOCK TABLES `disponibilidad` WRITE;
/*!40000 ALTER TABLE `disponibilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `disponibilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscritos`
--

DROP TABLE IF EXISTS `inscritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscritos` (
  `id` int(10) unsigned DEFAULT NULL,
  `cuantos` bigint(21) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscritos`
--

LOCK TABLES `inscritos` WRITE;
/*!40000 ALTER TABLE `inscritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intrusos`
--

DROP TABLE IF EXISTS `intrusos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intrusos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intrusos`
--

LOCK TABLES `intrusos` WRITE;
/*!40000 ALTER TABLE `intrusos` DISABLE KEYS */;
INSERT INTO `intrusos` VALUES (36,'Exdraz_Lpz@outlook.com','2014-11-10 17:33:02','2014-11-10 17:33:02');
/*!40000 ALTER TABLE `intrusos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ficha1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ficha2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('asistente','vendedor','reporteador','administrador') COLLATE utf8_unicode_ci NOT NULL,
  `tipo_procedencia` enum('ittg','unach','foraneo','nacional','extranjero') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendedor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institucion_procedencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `movil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_control` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available_email` tinyint(1) NOT NULL,
  `available_vendedor` tinyint(1) NOT NULL,
  `available_perfil` tinyint(1) NOT NULL,
  `available_pago` tinyint(1) NOT NULL,
  `available_taller` tinyint(1) NOT NULL,
  `available_pase` tinyint(1) NOT NULL,
  `available_workshop` tinyint(1) NOT NULL DEFAULT '0',
  `contenidos_id` int(10) unsigned NOT NULL,
  `workshop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuarios_contenidos_id_foreign` (`contenidos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=587 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'hgc1245506056.jpg','','','Administrador del sistema','$2y$10$LrWbvg1q6R2wxBlkQcDnpuknoLpAIkPK0B6RajKgswul1GlAQtZ9K','administrador','ittg','admin_sistema@talleres.ittg.mx','','','','','','','','',1,1,1,0,0,0,0,1,0,'tugsejtPFp90Qso4u3hiW4eDXgBtBXmrJVb4ePwPMB6dRGSA37kjXwlJpaaH','2014-09-23 01:13:11','2015-10-22 05:50:58'),(2,'avatar.png','','','Jorge Octavio Guzman','$2y$10$RHI2KEozU.EcU5CK5CtyoOTJq6Inzf4psL95gS4U2AGJ23IVWPGfS','administrador','ittg','jogs78@gmail.com','','','','','','','','',1,1,1,0,0,0,0,1,0,'xq3w83gjPQtpM41a3fckRRNmGsUrxnRuVExwh5elpPipNihxbysGmwBvsFzp','2014-09-23 01:13:11','2015-10-21 22:29:33'),(3,'hgc869922605.jpg','','','Vendedor del sistema','$2y$10$p2ZqDETf.a7llPJFcsAQkOOV3Qp.j1NQ5sZsl1vi4yt8T4BZJnPy2','vendedor','ittg','vendedor@talleres.ittg.mx','','','','','','','','',1,1,1,0,0,0,0,1,0,'JR00rsdc6nxCcg3HDCFtsNME3bC1ZVy2sPlvTehXt2f3tAH4lJJc5VAPPnki','2014-09-23 01:13:11','2015-10-22 05:51:16'),(11,'avatar.png','','','Jorge Octavio Guzmán Sánchez','$2y$10$p/DD6HKyynSE5LVLRYC79OSgkS21T3u/G9kqMnVk0FB3FrorSHGdW','vendedor','foraneo','jogs78@hotmail.com','846d23cfe29ba98806814249e70a58e6','3','','','','','','',0,0,0,0,0,0,0,1,0,'0iCcacSCedDbLXj0L6cGXwABRxNDPxWJLLMDQ1R7TXvX3yqdJHrdtsTH811N','2014-09-25 16:47:34','2015-10-21 22:24:24'),(164,'avatar.png','','','prueba','$2y$10$qlJACVEkp./yuw9IR6gDseCz0lEIvqM13IaobD2HCRBZnbMj7qr/m','asistente','ittg','jogs78@yahoo.com','3f60a3c255095e446cfc8963e685e250','11','Instituto Tecnologico de Tuxtla Gutierrez','','','','','',1,1,0,0,1,0,0,1,0,'t0MVoQHDH93KtrCxrak87JKdaKetq4yontpQ9n9MQio7IuX8M2uVxv3o3oMB','2014-10-26 00:57:26','2014-11-12 07:11:01');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-21 20:51:43
