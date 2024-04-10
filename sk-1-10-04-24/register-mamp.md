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
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if name is set 
if (isset($_POST["name"])){
$name = $_POST["name"];
$sql = "INSERT INTO Users.Users VALUES ('$name')";
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
