<?php
use App\Hydrator\EntityHydrator;

require_once '../src/setup.php';

$registered = false;
$message = '';
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $formUser = [
            'name' => strip_tags($_POST['name']),
            'email_address' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        $hydrator = new EntityHydrator();
        $formUser = $hydrator->hydrateUser($formUser);

        if ($dbProvider->getUserByEmail($formUser->emailAddress) == null){
            $user = $dbProvider->createUser($formUser);
            $registered = true;
            $message = 'Thank you for registering. <a class="messageLink" href="login_page.php" title="Log in">Login now</a>!';
        } else {
            $message = 'Error: An account is already registered with your email address. Please <a class="messageLink" href="login_page.php" title="Log in">log in</a>';
        }
    } else {
        $message = 'Error: Passwords don\'t match. Please try again.';
    };
}

?>

<!DOCTYPE html>
<html lang= "en">
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="../src/css/register.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
<br>
<br>
<br>
<a href="welcome_page.php" class="site-logo" aria-label="homepage">OneUp Wine</a>
<div class="main-w3layouts wrapper">
    <h1>Sign Up</h1>
    <div style="margin-top: 20px" class="main-agileinfo">
        <div class="agileits-top">
            <?php if ($registered = true): ?>
            <div style="margin-top: -30px" class="alert"><?php echo ($message) ?></div>
            <?php endif; ?>
            <form action="#" method="post">
                <input class="text" type="text" name="name" placeholder="Name" required>
                <input class="text email" type="email" name="email" placeholder="Email" required>
                <input class="text" type="password" name="password" placeholder="Password" required>
                <input class="text w3lpass" type="password" name="confirmPassword" placeholder="Confirm Password" required>
                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The <a class="messageLink" href="ts&cs_page.php" target="_blank"> Terms & Conditions</a></span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNUP">
            </form>
            <p>Already registered? <a href="login_page.php">Login Now!</a></p>
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
