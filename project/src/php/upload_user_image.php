<?php

use App\Entity\User;
use App\DataProvider;

require_once '../../src/setup.php';

$userId = $_SESSION['loginId'];
$stmt = $dbProvider->getUser($userId);

if (empty ($stmt->imagePath)){

    if(isset($_POST["submit"])) {

        $target_dir = "../../src/Images/users_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

// Check if file already exists
        if (file_exists($target_file)) {
            echo "<script> alert('The file already exists.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "<script> alert('Sorry, your file is too large.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            $uploadOk = 0;
            echo "<script>history.go(-1)</script>";
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $stmt = $dbProvider->deleteUserPicture($userId);
                $imagePath = $_FILES["fileToUpload"]['name'];

                $stmt = $dbProvider->updateUserPicture($userId, $imagePath);

                echo "<script> alert('The file ". htmlspecialchars(basename($_FILES['fileToUpload']['name'])) ." has been uploaded.')</script>";
                echo "<script>history.go(-1)</script>";
            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.')</script>";
                echo "<script>history.go(-1)</script>";
            }
        }
    }
}else{
    echo "<script> alert('You already have a profile picture. Select `Change profile picture` if you want to change it.')</script>";
    echo "<script>history.go(-1)</script>";
}

?>

