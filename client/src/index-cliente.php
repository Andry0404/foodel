<?php

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

if ($type !== "cliente") {
    header("Refresh:0; url=http://localhost/foodel/client/src/index.php");
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
    
    <h1 style="display: flex; justify-content:left; margin-left: 150px; font-weight: 1000;"><b>Dashboard</b></h1>
    <div class='mainpage-info'>
        <div class='proprietario-item-info'>
            <p style='font-size:24px'><b>Informazioni personali</b></p>
            <p>
                Da questa pagina potrai vedere tutte le tue informazioni personali.
            </p>
            <div onclick="location.href='mostra-dati-cliente.php'" class='subscribe-button'>Scopri di più</div>
        </div>
        <div class='proprietario-item-add'>
            <p style='font-size:24px'><b>Fai un ordine</b></p>
            <p>
                Scegli un ristorante e fai il tuo ordine!
            </p>
            <div onclick="location.href='mostra-ristoranti.php'" class='subscribe-button'>Ordina</div>
        </div>
    </div>
    <div class='mainpage-info'>
        <div class='proprietario-item-orders'>
            <p style='font-size:24px'><b>Visualizza ordini</b></p>
            <p>
                Visualizza tutti i tuoi ordini passati.
            </p>
            <div onclick="location.href='visualizza-ordini.php'" class='subscribe-button'>Vedi ordini passati</div>
        </div>
        <div class='proprietario-item-review'>
            <p style='font-size:24px'><b>Lascia una recensione</b></p>
            <p>
                In questa pagina puoi lasciare una recensione per un tuo ordine passato.
            </p>
            <div onclick="location.href='seleziona-ordine-per-recensione.php'" class='subscribe-button'>Crea recensione</div>
        </div>
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