<form id="formularioSeleccionCandidatos" method="post" target="cargaSelCandidatos" onsubmit="addCandidates()" enctype="multipart/form-data">
               <?php 
                foreach ($objCandidato->elegiblesSeleccionados($data['candidateType'],$data['candidates']) as $candidato) { 
                    if ( $candidato['id'] != "voto_b2025") {               
                ?>  
                <div class="card">
                    <div class="row m-2">
                        <div class="col-md-3">
                            <label for="">Foto</label>
                            <img id="preview-<?= $candidato['id'] ?>" src="" class="card-img-top" style="display:none; width:120px; margin-top:10px; border-radius:8px;">
                        </div>
                        <div class="col">
                            <h5 class="">
                                <input type="hidden" name="candidatos[<?= $candidato['id'] ?>][id]" value="<?= $candidato['id'] ?>">
                                <?php echo strtoupper($candidato['firstLastName']." ".$candidato['secondLastName']." ".$candidato['firstName']." ".$candidato['secondName']); ?>
                            </h5>
                            <div class="row">
                                <div class="col">
                                    <label for="candidateType">Selecciona el tipo de candidato</label><br>
                                    <select name="candidatos[<?= $candidato['id'] ?>][candidateType]" id="candidateType" class="form form-control" required>
                                        <option value="Personero">Personero</option>
                                        <option value="Contralor">Contralor</option>
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="number">Número para el tarjetón</label>
                                    <input type="text" id="number" name="candidatos[<?= $candidato['id'] ?>][number]" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="color">Elije un color</label>
                                    <input type="color" class="form-control form-control-color" name="candidatos[<?= $candidato['id'] ?>][color]" id="color" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="partido">Digita el nombre del partido (opcional)</label><br>
                                    <input type="text" class="form-control" name="candidatos[<?= $candidato['id'] ?>][partido]" id="partido">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-2">
                            <div class="input-group mb-3">
                                <label for="file-<?= $candidato['id'] ?>" class="btn-personalizado">Seleccionar foto</label>
                                <span id="file-name"></span>
                                <input type="file" class="input-foto form-control" id="file-<?= $candidato['id'] ?>" data-id="<?= $candidato['id'] ?>"  name="candidatos[<?= $candidato['id'] ?>][foto]"  onchange="activarPreviewImagen(this,'<?= $candidato['id'] ?>')" hidden>                                
                            </div>
                        </div>
                    </div>
                </div> 
            <?php  }
            } ?>
    <div class="row mt-4">
        <div class="col-6">
            <input type='submit' value='Listo' class='btn btn-outline btn-success btn-lg ' id='enviar' style='width:100%'>
        </div>
        <div class="col-6">
            <button type='button' class='btn btn-outline btn-secondary btn-lg' id='Candidatos' data-bs-dismiss="modal" style='width:100%'>Cerrar</button>
        </div>
    </div>    
      <iframe name='cargaSelCandidatos' style='display:none;'></iframe>