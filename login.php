<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php 
        if (isset($_REQUEST['err'])) {
            switch ($_REQUEST['err']) {
                case '1':
                    echo "utente non trovato";
                    break;
                default:
                    echo "errore generico";
                    break;
            }
        }
    ?>
</head>
<body>
    <h1>Pagina di Login</h1>
    <form action=autentifica.php method=post>
        <div>
            <label for=email>Inserisci l'email: </label>
            <input type=email name="email" id="email" placeholder="Email" required />
            <label for=password>Inserisci la password: </label>
            <input type=password name="password" id="password" placeholder="Password" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>
    Non hai un account? <a href=registrazione.php>Registrati ora!</a>
</body>
</html>