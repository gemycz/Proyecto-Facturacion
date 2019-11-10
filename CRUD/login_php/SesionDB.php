


<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "factura";
//CONEXION CON mysqli

// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $dbname );

// Verificar la conexion
if (!$conn) {
    die("Connexion Fallida: " .mysqli_connect_errno());
    
}

//CAPTURA LOS DATOS 
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT *FROM Login Where username = '$user'";
$result = $conn->query($sql);


if($result->num_rows > 0){    }

$row = $result->fetch_array(MYSQLI_ASSOC);

if($pass==$row['password']){
    //$_SESSION ['login'] = 'Administrador';
    $_SESSION['loggedin'] = true;
    $_SESSION ['username'] = $user;
    $_SESSION ['start'] = time();
    $_SESSION ['expire'] = $_SESSION ['start'] + (10*60);
    echo "Bienvenido " .$_SESSION ['username'];
    echo "<br><br> <a href=panel-control.php> Panel de control </a>";
    
    
    if($_SESSION['username']==false){
        header("location:login.php");
    }else{
        header('Location: http://localhost/Proyeto-Facturacion/CRUD/index.php');

    }
    
    //header('Location: ipanel-control.php');
}else{
   // echo "Usuario o contraseña incorrectas";
   //echo "<br><a href=' http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php'>Volver a Intentarlo</a>";
    //header('Location: http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php');
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


<html>
    <head>
        <title>FactuRappi - Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilos.css">
        <meta name="viewport" content="width=device-width">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    </head>
    <body id="login-body" style="background: url(../img/backgroundblue.png)">
       <div class="Logo-log">
       <img src="../img/FactuRappiLogo.png" width="200px">
       </div>
        <!--CONTENIDO-->
        <div id="contenido" >
         
        
        <h2 style="color:white">Usuario o contraseña incorrectas
   			<br><a href=' http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php'>Volver a Intentarlo</a></h2>
        </div>
    </body>
</html>

