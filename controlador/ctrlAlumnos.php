<?php
    require("../modelo/Conect.php");
    require("../modelo/Student.php");
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
            include("../vistas/formulario_estudiante.php");
            break;
        case 'edit':
            include("../vistas/formulario_estudiante.php");
            break;
        case 'add':
                
            $alu = new Student();	
            $alu->id = $_POST['id'];
            $alu->grade = $_POST['grado'];
            $alu->group = $_POST['grupo'];
            $alu->firstLastName = $_POST['apellido1'];
            $alu->secondLastName = $_POST['apellido2'];
            $alu->firstName = $_POST['nombre1'];
            $alu->secondName = $_POST['secondName'];
            $alu->gender = $_POST['sexo'];
            $alu->agregar();
            break;
        case 'update':
            include("../vistas/formulario_estudiante.php");
            break;
        case 'delete':
            $alu = new Student();	
            $alu->id = $_POST['id'];            
            $alu->eliminar();
            break;
        case 'cargar':
            include("../vistas/estudiantes.php");
            break;
        default:
            echo "No se recibe una accion para ejecutar";
            break;
    }
    
?>