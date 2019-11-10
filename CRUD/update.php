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
<title>Modificar Datos</title>
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
				    $nombre = $clientes->sanitize($_POST['nombre']);
				    $direccion = $clientes->sanitize($_POST['direccion']);
				    $telefono = $clientes->sanitize($_POST['telefono']);
				    $cedula = $clientes->sanitize($_POST['cedula']);
				    $email = $clientes->sanitize($_POST['email']);
				    

					$id=intval($_POST['id']);
					$res = $clientes->create($nombre,$direccion,$telefono,$cedula,$email,$id);
					if($res){
						$message= "Datos actualizados con Ã©xito";
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
			<div class="row" >
				
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Dirección:</label>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="tel" size="10" pattern="[0-9]{10}" placeholder="Ej.: 0999999999" name="telefono" id="telefono" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
				
					<label>Cédula:</label>
					<input type="text" name="cedula" size="10" id="cedula" pattern="[0-9]{10}" class='form-control' maxlength="100" required>
					<div id="mensaje"></div>
					 <script src="js/validar_cedula.js" type="text/javascript">
                      
                	 </script>
					
					
				</div>
				<div class="col-md-6">
					<label>Email:</label>
					<input type="email" placeholder="Ej.: usuario@servidor.com" name="email" id="email" class='form-control' maxlength="100" required>
				</div>
			
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" id="boton" class="btn btn-success" onclick="validar()" >Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            