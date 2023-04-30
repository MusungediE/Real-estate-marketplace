
<?php
    session_start();
    if(isset($_SESSION['seller-register'])){
        unset($_SESSION['seller-register']);
        header("location:seller-login.php");               
        exit();
    }
    else if(isset($_SESSION['buyer-register'])){
        unset($_SESSION['buyer-register']);
        header("location:buyer-login.php");               
        exit();
    }
    else if(!isset($_SESSION['buyer-register']) && !isset($_SESSION['seller-register'])){
        header("location:homepage.html");  
        exit();
    }
    
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Info Page</title>
    <link rel="stylesheet" href="general.css">
</head>

<body>
    <script src="ccregex.js"></script>
    <br><br><br>
    <div id="ccType"></div>
    <div class="wrap">
        <form class="form-page" action="card-submit.php" method="post" name="card_Form">
            <h2 style="text-align:center; padding-bottom: 15px">Credit Card</h2>
            <p>Address and contact</p>
            <hr class="hr1">

            <label for="address"><b>Street Address</b></label>
            <input class="form-input" type="text" name="street" placeholder="Enter Street Address" required="">

            <label for="city"><b>City</b></label>
            <input class="form-input" type="text" name="city" placeholder="Enter City" required="">

            <label for="cardNum"><b>State</b></label>
            <input class="form-input" id="cardNumb" type="text" name="cardNum" placeholder="Enter 2-letter abbreviation" required="">

            <button class="register-button" name="regis" type="submit">Submit</button>
        </form>
    </div>

</body>

</html>