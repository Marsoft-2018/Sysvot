<br><br>
<table class='table table-striped tarjeton' style='width:70%;'>   
    <thead>
        <tr><td colspan='4'><h1>CANDIDATOS A PERSONERO ESTUDIANTIL REGISTRADOS</h1></td></tr>
        <tr class='TITULO' BGCOLOR='#00005B'><td>No.</td><td>NOMBRE COMPLETO</td><td colspan='3'>FOTO</td></tr>
    </thead>
    <tbody>
        <?php 
            foreach ($obj->listarPersoneros() as $candidato) { 

            ?>
            <tr>
                <td ><?php echo $candidato['numero'] ?></td>
                <td>
                    <div id='".$candidato[1]."' >
                        <?php echo $candidato['firstName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'] ?>
                    </div>
                </td>
                <td>
                    <?php 
                        if($candidato['id'] != 0){ 
                    ?>    
                        <img src='image/<?php echo $candidato['photo'] ?>' width='40' height='40' />  
                    <?php 
                        } 
                    ?>              
                </td>
                <td>
                    <a href='#' class='btn btn-success' title='Editar datos del Candidato' id = "<?php echo $candidato['id'] ?>" onclick='ventanaEditarAlumno(this.id)'>
                        <i class='fa fa-pencil'> </i>
                    </a>
                </td>
                <td>
                    <a href='#' class='btn btn-danger' onclick ="eliminarCandidato('<?php echo $candidato['id'] ?>')" title='Elimina el registro del candidato de la base da datos'>
                        <i class='fa fa-trash-o'> </i>
                    </a>
                </td>
            </tr>
        <?php 
            }

         ?>
        <tr>
            <td colspan='4'>
                <a href='#' class='btn btn-primary' id='Candidatos' onclick='cargarNuevoCandidato()'>Nuevo Candidato</a>
            </td>
        </tr>
    </tbody>
</table>
<br><br><hr><br><br>
<table class='table table-striped tarjeton' style='width:70%;'>   
    <thead>
        <tr><td colspan='4'><h1>CANDIDATOS A CONTRALOR ESTUDIANTIL REGISTRADOS</h1></td></tr>
        <tr class='TITULO' BGCOLOR='#00005B'><td>No.</td><td>NOMBRE COMPLETO</td><td colspan='3'>FOTO</td></tr>
    </thead>
    <tbody>
        <?php 
            foreach ($obj->listarContralores() as $candidato) { 

            ?>
            <tr>
                <td ><?php echo $candidato['numero'] ?></td>
                <td>
                    <div id='".$candidato[1]."' >
                        <?php echo $candidato['firstName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'] ?>
                    </div>
                </td>
                <td>
                    <?php 
                        if($candidato['id'] != 0){ 
                    ?>    
                        <img src='image/<?php echo $candidato['photo'] ?>' width='40' height='40' />  
                    <?php 
                        } 
                    ?>              
                </td>
                <td>
                    <a href='#' class='btn btn-success' title='Editar datos del Candidato' id = "<?php echo $candidato['id'] ?>" onclick='ventanaEditarAlumno(this.id)'>
                        <i class='fa fa-pencil'> </i>
                    </a>
                </td>
                <td>
                    <a href='#' class='btn btn-danger' onclick ="eliminarCandidato('<?php echo $candidato['id'] ?>')" title='Elimina el registro del candidato de la base da datos'>
                        <i class='fa fa-trash-o'> </i>
                    </a>
                </td>
            </tr>
        <?php 
            }

         ?>
        <tr>
            <td colspan='4'>
                <a href='#' class='btn btn-primary' id='Candidatos' onclick='cargarNuevoCandidato()'>Nuevo Candidato</a>
            </td>
        </tr>
    </tbody>
</table>