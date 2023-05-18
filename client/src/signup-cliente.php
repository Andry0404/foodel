<?php

session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
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

    <div class="signup-wrapper">
        <div class="signup">
            <form name="signup-form" action="../../server/src/submit-signup-request-cliente.php" method="get">
                <h2 class="text-centered">Registrazione nuovo cliente</h2>
                <table>
                    <tr>
                        <td><label for="nome">Nome:</label></td>
                        <td><input type="text" id="nome" name="nome"><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="cognome">Cognome:</label></td>
                        <td><input type="text" id="cognome" name="cognome"><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="eta">Indirizzo:</label></td>
                        <td><input type="text" id="indirizzo" name="indirizzo"><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="eta">Data di nascita:</label></td>
                        <td><input type="date" id="data_di_nascita" name="data_di_nascita"><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password"><br><br></td>
                    </tr>
                </table>

                <div style="display: flex; justify-content: center;">
                    <input style="border-radius: 180px; border: 0px; padding: 4px 8px 4px 8px; cursor: pointer;" type="submit" value="Registrati">
                </div>
            </form>
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