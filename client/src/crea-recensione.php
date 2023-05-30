<?php
session_start();

$id_ristorante = $_GET["ristid"];

if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {
    $nome = $_SESSION["nome"];
    $type = $_SESSION["type"];
    if ($type !== "cliente") {
        header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=1");
    }
} else {
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=2");
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
                <div style='font-size:14px; width: 100%;'>Tu pensi al <b><i>food</i></b>, noi pensiamo al
                    <b><i>delivery</i></b>.
                </div>
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

    <div class="signup-wrapper">
        <div class="signup">
            <form name="signup-form" action="../../server/src/crearecensione.php" method="get">
                <h2 class="text-centered">Lascia una recensione</h2>
                <table>
                    <tr>
                        <td><label>Come valuti il ristorante da 1 a 5? (Campo obbligatorio)</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="recensione_stelle" name="recensione_stelle" value="1">
                            <label for="1">1</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="recensione_stelle" name="recensione_stelle" value="2">
                            <label for="2">2</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="recensione_stelle" name="recensione_stelle" value="3">
                            <label for="3">3</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="recensione_stelle" name="recensione_stelle" value="4">
                            <label for="4">4</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="recensione_stelle" name="recensione_stelle" value="5">
                            <label for="5">5</label>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="nome">Lascia qui un commento:</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" id="recensione_testo" name="recensione_testo" style="width: 100%"><br><br></td>
                    </tr>
                    <tr hidden>
                        <td hidden>
                            <input hidden id="id_ristorante" name="id_ristorante" value=<?php print $id_ristorante ?>>
                        </td>
                    </tr>
                </table>

                <div style="display: flex; justify-content: center;">
                    <input style="border-radius: 180px; border: 0px; padding: 4px 8px 4px 8px; cursor: pointer;" type="submit" value="Crea la tua recensione">
                </div>

                <div style="display: flex; justify-content: center;">
                    <p><?php echo $outmsg ?></p>
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