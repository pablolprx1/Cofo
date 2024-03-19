<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page de connexion</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form form method="POST" action="connection.php">
            <h1>Cofonie</h1>
            <div class="inputs">
                <input type="login" name="login" placeholder="Login">
                <input type="password" name="password" placeholder="Mot de passe">
            </div>

            <div align="center">
                <button type="submit" name="valider">Se connecter</button>
            </div>
        </form>
    </body>
</html>