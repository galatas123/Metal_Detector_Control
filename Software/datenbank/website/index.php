<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="style.css">
        <title>Login Page</title>
    </head>
    <body>
        <form action="authentication.php" method="POST">
            <div class="imgcontainer">
                <img src="/images/ingramLogo.jpg" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label for="user"><b>Username</b></label>
                <input type="text" id = "user" name="user" required>
                <label for="pass"><b>Password</b></label>
                <input type="password" id="pass" name="pass" required>
                <button type="submit">Login</button>
            </div>
        </form>
    </body>
</html>