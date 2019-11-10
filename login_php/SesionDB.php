<?php
session_start();




$servername = "localhost";
$username = "gemycz";
$password = "Gemy2019CZ";
$dbname = "facturacion";
//CONEXION CON mysqli

// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $dbname );

// Verificar la conexion
if (!$conn) {
    die("Connexion Fallida: " .mysqli_connect_errno());
    
}echo "Connexion Correcta <br><br><br>";

//CAPTURA LOS DATOS 
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT *FROM Login Where username = '$user'";
$result = $conn->query($sql);


if($result->num_rows > 0){    }

$row = $result->fetch_array(MYSQLI_ASSOC);

if($pass==$row['contrase�a']){
    //$_SESSION ['login'] = 'Administrador';
    $_SESSION['loggedin'] = true;
    $_SESSION ['username'] = $user;
    $_SESSION ['start'] = time();
    $_SESSION ['expire'] = $_SESSION ['start'] + (5*60);
    echo "Bienvenido " .$_SESSION ['username'];
    echo "<br><br> <a href=panel-control.php> Panel de control </a>";
    
    
    if($_SESSION['username']==false){
        header("location:login.php");
    }else{
        header('Location: http://localhost/login_php/panel-control.php');

    }
    
    //header('Location: ipanel-control.php');
}else{
    echo "Usuario o contraseña incorrectas";
    echo "<br><a href='login.php'>Volver a Intentarlo</a>";
}



/*
if($_POST['username']== $user && $_POST['password'] == $pass){
    $_SESSION ['login'] = 'Administrador';
    echo "Sesion creada";
}else{
    echo "Usuario o contraseña incorrectas";
}
*/

$conn->close();

?>