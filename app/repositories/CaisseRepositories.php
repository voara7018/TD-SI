<?php

class CaisseRepositories
{
    private $pdo;

<<<<<<< HEAD
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Récupère toutes les caisses
    public function getCaisses()
    {
        $st = $this->pdo->query("SELECT * FROM caisse ORDER BY numero_caisse");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère une caisse par son ID
    public function getCaisseById($idcaisse)
    {
        $st = $this->pdo->prepare("SELECT * FROM caisse WHERE idcaisse = ?");
        $st->execute([$idcaisse]);
        return $st->fetch(PDO::FETCH_ASSOC);
    }
}
=======
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function afficherListeCaisse()
    {
        $st = $this->pdo->query("SELECT * FROM caisse");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
  
    }
    
}
>>>>>>> b631bd2bba07892243ad05c18a5d713490f155a0
