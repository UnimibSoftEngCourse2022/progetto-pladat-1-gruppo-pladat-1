<h1>Profile Page</h1>
<h2>Hello </h2>{{Session::get('email')}}
<form method="POST"action="student/delete">
    <button type="submit">Delete</button>
</form>
<form method="POST"action="student/update">
    <button type="submit">Update</button>
</form>

