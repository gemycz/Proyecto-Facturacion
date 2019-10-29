<!-- 
Creado por Luisetfree & tecnosetfree
Web: http://luisetfree.over-blog.es
Facebook:https://www.facebook.com/tecnosetfree/
Twitter: @tecnosetfree
Apoyanos con tus visitas y comentarios en nuestras redes sociales para seguir avanzando y traer contenido de calidad.

 -->
<?php
//incluimos el archivo donde se encuentran nuestros datos de conexion
 $servername = "localhost";
$username = "gemycz";
$password = "Gemy2019CZ";
$dbname = "facturacion";
//CONEXION CON mysqli

// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $dbname );

 $form_pass = $_POST['password'];
 
 

 if ($conn->connect_error) {
 die("La conexion falló: " . $conn->connect_error);
}

 $buscarUsuario = "SELECT * FROM Login
 WHERE username = '$_POST[username]' ";

 $result = $conn->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "Nombre de Usuario ya asignado, ingresa otro." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO Login (username, contraseña) VALUES ('$_POST[username]', '$form_pass')";

 if ($conn->query($query) === TRUE) {
 // header('Location: http://localhost/Login/login.html');
 echo "<br />" . "<h1>" . "Gracias por registrarse!" . "</h1>";
 echo "<h3>" . "Bienvenido: " . $_POST['username'] . "</h3>" . "\n\n";
 echo "<h3>" . "Iniciar Sesion: " . "<a href='login.html'>Login</a>" . "</h3>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
