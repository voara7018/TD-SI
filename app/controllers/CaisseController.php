<?php

class CaisseController
{
    public static function afficherListeCaisse()
    {
        $db = Flight::db();
        $caisseRepo = new CaisseRepositories($db);
    
        $caisses = $caisseRepo->afficherListeCaisse();

        Flight::render('numerocaisse', ['caisses' => $caisses]);
    }
}