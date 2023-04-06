<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "notes_db";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $title = $_POST["title"];
  $content = $_POST["content"];

  // Insert data into the database
  $sql = "INSERT INTO notes (title, content) VALUES ('$title', '$content')";
  mysqli_query($conn, $sql);

  // Redirect to the display page
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create a Note</title>
</head>
<body>
  <h1>Create a Note</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="title">Title:</label><br>
    <input type="text" name="title"><br>
    <label for="content">Content:</label><br>
    <textarea name="content"></textarea><br>
    <input type="submit" value="Create">
  </form>
</body>
</html>
