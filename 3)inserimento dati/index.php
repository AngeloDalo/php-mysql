<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERIMENTO DATI DA FORM</title>
</head>
<body>
    <form action="insert.php" method="POST">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </p>
        <p>
            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </p>
        <input type="submit" name="" id="" value="invia">
    </form>
</body>
</html>