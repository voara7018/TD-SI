<?php

class StatistiquesController
{
    // GET /statistiques
    // Affiche les statistiques de ventes
    public static function afficherStatistiques()
    {
        if (!isset($_SESSION['user'])) {
            Flight::redirect('/login');
            return;
        }

        $db = Flight::db();
        $achatRepo = new AchatRepositories($db);

        $totalGlobal     = $achatRepo->getTotalVentesGlobal();
        $ventesParProduit = $achatRepo->getTotalVentesParProduit();
        $ventesParJour   = $achatRepo->getTotalVentesParJour();

        Flight::render('statistiques', [
            'totalGlobal'      => $totalGlobal,
            'ventesParProduit' => $ventesParProduit,
            'ventesParJour'    => $ventesParJour,
        ]);
    }
}
