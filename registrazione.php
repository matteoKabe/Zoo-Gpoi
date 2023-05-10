<?php session_start(); ?>
<html>
<head>
    <?php
        if (isset($_REQUEST['err'])) {
            switch ($_REQUEST['err']) {
                case 1:
                    echo "Email già in utilizzo, devi cambiarlo";
                    break;
                default:
                    echo "errore generico";
                    break;
            }
        }

    ?>  
    <title>Registrazione</title>
</head>
<body>
    <h1>Pagina di Registrazione</h1>
    <form action=registra.php method=post>
          <div>
            <label for=nome>Inserisci il nome: </label>
            <input type=text name="nome" id="nome" placeholder="Nome" required />
            <label for=cognome>Inserisci il cognome: </label>
            <input type=text name="cognome" id="cognome" placeholder="Cognome" required />
            <label for=nascita>Inserisci la data di nascita: </label>
            <input type=date name="nascita" id="nascita" placeholder="Data di nascita" required />
        </div>
        <div>
            <label for=email>Inserisci l'email: </label>
            <input type=email name="email" id="email" placeholder="Email" required />
            <label for=password>Inserisci la password: </label>
            <input type=password name="pass" id="pass" placeholder="Password" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>
    <a href="login.php">Torna alla pagin di Login</a>
</body>
</html>