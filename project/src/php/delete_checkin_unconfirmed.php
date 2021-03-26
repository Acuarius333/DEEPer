<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\DataProvider;

require_once '../setup.php';

$checkinId = $_SESSION['checkin_id'];
$stmt = $dbProvider->deleteCheckin($checkinId);
echo "<script>history.go(-1)</script>";
?>






