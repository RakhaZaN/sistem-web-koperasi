<?php

require 'connection.php';

session_start();
$_SESSION['login'] = false;

$rakha1 = htmlspecialchars($_POST['username']);
$rakha2 = $_POST['password'];
$rakha3 = mysqli_query($conn, "select * from users where user_id = '$rakha1' and password = '$rakha2'");
$rakha4 = mysqli_num_rows($rakha3);

if ($rakha1 == "" || $rakha2 == "") {
    echo "<script>
        alert('Login Failed ! Username or Password Cannot be Empty');
        document.location.href = 'login.php';
        </script>";
} else {
    if ($rakha4 > 0) {
        $rakha5 = mysqli_fetch_assoc($rakha3);
        $_SESSION['username'] = $rakha1;
        $_SESSION['login'] = true;
        echo "<script>
            alert('Login Successfully');
            document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Login Failed !');
            document.location.href = 'login.php';
            </script>";
    }
}
