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
  $id = $_POST["id"];
  $title = $_POST["title"];
  $content = $_POST["content"];

  // Update data in the database
  $sql = "UPDATE notes SET title='$title', content='$content' WHERE id=$id";
  mysqli_query($conn, $sql);

  // Redirect to the display page
  header("Location: index.php");
  exit();
}

// Retrieve note from the database
$id = $_GET["id"];
$sql = "SELECT * FROM notes WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Note</title>
</head>
<body>
  <h1>Edit Note</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    <label for="title">Title:</label><br>
    <input type="text" name="title" value="<?php echo $row["title"]; ?>"><br>
    <label for="content">Content:</label><br>
    <textarea name="content"><?php echo $row["content"]; ?></textarea><br>
    <input type="submit" value="Save">
  </form>
</body>
</html>
