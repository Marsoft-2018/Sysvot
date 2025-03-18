<br><br>
<h3 class="title-count">ASPIRANTES PERSONERO ESTUDIANTIL</h3>
<hr>
<br>
<div class="contenedor-votos">
        <?php 
            $totalg = 0;
            foreach ($objCandidato->listarPersoneros() as $candidato) { ?>
                <div class="tarjeta-candidato"  style="background-color: <?php echo $candidato['color']; ?>;">
                    <div class="can-partido">
                        <?php 
                            $color_fuente = "#000";
                            if($candidato['id'] != 0){ 
                                $color_fuente = "#fff";
                                if($candidato['partido'] != null){
                                ?>
                                    Partido:<br>
                                    <strong><?php echo    $candidato['partido'] ?></strong>
                                <?php  
                                } 
                            } 
                        ?>
                    </div>
                    <div class="can-foto">
                        <img src='image/<?php echo $candidato['photo'] ?>' />
                            <?php 
                                if($candidato['id'] != 0){ 
                            ?>
                                <div class="can-numero">
                                    <?php echo "# ".$candidato['numero']; ?>
                                </div>
                            <?php
                                }
                            ?>
                                    
                    </div>
                    <div class="can-votos">
                        <span class="label-votos">Total Votos:</span>
                        <?php 
                            $objVotos = new Voto();
                            $objVotos->id = $candidato['id'];
                            $contVotos = 0;
                            foreach($objVotos->contar() as $votos){
                                $contVotos = $votos['Votos']; 
                            }
                            echo $contVotos; 
                        ?>
                    </div>
                    <div class="can-porcentaje">
                        <?php
                            $objTotalVotos = new Voto();
                            $porcentaje = round((100 * $contVotos) / $objTotalVotos->totalVotos(),2);
                        ?>
                        <div class="progreso" style="width: <?php echo $porcentaje; ?>%"></div><span><?php echo $porcentaje; ?>%</span>
                    </div>
                    <div class="can-nombre"  style="color: <?php echo $color_fuente; ?>;"><?php echo $candidato['firstName']." ".$candidato['secondName'] ?></div>
                    <div class="can-apellidos"  style="color: <?php echo $color_fuente; ?>;"><?php echo $candidato['firstLastName']." ".$candidato['secondLastName'] ?></div>
                </div>
        <?php
            } 
        ?>
    </div>