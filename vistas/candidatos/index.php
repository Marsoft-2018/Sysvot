<div class="row">
    <div class="col-md-12 col-xl-12">
        <h5 class="mb-3">CANDIDATOS A PERSONERO ESTUDIANTIL REGISTRADOS</h5>
        <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-borderless mb-0">
                <thead>
                    <tr>                        
                        <th>No.</th>
                        <th>NOMBRE COMPLETO</th>
                        <th colspan='3'>FOTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $objCandidato = new Candidato();
                        foreach ($objCandidato->listarPersoneros() as $candidato) { 

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
                                    <img src='candidatos/image/<?php echo $candidato['photo'] ?>' width='40' height='40' />  
                                <?php 
                                    } 
                                ?>              
                            </td>
                            <td>
                                <a href='#' class='btn btn-success' title='Editar datos del Candidato' id = "<?php echo $candidato['id'] ?>" onclick='ventanaEditarAlumno(this.id)'>
                                    <i class='ti ti-pencil'> </i>
                                </a>
                            </td>
                            <td>
                                <a href='#' class='btn btn-danger' onclick ="deleteCandidate('<?php echo $candidato['id'] ?>')" title='Elimina el registro del candidato de la base da datos'>
                                    <i class='ti ti-trash'> </i>
                                </a>
                            </td>
                        </tr>
                    <?php 
                        }

                    ?>
                    <tr>
                        <td colspan='4'>
                            <a href='#' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="newCandidate(1)"><i class='fa fa-plus-circle'> Nuevo Candidato </i></a><br><br>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12 col-xl-12">
        <h5 class="mb-3">CANDIDATOS A CONTRALOR ESTUDIANTIL REGISTRADOS</h5>
        <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-borderless mb-0">
                <thead>
                    <tr>                        
                        <th>No.</th>
                        <th>NOMBRE COMPLETO</th>
                        <th colspan='3'>FOTO</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php 
                        foreach ($objCandidato->listarContralores() as $candidato) { 

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
                                    <img src='candidatos/image/<?php echo $candidato['photo'] ?>' width='40' height='40' />  
                                <?php 
                                    } 
                                ?>              
                            </td>
                            <td>
                                <a href='#' class='btn btn-success' title='Editar datos del Candidato' id = "<?php echo $candidato['id'] ?>" onclick='ventanaEditarAlumno(this.id)'>
                                    <i class='ti ti-pencil'> </i>
                                </a>
                            </td>
                            <td>
                                <a href='#' class='btn btn-danger' onclick ="deleteCandidate('<?php echo $candidato['id'] ?>')" title='Elimina el registro del candidato de la base da datos'>
                                    <i class='ti ti-trash'> </i>
                                </a>
                            </td>
                        </tr>
                    <?php 
                        }

                    ?>
                    <tr>
                        <td colspan='4'>
				            <a href='#' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="newCandidate(2)"><i class='fa fa-plus-circle'> Nuevo Candidato </i></a><br><br>			
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>