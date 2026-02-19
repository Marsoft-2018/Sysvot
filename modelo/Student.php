<?php
    class Student extends Conexion{
        public $oldId;
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
        function add(){
            $this->sql = "INSERT INTO students (id, grade, `group`, firstLastName, secondLastName, firstName, secondName, gender) VALUES (?,?,?,?,?,?,?,?)";
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
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function list(){
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

        function load(){
             $this->sql = "SELECT  `id`, `grade`, `group`, `firstLastName`, `secondLastName`, `firstName`, `secondName`, `status`, `institucionId`, `gender`, `role`, `password`  FROM students WHERE id = ? ORDER BY grade,`group`, firstLastName,secondLastName,firstName,secondName DESC ";

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
        
        function update(){
            $this->sql = "UPDATE students SET id = ?, grade = ?, `group` = ?, firstLastName = ?, secondLastName = ?, firstName = ?, secondName = ?, gender=? WHERE id= ?";
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
                $stm->bindparam(9,$this->oldId);
                if ($stm->execute()) {
                   echo "Registro actualizado con éxito";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
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