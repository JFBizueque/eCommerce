<?php

require_once '../private/config/database.php';
require_once '../private/includes/functions.php';

$slug = $_GET['slug'] ?? '';

$stmt = $pdo->prepare("
    SELECT *
    FROM products
    WHERE slug = :slug
    LIMIT 1
");

$stmt->execute([
    'slug' => $slug
]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Produkt nicht gefunden.");
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?= escape($product['title']) ?></title>
</head>
<body>

<h1>
    <?= escape($product['title']) ?>
</h1>

<p>
    <?= escape($product['full_description']) ?>
</p>

<strong>
    <?= $product['price_eur'] ?> €
</strong>

<br><br>

<button>
    Mit Crypto bezahlen
</button>

</body>
</html>
