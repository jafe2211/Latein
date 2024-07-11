<?php
session_start();
if (isset($_POST["gramma"])) {
    Header("Location: Eins.php");
    return;
}
if (isset($_POST["Voc"])) {
    Header("Location: Voc.php");
    return;
}
Header("Location: newPost.php");
