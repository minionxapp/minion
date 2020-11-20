{{-- <a href="/dashboard">Dashboard</a> <br>
<a href="/test">Test</a>
<a href="/awal">Awal</a> <br>
<a href="/login">Login</a> --}}

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  

  <title>MinionxApp</title>
{{-- 
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet"> --}}

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Minionxapp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/login">Login
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">A Warm Welcome!</h1>
      {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p> --}}
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-3 col-md-6 mb-4  col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="../images/gleads.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">G-Leads</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
          </div>
          <div class="card-footer">
            <a href="https://g-leads.disprz.com/#!/" class="btn btn-primary">G-Leads</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="../images/kms.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">KMS</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p> --}}
          </div>
          <div class="card-footer">
            <a href="https://kms.pegadaian.co.id/elearning/" class="btn btn-primary">KMS</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="../images/indonesiax.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">Card title</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">GadeX</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="../images/studilmu.png" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">Studilmu</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
          </div>
          <div class="card-footer">
            <a href="https://business.studilmu.com/" class="btn btn-primary">Studilmu</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="../images/google.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">Card title</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
          </div>
          <div class="card-footer">
            <a href="https://workspace.google.com/dashboard" class="btn btn-primary">Google</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 col-sm-6">
        <div class="card h-100">
          <img class="card-img-top" src="dist/img/minion/minion3.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">Judul</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p> --}}
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 col-sm-3">
        <div class="card h-100">
          <img class="card-img-top" src="dist/img/minion/minion3.jpg" alt="">
          <div class="card-body">
            {{-- <h4 class="card-title">Card title</h4> --}}
            {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p> --}}
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  {{-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="../plugins/datatables-rowreorder/js/dataTables.rowReorder.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<link href='../dist/calendar/lib/main.css' rel='stylesheet' />
<script src='../dist/calendar/lib/main.js'></script>
<script src="../plugins/moment/moment.min.js"></script>

</body>

</html>

