<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="navbar">
        <div class="maintitle">
            <a class="not-decorated" href="./index.php">Foodel</a>
        </div>
        <p>User: <?php
            session_start();
            if(isset($_SESSION['user_id'])) {
                print('ok');
            } else {
                print('no');
            }
        ?>
        </p>
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
                    <a class="not-decorated" href="../../server/src/logout.php">logout</a>
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
                function (menuItem) {
                    menuItem.addEventListener("click", toggleMenu);
                }
            )

            hamburger.addEventListener("click", toggleMenu);
        </script>
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

    <div class="footer">
        FOODEL - Andrea De Giorgi - 2023
    </div>



    
</body>
</html>