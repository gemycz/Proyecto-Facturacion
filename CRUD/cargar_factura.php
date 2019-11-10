 <?php
if (isset($_GET['term'])){
    # conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "", "factura");
    
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
    $listado = mysqli_query($con,"SELECT * FROM factura where ID_FAC like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
    
    /* Recuperar y almacenar en conjunto los resultados de la consulta.*/
    while ($row = mysqli_fetch_array($listado)) {
        
       
        
        $row_array['value'] = $row['ID_FAC']." - ".$row['fecha_fac'];
        $row_array['id']=$row['ID_FAC'];
      
        array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>