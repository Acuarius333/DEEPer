<?php
class User
{
    public ?int $id;
    public string $name;
    public string $emailAddress;
    public string $password;
}

function conect_mysqli(){

    $hostname = "mysql";
    $database = "oneupwine";
    $username = "root";
    $password = "root";

    $conection = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($conection, "en");
    if (mysqli_connect_errno()){
        echo "Error trying to connect MySQL: " . mysqli_connect_error();
    }
    return $conection;
}

/*
$registered = false;
$user = new user();
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {

        $user->name = strip_tags($_POST ['name']);
        $user->emailAddress = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $conection = conect_mysqli();
        $consult = "INSERT INTO user (name, email_address, password)";
        $consult .= "VALUES (
                                '" . $user->name . "',
                                '" . $user->emailAddress . "',
                                '" . $user->password . "'
                                )";

        $consult = mysqli_query($conection, $consult) or die("Error: " . mysqli_error($conection));
        $IdNew = mysqli_insert_id($conection);
        mysqli_close($conection);
        $registered = true;
        header('Location: welcome_page.php');
    } else {
            echo "<script>
            alert('Password don\'t match. Please try again');
            </script>";
    }
}
*/

class EntityHydrator
{
    public function hydrateProduct(array $data): Product
    {
        $product = new Product();
        $product->id = $data['id'];
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->imagePath = $data['image_path'];
        $product->average_rating = $data['average_rating'];

        return $product;
    }

    public function hydrateCheckIn(array $data): CheckIn
    {
        $checkIn = new CheckIn();
        $checkIn->id = $data['id'] ?? null;
        $checkIn->name = $data['name'];
        $checkIn->rating = $data['rating'];
        $checkIn->review = $data['review'];
        $checkIn->productId = $data['product_id'];

        return $checkIn;
    }

    public function hydrateProductWithCheckIns(array $data): Product
    {
        $productData = [
            'id' => $data[0]['product_id'],
            'title' => $data[0]['title'],
            'description' => $data[0]['description'],
            'image_path' => $data[0]['image_path'],
            'average_rating' => $data[0]['average_rating'],
        ];

        $product = $this->hydrateProduct($productData);

        foreach ($data as $checkinRow) {
            if ($checkinRow['name'] !== null) {
                $checkIn = $this->hydrateCheckIn($checkinRow);
                $product->addCheckin($checkIn);
            }
        }

        return $product;
    }

    public function hydrateUser (array $data): User
    {
        $user = new User();
        $user->id = $data['id'] ?? null;
        $user->name = $data['name'];
        $user->emailAddress = $data['email_address'];
        $user->password = $data['password'];

        return $user;
    }
}

function getUserByEmail(string $loginEmail): ?User
{
    $stmt = $this->dbh->prepare(
        'SELECT id, name, email_address, password
            FROM user
            WHERE email_address = :loginEmail'
    );
    $stmt->execute(['loginEmail' => $loginEmail]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($result)) {
        return null;
    }

    $hydrator = new EntityHydrator();
    return $hydrator->hydrateUser($result);
}



if (isset($_POST['loginEmail'], $_POST['loginPassword'])) {
    $user = getUserByEmail($_POST['loginEmail']);

    if ($user && password_verify($_POST['loginPassword'], $user->password)) {
        // Logged in
        $_SESSION['loginId'] = $user->id;
        header('Location: welcome_page.php');
        exit;
    } else {
        $errorMessage = 'Incorrect details, please try again';
    }
}














/*
function cerrar_sesion_usuario() {
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
    session_start();

// Unset all of the session variables.
    $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
}

if (isset($_GET['call']) && $_GET['call'] == 'desconectar_usuario') {
    cerrar_sesion_usuario();
*/
/////////


//// RECOPIAR ESTE CODIGO DEL EMAIL /////
/*function comprobar_usuario($loginEmail, $loginPassword){

$conexion = conect_mysqli();
$consult=' select email_address, password
from user
where user.email_address === "'.$loginEmail.'"
limit 0, 1';

$consult = mysqli_query($conexion, $consult) or die("Error: ".mysqli_error($conexion));
$user_bd = mysqli_fetch_array($consult, MYSQLI_ASSOC);
mysqli_free_result($consult);
mysqli_close($conexion);

if($user_bd != NULL ){
    if($user_bd["password"] === $loginPassword){
        echo ('logued');

        //session_start();
        $_SESSION['email_address'] = $loginEmail;
        $_SESSION['password'] = $loginPassword;

        $result = 1; // Todo correcto
    }
    else{
        $result =  2;// Error en la clave
        echo ('error');
    }
}
else{
    $result =  3; // Error en el usuario
}

return $result;
echo $result;
}
/*
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Start our session.
session_start();
session_regenerate_id ();

//Comprobamos que las variables existen
if(isset($_SESSION['last_action']) && isset($_SESSION['tiempo'])){

// Restamo a la fecha y hora actual, la que guardamos al iniciar la sesion
// Esto nos da el tiempo que pasó desde que se inició sesión
$SegundosInactivos = time() - $_SESSION['last_action'];
/*
echo "<script>
console.log('Sesion: ".$_SESSION['last_action']."');
console.log('Tiempo: ".time()."');
console.log('Inactivo: ".$SegundosInactivos."');
console.log('Maximo: ".$_SESSION['tiempo']."');
</script>";
*/



// Si estuvo mas tiempo del indicado por la base de datos, cerramos sesión
/*if($SegundosInactivos >= $_SESSION["tiempo"]){
// Eliminamos la sesión
    session_unset();
    session_destroy();

    echo "<script>
alert('La sesión caducó, debe loguearse de nuevo');
window.location= '".$direcc."login/login.php';
</script>";
    exit();
}
else{ // Recargamos el tiempo al actual (Como iniciar sesión de nuevo)
    $_SESSION['last_action'] = time();
}

}

//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])){
    echo "<script>
//alert('No se inició la sesion');
window.location= '".$direcc."login/login.php';
</script>";
    //header('Location: '.$direcc.'login/login.php');
    exit();
}

if($_SESSION['nivel_acceso'] < $nivel_acceso){
    echo "<script>
alert('No tienes acceso a esta sección, serás redirigido a la web de inicio');
window.location= '".$direcc."index.php';
</script>";
}
*/
/*
//creamos la sesion
session_start();
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])){
 header('Location: '.$direcc.'login/login.php');
 exit();
}

*/


/****************************************************************************************
//******************** Borramos una fila de una tabla en  MySQL **************************
//****************************************************************************************
$conexion = conectar_mysqli(); // Abrimos la conexión

// Guardamos el string en consulta (Esto es solo por comodidad)
$consulta="
select id
from  clientes
where id = ".$id."";
// Hacemos la consulta
$resultado = mysqli_query($conexion, $consulta) or die("Error: ".mysqli_error($conexion));
// Extraemos los datos y lo guardamos en "Cliente"
$cliente = mysqli_fetch_array($resultado, MYSQLI_ASSOC);


// Si la variable cliente existe, entra en el "IF" y borra el cliente
if($cliente){

// Guardamos el string en consulta (Esto es solo por comodidad)
// Borramos el ID que le indicamos en $id de la tabla Clientes
    $consulta=' DELETE
from clientes
where id = '.$id.'';
// Hacemos la consulta
    $resultado = mysqli_query($conexion, $consulta) or die("Error: ".mysqli_error($conexion));
}
else{
// En este caso el cliente no existía en la base de datos
}

// Cerramos la conexión
mysqli_close($conexion);



// Esta consulta es para editar/actualizar. No te olvides que al final (en este caso, la línea de email) no lleva coma
$consulta=' Update tarifas_contratadas Set
user = "'.$inicio.'",
email = "'.$var_clientes.'"

where id = "'.$id.'"';
*/

?>