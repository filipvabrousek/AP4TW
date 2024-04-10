<?php
echo "Hello";

$name = "Filip";
echo $name;

echo strtoupper($name);
echo strtolower($name);
echo pi();

$value = 3.141593;
if ($value > 3){
    echo "Pi is greater than 3   ";
}
// iohio
/*

*/

for ($i = 0; $i < 10; $i++){
    if ($i == 1){
        echo "$i  time <br>";
    } else {
        echo "$i  times <br>";
    }
}

$names = array("Karel", "Eda", "Filip");

foreach ($names as $name){
    echo "$name </br>";
}
?>

<h1>Today is </h1>

<h3>Copyright
<?php 
echo date("Y"); // l => Wednesday, jS => 10th, 
?></h3>
