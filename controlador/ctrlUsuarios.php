<?php

    require("../modelo/Conect.php");
    require("../modelo/User.php");
    if(isset($_POST['accion'])){
        $accion=$_POST['accion']; 
        
        if($accion=='cargar'){     
            $us=new User();	
            $us->listar();
        }
        
        if($accion=='Eliminar'){            
            $us=new User();	
            $us->eliminar($_POST['idUsuario']);
            $us->Cargar();
        }
        
        if($accion=='Agregar'){ 
            $idUsuario= $_POST['idUsuario'];
            $contrasena= $_POST['contrasena'];
            $nombreC= $_POST['nombreC'];
            $rol= $_POST['rol'];
            $estado= $_POST['estado'];
            $institucion= $_POST['institucion'];
            $us=new User();	
            $us->Guardar($idUsuario,$contrasena,$nombreC,$rol,$estado,$institucion);
            $us->Cargar();
        }

    }else{
        echo "No se recibe una accion para ejecutar";
        $accion='nada';
    }

    
?>