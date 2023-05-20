<?php

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="info-ristorante">
        <div class="ristorante-barra-nome">
            <h1 id="nome-ristorante" class="nome-ristorante">Pizzeria da Ivan</h1>
        </div>
        <div class="ristorante-barra-indirizzo" style="display: flex; justify-content: space-evenly; font-size: 12px;">
            <h3 id="indirizzo-ristorante" class="indirizzo-ristorante">Via Dei Monti, 42</h3>
            <h4 id="recensione" class="recensione">Recensione: ***</h4>
        </div>
    </div>

    <div class="generale-menu">
        <div class="categoria-menu">
            <h3>Antipasto</h3>
            <p>ANTIPASTO 1</p>
            <p>ANTIPASTO 2</p>
            <p>ANTIPASTO 3</p>
            <p>ANTIPASTO 4</p>
            <p>ANTIPASTO 5</p>
        </div>
        <div class="categoria-menu">
            <h3>Primo</h3>
            <p>PRIMO 1</p>
            <p>PRIMO 2</p>
            <p>PRIMO 3</p>
            <p>PRIMO 4</p>
            <p>PRIMO 5</p>
        </div>
        <div class="categoria-menu">
            <h3>Secondo</h3>
            <p>SECONDO 1</p>
            <p>SECONDO 2</p>
            <p>SECONDO 3</p>
            <p>SECONDO 4</p>
            <p>SECONDO 5</p>
        </div>
        <div class="categoria-menu">
            <h3>Dessert</h3>
            <p>DESSERT 1</p>
            <p>DESSERT 2</p>
            <p>DESSERT 3</p>
            <p>DESSERT 4</p>
            <p>DESSERT 5</p>
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