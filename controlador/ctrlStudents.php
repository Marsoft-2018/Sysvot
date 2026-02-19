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
            include("../vistas/students/form.php");
            break;
        case 'edit':
            include("../vistas/students/form.php");
            break;
        case 'add':                
            $objStudent = new Student();	
            $objStudent->id = $data['id'];
            $objStudent->grade = $data['grade'];
            $objStudent->group = $data['group'];
            $objStudent->firstLastName = $data['firstLastName'];
            $objStudent->secondLastName = $data['secondLastName'];
            $objStudent->firstName = $data['firstName'];
            $objStudent->secondName = $data['secondName'];
            $objStudent->gender = $data['gender'];
            $objStudent->add();
            break;
        case 'update':
            $objStudent = new Student();
            $objStudent->oldId = $data['oldId'];	
            $objStudent->id = $data['id'];
            $objStudent->grade = $data['grade'];
            $objStudent->group = $data['group'];
            $objStudent->firstLastName = $data['firstLastName'];
            $objStudent->secondLastName = $data['secondLastName'];
            $objStudent->firstName = $data['firstName'];
            $objStudent->secondName = $data['secondName'];
            $objStudent->gender = $data['gender'];
            $objStudent->update();
            break;
        case 'delete':
            $objStudent = new Student();	
            $objStudent->id = $data['id'];            
            $objStudent->delete();
            break;
        case 'load':
            include("../vistas/students/index.php");
            break;
        default:
            echo "No se recibe una accion para ejecutar";
            break;
    }
    
?>