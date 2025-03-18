<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>TARJETÓN ELECTORAL</title>
        <link rel='stylesheet' href='css/tarjeton.css' type='text/css' />

        <link rel="stylesheet" href="complementos/css/sweetalert.css">        
        <link rel="stylesheet" href="css/alertify.core.css" />
        <link rel="stylesheet" href="css/alertify.default.css" />  

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Roboto&display=swap" rel="stylesheet">  
        
    </head>
    <body>
        <header class="logo-sistema">
            <div class="logo">
                <img src='image/Sisvot_P1.png'/>
            </div>
            <h3>INSTITUCION EDUCATIVA TECNICA AGROPECUARIA Y MINERA DE SAN MARTIN DE LOBA <br> INETAM</h3>
            <div class="escudo"><img src='image/escudos/escudo.png'/></div>
        </header>
        <a href='index.php'><div class='bloqueo' id='bloquear'></div></a>
        <div class="seccion-votante">
            Estudiante votando: 
            <b><?php echo $_SESSION['fullName'] ?></b>
            <span style='float: right;'>
                <a href='index.php' style='color: #fff; margin-right: 100px;'>Salir</a>
            </span>
        </div>

        <div class="principal" id="principal">
            <div class="tituloTarjeton">
                <h3>TARJETON PARA PERSONEROS</h3>
            </div>
            <hr>
        	<div class="container">
        	    <?php 
                    require("modelo/Conect.php");
                    require("modelo/candidato.php");
                    $idest = $_SESSION['id'];
                    $objCandidato = new Candidato();
                    $total_filas = ceil($objCandidato->contar()/2);
        		foreach ($objCandidato->listarPersoneros() as $candidato) { ?>
	        	<div class="tarjeton"  onclick="Voto1Hecho('<?php echo $candidato['id'] ?>','<?php echo $idest ?>')">
                    <?php 
                        if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                    ?>
                            <div class="foto">
                                <img src="image/<?php echo $candidato['photo'] ?>"/>        			
                            </div>
                    <?php
                        }else{
                    ?>
                            <div class="foto">
                                <img src="image/blanco.png"/>        			
                            </div>
                    <?php       
                        }
                    ?>
	        		<div class="datos" style="background-color: <?php echo $candidato['color']; ?>;">
			            <?php 
			                $color_fuente = "#fff";
                            if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                                $color_fuente = "#000";
                            }
                        ?>
	        			<div class="nombre">
	        				<h3 style="color: <?php echo $color_fuente; ?>;">	
	        				    <?php 
	                                echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
	                            ?> 
	                        </h3>
	        			</div>
	        			<div class="numero">
                            <?php 
                                if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                                     echo "# ".$candidato['numero']; 
                                }
                            ?>
	        			</div>
	        			<div class="partido">
                            <?php 
                                if($candidato['partido'] != null){ 
                            ?>
	        				    <h3>Partido: <strong><?php echo    $candidato['partido'] ?></strong></h3>
                            <?php } ?>
	        			</div>
	        		</div>
	        	</div>
	        	<?php }	?>
	        </div>
        </div>
    <footer>
        <!--<p><font size="1">Copy Right&copy;: Ing. Jose Alfredo Tapia A.</font></p> -->
    </footer>
    <script src="js/jquery-3.6.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script type='text/javascript' src='js/main.js'></script>
    <script type="text/javascript" src="js/alertify.js"></script>     
</body>
</html>
