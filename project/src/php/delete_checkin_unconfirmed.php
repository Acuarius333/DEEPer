<?php

require_once '../setup.php';

$reviewId = $_GET['reviewId'];

echo '<script>
        function myFunction() {
            confirm();
        }
        
        if (confirm("Are you sure you want to delete this review?")){
            window.location.href = "delete_checkin_confirmed.php?reviewId='.$reviewId.'"
        }else{
            history.go(-1)
        }
        </script>';

?>






