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

        if (in_array($_GET['userId'], $str_arr_following) !== false) {

            if (($key = array_search($_GET['userId'], $str_arr_following)) !== false) {
                unset($str_arr_following[$key]);
            }
                $arr_str_following = implode(",",$str_arr_following);
                $followingGroup = $arr_str_following;

                $following = $dbProvider->addFollowing($followingGroup);

                $userId = $_GET['userId'];

                $stmt = $dbProvider->getUser($userId);

                $followersId = $stmt->followersId;

                $str_arr_followers = preg_split("/,/", $followersId);

            if (($key = array_search($_SESSION['loginId'], $str_arr_followers)) !== false) {
                unset($str_arr_followers[$key]);
            }
                $arr_str_followers = implode(",",$str_arr_followers);

                $followersGroup = $arr_str_followers;

                $followers = $dbProvider->addFollowers($followersGroup);

                echo "<script>history.go(-1)</script>";

            }
        }
    }

?>