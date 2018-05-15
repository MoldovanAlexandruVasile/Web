<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = mysqli_connect("localhost","root","", "Collection");

    $result = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' and password = '$password'") or die("Failed to query DB " + mysql_error());
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password){
        header('Location: index.php'); 
    }
    else{
        echo "Login failed !";
    }
?>