<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<p><?php echo $_SESSION["userEmail"] ?></p>
<p>Tipo di Utente: <?php echo $_SESSION["userType"] ?> </p>
<p>Sei Loggato</p>
<a href="<?php echo URL . 'home/logout'; ?>">Esegui il logout!</a>
<a href="<?php echo URL . 'dashboard/loadUserCreator'; ?>">Crea un utente</a>

</body>
</html>