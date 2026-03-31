<?php

require_once __DIR__ . '/../repositories/ProduitRepositories.php';
require_once __DIR__ . '/../controllers/ProduitController.php';

Flight::route('GET /', ['ProduitController', 'afficherListeProduits']);