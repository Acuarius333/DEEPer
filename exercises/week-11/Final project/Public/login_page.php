<?php
include "../src/php/main.php"
?>

<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body class="p-4">
<div class="container">
    <h1>Login</h1>
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="loginEmail" id="loginEmail" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="loginPassword" id="loginPassword" class="form-control" required>
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