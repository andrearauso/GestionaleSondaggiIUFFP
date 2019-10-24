
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/assets/style.css">
    </head>
    <body>
        <h1>Creazione Utente</h1>
        <form action="<?php echo URL;?>dashboard/createUser" method="POST">
            <input type="text" name="name" required><br>
            <p><?php if(isset($_SESSION["nameError"])){ echo $_SESSION["nameError"]; }?></p>
            <input type="email" name="userEmail" required><br>
            <p><?php if(isset($_SESSION["emailError"])){ echo $_SESSION["emailError"]; }?></p>
            <select name="userType" required>
                <option value="Amministratore">Amministratore</option>
                <option value="Docente">Docente</option>
            </select><br>
            <input type="submit" name="submit">
        </form>
        </h1>
</body>
</html>
