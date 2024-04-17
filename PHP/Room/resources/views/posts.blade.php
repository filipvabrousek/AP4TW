<h1>Posts</h1>

@if (isset($name))
<h1>Welcome {{$name}}</h1>
@endif

<form action="/posts/search" method="get">
        <input type="text" name="search" placeholder="Search for users..">
        <input type="submit" value="Search">
</form>

@foreach ($posts as $post)
    <p>Post: {{ $post->title }}</p>
@endforeach