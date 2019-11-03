<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="toor2019gc";
		private $dbname="factura";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($nombre,$direccion,$telefono,$cedula,$email){
			$sql = "INSERT INTO `cliente` (nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli) VALUES ('$nombre','$direccion', '$telefono', '$cedula', '$email')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT id_cli, nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli FROM cliente";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function read2($buscar){
			$sql = "SELECT id_cli, nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli FROM cliente where nombre_cli ='$buscar'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function buscar_cedula($cedula){
		    $sql = "SELECT id_cli, nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli FROM cliente where cedula_cli ='$cedula'";
		    $res = mysqli_query($this->con, $sql);
		    return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT id_cli, nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli FROM cliente where id_cli ='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		
		
		
		
		public function update($nombre,$direccion,$telefono,$cedula,$email, $id){
			$sql = "UPDATE cliente SET nombre_cli ='$nombre', direccion_cli ='$direccion', telefono_cli ='$telefono', cedula_cli ='$cedula', email_cli ='$email' WHERE id_cli = $id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM cliente WHERE id_cli=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

