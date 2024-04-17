<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>



@if (isset($name))
<div class="m-3">
    <h1 class="display-4">Welcome {{$name}}</h1>
</div>
@endif

<div class="m-3">
<form action="/posts" method="post" class="mb-3">
    @csrf
    <div class="form-group">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <textarea class="form-control" type="text" name="post" placeholder="What's on your mind?"></textarea>
    </div>
    <input class="btn btn-primary mt-3" type="submit" value="Post">
</form>
</div>

<div class="m-3">
<form action="/users/search" method="get" class="mb-3">
    <div class="form-group">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input class="form-control" type="text" name="search" placeholder="Search for users..">
    </div>
    <input class="btn btn-primary mt-3" type="submit" value="Search">
</form>
</div>

<div class="row">

<div class="col-sm-6">
<h3 class="m-3">Users</h3>
@foreach ($users as $user)
    <div class="card m-3">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small_2x/default-avatar-profile-icon-of-social-media-user-vector.jpg" class="card-img-top" style="width: 80px" alt="Profile Picture">
        <div class="card-body">
            <p class="card-text lead">{{ $user->name }}</p>
        </div>
    </div>
@endforeach
</div>


<div class="col-sm-6">
<h3 class="m-3">Posts</h3>
@if (isset($posts))
@foreach ($posts as $post)
    <div class="card m-3">
        <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">{{ $post->user }}</h6>
            <h3 class="card-title">{{ $post->title }}</h3>
            
        </div>
    </div>
@endforeach
@endif
</div>

</div>