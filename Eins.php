<?php
session_start();

include 'Template/Accses.php';
canVisit();

$site = 1;

$user = "Jakob";
$pwd = "JN052211/gb*";
$dsn = "mysql:host=127.0.0.1:9000;dbname=data_latein;charset=utf8";
$db = new PDO($dsn, $user, $pwd);

$sql = "SELECT * FROM entries WHERE site = $site";

$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Ⅰ | Gramatik</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styleGenrale.css">
  <script type="text/javascript" src="Template/"></script>
</head>

<body class="body">
  <header>
    <?php include 'Template/Navbar.php'; ?>
  </header>
  <section class="container" class="Gramma">
    <div class="row">
      <?php while ($row = $result->fetch()) : ?>
        <div class="col">
          <?php include 'Template/card.php'; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
</body>

</html>