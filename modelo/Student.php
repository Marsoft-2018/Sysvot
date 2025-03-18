<?php
    class Student extends Conexion{
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
            $this->sql = "INSERT INTO students (id, grade, group, firstLastName, secondLastName, firstName, secondName, gender) VALUES (?,?,?,?,?,?,?,?)";
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

        function listar(){
            $this->sql = "SELECT * FROM students ORDER BY grade,`group`, firstLastName,secondLastName,firstName,secondName DESC";
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
             $this->sql = "SELECT  `id`, `grade`, `group`, `firstLastName`, `secondLastName`, `firstName`, `secondName`, `status`, `institucionId`, `gender`, `role`, `password`  FROM students WHERE id = '".$this->id."' ORDER BY grade,`group`, firstLastName,secondLastName,firstName,secondName DESC ";

             try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }

        }

        function eliminar(){
            $this->sql = "DELETE FROM students WHERE id= ?";
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
        
        function Actualizar(){
            
        }
        
        function fotoCandidato(){
            $this->sql = "SELECT FOTO FROM candidatos WHERE alumnos_id= '".$this->id."'";

            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
    }
?>