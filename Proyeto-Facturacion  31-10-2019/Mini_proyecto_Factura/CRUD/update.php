<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
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

</head>
<body><br><br>
	<center><img src="MiFamiliaProtegida.png" width="500"></center>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
				$clientes= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$usuario = $clientes->sanitize($_POST['usuario']);
					$contra = $clientes->sanitize($_POST['contra']);
					$nombres = $clientes->sanitize($_POST['nombres']);
					$apellidos = $clientes->sanitize($_POST['apellidos']);
					$genero = $clientes->sanitize($_POST['genero']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);


					$id=intval($_POST['id']);
					$res = $clientes->update($usuario,$contra,$nombres,$apellidos,$genero,$direccion,$telefono,$correo_electronico, $id);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_cliente=$clientes->single_record($id);
			?>
			<div class="row">
				<form method="post">
				
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="usuario" id="usuario" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nom;?>">
					<input type="hidden" name="id" id="id" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->rowid;?>">
				</div>
				<div class="col-md-6">
					<label>Alias:</label>
					<input type="text" name="contra" id="contra" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->name_alias;?>">
				</div>
				<div class="col-md-6">
					<label>Facebook:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->facebook;?>">
				</div>
				<div class="col-md-6">
					<label>Whatsapp:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->whatsapp;?>">
				</div>
				<div class="col-md-6">
					<label>Zip:</label>
					<input type="text" name="genero" id="genero" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->zip;?>">
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required><?php echo $datos_cliente->address;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->phone;?>">
				</div>
				<div class="col-md-6">
					<label>Correo electrónico:</label>
					<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->email;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            