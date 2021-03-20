<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\DataProvider;

require_once '../src/setup.php';

$productId = $_GET['productId'];

$stmt = $dbProvider->getProduct($productId);
$views = $dbProvider->upgradeViews($productId);
$checkIn = $stmt->getCheckins();
$averageRating = round($stmt->averageRating, 2)
?>

<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>OneUp Wine-Welcome!</title>
<link
        href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
        rel="stylesheet">
<link rel="stylesheet" href="../src/css/product.css">

<head>
        <title>OneUp Wine-Product</title>
</head>

<body>
<header>
    <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
    <img style="z-index: -1; height: 70px; width: 70px; margin-left: 15px; margin-top: 77px; position: absolute; display: block;" src="../src/Images/icon/grapes.png" alt="">

    <nav>
        <ul class="nav__list">

            <li>
                <a style="color: #32CD32" href="search_page.php" class="nav__link">Find your wine</a>
            </li>
            <li>
                <a href="#" class="nav__link">Another page</a>
            </li>
            <li>
                <a href="#" class="nav__link">Another page</a>
            </li>
            <li>
                <a href="blog_page.php" class="nav__link">Blog</a>
            </li>
        </ul>
    </nav>
    <?php include '../src/php/Templates/signup_login_buttons.php'; ?>
</header>

<main>
    <section class="home-intro">
    </section>
    <a style="z-index: 1; font-variant: small-caps; position: absolute; margin-top: -400px; margin-left: 250px; color: #f4f4f4; font-size: 70px;"><?= $stmt->productName ?></a>
    <a style="opacity: 60%; z-index: 2; font-variant: small-caps; position: absolute; margin-top: -400px; margin-left: 250px; color: limegreen; font-size: 130px;"><?= $stmt->country ?></a>


    <div class="tabset">

        <input type="radio" name="tabset" id="tab1" aria-controls="1" checked>
        <label for="tab1">Overview</label>

        <input type="radio" name="tabset" id="tab2" aria-controls="2">
        <label for="tab2">Reviews</label>

        <input type="radio" name="tabset" id="tab3" aria-controls="3">
        <label for="tab3">More details</label>

        <div class="tab-panels">
            <section id="1" class="tab-panel">
                <div class="more-stuff-grid">
                    <img class="slide-in from-left" src="../src/Images/reviews/<?= $stmt->imagePath ?>" alt="">
                    <p class="slide-in from-right">
                        <?= $stmt->description ?>
                    </p>
                </div>
            </section>
            <section id="2" class="tab-panel">

                <?php if (!empty($averageRating)): ?>
                    <h3>Average rating: <?php echo $averageRating ?></h3>
                <?php else:?>
                    <h3>Average rating: No ratings yet</h3>
                <?php endif;?>

                <h3>Views: <?= $stmt->views ?></h3>

                <table>
                    <?php if (!empty($checkIn)): ?>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Review</th>
                        </tr>
                        </thead>
                        <?php foreach( $checkIn as $checkIns): ?>
                            <tbody>
                            <tr>
                                <td><?= $checkIns->name ?></td>
                                <td><?= $checkIns->rating ?></td>
                                <td><?= $checkIns->review ?></td>
                            </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td>No reviews yet</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </section>
            <section id="3" class="tab-panel">
                <div class="mapFrame">
                    <iframe width="300" height="300" style="border: none" allowfullscreen src="https://www.google.com/maps/embed/v1/view
?key=AIzaSyCULQ0LqKq3I5tNKaObSq4oyS5lh_tI6BE&center=<?= $stmt->location ?>&zoom=14&maptype=satellite"></iframe>
                </div>
            </section>
        </div>
    </div>

    <script src="../src/js/main.js"></script>
</body>

</html>