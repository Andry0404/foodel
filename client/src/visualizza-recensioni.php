<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

session_start();

$queryGetRecensioni = "SELECT * FROM Recensione WHERE id_ristorante=".$_SESSION["ristid"].";";
$queryGetRecensioniResult = mysqli_query($connection, $queryGetRecensioni);
$n = mysqli_num_rows($queryGetRecensioniResult);

$recensioni = array();
for ($i=0; $i < $n; $i++) { 
    array_push($recensioni, mysqli_fetch_array($queryGetRecensioniResult));
}

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

    <div class="ristorante-info">
        <div class="ristorante-item" style="padding-bottom: 20px">
            <h2 style='margin-bottom: 2px'>Recensioni ricevute per il tuo ristorante</h2>
            <?php
            if (count($recensioni) === 0) {
                print("<p>Non ci sono recensioni</p>");
            } else {
                print("<table border>");
                print("<thead><tr>");
                print("<th>Data</th>");
                print("<th>Valutazione stelle (1-5)</th>");
                print("<th>Commento</th>");
                print("</tr></thead>");
                print("<tbody>");
                for ($i = 0; $i < count($recensioni); $i++) {
                    print("<tr>");
                    print("<td>" . $recensioni[$i]["data_recensione"] . "</td>");
                    print("<td>" . $recensioni[$i]["valutazione_stelle"] . "</td>");
                    print("<td>" . $recensioni[$i]["valutazione_recensione"] . "</td>");
                    print("</tr>");
                }
                print("</tbody></table>");
            }
            ?>
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