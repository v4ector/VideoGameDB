<?php

$user_id = $_POST["user_id"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$job = $_POST["job"];

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

/* insert function */

/* user */
$sql = "INSERT INTO User
		VALUES ('$user_id', '$age', '$gender', '$job')";
if ($conn->query($sql) === TRUE) {
    echo "Insertion success.\n";
}
else {
    echo "Insertion error: " . $conn->error;
}

/* res after insertion */

/* user */
$sql = "SELECT * 
		FROM User";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    echo "<table><tr><th>user_id</th><th>age</th><th>gender</th><th>job</th></tr>";
    while($row = $res->fetch_assoc()) {
        echo "<tr><td>".$row["user_id"]."</td><td>".$row["age"]."</td><td> ".$row["gender"]."</td><td>".$row["job"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>