<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre completo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($objUsuario->list() as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['name'] ?></td>
                <td><?php echo $usuario['role'] ?></td>
                <td><?php echo $usuario['status'] ?></td>
                <td>
                    <a href='#' class='btn btn-success'  data-bs-toggle="modal" data-bs-target="#staticBackdrop" title='Editar datos del usuario' id='<?php echo $usuario['id'] ?>' onclick='editUser(this.id)'>
                        <i class='ti ti-pencil'> </i>
                    </a>
                    |
                    <button class="btn btn-danger" onclick="deleteUser('<?php echo $usuario['id'] ?>')"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php        
            }
        ?>
    </tbody>
</table>