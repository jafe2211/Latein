<?php
session_start();

include 'Template/Accses.php';
canVisit();
HasSecure1();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>>Latein Klasse 7 | Neuer Gramatikeintrag</title>
    <link rel="stylesheet" href="css/styleGenrale.css">
</head>

<body>
    <form action="" class="form">
        <input type="text" name="Name" placeholder="Name" autofocus="off">
        <input type="text" name="Beschreibung" placeholder="Beschreibung" autocomplete="off">
        <input type="text" name="Filename" placeholder="Filename" autofocus="off">
        <input type="number" name="Site" placeholder="Site" autofocus="off">
        <button name="submit">Erstellen</button>
    </form>
</body>

</html>