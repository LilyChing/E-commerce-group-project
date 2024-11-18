<?php
$cName = $_POST['cname']; //customer name
$items = $_POST['items[]'];
$amount = $_POST['price[]'];
$shipping = 30;

echo "<h1>Order Summary</h1>"." for ".$cname."<br/><br/>";
echo "Item<br/>";
foreach ($items as $item => $price){
  echo $item."x".$times."$".$price;
}

echo "Subtotal<br/><br/><br/><br/><br/><br/>".;
if (<100) {
echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".$shipping;
}
else{echo "Shipping<br/><br/><br/><br/><br/><br/>"."$".0;}

echo "<b>Total<br/><br/><br/><br/><br/><br/></b>"."<b></b>";

echo "Thank you!";
?>
