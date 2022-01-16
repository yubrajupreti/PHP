<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Enter your Request !</title>
</head>
<style>
body{ 
    background: #123 url(https://images.unsplash.com/photo-1585542094891-8ee0ade456aa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=788&q=80);
    background-size: cover;
    background-blend-mode: multiply;
    color: white;

}
form{
        /* padding-top: 100px; */
        margin: 10px 0 0 850px;
    }


    input {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        #btn {
            background-color: greenyellow;
            width: max-content;

        }
</style>
<body>
 <?php
 $server_name = "localhost";
 $username = "root";
 $password= "";
 $dbname = "truck";
 $conn = new mysqli($server_name, $username, $password, $dbname);
 
//  create TABLE requests(
//     id int NOT NULL AUTO_INCREMENT,
//     email varchar(50),
//     pickup varchar(100),
//     drops varchar(100),
//     goods varchar(200),
//     weights varchar(50),
//     pickupDate Date,
//     PRIMARY KEY(id) 
// ); 


 if($conn->connect_error)
 {
     die('connection error');
 }
 
 $pickup=$pickup_err="";
 $drop=$drop_err='';
 $email=$email_err=""; 
 $goods=$goods_err="";
 $weights=$weights_err="";
 $date=$date_err="";
 
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
     
    if(empty(trim($_POST['pickup'])))
    {
        $pickup_err = "Pickup city is required";
    }
    else
    {
        $pickup = trim($_POST['pickup']);
    }
    
    if(empty(trim($_POST['drop'])))
    {
        $drop_err = "Drop city is required";
    }
    else
    {
        $drop = trim($_POST['drop']);
    }
    
    if(empty(trim($_POST['email'])))
    {
        $email_err = "This field is required too";
    }
    else
    {
        $email = trim($_POST['email']);
        
    }

    if(empty(trim($_POST['goods'])))
    {
        $goods_err = "Goods Type is required too";
    }
    else
    {
        $goods = trim($_POST['goods']);
        
    }
    if(empty(trim($_POST['weights'])))
    {
        $weights_err = "Approx weights is required";
    }
    else
    {
        $weights = trim($_POST['weights']);
        
    }

    if(empty(trim($_POST['date'])))
    {
        $date_err = "This field is required too";
    }
    else
    {
        $date = trim($_POST['date']);
        
    }
    $sql = "INSERT INTO requests (email, pickup, drops, goods, weights, pickupDate) VALUES ('$email','$pickup','$drop','$goods','$weights', '$date')";
    // $sql = "INSERT INTO User (email,pickup,drops,goods,weights,pickupDate) VALUES('$email','$pickup','$drop','$goods','$weights', '$date')";
    if($conn->query($sql))
    {
        // echo "Executed successfully";
        header('location:app.php');
    }
    else
    {
        echo "Error inserting into table";
    }
 }
 ?>
 <h1>Online Truck Booking Made Easy</h1>
 <form action = "<? echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <table>
    <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email">
                <span style="color: red;"><?php echo $email_err;?></span>
            </td>   
        </tr>
        <tr>
            <td>Pickup City</td>
            <td>
                <input type="text" name="pickup">
                <span style="color: red;"><?php echo $pickup_err?></span>
            </td>
        </tr>
        <tr>
            <td>Drop city</td>
            <td>
                <input type="text" name="drop">
                <span style="color: red;"><?php echo $drop_err; ?></span>
            </td>
        </tr>
        <tr>
            <td>Goods Type</td>
            <td>
                <input type="text" name="goods">
                <span style="color: red;"><?php echo $goods_err; ?></span>
            </td>
        </tr>
        <tr>
            <td>Goods weights</td>
            <td>
                <input type="text" name="weights">
                <span style="color: red;"><?php echo $weights_err; ?></span>
            </td>
        </tr>
        <tr>
            <td> PickUp Date</td>
            <td>
                <input type="date" name="date">
                <span style="color: red;"><?php echo $date_err; ?></span>
            </td>
        </tr>
        
            <tr>
            <td><input id="btn" type="submit"></td>
        </tr>
    </table>
 </form>
</body>
</html>  