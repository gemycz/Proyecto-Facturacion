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
		private $dbpass="";
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
		
		public function validar($cedula){
		    $sql = "SELECT id_cli, nombre_cli, direccion_cli, telefono_cli, cedula_cli, email_cli FROM cliente where cedula_cli ='$cedula'  ";
		    $res = mysqli_query($this->con, $sql);
		    
		    if(mysqli_num_rows($res)>0){
		        return 1;
		    } else {
		        return 0;
		    }
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
		
		
		public function createPro($nomPro,$codigo,$cantidad,$precio){
		    $sql = "INSERT INTO `producto` (nombre_pro, codigo_pro, cantidad_pro, precio_pro ) VALUES ('$nomPro','$codigo', '$cantidad', '$precio')";
		    $res = mysqli_query($this->con, $sql);
		    if($res){
		        return true;
		    }else{
		        return false;
		    }
		}
		public function readPro(){
		    $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto";
		    $res = mysqli_query($this->con, $sql);
		    return $res;
		}

		public function read2Pro($buscar){
		    $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto where codigo_pro ='$buscar'";
		    $res = mysqli_query($this->con, $sql);
		    return $res;
		}
		
		public function buscarPro($codigo){
		    $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto where codigo_pro ='$codigo'";
		    $res = mysqli_query($this->con, $sql);
		    if(mysqli_num_rows($res)>0){
		        return 1;
		    } else {
		        return 0;
		    }
		}
		
		public function single_recordPro($id){
		    $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto where id_pro ='$id";
		    $res = mysqli_query($this->con, $sql);
		    $return = mysqli_fetch_object($res );
		    return $return ;
		}
		public function single_recordPro2($id){
		    $sql = "SELECT `ID_PRO`, `NOMBRE_PRO`, `CODIGO_PRO`, `CANTIDAD_PRO`, `PRECIO_PRO` FROM producto where ID_PRO ='$id";
		    $res = mysqli_query($this->con, $sql);
		    $return = mysqli_fetch_object($res );
		    return $return ;
		}
		public function updatePro($nomPro,$codigo,$cantidad,$precio,$id){
		    $sql = "UPDATE producto SET nombre_pro ='$nomPro', codigo_pro ='$codigo', cantidad_pro ='$cantidad',precio_pro ='$precio' WHERE id_pro = $id";
		    $res = mysqli_query($this->con, $sql);
		    if($res){
		        return true;
		    }else{
		        return false;
		    }
		}
		public function deletePro($id){
		    $sql = "DELETE FROM producto WHERE id_pro =$id";
		    $res = mysqli_query($this->con, $sql);
		    if($res){
		        return true;
		    }else{
		        return false;
		    }
	}
	public function delete_detail($id){
	    $sql = "DELETE FROM detalle_factura WHERE id_detfact=$id";
	    $res = mysqli_query($this->con, $sql);
	    if($res){
	        return true;
	    }else{
	        return false;
	    }
	}
	public function delete_factura($id){
	    $sql = "DELETE FROM factura WHERE id_fac=$id";
	    $res = mysqli_query($this->con, $sql);
	    if($res){
	        return true;
	    }else{
	        return false;
	    }
	}
	
	public function read_detail(){
	    $sql = "SELECT  id_fac,id_pro,id_detfact, cant_detfact, valortotal_detfact, precio_detfact FROM detalle_factura";
	    $res = mysqli_query($this->con, $sql);
	    return $res;
	}
	
	public function read_factura(){
	    $sql = "SELECT `ID_FAC`, `ID_CLI`, `SUBTOTAL_FAC`, `IVA_FAC`, `TOTAL_TAC`, `fecha_fac` FROM factura";
	    $res = mysqli_query($this->con, $sql);
	    return $res;
	}
	
	public function create_detail( $id_pro, $id_fact, $cantidad_detfact, $valortotal_detfac, $precio_detfact){
	    $sql = "INSERT INTO `detalle_factura`( `ID_PRO`, `ID_FAC`, `CANT_DETFACT`, `VALORTOTAL_DETFACT`, `PRECIO_DETFACT`)  VALUES ('$id_pro','$id_fact','$cantidad_detfact','$valortotal_detfac','$precio_detfact');";
	    $res = mysqli_query($this->con, $sql);
	    if($res){
	        return true;
	    }else{
	        return false;
	    }
	}
	
	public function read_fact($id_fac){
	    $sql = "SELECT ID_FAC,ID_CLI,SUBTOTAL_FAC, IVA_FAC,TOTAL_FAC,FECHA_FAC FROM factura WHERE ID_FAC=$id_fac";
	    $res = mysqli_query($this->con, $sql);
	    return $res;
	}
	
	public function read_detalle($id_fac){
	    $sql = "SELECT `ID_DETFACT`, `ID_PRO`, `ID_FAC`, `CANT_DETFACT`, `VALORTOTAL_DETFACT`, `PRECIO_DETFACT`  FROM detalle_factura WHERE ID_FAC=$id_fac";
	    $res = mysqli_query($this->con, $sql);
	    return $res;
	}
	
	public function crear_factura($id_cli,$subtotal_fac,	$iva_fac,	$total_fac,	$fecha_fac){
	    $sql = "INSERT INTO `factura` (`ID_CLI`, `SUBTOTAL_FAC`, `IVA_FAC`, `TOTAL_TAC`, `fecha_fac`) VALUES ('$id_cli','$subtotal_fac','$iva_fac','$total_fac','$fecha_fac');";
	    $res = mysqli_query($this->con, $sql);
	    if($res){
	        return true;
	    }else{
	        return false;
	    }
	}
	
	

	public function obtener_fact(){
	    
	    $sql = "SELECT MAX(id_fac) as id_fac FROM factura";
	    $res = mysqli_query($this->con, $sql);
	    return $res;
	}

		public function actualizar_factura($id_fact,$subtotal_fac,$iva_fac, $total_fac){
			$sql= "UPDATE `factura` SET `SUBTOTAL_FAC`='$subtotal_fac',`IVA_FAC`='$iva_fac',`TOTAL_TAC`='$total_fac' WHERE ID_FAC=$id_fact";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	
	
	
	
}
	
?>	

