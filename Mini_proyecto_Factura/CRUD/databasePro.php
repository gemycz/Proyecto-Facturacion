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
    public function create($nomPro,$codigo,$cantidad,$precio){
        $sql = "INSERT INTO `producto` (nombre_pro, codigo_pro, cantidad_pro, precio_pro ) VALUES ('$nomPro','$codigo', '$cantidad', '$precio')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function read(){
        $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    public function read2($buscar){
        $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto where codigo_pro ='$buscar'";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }
    
    
    public function single_record($id){
        $sql = "SELECT id_pro, nombre_pro, codigo_pro, cantidad_pro, precio_pro FROM producto where id_pro ='$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res );
        return $return ;
    }
    
    public function update($nomPro,$codigo,$cantidad,$precio,$id){
        $sql = "UPDATE producto SET nombre_pro ='$nomPro', codigo_pro ='$codigo', cantidad_pro ='$cantidad',precio_pro ='$precio' WHERE id_pro = $id";
        $res = mysqli_query($this->con, $sql); 
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){
        $sql = "DELETE FROM producto WHERE id_pro =$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
}
?>