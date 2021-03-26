<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\Entity\User;
use App\DataProvider;

require_once '../src/setup.php';

$userId = $_GET['loginId'];
$stmt = $dbProvider->getUser($userId);
$checkIn = $dbProvider->getCheckInFromUser($userId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneUp Wine-Account</title>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="../src/css/user.css">
    <script>
        function openForm1() {
            document.getElementById("myForm1").style.display = "block";
        }
        function closeForm1() {
            document.getElementById("myForm1").style.display = "none";
        }
        function openForm2() {
            document.getElementById("myForm2").style.display = "block";
        }
        function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
        }
        function openForm3() {
            document.getElementById("myForm3").style.display = "block";
        }
        function closeForm3() {
            document.getElementById("myForm3").style.display = "none";
        }
        function deleteAccount() {
            window.location.href = "../src/php/delete_account_unconfirmed.php";
        }

    </script>
    <header>
        <a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
        <img style="z-index: -1; height: 70px; width: 70px; margin-left: 15px; margin-top: 77px; position: absolute; display: block;" src="../src/Images/icons/grapes.png" alt="">
        <nav>
            <ul class="nav__list">
                <li>
                    <a href="search_page.php" class="nav__link">Find your wine</a>
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
    <main>
        <section class="home-intro">
            <a style="font-size: 30px"><span style="color: limegreen"><?php echo $stmt->name?></span> this is your personal section</a>
        </section>
    </main>
    <h4 style="color: white; margin-left: 300px; margin-top: -50px; position:absolute;">Your reviews</h4>
    <h4 style="color: white; margin-left: 1000px; margin-top: -44px; position:absolute;">Your options</h4>
<div style="position: absolute">
    <button class="open-button1" onclick="openForm1()">Upload<br>picture</button>
    <div class="form-popup" id="myForm1">
        <form class="form-container1" name="form1" id="form1" method="post" enctype="multipart/form-data" action="../src/php/upload_user_image.php">
            <a>Upload your profile picture:</a>

            <input style="position: absolute; margin-top: 71px; margin-left: -195px;" type="file" name="fileToUpload" id="fileToUpload" required>
            <button type="submit" name="submit" id="submit" class="btn">Submit</button>
        </form>
            <button type="submit" name="close" id="close" class="btn_cancel" data-dismiss="form" onclick="closeForm1()">x</button>
    </div>

    <button class="open-button2" onclick="openForm2()">Change picture</button>
    <div class="form-popup" id="myForm2">
        <form class="form-container1" method="post" enctype="multipart/form-data" action="../src/php/change_user_image.php">
            <a>Change profile picture:</a>

            <input style="position: absolute; margin-top: 71px; margin-left: -165px;" type="file" type="file" name="fileToUpload2" id="fileToUpload2" required>

            <button type="submit" name="submit2" id="submit2" class="btn">Submit</button>
        </form>
            <button type="submit" class="btn_cancel" style="margin-left: 263px" onclick="closeForm2()">x</button>
    </div>

    <button class="open-button3" onclick="openForm3()">Change password</button>
    <div class="form-popup" id="myForm3">
        <form method="post" enctype="multipart/form-data" action="../src/php/change_password.php" class="form-container">
            <a>Change of password</a>

            <input style="width: 90%" class="text" type="password" name="password" id="password" placeholder="New password" autocomplete="off" required>
            <input style="width: 90%" class="text" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm new password" autocomplete="off" required>

            <button type="submit" name="submit3" id="submit3" class="btn">Submit</button>
        </form>
            <button type="submit" class="btn_cancel" onclick="closeForm3()">x</button>
    </div>

    <button class="open-button4" onclick="deleteAccount()">Delete account</button>
</div>
<?php

foreach ($checkIn as $checkIns){
    $reviewId = $checkIns->id;
    $product_id = $checkIns->product_id;
    $productDetails = $dbProvider->getProduct($product_id);

    include '../src/php/Templates/stars_rating_php_format.php';
        echo "<div style='margin-left: 2em; z-index: 2'>
                <div class='blog-card'>
                    <div class='description'>
                    <a class='open-button5' style='text-align: center; text-decoration: none;'href='../src/php/delete_checkin_unconfirmed.php?reviewId=$reviewId'>Delete</a>
                        <a style='color: white'>".$productDetails->productName."</a>
                        <h2></h2>
                        <p style='color: #A2A2A2'>".$checkIns->submitted."
                        <div class='meta'>
                        <img class='photo' src='../src/Images/reviews/".$productDetails->imagePath."'>
                        </div>
                        <p style='margin-left: 250px; position: absolute; margin-top: -200px; color: white;'>".$checkIns->review."</p>
                    </div>
                </div>
            </div>";
}
?>

<body>

<script src="../src/js/main.js"></script>
</body>

</html>