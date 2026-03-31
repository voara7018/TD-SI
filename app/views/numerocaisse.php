<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1> Choisir Caisse</h1>
            <form action="/achat" method="post">
                <select name="caisse" id="numcaiss">
                    <?php foreach ($caisses as $caisse): ?>
                        <option value="<?= htmlspecialchars($caisse['idcaisse']) ?>">
                            <?= htmlspecialchars($caisse['idcaisse']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select> 
                <button type="submit">Valider</button>
            </form>
    </section>
</body>
</html>