<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if( !isset($_SESSION["username"]) ){
  header('Location:login.php');
}
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Markir</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body class="h-100">
    
  <div class="container-fluid">
      <div class="row">
        <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
          <div class="main-navbar  bg-white">
            <div class="container p-0">
              <!-- Main Navbar -->
              <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                <a class="navbar-brand" href="#" style="line-height: 25px;">
                  <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1 ml-3" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Markir</span>
                  </div>
                </a>
                <ul class="navbar-nav border-left flex-row border-right ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <img class="user-avatar rounded-circle mr-2"  src="profile/<?php echo $_SESSION["foto"] ?>" alt="User Avatar"> <span class="d-none d-md-inline-block"><?php echo $_SESSION["nama"] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item" href="profile.php"><i class="material-icons"></i> Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item text-danger" href="logout.php">
                        <i class="material-icons text-danger"></i> Logout </a>
                    </div>
                  </li>
                </ul>
                <nav class="nav">
                  <a href="#" class="nav-link nav-link-icon toggle-sidebar  d-inline d-lg-none text-center " data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons"></i>
                  </a>
                </nav>
              </nav>
            </div> <!-- / .container -->
          </div> <!-- / .main-navbar -->
          <div class="header-navbar collapse d-lg-flex p-0 bg-white border-top">
            <div class="container">
              <div class="row">
                <div class="col">
                  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                      <a href="index.php" class="nav-link" ><i class="material-icons"></i> Dashboards</a>
                    </li>
                    <li class="nav-item">
                      <a href="kendaraan.php" class="nav-link"><i class="fa fa-motorcycle" aria-hidden="true"></i> Kendaraan</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" data-toggle="dropdown"><i class="fa fa-product-hunt" aria-hidden="true"></i> Parkir</a>
                      <div class="dropdown-menu dropdown-menu-small">
                        <a href="parkir-terkini.php" class="dropdown-item">Parkir Terkini</a>
                        <a href="riwayat-parkir.php" class="dropdown-item">Riwayat Parkir</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a href="tracking.php" class="nav-link"><i class="fa fa-map-marker" aria-hidden="true"></i> Lacak Kendaraan (Tracking)</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
