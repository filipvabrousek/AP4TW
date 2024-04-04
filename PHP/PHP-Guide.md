# PHP
macOS
1) Start MAMP  

**Applications/MAMP/htdocs**  

index.html
```html
<form action="index.php" method="POST">
<input type="text" name="name">
<input type="submit">
</form>
```


index.php
```php
<?php 
/*echo "Hello";
$var = 1;
echo $var;
if (true) { echo $var;} else {echo "Helélo";}
*/

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST["name"])){
  $name = $_POST["name"];
  $sql = "INSERT INTO Users.Users VALUES ('$name')";
  $conn->query($sql);
}

$sql = "SELECT * FROM Users.Users";
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)){ // do not fetch in brackets
  echo $row["name"];
  echo "</br>";
}
?>
```



























