<?php
session_start();
/*//session_destroy();
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
*/

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<div id="id01" class="modal">

	<form class="modal-content animate" method="POST" action="SesionDB.php"><br>
	
	<div class="imgcontainer">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<img src="img/usuarios.png" alt="user" class="avatar">
	</div>

	<div class="container">
	Usuario: <input type="text" name="username" required><br><br>
	Contraseña: <input type="password" name="password" ><br><br>

	<button type="submit" name="submit"> Login </button>
	<label>
		<input type="checkbox" name="remember" checked="checked"> Recordarme
	</label>

	</div>

	<div class="container" style="background-color: #f1f1f1">
		
		<button type="button" onclick="location.href='index.html'"> Registrar </button>
		<span class="psw"> Olvide <a href="#">Contraseña</a></span>
	</div>

</div>

</form>

</body>
</html>