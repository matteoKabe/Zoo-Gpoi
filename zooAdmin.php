<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php

        if(isset($_REQUEST['err'])){
            switch ($_REQUEST['err']) {
                case '1':
                    echo "dipendente aggiunto";
                    break;
                case '2':
                    echo "email gia utilizzata";
                    break;
                case '3':
                    echo "animale aggiunto";
                    break;
                case '4':
                    echo "dipendente licenziato GODO";
                    break;
                default:
                    echo "errore generico";
                    break;
            }
        }

        $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
        if ($conn->connect_errno) {
             echo $conn->connect_errno;
             die();
        }
    ?>
</head>
<body>
    <h1>Benvenuto Admin</h1>
    <h3>Aggiungi un dipendente: </h3>
    <form action=addDipendente.php method=post>
        <div>
            <label for=nome>Inserisci il nome: </label>
            <input type=text name="nome" id="nome" placeholder="Nome" required />
            <label for=nomignolo>Inserisci il nomignolo: </label>
            <input type=text name="nomignolo" id="nomignolo" placeholder="Nomignolo" required />
            <label for=cognome>Inserisci il cognome: </label>
            <input type=text name="cognome" id="cognome" placeholder="Cognome" required />
            <label for=ferie>Inserisci le ferie: </label>
            <input type=date name="ferie" id="ferie" placeholder="Ferie" required />
            <label for=nascita>Inserisci la data di nascita: </label>
            <input type=date name="nascita" id="nascita" placeholder="Data di nascita" required />
        </div>
        <div>
            <label for="mansione">Seleziona la mansione </label>
            <select name=mansione>
                <option value=0>Cassiere</option>
                <option value=1>Curatore</option>
                <option value=2>Venditore</option>
            </select>
            <label for=email>Inserisci l'email: </label>
            <input type=email name="email" id="email" placeholder="Email" required />
            <label for=password>Inserisci la password: </label>
            <input type=password name="password" id="password" placeholder="Password" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>

    <h3>Aggiungi un animale: </h3>
    <form action=addAnimale.php method=post>
        <div>
            <label for=nome>Inserisci il nome: </label>
            <input type=text name="nome" id="nome" placeholder="Nome" required />
            <label for=peso>Inserisci il peso: </label>
            <input type=number name="peso" id="peso" placeholder="Peso" required />
            <label for=eta>Inserisci l'età: </label>
            <input type=number name="eta" id="eta" placeholder="Età" required />
            <label for=specie>Inserisci la Specie: </label>
            <select name="specie">
                <?php
                    $conn = new mysqli("127.0.0.1", "root", "", "Zoo");
                    if ($conn->connect_errno) {
                        echo $conn->connect_errno;
                        die();
                    }

                    $query = "SELECT nome_specie FROM specie;";
                    $ris = $conn->query($query);
                    while ($row = $ris->fetch_assoc()) {
                        foreach ($row as $key => $value) {
                            echo "<option>$value</option>";
                        }
                    }

                ?>
            </select>
            <label for=musica>Inserisci il genere musicale preferito: </label>
            <select name=musica id=musica>
                <option value="Pop">Pop</option>
                <option value="Rock">Rock</option>
                <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
                <option value="Dance/Elettronica">Dance/Elettronica</option>
                <option value="Latina">Latina</option>
                <option value="Classica">Classica</option>
                <option value="R&B">R&B</option>
                <option value="Country">Country</option>
                <option value="Reggae">Reggae</option>
                <option value="Soundtrack">Soundtrack</option>
            </select>
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>    

    <h3>Licenzia un dipendente: </h3>
    <form action=licenzia.php method=post>
        <div>
            <label for=dip>Seleziona dipendente: </label>
            <select name=dip>
                <?php
                    $query = "SELECT nomignolo FROM dipendenti WHERE orario_lavorativo<40;";
                    $ris = $conn->query($query);
                    while ($row = $ris->fetch_assoc()) {
                        foreach ($row as $key => $value) {
                            echo "<option value=$value>$value</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>
    
    <a href=login.php>Torna alla pagina di Login</a>
</body>
</html>