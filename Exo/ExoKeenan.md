## Answer Section Exercise 1

### Question:

Trouver toutes les villes dont le nom commence par la lettre P

### Answer:

```sql
SELECT * FROM villes WHERE nom LIKE 'P%'
```

### Question:

Sélectionner les villes situées dans les départements 75, 77, 78, 91, 92, 93, 94, 95

### Answer:

```sql
SELECT * FROM villes WHERE departement BETWEEN 75 AND 95 ORDER BY `villes`.`departement`;
```

### Question:

Lister distinctement les noms réels de toutes les villes ayant une population en
2010 supérieure à 20 000 habitants

### Answer:

```sql
SELECT DISTINCT nom_reel FROM villes WHERE population_2010 > 20000;
```

### Question:

Trouver les villes dont le code postal est compris entre 75000 et 75020

### Answer:

```sql
SELECT * FROM villes WHERE code_postal BETWEEN 75000 AND 75020
```

### Question:

Sélectionner les villes qui ne sont pas dans les départements 13, 33, 69

### Answer:

```sql
SELECT * FROM villes WHERE departement NOT IN (13, 33, 69);
```

### Question:

Lister les villes ayant une population en 2010 entre 10 000 et 50 000 habitants et
situées dans le département 75

### Answer:

```sql
SELECT * FROM villes WHERE population_2010 BETWEEN 10000 AND 50000 AND departement = 75
```

### Question:

Trouver les villes dont le nom commence par 'A' ou 'B'

### Answer:

```sql
SELECT * FROM villes WHERE nom LIKE 'A%' OR nom LIKE 'B%'
```

### Question:

Sélectionner les villes dont la densité en 2010 est supérieure à 1000
habitants/km² et ayant une population en 2010 inférieure à 20 000 habitants

### Answer:

```sql
SELECT * FROM villes WHERE densite_2010 > 1000.00 AND population_2010 < 20000
```

### Question:

Lister toutes les villes dont le nom réel est différent du nom simple

### Answer:

```sql
SELECT * FROM villes WHERE nom_reel != nom_simple
```

### Question:

Trouver les villes dont le nom sonore (Soundex) est identique à celui de 'Lyon'

### Answer:

```sql
SELECT * FROM villes WHERE Soundex(nom) = Soundex('Lyon')
```

## Answer Section Exercice suite

### Exercice 1

### Question:

Créer une base de données nommée formation ;
Créer une table stagiaire avec les champs suivants :
id : entier auto-incrémenté, clé primaire ;
nom : chaîne de caractères ;
prenom : chaîne de caractères ;
date_naissance : date ;
email : chaîne de caractères ;
Insérer des données dans la table stagiaire.

### Answer:

```sql
CREATE DATABASE formation;
USE formation;

CREATE TABLE stagiaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255)NOT NULL,
    date_naissance DATE NOT NULL,
    email VARCHAR(255) NOT NULL

);

INSERT INTO stagiaire (nom, prenom, date_naissance, email)
VALUES
('Bocuse', 'Paul','1999-06-13','paulbocuse@gmail.com'),
('John', 'Doe','1989-02-24','jdoe@gmail.com'),
('Dylan', 'Deplante','2004-10-29','dylandeplante@gmail.com'),
('Lenovo', 'George','1944-02-21','lenovo@gmail.com'),
('Dell', 'Sarah', '1956-08-15', 'sarah.dell@example.com'),
('HP', 'Johnathan', '1968-11-02', 'john.hp@example.com'),
('Apple', 'Emily', '1980-07-30', 'emily.apple@example.com'),
('Acer', 'Michael', '1975-03-18', 'michael.acer@example.com'),
('Asus', 'Linda', '1990-12-05', 'linda.asus@example.com');
```

### Exercice 2

### Question:

Mettre à jour le prénom de Johnathan en "Johnny" ;

### Answer:

```sql
UPDATE stagiaire SET prenom='Johnny' WHERE  `id` = 2
```

### Question:

Supprimer le stagiaire dont l'id est 2.

### Answer:

```sql
DELETE FROM `stagiaire` WHERE `id` = 2
```

### Question:

Supprimer tous les stagiaires.

### Answer:

```sql
DELETE FROM `stagiaire`WHERE 1;
```

### Question:

Supprimer la table stagiaire.

### Answer:

```sql
DROP TABLE `stagiaire`;
```

### Question:

Supprimer la base de données formation.

### Answer:

```sql
DROP DATABASE `formation`;
```

### Question:

Supprimer la base de données formation si elle existe.

### Answer:

```sql
DROP DATABASE IF EXISTS `formation`;

```

### Exercice 3

### Question:

Ajouter un champ telephone de type chaîne de caractères à la table stagiaire.

### Answer:

```sql
ALTER TABLE stagiaire ADD COLUMN telephone INT(10);
```

### Question:

Modifier le champ email pour qu'il soit unique.

### Answer:

```sql
ALTER TABLE stagiaire ADD UNIQUE(email)
```

### Question:

Ajouter un champ adresse de type chaîne de caractères après le champ prenom.

### Answer:

```sql
ALTER TABLE stagiaire ADD COLUMN adresse VARCHAR(255) AFTER prenom ;
```

## Question:

Supprimer le champ adresse

### Answer:

```sql
ALTER TABLE stagiaire DROP COLUMN adresse;
```

## Question:

Renommer le champ telephone en tel.

### Answer:

```sql
ALTER TABLE  stagiaire CHANGE telephone tel VARCHAR(255);
```

## Question:

Modifier le champ tel pour qu'il soit non nul.

### Answer:

```sql
ALTER TABLE  stagiaire CHANGE tel tel VARCHAR(255) NOT NULL;
```

## Question:

Ajouter un champ sexe de type chaîne de caractères après le champ date_naissance.

### Answer:

```sql
ALTER TABLE  stagiaire ADD COLUMN sexe VARCHAR(255) AFTER date_naissance
```

## Question:

Modifier le champ sexe pour qu'il soit non nul.

### Answer:

```sql
ALTER TABLE  stagiaire CHANGE sexe sexe VARCHAR(255) NOT NULL;
```

## Question:

Modifier le champ sexe pour qu'il soit de taille 1.

### Answer:

```sql
ALTER TABLE  stagiaire CHANGE sexe sexe VARCHAR(1) ;
```

## Question:

Modifier le champ sexe pour qu'il soit de taille 1 et qu'il accepte les valeurs 'M' ou 'F'.

### Answer:

```sql
ALTER TABLE stagiaire
MODIFY sexe ENUM('f', 'm');

```

## Question:

Ajouter un champ pays de type chaîne de caractères après le champ email.

### Answer:

```sql
ALTER TABLE  stagiaire ADD COLUMN pays VARCHAR(255) AFTER email
```

## Question:

Modifier le champ pays pour qu'il soit de taille 2.

### Answer:

```sql
ALTER TABLE  stagiaire MODIFY pays VARCHAR(2) ;
```

## Question:

Modifier le champ pays pour qu'il soit de taille 2 et qu'il accepte les valeurs 'FR', 'BE' ou 'CH'.

### Answer:

```sql
ALTER TABLE stagiaire
MODIFY pays ENUM('FR', 'BE', 'CH');
```
