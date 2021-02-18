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