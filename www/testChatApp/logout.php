<?php

//logout.php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM login_details WHERE user_id = ".$_SESSION['user_id'];

if ($conn->query($sql) === TRUE) {
    session_destroy();

    header('location:login.php');
} else {
    echo "Error deleting record: " . $conn->error;
}



?>