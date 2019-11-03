<!-- 
Creado por Luisetfree & tecnosetfree
Web: http://luisetfree.over-blog.es
Facebook:https://www.facebook.com/tecnosetfree/
Twitter: @tecnosetfree
Apoyanos con tus visitas y comentarios en nuestras redes sociales para seguir avanzando y traer contenido de calidad.

 -->
<?php
session_start();
?>

<?php

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
$password = $_POST['password'];

$sql = "SELECT *FROM Login Where username = '$user'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
if ($pass==$row['contraseña']) { 

      $_SESSION ['login'] = 'Administrador';
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $user;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
    header('Location: http://localhost/login-php-sesiones/panel-control.php');//redirecciona a la pagina del usuario

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conn); 
 ?>