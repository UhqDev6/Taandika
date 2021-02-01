<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pendukung Keputusan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="bootstrap/assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="bootstrap/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Siimple - v2.2.2
  * Template URL: https://bootstrapmade.com/free-bootstrap-landing-page/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container-fluid">

      <div class="logo float-left">
        <!-- <h1 class="text-light"><a href="index.html"><span>Siimple</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
<!-- 
      <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#why-us">Why Us</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>.nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Sistem Pendukung Keputusan</h1>
      <h2>Menggunakan Metode Vikor</h2>

      <form method="POST" action="{{ route('login') }}" role="form" >
      @csrf
      <div class="php-email-form">
        <div class="row no-gutters">
          <div class="col-md-6 form-group pl-md-1">
            <input type="email" id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder = "Email" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-md-6 form-group pr-md-1">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{ old('password') }}"  required autocomplete="current-password" placeholder ="Password" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <!-- <div class="mb-1">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your notification request was sent. Thank you!</div>
        </div> -->
        <div class="text-center"><button type="submit"> {{ __('Login') }}</button></div>
        </div>
    </form>
    </div>
  </section><!-- #hero -->




  <!-- Vendor JS Files -->
  <script src="bootstrap/assets/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="bootstrap/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="bootstrap/assets/js/main.js"></script>

</body>

</html>