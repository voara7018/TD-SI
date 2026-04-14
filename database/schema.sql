CREATE DATABASE IF NOT EXISTS `caisse_supermarche`;
USE `caisse_supermarche`;

-- Table produit
CREATE TABLE IF NOT EXISTS produit (
    idproduit INT AUTO_INCREMENT PRIMARY KEY,
    designation VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    quantite_stock INT NOT NULL DEFAULT 0
);

-- Table caisse
CREATE TABLE IF NOT EXISTS caisse (
    idcaisse INT AUTO_INCREMENT PRIMARY KEY,
    numero_caisse INT NOT NULL
);

-- Table achat (une transaction par client)
CREATE TABLE IF NOT EXISTS achat (
    idachat INT AUTO_INCREMENT PRIMARY KEY,
    idcaisse INT NOT NULL,
    dateAchat DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idcaisse) REFERENCES caisse(idcaisse)
);

-- Table achat_detail (lignes du panier)
CREATE TABLE IF NOT EXISTS achat_detail (
    iddetail INT AUTO_INCREMENT PRIMARY KEY,
    idachat INT NOT NULL,
    idproduit INT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idachat) REFERENCES achat(idachat),
    FOREIGN KEY (idproduit) REFERENCES produit(idproduit)
);
