

<!DOCTYPE HTML>
<html>
<head>
<script>
    function addProp(){
        window.location.replace('./addProperty.php')
    }
    function logout(){
        window.location.replace("homepage.html");
    }
    function toProp(id){
        window.location.replace("viewProperty.php?id="+id);
    }
</script>
<style>
    .grid{
        display:grid;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 10px;
    }
    pre{
        margin: 0px;
    }
    .prop{
        background-color: Gainsboro;
        border-style: solid;
        display: flex;
        border-radius: 50px;
        overflow: hidden;

        font-family: sans-serif;
        font-weight: 500;
        font-size: 20px;
    }
    .prop img{
        float: left;
        height: 200px;
        margin-right: 10px;
    }
    #plus{
        background-color: Gainsboro;
        border-style: solid;
        display: flex;
        border-radius: 50px;
        overflow: hidden;
        font-family: sans-serif;
        font-weight: 500;
        font-size: 70px;
        text-align: center;
    }
    #plus:hover{
        background-color: Silver;
    }
    h1{
        text-align: center;
    }
    button{
        font-size: 30px;
        background-color: royalblue;
        border-radius: 50px;
        padding: 9px 25px;
    }
</style>
</head>
<body>


<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: seller-login.php');
        exit();
    }
    $servername = "localhost";
    $username = "ahughley4";
    $password = "ahughley4";
    $dbname = "ahughley4";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Setting Id
    $usern = $_SESSION['username'];
    $result4 = mysqli_query($conn, "SELECT * FROM Seller WHERE username = '$usern'");
    if($result4!=null) {
        while ($row = mysqli_fetch_assoc($result4)) {
            $_SESSION['sellerId'] = $row['seller_id'];
        }
    }
    else {
        echo "seller Id Failed";
    }
    $result3 = mysqli_query($conn, "SELECT * FROM Property");
    echo("<button class='logout' onclick='logout()'>Log Out</button>");
    echo("<br><br><h1>List of your properties. Click on the card for more info.</h1><br><br>");
    echo("<div class='grid'>");
    if($result3 != null){
        while ($row = mysqli_fetch_assoc($result3)) {
            echo("<div class='prop' onclick='toProp(".$row['property_id'].")'><pre>");
                //House img not working, using test img
                echo("<img src='http://codd.cs.gsu.edu/~ahughley4/WP/PW/PW4/uploads/".$row['homeimage']."' alt='Home Image'>");
                echo("<img src='http://codd.cs.gsu.edu/~ahughley4/WP/PW/PW4/uploads/".$row['floorplan']."' alt='Floor Image'>");
                echo("<br>Address: ". $row['street_add'].".<br> ".$row['city'].", ".$row['state']);
                echo("<br>Age: ".$row['age']." years old");
                echo("<br>Square Footage: ".$row['squareFeet']." ft<sup>2</sup>");
                echo("<br>Value: $".$row['value']);
            echo("</div></pre>");
        }
        
    }else{
        echo "could not generate list". $conn->error;
    }
    echo("<div id='plus' onclick='addProp()'>Click Here to Add Property</div>");
    echo("</div>");
?>


</body>
</html>