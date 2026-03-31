<?php

class ProduitRepositories
{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function afficherListeProduits()
    {
        $st = $this->pdo->query("SELECT * FROM produit");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
  
    }
    
}