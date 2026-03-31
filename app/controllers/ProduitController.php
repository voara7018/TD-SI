<?php

class ProduitController
{
    public static function afficherListeProduits()
    {
        $db = Flight::db();
        $produitRepo = new ProduitRepositories($db);
    
        $produits = $produitRepo->afficherListeProduits();

        Flight::render('index', ['produits' => $produits]);
    }
}