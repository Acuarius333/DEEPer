<?php

use App\Entity\Product;
use App\DataProvider;

require_once '../src/setup.php';

$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $_SESSION['searchWord'] = $searchTerm;
}
$stmt = $dbProvider->getProducts(trim($searchTerm));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/search.css">
</head>

<body>
<header class="viewport-header">
    <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
    <nav>
        <ul class="nav__list">
            <li style="color: #7dd96e">
                <a href="#" class="nav__link">Wines</a>
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
    <form method="post">
        <div class="home-intro">
            <div class="container">
                <div class="searchbox">
                    <input type="text" class="searchbox__input" placeholder="Search..." name="search" id="search" autocomplete="off" value="<?= $searchTerm ?>"/>
                    <svg class="searchbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </div>
            </div>
        </section>
    </form>
</main>

<?php if (!empty($_POST['search'])):?>
    <?php foreach($stmt as $product): ?>
        <section class="main">
            <div id="card-container" class="flip-card-container">
                <div id="card" class="flip-card">
                    <div class="card-front">
                        <figure>
                            <div class="img-bg"></div>
                            <img src="../src/Images/reviews/<?= $product->image_path; ?>" alt="">
                            <figcaption><?= $product->name; ?></figcaption>
                        </figure>

                        <ul class="card-list">
                            <li class="card-list-element"><?= $product->id; ?></li>
                            <li class="card-list-element"><?= $product->type; ?></li>
                            <li class="card-list-element"><?= $product->country; ?></li>
                        </ul>
                    </div>

                    <div class="card-back">
                        <figure>
                            <div class="img-bg"></div>
                            <img src="../src/Images/reviews/<?= $product->image_path; ?>" alt="">
                        </figure>

                        <button>Find out more</button>

                        <div class="design-container">
                            <span class="design design--1"></span>
                            <span class="design design--2"></span>
                            <span class="design design--3"></span>
                            <span class="design design--4"></span>
                            <span class="design design--5"></span>
                            <span class="design design--6"></span>
                            <span class="design design--7"></span>
                            <span class="design design--8"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif;?>

<script src="../src/js/main.js"></script>
</body>
</html>
<script>
    document.getElementById("search").value = "";
</script>
