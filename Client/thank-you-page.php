<?php
$cName = $_POST['cname']; //customer name
$items = $_POST['items[]'];
$amount = $_POST['price[]'];
$shipping = 30; //Shipping fee

echo "<h1>Order Summary</h1>"." for ".$cname."<br/><br/>";
echo "Item<br/><br/>";
$subtotal = 0; //sum of products
foreach ($items as $index => $item) {
  $quantity = 1;
  $price = $amounts[$index];
  echo htmlspecialchars($item) . " x " . $quantity . " = $" . number_format($price * $quantity, 2) . "<br/><br/>";
  $subtotal += $price * $quantity;
}

echo "Subtotal<br/><br/><br/><br/><br/><br/>$". number_format($subtotal, 2)."<br/><br/>";

// Total amount

if ($subtotal<300) {
echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".number_format($shipping, 2)."<br/><br/>";
 $total = $subtotal + $shipping;
  echo"<b>Total</b><br/>$" . "<b>".number_format($total, 2) . "</b><br/><br/>";
}
else{echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".0."<br/><br/>";
    $total = $subtotal;
    echo"<b>Total</b><br/>$" . "<b>".number_format($total, 2) . "</b><br/><br/>";}

echo "Thank you!";
?>
