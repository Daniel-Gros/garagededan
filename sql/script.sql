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
INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (NULL, 'admin@vparrot.fr', '[\"ROLE_ADMIN\"]', 'password-hash et donné au client');


INSERT INTO 'car' ('id', 'year', 'price', 'kilometers', 'models_id', 'energy_id', 'brand_id', 'color_id', 'sit_id', 'door_id', 'power_id', 'din_power_id') 
VALUES 
    (NULL, 1989-03-22, 3500, 175000, 1, 1, 1, 4, 2, 3, 24),
    (NULL, 2003-06-25, 2500, 255000, 2, 2, 1, 4, 2, 1 ,3),
    (NULL, 2012-06-14, 18500, 26000, 3,	2, 4, 2, 1, 3, 26, 40), 	 	
	(NULL, 2006-10-15, 5000, 45000, 4, 2, 3, 1, 2, 5, 15, 29), 
	(NULL, 2022-09-20, 2500 , 3000 	5, 4, 3, 3, 1, 3, 15, 29), 	
	(NULL, 2013-07-16, 12600, 83000, 6, 1, 2, 7, 2, 3, 22, 34), 	
	(NULL, 2021-11-30, 26900, 14500, 13, 2, 12, 1, 3, 5, 26, 40), 	
	(NULL, 2015-08-18, 29450, 64700, 7, 4, 2, 1, 3, 5, 24, 37), 	
	(NULL, 2021-11-28, 49500, 21000, 9, 3, 4, 1, 3, 5, 27, 41), 	
	(NULL, 2014-03-19, 21000, 15000, 11, 2, 11, 5, 3, 5, 15, 40); 	
