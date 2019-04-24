<?php

$developer_id = $_POST["developer_id"];
$developer_name = $_POST["developer_name"];
$location = $_POST["location"];

$servername = "localhost";
$username = "root";
$password = "PASSWORD";
$dbname = "gamedb";

/* connect to database */
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "Connection failed.";
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE Developer SET developer_name = '$developer_name', location = '$location' WHERE developer_id = $developer_id";
if ($conn->query($sql) === TRUE) {
    echo "Update success.\n";
}
else {
    echo "Update Error: " . $conn->error;
}


$sql = "SELECT * 
        FROM Developer";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    echo "<table><tr><th>developer_id</th><th>developer_name</th><th>location</th><th>average_game_rating</th></tr>";
    while($row = $res->fetch_assoc()) {
        echo "<tr><td>".$row["developer_id"]."</td><td>".$row["developer_name"]."</td><td> ".$row["location"]."</td><td>".$row["average_game_rating"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>