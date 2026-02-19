<?php 
    $id = "";
    $firstName = "";
    $secondName = "";
    $firstLastName = "";
    $secondLastName = "";
    $grade = "";
    $group = "";
    $gender = "";
    $foto = "Enblanco.png";
    $fotoAnterior = "0";
    $funcion = "addStudent()";

    if(isset($data['id'])){
        $objEst = new Student();
        $objEst->id = $data['id'];
        $sql = $objEst->load();
        foreach($sql as $student ){            
            $id = $student["id"];
            $firstName = $student["firstName"];
            $secondName = $student["secondName"];
            $firstLastName = $student["firstLastName"];
            $secondLastName = $student["secondLastName"];
            $grade = $student["grade"];
            $group = $student["group"];
            $gender = $student["gender"];
            $funcion = "updateStudent(".$data['id'].")";
        }
    }

?>
<div class="row">
    <div class="col">
        <label>Código del Estudiante:</label>
        <input type="text" placeholder="Código del estudiante" id="id" value="<?php echo $id; ?>" class="form form-control ancho" title="Recuerde que este código será el que utilizará el estudiante para ingresar al sistema para votar"/><br>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>1er. Nombre:</label><input type="text" placeholder="Primer Nombre" id="firstName" value="<?php echo $firstName; ?>" class="form form-control ancho" /></br>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>2do. Nombre:</label><input type="text" placeholder="Segundo Nombre" id="secondName" value="<?php echo $secondName; ?>" class="form form-control ancho" /></br>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>1er. Apellido:</label><input type="text" placeholder="Primer Apellido" id="firstLastName" value="<?php echo $firstLastName; ?>" class="form form-control ancho" /></br>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>2do. Apellido:</label><input type="text" placeholder="Segundo Apellido" id="secondLastName" value="<?php echo $secondLastName; ?>" class="form form-control ancho" /></br> 
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Grado:</label>
        <select class="form form-control" name="grade" id="grade" required>
            <option value="">Seleccione..</option>
             <?php
                for($i=-1; $i<=11; $i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($grade == $i){ echo "selected"; } ?>><?php echo $i."°"; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col">
        <label>Grupo:</label>
        <select class="form form-control" name="group" id="group" required>
            <option value="">Seleccione..</option>
            <option value="1" <?php if($group == 1){ echo "selected"; } ?>>1</option>
            <option value="2" <?php if($group == 2){ echo "selected"; } ?>>2</option>
            <option value="3" <?php if($group == 3){ echo "selected"; } ?>>3</option>
            <option value="4" <?php if($group == 4){ echo "selected"; } ?>>4</option>
            <option value="5" <?php if($group == 5){ echo "selected"; } ?>>5</option>
        </select>
    </div>
    <div class="col">
        <label>Sexo:</label>
        <select class="form form-control" name="gender" id="gender" required>
            <option value="">Seleccione..</option>
            <option value="M" <?php if($gender === 'M'){ echo "selected"; } ?> >M</option>
            <option value="F" <?php if($gender === 'F'){ echo "selected"; } ?> >F</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <button class='btn btn-primary btn-lg mt-4' onclick = '<?php echo $funcion; ?>'  data-bs-dismiss="modal" style="width: 100%;">Guardar</button>
    </div>
    <div class="col-6">
        <button type="button" class="btn btn-secondary btn-lg mt-4" data-bs-dismiss="modal" style="width: 100%;">Cancelar</button>
    </div>
</div>