<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Smart Care</title>
  <!-- MDB icon -->
  <link rel="icon" href="slide/icon-1.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!--Main Navigation-->
<header>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <a class="navbar-brand" href="#">
      <img src="slide/proicon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"><strong><a class="nav-link" href="index.php">Smart Care</a></strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto p-1">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contract</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Emergency</a>
        </li>
      </ul>
    </div>

</nav>

</header>



<!--Main Navigation-->


  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="10000">
        <img src="slide/sd-5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Advance maintenance</h5>
          <p>Lot of facilities like admin panel , doctor panel</p>
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <img src="slide/sd-3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-light">High accommodation system</h5>
          <p class="text-light">ensuring presentation, response, setting, timing and scheduling</p>
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <img src="slide/sd-2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 >Emergency</h5>
          <p>emergency ambulance service, equipment service, icu service </p>
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <img src="slide/sd-1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Special equipment facilities</h5>
          <p>VENTILATOR, CPAP SYSTEM, BPAP SYSTEM, PATIENT MONITOR,
            INFUSION PUMP, SYRINGE PUMP, BLOOD WARMER, DEFIBRILLATOR
          </p>
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <img src="slide/sd-8.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Surgical Medical Products</h5>
          <p>Needle, Syringe Destroyer, Nail Brushes, Timer, Oxygen Cylinder ,Accessories, Multi Purpose Scissor, Torches ,Oxygen Concentrators and Cylinder and many more</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!-- admin section -->
<div class="container-fluid">
    <div class="row">
      <div class="col-md-4 mt-4">
      <div class="card" style="width: 26rem;">
    <img src="slide/booking.jpg" class="card-img-top" alt="...">
    <div class="card-body">
       <a href="patient/index.php" class="btn btn-primary">Patien Section</a>
      </div>
   </div>
      </div>
      <div class="col-md-4 mt-4 p-2">
        <img src="slide/control/sd-4.jpg" class="img-fluid img-thumbnail"  alt="" class="mt-5">
      </div>
      <div class="col-md-4">
        <p class="text-dark">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h3 class="display-4">Server Control Panel</h3>
              <p class="lead">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrative Panel
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="Admin_login.php">Admin Panel</a>
                    <a class="dropdown-item" href="doctor/docLogin.php">Doctor Panel</a>
                </div>
              </p>
            </div>
          </div>
          
        </p>

      </div>
    </div>
  </div>
</div>


<footer class="bg-dark text-center text-lg-start">

  <!-- Copyright -->
  <div class="text-center text-light p-4 mt-2" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright: Smartcare
    
  </div>
  <!-- Copyright -->
</footer>











  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
