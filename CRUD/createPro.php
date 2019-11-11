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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script type="text/javascript" src="js/componentes.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
 

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
               <li><a class="icon-doc-text-inv" href="ListaCliente.php">Lista de clientes</a></li>
               <li><a class="icon-doc-text-inv" href="indexPro.php">Lista de Productos</a></li>
            </ul>
        </nav>
  
  <div id="contenido" style="background: url(img/backgroundblue.png)">
        <div class="title-contenido">
        <h2>Registrar Producto</h2>
        </div>
	

    <div class="container">
        <div class="registro-cliente">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar<b>Producto</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
            //$usuario,$nombres,$apellidos,$genero,$direccion,$telefono,$correo_electronico, $id
				include ("database.php");
				$producto= new Database();

				if(isset($_POST) && !empty($_POST)){
				    $nomPro = $producto->sanitize($_POST['nomPro']);
					$codigo = $producto->sanitize($_POST['codigo']);
					$cantidad = $producto->sanitize($_POST['cantidad']);
					$precio = $producto->sanitize($_POST['precio']);
							
					
					
					//consulta de la variable quuery
					if($producto->buscarPro($codigo) == 1){
					    $message="El producto ya existe.";
					    $class="alert alert-danger";
					    
					}else{
					    //registro de los datos
					    $res = $producto->createPro($nomPro,$codigo,$cantidad,$precio);
					    if($res){
					        $message= "Datos insertados con éxito";
					        $class="alert alert-success";
					    }else{
					        $message="No se pudieron insertar los datos";
					        $class="alert alert-danger";
					    }
					}
				
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres Producto:</label>
					<input type="text" name="nomPro" id="nomPro" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Codigo:</label>
					<input type="text" name="codigo" id="codigo" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Cantidad:</label>
					<input type="text" name="cantidad" id="cantidad" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Precio:</label>
					<input type="text" name="precio" id="precio" class='form-control' maxlength="100" required>
				</div>
			
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar Producto</button>
				</div>
				</form>
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