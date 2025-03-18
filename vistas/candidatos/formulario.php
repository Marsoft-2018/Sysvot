<form id="formularioSeleccionCandidatos" method="post" target="cargaSelCandidatos" onsubmit="guardarSeleccionCandidatos()" enctype="multipart/form-data">
    <table class='table table-striped tarjeton' style='width:70%;' id='tablaPosiblesCandidatos'>            
        <thead>    
            <tr><th colspan='5'><h1>LISTADO DE POSIBLES CANDIDATOS</h1></th></tr>
            <tr>
                <td colspan='4'>
                    <div class='alert alert-info alert-dismissable' style='margin:0 auto; margin-top:10px; width:80%;'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        El listado de posibles candidatos es tomado del último grado en la institución. 
                    </div>
                </td>
            </tr>
            <tr class='TITULO' BGCOLOR='#00005B'>
                <th>Código</th>
                <th>Grado</th>
                <th>Nombre Completo</th>
                <th>Seleccione</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($obj->elegibles() as $candidato) { 
                    if ( $candidato['id'] != "voto_b2021") {
                        
                   
                ?>
                              
            <tr style='font-size:10px;'> 													
                <td><?php echo $candidato['id'] ?></td>
                <td><?php echo $candidato['grade']."-".$candidato['group'] ?></td>
                <td><?php echo $candidato['firstLastName']." ".$candidato['secondLastName']." ".$candidato['firstName']." ".$candidato['secondName'] ?></td>	
                <td>
                    <?php
                    //Verificar primero si es candidato
                    if($candidato['candidatoId'] > 0){
                    ?>
                        <div class='alert alert-success' style='margin:0 auto;'>                                        
                            Ya es Candidato 
                        </div>
                    <?php 
                    }else{ 
                    ?>
                        <div class='checkbox checkbox-success'>
                            <input type='checkbox' name='conjuntoCandidatos[]' value="<?php echo $candidato['id'] ?>" id="<?php echo $candidato['id'] ?>" title="Candidato <?php echo $candidato['id'] ?>" style='margin:0 auto; padding: 0px;'>

                            <label for="<?php echo $candidato['id'] ?>"> </label>
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
                    <button type='button' class='btn btn-outline btn-warning' id='Candidatos' onclick='administrar(this.id)'>Regresar</button>
                </td>
                <td>
                    <input type='submit' value='Listo' class='btn btn-outline btn-success' id='enviar' style='width:90%'>
                </td>
            </tr>
        </tfoot>    
    </table>
            
      <iframe name='cargaSelCandidatos' style='display:none;'></iframe>