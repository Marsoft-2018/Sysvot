<?php

ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>TARJETÓN ELECTORAL</title>
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
                background-color: #fff;
                margin: 0px;
                width: 100%;
                border-radius: 2px;
            }
            .foto{
                height:120px;
                width: 50%;
                padding: 5px;
            }

            .foto img{
                height:100%;
                padding: 5px;
            }

            .datos{           
                border: 1px solid #1D1D23;
                color: #fff;
                background-color: #1d3d23;
                width: 160px;
                height: 200px;
            }

            .datos .nombre{
                font-family: 'Montserrat', sans-serif;
                text-transform: uppercase;
                width: 100%;
                height: 65px;
                font-size: small;
                margin-top: 5px;
                overflow: hidden;
            }

            .numero{        
                width: 40%;        
                float: left;
                text-align: center;
                font-size: large;
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
    <div class="principal" id="principal">
        <div class="tituloTarjeton">
            <h3>TARJETON PARA PERSONEROS</h3>
        </div>
        <hr>
        <table>
            <tr>    
                <?php 
                    require("../../../modelo/Conect.php");
                    require("../../../modelo/candidato.php");
                    $objCandidato = new Candidato();
                    $total_filas = ceil($objCandidato->contar()/2);
                    foreach ($objCandidato->listarPersoneros() as $candidato) { 
                    // Ruta de la imagen (método HTTP recomendado)
                    $pathFoto = __DIR__ . "../../../candidatos/image/".$candidato['photo']."";
                    $imgBase64 = '';
                        if (file_exists($pathFoto)) {
                            $imgData = base64_encode(file_get_contents($pathFoto));
                            $imgBase64 = 'data:image/png;base64,' . $imgData;
                        }
                        if ($imgBase64): $imgUrl = '<img src="'.$imgBase64.'" alt="foto" />'; endif;
                        
                ?>   
                <td>
                    <div class="container">
                        <div class="datos" style="background-color: <?php echo $candidato['color']; ?>;">
                            <?php 
                                $color_fuente = "#fff";
                                if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                                    $color_fuente = "#000";
                                }
                            ?>
                            <div class="foto">
                                <?php echo  $imgUrl  ?> 
                            </div>                   
                            <div class="numero">
                                <h3>
                                    <?php if($candidato['id'] != 0 && $candidato['id'] != 99){ echo "# ".$candidato['numero']; } ?>                                               
                                </h3>
                            </div> 
                            <div class="nombre" style="color: <?php echo $color_fuente; ?>;">
                                <h6>
                                    <?php 
                                        echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                                    ?> 
                                </h6>
                            </div>

                        </div>
                    </div>
                </td>
                <?php }	?>
            </tr>
        </table>
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
    $filename = 'tarjetonPersonero.pdf';
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