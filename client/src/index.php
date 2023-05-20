<?php

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

if ($type == "cliente") {
    header("Refresh:0; url=http://localhost/foodel/client/src/index-cliente.php");
} else if ($type == "proprietario") {
    header("Refresh:0; url=http://localhost/foodel/client/src/index-proprietario.php");
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="navbar">
        <div style="display: flex; flex-direction: row; justify-content: space-between;">
            <div>
                <div class="maintitle" style="width: fit-content;">
                    <a class="not-decorated" href="./index.php">
                        <div class="material-symbols-outlined" style="font-size: 38px;">
                            ramen_dining
                        </div>
                        <b>foodel</b>
                    </a>
                </div>
                <div style='font-size:14px; width: 100%;'>Tu pensi al <b><i>food</i></b>, noi pensiamo al <b><i>delivery</i></b>.</div>
            </div>
            <div style="margin: 25px 60px 0px 0px;">
                <?php
                if ($type === "vuoto") {
                    print("
                <div class=\"button menuItem\">
                    <a class=\"not-decorated\" href=\"./login.php\">Login</a>
                </div>");
                }
                ?>
                <?php
                if ($type !== "vuoto") {
                    print("
                <div class=\"button menuItem\">
                    <a class=\"not-decorated\" href=\"../../server/src/logout.php\">Logout</a>
                </div>");
                }
                ?>
            </div>
        </div>
        <?php if (isset($_SESSION["userID"])) {
            print("<div style='margin-top: 15px; background-color: white; width: fit-content; border-radius: 60px; padding: 7px 14px 7px 14px'>");

            if ($nome != "") {
                echo ("Utente loggato: " . $nome);
                echo (" - " . $type);
            }

            print("</div>");
        }
        ?>
    </div>

    <h1 style="display: flex; justify-content:center; font-weight: 1000;"><b>Un posto a tavola, per tutti.</b></h1>
    <div class='mainpage-info'>
        <div class='mainpage-item-left'>
            <p style='font-size:24px'><b>Per i ristoranti</b></p>
            <p>
                Promuovi la tua cucina, il tuo ristorante, il tuo stile.
            </p>
            <p>
                Iscriviti gratuitamente, registra il tuo ristorante ed aggiungi i tuoi piatti: <br /> i clienti non vedono l'ora di scoprire ristoranti nuovi ed il prossimo potresti essere tu!
            </p>
            <div onclick="location.href='signup-proprietario.php'" class='subscribe-button'>Iscriviti e registra il tuo ristorante!</div>
        </div>
        <div class='mainpage-item-right'>
            <p style='font-size:24px'><b>Per i clienti</b></p>
            <p>Da solo o in compagnia, preparati a gustare sapori unici!</p>
            <p>
                Da ogni quartiere della tua città, ristoranti, locali, gelaterie e tante altre attività <br />
                sono pronti ad offrirti bontà e piatti dal sapore indimenticabile!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Registrati ed inizia ad ordinare!</div>
        </div>
    </div>

    <div class="banner-image-left" style="background-color: beige">
        <img class="image image-left" style="max-width: 50%; border-bottom-right-radius: 800px; box-shadow: 0 0 20px #999999;" src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="banner" />
        <div style="max-width: 50%;">
            <p style="margin-top: 45px; margin-left: 48px; margin-bottom: 0px;"><b>Proprietari</b></p>
            <br></br>
            <p style="margin-top: 0px;margin-left: 48px; text-align: justify;text-justify: inter-word; max-width: fit-content; margin-right: 48px;">
                Vuoi che il tuo ristorante diventi famoso e apprezzato da migliaia di persone? Ti presentiamo <b>FOODEL</b> un sito web dove puoi registrare il tuo ristorante mettendo solo il nome, l'indirizzo e il numero di telefono,
                e in velocità della luce lo apprezzeranno tutti.</br>
                Grazie al nostro servizio potrai conoscere nuovi clienti che scopriranno la tua cucina, la tua tradizione culinaria, i tuoi piatti.</br>
            </p>
        </div>
    </div>
    <div class="banner-image-right">
        <div style="max-width: 50%;">
            <p style="margin-top: 45px; margin-left: 48px; margin-bottom: 0px;"><b>Clienti</b></p>
            <br></br>
            <p style="margin-top: 0px;margin-left: 48px; text-align: justify;text-justify: inter-word; max-width: fit-content; margin-right: 48px;">
                Vuoi mangiare bene da solo o in compagnia a casa? Allora sei nel posto giusto: ti presentiamo <b>FOODEL</b> dove puoi ordinare tutto quello che vuoi nei tuoi ristoranti preferiti o nei ristoranti vicino a te,
                in modo semplice e veloce, basta solo che scegli il posto, cosa vuoi mangiare e la via di destinazione e in un batter d'occhio saremo da te.</br>
                Buon appetito!

            </p>
        </div>
        <img class="image image-right" style="max-width: 50%; border-top-left-radius: 800px; box-shadow: 0 0 20px #965931;" src="https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="banner" />
    </div>

    <footer><small>
            <div class="material-symbols-outlined" style="font-size: 12px;">
                ramen_dining
            </div>
            <b>Foodel - Copyright © 2023 Andrea De Giorgi. All Rights Reserved.</b>
        </small>
    </footer>
</body>

</html>