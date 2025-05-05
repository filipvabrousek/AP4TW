<?php
$name = "Hello";
echo $name;

echo "<br>";

$age = 21;
echo $age;

echo "<br>";

if ($age > 21){
  echo "Older than 21";
} else {
  echo "Younger than 21 or 21";
}


echo "<br>";


function greet($name){
  echo "Hello $name";
}


greet("Eda");
echo "<br>";

$cities = ["Denver", "Dallas", "Colorado"];
echo $cities[0];



echo "<br>";

$text = "Hello";
echo strtoupper($text);


echo "<br>";
echo trim("  trim   ");
echo "<br>";

echo max(1,2,3);
echo "<br>";
echo date("m");
echo "<br>";
echo date("d/m/y h:i:s");
echo "<br>";

echo rand(1,100);
echo "<br>";
echo round(3.141592, 3);



echo "<br>";
$text = "hfewgfiugfiwfgweuifgwuiefgweui";
echo strlen($text);