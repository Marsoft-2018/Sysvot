<?php
    class Voto extends Conexion{
        public $id;
        public $codEstudiante;
        public $candidato;
        public $estado;
        public $tipo;
        public $anho;

        private $sql;

        function agregar(){
            $this->anho = date("Y");
            $this->sql = "INSERT INTO registrovotos (idEstudiante,Numero, Anio,`type`) VALUES (?,?,?,?)";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->codEstudiante);
                $stm->bindparam(2,$this->candidato);
                $stm->bindparam(3,$this->anho);
                $stm->bindparam(4,$this->tipo);
                if ($stm->execute()) {
                    $sql2 = "UPDATE students SET status='Ya Voto' WHERE id = ?";
                    $stm2 = $this->Conexion->prepare($sql2);
                    $stm2->bindparam(1,$this->codEstudiante);
                    $stm2->execute();
                    //echo "Voto registrado con éxito";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function contar(){
            $this->sql = "SELECT vt.Numero AS id, COUNT(vt.Numero) AS 'Votos' FROM registrovotos vt WHERE vt.Numero = ? GROUP BY vt.`Numero` ORDER BY 'Votos' DESC";
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
        
        function totalVotos(){
            $this->sql = "SELECT vt.Numero AS id, COUNT(vt.Numero) AS 'Votos' FROM registrovotos vt GROUP BY vt.`Numero` ORDER BY 'Votos' DESC";
            try {
                $totalVotos = 0;
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach($datos as $votos){
                    $totalVotos += $votos['Votos']; 
                }
                return $totalVotos; 
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function totalVotantes(){
            $this->sql = "SELECT COUNT(status) AS 'Votantes' FROM students";
            try {
                $totalVotos = 0;
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach($datos as $votos){
                    $totalVotos += $votos['Votantes']; 
                }
                return $totalVotos -1; 
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function abstencion(){
            $this->sql = "SELECT al.`gender`,COUNT(al.status) AS 'Votos' FROM students al WHERE al.`status`='No ha votado' or status = 'Inactivo' GROUP BY al.`gender` ORDER BY al.gender DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }  
        
        function toggleVotacion(){
            $this->sql = "UPDATE students SET `status`= ? WHERE  `status`= 'Inactivo' OR  `status`= 'No ha votado'";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->estado);
                if ($stm->execute()) {
                    if($this->estado == "Inactivo"){
                        echo "La votación se cerró con éxito";    
                    }else{
                        echo "El proceso de votación se activó con éxito";
                    }
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function nuevaVotacion(){
            $this->sql = "UPDATE students SET `status`= ? ";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->estado);
                if ($stm->execute()) {                    
                    echo "El proceso de votación ha iniciado con éxito, todos los estudiantes están habilitados para votar";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
    }
?>