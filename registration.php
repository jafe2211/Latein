<?php
require('conn.php');
if (isset($_POST["submit"])) {

  $username = $_POST["Username"];
  $email = $_POST["Email"];
  $password = PASSWORD_HASH($_POST["Password"], PASSWORD_DEFAULT);
  $passwordUnhashed = $_POST["Password"];

  $stmt = $con->prepare("SELECT * FROM login_data WHERE username=:username OR email=:email");
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

  $userExist = $stmt->fetchColumn();

  checkOfErrors($username, $email, $passwordUnhashed, $password, $userExist);
  //registerUser($username, $email, $password); 
}
function checkOfErrors($username, $email, $passwordU, $password, $userExist)
{
  if ($userExist) {
    sendBackWhitError("4");
    return;
  }
  if (empty($username) && empty($email) && empty($passwordU)) {
    sendBackWhitError("0");
    return;
  }
  if (empty($username)) {
    sendBackWhitError("1");
    return;
  }
  if (empty($email)) {
    sendBackWhitError("3");
    return;
  }
  if (empty($passwordU)) {
    sendBackWhitError("2");
    return;
  }
  registerUser($username, $email, $password);
}

function sendBackWhitError($error)
{
  if ($error == "4") {
    Header("Location: Login.php?error=5");
    return;
  }
  Header("Location: registration.php?error=$error");
}

function registerUser($username, $email, $password)
{
  require('conn.php');
  $stmt2 = $con->prepare("INSERT INTO login_data (id, username, password, email) VALUES (NULL, :username, :password, :email)");
  $stmt2->bindParam(":username", $username);
  $stmt2->bindParam(":email", $email);
  $stmt2->bindParam(":password", $password);
  $stmt2->execute();
  header("Location: Login.php");
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
    return 'Das Email Feld ist Leer!';
  }
  if ($errorCode == '4') {
    return 'Ein Benutzer mit dem Namen existiert bereits!';
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
  <title>Regestrierung</title>
</head>

<body class="body">
  <form class="form" action="registration.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
      <p id="error"><?php echo getError($_GET["error"]); ?></p>
    <?php } ?>
    <h1 class="h1-white">Account erstellen</h1>
    <div class="inputs_container">
      <input type="text" name="Username" placeholder="Name" autofocus="off">
      <input type="text" name="Email" placeholder="Email" autocomplete="off">
      <input type="password" name="Password" placeholder="Passwort" autocomplete="off">
    </div>
    <button name="submit">Erstellen</button>
    <p class="reg"><a href="Login.php">Ich habe einen Account</a></p>
  </form>
</body>

</html>