<h1>User Registration</h1>
<form action="registration" method="POST">
    @csrf
    <input type="text" name="user" placeholder="email"> <br>
    <input type="text" name="user" placeholder="name"> <br>
    <input type="text" name="user" placeholder="surname"> <br>
    <input type="text" name="user" placeholder="birth_date"> <br>
    <input type="text" name="user" placeholder="description"> <br>
    <input type="text" name="user" placeholder="password"> <br>
    <input type="text" name="user" placeholder="idPhoto"> <br>
    <button type="submit">Registration</button>
</form>
