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

    <div class="login">
        <form action="../../server/src/login.php" method="post">
            <div style="display:flex; justify-content: left;">
                <label for="email">Email:</label>
            </div>
            <div style="display:flex; justify-content: right;">
                <input type="text" id="email" name="email"><br><br>
            </div>

            <div style="display:flex; justify-content: left; margin-top: 12px;">
                <label for="password">Password:</label>
            </div>
            <div style="display:flex; justify-content: right;">
                <input type="password" id="password" name="password"><br><br>
            </div>

            <div style="display: flex; justify-content: center;">
                <input style="border-radius: 180px; border: 0px; padding: 4px 8px 4px 8px; cursor: pointer; margin-top: 30px" type="submit" value="Accedi">
            </div>

        </form>
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