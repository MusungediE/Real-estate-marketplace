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
    <div class="wrap">
        <form class="form-page" action="card-submit.php" method="post" name="card_Form">
            <h2 style="text-align:center; padding-bottom: 15px">Credit Card</h2>
            <p>Please fill in your card information.</p>
            <hr class="hr1">

            <label for="firstname"><b>First Name</b></label>
            <input class="form-input" type="text" name="firstname" placeholder="Enter First Name" required="">

            <label for="lastname"><b>Last Name</b></label>
            <input class="form-input" type="text" name="lastname" placeholder="Enter Last Name" required="">

            <label for="cardNum"><b>Card Number</b></label>
            <input class="form-input" id="cardNumb" type="text" name="cardNum" placeholder="Enter Card Number" required="" onkeyup="creditCardType(document.getElementById('cardNumb').value)">
            
            <p>Credit Card Type: <span id="ccType"></span></p><br>

            <label for="expDate"><b>Exp Date</b></label>
            <select name='expireMM' id='expireMM' class="form-input">
                <option value=''>Month</option>
                <option value='01'>January</option>
                <option value='02'>February</option>
                <option value='03'>March</option>
                <option value='04'>April</option>
                <option value='05'>May</option>
                <option value='06'>June</option>
                <option value='07'>July</option>
                <option value='08'>August</option>
                <option value='09'>September</option>
                <option value='10'>October</option>
                <option value='11'>November</option>
                <option value='12'>December</option>
            </select> 
            <select name='expireYY' id='expireYY' class="form-input">
                <option value=''>Year</option>
                <option value='20'>2023</option>
                <option value='21'>2024</option>
                <option value='22'>2025</option>
                <option value='23'>2026</option>
                <option value='24'>2027</option>
            </select> 
            <input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>

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