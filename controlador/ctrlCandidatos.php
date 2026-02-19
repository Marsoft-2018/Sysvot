<?php
    require("../modelo/Conect.php");
    require("../modelo/candidato.php");
    $accion = "";
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }else{
        
        $json = file_get_contents('php://input');

        // Decodifica el JSON a un objeto o array asociativo de PHP
        $data = json_decode($json, true);

        // Accede a tus variables
        $accion = $data['accion'] ?? '';
    }

    switch ($accion) {
        case 'new':
            $objCandidato = new Candidato();	
            $candidateTypeString = "Personero";
            $gradeCandidate = 11;
            if($data['candidateType']== 2){
                $candidateTypeString = "Contralor";
                $gradeCandidate = 10;
            }
            include("../vistas/candidatos/form.php");
            break;
        case 'edit':
            $objCandidato = new Candidato();	
            include("../vistas/candidatos/form.php");
            break;
        case 'add':                
            $objCandidato = new Candidato();	
            $objCandidato->id = $data['id'];
            $objCandidato->grade = $data['grade'];
            $objCandidato->group = $data['group'];
            $objCandidato->firstLastName = $data['firstLastName'];
            $objCandidato->secondLastName = $data['secondLastName'];
            $objCandidato->firstName = $data['firstName'];
            $objCandidato->secondName = $data['secondName'];
            $objCandidato->gender = $data['gender'];
            $objCandidato->add();
            break;
        case 'update':
            $objCandidato = new Candidato();
            $objCandidato->oldId = $data['oldId'];	
            $objCandidato->id = $data['id'];
            $objCandidato->grade = $data['grade'];
            $objCandidato->group = $data['group'];
            $objCandidato->firstLastName = $data['firstLastName'];
            $objCandidato->secondLastName = $data['secondLastName'];
            $objCandidato->firstName = $data['firstName'];
            $objCandidato->secondName = $data['secondName'];
            $objCandidato->gender = $data['gender'];
            $objCandidato->update();
            break;
        case 'delete':
            $objCandidato = new Candidato();	
            $objCandidato->id = $data['id'];            
            $objCandidato->delete();
            break;
        case 'load':
            include("../vistas/candidatos/index.php");
            break;
        case 'guardarSeleccionCandidatos':
            if(isset($_POST['conjuntoCandidatos'])){
                $cand = new Candidato();
                $cand->add($_POST['conjuntoCandidatos']);
            }
            break;
        default:
            echo "No se recibe una accion para ejecutar";
            break;
    }
    
?>
