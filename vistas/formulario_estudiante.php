<?php 
    $id = "";
    $nombre1 = "";
    $secondName = "";
    $apellido1 = "";
    $apellido2 = "";
    $grado = "";
    $grupo = "";
    $sexo = "";
    $foto = "Enblanco.png";
    $fotoAnterior = "0";
    $funcion = "addStudent()";

    if(isset($_POST['codigo'])){
        $objEst = new Student();
        $objEst->id = $_POST['codigo'];
        $sql = $objEst->buscar();
        foreach($sql as $estudiante ){
            $id = $estudiante["CODEST"];
            $nombre1 = $estudiante["NOMBRE1"];
            $secondName = $estudiante["secondName"];
            $apellido1 = $estudiante["APELLIDO1"];
            $apellido2 = $estudiante["APELLIDO2"];
            $grado = $estudiante["GRADO"];
            $grupo = $estudiante["GRUPO"];
            $sexo = $estudiante["gender"];
            foreach($objEst->fotoCandidato() as $foto_cargada){
                $foto = $foto_cargada['FOTO'];
                $fotoAnterior = $foto_cargada['FOTO'];
            }
            $funcion = "updateStudent()";
        }
    }

?>

<div style="text-align:left;font-size:14px;line-height: 3em;padding:10px;width:95%;">
    <label>Código del Estudiante:</label>
    <input type="text" placeholder="Código del estudiante" id="id" value="<?php echo $id; ?>" class="form form-control ancho" title="Recuerde que este código será el que utilizará el estudiante para ingresar al sistema para votar"/></br>
    <label>1er. Nombre:</label><input type="text" placeholder="Primer Nombre" id="nombre1" value="<?php echo $nombre1; ?>" class="form form-control ancho" /></br>
    <label>2do. Nombre:</label><input type="text" placeholder="Segundo Nombre" id="secondName" value="<?php echo $secondName; ?>" class="form form-control ancho" /></br>
    <label>1er. Apellido:</label><input type="text" placeholder="Primer Apellido" id="apellido1" value="<?php echo $apellido1; ?>" class="form form-control ancho" /></br>
    <label>2do. Apellido:</label><input type="text" placeholder="Segundo Apellido" id="apellido2" value="<?php echo $apellido2; ?>" class="form form-control ancho" /></br> 
    <div style="width:25%;float:left;margin:8px;">
    <label>Grado:</label>
        <select class="form form-control" name="grado" style="width:100px;" id="grado" required>
            <option value="">Seleccione..</option>
             <?php
                for($i=-1; $i<=11; $i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($grado == $i){ echo "selected"; } ?>><?php echo $i."°"; ?></option>
            <?php } ?>
        </select>
    </div>
    <div style="width:25%;float:left;margin:8px;">
    <label>Grupo:</label>
        <select class="form form-control" style="width:100px;" name="grupo" id="grupo" required>
            <option value="">Seleccione..</option>
            <option value="1" <?php if($grupo == 1){ echo "selected"; } ?>>1</option>
            <option value="2" <?php if($grupo == 2){ echo "selected"; } ?>>2</option>
            <option value="3" <?php if($grupo == 3){ echo "selected"; } ?>>3</option>
            <option value="4" <?php if($grupo == 4){ echo "selected"; } ?>>4</option>
            <option value="5" <?php if($grupo == 5){ echo "selected"; } ?>>5</option>
        </select>
    </div>
    <div style="width:25%;float:left;margin:8px;">
    <label>Sexo:</label>
        <select class="form form-control" name="sexo" style="width:100px;" id="sexo" required>
            <option value="">Seleccione..</option>
            <option value="M" <?php if($sexo === 'M'){ echo "selected"; } ?> >M</option>
            <option value="F" <?php if($sexo === 'F'){ echo "selected"; } ?> >F</option>
        </select>
    </div>
</div>
<button class='btn btn-primary' onclick = '<?php echo $funcion; ?>' style='padding: 10px 30px; margin-top: 20px; width: 90%'>Guardar</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>