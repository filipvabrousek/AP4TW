<h1>Register</h1>

<form action="/submit" method="POST">
    @csrf 
<input type="text" name="name" placeholder="Name"><br/>
<input type="text" name="email" placeholder="Email"><br/>
<input type="password" name="password" placeholder="Password"><br/>
<input type="submit">
</form>