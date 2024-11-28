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
  if(!isset($_SESSION['cartList'])){
    $_SESSION['cartList'] = array();
  }
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
  <link rel="stylesheet" type="text/css" href="wifi-egg.css">
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
  <!-- Cart body -->
   <div class="container">
    <h1 class="my-4">Checkout</h1>
    <div class="row">
      <!-- Left section -->
      <div class="col-12 col-lg-7">
        <div class="d-flex flex-column gap-4 me-5">
          <!-- Contact Information Card -->
          <div class="card">
            <div class="card-header fs-5">
              Contact Information
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="contactName" class="form-label">Name</label>
                <input type="text" class="form-control" id="contactName" placeholder="Enter your name" required />
              </div>
              <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                <div class="flex-fill">
                  <label for="contactPhone" class="form-label">Contact Number</label>
                  <input type="tel" class="form-control" id="contactPhone"  placeholder="####-####" pattern="\d{4}-\d{4}" required />
                </div>
                <div class="flex-fill">
                  <label for="contactEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="contactEmail" placeholder="Enter your Email" required />
                </div>
              </div>
            </div>
          </div>
          <!-- Shipping Address Card -->
          <div class="card">
            <div class="card-header fs-5">
              Shipping Address
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="recipientName" class="form-label">Recipient Name</label>
                <input type="text" class="form-control" id="recipientName" placeholder="Enter the recipient's name" required />
              </div>
              <div class="mb-3">
                <label for="addressL1" class="form-label">Address line 1</label>
                <input type="text" class="form-control" id="addressL1" name="addressL1" required />
              </div>
              <div class="mb-3">
                <label for="addressL2" class="form-label">Address line 2</label>
                <input type="text" class="form-control" id="addressL2" name="addressL2" />
              </div>
              <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                <div class="flex-fill">
                  <label for="cityAddress" class="form-label">City</label>
                  <input type="text" class="form-control" id="cityAddress" name="cityAddress" required />
                </div>
                <div class="flex-fill">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country" required />
                </div>
              </div>
              <div class="mb-3">
                <label for="postalCode" class="form-label">ZIP / Postal Code</label>
                <input type="number" class="form-control" id="postalCode" name="postalCode" size="5" min="0" maxlength="5" required />
              </div>
            </div>
          </div>
          <!-- Payment Method Card -->
          <div class="card">
            <div class="card-header fs-5">
              Payment Method
            </div>
            <div class="card-body">
              <p>Please select your payment method.</p>
              <div class="form-check mb-2">
                <label class="form-check-label" for="fps">FPS</label>
                <input class="form-check-input" type="radio" name="paymentMethod" id="fps" value="fps" checked />
              </div>
              <div class="form-check mb-2">
                <label class="form-check-label" for="payMe">PayMe</label>
                <input class="form-check-input" type="radio" name="paymentMethod" id="payMe" value="payMe" />
              </div>
              <div class="form-check mb-2">
                <label class="form-check-label" for="alipay">Alipay</label>
                <input class="form-check-input" type="radio" name="paymentMethod" id="alipay" value="alipay" />
              </div>
              <span class="text-danger">**After completing the payment, please Whatsapp the receipt to  +852 2111 1234.</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Right section -->
      <div class="col-12 col-lg-5">
        <h5>Order Details</h5>
        <?php
          // var_dump($_SESSION['cartList']);
          foreach ($_SESSION['cartList'] as $item) {
            echo '<div class="row p-2">';
            echo '<div class="col-4">
                    <img src="./asset/'.$item['imgSrc'].'" class="w-100" />
                  </div>';
            echo '<div class="col-8">
                    <div class="product-title">'.$item['product_title'].'</div>';
            echo '<div class="d-flex gap-3 justify-content-between">
              <div>
                <select class="form-select" aria-label="quantity">';
            for ($i = 1; $i <= 10; $i++) {
              if($item['quantity'] == $i){
                echo '<option value="'.$i.'" selected >'.$i.'</option>';
              }else{
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            }
            echo  '</select>
              </div>';
            echo '<div class="product-price ms-auto">$'.$item['u_price'].'</div>';
            echo '</div>
                  <button type="button" class="btn text-danger">Delete</button>
                </div>
              </div>
            <hr/>';
          }
        ?>
        <div class="row p-2">
          <div class="col-4">
            <img src="./asset/SIM_temp.png" class="w-100" />
          </div>
          <div class="col-8">
            <div class="product-title">Fixed Product Sample</div>
            <div class="d-flex gap-3 justify-content-between">
              <div>
                <select class="form-select" aria-label="quantity">
                  <?php 
                    for ($i = 1; $i <= 10; $i++) {
                      echo '<option value="'.$i.'">'.$i.'</option>';
                      // selected
                    }
                  ?>
                </select>
              </div>
              <div class="product-price ms-auto">$999</div>
            </div>
            <button type="button" class="btn text-danger">Delete</button>
          </div>
          <hr/>
        </div>
      </div>
    </div>
   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>
</html>