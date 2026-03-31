<?php

require_once __DIR__ . '/../controllers/ProduitController.php';
require_once __DIR__ . '/../repositories/ProduitRepositories.php';

Flight::route('GET /', ['ProduitController', 'afficherListeProduits']);