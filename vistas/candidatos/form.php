<h3 style="text-align: center;">LISTADO DE POSIBLES CANDIDATOS A <?php echo strtoupper($candidateTypeString); ?></h3>
<div class='alert alert-info alert-dismissable' style='margin:0 auto; margin-top:10px; width:80%;'>
    El listado de posibles candidatos es tomado del grado <?php echo $gradeCandidate; ?> de la institución. 
</div>
<hr>
<form id="formularioSeleccionCandidatos" method="post" target="cargaSelCandidatos" onsubmit="addCandidates()" enctype="multipart/form-data">
    <table class='table table-striped'  id="show-hide-candidate" style="width: 100%;">            
        <thead>
            <tr>
                <th>Código</th>
                <th>Grado</th>
                <th>Nombre Completo</th>
                <th>Seleccione</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($objCandidato->elegibles($data['candidateType']) as $candidato) { 
                    if ( $candidato['id'] != "voto_b2025") {               
                ?>                              
            <tr style='padding:5px;'> 													
                <td><?php echo $candidato['id'] ?></td>
                <td><?php echo $candidato['grade']."-".$candidato['group'] ?></td>
                <td  style="width: 50%;"><?php echo strtoupper($candidato['firstLastName']." ".$candidato['secondLastName']." ".$candidato['firstName']." ".$candidato['secondName']); ?></td>	
                <td>
                    <?php
                    //Verificar primero si es candidato
                    if($candidato['candidatoId'] > 0){
                    ?>
                        
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="<?php echo $candidato['id'] ?>" id="<?php echo $candidato['id'] ?>"  name='groupCandidates[]' checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Ya es candidato</label>
                    </div>
                    <?php 
                    }else{ 
                    ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="<?php echo $candidato['id'] ?>" id="<?php echo $candidato['id'] ?>"  name='groupCandidates[]' >
                    </div>  
                    <?php } ?>
                    
                </td>
             </tr>
            <?php  }
            } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='3'>
                </td>
                <td>
                </td>
            </tr>
        </tfoot>    
    </table>
    <div class="row mt-4">
        <div class="col-6">
            <input type='submit' value='Listo' class='btn btn-outline btn-success btn-lg ' id='enviar' style='width:100%'>
        </div>
        <div class="col-6">
            <button type='button' class='btn btn-outline btn-secondary btn-lg' id='Candidatos' data-bs-dismiss="modal" style='width:100%'>Cancelar</button>
        </div>
    </div>    
      <iframe name='cargaSelCandidatos' style='display:none;'></iframe>