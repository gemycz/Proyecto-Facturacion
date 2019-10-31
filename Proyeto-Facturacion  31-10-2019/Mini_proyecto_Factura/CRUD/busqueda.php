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
	<center><img src="MiFamiliaProtegida.png" width="500"></center>

	

    <div class="container">

        <div class="table-wrapper " style="width: 100%;">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Información de  <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered " >
                <thead>
                    <?php
                   
                    ?>

                    <tr>
                         <th style="width: 3%;">Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                         <th style="width: 9%;">Teléfono</th>
                        <th>Cedula</th>
                        <th >E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
				<?php 
                $buscar=$_POST['buscar'];
				include ('database.php');

				$clientes = new Database();
				$listado=$clientes->buscar_cedula($buscar);
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
					    $rowid=$row->id_cli;
					    $nombre=$row->nombre_cli;
					    $direccion=$row->direccion_cli;
					    $telefono=$row->telefono_cli;
					    $cedula=$row->cedula_cli;
					    $email=$row->email_cli;
				?>
					<tr>
                        <th><?php echo $rowid;?></th>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $cedula;?></td>
                        <td><?php echo $email;?></td>
                   
                        <td>
						    <a href="update.php?id=<?php echo $rowid;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $rowid;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
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