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


$conection = conect_mysqli();

$result = mysqli_query($conection,"SELECT id, title, description, image_path FROM product");
$client = mysqli_fetch_all($result, MYSQLI_ASSOC);

//var_dump($client);

$idDB = Array();
$titleDB = Array();
$descriptionDB = Array();
$image_pathDB = Array();

for ($a=0;$a<4;$a++) {
    $idDB [$a] = $client[$a]['id'];
    $titleDB [$a] = $client[$a]['title'];
    $descriptionDB [$a] = $client[$a]['description'];
    $image_pathDB [$a] = $client[$a]['image_path'];
}

//echo ($titleDB [3]);

mysqli_close($conection);



?>
<html>
<head>

</head>
<body>
</div>
<div class="container" style="margin-left: 150px; margin-top: 50px">
    <h1>Products</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image path</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($client as $client): ?>
        <tr>
            <td><a href="PROYECT%202.1.php?clientId=<?php echo $client['id'] ?>"><?php echo $client['id'] ?></a></td>
            <td><?php echo $client['title'] ?></td>
            <td><?php echo $client['description'] ?></td>
            <td><?php echo $client['image_path'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>