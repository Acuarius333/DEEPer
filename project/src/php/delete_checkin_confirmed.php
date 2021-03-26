<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\DataProvider;

require_once '../setup.php';

$reviewId = $_GET['reviewId'];

$checkinId = $reviewId;
$stmt = $dbProvider->deleteCheckin($checkinId);
echo "<script>history.go(-1)</script>";

?>
