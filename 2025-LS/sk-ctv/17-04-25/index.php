<h1>Form</h1>

<form method="POST" action="">
  <input type="text" name="name"/>
  <button id="btn">Send data</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] = "POST"){
  $name = $_POST["name"];
  echo "User registsered $name";

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "mysql";

  $conn = new mysqli( 
     $servername,
   $username,
   $password,
   $dbname,
   3306
   );

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  echo "Connected successfully<br>";


  $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
  $stmt->bind_param("s", $name);
  $stmt->execute();
  $stmt->close();

  echo "Inserted successfully<br>";



  $result = $conn->query("SELECT id, name FROM users ORDER BY id DESC");

if ($result->num_rows > 0) {
  echo "<h2>Registered Users</h2>";
  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    echo "<li>User #" . $row["id"] . ": " . htmlspecialchars($row["name"]) . "</li>";
  }
  echo "</ul>";
} else {
  echo "<p>No users found.</p>";
}
   //echo $conn;
}

?>



