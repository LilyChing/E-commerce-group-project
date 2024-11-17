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
$stmt = $conn->prepare("INSERT INTO MyGuests (cName, cNumber, cEmail, sName, sAddress, sCity, sCountry, sPostcode, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $cName, $cNumber, $cEmail, $sName, $sAddress, $sCity, $sCountry, $sPostcode, $payment);

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
