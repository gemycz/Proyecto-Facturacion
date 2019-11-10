<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="factura";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Comprobar la conexión
if(!$conn){
    die("conexión fallida: ".mysqli_connect_errno());
    
}

