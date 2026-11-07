
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Running'),(2,'Casual'),(3,'Trail');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'Ride ISO','Saucony','Zapatilla de running con buena amortiguación.',119.99,'public/img/productos/saucony-running-gris-azul.jpg',1),(2,1,'Gel-Kayano 14','Asics','Zapatillas de running inspiradas en la armadura gótica, con malla abierta.',159.99,'public/img/productos/asics-gel-kayano-14-plata.jpg',1),(3,2,'Air Max','Nike','Con rebote bien sostenido, capas onduladas de piel sintética y malla transpirable.',129.99,'public/img/productos/nike-air-max-blanco-naranja.jpg',1),(4,2,'Superstar','Adidas','Icónica zapatilla adidas con empeine de piel suave y mítica puntera de goma.',89.99,'public/img/productos/adidas-superstar-negro.jpg',1),(5,2,'Smash','Puma','Piel acolchada, ojetera actualizada y cuello acolchado.',74.99,'public/img/productos/puma-blanca-roja.jpg',1),(6,3,'Pegasus Trail','Nike','Zapatillas para correr kilómetros por paisajes espectaculares, con tejido GORE-TEX.',139.99,'public/img/productos/nike-pegasus-trail-gris-naranja.jpg',1),(8,1,'Fresh Foam 1080','New Balance','Zapatilla de running con espuma suave para entrenamientos largos.',149.99,'public/img/productos/new-balance-running-azul.jpg',1),(9,3,'Speedcross 6','Salomon','Zapatilla de trail con buen agarre para terrenos irregulares.',139.99,'public/img/productos/salomon-trail-verde.jpg',1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `producto_talla` WRITE;
/*!40000 ALTER TABLE `producto_talla` DISABLE KEYS */;
INSERT INTO `producto_talla` VALUES (1,'40',9),(1,'41',4),(1,'42',2),(2,'42',4),(2,'43',3),(2,'44',4),(3,'40',2),(3,'41',6),(3,'42',0),(4,'35',0),(4,'36',3),(4,'37',2),(5,'35',1),(5,'36',2),(5,'37',4),(6,'42',0),(6,'43',1),(6,'44',2),(8,'41',5),(8,'42',4),(8,'43',3),(9,'42',4),(9,'43',6),(9,'44',2);
/*!40000 ALTER TABLE `producto_talla` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

