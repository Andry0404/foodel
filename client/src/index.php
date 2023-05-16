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

    <h1 style="display: flex; justify-content:center; font-weight: 1000;"><b>Un posto a tavola, per tutti.</b></h1>
    <div class='mainpage-info'>
        <div class='mainpage-item-left'>
            <p style='font-size:24px'><b>Per i ristoranti</b></p>
            <p>
                Promuovi la tua cucina, il tuo ristorante, il tuo stile.
            </p>
            <p>
                Iscriviti gratuitamente, registra il tuo ristorante ed aggiungi i tuoi piatti: <br /> i clienti non vedono l'ora di scoprire ristoranti nuovi ed il prossimo potresti essere tu!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Iscriviti e registra il tuo ristorante!</div>
        </div>
        <div class='mainpage-item-right'>
            <p style='font-size:24px'><b>Per i clienti</b></p>
            <p>Da solo o in compagnia, preparati a gustare sapori unici!</p>
            <p>
                Da ogni quartiere della tua città, ristoranti, locali, gelaterie e tante altre attività <br />
                sono pronti ad offrirti bontà e piatti dal sapore indimenticabile!
            </p>
            <div onclick="location.href='signup-cliente.php'" class='subscribe-button'>Registrati ed inizia ad ordinare!</div>
        </div>
    </div>

    <div class="banner-image">
        <img class="image" style="max-width: 50%;" src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="banner" />
        <div style="max-width: 50%;">
            <p style="margin-top: 45px; margin-left: 30px; margin-bottom: 0px;"><b>Sezione</b></p>
            <br></br>
            <p style="margin-top: 0px;margin-left: 30px; text-align: justify;text-justify: inter-word; max-width: 50%;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc rutrum, velit eu malesuada scelerisque, nisl purus commodo purus, quis laoreet erat turpis auctor risus. Nulla tempor ultrices dui ac feugiat. Maecenas cursus nisl vel massa dignissim convallis quis ac ligula. Nam porttitor tincidunt lorem, elementum auctor justo. Morbi iaculis consectetur rhoncus. Etiam venenatis accumsan nibh ut gravida. Etiam a mauris varius, faucibus enim a, dapibus magna. In efficitur tristique tellus, sed dapibus dui. Praesent sollicitudin sodales lectus, sit amet dictum sem semper vel. Ut ligula erat, pretium quis nulla in, sodales laoreet nunc. Mauris at scelerisque mi.
                Donec quis ante sit amet nulla tempor tempus. Suspendisse potenti. Sed nec est commodo diam viverra suscipit in nec felis. Suspendisse ornare aliquet justo, sed semper nisi ultricies sed. Sed ut mauris elementum, faucibus diam et, aliquet erat. Praesent orci nisl, bibendum eu erat ut, facilisis cursus metus. Vivamus in rhoncus quam. Morbi quis ultricies nisi.
            </p>
        </div>
    </div>

    <footer><small>
            <div class="material-symbols-outlined" style="font-size: 12px;">
                ramen_dining
            </div>
            <b>Foodel - Copyright © 2023 Andrea De Giorgi. All Rights Reserved.</b>
            <p>User: <?php
                        session_start();
                        if (isset($_SESSION['user_id'])) {
                            print('ok');
                        } else {
                            print('no');
                        }
                        ?>
            </p>
        </small>
    </footer>
</body>

</html>