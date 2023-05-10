<?php
    session_start();

    //manca tutto il controllo per i vari login per admin e per lavoratore 
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['pass']);
    $_SESSION['nome'] = $nome;

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    //login per l'admin
    if($email == "admin@gmail.com" && $password == "21232f297a57a5a743894a0e4a801fc3"){
        header("location:zooAdmin.php");
        die();
    }

    //login per i dipendenti
    //dato che i dipendenti sono gli unici ad avere l'attributo "nomignolo" allora se avrò una riga che risponde alla mia query
    //vuol dire che avrò trovato un lavoratore
    $query = "SELECT Nomignolo FROM Dipendenti, Persona WHERE Dipendenti.cod_persona = Persona.cod_persona AND mail='$email' AND password='$password';";
    $ris = $conn->query($query);
    if ($conn->affected_rows == 1) {
        $riga = $ris->fetch_assoc();
        $nomignolo = $riga['nomignolo'];
        $_SESSION['nomignolo'] = $nomignolo;
        header("location:zooDipendenti.php");
        die();
    }

    //login per i clienti
    $query = "SELECT * FROM Persona WHERE mail='$email' AND password='$password'";
    $ris = $conn->query($query);
    if ($conn->affected_rows == 1) {
        header("location:zoo_cliente.php");
        die();
    }

    header("location:login.php?err=1");

?>