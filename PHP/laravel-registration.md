# Laravel registration

```php
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

```php
use Illuminate\Support\Facades\Route;
```

```php
Route::post("/submit", function(Illuminate\Http\Request $request){
$name = $request->input('name');
echo $name;

DB::table("Users")->insert(["name" => $name]);

return back();
});


```


