# Laravel  
https://herd.laravel.com/  

```sh
composer create-project laravel/laravel:^11.0 Room
cd
cd room
```

Room/routes/web.php
```php
<?php

use Illuminate\Support\Facades\Route;

Route::get("/hello", function(){
   return view("hello");
});
```

Room/resources/views/hello.blade.php

```html
<h1>Hello</h1>
```







