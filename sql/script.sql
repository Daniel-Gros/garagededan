-- Création de la base de données du garage

CREATE DATABASE IF NOT EXISTS dangarage;

USE dangarage;

-- Création de la première table User
CREATE TABLE IF NOT EXISTS 'user'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'email' VARCHAR(255) NOT NULL,
    'password' VARCHAR(255) NOT NULL,
    'role' VARCHAR(255) NOT NULL
);

-- insertion dans la table du compte admin de Vincent Parrot
INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (1, 'admin@vparrot.fr', '[\"ROLE_ADMIN\"]', SHA2('admin', 256));
INSERT INTO 'user' ('id', 'email', 'roles', 'password') VALUES (2, 'test@test.fr', '[\"ROLE_USER\"]', SHA2('employé', 256));


-- Création des autres tables concernant la voiture
CREATE TABLE IF NOT EXISTS 'brand'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'color'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'din_power'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'number_of_din_hp' INT NOT NULL
);

CREATE TABLE IF NOT EXISTS 'door'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'number_of_doors' INT NOT NULL
);

CREATE TABLE IF NOT EXISTS 'energy'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'models'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS 'power'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'number_of_hp' INT NOT NULL
);

CREATE TABLE IF NOT EXISTS 'sit'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'number_of_sits' INT NOT NULL
);

CREATE TABLE IF NOT EXISTS 'service'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL,
    'description' TEXT NOT NULL,
    'image_name' VARCHAR(255) NOT NULL,
    'image_size' INT NOT NULL,
    'updated_at' DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS 'car'
(
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'brand_id' INT NOT NULL,
    'color_id' INT NOT NULL,
    'din_power_id' INT NOT NULL
    'door_id' INT NOT NULL,
    'energy_id' INT NOT NULL,
    'image_name' VARCHAR(255) NOT NULL,
    'image_size' INT NOT NULL,
    'kilometers' INT NOT NULL,
    'models_id' INT NOT NULL,
    'power_id' INT NOT NULL,
    'price' INT NOT NULL,
    'sit_id' INT NOT NULL,
    'updated_at' DATETIME NOT NULL,
    'year' DATE NOT NULL,
);

-- Insertion des données dans les tables

INSERT INTO 'brand' ('id', 'name')
VALUES (1, 'Peugeot'),
    (2, 'Renault'),
    (3, 'Citroën'),
    (4, 'BMW'),
    (5, 'Audi'),
    (6, 'Volkswagen'),
    (7, 'Toyota'),
    (8, 'Honda'),
    (9, 'Hyundai'),
    (10, 'Skoda'),
    (11, 'Mercedes'),
    (12, 'Range Rover');

INSERT INTO 'color' ('id', 'name')
VALUES (1, 'Blanche'),
    (2, 'Noire'),
    (3, 'Grise'),
    (4, 'Rouge'),
    (5, 'Bleue'),
    (6, 'Verte'),
    (7, 'Jaune'),
    (8, 'Orange'),
    (9, 'Marron');

INSERT INTO 'din_power' ('id', 'number_of_din_hp')
VALUES (29, 4),
    (30, 5),
    (31, 6),
    (32, 7),
    (33, 8),
    (34, 9),
    (35, 10),
    (36, 11),
    (37, 12),
    (38, 13),
    (39, 14),
    (40, 15),
    (41, 20),
    (42, 25),
    (43, 30);

INSERT INTO 'door' ('id', 'number_of_doors')
VALUES (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5);

INSERT INTO 'energy' ('id', 'name')
VALUES (1, 'Essence'),
    (2, 'Diesel'),
    (3, 'Hybride'),
    (4, 'Electrique')
    (5, 'GPL');

INSERT INTO 'models' ('id', 'name')
VALUES (1, '205 GTI'),
    (2, '407'),
    (3, 'Z4'),
    (4, 'C4'),
    (5, 'Ami'),
    (6, 'Clio RS'),
    (7, 'Megane E-tech'),
    (8, '2 chevaux'),
    (9, 'série 3'),
    (10, 'RCZ'),
    (11, 'Classe A'),
    (12, 'RS6 quattro'),
    (13, 'Evoque');

INSERT INTO 'power' ('id', 'number_of_hp')
VALUES (18, 80),
    (19, 90),
    (21, 100),
    (22, 110),
    (23, 120),
    (24, 130),
    (25, 150),
    (26, 190),
    (27, 200),
    (28, 220),
    (29, 250),
    (30, 300),
    (31, 350);

INSERT INTO 'car' ('id', 'year', 'price', 'kilometers', 'models_id', 'energy_id', 'brand_id', 'color_id', 'sit_id', 'door_id', 'power_id', 'din_power_id') 
VALUES 
    (6, 1989-03-22, 3500, 175000, 1, 1, 1, 4, 2, 3, 24),
    (8, 2003-06-25, 2500, 255000, 2, 2, 1, 4, 2, 1 ,3),
    (14, 2012-06-14, 18500, 26000, 3,	2, 4, 2, 1, 3, 26, 40), 	 	
	(15, 2006-10-15, 5000, 45000, 4, 2, 3, 1, 2, 5, 15, 29), 
	(16, 2022-09-20, 2500 , 3000 	5, 4, 3, 3, 1, 3, 15, 29), 	
	(17, 2013-07-16, 12600, 83000, 6, 1, 2, 7, 2, 3, 22, 34), 	
	(18, 2021-11-30, 26900, 14500, 13, 2, 12, 1, 3, 5, 26, 40), 	
	(19, 2015-08-18, 29450, 64700, 7, 4, 2, 1, 3, 5, 24, 37), 	
	(20, 2021-11-28, 49500, 21000, 9, 3, 4, 1, 3, 5, 27, 41), 	
	(21, 2014-03-19, 21000, 15000, 11, 2, 11, 5, 3, 5, 15, 40),
    (22, 2019-01-25, 64000, 18000, 12, 1, 5, 5, 3, 5, 31, 42); 

INSERT INTO 'service' ('id', 'name', 'description', 'image_name', 'updated_at')
VALUES (1, 'Carrosserie et peinture', 'Nous opérons sur les travaux de rénovation de vos véhicules au niveau carrosserie et peinture. Nous sommes agrées toute assurance française en cas de sinistres.', 'cabine-peinture-mustang-rouge-662de8b98245f250779763.jpg', 2024-04-28 08:12:09),
    (2, 'Petit Entretien', 'Nous assurons les petits travaux d entretien de vos véhicules , changement de pneus, équilibrage, vidange, changement de plaquettes et disques.', 'pneu-662de97156799478255149.jpg', 2024-04-28 08:15:13 ),
    (3, 'Remplacement ou réparation de votre parebrise' , 'nous nous occupons de changer votre parebrise ou de réparer l impact si cela s avère seulement nécessaire. Nous sommes agrées toute assurance française pour ce type de travaux.','changement-parebrise-662dea9255649357210326.jpg', 2024-04-28 08:20:02),
    (4, 'Démarches administratives', 'Nous pouvons nous occuper de vos formalités de carte grise, vous aurez un gain de temps exponentiel en nous faisant confiance dans ces démarches.', 'carte-grise-662df753cf0c4144475425.jpg', 2024-04-28 09:14:27),
    (5, 'Réparation importante', 'Nous avons la capacité d assurer des réparations de gros œuvre ( changement moteur, culasse, changement de boîte de vitesse complète). Un devis vous sera remis, nous ne débuterons aucuns travaux sans votre accord signé.', 'moteur-voiture-662deb802ecdd685789106.jpg', 2024-04-28 08:24:00 );