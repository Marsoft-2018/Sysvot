<?php
    require("../modelo/Conect.php");
    require("../modelo/Student.php");
    require("../modelo/candidato.php");
    require("../modelo/voto.php");

    $data = json_decode(file_get_contents("php://input"), true);
    $accion = "";
    if(isset($data['accion'])){
        $accion = $data['accion'];
    }
    if(isset($_REQUEST['accion'])){
        $accion=$_REQUEST['accion'];
    }

    switch ($accion) {
    	case 'RegistrarVoto':
    	    
    		$objVoto = new Voto();
    		$objVoto->candidato = $_POST['idcandidato'];
    		$objVoto->codEstudiante = $_POST['idest'];
    		$objVoto->tipo = $_POST['tipo'];
    		$objVoto->agregar();
    		break;
    	case 'contar':
    	    
            $objCandidato = new Candidato();
            include("../vistas/votos/conteo.php");
            break;
        case 'Abstencion':
            
            $objConteo = new Voto();
            include("../vistas/votos/abstencion.php");
            break;
        case 'Participacion':
            
            $objConteo = new Student();
            include("../vistas/votos/participacion.php");
            break;
        case 'tarjetonPdf':
            
            $objCandidato = new Candidato();
            include("../vistas/votos/reportes/tarjetonPdf.php");
            break;
        case "controlVotacion":
            $estado = "No ha votado";
            if($_POST['estado'] == 2){
                $estado = "Inactivo";
                $objVoto = new Voto();
                $objVoto->estado = $estado;
                $objVoto->toggleVotacion();
            }elseif($_POST['estado'] == 0){
                $objVoto = new Voto();
                $objVoto->estado = $estado;
                $objVoto->nuevaVotacion();
            }else{
                $objVoto = new Voto();
                $objVoto->estado = $estado;
                $objVoto->toggleVotacion();
            }
            
            break;
    } 
