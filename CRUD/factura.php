<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    
    header('Location: http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php');//redirige a la pÃ¡gina de login si el usuario quiere ingresar sin iniciar sesion
    
    
    exit;
}

$now = time();

if($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php');//redirige a la pÃ¡gina de login, modifica la url a tu conveniencia
    echo "Tu sesion a expirado,
<a href='login.php'>Inicia Sesion</a>";
    exit;
}
?>

<?php 
  //empty si no existe

 include ("database.php");
 

  $factura= new Database();

  if(isset($_POST) && !empty($_POST)){

          $id_cli =$_POST['id_cliente'];
          $subtotal_fac = 0;
          $iva_fac = 0;
          $total_fac = 0;
          $fecha_fac= $_POST['fecha_fac'];
          
          
          $res = $factura->crear_factura($id_cli, $subtotal_fac,  $iva_fac,  $total_fac, $fecha_fac);
        


              if($res){
                  $message= "Datos insertados con Exito";
                  $class="alert alert-success";

              }else{
                  $message="No se pudieron insertar los datos";
                  $class="alert alert-danger";
              }
          
        
          ?>
        <div class="<?php echo $class?>">
          <?php echo $message;?>
        </div>  
          <?php
          header("location:detalle.php");
        }
  
      ?>

        
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
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Información de  <b>Factura</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Registrar Cliente</a>
                    </div>
                </div>
            </div>
            
           
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
                minLength: 1,
                select: function(event, ui) {
          event.preventDefault();
          $('#id_factura').val(ui.item.id);
        
          
           }
            });
    });

</script>

            		 
          Ingrese el numero de Cedula:
      <input class="form-control mr-sm-2" type="search" name="cedula" id="cedula" placeholder="Search" aria-label="Search">
     
   

            <div class="formulario-registro-factura">
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Cliente</p>
            <div class="row" >

				
				<form method="post">
          <div class="col-md-6">
        <label>Id Cliente:</label>
          <input type="text" name="id_cliente" id="id_cliente" placeholder="Id... " class='form-control' maxlength="100" required >
        </div>
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" placeholder="Nombre... " class='form-control' maxlength="100" required >
				</div>
       
				<div class="col-md-6">
					<label>Dirección:</label>
					<input  type="text" name="direccion" id="direccion" placeholder="Dirección... " class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Teléfono</label>
					<input  type="tel" size="10" pattern="[0-9]{10}" placeholder="Ej.: 0999999999" name="telefono" id="telefono" class='form-control' maxlength="100" required >
				</div>
				
				<div class="col-md-6">
					<label>Email:</label>
					<input  type="email" placeholder="Ej.: usuario@servidor.com" name="email" id="email" class='form-control' maxlength="100" required>
				</div>
				
				<div class="col-md-6">
					<label>Fecha:</label>
					
					<input class='form-control' type="text" name="fecha_fac" placeholder="Fecha... " value="<?php echo date("Y-m-d");?>">
					
				</div>
			
				
				
			</div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
        
          <button type="submit" id="boton_factura" class="btn btn-success"  >Crear Factura</button>
        </div>

		

    </form>
  <hr>

    

   

            <div class="row" style="background: white;">
              <p style="position: relative; top: 10px; left:-280px; font-size:17px;">FACTURAS</p>

               <div class="detalles">
               <table class="table table-bordered " id="dataTable">
                <thead class="table-dark">
                    <tr>
                        
                 
                        <th>Id_factura</th>
                        <th>Id_cliente</th>
                 
                        <th>Subtotal</th>
                         <th>IVA</th>
                        <th>Total</th>
                         <th>Fecha</th>
                        <th style="width: 10%;">Acciones</th>
                    </tr>
                </thead>
                <?php 
             
 
                $tabla = new Database();
                $listado=$tabla->read_factura();

                ?>
                <tbody>
                <?php 


                    while ($row=mysqli_fetch_object($listado)){
                
                      
                        $id_fact=$row->ID_FAC;
                        $id_cli=$row->ID_CLI;
                        $subtotal_fac=$row->SUBTOTAL_FAC;
                        $iva_fac=$row->IVA_FAC;
                        $total_fac=$row->TOTAL_TAC;
                        $fecha_fac=$row->fecha_fac;

                     
                        
                ?>
                    <tr>
                       
                      <td><?php echo $id_fact;?></td>
                      <td><?php echo $id_cli;?></td>
                      <td><?php echo $subtotal_fac;?></td>
                    
                        <td><?php echo $iva_fac;?></td>
                        <td><?php echo $total_fac;?></td>
                        <td><?php echo $fecha_fac;?></td>
                    <td>

                <a href="" class="delete" title="Eliminar" data-toggle="tooltip" style="color: #BD3B3B ;">
                <i class="fas fa-fw fa-trash" ></i>Eliminar</a>

              
                        </td>
                    </tr>   
            
              <?php
                    }

     

                ?>
                    
                          
                </tbody>

               
      
      </table>

   
            </div>
            </div>
            
       
           
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
                    <h5 style="text-align: center ; margin: 2px;">INGENIER�A EN TECNOLOG�AS DE LA INFORMACI�N</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>

</body>
</html>                            