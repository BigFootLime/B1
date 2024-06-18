```SQL


Question  1 

Pour trouver les villes commencents par P : 

SELECT * FROM villes WHERE `nom` LIKE 'P%'

Question 2 

comment selectionner les villes situées dans les départements entre 75 et 95 

SELECT * FROM villes where departement BETWEEN 75 AND 95 

Question 3
Lister distinctement les noms réels de toutes les villes ayant une population en
2010 supérieure à 20 000 habitants

SELECT DISTINCT nom_reel FROM villes WHERE population_2010 > 20000;

Question 4 

Trouver les villes dont le code postal est compris entre 75000 et 75020

SELECT * FROM villes WHERE code_postal BETWEEN 75000 AND 75020

question 5 

Sélectionner les villes qui ne sont pas dans les départements 13, 33, 69

SELECT * FROM villes WHERE departement NOT IN (13,33,69)

Question 6 

Lister les villes ayant une population en 2010 entre 10 000 et 50 000 habitants et
situées dans le département 75

SELECT * FROM villes WHERE population_2010 BETWEEN 10000 AND 50000 AND departement = 75

Question 7 

Trouver les villes dont le nom commence par 'A' ou 'B'


SELECT * FROM villes WHERE nom LIKE 'A%' OR nom LIKE 'B%'

Question 8 

Sélectionner les villes dont la densité en 2010 est supérieure à 1000
habitants/km² et ayant une population en 2010 inférieure à 20 000 habitants

SELECT * FROM villes WHERE densite_2010 > 1000.00 AND population_2010 < 20000

question 9 

Lister toutes les villes dont le nom réel est différent du nom simple

SELECT * FROM villes WHERE nom_reel != nom_simple

Question 10 

10. Trouver les villes dont le nom sonore (Soundex) est identique à celui de 'Lyon'




**PARTIE 2** 


Exo 1 


CREATE DATABASE formation;

USE formation;

CREATE TABLE stagiaire
(id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(255) NOT NULL,
prenom VARCHAR(255)NOT NULL,
date_naissance DATE NOT NULL,
email VARCHAR(255) NOT NULL
);

INSERT INTO stagiaire (nom, prenom, date_naissance, email)
VALUES
('Keenan','Martin','2004-16-06','keenan.martin@gmail.com'),
('Grig', 'Johnny', '2000-09-26', 'grig.johnny@gmail.com'),
('Alice', 'Dupont', '1995-04-12', 'alice.dupont@example.com'),
('Jean', 'Lefevre', '1988-11-23', 'jean.lefevre@example.com'),
('Marie', 'Dubois', '1990-09-30', 'marie.dubois@example.com'),
('Paul', 'Durand', '2002-02-14', 'paul.durand@example.com'),
('Lucie', 'Moreau', '1998-07-19', 'lucie.moreau@example.com');


Exo 2 

1. 

UPDATE stagiaire
SET prenom = 'Gontrand'
WHERE prenom = 'Philou';

2. 
DELETE FROM stagiaire
WHERE id = 2

3.
DELETE FROM stagiaire 

4.
DROP TABLE stagiaire

5.
DROP DATABASE formation 

6. 
DROP DATABASE IF EXISTS formation

Exo3 

1.
ALTER TABLE stagiaire 
ADD telephone VARCHAR(255) NOT NULL

2.
ALTER TABLE stagiaire ADD UNIQUE `mail`(`email`);

3.
ALTER TABLE stagiaire
ADD adresse VARCHAR(255) AFTER prenom

4.
ALTER TABLE stagiaire 
DROP adresse 

5.
ALTER TABLE  stagiaire CHANGE telephone tel VARCHAR(255);

6.
ALTER TABLE stagiaire 
CHANGE tel tel VARCHAR(255) NON NULL;

7.
ALTER TABLE stagiaire 
ADD sexe VARCHAR(255) AFTER date_naissance

8.
ALTER TABLE stagiaire 
CHANGE sexe sexe VARCHAR(255) NOT NULL;

9. 
ALTER TABLE stagiaire 
CHANGE sexe sexe VARCHAR(1);

10.
ALTER TABLE stagiaire 
MODIFY sexe ENUM('F', 'M');

11.
ALTER TABLE stagiaire 
ADD pays VARCHAR(255) AFTER email

12.
ALTER TABLE stagiaire 
MODIFY pays VARCHAR(2);

13.
ALTER TABLE stagiaire 
MODIFY pays ENUM('FR', 'BE', 'CH');

