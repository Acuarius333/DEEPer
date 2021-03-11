<?php

use App\Hydrator\EntityHydrator;

//require_once 'Resources/setup.php';

$registered = false;
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $formUser = [
            'name' => strip_tags($_POST['name']),
            'email_address' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        $hydrator = new EntityHydrator();
        $formUser = $hydrator->hydrateUser($formUser);

        $user = $dbProvider->createUser($formUser);
        $registered = true;
    }
    // Handle passwords that don't match
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body class="p-4">
<div class="container">
    <h1>Register!</h1>
    <?php if ($registered): ?>
        <div class="alert alert-success">Thank you for registering, please now <a href="welcome_page.html" title="Log in">log in</a>!</div>
    <?php endif; ?>
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirm" class="form-control">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
</body>
</html>