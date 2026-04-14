USE `caisse_supermarche`;

-- 5 produits
INSERT INTO produit (designation, prix, quantite_stock) VALUES
('Pomme', 0.50, 100),
('Banane', 0.30, 150),
('Lait', 1.20, 50),
('Pain', 0.80, 200),
('Fromage', 2.50, 30);

-- 2 caisses
INSERT INTO caisse (numero_caisse) VALUES
(1),
(2);