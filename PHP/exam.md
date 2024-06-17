```php
Route::get('/', function () {
    $timer = "unique"; // NEEDS TO MATCH WITH THE STRING IN SUBMIT
    if (!Session::has($timer)) { // always change the variable name
        Session::put($timer, time());
    }

    // Calculate the remaining time
    $timeElapsed = time() - Session::get($timer);
    $timeLeft = 10 - $timeElapsed;
 
    if ($timeLeft < 0) {
        return view("expired");
    }

    return view("exam", ["timeLeft" => $timeLeft]);
});

```

```php
Route::post('/submit', function (Request $request) {
    $timer = "uniqueppp";
    $result = $request->get('answer');
    $isCorrect = $result == 'b';

    // Test with 10, if we manage to stop the timer on the frontend it will be to no avail :)
    $timeElapsed = time() - Session::get($timer);
    $timeLeft = 10 - $timeElapsed; 

    if ($timeLeft < 0) {
        return view("expired");
    }

    return view("results", [
        "answer" => $result,
        "isCorrect" => $isCorrect
]);
});
```



```html
<h1>Hello, welcome to our final exam</h1>

<span id="counter"></span>

<script>
window.onload = function() {
    var timeLeft = {{ $timeLeft }};
    var counterElement = document.getElementById('counter');
    var interval = setInterval(function() {
        var minutes = Math.floor(timeLeft / 60);
        var seconds = timeLeft % 60;
        // Add leading zero if seconds are less than 10
        seconds = seconds < 10 ? '0' + seconds : seconds;
        counterElement.textContent = (minutes < 10 ? '0' + minutes : minutes) + ':' + seconds;
        timeLeft--;
        if (timeLeft < 0) {
            clearInterval(interval);
            document.querySelector('#quiz-form').submit();
           
        }
    }, 1000);
};
</script>

<form id="quiz-form" action="/submit" method="POST">
    @csrf
    <label>When was SwiftUI invented?</label><br>
    <input type="radio" name="answer" value="a">2018<br>
    <input type="radio" name="answer" value="b">2019<br>
    <input type="radio" name="answer" value="c">2020<br>
    <button type="submit">Submit</button>
</form>
```



## results.blade.php

```php
<h1>Results</h1>
Your answer: {{$answer}};
Correct: {{$isCorrect}};
```


## expired.blade.php
```php
<h1>This attempt has already ended.</h1>
<h1>Show exam score here.</h1>
```


