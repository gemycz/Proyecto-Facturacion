
<?php
    session_start();



 
      

      ?>

 <hr>




        
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Factura</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">


    <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script type="text/javascript" src="js/componentes.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
 
 <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>
<body><br><br>
  
   <!--CABECERA-->
    <header id="cabecera" style="background: url(img/banner.png)">
        <img src="img/logo.png" width="600">
    </header>
    
       <!--MENU-->
        <nav id="menu">
            <ul>
              <li><a class="icon-home" href="index.php">Inicio</a></li>
              <!--<li><a href="#">Cliente</a></li>-->
              <li class="icon-user-add">Registro <i class="fas fa-angle-down"></i> 
                <ul>
                  <li><a class="icon-user" href="create.php">Cliente</a></li>
                  <li><a class="icon-shopping-bag" href="createPro.php">Producto</a></li>
                  <!--
                  <li><a href="#">texto</a></li>
                  <li><a href="#">texto</a></li>
                  -->
                </ul>
              </li>
              <!--
              <li>Blog <i class="fas fa-angle-down"></i> 
                <ul>
                  <li><a href="#">HTML</a> <span>22 Posts</span></li>
                  <li><a href="#">CSS</a> <span>16 Posts</span></li>
                  <li><a href="#">JavaScript</a> <span>10 Posts</span></li>
                  <li><a href="#">Python</a> <span>13 Posts</span></li>
                  <li><a href="#">PHP</a> <span>10 Posts</span></li>
                  <li><a href="#">Design</a> <span>21 Posts</span></li>
                </ul>
              </li>
              -->
              <li><a class="icon-doc-text-inv" href="factura.php">Factura</a></li>
               <li><a class="icon-doc-text-inv" href="listaCliente.php">Lista de clientes</a></li>
               <li><a class="icon-doc-text-inv" href="indexPro.php">Lista de Productos</a></li>
            </ul>
        </nav>
        
     <!--CONTENIDO-->
        <div id="contenido-factura" style="background: url(img/backgroundblue.png); background-repeat: no-repeat;">
        <div class="title-contenido">
        <h2>Factura</h2>
        </div>   
       
    <div class="container">
 <center> 

        
      <!--FORMULARIO REGISTRO-->
        <div class="registro-factura">
           
            
           
      <script type="text/javascript">
    $(function() {
            $("#cedula").autocomplete({
                source: "cargar_cliente.php",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
          $('#nombre').val(ui.item.nombre);
          $('#direccion').val(ui.item.direccion);
          $('#id_cliente').val(ui.item.id);
          $('#cedula').val(ui.item.cedula);
          $('#telefono').val(ui.item.telefono);
          $('#email').val(ui.item.email);
         
           }
            });
    });
</script>           

      <script type="text/javascript">
    $(function() {
            $("#codigo_producto").autocomplete({
                source: "cargar_producto.php",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
          $('#codigo_producto').val(ui.item.codigo_pro);
          $('#nombre_producto').val(ui.item.nombre_pro);
          $('#precio').val(ui.item.precio);
          $('#stock').val(ui.item.cantidad_pro);
          $('#id_producto').val(ui.item.id_pro);
          
           }
            });
    });

</script>
   <script type="text/javascript">
    $(function() {
            $("#id_factura").autocomplete({
                source: "cargar_factura.php",
                minLength: 0,
                select: function(event, ui) {
          event.preventDefault();
          $('#id_factura').val(ui.item.id);
        
          
           }
            });
    });

</script>

                 
          

       
  <hr>

    <form method="post" action="detalle.php">
             
       
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Producto</p>
          
           <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <label>Id Factura:</label>
                    <input  type="text" name="id_factura" id="id_factura" class='form-control' maxlength="100" required >
                </div>
           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <label>Còdigo:</label>
                    <input  type="text" name="codigo_producto" id="codigo_producto" class='form-control' maxlength="100" required >
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad... " class='form-control' maxlength="100" required >
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <label>Nombre:</label>
                    <input type="text" name="nombre_producto" id="nombre_producto"  placeholder="Cantidad... " class='form-control' maxlength="100" required >
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <label>Precio:</label>
                    <input type="number" name="precio" id="precio"  placeholder="precio... " class='form-control' maxlength="100" required >
                </div>
             <input type="hidden" name="id_producto" id="id_producto" >
               <input type="hidden" name="stock" id="stock" ><br>
         
                
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                
                    <button type="submit" id="boton" class="btn btn-success" onclick="validar()" >Ingresar</button>
                </div>
            </div>
                </form>
 
<?php
include ("database.php");
$detalle= new Database();
       
$factura = new Database();

 if(isset($_POST) && !empty($_POST)){

          $id_fac = $_POST['id_factura'];
          $id_pro = $_POST['id_producto'];
          $cantidad_detfac = $_POST['cantidad'];
          $valor=$_POST['precio'];

          $valortotal_detfac = $valor*$cantidad_detfac;
          
          $res = $detalle->create_detail($id_pro, $id_fac, $cantidad_detfac, $valortotal_detfac, $valor);


?>
   

            <div class="row" style="background: white;">
              <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Detalles</p>

               <div class="detalles">
              <table class="table table-bordered " id="dataTable">
                <thead class="table-dark">
                    <tr>
                         <th>Id_fact</th>
                        <th>Codigo</th>
                     
                        <th>Total</th>
                        <th style="width: 10%;">Acciones</th>
                    </tr>
                </thead>
                <?php 
             
                $productos = new Database();

                $listado=$productos->read_detalle($id_fac);


                ?>
                <tbody>
                <?php 

$suma_cantidad=0;
$subtotal=0;
$iva=0.12;
                    while ($row=mysqli_fetch_object($listado)){
                
                        $id_detfac=$row->ID_DETFACT;
                        $id_fact=$row->ID_FAC;
                        $id_pro=$row->ID_PRO;
                        $cant_detfac=$row->CANT_DETFACT;
                        $precio_det=$row->PRECIO_DETFACT;
                        $valortotal_detfac=$row->VALORTOTAL_DETFACT;

                      

                        $suma_cantidad= $suma_cantidad+$cant_detfac;
                        $subtotal= $subtotal+$valortotal_detfac;
                       
                        
                ?>
                    <tr>
                       
                         <td><?php echo $id_fact;?></td>
                       
                        <td><?php echo $cant_detfac;?></td>
                        <td><?php echo $valortotal_detfac;?></td>
                   
                        <td>

                <a href="delete_detail.php?id=<?php echo $id_detfac;?>&id_fact=<?php echo $id_fact;?>" class="delete" title="Eliminar" data-toggle="tooltip" style="color: #BD3B3B ;">
                <i class="fas fa-fw fa-trash" ></i>Eliminar</a>

              
                        </td>
                    </tr>   
                <?php
                    }

                    $valor_iva=$subtotal*$iva;
                    $total=$subtotal+$valor_iva;


                     $res = $factura->actualizar_factura($id_fact,$subtotal,$valor_iva, $total);

          


                ?>
                    
                    
                          
                </tbody>


               
      
      </table>

      <?php
      echo "SUBTOTAL: ".$subtotal;
      echo "<br>VALOR_IVA: ".$valor_iva;
      echo "<br>TOTAL: ".$total;
      }

      ?>
            </div>
            </div>
            
            
           
            <!--TOTALES-->
            FALTA LOS TOTALES
            
        </div>
        </div>
                   
    
        </div>
    </div>
    </div>
 </div>
  </div>
<!--PIE DE PAGINA-->
        <footer>
            <div class="footer1">
                <div id="Joshua">
                    <h4>Joshua Ramirez</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
                <div id="Gema">
                    <h4>Gema Castillo</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
                <div id="Angie">
                    <h4>Angie Moyota</h4>
                    <p style="margin: 0px; text-align: center">Contactos</p>
                    <!--<hr style="margin: 0px; padding: 0px; border-top: 0.5px dashed">-->
                    <div class="social">
                    <a class="icon-facebook-official"></a>
                    <a class="icon-instagram"></a>
                    <a class="icon-youtube-play"></a>
                    <a class="icon-mail-alt"></a>
                    </div>
                </div>
               
            </div>
            <div class="footer2">
             <div id="UFAESPE">
                    <h4 style="text-align: center">UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE</h4>
                    <h5 style="text-align: center ; margin: 2px;">INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>

</body>
</html>                            