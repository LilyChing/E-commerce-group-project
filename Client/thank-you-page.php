<?php
//MySQL
$sqlservername = "localhost";
$sqlusername = "username";
$sqlpassword = "password";
$dbname = "myDB";
//Contact information (User input)
$cName = $_POST['cname'];
$cNumber = $_POST['ctelno'];
$cEmail = $_POST['cemail'];
//Shipping Address
$sName = = $_POST['sname'];
$sAddress = $_POST['saddress'];
$sCity = $_POST['scity'];
$sCountry = $_POST['scountry'];
$sPostcode = $_POST['cpostcode'];
//Payment method and order detail
$payment_method = $_POST['payments[]'];
$order_time = date("Y-m-d");
  
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Prepare and bind
$stmt = $conn->prepare("INSERT INTO PurchaseData (order_id,cName, cNumber, cEmail, sName, sAddress, sCity, sCountry, sPostcode, payment_method,order_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss",sequence_1.nextval, $cName, $cNumber, $cEmail, $sName, $sAddress, $sCity, $sCountry, $sPostcode, $payment_method,$order_time);

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
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
$order_time = date("Y/m/d");

// Products Bought
$items = $_POST['items'];
// Shipping Fee
$shipping = $_POST['shipping']; //Shipping fee

echo "<h1>Order Summary</h1>"." for ".$cName."<br/><br/>";
echo "Item(s)<br/><br/>";
$subtotal = 0; //sum of products
foreach ($items as $index => $item) {
  $quantity = $item['order_qty'];
  $price = $item['product_price'];
  echo "<tr><td>"htmlspecialchars($item['product_name'])."</td>" ."<td>"." $". $price."</td>" ."<td>". $quantity."</td>" . "<td>".str_repeat('&nbsp;', 3)."</td>" ."<td>"."= $" . number_format($price * $quantity, 2) ."</td></tr>" . "<br/>";
  $subtotal += $price * $quantity;
}

echo "Subtotal".str_repeat('&nbsp;', 5)."$". number_format($subtotal, 2)."<br/><br/>";

// Total amount
echo "Shipping".str_repeat('&nbsp;', 5)."$".$shipping."<br/><br/>";
 $total = $subtotal + $shipping;
  echo"<hr/>";
  echo"<b>Total</b>" . "<b>". str_repeat('&nbsp;', 5).'$'.number_format($total, 2) . "</b><br/><br/>";

echo "<h1>Thank you!</h1>";
?>
