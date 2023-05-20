<?php

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
} else {
    $type = "vuoto";
}

if($type !== "proprietario") {
    header("Location: http://localhost/foodel/client/src/index.php");
} else {
    $id_ristorante = $_SESSION["id_ristorante"];
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
        <div class="maintitle" style="width: fit-content;">
            <a class="not-decorated" href="./index.php">
                <div class="material-symbols-outlined" style="font-size: 38px;">
                    ramen_dining
                </div>
                <b>foodel</b>
            </a>
        </div>
        <div style='font-size:14px; width: 100%;'>Tu pensi al <b><i>food</i></b>, noi pensiamo al <b><i>delivery</i></b>.</div>
        <?php if (isset($_SESSION["userID"])) {
            print("<div style='margin-top: 15px; background-color: white; width: fit-content; border-radius: 60px; padding: 7px 14px 7px 14px'>");

            if ($nome != "") {
                echo ("Utente loggato: " . $nome);
                echo (" - " . $type);
            }

            print("</div>");
        }
        ?>

        <ul class="menu">
            <li>
                <div>
                    <h1 style="color: white;">Menu</h1>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    FAQ
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="./login.php">Login</a>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="./signup-cliente.php">Sign up Cliente</a>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="./signup-proprietario.php">Sign up Proprietario</a>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="./crearistorante.php">Crea ristorante</a>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="./creaprodotto.php">Crea prodotto</a>
                </div>
            </li>
            <li>
                <div class="button menuItem">
                    <a class="not-decorated" href="../../server/src/logout.php">Logout</a>
                </div>
            </li>
        </ul>

        <button class="hamburger">
            <!-- material icons https://material.io/resources/icons/ -->
            <i class="menuIcon material-icons">menu</i>
            <i class="closeIcon material-icons">close</i>
        </button>

        <script>
            const menu = document.querySelector(".menu");
            const menuItems = document.querySelectorAll(".menuItem");
            const hamburger = document.querySelector(".hamburger");
            const closeIcon = document.querySelector(".closeIcon");
            const menuIcon = document.querySelector(".menuIcon");

            closeIcon.style.display = 'none';

            function toggleMenu() {
                if (menu.classList.contains("showMenu")) {
                    menu.classList.remove("showMenu");
                    closeIcon.style.display = "none";
                    menuIcon.style.display = "block";
                } else {
                    menu.classList.add("showMenu");
                    closeIcon.style.display = "block";
                    menuIcon.style.display = "none";
                }
            }

            menuItems.forEach(
                function(menuItem) {
                    menuItem.addEventListener("click", toggleMenu);
                }
            )

            hamburger.addEventListener("click", toggleMenu);
        </script>
    </div>

    <h1 style="display: flex; justify-content:left; margin-left: 150px; font-weight: 1000;"><b>Dashboard</b></h1>
    <div class='mainpage-info'>
        <div class='proprietario-item-info'>
            <p style='font-size:24px'><b>Informazioni ristorante</b></p>
            <p>
                Da questa pagina potrai vedere tutte le informazioni riguardanti il tuo ristorante.
            </p>
            <div onclick="location.href='mostraristoranti.php'" class='subscribe-button'>Scopri di più</div>
        </div>
        <div class='proprietario-item-add'>
            <p style='font-size:24px'><b>Aggiungi un nuovo piatto</b></p>
            <p>
                Registra un nuovo piatto da aggiungere al tuo menu.
            </p>
            <div onclick="location.href='creaprodotto.php'" class='subscribe-button'>Crea piatto</div>
        </div>
    </div>
    <div class='mainpage-info'>
        <div class='proprietario-item-orders'>
            <p style='font-size:24px'><b>Visualizza ordini</b></p>
            <p>
                Visualizza tutti gli ordini attivi.
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Vedi ordini</div>
        </div>
        <div class='proprietario-item-review'>
            <p style='font-size:24px'><b>Visualizza recensioni</b></p>
            <p>
                In questa pagina sono raccolte tutte le recensioni ricevute.
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Vedi recensioni</div>
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