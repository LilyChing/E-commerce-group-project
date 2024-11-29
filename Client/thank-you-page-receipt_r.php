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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Change the title to your page name -->
  <title>Thank you | Leading Duck Tourism</title>
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
  <!-- Receipt body -->
  <div class="container mb-5">
    <h1 class="my-4">Payment Successfully!</h1><br/>

    <img src="./asset/thank-you-logo.jpg" width="100%"/><br/><br/> Our Staff will contact you shortly for the order.<br/><br/>

   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

<?php
//MySQL
$SQLservername = "localhost";
$SQLusername = "root";
$SQLpassword = "";
$dbname = "onlineshop";
//Contact information (User input)
$cName = $_POST['cName'];
$cNumber = $_POST['cNumber'];
$cEmail = $_POST['cEmail'];
//Shipping Address
$sName = $_POST['sName'];
$sAddress = $_POST['sAddress'];
$sCity = $_POST['sCity'];
$sCountry = $_POST['sCountry'];
$sPostcode = $_POST['sPostcode'];
//Payment method 
$payment = $_POST['payment_method'];
date_default_timezone_set('Asia/Hong_Kong');
$order_time = date('m/d/Y h:i:s', time());

// Products Bought
$items = $_POST['items'];
// Shipping Fee
$shipping = $_POST['shipping']; //Shipping fee

// Create connection
$conn = mysqli_connect($SQLservername, $SQLusername, $SQLpassword, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert data
$insert_order_info_sql = "INSERT INTO order_info (cName, cNumber, cEmail, sName, sAddress, sCity, sCountry, sPostcode, payment_method) 
        VALUES (\"$cName\", \"$cNumber\", \"$cEmail\", \"$sName\", \"$sAddress\", \"$sCity\", \"$sCountry\", \"$sPostcode\", \"$payment\")";
if (mysqli_query($conn, $insert_order_info_sql)) {
  $order_id = mysqli_insert_id($conn);
  echo "order_info created successfully";
} else {
  echo "Error: " . $insert_order_info_sql . "<br>" . mysqli_error($conn);
}

foreach ($items as $item) {
  $insert_order_details_sql = "INSERT INTO order_details (order_id, product_id, order_qty) 
        VALUES ($order_id, ".$item['product_id'].", ".$item['order_qty'].")";
  if (mysqli_query($conn, $insert_order_details_sql)) {
    echo "order_details created successfully";
  } else {
    echo "Error: " . $insert_order_details_sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

echo "<h1>Order Summary</h1>"." for ".$cName."<br/><br/>";
 echo "<table border='0'>";
echo "<tr><td>"."Order ID : ".$order_id."</td>"."<td>"."Order Time :".$order_time."</td></tr>";
 echo "</table>"."<br/><br/>";
echo "Item(s)<br/><br/>";
$subtotal = 0; //sum of products
foreach ($items as $index => $item) {
  $quantity = $item['order_qty'];
  $price = $item['product_price'];
  echo "<table border='0'>";
  echo "<tr><td>".htmlspecialchars($item['product_name'])."</td>" ."<td>"." $". $price."</td>" ."<td>". $quantity."</td>" . "<td>".str_repeat('&nbsp;', 3)."</td>" ."<td>"."= $" . number_format($price * $quantity, 2) ."</td></tr>" . "<br/>";
  $subtotal += $price * $quantity;
  echo "</table>";
}

echo "Subtotal".str_repeat('&nbsp;', 5)."$". number_format($subtotal, 2)."<br/><br/>";

// Total amount
echo "Shipping".str_repeat('&nbsp;', 5)."$".$shipping."<br/><br/>";
 $total = $subtotal + $shipping;
  echo"<hr/>";
  echo"<b>Total</b>" . "<b>". str_repeat('&nbsp;', 5).'$'.number_format($total, 2) . "</b><br/><br/>";

echo "<h1>Thank you!</h1>";
?>

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
            </div>
    </footer>
</body>
</html>