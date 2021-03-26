<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\DataProvider;

require_once '../src/setup.php';

$productId = $_GET['productId'];

$stmt = $dbProvider->getProduct($productId);
$views = $dbProvider->upgradeViews($productId);
$checkIn = $stmt->getCheckins();
$grapeInfo = $stmt->grapeInfo;
$location = $stmt->location;
$averageRating = 0;
$averageRating = round($stmt->averageRating, 2);

$_SESSION['productId'] = $productId;

?>

<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>OneUp Wine-Your wine</title>
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
        <img style="z-index: -1; height: 70px; width: 70px; margin-left: 15px; margin-top: 77px; position: absolute; display: block;" src="../src/Images/icons/grapes.png" alt="">

        <nav>
            <ul class="nav__list">

                <li>
                    <a style="color: #32CD32" href="search_page.php" class="nav__link">Find your wine</a>
                </li>
                <li>
                    <a href="history_page.php" class="nav__link">History</a>
                </li>
                <li style="margin-right: -230px">
                    <a href="blog_page.php" class="nav__link">Blog</a>
                </li>
            </ul>
        </nav>
        <?php include '../src/php/Templates/signup_login_buttons.php'; ?>
    </header>

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
                <img style="box-shadow: 10px 10px 5px #181717; margin-left: 2em; height: 600px; width: 700px" src="../src/Images/reviews/<?= $stmt->imagePath ?>" alt="">
                <?php include '../src/php/Templates/flavour_icons.php'; ?>
                <p style="width: 500px; margin-left: 830px; position: absolute; margin-top: -500px; text-align: justify">
                    <?= $stmt->description ?>
                </p>
            </section>

            <section id="2" class="tab-panel">
                <?php if ($averageRating>=1): ?>
                    <?php include '../src/php/Templates/stars_average_rating.php';?>
                    <a style="margin-left: 800px; margin-top: 30px; position: absolute; color: #a2a2a2">Average rating: <?php echo $averageRating ?></a>
                    <a style="margin-left: 800px; margin-top: 100px; position: absolute; color: #a2a2a2">Visualizations:<?php echo ('<span style="font-size: 30px; margin-left: 170px; color: limegreen">'.$stmt->views).'</span>' ?></a>

                <?php endif;?>

                <?php if (!empty($checkIn)): ?>
                    <?php $a=0; $b=0; $c=0; $d=0; $e=0;?>
                        <?php foreach($checkIn as $checkIns): ?>
                            <?php

                            if (($checkIns->rating)==5){
                                $a++;
                            };
                            if (($checkIns->rating)==4){
                                $b++;
                            };
                            if (($checkIns->rating)==3){
                                $c++;
                            };
                            if (($checkIns->rating)==2){
                                $d++;
                            };
                            if (($checkIns->rating)==1) {
                                $e++;} ?>
                        <?php endforeach;?>
                    <?php
                    $total = ($a+$b+$c+$d+$e);
                    $aValue = (100/$total*$a);
                    $bValue = (100/$total*$b);
                    $cValue = (100/$total*$c);
                    $dValue = (100/$total*$d);
                    $eValue = (100/$total*$e);
                    ?>

                    <?php include '../src/php/Templates/rating_bars.php'; ?>
                    <a class='checkinButton' style='text-align: center; text-decoration: none;'href='../src/php/checkin_form.php'>Create a review</a>
                    <?php foreach($checkIn as $checkIns): ?>
                        <?php $userId = $checkIns->userId?>
                        <?php $stmt = $dbProvider->getUser($userId);?>
                        <div style="margin-left: 2em">
                            <div class="blog-card">
                                <div class="meta">
                                    <?php if (!empty($stmt->imagePath)): ?>
                                    <img class="photo" src="../src/Images/users_images/<?php echo $stmt->imagePath;?>">
                                    <?php else: ?>
                                    <img class="photo" src="../src/Images/icons/grapes.png">
                                    <?php endif; ?>
                                </div>
                                <div class="description">
                                    <?php
                                    if (!empty ($_SESSION['loginId'])) {

                                        if ($checkIns->userId != $_SESSION['loginId']) {
                                            $userId = $_SESSION['loginId'];
                                            $stmt = $dbProvider->getUser($userId);
                                            $followingId = $stmt->followingId;
                                            $str_arr = preg_split("/,/", $followingId);

                                            if (in_array($checkIns->userId, $str_arr) == false) {
                                                echo '<a class="link" href="../src/php/follow.php?userId='.$checkIns->userId.'" style="text-decoration: none; margin-left: 400px; position: absolute">Follow</a>';
                                            }else{
                                                echo '<a class="link" href="../src/php/unfollow.php?userId='.$checkIns->userId.'" style="text-decoration: none; margin-left: 400px; position: absolute">Unfollow</a>';
                                            }
                                        }
                                    }
                                    ?>
                                    <a><?= $checkIns->name ?></a>
                                    <?php include '../src/php/Templates/stars_rating.php'; ?>
                                    <h2><?= $checkIns->submitted ?></h2>
                                    <p><?= $checkIns->review ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                <?php else: ?>
                    <tr>
                        <a style="margin-left: 40px; position:absolute">There are no reviews for this product yet. Do you want to be the first one?</a>
                        <a class='checkinButton2' style='text-align: center; text-decoration: none;'href='../src/php/checkin_form.php'>Create a review</a>
                    </tr>
                <?php endif;?>

                    </section>

                    <section id="3" class="tab-panel">
                        <p style="width: 800px; margin-left: 40px; position: absolute; text-align: justify">
                            <?php echo $grapeInfo; ?>
                        </p>
                        <div class="mapFrame">
                            <iframe width="300" height="300" style="border: none" allowfullscreen src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCULQ0LqKq3I5tNKaObSq4oyS5lh_tI6BE&center=<?= $location ?>&zoom=14&maptype=satellite"></iframe>
                        </div>
                    </section>
                </div>
            </div>

    <?php include '../src/php/Templates/footer.php'; ?>

    <script src="../src/js/main.js"></script>
</body>

</html>