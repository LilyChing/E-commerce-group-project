<?php 
  session_start(); 
  $pages = (object) [
    array('path' => 'index.php', 'name'=> 'Home'),
    array('path' => 'about-us.php', 'name'=> 'About Us'),
    array('path' => 'wifi-egg.php', 'name'=> 'WiFi Egg / SIM Cards'),
    array('path' => 'tour.php', 'name'=> 'Travel Services'),
    array('path' => 'travel-accessories.php', 'name'=> 'Travel Accessories'),
  ];
  // store session data
  $_SESSION['productsInCart'] = 0;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Change the title to your page name -->
  <title>Home | Leading Duck Tourism</title>
  <link rel="icon" href="./asset/rubber-duck-yellow.png" type="image/icon type">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" type="text/css" href="all.css">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
  <!-- navBar -->
  <nav class="navbar navbar-expand-lg " style="background: linear-gradient(135deg, #65ACFF, #ABD2FF)">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./asset/logo_small.png" alt="logo" height="58">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav gap-3 me-auto mb-2 mb-lg-0">
          <?php
            foreach ($pages as $page) {
              echo '<li class="nav-item d-flex align-items-center">';
              if(basename($_SERVER['PHP_SELF']) == $page['path']){
                echo '<a class="nav-link fw-bold active" aria-current="page" style="color: #FFE000;" href="'.$page['path'].'">'.$page['name'].'</a><img src="./asset/rubber-duck-yellow.png" alt="logo" height="20"></li>';
              }else{
                echo '<a class="nav-link text-white" href="'.$page['path'].'">'.$page['name'].'</a><img src="./asset/rubber-duck-white.png" alt="logo" height="20"></li>';
              }
            }
          ?>
        </ul>
        <a type="button" class="btn btn-link" href="shopping-cart.php" >
          <i class="bi bi-cart3" style="font-size: 2rem; color: white;"></i>
          <?php
            if($_SESSION['productsInCart'] > 0){
              echo '<span class="position-absolute translate-middle badge rounded-pill bg-danger">'.$_SESSION['productsInCart'];
              echo '<span class="visually-hidden">Products in Cart</span></span>';
            }
          ?>
        </a>
      </div>
    </div>
  </nav>
  <!-- index page body -->
  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./asset/slideshow1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./asset/slideshow1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./asset/slideshow1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
  <div class="container pt-5">
    <h2 class="h3 pb-3">About Us</h2>
    <img src="./asset/aboutUs.png" alt="about us" width="100%">
  </div>
  <div class="container pt-5">
    <h2 class="h3 pb-3">Featured Tour</h2>
    <div class="row pb-4">
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/HongKong.png" alt="" width="100%">
          </a>
        </div>
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/Japan.png" alt="" width="100%">
          </a>
        </div>
      </a>
    </div>
    <div class="row pb-4">
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/Italy.png" alt="" width="100%">
          </a>
        </div>
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/Korea.png" alt="" width="100%">
          </a>
        </div>
    </div>
    <div class="row pb-4">
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/Singapore.png" alt="" width="100%">
          </a>
        </div>
        <div class="col">
          <a href="./tour.php">
            <img src="./asset/Thailand.png" alt="" width="100%">
          </a>
        </div>
    </div>
  </div>
  <div class="container pt-5">
    <h2 class="h3 pb-3">WiFi  Egg / SIM Cards</h2>
    
      <div class="row ">
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="./tour.php">
                <img src="./asset/SIM_temp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="./tour.php" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">SIM Card - Singapore</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="./tour.php">
                <img src="./asset/SIM_temp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="./tour.php" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">SIM Card - Singapore</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="./tour.php">
                <img src="./asset/SIM_temp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="./tour.php" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">SIM Card - Singapore</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="./tour.php">
                <img src="./asset/SIM_temp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="./tour.php" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">SIM Card - Singapore</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
    </div>
  </div>



  <div class="container pt-5">
    <div class="row align-items-center">
      <div class="promotion_text col-7">
        <h2>Join Our Autumn Sales ! </h2>
        <p class="mt-2">
          As the leaves turn golden and the air gets crisp, it’s the perfect time to embark on a new adventure. 
          At Leading Duck Tourism, we’re excited to offer you exclusive autumn deals that will make your travel dreams come true. 
          Whether you’re looking to explore vibrant cities, relax in cozy countryside retreats, or experience the magic of fall foliage, we have the perfect getaway for you.<br/>
          Join us in celebrating the beauty of autumn with unbeatable discounts on flights, hotels, and vacation packages. Don’t miss out on this opportunity to create unforgettable memories with your loved ones. 
          Book now and let the adventure begin!
        </p>
      </div>
      <div class="promotion_img col-5 px-4">
        <img src="./asset/promotion_img.png" alt="" width="100%">
      </div>
    </div>
  </div>



  <div class="container pt-5">
    <h2 class="h3 pb-3">Travel Accessories</h2>
    
      <div class="row ">
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="#">
                <img src="./asset/productTemp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">RIMOWA - Cabin</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="#">
                <img src="./asset/productTemp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">RIMOWA - Cabin</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="#">
                <img src="./asset/productTemp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">RIMOWA - Cabin</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                        <input type="number" name="quantity" id="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card w-100" style="width: 18rem;">
            <div class="position-relative">
              <span class="badge rounded-pill text-bg-light position-absolute mt-2 ms-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF9A62" class="bi bi-fire" viewBox="0 0 16 16">
                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
              </svg>
                Hot Item
              </span>
              <div class="like_btn position-absolute end-0 mt-2 me-2 p-3 bg-white">
                <div class="like_btn_group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart d-none" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                  </svg>
                </div>
              </div>
              <a href="#">
                <img src="./asset/productTemp.png" class="card-img-top" alt="...">
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-black text-decoration-none">
                <h3 class=" h5 card-title">RIMOWA - Cabin</h3>
              </a>
              <a class="h6 text-primary text-decoration-none" href="#">SIM Cards</a>
              <div class="operate d-flex mt-3 justify-content-between align-items-center">
                <div class="price">
                  <span class="badge text-success border border-success">$100</span>
                </div>

                <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Add to Cart
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
    </div>
  </div>



  <div class="container pt-5">
    <h2 class="h3 pb-3">Our Partners</h2>
    
    <div class="row text-center">
      <div class="col-3">
        <div class="card w-100 border border-0" style="width: 18rem;">
          <div class="position-relative">
            <a href="https://www.trivago.hk/">
              <img src="./asset/trivago.png" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <h3 class=" h5 card-title">Trivageo</h3>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card w-100 border border-0" style="width: 18rem;">
          <div class="position-relative">
            <a href="https://www.booking.com/">
              <img src="./asset/bookingcom.png" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <h3 class=" h5 card-title">Booking.com</h3>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card w-100 border border-0" style="width: 18rem;">
          <div class="position-relative">
            <a href="https://www.hotels.com/">
              <img src="./asset/hotelcom.png" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <h3 class=" h5 card-title">Hotels.com</h3>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card w-100 border border-0" style="width: 18rem;">
          <div class="position-relative">
            <a href="https://www.agoda.com/">
              <img src="./asset/agoda.png" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <h3 class=" h5 card-title">Agoda</h3>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>
<footer>
    <img src="./asset/logo_small.png" />
    <table style="width:100%">
        <tr>
            <th align="left">Download apps </th>
            <th align="left">Products</th>
            <th align="left">Shopping Cart</th>
            <th align="left">Help</th>
            <th align="left">Contact Us</th>
        </tr>
        <tr>
           <td rowspan="4"><img src="./asset/leadingduck.png" width="150px" height="150px"/></td>
           <td>Tour Service</td>
           <td>Order Details</td>
           <td>Support</td>
           <td rowspan="4" td id="top">Address<br/>Room 1201, 12/F, Polyu Hung Hom Bay<br/>
            Campus, Hung Lok Road, Hung Hom,<br/>
            Kowloon<br/>
            <br/>
            Opening Hour:<br/>
                Monday to Friday: 8:30 am - 5:30<br/>
                Saturday, Sunday and Public holidays are closed
        </td>
            <td>Hotline: (852) 3746 0900</td>
       </tr>
       <tr>
        <td>Wifi Egg /  SIM Cards</td>
        <td>Payment Method</td>
        <td>Term & Conditons</td>
        </tr>

        <tr>
            <td>Travel Accessories</td>
           <td></td>
            <td>Privary Policy</td>
            <td>WhatsApp: (852) 3746 0888</td>
         </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Refund Policy</td>
            <td>Email:  <a href="mailto:leading_duck102@outlook.com">leading_duck102@outlook.com</a>
            </td>
            </tr>
          <tr>
            <td><b> More About Us</b></td>
         </tr>
         <tr>
            <td>
            <a href="https://www.facebook.com/">
            <img src="./asset/facebook.png"/> Facebook </a>
            </td>
        <tr>
            <td>
                <a href="https://www.intagram.com/">
                <img src="./asset/intagram.png"/> Intagram</a>
            </td>
           </tr>
           <tr> 
            <td>
                <a href="https://www.youtube.com/">
                <img src="./asset/youtube.png"/> Youtube</a> 
            </td>
        </tr>       
      </table>
</footer>
</body>
</html>