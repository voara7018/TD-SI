<?php

class AchatController
{
    // GET /achat
    // Affiche la page principale de caisse
    public static function afficherAchat()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['idcaisse'])) {
            Flight::redirect('/login');
            return;
        }

        $db = Flight::db();
        $produitRepo = new ProduitRepositories($db);
        $caisseRepo  = new CaisseRepositories($db);
        $achatRepo   = new AchatRepositories($db);

        $produits = $produitRepo->getProduits();
        $caisse   = $caisseRepo->getCaisseById($_SESSION['idcaisse']);
        $details  = $achatRepo->getDetailsByAchat($_SESSION['idachat']);
        $total    = $achatRepo->getTotalAchat($_SESSION['idachat']);

        Flight::render('achat', [
            'produits' => $produits,
            'caisse'   => $caisse,
            'details'  => $details,
            'total'    => $total,
            'message'  => $_SESSION['message'] ?? null,
            'erreur'   => $_SESSION['erreur']  ?? null,
        ]);

        // Effacer les messages flash après affichage
        unset($_SESSION['message'], $_SESSION['erreur']);
    }

    // POST /ajouter-produit
    // Ajoute un produit au panier (achat_detail) et diminue le stock
    public static function ajouterProduit()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['idachat'])) {
            Flight::redirect('/login');
            return;
        }

        $idproduit = (int) Flight::request()->data->idproduit;
        $quantite  = (int) Flight::request()->data->quantite;

        if ($idproduit <= 0 || $quantite <= 0) {
            $_SESSION['erreur'] = 'Produit ou quantité invalide.';
            Flight::redirect('/achat');
            return;
        }

        $db = Flight::db();
        $produitRepo = new ProduitRepositories($db);
        $achatRepo   = new AchatRepositories($db);

        $produit = $produitRepo->getProduitById($idproduit);

        if (!$produit) {
            $_SESSION['erreur'] = 'Produit introuvable.';
            Flight::redirect('/achat');
            return;
        }

        // Vérification du stock
        if ($produit['quantite_stock'] < $quantite) {
            $_SESSION['erreur'] = 'Stock insuffisant. Stock disponible : ' . $produit['quantite_stock'];
            Flight::redirect('/achat');
            return;
        }

        // Ajouter la ligne au détail et diminuer le stock
        $achatRepo->ajouterDetail($_SESSION['idachat'], $idproduit, $quantite, $produit['prix']);
        $produitRepo->diminuerStock($idproduit, $quantite);

        $_SESSION['message'] = htmlspecialchars($produit['designation']) . ' ajouté avec succès.';
        Flight::redirect('/achat');
    }

    // POST /cloturer-achat
    // Clôture l'achat en cours et crée un nouveau pour le prochain client
    public static function cloturerAchat()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['idachat'])) {
            Flight::redirect('/login');
            return;
        }

        $db = Flight::db();
        $achatRepo = new AchatRepositories($db);

        // Créer un nouvel achat vide pour le prochain client
        $nouvelIdAchat = $achatRepo->creerAchat($_SESSION['idcaisse']);
        $_SESSION['idachat'] = $nouvelIdAchat;

        $_SESSION['message'] = 'Achat clôturé avec succès. Prêt pour le prochain client.';
        Flight::redirect('/achat');
    }
}
