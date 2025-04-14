<?php

echo "Hello";
$name = "Eda";
echo $name;


$age = 21;

if ($age > 21){
	echo "Older than 21";
} else {
	echo "Younger than 20";
}

function greet($name){
	echo "Hello $name";
}

greet("Eda");



$cities = ["Denver", "Colorado", "Dallas"];
echo "First city $cities[0]";

$matrix = [
	[1, 2, 3], 
	[4, 5, 6]
];

echo $matrix[0][0];

echo strtoupper($cities[0]);

echo "\n";
$text = "this is a sentence";
$capitalized = ucfirst($text);
echo $capitalized;

$words = ["apple", "bannana", "pear"];
$uppercased = array_map("strtoupper", $words);
echo $uppercased[0];
echo $uppercased[1];
echo $uppercased[2];

// $name = readline("Enter your name");
// echo "Hello $name";









