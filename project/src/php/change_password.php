<?php

use App\Entity\User;
use App\DataProvider;

require_once '../../src/setup.php';

$userId = $_SESSION['loginId'];
$stmt = $dbProvider->getUser($userId);

if (isset($_POST['password'], $_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $dbProvider->deleteUserPassword($userId);
        $stmt = $dbProvider->updateUserPassword($userId, $newPassword);
        echo "<script> alert('Password changed successfully. Please login now.')</script>";
        session_destroy();
        echo "<script>window.location.href = '../../public/login_page.php'</script>";

    } else {

        echo "<script> alert('Error: Passwords don\'t match. Please try again.')</script>";
        echo "<script>history.go(-1)</script>";
    };
}

?>