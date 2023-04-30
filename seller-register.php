<?php
    session_start();
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

    session_start();
    if (isset($_POST['register'])) { 
        
        
            //storing user's username & password
            $username = $_POST['username'];
            $pwd = $_POST['password'];
            $pwdConfirm = $_POST['confirmpassword'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $detectUser = false;
            $arr = array();
            if($pwd == $pwdConfirm){
                $result = mysqli_query($conn, "SELECT * FROM Seller");
                if($result != null){
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($username === $row['username']){
                            $detectUser = true;
                        }
                    }
                }

                if($detectUser == false){
                    $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                    $id_gen = rand(1, 10000);
                    $sql = "INSERT INTO Seller (seller_id, username, password, first_name, last_name, email)
                    VALUES($id_gen,'$username', '$pwdHash', '$first_name', '$last_name', '$email')";
                    if ($conn->query($sql) === TRUE) {
                        echo "Data is inserted in Seller Database <br>";
                         //after registration, redirect to card.php file
                        $_SESSION['seller-register'] = 1;

                        header("location:card-info.php");
                      
                        exit();
                    
                    } else {
                        echo "Error inserting data: " . $conn->error;
                    }
                } else{
                    $arr["mess"] = '<p style="color:red; text-align: center; font-weight:bold">Username already exists</p>';
                  
                }
                  
            } else{
                $arr["mess"] = '<p style="color:red; text-align: center; font-weight:bold">Passwords do not match.</p>';
            }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Register Page</title>
    <link rel="stylesheet" href="general.css">
</head>

<body>
    <br><br><br>
    <div class="wrap">
        <form class="form-page" action="seller-register.php" method="post" name="Register_Form">
            <h2 style="text-align:center; padding-bottom: 15px">Register Seller</h2>
            <p>Please fill in this form to create an account.</p>
            <hr class="hr1">

            <label for="firstname"><b>First Name</b></label>
            <input class="form-input" type="text" name="firstname" placeholder="Enter First Name" required="">

            <label for="lastname"><b>Last Name</b></label>
            <input class="form-input" type="text" name="lastname" placeholder="Enter Last Name" required="">

            <label for="username"><b>Username</b></label>
            <input class="form-input" type="text" name="username" placeholder="Enter Username" required="">

            <label for="password"><b>Password</b></label>
            <input class="form-input" type="password" name="password" placeholder="Enter Password" required="">

            <label for="confirmpassword"><b>Confirm Password</b></label>
            <input class="form-input" type="password" name="confirmpassword" placeholder="Confirm Password" required="">

            <label for="email"><b>Email Address</b></label>
            <input class="form-input" type="text" name="email" placeholder="Enter Email" required="">

            <button class="register-button" name="register" type="submit">Register</button>
            <?php
                 if (isset($arr["mess"])) {
                    echo $arr["mess"];
                }
            ?>

            <div class="login-or-register">
                <p>Already have an account? <a href="seller-login.php">Sign in</a>.</p>
            </div>
        </form>
    </div>

</body>

</html>