<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pokemon</title>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">

    <style>
        body{
	background: #bdc3c7;
	font-family: kalam;
}
        input {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .container {
            padding: 24px;
            margin: 40px;
            margin-left: 250px;
            border: 1px solid #ccc;
        }
        form {
            margin-left:300px ;
            padding-left: 150px;
            border: solid 1px black;
            margin-right: 400px;
        }
        h2{
            color: #9b59b6;
        }
        h2:first-letter{
	color: green;
	font-size: 50px;
}

    </style>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='POST'>
    <h2>Add a Pokemon</h2>
        <table>
            <tr>
                <th>Image</th>
                <td><input type="text" name='image' placeholder="URL OF IMAGE"></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name='name' placeholder="NAME OF POKEMON"></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><input type="text" name='type' placeholder="TYPE"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td> <textarea name="description"  cols="30" rows="10" ></textarea> </td>
            </tr>
            <tr>
                <th>Evolves To</th>
                <td><input type="text" name='evolves' placeholder="LINK TO IT"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>

    <?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'pokemon';
    $conn = new mysqli($server_name, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('connect error');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $image = $_POST['image'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $evolves = $_POST['evolves'];

        $sql = "INSERT INTO pokemon(image, name, type, description, evolves) VALUES ('$image','$name','$type','$description','$evolves')";
        if ($conn->query($sql)) {
            echo "Excuted successfully";
            header('location:app.php');

        } else {
            echo "Error inserting into pokemon table";
        }
    }

    ?>

</body>

</html>