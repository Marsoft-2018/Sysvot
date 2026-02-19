<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->

  <head>    
    <title>TARJETÓN ELECTORAL</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="../assets/fonts/feather.css" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="../assets/fonts/fontawesome.css" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="../assets/fonts/material.css" >
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" >
    <link rel="stylesheet" href="../assets/css/style-preset.css" >
    <!-- estilos personalizados -->
    <link rel="stylesheet" href="../assets/css/custom.css" >
    <!-- <link rel="stylesheet" href="../assets/css/plugins/sweetalert2.css" > -->
    
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css
    " rel="stylesheet">
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="dark" style="background-color: #444451;">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <nav class="pc-sidebar pc-trigger pc-sidebar-hide">
      <div class="navbar-wrapper" style="display: block;">
        <div class="m-header">
          <a href="../dashboard/index.html" class="b-brand text-primary">
            <!-- ========   Change your logo from here   ============ -->
            <img src="../assets/images/LogoSysvot2026-2.png" class="img-fluid logo-lg" alt="logo">
          </a>
        </div>
      </div>
    </nav>
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    <header class="pc-header">
      <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
          <ul class="list-unstyled">
            <!-- ======= Menu collapse Icon ===== -->
            <li class="pc-h-item pc-sidebar-collapse">
                <img src="../assets/images/LogoSysvot2026-2.png" class="img-fluid logo-lg logoSysvot1" alt="logo">
            </li>
            <li>
              <h5 class="m-2">INSTITUCION EDUCATIVA TECNICA AGROPECUARIA Y MINERA DE SAN MARTIN DE LOBA <br> INETAM</h5>
            </li>
          </ul>
        </div>
        <div class="ms-auto">
          <ul class="list-unstyled">
            <li class="dropdown pc-h-item pc-mega-menu">
            </li>
            <li class="dropdown pc-h-item header-user-profile">
              <a
                class="pc-head-link dropdown-toggle arrow-none me-0"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                data-bs-auto-close="outside"
                aria-expanded="false"
              >
                <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                <span><?php echo $_SESSION['fullName'] ?></span>
                <a href="../index.php" class="pc-head-link bg-transparent" title="salir"><i class="ti ti-power text-danger"></i></a>
              </a>
              <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                <div class="dropdown-header">
                  <div class="d-flex mb-1">
                    <div class="flex-shrink-0">
                      <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <p class="mb-1">
                        <b><?php echo $_SESSION['fullName'] ?></b>
                      </p>
                      <span>Estudiante votando</span>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>       
      </div>
    </header>
    <div class="pc-container">
      <div class="pc-content" id="principal">
        <div class="tituloTarjeton">
          <h3>TARJETON PARA PERSONEROS</h3>
        </div>
        <hr>
        <div class="row">
          <!-- [ sample-page ] start -->
          <?php 
              require("../modelo/Conect.php");
              require("../modelo/candidato.php");
              $idest = $_SESSION['id'];
              $objCandidato = new Candidato();
              $total_filas = ceil($objCandidato->contar()/2);
              foreach ($objCandidato->listarPersoneros() as $candidato) {                 
              ?>                
                <div class="col-xl-3 col-md-6 col-sm-12" onclick="Voto1Hecho('<?php echo $candidato['id'] ?>','<?php echo $idest ?>','<?php echo $candidato['numero'] ?>')">
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
                          <h4 class="m-b-20"  style="color: <?php echo $color_fuente; ?>;">
                            <?php 
                              echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                            ?> 
                          </h4>
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
      </div>
      <!-- [ Main Content ] end -->
    </div>
    <!-- [ Main Content ] end -->
      
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/fonts/custom-font.js"></script>
    <script src="../assets/js/pcoded.js"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="js/jquery-3.6.js"></script> -->
    <!-- <script src="../assets/js/plugins/sweetalert2.all.min.js"></script> -->
    <!-- <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type='text/javascript' src='../assets/js/custom/main.js'></script>
  </body>
</html>
