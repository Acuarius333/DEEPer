<?php

use App\Entity\CheckIn;
use App\Entity\User;
use App\DataProvider;

require_once '../setup.php';

$userId = $_SESSION['loginId'];
$stmt = $dbProvider->deleteAccountCheckins($userId);
$stmt = $dbProvider->deleteAccountUser($userId);
echo "<script> alert('Your account has been deleted')</script>";
session_destroy();
echo "<script>window.location.href = '../../public/welcome_page.php'</script>";

?>