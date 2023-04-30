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

// sql to create table

/*$sql = "CREATE TABLE Seller (
seller_id INT PRIMARY KEY NOT NULL,
owned_properties INT,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
first_name VARCHAR(60) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL
)";
*/



/*$sql = "CREATE TABLE Buyer (
buyer_id INT PRIMARY KEY NOT NULL,
username VARCHAR(30)  NOT NULL,
password VARCHAR(255) NOT NULL,
first_name VARCHAR(60) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL
)";
*/

/*$sql = "CREATE TABLE Property (
  property_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  seller_id INT,
  FOREIGN KEY(seller_id) REFERENCES Seller(seller_id),
  street_add VARCHAR(120) NOT NULL,
  city VARCHAR(60) NOT NULL,
  state VARCHAR(30) NOT NULL,
  age INT NOT NULL,
  homeimage VARCHAR(2048),
  floorplan VARCHAR(2048),
  squareFeet INT NOT NULL,
  bedrooms INT NOT NULL,
  parking BOOLEAN,
  garden BOOLEAN,
  value DECIMAL NOT NULL
  )";
  */
  $sql = "INSERT INTO Property (property_id, seller_id, street_add, city, state, age, homeimage, floorplan, squareFeet, bedrooms, parking, garden, value)
  VALUES(1002, 6300, '400 home', 'Morrow', 'GA', 4, '', '', 300, 3, TRUE, FALSE, 200000)";
  



//$sql = "DROP TABLE Property";

//$sql = "DROP TABLE Buyer";

//$sql = "DROP TABLE Seller";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>