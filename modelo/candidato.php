<?php
    class Candidato extends Conexion{
        public $id;
        public $numero;
        public $photo;
        public $studentId;
        public $color;
        public $partido;
        public $type;

        public $sql;
        function add(){
            $this->sql = "INSERT INTO candidatos(numero, photo, studentId, color, partido, `type`)  VALUES (?,?,?,?,?,?)";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->numero);
                $stm->bindparam(2,$this->photo);
                $stm->bindparam(3,$this->studentId);
                $stm->bindparam(4,$this->color);
                $stm->bindparam(5,$this->partido);
                $stm->bindparam(6,$this->type);
                if ($stm->execute()) {
                   echo "Registro agregado con éxito";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function addPhoto($datos){
            
        }//ok

        function listarPersoneros(){
            $this->sql = "SELECT ca.Id,ca.numero,al.firstName,al.secondName,al.firstLastName,al.secondLastName,ca.photo,ca.id,ca.color,ca.partido FROM students al INNER JOIN candidatos ca ON al.id = ca.studentId where ca.type = 'Personero'";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        function listarContralores(){
            $this->sql = "SELECT ca.Id,ca.numero,al.firstName,al.secondName,al.firstLastName,al.secondLastName,ca.photo,ca.id,ca.color,ca.partido FROM students al INNER JOIN candidatos ca ON al.id = ca.studentId where ca.type = 'Contralor'";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function load(){
            $this->sql ="SELECT * FROM students WHERE id = ? ORDER BY grade, group, firstLastName, secondLastName, firstName, secondName DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->id);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function delete(){
            $this->sql = "DELETE FROM candidatos WHERE id= ?";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->id);
                if ($stm->execute()) {
                   echo "Registro eliminado con éxito";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        public function contar(){
            $total = 0;
            $this->sql = "SELECT COUNT(ca.id) AS total FROM candidatos ca";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach ($datos as $value) {
                   $total = $value['total'];
                }
                return $total;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function elegibles($candidateType){
            $grade = 11;
            if($candidateType == 2){
                $grade = 10;
            }
            $this->sql = "SELECT e.*,c.`id` AS candidatoId FROM students e LEFT JOIN candidatos c ON c.`studentId` = e.`id` WHERE grade= ? ORDER BY grade, `group`, firstLastName,secondLastName,firstName,secondName DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$grade);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function seleccionar(){

        }
        
    }
?>