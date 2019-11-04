<html>
    <head>
        <meta charset="UTF-8">
        <title>Cliente  - FactuRappi</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script type="text/javascript" src="js/componentes.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    </head>
    <body> 
      <!--CABECERA-->
    <header id="cabecera" style="background: url(img/banner.png)">
        <img src="img/logo.png" width="600">
    </header>
       <!--MENU-->
        <nav id="menu">
            <ul>
              <li><a class="icon-home" href="index.html">Inicio</a></li>
              <!--<li><a href="#">Cliente</a></li>-->
              <li class="icon-user-add">Registro <i class="fas fa-angle-down"></i> 
                <ul>
                  <li><a class="icon-user" href="cliente.php">Cliente</a></li>
                  <li><a class="icon-shopping-bag" href="producto.php">Producto</a></li>
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
            </ul>
        </nav>
        <!--CONTENIDO-->
        <div id="contenido" style="background: url(img/backgroundblue.png)">
        <div class="title-contenido">
        <h2>Registrar Cliente</h2>
        </div><br><br>
        <!--FORMULARIO REGISTRO-->
        <div class="registro-cliente">
            <h5>Datos Cliente</h5>
            <div class="formulario-registro-cliente">
              
               <form action="#" method="post">
               
                <p>Nombre: </p><br>
                <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
                <br>
                <p>DirecciÃ³n: </p><br>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required >
                <br>
                <p>TelÃ©fono: </p><br>
					<input type="tel" size="10" pattern="[0-9]{10}" placeholder="Ej.: 0999999999" name="telefono" id="telefono" class='form-control' maxlength="100" required >
                <br>
                <p>CÃ©dula: </p><br>
					<input type="text" name="cedula" size="10" id="cedula" pattern="[0-9]{10}" class='form-control' maxlength="100" required>
					<div id="mensaje"></div>
					 <script src="../CRUD/js/validar_cedula.js" type="text/javascript">
                      
                	 </script>                <br>
                <p>Email: </p><br>
					<input type="email" placeholder="Ej.: usuario@servidor.com" name="email" id="email" class='form-control' maxlength="100" required>
                <br>
					<button type="submit" id="boton" class="btn btn-success" onclick="validar()" >Guardar datos</button>
                
               </form>
            </div>     
        </div>
        </div>
        
        
        
        <?php
            
				include ("../CRUD/database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$nombre = $clientes->sanitize($_POST['nombre']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$cedula = $clientes->sanitize($_POST['cedula']);
					$email = $clientes->sanitize($_POST['email']);
					
					
					$res = $clientes->create($nombre,$direccion,$telefono,$cedula,$email);
					if($res){
						$message= "Datos insertados con Ã©xito";
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
				}
	
			?>
    
        
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
                <div id="UFAESPE">
                    <h4 style="text-align: center">UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE</h4>
                    <h5 style="text-align: center ; margin: 2px;">INGENIERÃ�A EN TECNOLOGÃ�AS DE LA INFORMACIÃ“N</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
            </div>
            <div class="footer2">
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>
    </body>
</html>