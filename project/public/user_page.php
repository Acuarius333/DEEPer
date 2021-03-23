<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\Entity\User;
use App\DataProvider;

require_once '../src/setup.php';

$userId = $_GET['loginId'];
$stmt = $dbProvider->getUser($userId);

$checkIn = $dbProvider->getCheckInFromUser($userId);

var_dump($stmt);

var_dump($checkIn);



?>