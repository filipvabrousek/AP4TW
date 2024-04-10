## Registration
* To-Do create table in Sandbox


```html
<h1>Register</h1>
<form action="index.php" method="POST">
    <input type="text"
     placeholder="username"
      name="username">

      <input type="password"
      placeholder="password"
      name="password">
<br/>
      <input type="submit">

</form>


```


```php

<?php
// Nastavit spojení s SQLite databází
$db = new PDO('sqlite:./database.sqlite');

// SQL příkaz pro vytvoření tabulky
$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT DEFAULT CURRENT_TIMESTAMP
);
";

// Spuštění SQL příkazu
$db->exec($sql);

echo "Tabulka 'users' byla úspěšně vytvořena nebo již existuje.";
?>



<?php


$username = $_POST["username"];

// Check if "username" is sent, and is not empty
if (isset($username) && !empty($username) ){
    
    echo $_POST["username"];
    $db = new PDO('sqlite:./database.sqlite');

    if ($db){
        echo "Connected";
    }

    $sql = "INSERT INTO users VALUES ('$username')";
    
    try {
        $smt = $db->prepare($sql);
        $smt->execute();
        echo "User registered successfuly.";
    } catch (PDOException $e) {
        echo "Error during registration " $e->getMessage();
    }
   

} else {
    echo "Username not set";
}


?>


```
