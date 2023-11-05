<?php
session_start();
if (!isset($_SESSION["username"]))
{
    echo "Login first";
}
else {
    echo "Welcome ", $_SESSION["username"],".";
}

?>