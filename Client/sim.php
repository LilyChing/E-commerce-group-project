<?php 
  session_start(); 
  $pages = (object) [
    array('path' => 'index.php', 'name'=> 'Home'),
    array('path' => 'about-us.php', 'name'=> 'About Us'),
    array('path' => 'sim.php', 'name'=> 'SIM Cards'),
    array('path' => 'tour.php', 'name'=> 'Tour Services'),
    array('path' => 'travel-accessories.php', 'name'=> 'Travel Accessories'),
  ];
  // store session data
  $_SESSION['productsInCart'] = 0;
  if(!isset($_SESSION['cartList'])){
    $_SESSION['cartList'] = array();
  }
  if (isset($_POST['submit'])) {
    $product = array();
    $product['product_id'] = (int)$_POST['product_id'];
    $product['product_title'] = $_POST['product_title'];
    $product['imgSrc'] = $_POST['imgSrc'];
    $product['u_price'] = (int)$_POST['u_price'];
    $product['quantity'] = (int)$_POST['quantity'];
    $_SESSION['cartList'][] = $product;
  }

  function addToCartPop($product_id, $imgSrc, $title, $u_price){
    return '
                <div class="modal fade" id="staticBackdrop_'.$product_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter Quantity</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body">
                          <label for="quantity">How many items do you want to add to cart ?</label> <br/>
                          <input type="hidden" name="product_id" value="'.$product_id.'">
                          <input type="hidden" name="product_title" value="'.$title.'">
                          <input type="hidden" name="imgSrc" value="'.$imgSrc.'">
                          <input type="hidden" name="u_price" value="'.$u_price.'">
                          <input type="number" name="quantity" id="quantity" min="1" max="10" value="1" />
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
    ';
  }

  function productCard($product_id, $imgSrc, $title, $category, $u_price){
    return '
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/'.$imgSrc.'" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">'.$title.'</div>
                        <div class="badge text-success border border-success font-size-18;">$'.$u_price.'</div>
                        <div>'.$category.'</div>
                        '.addtoCartPop($product_id, $imgSrc,  $title, $u_price).'
                    </div>
                    <div class="d-flex align-items-center ms-auto">
                      <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2 ms-auto " data-bs-toggle="modal" data-bs-target="#staticBackdrop_'.$product_id.'">
                        Add to Cart
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                      </button>
                    </div>
            </div>
        </div>
    ';
  }
?>
<!DOCTYPE html>
<html>
    <head>
    <title>SIM card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="product.css">
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
            if(isset($_SESSION['cartList']) && count($_SESSION['cartList']) > 0){
              echo '<span class="position-absolute translate-middle badge rounded-pill bg-danger">'.count($_SESSION['cartList']);
              echo '<span class="visually-hidden">Products in Cart</span></span>';
            }
          ?>
        </a>
      </div>
    </div>
  </nav>
    <!-- navBar -->
        <div class="product-container">
            <div class="product-card">
            <h1>SIM Cards</h1>
            </div> 
        </div>
        <?php
          echo productCard(1001,"sim sg.jpg","Singapore","SIM Card - Singapore (1/3/5/7 Days)","188");
          echo productCard(1002,"sim Italy.jpg","Italy","SIM Card - Italy (1/3/5/7 Days)","188");
          echo productCard(1003,"sim japan.jpg","Japan","SIM Card - Japan (1/3/5/7 Days)","88");
          echo productCard(1004,"sim korea.jpg","Korea","SIM Card - Korea (1/3/5/7 Days)","88");
          echo productCard(1005,"sim thai.jpg","Thai","SIM Card - Thai (1/3/5/7 Days)","58");
        ?>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
       <footer>
        <hr/>
            <div class ="m-5">
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
                        <a target="_blank" href="https://www.facebook.com/">
                        <img src="./asset/facebook.png"/> Facebook </a>
                        </td>
                    <tr>
                        <td>
                            <a target="_blank" href="https://www.intagram.com/">
                            <img src="./asset/intagram.png"/> Intagram</a>
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <a target="_blank" href="https://www.youtube.com/">
                            <img src="./asset/youtube.png"/> Youtube</a> 
                        </td>
                    </tr>       
                </table>
            </div>
    </footer>
    </body>
</html>