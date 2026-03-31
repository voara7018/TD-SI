<?php

class CaisseRepositories
{
    private $pdo;

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