<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

if ($type === "vuoto" || $type === "proprietario") {
    header("Location: http://localhost/foodel/client/src/index.php");
}

$id_cliente = $_SESSION["userID"];

$query = "SELECT * FROM Cliente WHERE id_cliente=$id_cliente;";

$result = mysqli_query($connection, $query);

$n = mysqli_num_rows($result);

if ($n === 0) {
    $result_type = 0;
    $cliente = null;
} else {
    $result_type = 1;
    $cliente = mysqli_fetch_array($result);
}

if ($result_type === 0) {
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php");
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

    <div class='ristorante-info'>
        <div class='ristorante-item'>
            <p style='font-size:24px'><b><?php echo $cliente["nome"] ?>&nbsp;<?php echo $cliente["cognome"] ?></b></p>
            <p>
                <span style="font-size: 16px" class="material-symbols-outlined">
                    mail
                </span>
                Email: <?php echo $cliente["email"] ?>
            </p>
            <p>
                <span style="font-size: 16px" class="material-symbols-outlined">
                    event
                </span>
                Data di nascita: <?php echo $cliente["data_nascita"] ?>
            </p>
            <p><span style="font-size: 16px" class="material-symbols-outlined">
                    home
                </span>
                Indirizzo: <?php echo $cliente["indirizzo"] ?>
            </p>
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