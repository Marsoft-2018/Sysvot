<form id="formularioSeleccionCandidatos" method="post" target="cargaSelCandidatos" onsubmit="addCandidates()" enctype="multipart/form-data">
    <table class='table table-striped'  id="show-hide-candidate" style="width: 100%;">            
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Número</th>
                <th>Color</th>
                <th>Foto</th>
                <th>Partido</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($objCandidato->elegiblesSeleccionados($data['candidateType'],$data['candidates']) as $candidato) { 
                    if ( $candidato['id'] != "voto_b2025") {               
                ?>                              
            <tr style='padding:5px;'> 													
                <td  style="width: 50%;"><?php echo strtoupper($candidato['firstLastName']." ".$candidato['secondLastName']." ".$candidato['firstName']." ".$candidato['secondName']); ?></td>	
                <td><input type="text" id="number" class="form-control"></td>
                <td><input type="color" name="color" id="color"></td>
                <td><input type="file" name="photo" id="photo" class="input-foto form-control"></td>
                <td><input type="text" name="partido" id="partido"></td>
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