<?php 
    $id = "";
    $name = "";
    $role = "";
    $password = "";
    $status = "";
    $institucionId = "1";
    $funcion = "addUser()";

    if(isset($data['id'])){
        $objUser = new User();
        $objUser->id = $data['id'];
        foreach($objUser->load() as $user ){            
            $id = $user["id"];
            $name = $user["name"];
            $role = $user["role"];
            $password = $user["password"];
            $status = $user["status"];          
            $institucionId = $user["institucionId"];
            $funcion = "updateUser('".$data['id']."')";
        }
    }

?>
<div class="row">
    <div class="col">
        <label>Nombre del usuario:</label>
        <input type="text" placeholder="Ingrese el nombre de usuario con el cual ingresará al sistema" id="id" value="<?php echo $id; ?>" class="form form-control ancho" title="Recuerde que este nombre será el que utilizará para ingresar al sistema"/><br>
        <input type="hidden" id="institucionId" value="<?php echo $institucionId; ?>" />
    </div>
</div>
<div class="row">
    <div class="col mt-2">
        <label>Nombre completo:</label><input type="text" placeholder="Nombre completo" id="name" value="<?php echo $name; ?>" class="form form-control ancho" /></br>
    </div>
</div>
<div class="row">
    <div class="col mt-2">
        <label for="role">Rol:</label>
        <select class="form form-control" name="role" id="role" required>
            <option value="">Seleccione..</option>      
            <option value="Administrador" <?php if($role == "Administrador"){ echo "selected"; } ?>>Administrador</option>
            <option value="Jurado" <?php if($role == "Jurado"){ echo "selected"; } ?>>Jurado</option>
            <option value="Testigo" <?php if($role == "Testigo"){ echo "selected"; } ?>>Testigo</option>
        </select>        
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="password">Contraseña:</label>
        <input type="password" placeholder="Contraseña" id="password" value="<?php echo $password; ?>" class="form form-control" />
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="status">Estado:</label>
        <select class="form form-control" name="status" id="status" required>
            <option value="">Seleccione..</option>      
            <option value="Activo" <?php if($status == "Activo"){ echo "selected"; } ?>>Activo</option>
            <option value="Inactivo" <?php if($status == "Inactivo"){ echo "selected"; } ?>>Inactivo</option>
            <option value="Eliminado" <?php if($status == "Eliminado"){ echo "selected"; } ?>>Eliminado</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <button class="btn btn-primary btn-lg mt-4" onclick="<?php echo $funcion; ?>"  data-bs-dismiss="modal" style="width: 100%;">Guardar</button>
    </div>
    <div class="col-6">
        <button type="button" class="btn btn-secondary btn-lg mt-4" data-bs-dismiss="modal" style="width: 100%;">Cancelar</button>
    </div>
</div>