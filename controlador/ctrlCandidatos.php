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
            include("../vistas/candidatos/formStep1.php");
            break;
        
        case 'newStep2':
            $objCandidato = new Candidato();	
            $candidateTypeString = "Personero";
            $gradeCandidate = 11;
            if($data['candidateType']== 2){
                $candidateTypeString = "Contralor";
                $gradeCandidate = 10;
            }
            include("../vistas/candidatos/formStep2.php");
            break;
        case 'edit':
            $objCandidato = new Candidato();	
            include("../vistas/candidatos/form.php");
            break;
        case 'add':   
            try {
                foreach ($_POST['candidatos'] as $id => $datos) {
                    $fotoNombre = null;
                    if (isset($_FILES['candidatos']['name'][$id]['foto'])) {
                        $tmp = $_FILES['candidatos']['tmp_name'][$id]['foto'];
                        $extension = pathinfo(
                            $_FILES['candidatos']['name'][$id]['foto'],
                            PATHINFO_EXTENSION
                        );

                        $fotoNombre = uniqid().".".$extension;
                        move_uploaded_file($tmp, "../vistas/candidatos/image/".$fotoNombre);
                    }

                    $nuevo = new Candidato(); 
                    $nuevo->numero     = $datos['number'];
                    $nuevo->photo      = $fotoNombre;
                    $nuevo->studentId  = $id;
                    $nuevo->color      = $datos['color'];
                    $nuevo->partido    = $datos['partido'];
                    $nuevo->type       = $datos['candidateType'];

                    if (!$nuevo->add()) {
                        throw new Exception("Error al guardar ID ".$id);
                    }
                }
                echo json_encode([
                    "estado" => true,
                    "mensaje" => "Candidatos guardados correctamente", 
                    "icono" => "success"
                ]);

            } catch (Exception $e) {
                echo json_encode([
                    "estado" => false,
                    "mensaje" => $e->getMessage(), 
                    "icono" => "error"
                ]);
            }
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
