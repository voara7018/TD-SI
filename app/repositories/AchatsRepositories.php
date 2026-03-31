<?php

class AchatsRepositories
{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAchats()
    {
        $st = $this->pdo->query("SELECT * FROM achat");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
  
    }

    public function insertAchat($idproduit, $quantite, $prix_unitaire)
    {
        $st = $this->pdo->prepare("INSERT INTO achat (dateAchat, idproduit, prix_unitaire, quantite) VALUES (NOW(), ?, ?, ?)");  
        return $st->execute([$idproduit, $prix_unitaire, $quantite]);

    }

}