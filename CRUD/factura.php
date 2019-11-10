<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    
    header('Location: http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php');//redirige a la p脙隆gina de login si el usuario quiere ingresar sin iniciar sesion
    
    
    exit;
}

$now = time();

if($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: http://localhost/Proyeto-Facturacion/CRUD/login_php/login.php');//redirige a la p脙隆gina de login, modifica la url a tu conveniencia
    echo "Tu sesion a expirado,
<a href='login.php'>Inicia Sesion</a>";
    exit;
}
?>

<?php 
  //empty si no existe
include "conexion.php";
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
 <center> <form class="form-inline my-2 my-lg-0" method="POST" action="busqueda.php">
    	  	Ingrese el numero de Cedula:
      <input class="form-control mr-sm-2" type="search" name="buscar" id="buscar" placeholder="Search" aria-label="Search">
      <button  class="btn btn-success" type="submit">Buscar</button>
    </form></center>
        
      <!--FORMULARIO REGISTRO-->
        <div class="registro-factura">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Informaci贸n de  <b>Factura</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Registrar Cliente</a>
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
          <label>Cedula:</label>
          <input type="text" name="cedula" id="cedula" placeholder="Cedula... " class='form-control' maxlength="100" required >
        </div>
				<div class="col-md-6">
					<label>Direcci贸n:</label>
					<input  type="text" name="direccion" id="direccion" placeholder="Direcci贸n... " class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Tel茅fono</label>
					<input  type="tel" size="10" pattern="[0-9]{10}" placeholder="Ej.: 0999999999" name="telefono" id="telefono" class='form-control' maxlength="100" required >
				</div>
				
				<div class="col-md-6">
					<label>Email:</label>
					<input  type="email" placeholder="Ej.: usuario@servidor.com" name="email" id="email" class='form-control' maxlength="100" required>
				</div>
				
				<div class="col-md-6">
					<label>Fecha:</label>
					
					<input class='form-control' type="date" name="fecha" placeholder="Fecha... ">
					
				</div>
			
				
				
			</div>

			<hr>
			 
             <?php 
                 $query_pro = mysqli_query($conn,"SELECT id_pro, codigo_pro, cantidad_pro FROM producto");
                 $result_pro = mysqli_num_rows($query_pro);
            ?>
             <select name="producto" id="producto"> 
            <?php 
            if($result_pro > 0){
                   
                 while($pro = mysqli_fetch_array($query_pro)){
                     

                     
                     ?>
                    
                     <option value="<?php echo $pro["id_pro"]; ?>"><?php echo $pro["codigo_pro"]; ?></option>
                <?php 
                   }
                ?>
                 
                   <input type="text" name="cantidad" id="cantidad" value="<?php echo $pro["cantidad_pro"]; ?>">
                <?php 
                 }
                 ?>
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Producto</p>
            Id: <input type="text" name="id_producto" id="id_producto" >
              Stock: <input type="text" name="stock" id="stock" ><br>
            Nombre: <input type="text" name="nombre_producto" id="nombre_producto" >
             Precio: <input type="text" name="precio" id="precio" >
           <div class="row">
           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
					<label>C騞igo:</label>
					<input  type="text" name="codigo_producto" id="codigo_producto" class='form-control' maxlength="100" required >
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
					<label>Cantidad:</label>
					<input type="number" name="cantidad" placeholder="Cantidad... " class='form-control' maxlength="100" required >
				</div>
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
				
					<button type="submit" id="boton" class="btn btn-success" onclick="validar()" >Ingresar</button>
				</div>
			</div>
				</form>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="row" style="background: white;">
              <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Detalles</p>

               <div class="detalles">
               <table id="tablafactura">
               
                <tr>
                    <th>Cantidad</th>
                    <th>Decripci贸n</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                <tr>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>
                    <td>......</td>

                </tr>
                </table>
            </div>
            </div>
            
            
           
            <!--TOTALES-->
            FALTA LOS TOTALES
            
        </div>
        </div>
                   
                   

                          
               
            </table>
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
                    <h5 style="text-align: center ; margin: 2px;">INGENIER虯 EN TECNOLOG虯S DE LA INFORMACI覰</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>

</body>
</html>                            