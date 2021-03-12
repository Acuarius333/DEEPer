<?php

use App\DataProvider\DatabaseProvider;

require_once '../../../../vendor/autoload.php';

$dbProvider = new DatabaseProvider();

session_start();

if (isset($_SESSION['loginId'])) {
    $loggedInUser = $dbProvider->getUser($_SESSION['loginId']);
}