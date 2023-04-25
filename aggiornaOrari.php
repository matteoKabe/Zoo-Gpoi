<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aggiorna Orari</title>
</head>
<body>
    <h3>Modifica gli orari di un negozio: </h3>
    <form action=updateOrari.php method=post>
        <div>
            <label for=apri>Inserisci orario di apertura: </label>
            <input type=number name="apri" id="apri" placeholder="Apertura" required />
            <label for=chiudi>Inserisci orario di chiusura: </label>
            <input type=number name="chiudi" id="chiudi" placeholder="Chiusura" required />
        </div>
        <div>
            <input type="submit" name="invia" />
        </div>
    </form>
</body>
</html>