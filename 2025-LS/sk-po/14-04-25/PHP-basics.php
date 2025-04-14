<?php

echo "Hello";
$name = "Eda";
echo $name;

echo "\n";
$age = 21;

if ($age > 21){
	echo "Older than 21";
} else {
	echo "Younger than 20";
}

echo "\n";

function greet($name){
	echo "Hello $name";
}

greet("Eda");
echo "\n";


$cities = ["Denver", "Colorado", "Dallas"];
echo "First city $cities[0]";
echo "\n";
$matrix = [
	[1, 2, 3], 
	[4, 5, 6]
];

echo $matrix[0][0];
echo "\n";
echo strtoupper($cities[0]);

echo "\n";
$text = "this is a sentence";
$capitalized = ucfirst($text);
echo $capitalized;

echo "\n";

$words = ["apple", "bannana", "pear"];
$uppercased = array_map("strtoupper", $words);
echo $uppercased[0];
echo $uppercased[1];
echo $uppercased[2];

echo "\n";

$mystr = "Hello world";
$mystr = str_replace("world", "PHP", $mystr);
echo $mystr;

echo "\n";

echo trim("   \n  Hello    ");
echo "\n";
echo date("m"); 
echo date("d/m/Y H:i:s");

echo "\n";
echo max(1, 2, 3); // 3


echo "\n";

// Usage in forms
$formData;
if (isset($formData)){
	echo "Set";
} else {
	echo "Not set";
}

echo "\n";
if (empty($formData)){
	echo "Empty";
} else {
	echo "Not empty";
}

echo "\n";
echo rand(1, 100);
echo "\n";
echo round(3.141592, 3);
// $name = readline("Enter your name");
// echo "Hello $name";









