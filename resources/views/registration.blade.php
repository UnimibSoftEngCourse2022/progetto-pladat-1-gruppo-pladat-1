<h1>User Registration</h1>
<form action="registration/student" method="POST">
    @csrf
    <input type="text" name="email" placeholder="email"> <br>
    <input type="text" name="name" placeholder="name"> <br>
    <input type="text" name="surname" placeholder="surname"> <br>
    <input type="text" name="birth_date" placeholder="birth_date"> <br>
    <input type="text" name="presentation" placeholder="description"> <br>
    <input type="text" name="password" type="password"placeholder="password"> <br>
    <button type="submit">Registration</button>
</form>
