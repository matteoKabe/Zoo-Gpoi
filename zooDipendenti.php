<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
        $nomignolo = $_SESSION['nomignolo'];

        $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
        if ($conn->connect_errno) {
             echo $conn->connect_errno;
             die();
        }
        
        $query = "SELECT orario_lavorativo FROM Dipendenti WHERE nomignolo='$nomignolo'";
        $ris = $conn->query($query);
        if ($conn->affected_rows == 1) {
            $riga = $ris->fetch_assoc();
            $ore = $riga['orario_lavorativo'];
        }
        $nome = "carlo";
         
    ?>
</head>
<body>
    <h1>Benvenuto <?php echo $carlo; ?> </h1>
    <h3>Queste sono le tue ore settimanali: <?php echo $ore; ?> </h3>
    <label for=turni>Inserisci l'orario di inizio e di fine turno</label>
    <form id=turni action=inserisciOrario.php method=post>
        <input type=number name=inizio placeholder="Inizio turno" required />
        <input type=number name=fine placeholder="Fine turno" required />
        <input type=submit name=invia/>
    </form>
    <a href=login.php>Torna alla pagina di Login</a>
</body>
</html>