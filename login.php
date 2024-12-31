<?php

session_start();
if(isset($_POST['login']))
{
    if($_POST['username'] == "admin" && $_POST['password'] == "admin")
    {
        $_SESSION["username"] = $_POST['username'];
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" />
        <label for="password">Password</label>
        <input type="text" name="password" />
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>