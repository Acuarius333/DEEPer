<?php

require_once '../setup.php';


echo '<script>
        function myFunction() {
            confirm();
        }
        
        if (confirm("Are you sure you want to delete your account?")){
            window.location.href = "../php/test.php"
        }else{
            history.go(-1)
        }
        </script>';

?>


