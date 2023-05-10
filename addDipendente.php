<?php
    session_start();
    $nome = $_REQUEST['nome'];
    $nomignolo = $_REQUEST['nomignolo'];
    $cognome = $_REQUEST['cognome'];
    $ferie = strtotime($_REQUEST['ferie']);
    $data_nascita = strtotime($_REQUEST['nascita']);
    $mail = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $mansione = $_REQUEST['mansione'];

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    //controllo che non ci siano più utenti con lo stesso nome
    $queryControllo= "Select * from Persona where mail='$mail'";
    $ris = $conn->query($queryControllo);
    if($conn->affected_rows == 1) { 
        header("Location:zooAdmin.php?err=2");
        die();
    }

    //inserisco il nuovo utente nel databse
    $query = "INSERT INTO Persona (nome, cognome, mail, data_nascita, password) VALUES ('$nome', '$cognome', '$mail', '$data_nascita', '$password');";
    $ris = $conn->query($query);

    $query = "SELECT cod_persona FROM Persona WHERE mail = '$mail' AND password = '$password'";
    $ris = $conn->query($query);
    while ($riga = $ris->fetch_assoc()) {
        $codice = $riga['cod_persona'];
        $query = "INSERT INTO Dipendenti (cod_persona,nomignolo, ferie) VALUES ($codice,'$nomignolo','$ferie');";
        $ris2 = $conn->query($query);
    }
    if($conn->affected_rows==1){
        $query = "SELECT cod_persona FROM Persona WHERE mail = '$mail' AND password = '$password'";
        $ris = $conn->query($query);
        while($riga = $ris->fetch_assoc()){
            $codice = $riga['cod_persona'];
            if($mansione == 0){
                $query = "INSERT INTO CommessiCassa (cod_persona) VALUES ($codice);";
                $ris2 = $conn->query($query);
                header("location:zooAdmin.php?err=1");
                die();
            }else if ($mansione == 1) {
                $query = "INSERT INTO Curatori (cod_persona) VALUES ($codice);";
                $ris2 = $conn->query($query);
                header("location:zooAdmin.php?err=1");
                die();
            }else if ($mansione == 2) {
                $query = "INSERT INTO Venditori (cod_persona) VALUES ($codice);";
                $ris2 = $conn->query($query);
                header("location:zooAdmin.php?err=1");
                die();
            }
        }
    }

    echo "non riuscito";

?>