<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
<h2>User Registration</h2>
<form action="http://127.0.0.1/pagination/index.php/user/register" method="post">
    First Name:
    <input type="text" name="firstname" required>
    <br><br>
    Last Name:
    <input type="text" name="lastname" required>
    <br><br>
    Email:
    <input type="email" name="email" required>
    <br><br>
    <input type="submit" value="Register">
</form>
<br>
<a href="http://127.0.0.1/pagination/index.php/user/users">View All Users</a>
</body>
</html>