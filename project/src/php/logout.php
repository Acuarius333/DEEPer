<?php
session_start();
session_destroy();
header('Location: ../../public/welcome_page.php');
?>