<h1>Register</h1>

<form action="/submit" method="POST">
    @csrf
<input type="text" 
name="name"
 placeholder="name"><br/>

 <input type="text" 
name="email"
 placeholder="email"><br/>

 <input type="password" 
 name="password"
 placeholder="password"><br/>


<input type="submit"/>
</form>

