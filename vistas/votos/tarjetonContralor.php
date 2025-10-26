<div class="tituloTarjeton">
    <h3>TARJETON PARA CONTRALORES</h3>
</div>
<hr>
<div class="row">
    <?php 
        $data = json_decode(file_get_contents("php://input"), true);
        require("../../modelo/Conect.php");
        require("../../modelo/candidato.php");
        $idest = $data['idest'];
        $objCandidato = new Candidato();
        $total_filas = ceil($objCandidato->contar()/2);
        foreach ($objCandidato->listarContralores() as $candidato) { ?>                 
            <div  class="col-xl-3 col-md-6 col-sm-12"  onclick="VotoHecho('<?php echo $candidato['id'] ?>','<?php echo $idest ?>','<?php echo $candidato['numero'] ?>')">
                <div class="card comp-card tarjeton"  style="background-color: <?php echo $candidato['color']; ?>;">
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col">
                        <?php 
                        $color_fuente = "#fff";
                        if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                            $color_fuente = "#000";
                        }
                        ?>
                        <h3 class="m-b-20"  style="color: <?php echo $color_fuente; ?>;">
                        <?php 
                            echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                        ?> 
                        </h3>
                        <h1  style="color: <?php echo $color_fuente; ?>;">
                        <?php 
                            if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                            echo "# ".$candidato['numero']; 
                            }
                        ?>
                        </h1>
                        <?php 
                        if($candidato['partido'] != null){ 
                        ?>
                            <p class="m-b-0">Partido: <strong><?php echo    $candidato['partido'] ?></strong></p>
                        <?php 
                        } 
                        ?>   
                    </div>
                    <div class="col-auto">
                        <?php 
                        if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                        ?>
                            <div class="foto">
                            <img src="candidatos/image/<?php echo $candidato['photo'] ?>"/>        			
                            </div>
                        <?php
                        }else{
                        ?>
                            <div class="foto">
                            <img src="candidatos/image/blanco.png"/>        			
                            </div>
                        <?php       
                            }
                        ?>
                    </div>
                    </div>
                </div>
                </div>
            </div>  
        <?php 
        }	
    ?>
</div>
        
