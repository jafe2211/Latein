<?php
require 'conn.php';

if (isset($_POST["submit"])) {
  $username = $_POST["Username"];
  $password = $_POST["Password"];

  $stmt = $con->prepare("SELECT * FROM login_data WHERE username=:username");
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $userExist = $stmt->fetchAll();

  $passwordHashed = $userExist[0]["password"];
  $checkPassword = password_verify($password, $passwordHashed);

  checkOfErrors($username, $password, $checkPassword, $userExist);
}

function checkOfErrors($username, $password, $checkPassword, $userExist)
{
  if (!$checkPassword) {
    sendBackWhitError("3");
    return;
  }
  if (empty($username) && empty($password)) {
    sendBackWhitError("0");
    return;
  }
  if (empty($username)) {
    sendBackWhitError("1");
    return;
  }
  if (empty($password)) {
    sendBackWhitError("2");
    return;
  }
  if ($userExist[0]["Secure_Code"] == 0) {
    header("Location: Main.php?error=0");
    session_start();
    $_SESSION["username"] = $userExist[0]["username"];
    $_SESSION["Secure"] = 0;
    $_SESSION["IsLogin"] = "Yes";
    return;
  }
  if ($userExist[0]["Secure_Code"] == 1) {
    header("Location: Main.php?error=0");
    session_start();
    $_SESSION["username"] = $userExist[0]["username"];
    $_SESSION["Secure"] = 1;
    $_SESSION["IsLogin"] = "Yes";
    return;
  }
}

function sendBackWhitError($error)
{
  Header("Location: Login.php?error=$error");
}

function getError($errorCode)
{
  if ($errorCode == '0') {
    return 'Alle Felder sind Leer!';
  }
  if ($errorCode == '1') {
    return  'Das Namens Feld ist Leer!';
  }
  if ($errorCode == '2') {
    return 'Das Password Feld ist Leer!';
  }
  if ($errorCode == '3') {
    return 'Das Password oder der Name ist Falsch!';
  }
  if ($errorCode == '4') {
    return 'Bitte Loge dich ein um diese Website zu besuchen!';
  }
  if ($errorCode == '5') {
    return 'Ein Account mit dem Namen oder mit der Email Existiert bereits! Bitte Loge dich ein!';
  }
}

?>
<!DOCTYPE html>
<html lang="de" dir="ltr" class="html">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styleLogin.css">
  <link rel="stylesheet" href="css/styleError.css">
  <link rel="stylesheet" href="css/styleGenrale.css">
  <title>Login</title>
</head>

<body class="body">
  <form class="form" action="Login.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
      <p id="error"><?php echo getError($_GET["error"]); ?></p>
    <?php } ?>
    <h1 class="h1-white">Login</h1>
    <div class="inputs_container">
      <input type="text" name="Username" placeholder="Name" autofocus="off">
      <input type="password" name="Password" placeholder="Passwort" autocomplete="off">
    </div>
    <button name="submit">Login</button>
    <p class="reg"><a href="registration.php">Regestriren</a></p>
  </form>
</body>

</html>