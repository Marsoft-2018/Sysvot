<div class="container marco-reporte">
    <div class="resumen-votos">
        <h1>RESULTADOS DE LA VOTACIÓN</h1> 
    </div>
    <div class="resultados">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include("conteos/personeros.php");
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    include("conteos/contralores.php");
                ?>
            </div>
        </div>
    </div>
    <div class="container resumen-votos">
        <div class="resultados">
            <h3>Total Votantes Habilitados: 
                <span class="vot-total">
                    <?php 
                        $objTotalVotos = new Voto();
                        echo $objTotalVotos->totalVotantes(); 
                    ?>
                </span>
            </h3>
            <h3>
                Total votos registrados: 
                <span class="vot-total">
                <?php 
                    $objTotalVotos = new Voto();
                    echo $objTotalVotos->totalVotos(); 
                ?>
                </span>
            </h3>
            <h3>
                Porcentaje de votación: 
                <span class="vot-procentaje"> 
                    <?php 
                        $porcentajeVotacion = round(($objTotalVotos->totalVotos() * 100) / $objTotalVotos->totalVotantes(),2);
                        echo $porcentajeVotacion;
                    ?>%
                </span>
            </h3>
        </div>
        <div class="abstencion">
            <h3>Abstención</h3>
            <h3>Votos no realizados:  
                <span class="vot-total">
                    <?php 
                        $noVotacion = $objTotalVotos->totalVotantes() -  $objTotalVotos->totalVotos();
                        echo $noVotacion;
                    ?>
                </span>
            </h3>
            <h3>
                Porcentaje de abstención: 
                <span class="vot-procentaje"> 
                    <?php 
                        $porcentajeVotacion = round(($noVotacion * 100) / $objTotalVotos->totalVotantes(),2);
                        echo $porcentajeVotacion;
                    ?>%
                </span>
            </h3>
        </div>
    </div>   
</div>



