<?php
$servername = "localhost";
$username = "ahughley4";
$password = "ahughley4";
$dbname = "ahughley4";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


echo "Seller Database <br>";
$result = mysqli_query($conn, "SELECT * FROM Seller");
if($result != null){
while ($row = mysqli_fetch_assoc($result)) {
  echo("ID: ".$row['seller_id']." UserName: ".$row['username']." Password: ". $row['password']. " First Name: ".$row['first_name']. " Last Name: " . $row['last_name']. " Email: " . $row['email'] ."<br>");  
}
} else{
  echo "could not generate list". $conn->error;
}

echo "<br>Buyer Database <br>";
$result2 = mysqli_query($conn, "SELECT * FROM Buyer");

if($result2 != null){
  while ($row = mysqli_fetch_assoc($result2)) {
    echo("ID: ".$row['buyer_id']." UserName: ".$row['username']." Password: ". $row['password']. " First Name: ".$row['first_name']. " Last Name: " . $row['last_name']. " Email: " . $row['email'] ."<br>");  
  }
  } else{
    echo "could not generate list". $conn->error;
  }

  echo "<br>Property Database <br>";
$result3 = mysqli_query($conn, "SELECT * FROM Property");

if($result3 != null){
  while ($row = mysqli_fetch_assoc($result3)) {
    echo("Property ID: ".$row['property_id']." Seller ID: ".$row['seller_id']." Address: ". $row['street_add']. " City: ".$row['city']. " State: " . $row['state']. " Age: " . $row['age']." Home URL: ". $row['homeimage']. "Floor Plan: ". $row['floorplan']." Square Feet: ". $row['squareFeet']. " Value: ". $row['value']."<br>");  
  }
  } else{
    echo "could not generate list". $conn->error;
  }
$usern = $_SESSION['username'];
$usern = "user1";
echo $usern."<br>";
$result4 = mysqli_query($conn, "SELECT * FROM Seller WHERE username = '$usern'");
if($result4!=null) {
  while ($row = mysqli_fetch_assoc($result4)) {
    echo("Seller ID: ".$row['seller_id']."<br>");  
  }
}
else {
  echo "seller Id Failed";
}