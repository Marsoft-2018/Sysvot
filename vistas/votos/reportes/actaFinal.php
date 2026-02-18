<?php

ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>Acta Final</title>
        <style>
            body{
                padding: 0px;
                margin: 0px;
                font-family: 'Roboto', sans-serif;
            }

            .logo-sistema{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 5px;
                background-color: #E8E8E8;
                width: 100%;
            }

            .logo-sistema .logo{
                width: 10%;
            }

            .logo-sistema .escudo{
                display: block;
                justify-content: center;
                align-items: stretch;
                width: 100px;
                height: 80px;
                padding: 10px;
                margin-right: 50px;
                border-radius: 50%;
                background-color: #fff;
            }

            .logo-sistema .escudo img{
                width: 70%;
            }

            .principal{
                padding: 0px;
            }

            .principal .container{
                width: 100%;
            }

            table{
                border-collapse: collapse;
                background-color: #fff;
                margin: 0px;
                width: 100%;
                border-radius: 2px;
                border: 1px solid #000;
            }
            table td{
                border-collapse: collapse;
                border: 1px solid #000;
                height: 10px;
            }
            
            .tituloTarjeton{
                color: #2d2d2d;
            }
        </style>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Roboto&display=swap" rel="stylesheet">  
        
    </head>
<body>    
    
    <div class="pc-content" id="principal">
      <?php
          $clase = ["bg-light-primary border border-primary","bg-light-success border border-success","bg-light-warning border border-warning","bg-light-danger border border-danger"];
         
          require("../../../modelo/Conect.php");
          require("../../../modelo/candidato.php");
          require("../../../modelo/voto.php");
          $objCandidato = new Candidato();
          $objTotalVotos = new Voto();
          $totalVotosPersonero = 0;
          $totalVotosContralor = 0;
          foreach ($objTotalVotos->totalVotos() as  $value) {
            if ($value['type'] == 'Personero'){
              $totalVotosPersonero = $value['Votos'];
            }elseif ($value['type'] == 'Contralor'){
              $totalVotosContralor = $value['Votos'];
            }
          }
        if( $totalVotosPersonero > 0){
          ?>
      <!-- [ Main Content ] start -->
       <div class="row">
        <div class="col">
          <h3>RESUMEN CONTEO DE VOTOS</h3>
        </div>
       </div>
       <hr>
       <h3>PERSONERÍA ESTUDIANTIL</h3>
        <div class="row">
            <table>
                <tr>
                    <th>Número</th>
                    <th>Candidato</th>
                    <th>Total Votos</th>
                    <th>Porcentaje de votación</th>
                </tr>
                
                <?php
                $total_filas = ceil($objCandidato->contar()/2);
                foreach ($objCandidato->listarPersoneros() as $candidato) {                 
                    ?> 
                    <tr>
                        <td style="text-align: center;">
                            <span class="h5 mb-0">
                                <?php 
                                    if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                                    echo $candidato['numero']; 
                                    }
                                ?>
                            </span>
                        </td>
                        <td>
                            <span class="h5 mb-0">
                                <?php 
                                echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                                ?> 
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="h5 mb-0">
                                <?php 
                                $objVotos = new Voto();
                                $objVotos->id = $candidato['id'];
                                $contVotos = 0;
                                foreach($objVotos->contar() as $votos){
                                    $contVotos = $votos['Votos']; 
                                }
                                echo $contVotos; 
                                $objTotalVotos = new Voto();
                                $porcentaje = round((100 * $contVotos) / $totalVotosPersonero,2);
                                $color = $clase[3];
                                if($porcentaje >10 && $porcentaje <= 20){
                                    $color = $clase[2];
                                }elseif($porcentaje > 20 && $porcentaje <= 60){
                                    $color = $clase[0];
                                }elseif($porcentaje > 60){
                                    $color = $clase[1];
                                }
                                ?>
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <span class="h5 mb-0">
                                <?php echo $porcentaje; ?>%
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </table>         
        </div> 
        <hr>
        <h3>CONTRALORÍA ESTUDIANTIL</h3>
        <div class="row">
            <table>
                <tr>
                    <th>Número</th>
                    <th>Candidato</th>
                    <th>Total Votos</th>
                    <th>Porcentaje de votación</th>
                </tr>
                
                <?php
                $total_filas = ceil($objCandidato->contar()/2);
                foreach ($objCandidato->listarContralores() as $candidato) {                 
                    ?> 
                    <tr>
                        <td style="text-align: center;">
                            <span class="h5 mb-0">
                                <?php 
                                    if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                                    echo $candidato['numero']; 
                                    }
                                ?>
                            </span>
                        </td>
                        <td>
                            <span class="h5 mb-0">
                                <?php 
                                echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                                ?> 
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="h5 mb-0">
                                <?php 
                                $objVotos = new Voto();
                                $objVotos->id = $candidato['id'];
                                $contVotos = 0;
                                foreach($objVotos->contar() as $votos){
                                    $contVotos = $votos['Votos']; 
                                }
                                echo $contVotos; 
                                $objTotalVotos = new Voto();
                                $porcentaje = round((100 * $contVotos) / $totalVotosPersonero,2);
                                $color = $clase[3];
                                if($porcentaje >10 && $porcentaje <= 20){
                                    $color = $clase[2];
                                }elseif($porcentaje > 20 && $porcentaje <= 60){
                                    $color = $clase[0];
                                }elseif($porcentaje > 60){
                                    $color = $clase[1];
                                }
                                ?>
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <span class="h5 mb-0">
                                <?php echo $porcentaje; ?>%
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </table>         
        </div> 
      <div class="row">
        <div class="col-12">
          <h2 class="mb-3">RESUMEN GENERAL DEL PROCESO</h2>
          <div class="card">
            <div class="list-group list-group-flush">                
                <table> 
                    <thead>
                        <tr>
                            <th>Proceso</th>
                            <th>Total votos registrados:</th>
                            <th>Porcentaje de votación</th>
                        </tr>
                    </thead>
                    <?php foreach ($objTotalVotos->totalVotos() as $totalVoto) {                         
                        $porcentajeVotacion = round(($totalVoto['Votos'] * 100) / $objTotalVotos->totalVotantes(),2);
                        ?>                    
                        <tr>
                            <td><?php echo '<span class="h5 mb-0">'.$totalVoto['type'].'</span>' ; ?></td>
                            <td style="text-align: center;"><?php echo '<span class="h5 mb-0">'.$totalVoto['Votos'].'</span>' ; ?></td>
                            <td style="text-align: right;"><?php echo '<span class="h5 mb-0">'.$porcentajeVotacion.'%</span>'; ?></td>
                        </tr> 
                    <?php } ?>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>Total Votantes Habilitados</th>
                            <th>Votos no realizados</th>
                            <th>Porcentaje de abstención</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">
                                <span class="h5 mb-0">
                                    <?php 
                                        $objTotalVotos = new Voto();
                                        echo $objTotalVotos->totalVotantes(); 
                                    ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <span class="h5 mb-0">
                                    <?php 
                                        $noVotacion = $objTotalVotos->totalVotantes() -   $totalVotosPersonero;
                                        echo $noVotacion;
                                    ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <span class="h5 mb-0">
                                    <?php 
                                        $porcentajeVotacion = round(($noVotacion * 100) / $objTotalVotos->totalVotantes(),2);
                                        echo $porcentajeVotacion;
                                    ?>%
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      
      <?php
        }
        ?>
    </div>
    
</body>
</html>
<?php
// Contenido HTML para el PDF

$html = ob_get_clean();

//iniciando la configuracion del dompdf
require '../../../assets/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;



/*$pdfDir = __DIR__ . '/../../votos/reportes/pdfs/';
$pdfFileName = 'tarjeton.pdf';
$pdfFilePath = $pdfDir . $pdfFileName;

// Asegurar que la carpeta existe
if (!file_exists($pdfDir)) {
    mkdir($pdfDir, 0777, true);
}

// Guardar el PDF
file_put_contents($pdfFilePath, $dompdf->output());

// Generar una ruta accesible desde el navegador
$publicPath = "/sysvot/vistas/votos/reportes/pdfs/$pdfFileName";

echo json_encode(["file" => $publicPath]);
exit;
 */

// Generate PDF with DOMPDF
try {
 
    $options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('Letter', 'portrait');
    $dompdf->render();

    $output = $dompdf->output();
    $dir = __DIR__ . '/pdfs';
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    $filename = 'actaFinal.pdf';
    $filepath = $dir . '/' . $filename;
    file_put_contents($filepath, $output);

    $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}" .
    dirname($_SERVER['SCRIPT_NAME'], 2); // sube 2 niveles desde /api/

    $url = $baseUrl . '/reportes/pdfs/' . $filename;
    echo json_encode(['status'=>'success','url'=>$url]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}
?>