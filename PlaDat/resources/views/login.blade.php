<h1>User Login</h1>
<form method="POST" action="/loginCheck">
    @csrf
    <input id='email' type="text" name="email" placeholder="enter user email"> <br>
    <input id='password' type="text" name="password" placeholder="enter user password"> <br>
    <button type="submit" >Login</button>
</form>
