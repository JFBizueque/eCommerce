<?php

require_once '../private/config/database.php';
require_once '../private/includes/functions.php';

$stmt = $pdo->query("
    SELECT *
    FROM products
    WHERE is_active = 1
    ORDER BY created_at DESC
");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Crypto PDF Shop</title>
</head>
<body>

<h1>Produkte</h1>

<?php foreach ($products as $product): ?>

    <div>

        <h2>
            <?= escape($product['title']) ?>
        </h2>

        <p>
            <?= escape($product['short_description']) ?>
        </p>

        <strong>
            <?= $product['price_eur'] ?> €
        </strong>

        <br><br>

        <a href="product.php?slug=<?= $product['slug'] ?>">
            Produkt ansehen
        </a>

    </div>

    <hr>

<?php endforeach; ?>

</body>
</html>
