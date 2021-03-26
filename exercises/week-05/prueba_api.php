<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>API</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

        <script>
            function getData () {
                const urlData = `http://api.weatherapi.com/v1/current.json?key=1d31632dbd0a4cf592691208211803&q=44.83797578872893, -0.575963596246983&aqi=no`
                console.log(">>")
                const urlById = `http://api.weatherapi.com/v1/current.json?key=1d31632dbd0a4cf592691208211803&q=44.83797578872893, -0.575963596246983&aqi=no`

                $.ajax({
                    dataType: "json",
                    url: urlData,

                    success: function (data) {
                    console.log(data)
                    }
                })


            };

            getData()
        </script>
    </body>
</html>
