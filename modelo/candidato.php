<?php
    class Candidato extends Conexion{
        public $id;
        public $grade;
        public $group;
        public $firstLastName;
        public $secondLastName;
        public $firstName;
        public $secondName;
        public $status;
        public $institucionId;
        public $gender;
        public $role;
        public $password;

        public $sql;
        function agregar(){
            $this->sql = "INSERT INTO students (id,`grade`,`group`,`firstLastName`,`secondLastName`,`firstName`,`secondName`,`gender`) VALUES (?,?,?,?,?,?,?,?)";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->id);
                $stm->bindparam(2,$this->grade);
                $stm->bindparam(3,$this->group);
                $stm->bindparam(4,$this->firstLastName);
                $stm->bindparam(5,$this->secondLastName);
                $stm->bindparam(6,$this->firstName);
                $stm->bindparam(7,$this->secondName);
                $stm->bindparam(8,$this->gender);
                if ($stm->execute()) {
                   echo "Registro agregado con éxito";
                }
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function Guardar($datos){
            $cara;            
            //var_dump($datos); 
            foreach($datos as $valores){ 
             
                $this->sql = "INSERT INTO `candidatos` (`photo`, `id`) VALUES (?, '$valores');";
                try {
                    $stm = $this->Conexion->prepare($this->sql);
                    $stm->bindparam(1,$cara);
                    if ($stm->execute()) {
                        echo '<div class="alert alert-success alert-dismissable" style="margin:0 auto;margin-top:20px;width:50%;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Se agregó con éxito los registros de los candidatos.
                    </div>';
                    }
                    return $datos;
                } catch (Exception $e) {
                    echo "Error: ".$e;
                }   
            }
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

        function buscar(){
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

        function eliminar(){
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
        
        function elegibles(){
            $this->sql = "SELECT e.*,c.`id` AS candidatoId FROM students e LEFT JOIN candidatos c ON c.`studentId` = e.`id` WHERE grade='11' ORDER BY grade, `group`, firstLastName,secondLastName,firstName,secondName DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
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