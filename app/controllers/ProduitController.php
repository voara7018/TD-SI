<?php

class ProduitController
{
    public static function afficherListeProduits()
    {
        $db = Flight::db();
        $produitRepo = new ProduitRepositories($db);
        $produits = $produitRepo->listeProduits();

        Flight::render('produits', ['produits' => $produits]);
    }
}