<?php
    abstract class Conexion{
        
        private $host = "localhost";
        /*
        private $bdt = "bdt_personeros";
        private $usuario= "root";
        private $password = "";

        */
        
        private $bdt = "sisvot_bd";
        private $usuario= "root";
        private $password = "";

        private $link;
        protected $Conexion;
        public function __construct(){
            $this->link  = "mysql:host=".$this->host;
            $this->link .= ";dbname=".$this->bdt;
            try{
                $this->Conexion = new PDO($this->link, $this->usuario, $this->password, array(
                    PDO::ATTR_PERSISTENT => true
                ));
                $this->Conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->Conexion->query("SET NAMES 'utf8';");
            }catch(PDOException $e){
                echo "error al tratar de conectarse: ".$e;
            }
            return $this->Conexion;
        }

        public function cerrarConexion(){
            $this->Conexion = null;
        }
    }
?>