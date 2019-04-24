<?php

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

$sql = "SELECT game_id, game_name, genre, rating, release_date FROM Game";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>game_name</th><th>genre</th><th>rating</th><th>release_date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["game_id"]."</td><td>".$row["game_name"]."</td><td> ".$row["genre"]."</td><td>".$row["rating"]."</td><td>".$row["release_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>