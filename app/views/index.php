<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/bootstrap.php';

Flight::start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
        <header> 
            <h1> TD - SI - IHM - ETU004071 - ETU004244</h1>
            <nav class="nav-main">
                <a href="*"> Changer Caisse </a>
            </nav>
        </header>
        <div class="content">
            <Aside>
                <h1> Caisse </h1>
                <nav>
                    <ul>
                        <li>Menu 1</li>
                        <li>Menu 2</li>
                        <li>Menu 3</li>
                    </ul>
                </nav>
            </Aside>
            <section class="main">
                <p>Liste produits</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($produits) && is_array($produits)): ?>
                            <?php foreach ($produits as $produit): ?>
                                <tr>
                                    <td><?= htmlspecialchars($produit['id']) ?></td>
                                    <td><?= htmlspecialchars($produit['nom']) ?></td>
                                    <td><?= htmlspecialchars($produit['prix']) ?> €</td>
                                    <td><?= htmlspecialchars($produit['description']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4">Aucun produit trouvé.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
            </section>
        </div>
        <footer>

         <h1> Copyright Lofo and Voara</h1>
        </footer>
</body>
</html>
