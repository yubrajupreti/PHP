<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'truck';
$conn = new mysqli($server_name,$username,$password,$dbname);

if($conn->connect_error){
    die('connect error');
}

if(!empty($_GET['id'])){
    $id =  $_GET['id'];
    $sql = "DELETE FROM requests where id = $id";

    if($conn->query($sql)==TRUE){
        echo "Record Deleted Sucessfully";
    }else{
        echo "Error";
    }
}
header('location:app.php');
?>
</body>
</html>