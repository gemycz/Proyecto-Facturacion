<?php

session_start();
$user = "gema";
$pass = "1234";

if($_POST['username']== $user && $_POST['password'] == $pass){
	$_SESSION ['login'] = 'Administrador';
	echo "Sesion creada";
}else{
	echo "Usuario o contraseña incorrectas";
}

?>