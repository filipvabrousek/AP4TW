<h1>Uppercaser</h1>

<?php

if ($_SERVER["REQUEST_METHOD"]="POST"){
  $_name = $_POST["name"];
  echo strtoupper($_name);
  echo "Sign-up user here";

  $servername = "localhost";
  $username = "root";         // or your DB username
  $password = "root";             // or your DB password
  $dbname = "mysql";

  $conn = new mysqli(
    $servername,
     $username,
   $password,
   $dbname);

   echo $conn;

  /* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

}

?>

<form method="POST" action="">
  <input type="text" id="name" name="name"/>
  <button type="submit">Register</button>
</form>