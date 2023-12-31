<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apihub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT s.id AS stats_id, s.sid, s.profile, s.interests, u.id AS user_id, u.username, u.password, u.aid, u.sid AS user_sid, u.datetime
    FROM stats s
    INNER JOIN users u ON s.sid = u.sid;
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Joined Table Data</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap');


        /* body{
            background-color: #13131378;
        } */
        h2 {
            font-family: 'Nunito', sans-serif;

        }
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }
       

        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
            font-size: 15px;
        }

        th {
            background-color: #EA1179;
            font-family: 'Rubik', sans-serif;


        }
        td {
            font-family: 'Comfortaa', cursive;
            font-weight: 900;
        }
    </style>
</head>
<body>

<h2>Administration</h2>

<table>
    <tr>
        <th>Username</th>
        <th>AID</th>
        <!-- <th>Stats ID</th>  -->
        <th>SID</th>
        <th>Profile</th>
        <th>Interests</th>
        <th>User ID</th>
        
        <!-- <th>Password</th> -->
        
        <!-- <th>User SID</th> -->
        <th>Datetime</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["aid"] . "</td>";
            
            echo "<td>" . $row["sid"] . "</td>";
            echo "<td>" . $row["profile"] . "</td>";
            echo "<td>" . $row["interests"] . "</td>";
            echo "<td>" . $row["user_id"] . "</td>";
            
            // echo "<td>" . $row["password"] . "</td>";
            
            // echo "<td>" . $row["user_sid"] . "</td>";
            echo "<td>" . $row["datetime"] . "</td>";
            // echo "<td>" . $row["stats_id"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No data available</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>




