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
        $validaitoncheck = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
        $resultchecl = mysqli_query($conn, $validaitoncheck);
        $countcheck = mysqli_num_rows($resultchecl);
        if ($countcheck > 0) 
        {
            echo "Someone else already has these details";
            header("refresh:3;url=../html/signup.html");
        }
        else
        {
            $sql = "INSERT INTO users (email, username, passwordd) VALUES (?, ?, ?)";
            $result = mysqli_query($conn, $sql,); 
            if ($result == true) {
                echo "Successful data placement";
            }
            else
            {
                echo "Could not place any data, debug further in editor";
            }
        }


    }
}
else
{
    echo "no";
}
