<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>British Shorthair</title>
    <style>
        .firstRow{
            width: 1100px;
            margin: 138px;
            border: 1px solid darkgray;
            display: flex;
        }
        .secondRow{
            width: 1100px;
            margin-left: 69px;
            display: flex;
            flex-direction: column;
        }
        .tableInformation{
            border: 1px solid darkgray;
            width: 1100px;
            margin-left: 69px;
        }
        #mainPicture{
            width: 700px !important;
            height: 700px !important;
        }
        #bigPicture{
            background-color: red;
            width: 500px;
            height: 500px;
            alignment: center;
            visibility: hidden;
            margin: auto;
            float: right;
            z-index: 90;
            position: fixed;
            top: 50px;
            right: 500px;
        }
        .starImg {
            width: 100px;
        }
        #charactersRemaining {
            opacity: 70%;
        }
    </style>

    <?php

    class checkIn {
        public $nameCheckIn;
        public $ratingCheckIn;
        public $reviewCheckIn;
        public $timestampCheckIn;
    }
    if (!empty($_POST)) {
        $checkIn = new checkIn();
        $checkIn->nameCheckIn = $_POST ['nameCheckIn'];
        $checkIn->ratingCheckIn = $_POST ['ratingCheckIn'];
        $checkIn->reviewCheckIn = $_POST ['reviewCheckIn'];
        $checkIn->timestampCheckIn = date('d-M-Y h:i', time());

        $serialisedCheckIn = serialize($checkIn);
        file_put_contents('check-ins.txt', $serialisedCheckIn);

        //formula para extraer datos deserializados y poner en tabla
        $checkInFromFile = file_get_contents('check-ins.txt');
        $unserialisedCheckIn = unserialize($checkInFromFile);

        $nameCheckIn = $unserialisedCheckIn->nameCheckIn;
        $ratingCheckIn = $unserialisedCheckIn->ratingCheckIn;
        $reviewCheckIn = $unserialisedCheckIn->reviewCheckIn;


        switch ($ratingCheckIn) {
                case 1:
                    $ratingCheckIn = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">';
                    break;
                case 2:
                    $ratingCheckIn = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">';
                    break;
                case 3:
                    $ratingCheckIn = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">';
                    break;
                case 4:
                    $ratingCheckIn = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">';
                    break;
                case 5:
                    $ratingCheckIn = '<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">';
                    break;
            }

    };

    //var_dump($unserialisedCheckIn->ratingCheckIn);

    // Save submission to file
    //$checkinFile = 'check-ins.txt';
    //if (file_exists($checkinFile) == false) {
    // $checkInsArray = [];
    // array_push($checkInsArray, $checkinData);
    // $txtData = serialize($checkInsArray);
    // file_put_contents($checkinFile, $txtData);
    //} else {
    //$fileContent = file_get_contents($checkinFile);
    //$fileContent = unserialize($fileContent);
    //array_push($fileContent, $checkinData);
    //$txtData = serialize($fileContent);
    //  file_put_contents($checkinFile, $txtData);
    //foreach ($fileContent as $checkin){
    //$date = date('d/m/Y', $checkin->timestamp);
    //echo "<h3>$checkin->name  $checkin->rating</h3>";
    //echo "<p>$checkin->review</p>";
    //echo "<p><small>$date</small></p>";
    //  }
    // }

    //eliminar archivo tras extraer datos
    //unlink('check-ins.txt');
    ?>

    <script>

        var ratingFormulaValue = 0;
        $.ajax({
            url: "http://localhost:8080/checkins",
            dataType: 'json',
            success: function (data) {

                for (var i = 0; i < data.length; i++) {

                    var dataId = data[i].id
                    var dataName = data[i].name
                    var dataReview = data[i].review
                    var dataRating = data[i].rating
                    var dataDateTime = data[i].dateTime

                    $("#id").text(dataId)
                    $("#name").text(dataName)
                    $("#review").text(dataReview)
                    $("#rating").text(dataRating)
                    $("#dateTime").text(moment(dataDateTime).format("DD-MMM-YYYY HH:MM"))
                }
                ratingFormulaValue += dataRating;
                starRating(1)
            }
        });
        $.ajax({
            url: "http://localhost:8080/checkins",
            dataType: 'json',
            success: function (data) {

                for (var i = 0; i < data.length; i++) {

                    var dataId2 = data[i].id;
                    var dataName2 = data[i].name;
                    var dataReview2 = data[i].review;
                    var dataRating2 = data[i].rating;
                    var dataDateTime2 = data[i].dateTime;

                    $("#id2").text(dataId2);
                    $("#name2").text(dataName2);
                    $("#review2").text(dataReview2);
                    $("#rating2").text(dataRating2);
                    $("#dateTime2").text(moment(dataDateTime2).format("DD-MMM-YYYY HH:MM"));
                }
                ratingFormulaValue += dataRating2;
                starRating(2);
            }
        });
        $.ajax({
            url: "http://localhost:8080/checkins",
            dataType: 'json',
            success: function (data) {

                for (var i = 0; i < data.length; i++) {

                    var dataId3 = data[i].id;
                    var dataName3 = data[i].name;
                    var dataReview3 = data[i].review;
                    var dataRating3 = data[i].rating;
                    var dataDateTime3 = data[i].dateTime;

                    $("#id3").text(dataId3);
                    $("#name3").text(dataName3);
                    $("#review3").text(dataReview3);
                    $("#rating3").text(dataRating3);
                    $("#dateTime3").text(moment(dataDateTime3).format("DD-MMM-YYYY HH:MM"));
                }
                ratingFormulaValue += dataRating3;
                starRating(3);
            }
        });
        $.ajax({
            url: "http://localhost:8080/checkins",
            dataType: 'json',
            success: function (data) {

                for (var i = 0; i < data.length; i++) {

                    var dataId4 = data[i].id;
                    var dataName4 = data[i].name;
                    var dataReview4 = data[i].review;
                    var dataRating4 = data[i].rating;
                    var dataDateTime4 = data[i].dateTime;

                    $("#id4").text(dataId4);
                    $("#name4").text(dataName4);
                    $("#review4").text(dataReview4);
                    $("#rating4").text(dataRating4);
                    $("#dateTime4").text(moment(dataDateTime4).format("DD-MMM-YYYY HH:MM"));
                }
                //var ratingCheckIn = '<?php echo $unserialisedCheckIn->ratingCheckIn; ?>';
                ratingFormulaValue += dataRating4;
                //ratingFormulaValue += ratingCheckIn;
                //alert(ratingCheckIn);
                starRating(4);
                ratingFormulaValue = ((ratingFormulaValue / 5) * 100) / 5;
                $('#averageRatingStarPercentage').text(ratingFormulaValue + "%");
                ratingFormula();
            }
        });

    function starRating(starCases) {

        var singleRating;

        switch (starCases){
            case 1: singleRating= '#rating'; break;
            case 2: singleRating= '#rating2'; break;
            case 3: singleRating= '#rating3'; break;
            case 4: singleRating= '#rating4'; break;
            case 5: singleRating= '#rating5'; break;
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
            case '5': $(singleRating).html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">');
                break;
        }
    }

        function ratingFormula() {

            if (ratingFormulaValue <= 20){
                $('#averageRatingStarPicture').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">');}
            else if (ratingFormulaValue <= 40){
                $('#averageRatingStarPicture').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">');}
            else if (ratingFormulaValue <= 60){
                $('#averageRatingStarPicture').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">');}
            else if (ratingFormulaValue <= 80){
                $('#averageRatingStarPicture').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">');}
            else {
                $('#averageRatingStarPicture').html('<img class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">');}
            }

    </script>

</head>
<body>
<div class="container firstRow">
    <div class="row">
        <div class="col-sm">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 400px"; align="left">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img id="pic1"
                             src="https://mybritishshorthair.com/wp-content/uploads/2020/04/Grey_British_Shorthair_with_yellow_eyes-1024x861.jpg"
                             alt="British shorthair main" style="margin-top: 3%; margin-bottom: 3%; width:500px; height:520px;">
                    </div>
                    <div class="carousel-item">
                        <img id="pic2"
                             src="https://i.pinimg.com/564x/ab/b6/38/abb638f484c42120705d98a6e24541b4.jpg"
                             alt="British shorthair main" style="margin-top: 3%; margin-bottom: 3%; width:500px; height:520px;">
                    </div>
                    <div class="carousel-item">
                        <img id="pic3"
                             src="https://tescobank.azureedge.net/assets/britishshorthaircatmain-l/1/BritishShorthairCatMain%20L.jpg"
                             alt="British shorthair main" style="margin-top: 3%; margin-bottom: 3%; width:500px; height:520px;">
                    </div>
                    <div class="carousel-item">
                        <img id="pic4"
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWakUnlvIUFbMUWRvTzCxLztX0YsCIW43KEA&usqp=CAU"
                             alt="British shorthair main" style="margin-top: 3%; margin-bottom: 3%; width:400px; height:520px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm">
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

            <script>

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

            </script>

            <!--<button id='openform' class="btn btn-primary" style="margin-left: 17px" onClick="showIt1();">Check in</button>

            <br>
            <br>

            <div id="layer" style= visibility:hidden; padding:0%; margin:0; background:#ececec; border: 1px solid;">

                <form onsubmit="hideIt1();top.location.reload();" action="" method="post">

                    <label for="nameCheckIn">Name:</label>
                    <input type="text" name="nameCheckIn" id="nameCheckIn">
                    <br>
                    <label for="ratingCheckIn">Rating:</label>
                    <input type="text" name="ratingCheckIn" id="ratingCheckIn">
                    <br>
                    <label for="reviewCheckIn">Review:</label>
                    <input type="text" name="reviewCheckIn" id="reviewCheckIn">
                    <br>
                    <label for="timestampCheckIn">Time stamp:</label>
                    <input type="text" name="timestampCheckIn" id="timestampCheckIn">
                    <br>
                    <br>
                    <div class="container">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="alert alert-success alert-dismissible">
                                    <a  class="close" data-dismiss="modal" aria-label="close">&times;</a>
                                    <strong>Success!</strong> Your review was updated.
                                </div>
                            </div>
                        </div>
                        <button id="form" class="btn btn-primary" style="margin-left: 17px" onClick="hideIt1();">Close without completing</button>
                    </div>
                    <br>
                    <br>
                    <button id="btnSubmit" onclick="alert('Review updated successfully!')" class="btn btn-primary">Submit</button>



                </form>

            </div>-->
            <!--<button onclick="alert('Hey! check my cat')" class="buttonCheckIn">Check in</button>-->
        </div>
    </div>
</div>


<div class="secondRow">
    <div style="margin-left: 8%; margin-top: -7%"><h2>Additional Information</h2></div>
    <div class="tableInformation">
        <table class="table">
            <thead>
            <tr style="display:flex; width:95%; border-top: 1px solid darkgray; margin-top: 2%; margin-left: 2%">
                <th scope="row"; style="width: 200px; border-top: none; border-bottom: none">Average Rating</th>
                <td style="margin-left: 50%; border-top: none; border-bottom: none" id="averageRatingStarPicture">
                </td>
            </tr>
            <tr style="display:flex; width:95%; border-top: 1px solid darkgray; margin-top: 2%; margin-left: 2%">
                <th scope="row"; style="width: 200px; border-top: none; border-bottom: none">Percentage Rating</th>
                <td scope="row"; style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="averageRatingStarPercentage"></td>
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
    <div style="margin-left: 8%; margin-top: 2%"><h2>Recent Checkings</h2></div>
    <div class="tableInformation">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name"></h3></th>
                <td id="rating"></td>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review"></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="tableInformation">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name2"></h3></th>
                <td style="margin-left: 0%;border-top: none; border-bottom: none" id="rating2"></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review2"></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime2"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="tableInformation">
    <table class="table">
        <thead>
        <tr style="display:flex; width:100%; margin-top: 2%">
            <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name3"></h3></th>
            <td style="margin-left: 0%;border-top: none; border-bottom: none" id="rating3"></td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review3"></td>
        </tr>
        <tr>
            <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime3"></td>
        </tr>
        </tbody>
    </table>
    </div>
    <br>
    <div class="tableInformation">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name4"></h3></th>
                <td style="margin-left: 0%;border-top: none; border-bottom: none" id="rating4"></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review4"></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime4"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>

    <div id="newReviewTable" class="tableInformation" style="margin-bottom: 2%">
        <table class="table">
            <thead>
            <tr style="display:flex; width:100%; margin-top: 2%">
                <th scope="row"; style="width: 600px; border-top: none; border-bottom: none"><h3 font-size: medium id="name5"><?php echo $nameCheckIn ?></h3></th>
                <td style="margin-left: 0%;border-top: none; border-bottom: none" id="rating5"><?php echo $ratingCheckIn ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="review5"><?php echo $reviewCheckIn ?></td>
            </tr>
            <tr>
                <td style="width: 200px; margin-left: 50%; border-top: none; border-bottom: none" id="dateTime5"><?php echo $checkIn->timestampCheckIn ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="bigPicture">
        <img id="mainPicture" style="alignment: center; display: block" src="">
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        document.getElementById('pic1').onclick=function(e){
            document.getElementById("mainPicture").src = "https://mybritishshorthair.com/wp-content/uploads/2020/04/Grey_British_Shorthair_with_yellow_eyes-1024x861.jpg";
            document.getElementById("mainPicture").style.width= "500px";
            document.getElementById("mainPicture").style.height = "500px";
            document.getElementById("mainPicture").style.visibility="visible";
        }
        document.getElementById('pic2').onclick=function(e){
            document.getElementById("mainPicture").src = "https://i.pinimg.com/564x/ab/b6/38/abb638f484c42120705d98a6e24541b4.jpg";
            document.getElementById("mainPicture").style.width= "500px";
            document.getElementById("mainPicture").style.height = "500px";
            document.getElementById("mainPicture").style.visibility="visible";
        }
        document.getElementById('pic3').onclick=function(e){
            document.getElementById("mainPicture").src = "https://tescobank.azureedge.net/assets/britishshorthaircatmain-l/1/BritishShorthairCatMain%20L.jpg";
            document.getElementById("mainPicture").style.width= "500px";
            document.getElementById("mainPicture").style.height = "500px";
            document.getElementById("mainPicture").style.visibility="visible";
        }
        document.getElementById('pic4').onclick=function(e){
            document.getElementById("mainPicture").src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWakUnlvIUFbMUWRvTzCxLztX0YsCIW43KEA&usqp=CAU";
            document.getElementById("mainPicture").style.width= "500px";
            document.getElementById("mainPicture").style.height= "500px";
            document.getElementById("mainPicture").style.visibility="visible";
        }
        document.getElementById('bigPicture').onclick=function(e) {
            if (document.getElementById("mainPicture").style.visibility = "visible") {
                document.getElementById("mainPicture").style.visibility = "hidden";
            }
        }
    </script>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>