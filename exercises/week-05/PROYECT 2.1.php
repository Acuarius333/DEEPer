<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>

    <title>British Shorthair</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php

    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO(
            'mysql:dbname=project;host=mysql',
            $username,
            $password
        );
    } catch (PDOException $e){
        die('Unable to establish a database connection');
    }

    $client = '';

    function conect_mysqli (){

        $hostname = "mysql";
        $database = "project";
        $username = "root";
        $password = "root";

        $conection = mysqli_connect($hostname, $username, $password, $database);
        mysqli_set_charset($conection, "latin1");
        if (mysqli_connect_errno()){
            echo "Fallo al conectarse a MySQL: " . mysqli_connect_error();
        }
        return $conection;
    }

        require_once'../week-04/lecture/vendor/autoload.php';
        use Carbon\Carbon;
    $nameCheckIn = '';
    $ratingCheckIn = '';
    $reviewCheckIn = '';

    class checkIn {
        public $nameCheckIn;
        public $ratingCheckIn;
        public $reviewCheckIn;
        public $timestampCheckIn;
    }
    $checkIn = new checkIn();

        if (isset($_POST['nameCheckIn'])) {
            //$checkIn = new checkIn();
            $checkIn->nameCheckIn = $_POST ['nameCheckIn'];
            $checkIn->ratingCheckIn = $_POST ['ratingCheckIn'];
            $checkIn->reviewCheckIn = $_POST ['reviewCheckIn'];
            $checkIn->timestampCheckIn = Carbon::now();

            $conection = conect_mysqli();


            $consult = "INSERT INTO checkins (user_name, rating, review, submitted)";
            $consult .= "VALUES (
                                '" . $checkIn->nameCheckIn . "',
                                '" . $checkIn->ratingCheckIn . "',
                                '" . $checkIn->reviewCheckIn . "',
                                '" . $checkIn->timestampCheckIn . "'
                                )";

            $consult = mysqli_query($conection, $consult) or die("Error: " . mysqli_error($conection));
            $IdNew = mysqli_insert_id($conection);
            mysqli_close($conection);
        }

                $conection = conect_mysqli();

            $consult = "
                        select id, user_name, rating, review, submitted
                        from  checkins
                        where id >=0
                        order by id desc
                        limit 0,5";

            $result = mysqli_query($conection, $consult) or die("Error: ".mysqli_error($conection));
            $client = mysqli_fetch_all($result, MYSQLI_ASSOC);




            $result = mysqli_query($conection,"SELECT AVG(rating) AS avg FROM checkins");
            $row = mysqli_fetch_assoc($result);

            $average = $row['avg'];


            $averageSimplified = (round($average, 2)*100/5);
            $averageSimplified2 = (round($average, 2)*100/5);


            mysqli_close($conection);


            $nameDB = Array();
            $ratingDB = Array();
            $reviewDB = Array();
            $dateDB = Array();
            $labelRatingDB = Array();

            for ($a=0;$a<5;$a++){
                $nameDB [$a] = $client[$a]['user_name'];
                $ratingDB [$a] = $client[$a]['rating'];
                $reviewDB [$a] = $client[$a]['review'];
                $dateDB [$a] = $client[$a]['submitted'];

                switch ($ratingDB [$a]) {
                    case 1:
                        $labelRatingDB [$a] = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">';
                        break;
                    case 2:
                        $labelRatingDB [$a] = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">';
                        break;
                    case 3:
                        $labelRatingDB [$a] = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">';
                        break;
                    case 4:
                        $labelRatingDB [$a] = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">';
                        break;
                    case 5:
                        $labelRatingDB [$a] = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">';
                        break;
                };

            }

           if ($averageSimplified2 <= 20.00){
                    $averageSimplified2 = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">';
           }

           elseif ($averageSimplified2 <= 40.00){
                    $averageSimplified2 = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">';
           }
           elseif ($averageSimplified2 <= 60.00){
                    $averageSimplified2 = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">';
           }
           elseif ($averageSimplified2 <= 80.00){
                    $averageSimplified2 = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">';
           }
           else {
                    $averageSimplified2 = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">';
           }


        class submit {
            public $nameSubmit;
            public $dobSubmit;
            public $emailSubmit;
        }
        $submit = new submit();
        if (isset($_POST['nameSubmit'])) {
            //$submit = new submit();
            $submit->nameSubmit = $_POST ['nameSubmit'];
            $submit->dobSubmit = $_POST ['dobSubmit'];
            $submit->emailSubmit = $_POST ['emailSubmit'];
            $submit->submitted = Carbon::now();

            $serialisedSubmit = serialize($submit);
            file_put_contents('submitionData.txt', $serialisedSubmit);


            $target_dir = "../week-04/workbook/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (isset($_POST["submitButton2"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {

                echo "<br> Sorry, your file was not uploaded.";

            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

    function rotate($folder) {
        if ((file_exists($_SERVER['DOCUMENT_ROOT'] . "/$folder")) && (is_dir($_SERVER['DOCUMENT_ROOT'] . "/$folder"))) {
            $list = scandir($_SERVER['DOCUMENT_ROOT'] . "/$folder");
            $fileList = array();
            $img = '';
            foreach ($list as $file) {
                if ((file_exists($_SERVER['DOCUMENT_ROOT']  . "/$folder/$file")) && (is_file($_SERVER['DOCUMENT_ROOT']  . "/$folder/$file"))) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if ($ext == 'gif' || $ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {
                        $fileList[] = $file;
                    }
                }
            }
            if (count($fileList) > 0) {
                $imageNumber=rand(0,count($fileList)-1);
                $img = $folder . '/' . $fileList[$imageNumber];
            }
            return $img;
        } else {
            mkdir($_SERVER['DOCUMENT_ROOT'] . "/$folder", 0755, true);
        }
    }
        ?>

    <style>
        .firstRow{
            width: 1100px;
            margin: 50px;
            margin-left: 150px;
            border: 1px solid darkgray;
            display: flex;
        }

        .secondRow{
            width: 1100px;
            margin-left: 150px;
            display: flex;
            flex-direction: column;
        }

        .tableInformation{
            border: 1px solid darkgray;
            width: 1100px;
            margin-top: 25px;
        }

        .carousel img {
            width: 100%;
            margin-top: 40px;
        }

        .starImg {
            width: 100px;
        }

        .starSingleRating {
            margin-left: 150px;
        }

        #charactersRemaining {
            opacity: 70%;
        }

        @import "compass/css3";

        body{
            padding: 50px;
        }
    </style>
    <script>

        function starRating(starCases) {

            var singleRating;

            switch (starCases){
                case 1: singleRating= '#rating'; break;
                case 2: singleRating= '#rating2'; break;
                case 3: singleRating= '#rating3'; break;
                case 4: singleRating= '#rating4'; break;
            }

            switch ($(singleRating).text()){
                case '1': $(singleRating).html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">');
                    break;
                case '2': $(singleRating).html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">');
                    break;
                case '3': $(singleRating).html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">');
                    break;
                case '4': $(singleRating).html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">');
                    break;
            }
        }

        function ratingFormula() {

            if (ratingFormulaValue <= 20){
                $('ratingFormulaValue').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">');}
            else if (ratingFormulaValue <= 40){
                $('ratingFormulaValue').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">');}
            else if (ratingFormulaValue <= 60){
                $('ratingFormulaValue').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">');}
            else if (ratingFormulaValue <= 80){
                $('ratingFormulaValue').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">');}
            else {
                $('ratingFormulaValue').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">');}
        }

        $('#carousel-1').carousel({
            interval: 6000,
            wrap: true,
            keyboard: true
        });

        $('#carousel-2').carousel({
            interval: 6000,
            wrap: true,
            keyboard: true
        });

        function alertMessage(){
            alert('Review submitted successfully')
        };

        $("#closeButton").on("click", function () {
            //Close Modal
            $(".modal").modal("hide");
            //Get Values
            var val1 = $("#nameCheckIn").val();
            var val2 = $("#ratingCheckIn").val();
            var val3 = $("#reviewCheckIn").val();
            //Reset Values
            document.getElementById("myForm").reset();

        });
        document.addEventListener("click", function (evt) {
            var flyoutElement = document.getElementById("exampleModal"),
                targetElement = evt.target;  // clicked element
            do {
                if (targetElement == flyoutElement) {
                    // This is a click inside. Do nothing, just return.
                    return;
                }
                // Go up the DOM
                targetElement = targetElement.parentNode;
            } while (targetElement);
            //Get Values
            var val1 = $("#nameCheckIn").val();
            var val2 = $("#ratingCheckIn").val();
            var val3 = $("#reviewCheckIn").val();
            //Reset Values
            document.getElementById("myForm").reset();

        });
        $("#closeButton2").on("click", function () {
            //Close Modal
            $(".modal").modal("hide");
            //Get Values
            var val1 = $("#nameSubmition").val();
            var val2 = $("#dateOfBirthSubmition").val();
            var val3 = $("#emailSubmition").val();
            //Reset Values
            document.getElementById("myForm2").reset();

        });
        document.addEventListener("click", function (evt) {
            var flyoutElement = document.getElementById("exampleModal2"),
                targetElement = evt.target;  // clicked element
            do {
                if (targetElement == flyoutElement) {
                    // This is a click inside. Do nothing, just return.
                    return;
                }
                // Go up the DOM
                targetElement = targetElement.parentNode;
            } while (targetElement);
            //Get Values
            var val1 = $("#nameSubmition").val();
            var val2 = $("#dateOfBirthSubmition").val();
            var val3 = $("#emailSubmition").val();
            //Reset Values
            document.getElementById("myForm2").reset();

        });

    </script>

</head>
<body>

<section class="container firstRow">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">

                <div id="carousel-1" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <img id="pic1" class="d-block img-fluid" src="https://picsum.photos/400/300/?image=278" alt="slide">
                        </div>

                        <div class="carousel-item">
                            <img id="pic2" class="d-block img-fluid" src="https://picsum.photos/400/300/?image=413" alt="slide">
                        </div>

                        <div class="carousel-item">
                            <img id="pic3" class="d-block img-fluid" src="https://picsum.photos/400/300/?image=368" alt="slide">
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">prev</span>
                    </a>

                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">next</span>
                    </a>

                </div>

            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">

                <div id="carousel-2" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-2" data-slide-to="1"></li>
                        <li data-target="#carousel-2" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src=<?php echo'"'; echo(rotate("/exercises/week-04/workbook/uploads"));echo'"';?> alt="slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src=<?php echo'"'; echo(rotate("/exercises/week-04/workbook/uploads"));echo'"';?> alt="slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src=<?php echo'"'; echo(rotate("/exercises/week-04/workbook/uploads"));echo'"';?> alt="slide">
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">prev</span>
                    </a>

                    <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">next</span>
                    </a>

                </div>

            </div>

        </div>
    </div>
</section>

<div class="col-sm" style="width: 1100px; margin-left: 150px;">
    <h1  style="margin-top: 5%">British Shorthair</h1>
    <br/>
    <p>The British Shorthair is the pedigreed version of the traditional British domestic cat,
        with a distinctively stocky body, dense coat, and broad face.
        <br>
        The most familiar color variant is the "British Blue", a solid grey-blue coat,
        orange eyes, and a medium-sized tail. The breed has also been developed in a wide range
        of other colours and patterns, including tabby and colorpoint.
        <br>
        It is one of the most ancient cat breeds known. In modern times, it remains the most popular
        pedigreed breed in its native country, as registered by the UK's Governing Council of the
        Cat Fancy (GCCF).
        <br>A quarter of all kittens registered with the GCCF each year are British
        Shorthairs, making the British the most popular pedigree cat in the UK.</p>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Check in</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New review</h5>
                </div>
                <form id="myForm" action="" method="post" onsubmit="alertMessage()">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nameCheckIn" class="col-form-label">Name:</label>
                            <input type="text" name="nameCheckIn" id="nameCheckIn" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="ratingCheckIn" class="col-form-label">Rate:</label>
                            <input type="number" min="1" max="5" class="form-control" name="ratingCheckIn" id="ratingCheckIn" required>
                        </div>
                        <div class="form-group">
                            <label for="reviewCheckIn" class="col-form-label">Review:</label>
                            <textarea class="form-control" name="reviewCheckIn" id="reviewCheckIn" maxlength="2500" required></textarea>
                            <div id="charactersRemaining"><span id="chars">2500</span> characters remaining</div>
                            <script>
                                var maxLength = 2500;
                                $('textarea').keyup(function() {
                                    var length = $(this).val().length;
                                    var length = maxLength-length;
                                    $('#chars').text(length);
                                });
                            </script>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="closeButton" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitButton" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
                        <!--<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="alert alert-success alert-dismissible">
                                    <a class="close" data-dismiss="modal" aria-label="close">&times;</a>
                                    <strong>Success!</strong> Your review was updated.
                                </div>
                            </div>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Photo submission</button>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit your photo</h5>
                </div>
                <form id="myForm2" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nameSubmit" class="col-form-label">Name:</label>
                            <input type="text" name="nameSubmit" id="nameSubmit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dobSubmit" class="col-form-label">Date of birth:</label>
                            <input type="text" placeholder="dd/mm/yyyy" class="form-control" name="dobSubmit" id="dobSubmit" required>
                        </div>
                        <div class="form-group">
                            <label for="emailSubmit" class="col-form-label">Email address:</label>
                            <input type="text" placeholder="example@example.com" class="form-control" name="emailSubmit" id="emailSubmit" required></input>
                        </div>
                        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                        <br/>
                        <div>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="closeButton2" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="submitButton2" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="secondRow">
    <div style="margin-left: 1%; margin-top: 7%"><h2>Additional Information</h2></div>
    <div class="tableInformation">
        <table class="table">
            <thead>
            <tr style="display:flex; width:95%; border-top: 1px solid darkgray; margin-top: 2%; margin-left: 2%">
                <th scope="row"; style="width: 200px; border-top: none; border-bottom: none">Average Rating</th>
                <td style="margin-left: 50%; border-top: none; border-bottom: none" id="averageRatingStarPicture"><?php echo ($averageSimplified2) ?></td>
            </tr>
            <tr style="display:flex; width:95%; border-top: 1px solid darkgray; margin-top: 2%; margin-left: 2%">
                <th scope="row"; style="width: 200px; border-top: none; border-bottom: none">Percentage Rating</th>
                <td scope="row"; style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="ratingFormulaValue"><?php echo ($averageSimplified.' %') ?></td>
            </tr>
            <tr style="display:flex; width:95%; border-top: 1px solid darkgray; margin-top: 2%; margin-left: 2%">
                <th scope="row"; style="width: 200px; border-top: none; border-bottom: none">Availability</th>
                <td scope="row"; style="color: green; width: 200px; margin-left: 50%; border-top: none; border-bottom: none">Available</td>
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="secondRow">
    <div style="margin-left: 1%; margin-top: 2%"><h2>Recent Checkings</h2></div>
    <div id="newReviewTable" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameDB[0] ?></h3></th>
                <td class="starSingleRating" id="rating5"><?php echo $labelRatingDB[0] ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewDB[0] ?></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $dateDB[0] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div id="newReviewTable2" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameDB[1] ?></h3></th>
                <td class="starSingleRating" id="rating5"><?php echo $labelRatingDB[1] ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewDB[1] ?></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $dateDB[1] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div id="newReviewTable3" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameDB[2] ?></h3></th>
                <td class="starSingleRating" id="rating5"><?php echo $labelRatingDB[2] ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewDB[2] ?></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $dateDB[2] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div id="newReviewTable4" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameDB[3] ?></h3></th>
                <td class="starSingleRating" id="rating5"><?php echo $labelRatingDB[3] ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewDB[3] ?></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $dateDB[3] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div id="newReviewTable5" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
                <tr style="display:flex; width:100%; margin-top: 2%">
                    <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameDB[4] ?></h3></th>
                    <td class="starSingleRating" id="rating5"><?php echo $labelRatingDB[4] ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewDB[4] ?></td>
                </tr>
                <tr>
                    <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $dateDB[4] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>


</body>

</html>