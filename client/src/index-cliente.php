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

    <h1 style="display: flex; justify-content:center; font-weight: 1000;"><b>Ecco alcuni ristoranti</b></h1>
    <div class='mainpage-info'>
        <div class='cliente-item-left'>
            <p style='font-size:24px'><b>ristorante 1</b></p>
            <p>
                nome, orario apertura - chiusura
            </p>
            <p>
                Iscriviti gratuitamente, registra il tuo ristorante ed aggiungi i tuoi piatti: <br /> i clienti non vedono l'ora di scoprire ristoranti nuovi ed il prossimo potresti essere tu!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Iscriviti e registra il tuo ristorante!</div>
        </div>
        <div class='cliente-item-right'>
            <p style='font-size:24px'><b>Ristorante 2</b></p>
            <p> nome, orario apertura - chiusura</p>
            <p>
                Da ogni quartiere della tua città, ristoranti, locali, gelaterie e tante altre attività <br />
                sono pronti ad offrirti bontà e piatti dal sapore indimenticabile!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Registrati ed inizia ad ordinare!</div>
        </div>

    </div>

    <div class='mainpage-info'>
        <div class='cliente-item-left'>
            <p style='font-size:24px'><b>ristorante 3</b></p>
            <p>
                nome, orario apertura - chiusura
            </p>
            <p>
                Iscriviti gratuitamente, registra il tuo ristorante ed aggiungi i tuoi piatti: <br /> i clienti non vedono l'ora di scoprire ristoranti nuovi ed il prossimo potresti essere tu!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Iscriviti e registra il tuo ristorante!</div>
        </div>
        <div class='cliente-item-right'>
            <p style='font-size:24px'><b>Ristorante 4</b></p>
            <p>nome, orario apertura - chiusura</p>
            <p>
                Da ogni quartiere della tua città, ristoranti, locali, gelaterie e tante altre attività <br />
                sono pronti ad offrirti bontà e piatti dal sapore indimenticabile!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Registrati ed inizia ad ordinare!</div>
        </div>
    </div>

    <div class='mainpage-info'>
        <div class='cliente-item-left'>
            <p style='font-size:24px'><b>ristorante 5</b></p>
            <p>
                nome, orario apertura - chiusura
            </p>
            <p>
                Iscriviti gratuitamente, registra il tuo ristorante ed aggiungi i tuoi piatti: <br /> i clienti non vedono l'ora di scoprire ristoranti nuovi ed il prossimo potresti
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Iscriviti e registra il tuo ristorante!</div>
        </div>
        <div class='cliente-item-right'>
            <p style='font-size:24px'><b>Ristorante 6</b></p>
            <p>nome, orario apertura - chiusura</p>
            <p>
                Da ogni quartiere della tua città, ristoranti, locali, gelaterie e tante altre attività <br />
                sono pronti ad offrirti bontà e piatti dal sapore indimenticabile!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Registrati ed inizia ad ordinare!</div>
        </div>
    </div>

    </br>

    <footer><small>
            <div class="material-symbols-outlined" style="font-size: 12px;">
                ramen_dining
            </div>
            <b>Foodel - Copyright © 2023 Andrea De Giorgi. All Rights Reserved.</b>
        </small>
    </footer>
</body>

</html>