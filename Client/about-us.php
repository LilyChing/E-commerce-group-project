<?php 
  session_start(); 
  $pages = (object) [
    array('path' => 'index.php', 'name'=> 'Home'),
    array('path' => 'about-us.php', 'name'=> 'About Us'),
    array('path' => 'sim.php', 'name'=> 'SIM Cards'),
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
  <title>Introduction | Leading Duck Tourism</title>
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
  <!-- About us body -->
  <div class="container">
    <h1 class="my-4">About Us</h1>

    <img src="./asset/banner.png" width="100%"/><br/>

    <p><b>Welcome to Leading Duck Tourism!</b></p>
    <p>
        At Leading Duck Tourism, we believe that every journey should be an unforgettable adventure. 
        Our mission is to provide you with exceptional travel experiences that are tailored to your unique interests and preferences. 
        Whether you’re seeking a serene escape to nature, an exhilarating urban exploration, or a cultural immersion, 
        we have the perfect itinerary for you.
    </p>     
    <p>
        Our team of passionate travel experts is dedicated to crafting personalized trips that go beyond the ordinary. 
        With a deep knowledge of destinations around the globe and a commitment to outstanding service, 
        we ensure that every detail of your trip is meticulously planned and executed.
    </p>    
    <p>
        Discover the best of travel with Leading Duck Tourism. We offer a variety of tours, including immersive Hong Kong local tours,
         captivating Europe tours, and exciting Asia tours.
         To enhance your travel experience, we also provide essential travel goods such as 
         SIM cards, and suitcases. Everything you need for a smooth and enjoyable journey is right here.
    </p>
    <p>    
        Join us at Leading Duck Tourism and let us guide you to the world’s most captivating destinations.
        Your dream vacation awaits! 
    </p>    

    <img src="./asset/all_tour.png"/>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>
</html>