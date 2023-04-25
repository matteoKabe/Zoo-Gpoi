<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php
        //$nomignolo = $_SESSION['nomignolo'];

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
            <label for=razza>Inserisci la Razza: </label>
            <input type=text name="razza" id="razza" placeholder="Razza" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>
    
    //aggiungere habitat??????????
    
    <h3>Modifica i visitatori massimi: </h3>
    <form action=aggiornaMax.php method=post>
        <div>
            <label for=visMax>Inserisci quanti possono essere i visitatori massimi: </label>
            <input type=number name="visMax" id="visMax" placeholder="Visitatori Massimi" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>

    //Modifica dati zoo?????????

    <h3>Modifica gli orari di un negozio: </h3>
    <form action=aggiornaOrari.php method=post>
        <div>
            <label for=strutt>Seleziona struttura: </label>
            <select name=strutt>
                <?php
                    //codice per ottenere tutte le strutture da stampare come opzioni
                ?>
            </select>
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>

    <h3>Dipendenti con meno di 40 ore: </h3>
    <form action=rimuoviDaLista.php method=post>
        <div>
            <label for="menoDi40">Seleziona dipendente tra quelli con meno di 40 ore: </label>   
            <select name="menoDi40">
                <?php
                    //codice per ottenere tutti i dipendenti con meno di 40 ore da stampare come opzioni
                ?>
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
            <select name=dip   >
                <?php
                    //codice per ottenere tutti i dipendenti da stampare come opzioni
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