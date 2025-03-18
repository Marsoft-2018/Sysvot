<?php
    require("../modelo/Conect.php");
    require("../modelo/candidato.php");
    if(isset($_POST['accion'])){
        $accion=$_POST['accion']; 

        switch ($accion) {
            case 'cargar':
                $obj = New Candidato();
                include("../vistas/candidatos/listado.php");
                break;

            case 'cargarNuevo':
                $obj = New Candidato();
                include("../vistas/candidatos/formulario.php");
                break;

            case 'Eliminar':                     
                $cand = new Candidato(); 
                $cand->id = $_POST['id'];
                $cand->eliminar();
                break;

            case 'guardarSeleccionCandidatos':
                if(isset($_POST['conjuntoCandidatos'])){
                    $cand = new Candidato();
                    $cand->Guardar($_POST['conjuntoCandidatos']);
                    $cand->listar();
                }
            break;            
        }
    }else{
        echo "No se recibe una accion para ejecutar";
        $accion='nada';
    }

    
?>