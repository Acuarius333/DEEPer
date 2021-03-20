<?php

require_once '../src/setup.php';

$errorMessage = '';


if (isset($_POST['email'], $_POST['password'])) {
    $user = $dbProvider->getUserByEmail($_POST['email']);

    if ($user && password_verify($_POST['password'], $user->password)) {
        $_SESSION = array();
        // Logged in
        $_SESSION['loginId'] = $user->id;
        $_SESSION['userName'] = $user->name;
        header('location: welcome_page.php');

    } else {
        $errorMessage = 'Error: Incorrect details, please try again';
    }
}

?>
<!DOCTYPE html>
<html lang= "en">
<head>
    <title>OneUp Wine-Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="../src/css/login.css" rel="stylesheet" type="text/css" media="all" />
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
            rel="stylesheet"
    >
</head>
<body>
<br>
<br>
<br>
<a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
<img style="z-index: -1; height: 70px; width: 70px; margin-left: 65px; margin-top: -15px; position: absolute; display: block;" src="../src/Images/icon/grapes.png" alt="">
<div class="main-w3layouts wrapper">
    <h1>Log in</h1>
    <div style="margin-top: 20px" class="main-agileinfo">
        <div class="agileits-top">
                <div style="margin-top: -30px" class="alert"><?php echo ($errorMessage) ?></div>
            <form id="myForm" action="#" method="post">
                <input class="text email" type="email" name="email" placeholder="Email" required>
                <input class="text" type="password" name="password" placeholder="Password" required>
                <input type="submit" value="LOGIN">
            </form>
            <p>Not registered yet? <a href="register_page.php">Sign up Now!</a></p>
        </div>
    </div>

    <ul class="bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>
