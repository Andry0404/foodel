<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

session_start();

$queryGetOrdini = "SELECT DISTINCT data_ordine, id_ristorante FROM Ordina_da GROUP BY data_ordine, id_ristorante;";
$queryGetOrdiniResult = mysqli_query($connection, $queryGetOrdini);
$ordini = array();
$n = mysqli_num_rows($queryGetOrdiniResult);

for ($i = 0; $i < $n; $i++) {
    array_push($ordini, mysqli_fetch_array($queryGetOrdiniResult));
}

$ordine2ristorante = array();

for ($i=0; $i < count($ordini); $i++) { 
    $id_ristorante = $ordini[$i]["id_ristorante"];
    $data_ordine = $ordini[$i]["data_ordine"];

    $getRistorante = "SELECT * FROM Ristorante WHERE id_ristorante=".$id_ristorante.";";
    $getRistoranteResult = mysqli_query($connection, $getRistorante);
    $nome = mysqli_fetch_array($getRistoranteResult)["nome"];

    array_push($ordine2ristorante, ["data_ordine"=>$data_ordine, "nome"=>$nome, "id_ristorante"=>$id_ristorante]);
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
            <h2 style='margin-bottom: 2px'>Ordini effettuati</h2>
            <?php
            if (count($ordine2ristorante) === 0) {
                print("<p>Non ci sono ordini</p>");
            } else {
                print("<table border>");
                print("<thead><tr>");
                print("<th>Data ordine</th>");
                print("<th>Nome ristorante</th>");
                print("<th></th>");
                print("</tr></thead>");
                print("<tbody>");
                for ($i = 0; $i < count($ordine2ristorante); $i++) {
                    print("<tr>");
                    print("<td>" . $ordine2ristorante[$i]["data_ordine"] . "</td>");
                    print("<td>" . $ordine2ristorante[$i]["nome"] . "</td>");
                    print("<td><div id=".$ordine2ristorante[$i]["id_ristorante"]." class='subscribe-button lascia-recensione'>Lascia recensione</div></td>");
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

    <script src="../../scripts/lasciaRecensione.js"></script>

</body>

</html>