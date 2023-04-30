<?php
    session_start();
    function checkImage($fileName) {
        //$target_dir = "uploads/";
        //$target_dir = "sftp://ahughley4@codd.cs.gsu.edu/home/ahughley4/public_html/WP/PW/PW4/uploads/";
        $target_dir = "../../../../../ahughley4/public_html/WP/PW/PW4/uploads/";
        $target_file = $target_dir . basename($_FILES["$fileName"]["name"]);
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["$fileName"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ". ";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        else {
            return "";
        }

        // Check file size
        if ($_FILES["$fileName"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["$fileName"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename( $_FILES["$fileName"]["name"])). " has been uploaded.";
                
                //return "$target_file";
                return htmlspecialchars(basename( $_FILES["$fileName"]["name"]));
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            return "";
        }
        return "";
    } 


    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['sellerId'])) {
        $servername = "localhost";
        $username = "ahughley4";
        $password = "ahughley4";
        $dbname = "ahughley4";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        $error = false;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            $error = true;
        }   
        $sellerID = $_SESSION['sellerId'];
        $street_address = $_POST['street_address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $age = intval(''.$_POST['age']);
        $imageChecker = false;
        //$homeImageUrl = checkImage('homeImage');
        //$floorImageUrl = checkImage('floorImage');
        $homeImageUrl = checkImage('homeImage');
        $floorImageUrl = checkImage('floorImage');
        if($homeImageUrl != "" && $floorImageUrl !="") {
            $imageChecker = true;
        }

        if($imageChecker!=true) {
            $error = true;
        }
        $sqfeet = intval(''.$_POST['squarefeet']);
        $bedrooms = intval(''.$_POST['bedrooms']);
        //$bathrooms = intval(''.$_POST['bathrooms']);
        $parking = $_POST['parking'] == 'Yes' ? true : false;
        $garden = $_POST['garden'] == 'Yes' ? true : false;
        $property_value = floatval(''.$_POST['property_value']);
        $sql = "INSERT INTO Property (seller_id, street_add, city, state, age, homeimage, floorplan, squareFeet, bedrooms, parking, garden, value)
        VALUES($sellerID, '$street_address', '$city', '$state', $age, '$homeImageUrl', '$floorImageUrl', $sqfeet, $bedrooms, '$parking', '$garden', $property_value)";

        //$sql = "INSERT INTO Property (seller_id, street_add, city, state, age, homeimage, floorplan, squareFeet, bedrooms, parking, garden, value)
        //VALUES(1, '$street_address', '$city', '$state', $age, '$homeImageUrl', '$floorImageUrl', $sqfeet, $bedrooms, $parking, $garden, 3.14)";

        if($error != false || $conn -> query($sql) !== TRUE) {
            $database_error = "Couldn't insert into the database properly. Please try again Later.";
            $database_error .= $conn->error;
        }
        else {
            $database_error = "Stored Properly";
        }
        echo $database_error;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a property</title>
    <link rel="stylesheet" href="./css/addProp.css">
</head>
<body>

    <div class="mainForm">
        <div class="header">
            <a href="./sellerdashboard.php" id="homeIconContainer"><img src="./homepage-imgs/homeIcon.png" alt="Home Icon"></a>
        
            <div id="propertyText"><h3>Please enter the falling information of about the property.</h3></div>
            <div id="propertyUsername"><h2>Welcome<br><?= $_SESSION['username'] ?></h2></div>
        </div>
        <form action="./addProperty.php" method="POST" enctype="multipart/form-data">
            
            <div class="fullAddress">
                <div id="street_addressContainer">
                    <label for="street_address">Street Address</label>
                    <input id="street_address" type="text" name="street_address" required>
                    <br>
                </div>
                <div id="cityContainer">
                    <label for="city">City </label>
                    <input id="city" type="text" name="city" required>
                    <br>
                </div>
                <div id="stateContainer">
                    <label for="state">State</label>
                    <select id="state" name="state">
                        <option value="" disabled selected>Select One</option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District of Columbia">District of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Guam">Guam</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Virgin Islands">Virgin Islands</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="imageContainer">
                <div>
                    <label for="file">Your Home Image File</label>
                    <input id="file" type="file" name="homeImage" accept="image/png, image/gif, image/jpeg"/>
                    <br>
                </div>
    
                <div>
                    <label for="file">Your Floorplan Image File</label>
                    <input id="file" type="file" name="floorImage" accept="image/png, image/gif, image/jpeg"/>
                    <br>
                </div>
            </div>

            <div class="PropertyIntsContainer">
                <div>
                    <label for="age">Property's Age</label>
                    <input id="age" type="number" name="age" required>
                    <br>
                </div>
    
                <div>
                    <label for="squarefeet">Square Feet</label>
                    <input id="squarefeet" type="number" name="squarefeet" required>
                    <br>
                </div>
    
                <div>
                    <label for="bedrooms"># of Bedrooms</label>
                    <input id="bedrooms" type="number" name="bedrooms" required>
                    <br>
                </div>
    
                <div>
                    <label for="bathrooms"># of Bathrooms</label>
                    <input id="bathrooms" type="number" name="bathrooms" required>
                    <br>
                </div>
            </div>

            <div class="PropertyBoolContainer">
                <div>
                    <label for="parking">Does property Have Parking?</label>
                    <select name="parking" id="parking">
                        <option value="" disabled selected>Select One</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
    
                <div>
                    <label for="garden">Does property Have a Garden?</label>
                    <select name="garden" id="garden">
                        <option value="" disabled selected>Select One</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <label for="property_value">Total Property Value</label>
            <input id="property_value" type="number" name="property_value" required>
            <br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>
</html>