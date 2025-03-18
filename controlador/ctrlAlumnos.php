<?php
    require("../modelo/Conect.php");
    require("../modelo/Student.php");
    if(isset($_POST['accion'])){
        $accion=$_POST['accion']; 
        
        if($accion=='cargar'){    

            include("../vistas/estudiantes.php");

        }elseif($accion == 'Eliminar'){   
            $alu = new Student();	
            $alu->id = $_POST['id'];            
            $alu->eliminar();
            
        }elseif($accion=='Agregar'){ 
                
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

        }elseif( $accion == "ventanaNuevo" || $accion == "ventanaEditar"){
            include("../vistas/formulario_estudiante.php");
           
        }
    }else{
        echo "No se recibe una accion para ejecutar";
        $accion='nada';
    }

    
?>