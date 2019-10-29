<?php
session_start();
//session_destroy();
unset($_SESSION['login']);
//PHP_SESSION_ACTIVE
if(session_status()==PHP_SESSION_ACTIVE){
    echo "sesion activa <br>";
}



if(isset($_SESSION['login'])){
	echo "Bienvenido: " .$_SESSION['login'];
}else{
	echo "Sin sesion";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form  method="POST" action="loginSesion.php"><br>
	
	Usuario: <input type="text" name="username"><br><br>
	Contraseña: <input type="password" name="password"><br><br>

	<input type="submit" name="submit">


</form>

</body>
</html>