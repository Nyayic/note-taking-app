<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "notes_db";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Retrieve notes from the database
$sql = "SELECT * FROM notes";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Notes</title>
</head>
<body>
  <h1>My Notes</h1>
  <a href="create.php">Create a Note</a>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row["title"]; ?></td>
          <td><?php echo $row["content"]; ?></td>
          <td><?php echo $row["timestamp"]; ?></td>
          <td>
            <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</
            </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>