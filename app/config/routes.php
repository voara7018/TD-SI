<?php

require_once __DIR__ . '/../repositories/ProduitRepositories.php';
require_once __DIR__ . '/../controllers/ProduitController.php';
require_once __DIR__ . '/../controllers/CaisseController.php';
require_once __DIR__ . '/../controllers/CaisseRepositories.php';

Flight::route('GET /', ['ProduitController', 'afficherListeProduits']);
Flight::route('GET /caisses', ['CaisseController', 'afficherListeCaisse']);