<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update</title>
    <style>
        body {
            background: #123 url(https://images.unsplash.com/photo-1585542094891-8ee0ade456aa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=788&q=80);
            background-size: cover;
            background-blend-mode: multiply;
            color: white;
        }

        form {
            /* padding-top: 100px; */
            margin: 150px 0 0 850px;
            /* border: solid 1px black; */
            margin-right: 400px;
            /* padding-right: 100; */
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




        #btn {
            background-color: greenyellow;
            width: max-content;

        }
    </style>
</head>

<body>
    <?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'truck';
    $conn = new mysqli($server_name, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('connect error');
    }

    if (!empty($_GET['id'])) {
        $id =  $_GET['id'];

        $sql = "SELECT * FROM `requests` WHERE `id`= $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $pickup = $row['pickup'];
                $drop = $row['drops'];
                $email = $row['email'];
                $goods = $row['goods'];
                $weights = $row['weights'];;
            }
        }
    ?>
        <!-- email, pickup, drops, goods, weights, pickupDate -->

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>" method='POST'>
            <h1> Edit your request!!</h1>
            <table>
                <!-- ==================================== -->
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Pickup City</td>
                    <td>
                        <input type="text" name="pickup" value="<?php echo $pickup; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Drop city</td>
                    <td>
                        <input type="text" name="drop" value="<?php echo $drop; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Goods Type</td>
                    <td>
                        <input type="text" name="goods" value="<?php echo $goods; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Goods weights</td>
                    <td>
                        <input type="text" name="weights" value="<?php echo $weights; ?>">

                    </td>
                </tr>

                <tr>
                    <td><input id="btn" type="submit"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $pickup = $_POST['pickup'];
        $drop = $_POST['drop'];
        $email = $_POST['email'];
        $goods = $_POST['goods'];
        $weights = $_POST['weights'];

        $id = $_GET['id'];
        $sql = "UPDATE requests SET pickup = '$pickup',drops = '$drop',email = '$email',goods = '$goods',weights = '$weights' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            //redirection
            header('location:app.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
</body>

</html>