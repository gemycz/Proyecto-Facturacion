<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "", "factura");
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM producto where CODIGO_PRO like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_pro=$row['ID_PRO'];
		
		$row_array['value'] = $row['CODIGO_PRO']." - ".$row['NOMBRE_PRO'];
		$row_array['id_pro']=$row['ID_PRO'];
		$row_array['codigo_pro']=$row['CODIGO_PRO'];
		$row_array['nombre_pro']=$row['NOMBRE_PRO'];
		$row_array['precio']=$row['PRECIO_PRO'];
		$row_array['cantidad_pro']=$row['CANTIDAD_PRO'];


		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>