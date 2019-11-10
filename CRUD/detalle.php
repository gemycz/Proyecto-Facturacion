
<?php
    session_start();
?>
        

<script type="text/javascript">
		$(function() {
            $("#codigo_producto").autocomplete({
                source: "loadproduct.php",
                minLength: 2,
                select: function(event, ui) {
					event.preventDefault();
          			$('#codigo_producto').val(ui.item.codigo_pro);
					$('#nombre_producto').val(ui.item.nombre_pro);
					$('#precio').val(ui.item.precio);
					$('#cantidad_pro').val(ui.item.cantidad_pro);
          $('#id_producto').val(ui.item.id_pro);
					
			     }
            });
		});

</script>



  <?php
    include ("database.php");


        $factura= new Database();
        $listado=$factura->obtener_fact();

 if (isset($_GET['id'])){

 

  $id_fact=intval($_GET['id']);
 

}else{

    while ($row=mysqli_fetch_object($listado)){
                        $id_fact=$row->id_fact;

                    }

}
    
 
 $datos_factura=$factura->single_record($id_fact);

 $idf=$datos_factura->id_fact;

 $id=$datos_factura->id_cli;
 
 $datos=$clientes->single_record_client($id);

 $detalle= new Database();

 if(isset($_POST) && !empty($_POST)){

          $id_fact = $_POST['id_fact'];
          $id_pro = $_POST['id_pro'];
          $cantidad_detfac = $_POST['cantidad_detfac'];
          $valor=$_POST['precio'];
          $valortotal_detfac = $valor*$cantidad_detfac;
          
          $res = $detalle->create_detail($id_fact, $id_pro, $cantidad_detfac, $valortotal_detfac);


          }
     

      

      ?>

 <hr>