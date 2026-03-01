<?php
    require("../modelo/Conect.php");
    require("../modelo/User.php");
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
            include("../vistas/Users/form.php");
            break;
        case 'edit':
            include("../vistas/Users/form.php");
            break;
        case 'add':     
            try {
                $objUser = new User();	
                $objUser->id = $data['id'];
                $objUser->name = $data['name'];
                $objUser->password = $data['password'];
                $objUser->status = $data['status'];
                $objUser->role = $data['role'];
                $objUser->institucionId = $data['institucionId'];
                if (!$objUser->add()) {
                    throw new Exception("Error al guardar ID ".$id);
                }
                echo json_encode([
                    "estado" => true,
                    "mensaje" => "Usuario guardados correctamente", 
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
            try {
                $objUser = new User();	
                $objUser->id = $data['id'];
                $objUser->oldId = $data['oldId'];
                $objUser->name = $data['name'];
                $objUser->password = $data['password'];
                $objUser->status = $data['status'];
                $objUser->role = $data['role'];
                $objUser->institucionId = $data['institucionId'];
                if (!$objUser->update()) {
                    throw new Exception("Error al guardar ID ".$id);
                }
                echo json_encode([
                    "estado" => true,
                    "mensaje" => "Usuario actualizado correctamente", 
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
        case 'delete':
            try{
                $objUser = new User();	
                $objUser->id = $data['id'];                   
                if (!$objUser->delete()) {
                    throw new Exception("Error al guardar ID ".$id);
                }
                echo json_encode([
                    "estado" => true,
                    "mensaje" => "Usuario eliminado correctamente", 
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
        case 'load':
            include("../vistas/Users/index.php");
            break;
        default:
            echo "No se recibe una accion para ejecutar";
            break;
    }
    
?>