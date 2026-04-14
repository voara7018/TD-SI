<?php
// Vue : achat.php
// Page principale de caisse : ajout produits + récapitulatif
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Market – Caisse</title>
</head>
<body>
    <header>
        <h1>TD – SI – IHM – ETU004071 – ETU004244</h1>
        <nav class="nav-main">
            <a href="/">Changer Caisse</a>
            <a href="/statistiques">Statistiques</a>
            <a href="/login">Déconnexion</a>
        </nav>
    </header>

    <div class="content">
        <!-- ASIDE : infos caisse -->
        <aside>
            <h2>Caisse</h2>
            <?php if (!empty($caisse)): ?>
                <p class="badge-caisse">N° <?= htmlspecialchars($caisse['numero_caisse']) ?></p>
            <?php endif; ?>
            <hr>
            <p>Caissier :<br><strong><?= htmlspecialchars($_SESSION['user'] ?? '') ?></strong></p>
        </aside>

        <!-- SECTION PRINCIPALE -->
        <section class="main">

            <!-- Messages flash -->
            <?php if (!empty($message)): ?>
                <div class="alerte-succes"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <?php if (!empty($erreur)): ?>
                <div class="alerte-erreur"><?= htmlspecialchars($erreur) ?></div>
            <?php endif; ?>

            <!-- PARTIE HAUTE : Formulaire ajout produit -->
            <div class="achat-haut">
                <h3>Ajouter un produit</h3>
                <form method="POST" action="/ajouter-produit" class="form-achat">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="idproduit">Produit</label>
                            <select id="idproduit" name="idproduit" required>
                                <option value="">Choisir un produit</option>
                                <?php foreach ($produits as $produit): ?>
                                    <option value="<?= htmlspecialchars($produit['idproduit']) ?>">
                                        <?= htmlspecialchars($produit['designation']) ?>
                                        (<?= number_format($produit['prix'], 2) ?> Ar)
                                        – Stock: <?= htmlspecialchars($produit['quantite_stock']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantite">Quantité</label>
                            <input type="number" id="quantite" name="quantite" min="1" value="1" required>
                        </div>
                        <div class="form-group form-group-btn">
                            <button type="submit" class="btn-ajouter">+ Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- PARTIE BASSE : Récapitulatif du panier -->
            <div class="achat-bas">
                <h3>Panier en cours</h3>
                <?php if (!empty($details)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Qté</th>
                                <th>Prix unit.</th>
                                <th>Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($details as $ligne): ?>
                                <tr>
                                    <td><?= htmlspecialchars($ligne['designation']) ?></td>
                                    <td><?= htmlspecialchars($ligne['quantite']) ?></td>
                                    <td><?= number_format($ligne['prix_unitaire'], 2) ?> Ar</td>
                                    <td><?= number_format($ligne['sous_total'], 2) ?> Ar</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="total-label">TOTAL</td>
                                <td class="total-montant"><?= number_format($total, 2) ?> Ar</td>
                            </tr>
                        </tfoot>
                    </table>

                    <form method="POST" action="/cloturer-achat">
                        <button type="submit" class="btn-cloturer">✔ Clôturer l'achat</button>
                    </form>

                <?php else: ?>
                    <div class="panier-vide">
                        <p>Le panier est vide. Ajoutez des produits ci-dessus.</p>
                    </div>
                <?php endif; ?>
            </div>

        </section>
    </div>

    <footer>
        <h1>Copyright Lofo and Voara</h1>
    </footer>
</body>
</html>
