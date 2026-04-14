<?php
// Vue : login.php
// Formulaire de connexion simple
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Market – Connexion</title>
</head>
<body>
    <header>
        <h1>TD – SI – IHM – ETU004071 – ETU004244</h1>
    </header>

    <div class="login-wrapper">
        <div class="login-box">
            <h2>Connexion Caissier</h2>

            <?php if (!empty($erreur)): ?>
                <p class="alerte-erreur"><?= htmlspecialchars($erreur) ?></p>
            <?php endif; ?>

            <form method="POST" action="/login">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="ex: caissier1" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-principal">Se connecter</button>
            </form>
        </div>
    </div>

    <footer>
        <h1>Copyright Lofo and Voara</h1>
    </footer>
</body>
</html>
