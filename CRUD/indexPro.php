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

</head>
<body><br><br>
	

    <div class="container">
<br><br>
    	 <center> <form class="form-inline my-2 my-lg-0" method="POST" action="busqueda.php">
    	  	Producto:
      <input class="form-control mr-sm-2" type="search" name="buscar" id="buscar" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Agregar</button>
    </form></center>
        <div class="table-wrapper " style="width: 100%;">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b> Producto</b></h2></div>
                    <div class="col-sm-4">
                        <a href="createPro.php" class="btn btn-primary add-new"><i class="fa fa-plus"></i> Agregar Producto</a>
                    </div>

                </div>
            </div>
            <table class="table table-bordered " >
                <thead>

                    <tr>
                      <center>
                         <th style="width: 6%;">ID</th>
                         <th style="width: 8%;">Cant</th>
                         <th >Codigo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Precio Total</th>
                        </center>
                    </tr>
                </thead>
                
				<?php 
				include ('databasePro.php');
				$producto = new Database();
				$listado=$producto->read();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
					    $rowid=$row->id_pro;
						$nombre=$row->nombre_pro;
						$codigo=$row->codigo_pro;
						$cantidad=$row->cantidad_pro;
						$precio=$row->precio_pro;

                        
				?>
					<tr>
					   <th><?php echo $rowid;?></th>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $codigo;?></td>
                        <td><?php echo $cantidad;?></td>
						<td><?php echo $precio;?></td>
                    </tr>
                    <?php
					}
				?>
                    	    
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>  