<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>


  @if($errors->any())
    <div class="alert alert-danger">
        <h2>Error</h2>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<div class="w-50">
<h1 class="m-3">Register</h1>
<form action="/users" method="POST">
    @csrf
    <input class="form-control form-rounded m-3" type="text" name="name">
    <input class="btn btn-primary m-3" type="submit"><!--@ęndif-->
</form>
</div>

<div class="w-50">
<h3 class="m-3">Log in</h3>
<form class="w-80" action="/login" method="POST">
    @csrf
    <input class="form-control form-rounded m-3" type="text" name="name">
    <input class="btn btn-primary m-3" type="submit" value="login"><!--@ęndif-->
</form>
</div>