/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `propiedades` (`id`, `calle`, `precio`, `imagen`, `descripcion`) VALUES
(6, ' Calle N° 3215', 120000.00, '02e7c9a93e8d5a66f612bc11c367f7fe.jpg', 'Departamento monoambiente alquiler Villa Pueyrredón\r\n\r\nMonoambiente con cocina independiente en alquiler. NO acepta mascota. Garantía propietaria o Seguro de Caución.');
INSERT INTO `propiedades` (`id`, `calle`, `precio`, `imagen`, `descripcion`) VALUES
(7, 'Casa N° 3100', 75000.00, '727c25b08b2b5a6d88b8c1684b619a26.jpg', 'Casa adosada de tres habitaciones con piscina comunitaria.\r\nEsta impresionante casa adosada de tres habitaciones cuenta con una piscina comunitaria, lo que significa que podrás disfrutar del sol y la diversión sin tener que preocuparte por el mantenimiento. Con una gran sala de estar abierta, una cocina moderna y tres habitaciones amplias, esta casa es perfecta para familias y personas que disfrutan de la vida al aire libre.');
INSERT INTO `propiedades` (`id`, `calle`, `precio`, `imagen`, `descripcion`) VALUES
(8, ' Casa N° 5025', 250000.00, 'fb63d9bf1b096649cd0a8e51a3191734.jpg', 'Apartamento de dos habitaciones en un complejo con piscina y jardines.\r\nEste hermoso apartamento de dos habitaciones se encuentra en un complejo con piscina y jardines, lo que significa que podrás disfrutar de todas las comodidades que ofrece el complejo. Con una cocina equipada, una amplia sala de estar y dos habitaciones cómodas, este apartamento es perfecto para aquellos que buscan un estilo de vida relajado y tranquilo.');
INSERT INTO `propiedades` (`id`, `calle`, `precio`, `imagen`, `descripcion`) VALUES
(12, ' Casa N° 4040', 130000.00, 'c96d6147a46395f5f9afaff3cfbd9205.jpg', 'Casa de campo con jardín y vistas panorámicas.\r\nEsta hermosa casa de campo cuenta con un jardín privado y vistas panorámicas de la campiña circundante. Con una amplia sala de estar con chimenea, una cocina rústica y tres habitaciones acogedoras, esta casa es perfecta para aquellos que buscan una vida tranquila y pacífica en la naturaleza.'),
(14, ' Casa N° 3203', 800000.00, '1166c7b0bd403d3610863bc873f14487.jpg', 'Apartamento de un dormitorio con vistas al mar.\r\nEste encantador apartamento de un dormitorio ofrece impresionantes vistas al mar, perfectas para disfrutar de los atardeceres y amaneceres. Con una cocina equipada y una sala de estar abierta, tendrás todo lo que necesitas para relajarte después de un día en la playa. Además, la ubicación del apartamento es inmejorable, ya que está a pocos minutos de la playa y de todos los servicios.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;