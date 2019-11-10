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
      <button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form></center>
        
      <!--FORMULARIO REGISTRO-->
        <div class="registro-factura">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Informaci√≥n de  <b>Factura</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Registrar Cliente</a>
                    </div>
                </div>
            </div>
            
                      
                
				<?php 
                $buscar=$_POST['buscar'];
                
				include ('database.php');

				$clientes = new Database();
				$listado=$clientes->buscar_cedula($buscar);
				
				?>
                
				<?php 
					while ($row=mysqli_fetch_object($listado)){
					    $rowid=$row->id_cli;
					    $nombre=$row->nombre_cli;
					    $direccion=$row->direccion_cli;
					    $telefono=$row->telefono_cli;
					    $cedula=$row->cedula_cli;
					    $email=$row->email_cli;
				?>
					

            <div class="formulario-registro-factura">
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Cliente</p>
            <div class="row" >
				
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input value="<?php echo $nombre;?>" type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Direcci√≥n:</label>
					<input value="<?php echo $direccion;?>" type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Tel√©fono</label>
					<input value="<?php echo $telefono;?>" type="tel" size="10" pattern="[0-9]{10}" placeholder="Ej.: 0999999999" name="telefono" id="telefono" class='form-control' maxlength="100" required >
				</div>
				
				<div class="col-md-6">
					<label>Email:</label>
					<input value="<?php echo $email;?>" type="email" placeholder="Ej.: usuario@servidor.com" name="email" id="email" class='form-control' maxlength="100" required>
				</div>
				
				<div class="col-md-6">
					<label>Fecha:</label>
					
					<input class='form-control' type="date" name="fecha" placeholder="Fecha... ">
					
				</div>
			
				
				<?php
					}
				?>
            </form>
            
			</div>
			
			
			 <!--Busqueda de producto-->
			
			 
			<hr>
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Producto</p>
          <form method="post" >
          
           
           <div class="row">
           <form class="form-inline my-2 my-lg-0" method="POST" action="busquedaPro.php">
           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
					<label>Codigo:</label>
	
    			  <input class="form-control mr-sm-2"  name="buscarPro" id="buscarPro" >
   		
		</div>
		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
					<label>Cantidad:</label>
					<input type="number" name="cantidad" placeholder="Cantidad... " class='form-control' maxlength="100" required >
				</div>
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
				
					<button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
					
				</div>
				</form>
			</div>
			
			
            <br>
            <p style="position: relative; top: 10px; left:-280px; font-size:17px;">Detalles</p>
            
            <?php 
                
                $buscarPro=$_POST['buscarPro'];
				include ('databasePro.php');

				$producto = new Database1();
				
				$listadoPro=$producto->buscarPro($buscarPro);
				?>
            
            <?php 
					while ($row=mysqli_fetch_object($listadoPro)){
					    $rowid=$row->id_pro;
						$nombre=$row->nombre_pro;
						$codigo=$row->codigo_pro;
						$cantidad=$row->cantidad_pro;
						$precio=$row->precio_pro;

                        
				?>
            <div class="detalles">
               <table id="tablafactura">
               
                <tr>
                    <th><?php echo $rowid;?></th>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $codigo;?></td>
                        <td><?php echo $cantidad;?></td>
						<td><?php echo $precio;?></td>
                </tr>
                <tr>
                        <td>......</td>
                        <td></td>
                                          
						<td></td>
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
                 <?php
					}
				?>
            </div>
            <!--TOTALES-->
            FALTA LOS TOTALES
              
           </form>
            </div>  
            
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
                    <h5 style="text-align: center ; margin: 2px;">INGENIERÕA EN TECNOLOGÕAS DE LA INFORMACI”N</h5>
                    <h5 style="text-align: center; margin: 0px;">DESARROLLO WEB</h5>
                </div>
                <p>2019 &copy; FactuRappi. Todos los derechos reservados.</p>
            </div>
        </footer>

</body>
</html>                            