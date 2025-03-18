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
                border: 1px solid #1D1D23;
                background-color: #fff;
                margin: 5px;
                width: 50%;
                padding: 5px;
                border-radius: 5px;
            }
            table tr{     
            }

            .foto{
                height:120px;
                padding: 5px;
            }

            .foto img{
                height:100%;
                padding: 5px;
            }

            .datos{           
                border: 1px solid #1D1D23;
                padding: 10px 20px;
                box-sizing: border-box;
                color: #fff;
                background-color: #1d3d23;
            }

            .datos .nombre{
                font-family: 'Montserrat', sans-serif;
                text-transform: uppercase;
                border-bottom: 1px solid #cecece;
                font-size: 20px;
            }

            .datos .numero{
                text-align: center;
                font-size: 1.5em;
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
        <div class="container">
            <table>
            <?php 
                require("../../../modelo/Conect.php");
                require("../../../modelo/candidato.php");
                $objCandidato = new Candidato();
                $total_filas = ceil($objCandidato->contar()/2);
            foreach ($objCandidato->listarPersoneros() as $candidato) { // Ruta de la imagen (método HTTP recomendado)

                if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                    $imgUrl = "http://localhost/sisvot/image/".$candidato['photo']."";
                }else{
                    $imgUrl = "http://localhost/sisvot/image/blanco.png";

                }
                ?>
                <tr>                
                    <td>
                        <div class="foto">
                            <img src="<?php echo $imgUrl  ?>"/> 
                        </div>       			
                    </td>
                    <td>
                        <div class="datos" style="background-color: <?php echo $candidato['color']; ?>;">
                            <?php 
                                $color_fuente = "#fff";
                                if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                                    $color_fuente = "#000";
                                }
                            ?>
                            <h3 style="color: <?php echo $color_fuente; ?>;">	
                                <?php 
                                    echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                                ?> 
                            </h3>
                            <div class="numero">
                                <?php 
                                    if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                                            echo "# ".$candidato['numero']; 
                                    }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }	?>

            </table>
        </div>
    </div>
</body>
</html>
<?php
require '../../../complementos/dompdf/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configurar opciones de Dompdf (por ejemplo, permitir fuentes remotas)
$options = new Options();
$options->set('defaultFont', 'Arial');
$options->set('isRemoteEnabled', true); // Habilitar carga de imágenes remotas
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Contenido HTML para el PDF

$html = ob_get_clean();

// Cargar contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Configurar tamaño y orientación del papel
$dompdf->setPaper('Letter', 'portrait');

// Renderizar el PDF
$dompdf->render();
$pdfOutput = $dompdf->output();

if (!$pdfOutput) {
    echo json_encode(["error" => "No se generó el PDF correctamente."]);
    exit;
}

$pdfDir = __DIR__ . '/../../reportes/pdfs/';
$pdfFileName = 'tarjeton.pdf';
$pdfFilePath = $pdfDir . $pdfFileName;

// Asegurar que la carpeta existe
if (!file_exists($pdfDir)) {
    mkdir($pdfDir, 0777, true);
}

// Guardar el PDF
file_put_contents($pdfFilePath, $dompdf->output());

// Generar una ruta accesible desde el navegador
$publicPath = "/sisvot/vistas/reportes/pdfs/$pdfFileName";

echo json_encode(["file" => $publicPath]);
exit;
 
?>