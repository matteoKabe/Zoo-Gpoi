<?php
    session_start();
    $nome = $_REQUEST['nome'];
    $peso = $_REQUEST['peso'];
    $eta = $_REQUEST['eta'];
    $specie = $_REQUEST['specie'];
    $musica = $_REQUEST['musica'];

    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
    if ($conn->connect_errno) {
        echo $conn->connect_errno;
        die();
    }

    $query = "SELECT cod_specie FROM specie WHERE nome_specie = '$specie';";
    $ris = $conn->query($query);
    while ($riga = $ris->fetch_assoc()) {
        $codice = $riga['cod_specie'];
    }

    //inserisco il nuovo utente nel databse
    $query = "INSERT INTO profiloanimale (nome, peso, eta_animale, musica, cod_specie) VALUES ('$nome', '$peso', '$eta', '$musica', '$codice');";
    $ris = $conn->query($query);
    header("location: zooAdmin.php?err=3");

    echo "non riuscito";

?>