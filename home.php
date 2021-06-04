<?php
session_start();
// print_r($_SESSION);

if(!isset($_SESSION['username'])){
    echo "you are logged out";
    header('location: login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>iRecyclerz</title>
      <link rel="stylesheet" href="style.css">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

</head>
<body>
  

	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <img src="logo.png" style="width: 100px; height:100px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ideas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Appointements</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resources
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Carfax</a>
                        <a class="dropdown-item" href="#">Carproof</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Omnivic</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" type="button" href="a.php" >Sign In</a>                  
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" type="button" href="logout.php" >Logout</a>
                </li>
            </ul>
        </div>

            <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer Sign In</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <label class="sr-only" for="usrname">Username</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <label class="sr-only" for="Password">Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                            </div>
                            <input id="Password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Sign In</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
            

    </nav>

  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="h1.jpg" >
        <div class="carousel-caption d-none d-md-block align-self-center ">
        <h2 class="animated bounceInRight " style="animation-delay: 1s; height:180px">
      We Are Reliable</h2>
      <h3 class="animated bounceInLeft" style="animation-delay: 2s; height:180px">
      Lorem ipsum dolor sit amet.</h3>
         
  
  </div>
  </div>
  <div class="carousel-item">
        <img class="d-block w-100" src="IMG-20210406-WA0033.jpg" >
        <div class="carousel-caption d-none d-md-block ">
        <h2 class="animated slideInDown" style="animation-delay: 1s; height:180px">
      We Deliver On Time</h2>
      <h3 class="animated slideInRight" style="animation-delay: 2s; height:180px">
      Lorem ipsum dolor sit amet.</h3>
  
        </div>
  </div>
  <div class="carousel-item">
        <img class="d-block w-100" src="h3.png" >
        <div class="carousel-caption d-none d-md-block">
        <h2 class="animated zoomIn" style="animation-delay: 1s; height:180px">
      SAVE YOUR PLANET</h2>
      
          
  
  </div>
  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 
  <div class="card" style="width: 18rem; margin-top: -60px; margin-left: 100px;">
   <h2>REDUCE</h2>
  <div class="card-body">
    
    <p class="card-text">Reduce the amount of waste you produce.</p>
    <a href="#" class="btn btn-primary">Go To Description</a>
  </div>
</div>
<br>

<div class="card" style="width: 18rem; margin-top: -213px; margin-left: 500px;">
   <h2>REUSE</h2>
  <div class="card-body">
    
    <p class="card-text">Reuse items as much as you can before replacing them.</p>
    <a href="#" class="btn btn-primary">Go To Description</a>
  </div>
</div>
<br>
<br>

<div class="card" style="width: 18rem; margin-top: -240px; margin-left: 900px;">
   <h2>RECYCLE</h2>
  <div class="card-body">
    
    <p class="card-text">Putting a product to a new use instead of throwing it away.</p>
    <a href="#" class="btn btn-primary">Go To Description</a>
  </div>
</div>
<br>
<br>
<br>
<div class="container" style="font-family: 'Times New Roman', Times, serif; text-align:center">
    <h2>WELCOM TO iRECYCLERZ</h2>
    <p> iRecyclerz is to engendering a bridge between the industries
        and the waste collectors to get the facileness of communication
        and accommodation. This project is using the IOT technology as
        this project is modernizing a way of communication between waste
        producer and waste collector using a mobile application and internet 
        access.</p>
</div>
<br>
<br>
<br>
<section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Initial Work</h4>
                            <p>Proin euismod sem ut diam ultricies, ut faucibus velit ultricies. Nam eu turpis quam. Duis ac condimentum eros.</p>
                            <a href="#" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img src="assets/images/features-icon-1.png" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Smooth Execution</h4>
                            <p>Proin euismod sem ut diam ultricies, ut faucibus velit ultricies. Nam eu turpis quam. Duis ac condimentum eros.</p>
                            <a href="#" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Footer -->
<footer class="bg-dark text-center text-lg-start  text-light">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">iRecyclerz</h5>

        <p>
        iRecyclerz is to engendering a bridge between the industries
        and the waste collectors to get the facileness of communication
        and accommodation. This project is using the IOT technology as
        this project is modernizing a way of communication between waste
        producer and waste collector using a mobile application and internet 
        access.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-light">
        <h5 class="text-uppercase">News</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-light">Karachi</a>
          </li>
          <!-- <li>
            <a href="#!" class="text-light">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-light">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-light">Link 4</a>
          </li> -->
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ">
        <h5 class="text-uppercase mb-0  ">About</h5>

        <ul class="list-unstyled " style="color: white;">
          <li>
            <a href="#!" class="text-light">Projects</a>
          </li>
          <li>
            <!-- <a href="#!" class="text-light">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-light">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-light">Link 4</a>
          </li> -->
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
 
</footer>
<!-- Footer -->

  
</body>
</html>