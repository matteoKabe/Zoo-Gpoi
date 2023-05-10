<?php

    $nomignolo = $_REQUEST['dip'];

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    //ricerco il codice
    $query = "SELECT cod_persona FROM dipendenti WHERE nomignolo='$nomignolo'";
    $ris = $conn->query($query);
    while ($riga = $ris->fetch_assoc()) {
        $codice = $riga['cod_persona'];
    }
    
    //ricerco la mail
    $query = "SELECT mail FROM dipendenti,persona WHERE dipendenti.cod_Persona=persona.cod_Persona AND nomignolo='$nomignolo';";
    $ris = $conn->query($query);
    while ($row = $ris->fetch_assoc()) {
        $mail = $row['mail'];
        $query = "INSERT INTO listavergogna(mail) VALUES ('$mail');"; //aggiungo alla lista della vergogna
        $ris2 = $conn->query($query);
    }

    //elimino il dipendente dal database
    $query = "DELETE FROM persona WHERE cod_persona=$codice;";
    $ris = $conn->query($query);
    


    header("location: zooAdmin.php?err=4");

    echo "non riuscito";
?>