<?php 
  session_start();
  if (!isset($_SESSION['id'])) {
    header("Location: /sisvot/index.php");
  }else{
    switch ($_SESSION['role']) {
      case 'Administrador':
        include("dashboard/index.php");
        break;
      case 'Estudiante':
        include("votos/tarjetonPersoneros.php");
        break;
      case 'Jurado':
        include("jurados.php");
        break;
      default:
        include("No_auto.php");
        break;
    }
  }
 ?>