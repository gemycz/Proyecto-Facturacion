<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "", "factura");
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$listado = mysqli_query($con,"SELECT * FROM cliente where CEDULA_CLI like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($listado)) {
		
		$id_pro=$row['ID_CLI'];
		
		$row_array['value'] = $row['CEDULA_CLI']." - ".$row['NOMBRE_CLI'];
		$row_array['id']=$row['ID_CLI'];
		$row_array['cedula']=$row['CEDULA_CLI'];
		$row_array['nombre']=$row['NOMBRE_CLI'];
		$row_array['direccion']=$row['DIRECCION_CLI'];
		$row_array['telefono']=$row['TELEFONO_CLI'];
		$row_array['email']=$row['EMAIL_CLI'];
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>