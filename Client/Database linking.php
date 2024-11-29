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
//Payment method
$payment = $_POST['payments[]'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO PurchaseData (order_id,cName, cNumber, cEmail, sName, sAddress, sCity, sCountry, sPostcode, payment_method,order_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss",$order_id, $cName, $cNumber, $cEmail, $sName, $sAddress, $sCity, $sCountry, $sPostcode, $payment_method,$order_time);

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
