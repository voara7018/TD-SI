<?php

require_once __DIR__ . '/../repositories/ProduitRepositories.php';
require_once __DIR__ . '/../repositories/CaisseRepositories.php';
require_once __DIR__ . '/../repositories/AchatRepositories.php';
require_once __DIR__ . '/../controllers/ProduitController.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/CaisseController.php';
require_once __DIR__ . '/../controllers/AchatController.php';
require_once __DIR__ . '/../controllers/StatistiquesController.php';



// Login
Flight::route('GET /login',  ['AuthController', 'afficherLogin']);
Flight::route('POST /login', ['AuthController', 'traiterLogin']);

// page d'accueil
Flight::route('GET /',               ['CaisseController', 'afficherChoixCaisse']);
Flight::route('POST /choix-caisse',  ['CaisseController', 'choisirCaisse']);

// Page d'achat
Flight::route('GET /achat',             ['AchatController', 'afficherAchat']);
Flight::route('POST /ajouter-produit',  ['AchatController', 'ajouterProduit']);
Flight::route('POST /cloturer-achat',   ['AchatController', 'cloturerAchat']);

// Statistiques
Flight::route('GET /statistiques', ['StatistiquesController', 'afficherStatistiques']);