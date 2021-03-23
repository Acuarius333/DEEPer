<?php

use App\Entity\CheckIn;
use App\Entity\Product;
use App\DataProvider;

require_once '../setup.php';

$_GET['userId'];

if (!empty ($_SESSION['loginId'])) {

    if ($_GET['userId'] != $_SESSION['loginId']) {
        $userId = $_SESSION['loginId'];

        $stmt = $dbProvider->getUser($userId);

        $followingId = $stmt->followingId;
        $str_arr_following = preg_split("/,/", $followingId);

        if (in_array($_GET['userId'], $str_arr_following) == false) {

            if (empty($followingId)) {
                $followingGroup = ',' . $_GET['userId'] . ',';

            } else {
                $followingGroup = $followingId . $_GET['userId'] . ',';
            }

            $following = $dbProvider->addFollowing($followingGroup);

            $userId = $_GET['userId'];

            $stmt = $dbProvider->getUser($userId);

            $followersId = $stmt->followersId;


            if (empty($followersId)) {
                $followersGroup = ',' . $_SESSION['loginId'] . ',';

            } else {
                $followersGroup = $followersId . $_SESSION['loginId'] . ',';
            }

            $followers = $dbProvider->addFollowers($followersGroup);
            echo "<script>history.go(-1)</script>";
        }

    }

}


?>