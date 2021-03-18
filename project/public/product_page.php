<?php

require_once '../src/setup.php';

$productId = $_GET['productId'];

$stmt = $dbh->prepare(
    'SELECT id, name, country, type, location
    FROM product'
);
$stmt->execute([
    'id' => $productId
]);

$product = $stmt->fetchObject(Product::class);

$stmt = $dbh->prepare('SELECT * FROM checkin WHERE product_id = :productId');
$stmt->execute(['productId' => $product->id]);

$checkIns = $stmt->fetchAll(PDO::FETCH_CLASS, CheckIn::class);
$product->checkIns = $checkIns;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Product Detail</title>
</head>
<body>
<div class="container">
    <h1><?= $product->title ?></h1>
    <h2>Average Rating: <?= $product->average_rating ?></h2>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($product->checkIns as $checkIn): ?>
            <tr>
                <td><?= $checkIn->id ?></td>
                <td><?= $checkIn->name ?></td>
                <td><?= $checkIn->rating ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>