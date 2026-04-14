<?php

class ProduitRepositories
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Récupère tous les produits
    public function getProduits()
    {
        $st = $this->pdo->query("SELECT * FROM produit ORDER BY designation");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère un produit par son ID
    public function getProduitById($idproduit)
    {
        $st = $this->pdo->prepare("SELECT * FROM produit WHERE idproduit = ?");
        $st->execute([$idproduit]);
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    // Diminue le stock d'un produit après un achat
    public function diminuerStock($idproduit, $quantite)
    {
        $st = $this->pdo->prepare(
            "UPDATE produit SET quantite_stock = quantite_stock - ? WHERE idproduit = ?"
        );
        return $st->execute([$quantite, $idproduit]);
    }
}