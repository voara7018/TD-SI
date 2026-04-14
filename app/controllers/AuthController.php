<?php

class AuthController
{
    // GET /login
    // Affiche le formulaire de connexion
    public static function afficherLogin()
    {
        Flight::render('login', []);
    }

    // POST /login
    // Traite le formulaire et redirige vers le choix de caisse
    public static function traiterLogin()
    {
        $username = Flight::request()->data->username;
        $password = Flight::request()->data->password;

        // Authentification simple (pas de BDD, niveau pédagogique)
        if (!empty($username) && !empty($password)) {
            $_SESSION['user'] = $username;
            Flight::redirect('/');
        } else {
            Flight::render('login', ['erreur' => 'Identifiants invalides.']);
        }
    }
}
