<?php
// Vue : statistiques.php
// Affiche les 3 agrégats : global, par produit, par jour
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Market – Statistiques</title>
</head>
<body>
    <header>
        <h1>TD – SI – IHM – ETU004071 – ETU004244</h1>
        <nav class="nav-main">
            <a href="/">Changer Caisse</a>
            <a href="/achat">Caisse</a>
            <a href="/login">Déconnexion</a>
        </nav>
    </header>

    <div class="content">
        <aside>
            <h2>Navigation</h2>
            <nav>
                <ul>
                    <li><a href="#total-global">Total global</a></li>
                    <li><a href="#par-produit">Par produit</a></li>
                    <li><a href="#par-jour">Par jour</a></li>
                </ul>
            </nav>
        </aside>

        <section class="main">
            <h2>Statistiques des ventes</h2>

            <!-- 1. Total global -->
            <div id="total-global" class="stat-bloc">
                <h3>Total des ventes global</h3>
                <div class="total-global">
                    <span class="big-number"><?= number_format($totalGlobal, 2) ?> Ar</span>
                </div>
            </div>

            <!-- 2. Par produit -->
            <div id="par-produit" class="stat-bloc">
                <h3>Ventes par produit</h3>
                <?php if (!empty($ventesParProduit)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Quantité vendue</th>
                                <th>Montant total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventesParProduit as $v): ?>
                                <tr>
                                    <td><?= htmlspecialchars($v['designation']) ?></td>
                                    <td><?= htmlspecialchars($v['total_quantite']) ?></td>
                                    <td><?= number_format($v['total_montant'], 2) ?> Ar</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucune vente enregistrée.</p>
                <?php endif; ?>
            </div>

            <!-- 3. Par jour -->
            <div id="par-jour" class="stat-bloc">
                <h3>Ventes par jour</h3>
                <?php if (!empty($ventesParJour)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total du jour</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventesParJour as $v): ?>
                                <tr>
                                    <td><?= htmlspecialchars($v['jour']) ?></td>
                                    <td><?= number_format($v['total_jour'], 2) ?> Ar</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucune vente enregistrée.</p>
                <?php endif; ?>
            </div>

        </section>
    </div>

    <footer>
        <h1>Copyright Lofo and Voara</h1>
    </footer>
</body>
</html>
