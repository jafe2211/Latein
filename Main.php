<?php

session_start();
include 'Template/Accses.php';
canVisit();

if ($_GET["error"]) {

  $error = $_GET["error"];

  GetError($error);
}
function getError($errorCode)
{
  if ($errorCode == '1') {
    return  'Du bist nicht brechtigt Auf diese Seite zu gehen!';
  }
}


?>
<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Latein Klasse 8 | gym - Kothen</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styleI.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styleGenrale.css">
</head>

<body class="body">
  <header>
    <div>

      <?php if (isset($_GET['error'])) { ?>
        <p id="error"><?php echo getError($_GET["error"]); ?></p>
      <?php } ?>
      <h1 class="center">Gramatik</h1>
      <form action="Weiterleitung.php" method="POST">
        <button class="btn btn-success btn center" name="gramma">Zum Gramatikverzeichnis</button>
      </form>
    </div>
    <div>
      <h1 class="center">Vokabeltrainer</h1>
      <form action="Weiterleitung.php" method="POST">
        <button class="btn btn-success btn center" name="Voc">Zum Vokabeltrainer(Beta)</button>
      </form>
    </div>
  </header>
</body>

</html>