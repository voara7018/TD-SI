<?php

class AchatRepositories
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Crée un nouvel achat (transaction client) et retourne son ID
    public function creerAchat($idcaisse)
    {
        $st = $this->pdo->prepare(
            "INSERT INTO achat (idcaisse, dateAchat) VALUES (?, NOW())"
        );
        $st->execute([$idcaisse]);
        return $this->pdo->lastInsertId();
    }

    // Ajoute une ligne de détail à un achat
    public function ajouterDetail($idachat, $idproduit, $quantite, $prix_unitaire)
    {
        $st = $this->pdo->prepare(
            "INSERT INTO achat_detail (idachat, idproduit, quantite, prix_unitaire)
             VALUES (?, ?, ?, ?)"
        );
        return $st->execute([$idachat, $idproduit, $quantite, $prix_unitaire]);
    }

    // Récupère tous les détails d'un achat (panier en cours)
    public function getDetailsByAchat($idachat)
    {
        $st = $this->pdo->prepare(
            "SELECT ad.iddetail, ad.quantite, ad.prix_unitaire,
                    p.designation, (ad.quantite * ad.prix_unitaire) AS sous_total
             FROM achat_detail ad
             JOIN produit p ON ad.idproduit = p.idproduit
             WHERE ad.idachat = ?"
        );
        $st->execute([$idachat]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // Calcule le total d'un achat
    public function getTotalAchat($idachat)
    {
        $st = $this->pdo->prepare(
            "SELECT SUM(quantite * prix_unitaire) AS total
             FROM achat_detail
             WHERE idachat = ?"
        );
        $st->execute([$idachat]);
        $row = $st->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    // STATISTIQUES : total global de toutes les ventes
    public function getTotalVentesGlobal()
    {
        $st = $this->pdo->query(
            "SELECT SUM(ad.quantite * ad.prix_unitaire) AS total_global
             FROM achat_detail ad"
        );
        $row = $st->fetch(PDO::FETCH_ASSOC);
        return $row['total_global'] ?? 0;
    }

    // STATISTIQUES : total des ventes par produit
    public function getTotalVentesParProduit()
    {
        $st = $this->pdo->query(
            "SELECT p.designation,
                    SUM(ad.quantite) AS total_quantite,
                    SUM(ad.quantite * ad.prix_unitaire) AS total_montant
             FROM achat_detail ad
             JOIN produit p ON ad.idproduit = p.idproduit
             GROUP BY ad.idproduit, p.designation
             ORDER BY total_montant DESC"
        );
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // STATISTIQUES : total des ventes par jour
    public function getTotalVentesParJour()
    {
        $st = $this->pdo->query(
            "SELECT DATE(a.dateAchat) AS jour,
                    SUM(ad.quantite * ad.prix_unitaire) AS total_jour
             FROM achat a
             JOIN achat_detail ad ON a.idachat = ad.idachat
             GROUP BY DATE(a.dateAchat)
             ORDER BY jour DESC"
        );
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
