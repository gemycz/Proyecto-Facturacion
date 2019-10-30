
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
	<meta charset="UTF-8">
        <title>Proyecto-Facturacion</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
	</head>
	<body>
		<div id="login">
		<form  method="POST" action="SesionDB.php"><br>
	
			<div id="img">
				<!--<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>-->
				<img src="img/logo2.png" width="100px">
				<h2>FACTURAPI</h2>
				<br>
			</div>

			<div class="inputs">
				<p>Usuario: </p> <input type="text" name="username" required><br><br>
				<p>Contraseña: </p> <input type="password" name="password" ><br><br>
				<br>
			<button type="submit" name="submit"> Login </button>
			<label>
			<input id="rec" type="checkbox" name="remember" checked="checked"> Recordarme
			</label>

			</div>

			<div id="buttons">
		
				<button type="button" onclick="location.href='index.html'"> Registrar </button>
			<span class="psw"> Olvide mi <a href="#">Contraseña</a></span>
			</div>
		</form>
		</div>
	</body>
</html>

<style>

	body {
		background: #26BDE8;
	}

	#login {
	border-radius: 8px;
	margin: 0px;
    background-color: #fafafa;
	 padding-left: 30px;
	 padding-right: 30px;
	 padding-top: 20px;
	 padding-bottom:40px;
  	border: 0px;
  	/* IMPORTANTE */
	  text-align: center;
	  position:absolute;
		left: 50%;
		top:50%;
	  transform: translate(-50%, -50%);
	  -webkit-transform: translate(-50%, -50%);
	  -webkit-box-shadow: 9px 10px 19px -2px rgba(0,0,0,0.5);
	-moz-box-shadow: 9px 10px 19px -2px rgba(0,0,0,0.5);
	box-shadow: 9px 10px 19px -2px rgba(0,0,0,0.5);

}

	#img img{
		color: #26BDE8;
		margin: 0px;
	}

	#img h2 {
		font-family: 'Poppins', sans-serif;
		color: #26BDE8;
		margin: 0px;
	}

	.inputs {
		justify-content: center;

	}

	.inputs p {
		margin: 5px;
		font-family: 'Poppins', sans-serif;
		text-align: center;
	}

	.inputs button {
		background: #26BDE8;
		border-radius: 4px;
		border: none;
		color: white;
		padding: 10px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		
	}
	.inputs button:hover{
			transform: scale(1.2,1.2);
			-webkit-transform: scale(1.2,1.2);
			-moz-transform: scale(1.2,1.2);
		}

	.inputs #rec {
		font-family: 'Poppins', sans-serif;

	}

	#buttons {
		justify-content: center;
	}

	#buttons button {

		background: #26BDE8;
		border-radius: 4px;
		border: none;
		color: white;
		padding: 10px 28px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		

	}
	#buttons button:hover{
			transform: scale(1.2,1.2);
			-webkit-transform: scale(1.2,1.2);
			-moz-transform: scale(1.2,1.2);
		}


</style>