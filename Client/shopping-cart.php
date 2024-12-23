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
  if(!isset($_SESSION['cartList'])){
    $_SESSION['cartList'] = array();
  }
  // While clicking delete_item button
  if(isset($_POST['delete_item'])){
    // Remove item from $_SESSION['cartList']
    array_splice($_SESSION['cartList'], $_POST['delete_item'], 1);
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
  <link rel="stylesheet" type="text/css" href="product.css">
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
    <form action="thank-you-page.php" method="POST">
    <div class="row mb-5">
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
                <input type="text" class="form-control" id="contactName" name="cName" placeholder="Enter your name" required />
              </div>
              <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                <div class="flex-fill">
                  <label for="contactPhone" class="form-label">Contact Number</label>
                  <input type="tel" class="form-control" id="contactPhone" name="cNumber" placeholder="########" pattern="\d{8}" required />
                </div>
                <div class="flex-fill">
                  <label for="contactEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="contactEmail" name="cEmail" placeholder="Enter your Email" required />
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
                <input type="text" class="form-control" id="recipientName" name="sName" placeholder="Enter the recipient's name" required />
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" class="form-control" id="address" name="sAddress" rows="2" required ></textarea>
              </div>
              <div class="mb-3 d-flex flex-column flex-lg-row gap-3">
                <div class="flex-fill">
                  <label for="cityAddress" class="form-label">City</label>
                  <input type="text" class="form-control" id="cityAddress" name="sCity" required />
                </div>
                <div class="flex-fill">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="sCountry" required />
                </div>
              </div>
              <div class="mb-3">
                <label for="postalCode" class="form-label">ZIP / Postal Code</label>
                <input type="number" class="form-control" id="postalCode" name="sPostcode" size="5" min="0" maxlength="5" required />
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
                <input class="form-check-input" type="radio" name="payment_method" id="fps" value="fps" checked />
              </div>
              <div class="form-check mb-2">
                <label class="form-check-label" for="payMe">PayMe</label>
                <input class="form-check-input" type="radio" name="payment_method" id="payMe" value="payMe" />
              </div>
              <div class="form-check mb-2">
                <label class="form-check-label" for="alipay">Alipay</label>
                <input class="form-check-input" type="radio" name="payment_method" id="alipay" value="alipay" />
              </div>
              <span class="text-danger">**After completing the payment, please Whatsapp the receipt to  +852 2111 1234.</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Right section -->
      <div class="col-12 col-lg-5">
        <h5>Order Details</h5>
          <!-- Using for loop to create product card -->
        <?php
          // var_dump($_SESSION['cartList']);
          foreach ($_SESSION['cartList'] as $item_index => $item) {
            echo '<div class="row p-2">';
            echo '<div class="col-4 d-flex align-items-center">
                    <img src="./asset/'.$item['imgSrc'].'" class="w-100" />
                  </div>';
            echo '<div class="col-8">
                    <div class="product-title">'.$item['product_title'].'</div>';
            echo '<div class="d-flex gap-3 justify-content-between">
              <div>
                <select class="form-select" aria-label="quantity" name="items['.$item_index.'][order_qty]" >';
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
                  <button type="submit" formaction="" method="POST" formnovalidate="formnovalidate" class="btn text-danger" name="delete_item" value="'.$item_index.'" >Delete</button>
                </div>
              </div>
            <hr/>';
            echo '<input type="hidden" name="items['.$item_index.'][product_id]" value="'.$item['product_id'].'">';
            echo '<input type="hidden" name="items['.$item_index.'][product_name]" value="'.$item['product_title'].'">';
            echo '<input type="hidden" name="items['.$item_index.'][product_price]" value="'.$item['u_price'].'">';
            echo '<input type="hidden" name="items['.$item_index.'][img_src]" value="'.$item['imgSrc'].'">';
          }
        ?>
        <!-- Checkout information: count Subtotal & Total amount -->
        <div class="d-flex justify-content-between mt-5" >
          <span>Subtotal</span>
          <?php 
            $subtotal = 0;
            if(count($_SESSION['cartList']) > 0){
              foreach ($_SESSION['cartList'] as $item) {
                $subtotal += (float)$item['u_price'] * (int)$item['quantity'];
              }
            }
            echo "<span>$". number_format($subtotal, 2).'</span>';
          ?>
         </div>
         <div class="text-end text-danger">Enjoy FREE tracked delivery on all FULFIL orders over HK$300 !</div>
         <hr/>
         <div class="d-flex justify-content-between" >
          <span>Shipping Fee</span>
          <?php 
            $shipping = 0;
            if(count($_SESSION['cartList']) > 0 && $subtotal <300){
              $shipping = 249;
            }
            echo "<span>$". number_format($shipping, 2).'</span>';
            echo '<input type="hidden" name="shipping" value="'.$shipping.'">';
          ?>
         </div>
         <hr/>
         <div class="d-flex justify-content-between mb-4" >
          <h5><b>Total</b></h5>
          <?php
            echo '<h5><b>$'.number_format(($subtotal + $shipping), 2).'</b></h5>';
          ?>
        </div>
        <!-- Checkout button -->
        <script>
          window.addEventListener('beforeunload', function (event) {
              // Display a confirmation dialog
              const confirmationMessage = "Are you sure you want to leave this page?";
              event.returnValue = confirmationMessage; // Standard way
              return confirmationMessage; // For older browsers
          });
        </script>
        <button type="submit" name="checkout" value="Checkout" class="btn btn-dark w-100 py-2 rounded-pill">Buy Now</button>
      </div>
    </div>
    </form>
   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>
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
</html>