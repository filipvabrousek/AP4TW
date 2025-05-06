index php

<?php

Route::get('/', function (){
  return view('playground', [
    'title' => 'Lakavel Playground'
  ]);
});

use Illuminate\Http\Request;

Route::get('/convert', function (Request $request){

  $value = $request->query("value");
  $from = $request->query("from");
  $to = $request->query("to"); // name="to" name="from"
  $result = "some result";


 $conversionRates = [
   "km_to_m" => 1000,
   "m_to_km" => 0.001
  ];

// km_to_m m_to_km
$conversionKey = "{$from}_to_{$to}";

$conversionRate = 
 $conversionRates[ $conversionKey];


$convertedValue =   $value * $conversionRate;

  return view('convertview', [
    'value' => $value,
    'from' => $from,
    'to' => $to,
    'result' => $convertedValue
  ]);
});




playground blade php

<form action="/convert">
@csrf

<input type="number" name="value">
<input type="text" placeholder="from" name="from">
<input type="text" placeholder="to" name="to">

<button type="submit">Send</button>
</form>

<style>
form {
display: flex;
flex-direction: column;
}
</style>
</form>




convertview blade php

<h1>Convert</h1>

<p><strong>Value:</strong> {{ $value }}</p>
<p><strong>From:</strong> {{ $from }}</p>
<p><strong>To:</strong> {{ $to }}</p>
<p><strong>Result:</strong> {{ $result }}</p>

