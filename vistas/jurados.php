<?php
    $Usuario_reg = $_SESSION['idUsuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SISVOT</title>
        <link rel='stylesheet' href='css/estilos.css' type='text/css'>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/resultados_votacion.css">
        <link rel="stylesheet" href="complementos/css/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
        <link href="complementos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg " style="background-color: #00005B;">
            <div class="container-fluid">
                <div class="logoMenu d-inline-block align-text-top" style="margin-right: 100px;"><img src='IMG/Sisvot_P2.png'></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reportes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#" onclick='contarVotos(3)' id='participacion'>Participación</a></li>
                                <li><a class="dropdown-item" href="#" onclick='contarVotos(1)' id='conteo'>Conteo de Votos</a></li>
                                <li><a class="dropdown-item" href="#" onclick='contarVotos(2)' id='Abstencionismo'>Abstencionismo</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"  onclick="alerta()">Acerca de</a>
                        </li>
                    </ul>
                    <span class="navbar-text" style="color: #fff;">
                        Usuario: <?php echo $_SESSION['nombre'] ?>&nbsp;&nbsp;&nbsp;<a href='index.php'>(Salir)</a>
                    </span>
                </div>
            </div>
        </nav>	

        <div class='container' id='principal' style="padding-top:80px;">
            <div id="container">
                <div style="" id="girando"><h1>BIENVENIDO</h1></div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">
                
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h3>Autor:</h3>    
                <h3>Ingeniero: Jose ALfredo Tapia Arroyo</h3>
               
              </div>
              <div class="modal-footer">
                 &copy; Todos los derechos reservados
              </div>
            </div>
          </div>
        </div>
        <span id='resultadoUsuario'></span>
        <script src="js/sweetalert2.js"></script>
        <!-- <script src="js/jquery-3.6"></script>-->
        <script  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
        <script type='text/javascript' src='js/main.js'></script>
    </body>
</html>
