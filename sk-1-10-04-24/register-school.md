## Register working on school PC

```html
<form action="index.php" method="POST">
<input type="text" name="name">
<input type="submit">
</form>
```



```php
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);
/* WINDOWS: 
$conn = new mysqli($servername, $username, $password, $dbname, 3307);
*/
if (isset($_POST["username"]) &&
 !empty($_POST["username"])){
  $name = $_POST["username"];

  $sql = "INSERT INTO Users.users VALUES('$name')";
  // WINDOWS: $sql = "INSERT INTO Users.Users(name, password) VALUES('$name', '$name')";
  $conn->query($sql);

  $sql = "SELECT * FROM Users.users";
  $result = $conn->query($sql);

  while ($row = mysqli_fetch_assoc($result)){
    echo $row["name"];
    echo "</br>";
  }






 } else {
  echo "No username received";
 }


?>
```
