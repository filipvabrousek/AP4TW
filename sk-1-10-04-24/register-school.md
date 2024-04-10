## Register mamp

```html
<form action="index.php" method="POST">
<input type="text" name="name">
<input type="submit">
</form>
```



```php
<?php
// Connect to the server
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check if name is set 
if (isset($_POST["name"])){
$name = $_POST["name"];
$sql = "INSERT INTO users (name, password) VALUES ('$name', '$name')";
$conn->query($sql);
}

$sql = "SELECT * FROM Users.Users";
$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)){
  echo $row["name"];
  echo "</br>";
}


?>
```
