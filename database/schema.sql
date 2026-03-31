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
  idcaisse INT,
  FOREIGN KEY (idcaisse) REFERENCES Caisse(idcaisse)

);

CREATE TABLE IF NOT EXISTS detail_achat (
  iddetail INT AUTO_INCREMENT PRIMARY KEY,
  idachat INT,
  idproduit INT,
  quantite INT,
  prix_unitaire DECIMAL(10, 2),

  FOREIGN KEY (idachat) REFERENCES achat(idachat),
  FOREIGN KEY (idproduit) REFERENCES produits(idproduit)

);

