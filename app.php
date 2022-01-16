<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style>
body{ 
    background: #123 url(https://images.unsplash.com/photo-1585542094891-8ee0ade456aa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=788&q=80);
    background-size: cover;
    background-blend-mode: multiply;
    color: white;
    font-family: Helvetica;

}
table{
        /* padding-top: 100px; */
        margin: 150px 0 0 850px;
    }
    h1{
     text-align: center;
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 30px 0;
    }
    a{
        color: #C32E24;
    }


</style>
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
    ?>
<!-- email, pickup, drops, goods, weights, pickupDate -->
    <h1 id="special">Request you have made !!</h1>
    <a id="add" href='index.php'>Make a onine Booking</a>
    <hr>
    <table border="1">
        <thead>
            <tr>
                <th> email </th>
                <th> pickup </th>
                <th> drops </th>
                <th> goods </th>
                <th> weights </th>
                <th> pickupDate </th>
                <th> Action </th>

            </tr>
        </thead>

        <tbody>

            <?php
            $sql = "SELECT * FROM requests";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['pickup'] . "</td>";
                    echo "<td>" . $row['drops'] . "</td>";
                    echo "<td>" . $row['goods'] . "</td>";
                    echo "<td>" . $row['weights'] . "</td>";
                    echo "<td>" .  $row['pickupDate']   . "</td>";
                    echo '<td>' . "<a  href ='update.php?id=$row[id]'>EDIT</a>" ;
                    echo '<br>';
                    echo  "<a  href ='delete.php?id=$row[id]'>Delete</a>" . '</td>';
                    echo "</tr>";
                }
            
            } else {
                echo "No Data";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

</body>

</html>