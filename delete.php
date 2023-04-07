<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "notes_db";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Delete note from the database
$id = $_GET["id"];
$sql = "DELETE FROM notes WHERE id=$id";
mysqli_query($conn, $sql);

// Redirect to the display page
header("Location: index.php");
exit();
?>