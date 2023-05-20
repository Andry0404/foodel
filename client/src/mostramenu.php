<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

session_start();

$id_ristorante = $_SESSION["ristid"];

$antipasti = array();
$primi = array();
$secondi = array();
$dessert = array();

$query_get_ids_prodotti = "SELECT * FROM Vende WHERE id_ristorante=$id_ristorante;";
$ids_prodotti = mysqli_query($connection, $query_get_ids_prodotti);
$n = mysqli_num_rows($ids_prodotti);
if ($n === 0) {
    $result_type = 0;
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=403");
} else {
    $result_type = 1;
}

for ($i = 0; $i < $n; $i++) {
    $id_prodotto = mysqli_fetch_array($ids_prodotti);
    $query_get_prodotti = "SELECT * FROM Prodotto WHERE id_prodotto=" . $id_prodotto["id_prodotto"] . ";";
    $prodotti = mysqli_query($connection, $query_get_prodotti);
    $m = mysqli_num_rows($prodotti);
    if ($m === 0) {
        $result_type = 0;
        header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=403");
    } else {
        $result_type = 1;
        $prodotto = mysqli_fetch_array($prodotti);
        if ($prodotto["categoria"] === "antipasto") array_push($antipasti, $prodotto);
        else if ($prodotto["categoria"] === "primo") array_push($primi, $prodotto);
        else if ($prodotto["categoria"] === "secondo") array_push($secondi, $prodotto);
        else if ($prodotto["categoria"] === "dessert") array_push($dessert, $prodotto);
    }
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

    <?php
    for ($i = 0; $i < count($antipasti); $i++) {
        print("<p>" . $antipasti[$i]["nome"] . "</p>");
    }
    ?>
    <?php
    for ($i = 0; $i < count($primi); $i++) {
        print("<p>" . $primi[$i]["nome"] . "</p>");
    }
    ?>
    <?php
    for ($i = 0; $i < count($secondi); $i++) {
        print("<p>" . $secondi[$i]["nome"] . "</p>");
    }
    ?>
    <?php
    for ($i = 0; $i < count($dessert); $i++) {
        print("<p>" . $dessert[$i]["nome"] . "</p>");
    }
    ?>

    <footer><small>
            <div class="material-symbols-outlined" style="font-size: 12px;">
                ramen_dining
            </div>
            <b>Foodel - Copyright © 2023 Andrea De Giorgi. All Rights Reserved.</b>
        </small>
    </footer>
</body>

</html>