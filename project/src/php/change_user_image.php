<?php

use App\Entity\User;
use App\DataProvider;

require_once '../../src/setup.php';

$userId = $_SESSION['loginId'];
$stmt = $dbProvider->getUser($userId);

if (!empty ($stmt->imagePath)){

    if(isset($_POST["submit2"])) {

        $target_dir = "../../src/Images/users_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "<script> alert('The file already exists.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }elseif ($_FILES["fileToUpload2"]["size"] > 500000) {
            echo "<script> alert('Sorry, your file is too large.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }

        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {

                $imagePath = $stmt->imagePath;
                $directory = "../../src/Images/users_images/$imagePath";
                unlink($directory);

                $stmt = $dbProvider->deleteUserPicture($userId);
                $imagePath = $_FILES["fileToUpload2"]['name'];

                $stmt = $dbProvider->updateUserPicture($userId, $imagePath);

                echo "<script> alert('Your picture has been changed')</script>";
                echo "<script>history.go(-1)</script>";

            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.')</script>";
                echo "<script>history.go(-1)</script>";
            }
        }
    }
}else{
    echo "<script> alert('It seems you don\'t have any picture yet')</script>";
    echo "<script>history.go(-1)</script>";
}


?>