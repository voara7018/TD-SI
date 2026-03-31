<?php

class ProduitController
{
    public static function afficherListeProduits()
    {
        $db = Flight::db();
        $produitRepo = new ProduitRepositories($db);
    
        $produits = $produitRepo->getProduits();

        Flight::render('index', ['produits' => $produits]);
    }
}