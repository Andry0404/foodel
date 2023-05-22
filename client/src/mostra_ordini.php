<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

session_start();

$id_ristorante = $_SESSION["ristid"];

$getOrdiniQuery = "SELECT * FROM Ordina_da WHERE id_ristorante=$id_ristorante";
$getOrdiniResult = mysqli_query($connection, $getOrdiniQuery);

$ordini = array();
$n = mysqli_num_rows($getOrdiniResult);
$ordiniFields = mysqli_fetch_fields($getOrdiniResult);

if ($n === 0) {
    $result_type = 0;
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=408");
} else {
    $result_type = 1;
}

for ($i = 0; $i < $n; $i++) {
    array_push($ordini, mysqli_fetch_array($ids_prodotti));
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

    <div style="display: flex; justify-content: center; margin-bottom: 0px;">
        <h1 style="margin-bottom: 0px">Menu</h1>
    </div>

    <div style="display: flex; justify-content: center; margin-top: 0px;">
        <h4 style="margin-top: 0px;"><?php print($ristorante["nome"]) ?></h4>
    </div>

    <div class="ristorante-info">
        <div class="ristorante-item">
            <h2>Storico ordini</h2>
            <table>
                <tr>
                    <?php
                    for ($i=0; $i < count($ordiniFields); $i++) { 
                        print("<th>".$ordiniFields[$i]."</th>");
                    }
                    ?>
                </tr>
                <?php
                for ($i=0; $i < $n; $i++) { 
                    print("<tr>");
                    print("<td>");
                    print($ordini[$i]["importo"]);
                    print("</td>");
                    print("</tr>");
                }
                ?>
            </table>
            <?php
            for ($i = 0; $i < count($ordini); $i++) {
                print("<p>" . $ordini[$i]["nome"] . "</p>");
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