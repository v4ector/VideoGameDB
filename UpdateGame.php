<?php

$game_id = $_POST["game_id"];
$game_name = $_POST["game_name"];
$developer_id = $_POST["developer_id"];

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

$sql = "UPDATE Game SET game_name = '$game_name', developer_id = '$developer_id' WHERE game_id = $game_id";
if ($conn->query($sql) === TRUE) {
    echo "Update success.\n";
}
else {
    echo "Update Error: " . $conn->error;
}


$sql = "SELECT * 
		FROM Game";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    echo "<table><tr><th>gamer_id</th><th>game_name</th><th>genre</th><th>rating</th><th>release_date</th><th>developer_id</th></tr>";
    while($row = $res->fetch_assoc()) {
        echo "<tr><td>".$row["game_id"]."</td><td>".$row["game_name"]."</td><td> ".$row["genre"]."</td><td>".$row["rating"]."</td><td>".$row["release_date"]."</td><td>".$row["developer_id"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>