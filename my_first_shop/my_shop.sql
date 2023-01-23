/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ my_shop /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE my_shop;

DROP TABLE IF EXISTS categories;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS products;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `category_name` varchar(255) DEFAULT NULL,
  `parent_category_id` int DEFAULT NULL,
  `parent_category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

INSERT INTO categories(id,name,parent_id,parent_category) VALUES(10,'armchairs',1,'chairs'),(11,'table chairs',1,'chairs'),(20,'king size bed',2,'beds'),(30,'modern sofas',3,'sofas'),(31,'leather sofas',3,'sofas'),(40,'side tables',4,'tables'),(41,'dining tables',4,'tables'),(50,'shelves',5,'storage');

<<<<<<< HEAD
INSERT INTO products(id,name,price,photo,description,category_id,category_name,parent_category_id) VALUES(2,'Nille',950,'../images/armchair.crud.jpg','Confortable and modern armchair',10,'armchairs',1),(3,'Penemille',120,'../images/chair.crud.jpg','Very confortable chair in scandinavian style',11,'table chairs ',1),(4,'Keeve Set',590,'../images/table-chairs.crud.jpg','Set of chairs that will perfectly suits your home design',11,'table chairs',1),(6,'Dream',490,'../images/king-size-bed.crud.jpg','That\'s your dream bed ',20,'king size bed',2),(7,'Velvet',1290,'../images/modern-blue-sofa.crud.jpg','Cosy and modern sofa  with corner',30,'modern sofas',3),(8,'Coombes',2600,'../images/sofa.crud.jpg','THE leather sofa for all the family',30,'modern sofas',3),(9,'Tacoma',3400,'../images/leather-sofa.crud.jpg','Perfect sofa for living rooms or offices',31,'leather sofas ',3),(65,'White',3700,'../images/large-white-sofa.crud.jpg','White and modern sofa for everyone and every style',31,'leather sofas',3),(66,'Blanko',90,'../images/side-table.crud.jpg','Useful little white table, perfect near an armchair or sofa ',40,'side tables',4),(67,'Wood',990,'../images/wooden-table.crud.jpg','Big authentic table for family',41,'dining tables',4),(68,'Square',880,'../images/square-wood-table.crud.jpg','Gather everyone around this beautiful table',41,'dining tables',4),(69,'Kappu',420,'../images/shelves.crud.jpg','Very useful shelves to store all your items',50,'shelves',5),(70,'Momo',890,'../images/book-shelves.crud.jpg','Authentic and very high book shelves  ',50,'shelves',5);
=======
INSERT INTO products(id,name,price,photo,description,category_id,category_name,parent_category_id,parent_category_name) VALUES(2,'Nille',950,'../images/armchair.crud.jpg','Confortable and modern black armchair',10,'armchairs',1,'chairs'),(3,'Penemille',120,'../images/chair.crud.jpg','Very confortable white chair in scandinavian style',11,'table chairs ',1,'chairs'),(4,'Keeve Set',590,'../images/table-chairs.crud.jpg','Set of black chairs that will perfectly suits your home design',11,'table chairs',1,'chairs'),(6,'Dream',490,'../images/king-size-bed.crud.jpg','That\'s your dream white bed ',20,'king size bed',2,'beds'),(7,'Velvet',1290,'../images/modern-blue-sofa.crud.jpg','Cosy and modern brown sofa  with corner',30,'modern sofas',3,'sofas'),(8,'Coombes',2600,'../images/sofa.crud.jpg','THE leather light brown  sofa for all the family',30,'modern sofas',3,'sofas'),(9,'Tacoma',3400,'../images/leather-sofa.crud.jpg','Perfect brown sofa for living rooms or offices',31,'leather sofas ',3,'sofas'),(65,'White',3700,'../images/large-white-sofa.crud.jpg','White and modern sofa for everyone and every style',31,'leather sofas',3,'sofas'),(66,'Blanko',90,'../images/side-table.crud.jpg','Useful little white table, perfect near an armchair or sofa ',40,'side tables',4,'tables'),(67,'Wood',990,'../images/wooden-table.crud.jpg','Big authentic brown table for family',41,'dining tables',4,NULL),(68,'Square',880,'../images/square-wood-table.crud.jpg','Gather everyone around this beautiful brown table',41,'dining tables',4,NULL),(69,'Kappu',420,'../images/shelves.crud.jpg','Very useful brown shelves to store all your items',50,'shelves',5,'storage'),(70,'Momo',890,'../images/book-shelves.crud.jpg','Authentic and very high brown book shelves  ',50,'shelves',5,'storage');
>>>>>>> 7f4da7e7bff7c2a11d40ca01d1d76f56b081b0c5
INSERT INTO users(id,username,password,email,admin) VALUES(1,'vladi','$2y$10$q.8EEm65pW7E7y29jFbZPuVd4zOuzuQJJCPLLe6JKhCDkXY.zCNe2','vladi@epitech.eu',1),(2,'alex','$2y$10$q.8EEm65pW7E7y29jFbZPuVd4zOuzuQJJCPLLe6JKhCDkXY.zCNe2','alex@epitech.eu',1),(3,'sam','$2y$10$DKFyB0XWD/MZ9JYKv8EBgu2XVrSg/h0aM9Bar4JhaJak03YuBGB2u','sam@epitech.eu',1),(4,'tom','$2y$10$8AqVlYkNhYSnr4ZrgeO4reUS7jbUV9Q/r8YzzcbJqN9zHjxnhlhQ2','tom@gmail.com',0),(5,'sofia','$2y$10$cyljQ4A3XXiFXAs/NQhhA.x11OsRIeERjH.AWqf8N5SprVIXK0Msy','sofia@outlook.fr',0),(6,'julio','$2y$10$bt/Oc1iATsxcl07vYdgbs.drG60uIEEwk0Sk55tm4Rx4jtSWwi102','julio@epitech.eu',0);