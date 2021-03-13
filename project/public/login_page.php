<?php

require_once '../src/setup.php';

if (isset($_POST['email'], $_POST['password'])) {
    $user = $dbProvider->getUserByEmail($_POST['email']);

    if ($user && password_verify($_POST['password'], $user->password)) {
        // Logged in
        $_SESSION['loginId'] = $user->id;
        header('Location: welcome_page.php');
        exit;
    } else {
        $errorMessage = 'Incorrect details, please try again';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Log in</title>
</head>
<body class="p-4">
<div class="container">

    <h1>Log in</h1>
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-warning"><?= $errorMessage ?></div>
    <?php endif; ?>
    <form method="post" autocomplete="off">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email-input">Email Address</label>
                    <input name="email" type="email" class="form-control" id="email-input" value="<?= $_POST['email'] ?? '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password-input">Password</label>
                    <input name="password" type="password" class="form-control" id="password-input">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
