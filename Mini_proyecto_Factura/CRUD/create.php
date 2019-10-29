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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
            //$usuario,$nombres,$apellidos,$genero,$direccion,$telefono,$correo_electronico, $id
				include ("database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$nombre = $clientes->sanitize($_POST['nombre']);
					$alias = $clientes->sanitize($_POST['alias']);
					$face = $clientes->sanitize($_POST['face']);
					$whats = $clientes->sanitize($_POST['whats']);
					$zip = $clientes->sanitize($_POST['zip']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
					
					$res = $clientes->create($nombre, $alias,$face,$whats,$zip,$direccion,$telefono,$correo_electronico);
					if($res){
						$message= "Datos insertados con éxito";
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
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Alias:</label>
					<input type="text" name="alias" id="alias" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Facebook:</label>
					<input type="text" name="face" id="face" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Whatsapp:</label>
					<input type="text" name="whats" id="whats" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Zip:</label>
					<input type="text" name="zip" id="zip" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label>Correo electrónico:</label>
					<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64" required>
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            