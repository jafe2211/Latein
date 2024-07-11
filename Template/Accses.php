<?php
function canVisit()
{
    
}
function HasSecure1()
{
    if (!$_SESSION["Secure"] > 0) {
        header("Location: Main.php?error=1");
        return;
    }
}
function HasSecure2()
{
    if (!$_SESSION["Secure"] > 1) {
        header("Location: Main.php?error=1");
        return;
    }
}
