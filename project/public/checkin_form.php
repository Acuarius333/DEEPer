<?php

use App\Entity\Product;
use App\DataProvider;
use App\Entity\CheckIn;
use Carbon\Carbon;

require_once '../src/setup.php';

if (!empty($_SESSION['loginId'])) {

    if (!empty($_POST['rating']) && !empty($_POST['review'])) {
        $productId = $_SESSION['productId'];
        $username = $_SESSION['userName'];
        $userId = $_SESSION['loginId'];

        $formData = [
            'rating' => strip_tags($_POST['rating']),
            'review' => strip_tags($_POST['review']),
            'name' => strip_tags($username),
            'productId' => strip_tags($productId),
            'userId' => strip_tags($userId),
            'timeStamp' => date('d-M-Y h:i', time()),
        ];

        $formCheckin = new CheckIn();
        $formCheckin->rating = $formData['rating'];
        $formCheckin->review = $formData['review'];
        $formCheckin->name = $formData['name'];
        $formCheckin->productId = $formData['productId'];
        $formCheckin->userId = $formData['userId'];
        $formCheckin->submitted = $formData['timeStamp'];

        $product = $dbProvider->createCheckin($formCheckin);
    }
}else{
    echo "<script>alert('Please Log In or Sign Up to create a review');
           window.location.href='login_page.php';</script>";
}
?>

        <link rel="stylesheet" href="../src/css/checking_form.css">
        <div class="login-box">
            <h2>Create a review</h2>
            <form method="post" autocomplete="off">
                <div class="user-box">
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <label for="rating" style="margin-left: 4px">Rating</label>
                </div>
                <div class="user-box">
                    <textarea class="texarea" name="review" id="review" maxlength="2500" required></textarea>
                    <label for="review" style="margin-left: 4px">Review</label>
                </div>
                <button style="background-color: transparent; border: none; width: 320px" type="submit" name="submitButton" id="submitButton">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>Submit</button>
            </form>
        </div>

<?php
if (isset($_POST['submitButton'])) {
    header('Location: product_page.php?productId=' . $_SESSION['productId']);
}
?>



