<?php
    session_start();
    $email = $_REQUEST['email'];
    $pass = md5($_REQUEST['pass']);
    $_SESSION['nome'] = $nome;

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    $query = "SELECT * FROM Utenti WHERE email='$email' AND pass='$pass'";
    $ris = $conn->query($query);
    if ($conn->affected_rows == 1) {
        $_SESSION['user'] = $user;
        header("location:zoo.php");
        die();
    }

    header("location:login.php?err=1");

?>