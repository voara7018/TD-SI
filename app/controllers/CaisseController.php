<?php

class CaisseController
{
<<<<<<< HEAD
    // GET /
    // Affiche la liste des caisses pour en choisir une
    public static function afficherChoixCaisse()
    {
        // Redirige vers login si non connecté
        if (!isset($_SESSION['user'])) {
            Flight::redirect('/login');
            return;
        }

        $db = Flight::db();
        $caisseRepo = new CaisseRepositories($db);
        $caisses = $caisseRepo->getCaisses();

        Flight::render('choix_caisse', ['caisses' => $caisses]);
    }

    // POST /choix-caisse
    // Enregistre la caisse choisie en session et crée un nouvel achat
    public static function choisirCaisse()
    {
        if (!isset($_SESSION['user'])) {
            Flight::redirect('/login');
            return;
        }

        $idcaisse = Flight::request()->data->idcaisse;

        if (empty($idcaisse)) {
            Flight::redirect('/');
            return;
        }

        $db = Flight::db();
        $achatRepo = new AchatRepositories($db);

        // Créer un premier achat pour ce client
        $idachat = $achatRepo->creerAchat($idcaisse);

        $_SESSION['idcaisse'] = $idcaisse;
        $_SESSION['idachat']  = $idachat;

        Flight::redirect('/achat');
    }
}
=======
    public static function afficherListeCaisse()
    {
        $db = Flight::db();
        $caisseRepo = new CaisseRepositories($db);
    
        $caisses = $caisseRepo->afficherListeCaisse();

        Flight::render('numerocaisse', ['caisses' => $caisses]);
    }
}
>>>>>>> b631bd2bba07892243ad05c18a5d713490f155a0
