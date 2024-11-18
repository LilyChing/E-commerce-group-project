<?php
$cName = $_POST['cname']; //customer name
$items = $_POST['items[]'];
$amount = $_POST['price[]'];
$shipping = 30;

echo "<h1>Order Summary</h1>"." for ".$cname."<br/><br/>";
echo "Item<br/>";
$subtotal = 0; 
foreach ($items as $index => $item) {
  $quantity = 1;
  $price = $amounts[$index];
  echo htmlspecialchars($item) . " x " . $quantity . " = $" . number_format($price * $quantity, 2) . "<br/>";
  $subtotal += $price * $quantity;
}

echo "Subtotal<br/><br/><br/><br/><br/><br/>$". number_format($subtotal, 2);
if ($subtotal<100) {
echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".number_format($shipping, 2)."<br/>";
 $total = $subtotal + $shipping;
  "<b>Total</b><br/>$" . "<b>".number_format($total, 2) . "</b>";
}
else{echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".0;
    $total = $subtotal;
    echo"<b>Total</b><br/>$" . "<b>".number_format($total, 2) . "</b>"}

echo "Thank you!";
?>
