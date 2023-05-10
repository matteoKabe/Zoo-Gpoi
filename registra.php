<?php
    session_start();
    $nome = $_REQUEST['nome'];
    $cognome = $_REQUEST['cognome'];
    $data_nascita = strtotime($_REQUEST['nascita']);
    $email = $_REQUEST['email'];
    $pass = md5($_REQUEST['pass']);
    $_SESSION['nome'] = $nome;

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    //controllo che non ci siano più utenti con lo stesso nome
    $queryControllo= "Select * from Persona where mail='$email'";
    $ris = $conn->query($queryControllo);
    if($conn->affected_rows == 1) { 
        header("Location:registrazione.php?err=1");
        die();
    }

    //inserisco il nuovo utente nel database
    $query = "INSERT INTO Persona (nome, cognome, mail, data_nascita, password) VALUES ('$nome', '$cognome', '$email', '$data_nascita', '$pass');";
    $ris = $conn->query($query);
    if($conn->affected_rows == 1) {
        header("Location:zoo_cliente.php");
        die();
    }

    echo "non riuscito";
    
?>