<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Calculator</title>

</head>

<?php

    $a= $_GET['a'];
    $b= $_GET['b'];
    $symbol= $_GET['symbol'];
    $filename = 'Backup.txt';
    $file = fopen($filename, 'a+');
    $calculation = 0;
    $subs = $a - $b;
    $mul = $a * $b;
    $div = $a / $b;

        if($symbol == '+'){
            $calculation = $a+$b;//$add = $a + $b;
            $serialisedProductAdd = serialize($calculation);
            $dateTime = date('d-m-Y H:i:s');
            $printToBackupAdd = $serialisedProductAdd.$dateTime.PHP_EOL;
            fwrite($file, $printToBackupAdd);
            fseek($file, 0);
            fclose($file);
        }
        else if($symbol == '-'){
            $calculation = $a-$b;
            $serialisedProductSubs = serialize($subs);
            $dateTime = date('d-m-Y H:i:s');
            $printToBackupSubs = $serialisedProductSubs.$dateTime.PHP_EOL;
            //echo '<pre>'.$serialisedProductSubs.'</pre>';
            //echo "<p style='margin-left: 50px'>Substraction is: $subs</p>";
            fwrite($file, $printToBackupSubs);
            fseek($file, 0);
            fclose($file);
        }
        else if($symbol == '*'){
            $calculation = $a*$b;
            $serialisedProductMul = serialize($mul);
            $dateTime = date('d-m-Y H:i:s');
            $printToBackupMul = $serialisedProductMul.$dateTime.PHP_EOL;
            //echo '<pre>'.$serialisedProductMul.'</pre>';
            //echo "<p style='margin-left: 50px'>Multiply is: $mul</p>";
            fwrite($file, $printToBackupMul);
            fseek($file, 0);
            fclose($file);
        }
        else if($symbol == '/'){
            $calculation = $a/$b;
            $serialisedProductDiv = serialize($div);
            $dateTime = date('d-m-Y H:i:s');
            $printToBackupDiv = $serialisedProductDiv.$dateTime.PHP_EOL;
            //echo '<pre>'.$serialisedProductDiv.'</pre>';
            //echo "<p style='margin-left: 50px'>Division is: $div</p>";
            fwrite($file, $printToBackupDiv);
            fseek($file, 0);
            fclose($file);
        }
        else{
            echo "<p style='margin-left: 50px'>Oops ,something wrong in your code. <br>Please insert symbol + for Addition, - for Substraction, * for Multiply or / for Division</p>";
        }



?>



<!--<script>

document.getElementById("hola").textContent("5");

</script>-->

<body>

    <!--<script>

    /*   var a = "<?php echo ($a)?>";
        var b = "<?php echo($b)?>";
        var symbol = "<?php echo($symbol)?>";
        $.ajax({
            url: "http://localhost/exercises/week-03/PHP/W3S1 - Exercise 1.php",
            dataType: 'html',
            success: function () {
                result = a + symbol + b;
                hola(result);

            }

        }
            //$('#lola').prev('input').val(hola);
        });
*/




        var huesito = "<?php echo($calculation)?>";


    </script>
    <p id="hola">sefdhefdehtg</p>-->
    <form action="" method="GET" style="margin-left: 50px">
        <h1>Calculator</h1>
        <ul style="margin-left: -80px">
            <ol> Multiplication: * </ol>
            <ol> Substraction: - </ol>
            <ol> Division: / </ol>
            <ol> Addition: + </ol>
        </ul>
        <p>Enter first number:</p>
            <input type="text" name="a">
        <p>Enter second number:</p>
            <input type="text" name="b">
        <p>Enter the calculator symbol:</p>
            <input type="text" name="symbol">
        <p>Result:</p>
        <p><?php echo($calculation)?></p>

        <button type="submit" id="boton">Calculate</button>
    </form>

</body>

</html>
