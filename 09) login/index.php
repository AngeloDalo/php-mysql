<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="php/register.php" method="POST">
        <h2>REGISTRATI</h2>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="invia">
        <p>HAI GIA' UN'ACCOUNT? <a href="login.html">ACCEDI</a></p>
    </form>
</body>
</html>