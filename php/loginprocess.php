<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{


    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "newdb";#define SQL CONNECTION variables
    
    $conn = mysqli_connect($host, $user, $password, $db);
    if (mysqli_connect_errno()) 
    {
        echo "". mysqli_connect_error();
    }
    else
    {
        $username = $_POST["username"]; 
        $email = $_POST["email"];
        $password = $_POST["password"];#define input posts;
        $sql = "SELECT email, username, passwordd from users WHERE email = '$email' AND username = '$username' AND passwordd = '$password'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "Successful login";
            $_SESSION["username"] = $username;
            header("location: welcome.php");
        }
        else
        {
            echo "Could not fetch any data, debug further in editor";
        }

    }
}
else
{
    echo "no";
}
