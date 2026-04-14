<?php
// Vue : choix_caisse.php
// Affiche la liste des caisses pour en sélectionner une
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Market – Choix de Caisse</title>
</head>
<body>
    <header>
        <h1>TD – SI – IHM – ETU004071 – ETU004244</h1>
        <nav class="nav-main">
            <a href="/statistiques">Statistiques</a>
            <a href="/login">Déconnexion</a>
        </nav>
    </header>

    <div class="content-center">
        <div class="card-caisse">
            <h2>Choisir une Caisse</h2>
            <p>Bonjour, <strong><?= htmlspecialchars($_SESSION['user'] ?? '') ?></strong>. Sélectionnez votre caisse pour commencer.</p>

            <form method="POST" action="/choix-caisse">
                <div class="liste-caisses">
                    <?php if (!empty($caisses)): ?>
                        <?php foreach ($caisses as $caisse): ?>
                            <label class="caisse-option">
                                <input type="radio"
                                       name="idcaisse"
                                       value="<?= htmlspecialchars($caisse['idcaisse']) ?>"
                                       required>
                                <span class="caisse-label">
                                    Caisse N° <?= htmlspecialchars($caisse['numero_caisse']) ?>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune caisse disponible.</p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn-principal">Ouvrir la caisse</button>
            </form>
        </div>
    </div>

    <footer>
        <h1>Copyright Lofo and Voara</h1>
    </footer>
</body>
</html>
