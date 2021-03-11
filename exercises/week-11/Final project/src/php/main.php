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
///
///
/*
unction comprobar_usuario($usuario, $clave){

$conexion = conectar_mysqli();
$consulta=' select clave, id, nivel_acceso, tiempo
from usuarios
where usuarios.usuario = "'.$usuario.'"
limit 0, 1';

$consulta = mysqli_query($conexion, $consulta) or die("Error: ".mysqli_error($conexion));
$usuario_bd = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
mysqli_free_result($consulta);
mysqli_close($conexion);

if($usuario_bd != NULL ){
    if($usuario_bd["clave"] == $clave){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $usuario_bd['id'];
        $_SESSION['clave'] = $usuario_bd['clave'];
        $_SESSION['nivel_acceso'] = $usuario_bd['nivel_acceso'];
        $_SESSION['last_action'] = time();
        $_SESSION["tiempo"] = $usuario_bd['tiempo'];

        $resultado = 1; // Todo correcto
    }
    else{
        $resultado =  2;// Error en la clave
    }
}
else{
    $resultado =  3; // Error en el usuario
}

return $resultado;
}
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