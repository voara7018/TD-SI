CREATE DATABASE IF NOT EXISTS `caisse_supermarche`;
USE `caisse_supermarche`;

CREATE TABLE IF NOT EXISTS produit (
  idproduit INT AUTO_INCREMENT PRIMARY KEY,
  designation VARCHAR(255),
  prix DECIMAL(10, 2),
  quantite_stock INT

);

CREATE TABLE IF NOT EXISTS caisse (
  idcaisse INT AUTO_INCREMENT PRIMARY KEY,
  numero_caisse INT

);

CREATE TABLE IF NOT EXISTS achat (
  idachat INT AUTO_INCREMENT PRIMARY KEY,
  dateAchat DATETIME,
  idproduit INT,
  prix_unitaire DECIMAL(10, 2),
  idcaisse INT,
  FOREIGN KEY (idcaisse) REFERENCES caisse(idcaisse)

);

