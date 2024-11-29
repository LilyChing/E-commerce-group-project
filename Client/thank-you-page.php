<?php
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
  echo htmlspecialchars($item['product_name']) ." $". $price . " x " . $quantity . str_repeat('&nbsp;', 3)." = $" . number_format($price * $quantity, 2) . "<br/>";
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
