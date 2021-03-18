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
                const apikey = "1bd5bb2e4bc742eead26e6911f8f8195"
                const urlData = `https://api.spoonacular.com/food/products/search?query=wine&apiKey=${apikey}`
                console.log(">>")
                const urlById = `https://api.spoonacular.com/recipes/431332/?apikey=1bd5bb2e4bc742eead26e6911f8f8195`

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