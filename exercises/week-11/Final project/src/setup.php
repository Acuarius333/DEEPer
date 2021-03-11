<?php


use App\DataProvider\DatabaseProvider;



$dbProvider = new DatabaseProvider();

session_start();

if (isset($_SESSION['loginId'])) {
    $loggedInUser = $dbProvider->getUser($_SESSION['loginId']);
}

?>