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
