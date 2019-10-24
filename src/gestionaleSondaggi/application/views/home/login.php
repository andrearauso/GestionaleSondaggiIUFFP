<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <h1>Login</h1>
        <form action="<?php echo URL;?>login/login" method="POST">
            <input type="email" name="userEmail" required><br>
            <input type="password" name="userPass" required><br>
            <input type="submit" name="submit">
        </form>
        <h1 style="color: red"><?php if(isset($_SESSION["loginError"])){ echo $_SESSION["loginError"]; }?></h1>
</body>
</html>