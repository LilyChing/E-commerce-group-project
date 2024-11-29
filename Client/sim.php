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
              <img src="./asset/'.$imgSrc.'" class="card-img-top" alt="...">
            </a>
          </div>
          <div class="card-body">
            <a href="" class="text-black text-decoration-none">
              <h3 class=" h5 card-title">'.$title.'</h3>
            </a>
            <a class="h6 text-primary text-decoration-none" href="#">'.$category.'</a>
            <div class="operate d-flex mt-3 justify-content-between align-items-center">
            <div class="price">
              <span class="badge text-success border border-success">$'.$u_price.'</span>
            </div>

            <button type="button" class="btn btn-success display-6 pt-1 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop_'.$product_id.'">
              Add to Cart
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
              </svg>
            </button>
              '.addtoCartPop($product_id, $imgSrc,  $title, $u_price).'
            </div>  
          </div>
        </div>
      </div>  
    ';
  }

  function partnerCard($imgSrc,$title,$url){
  return '
    <div class="col-3">
      <div class="card w-100 border border-0" style="width: 18rem;">
        <div class="position-relative">
          <a href="'.$url.'">
            <img src="./asset/'.$imgSrc.'" class="card-img-top" alt="...">
          </a>
        </div>
        <div class="card-body">
          <h3 class=" h5 card-title">'.$title.'</h3>
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
    <link rel="stylesheet" href="product.css">\
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
    <!-- navBar -->
        <div class="product-container">
            <div class="product-card">
            <h1>SIM Cards</h1>
            </div> 
        </div>
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/sim sg.jpg" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">Singapore</div>
                        <div class="product-price">$188</div>
                        <div>SIM Card - Singapore (1/3/5/7 Days)</div>
                        <p>3/5/10/12GB Data</p>
                        <button class="add-to-cart" >Add to cart</button>
                    </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/sim Italy.jpg" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">Italy</div>
                        <div class="product-price">$188</div>
                        <div>SIM Card - Italy (1/3/5/7 Days)</div>
                        <p>3/5/10/12GB Data</p>
                        <button class="add-to-cart">Add to cart</button>
                    </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/sim japan.jpg" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">Japan</div>
                        <div class="product-price">$88</div>
                        <div>SIM Card - Japan (1/3/5/7 Days)</div>
                        <p>3/5/10/12GB Data</p>
                        <button class="add-to-cart">Add to cart</button>
                    </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/sim korea.jpg" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">Korea</div>
                        <div class="product-price">$88</div>
                        <div>SIM Card - Korea (1/3/5/7 Days)</div>
                        <p>3/5/10/12GB Data</p>
                        <button class="add-to-cart">Add to cart</button>
                    </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-card">
                <img src="./asset/sim thai.jpg" class="custom-size">
                    <div class="product-info">
                        <div class="product-title">Thai</div>
                        <div class="product-price">$58</div>
                        <div>SIM Card - Thai (1/3/5/7 Days)</div>
                        <p>3/5/10/12GB Data</p>
                        <button class="add-to-cart">Add to cart</button>
                    </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

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
                <td>SIM Cards</td>
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
                    <a target=”_blank” href="https://www.facebook.com/">
                    <img src="./asset/facebook.png"/> Facebook </a>
                    </td>
                <tr>
                    <td>
                        <a target=”_blank” href="https://www.intagram.com/">
                        <img src="./asset/intagram.png"/> Intagram</a>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <a target=”_blank” href="https://www.youtube.com/">
                        <img src="./asset/youtube.png"/> Youtube</a> 
                    </td>
                </tr>       
            </table>
        </footer>
    </body>
</html>