<?php
include "../src/php/main.php"
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
        <div class="alert alert-success">Thank you for registering, please now <a href="welcome_page.php" title="Log in">log in</a>!</div>
    <?php endif; ?>
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirm" class="form-control" required>
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