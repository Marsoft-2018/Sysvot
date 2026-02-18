<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Admin | Sysvot</title>
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
<!-- data tables css -->
    <link rel="stylesheet" href="../assets/css/plugins/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/responsive.bootstrap5.min.css">
    <!-- [Page specific CSS] end -->
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.php" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="../assets/images/Sisvot_P1.png" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="main.php" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Principal</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="#" onclick='administrar(this.id)' id='Usuarios' class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Usuarios</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='administrar(this.id)' id='Candidatos' class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-check"></i></span>
            <span class="pc-mtext">Candidatos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='administrar(this.id)' id='Alumnos' class="pc-link">
            <span class="pc-micon"><i class="ti ti-file-certificate"></i></span>
            <span class="pc-mtext">Alumnos</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Administrar proceso</label>
          <i class="ti ti-news"></i>
        </li>

        <li><a class="dropdown-item" ></a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" ></a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" ></a></li>
        <li class="pc-item">
          <a href="#"  onclick='controlVotacion(1)' class="pc-link">
            <span class="pc-micon"><i class="ti ti-clipboard-check"></i></span>
            <span class="pc-mtext">Activar Votación</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='controlVotacion(2)' class="pc-link">
            <span class="pc-micon"><i class="ti ti-clipboard-x"></i></span>
            <span class="pc-mtext">Cerrar Votación</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" href="#"  onclick='controlVotacion(0)' class="pc-link">
            <span class="pc-micon"><i class="ti ti-clipboard-list"></i></span>
            <span class="pc-mtext">Nueva Votación</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='actaPdf(1)' id='tarjetonPdf' class="pc-link">
            <span class="pc-micon"><i class="ti ti-file"></i></span>
            <span class="pc-mtext">Generar acta final pdf</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Reportes/pdf</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="main.php" id='conteo' class="pc-link">
            <span class="pc-micon"><i class="ti ti-box-multiple-7"></i></span>
            <span class="pc-mtext">Conteo de Votos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='contarVotos(2)' id='Abstencionismo' class="pc-link">
            <span class="pc-micon"><i class="ti ti-file-dislike"></i></span>
            <span class="pc-mtext">Abstencionismo</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='tarjetonPdf(1)' id='tarjetonPdf' class="pc-link">
            <span class="pc-micon"><i class="ti ti-ad-2"></i></span>
            <span class="pc-mtext">Tarjetón completo</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='tarjetonPdf(2)' id='tarjetonPersoneroPdf' class="pc-link">
            <span class="pc-micon"><i class="ti ti-ad-2"></i></span>
            <span class="pc-mtext">Tarjetón solo personeros</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" onclick='tarjetonPdf(3)' id='tarjetonContralorPdf' class="pc-link">
            <span class="pc-micon"><i class="ti ti-ad-2"></i></span>
            <span class="pc-mtext">Tarjetón solo contalores</span>
          </a>
        </li>
      </ul>
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
          <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item d-inline-flex d-md-none">
          <a
            class="pc-head-link dropdown-toggle arrow-none m-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <i class="ti ti-search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3">
              <div class="form-group mb-0 d-flex align-items-center">
                <i data-feather="search"></i>
                <input type="search" class="form-control border-0 shadow-none" placeholder="Buscar aquí. . .">
              </div>
            </form>
          </div>
        </li>
        <li class="pc-h-item d-none d-md-inline-flex">
          <form class="header-search">
            <i data-feather="search" class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Buscar. . .">
          </form>
        </li>
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <i class="ti ti-mail"></i>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Message</h5>
              <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
              <!--<div class="list-group list-group-flush w-100">
                <a class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">3:00 AM</span>
                      <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                      <span class="text-muted">2 min ago</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar">
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">6:00 PM</span>
                      <p class="text-body mb-1"><b>Aida Burg</b> commented your post.</p>
                      <span class="text-muted">5 August</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="../assets/images/user/avatar-3.jpg" alt="user-image" class="user-avtar">
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">2:45 PM</span>
                      <p class="text-body mb-1"><b>There was a failure to your setup.</b></p>
                      <span class="text-muted">7 hours ago</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="../assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar">
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">9:10 PM</span>
                      <p class="text-body mb-1"><b>Cristina Danny </b> invited to join <b> Meeting.</b></p>
                      <span class="text-muted">Daily scrum meeting time</span>
                    </div>
                  </div>
                </a>
              </div>-->
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-center py-2">
              <a href="#!" class="link-primary">View all</a>
            </div>
          </div>
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
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <div class="d-flex mb-1">
                <div class="flex-shrink-0">
                  <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-1"> <?php echo $_SESSION['fullName'] ?></h6>
                  <span>Administrador</span>
                </div>
                <a href='../index.php' class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
              </div>
            </div>
            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="drp-t1"
                  data-bs-toggle="tab"
                  data-bs-target="#drp-tab-1"
                  type="button"
                  role="tab"
                  aria-controls="drp-tab-1"
                  aria-selected="true"
                  ><i class="ti ti-user"></i> Profile</button
                >
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="drp-t2"
                  data-bs-toggle="tab"
                  data-bs-target="#drp-tab-2"
                  type="button"
                  role="tab"
                  aria-controls="drp-tab-2"
                  aria-selected="false"
                  ><i class="ti ti-settings"></i> Setting</button
                >
              </li>
            </ul>
            <div class="tab-content" id="mysrpTabContent">
              <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-edit-circle"></i>
                  <span>Edit Profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>View Profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-power"></i>
                  <span>Logout</span>
                </a>
              </div>
              <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-help"></i>
                  <span>Support</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Account Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-lock"></i>
                  <span>Privacy Center</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-messages"></i>
                  <span>Feedback</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ti ti-list"></i>
                  <span>History</span>
                </a>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content" id="principal">
      <?php
          $clase = ["bg-light-primary border border-primary","bg-light-success border border-success","bg-light-warning border border-warning","bg-light-danger border border-danger"];
         
          require("../modelo/Conect.php");
          require("../modelo/candidato.php");
          require("../modelo/voto.php");
          $idest = $_SESSION['id'];
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
        <?php
          $total_filas = ceil($objCandidato->contar()/2);
          foreach ($objCandidato->listarPersoneros() as $candidato) {                 
              ?> 
            <!-- [ sample-page ] start -->
            <div class="col-md-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="foto" style="display:flex;justify-content:center; width: 100%;position: relative;">
                    <img src="candidatos/image/<?php echo $candidato['photo'] ?>"/>  
                    <div style="display:flex;justify-content:center;align-item:center;position: absolute; bottom: 0px; right: 0px; background-color: <?php echo $candidato['color']; ?>; padding: 5px; border-radius: 15% 0px 0px 0px;">
                      <?php 
                        $color_fuente = "#fff";
                        if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                            $color_fuente = "#000";
                        }
                      ?>
                      <h3 class="m-b-20"  style="color: <?php echo $color_fuente; ?>;">
                        <?php 
                          if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                            echo "# ".$candidato['numero']; 
                          }
                        ?>
                      </h3>
                    </div>      			
                  </div>
                  <div style="background-color: <?php echo $candidato['color']; ?>; with: 100%; padding: 5px; margin-bottom: 5px;"></div>
                  <h6 class="mb-2 f-w-400 text-muted">
                    <?php 
                      echo $candidato['firstName']." ".$candidato['firstLastName'];
                    ?> 
                  </h6>
                  <h4 class="mb-3">
                    Total votos:
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
                    <span class="badge <?php echo $color; ?>">
                      <i class="ti ti-trending-up"></i> <?php echo $porcentaje; ?>%
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          <?php 
          } 
        ?>
      </div>      
      <hr>
       <h3>CONTRALORÍA ESTUDIANTIL</h3>
      <div class="row">
        <?php
          $objCandidato = new Candidato();
          foreach ($objCandidato->listarContralores() as $candidato) {                 
              ?> 
            <!-- [ sample-page ] start -->
            <div class="col-md-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="foto" style="display:flex;justify-content:center; width: 100%;position: relative;">
                    <img src="candidatos/image/<?php echo $candidato['photo'] ?>"/>  
                    <div style="display:flex;justify-content:center;align-item:center;position: absolute; bottom: 0px; right: 0px; background-color: <?php echo $candidato['color']; ?>; padding: 5px; border-radius: 15% 0px 0px 0px;">
                      <?php 
                        $color_fuente = "#fff";
                        if($candidato['id'] == 0 || $candidato['id'] == 99){ 
                            $color_fuente = "#000";
                        }
                      ?>
                      <h3 class="m-b-20"  style="color: <?php echo $color_fuente; ?>;">
                        <?php 
                          if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                            echo "# ".$candidato['numero']; 
                          }
                        ?>
                      </h3>
                    </div>      			
                  </div>
                  <div style="background-color: <?php echo $candidato['color']; ?>; with: 100%; padding: 5px; margin-bottom: 5px;"></div>
                  <h6 class="mb-2 f-w-400 text-muted">
                    <?php 
                      echo $candidato['firstName']." ".$candidato['firstLastName'];
                    ?> 
                  </h6>
                  <h4 class="mb-3">
                    Total votos:
                    <?php 
                      $objVotos = new Voto();
                      $objVotos->id = $candidato['id'];
                      $contVotos = 0;
                      foreach($objVotos->contar() as $votos){
                          $contVotos = $votos['Votos']; 
                      }
                      echo $contVotos; 
                      $objTotalVotos = new Voto();
                      $porcentaje = round((100 * $contVotos) / $totalVotosContralor,2);
                      $color = $clase[3];
                      if($porcentaje >10 && $porcentaje <= 20){
                        $color = $clase[2];
                      }elseif($porcentaje > 20 && $porcentaje <= 60){
                        $color = $clase[0];
                      }elseif($porcentaje > 60){
                        $color = $clase[1];
                      }
                    ?>
                    <span class="badge <?php echo $color; ?>">
                      <i class="ti ti-trending-up"></i> <?php echo $porcentaje; ?>%
                    </span>
                  </h4>
                </div>
              </div>
            </div>
          <?php 
          } 
        ?>
      </div>
      <div class="row">
        <div class="col-12">
          <h5 class="mb-3">RESUMEN GENERAL DEL PROCESO</h5>
          <div class="card">
            <div class="list-group list-group-flush">
              <a href="#"
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                Total Votantes Habilitados:
                <span class="h5 mb-0">
                  <?php 
                        $objTotalVotos = new Voto();
                        echo $objTotalVotos->totalVotantes(); 
                    ?>
                </span>
              </a>
              <a href="#"
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                Total votos registrados:
                <span class="h5 mb-0">
                  <div class="">
                    <?php 
                      foreach ($objTotalVotos->totalVotos() as $totalVoto) {
                        echo "<div class='d-flex align-items-center justify-content-between'><p>".$totalVoto['type'].":&nbsp;</p><p> ".$totalVoto['Votos']."</p></div>";
                      }
                    ?>
                  </div>
                </span>
              </a>
              <a href="#"
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                Porcentaje de votación:
                <span class="h5 mb-0">
                  <?php 
                    foreach ($objTotalVotos->totalVotos() as $totalVoto) {
                      $porcentajeVotacion = round(($totalVoto['Votos'] * 100) / $objTotalVotos->totalVotantes(),2);
                      echo "<div class='d-flex align-items-center justify-content-between'><p>".$totalVoto['type'].":&nbsp;</p><p> ".$porcentajeVotacion."%</p></div>";
                    }
                  ?>
                </span>
              </a>
              <a href="#"
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                Votos no realizados:
                <span class="h5 mb-0">
                  <?php 
                    $noVotacion = $objTotalVotos->totalVotantes() -   $totalVotosPersonero;
                    echo $noVotacion;
                  ?>
                </span>
              </a>
              <a href="#"
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                Porcentaje de abstención:
                <span class="h5 mb-0">
                  <?php 
                    $porcentajeVotacion = round(($noVotacion * 100) / $objTotalVotos->totalVotantes(),2);
                    echo $porcentajeVotacion;
                  ?>%
                </span>
              </a>              
            </div>
          </div>
        </div>
      </div>
      
      <?php
        }
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="bodyForm">
            ...
          </div>
          <div class="modal-footer" id="footerModal">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [Page Specific JS] start 
  <script src="../assets/js/plugins/apexcharts.min.js"></script>
  <script src="../assets/js/pages/dashboard-default.js"></script>-->
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="../assets/js/plugins/popper.min.js"></script>
  <script src="../assets/js/plugins/simplebar.min.js"></script>
  <script src="../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../assets/js/fonts/custom-font.js"></script>
  <script src="../assets/js/pcoded.js"></script>
  <script src="../assets/js/plugins/feather.min.js"></script>

  
  
<!--   
  
  <script>layout_change('light');</script>  
  <script>change_box_container('false');</script>  
  <script>layout_rtl_change('false');</script>  
  <script>preset_change("preset-1");</script>  
  <script>font_change("Public-Sans");</script> -->
  
  <!-- [Page Specific JS] start -->
    <!-- datatable Js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="../assets/js/plugins/jquery.js"></script>
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/plugins/dataTables.responsive.min.js"></script>
    <script src="../assets/js/plugins/responsive.bootstrap5.min.js"></script>
   
  <!-- custom code -->
  
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
  
  <script src="../assets/js/plugins/sweetalert2.all.min.js"></script>
  <script src="../assets/js/plugins/axios.js"></script>
	<script type='text/javascript' src='../assets/js/custom/main.js'></script>
	<script type='text/javascript' src='../assets/js/custom/students.js'></script>

</body>
<!-- [Body] end -->

</html>