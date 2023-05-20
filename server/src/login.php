<?php

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "foodelDB";

    $email = $_POST["email"];

    $connection = mysqli_connect($host, $user, $password, $db_name);
    if (mysqli_connect_errno()) {
        die("Errore nella connessione al db: " . mysqli_connect_error());
    }

    $head_query_cliente = "SELECT * FROM Cliente WHERE email='";
    $head_query_proprietario = "SELECT * FROM Proprietario WHERE email='";

    $query = $email;
    $query = $query . "';";

    $query_cliente = $head_query_cliente . $query;
    $query_proprietario = $head_query_proprietario . $query;

    $result = mysqli_query($connection, $query_cliente);

    if (mysqli_num_rows($result) == 0) {
        $result = mysqli_query($connection, $query_proprietario);
        if (mysqli_num_rows($result) == 0) {
            $type = "error";
        } else {
            $type = "proprietario";
        }
    } else {
        $type = "cliente";
    }

    if ($type !== "error") {
        $user = mysqli_fetch_array($result);

        if (password_verify($_POST["password"], $user["hashed_password"])) {
            session_start();
            if ($type === "cliente") {
                $_SESSION["userID"] = $user["id_cliente"];
            } else {
                $_SESSION["userID"] = $user["id_proprietario"];
                $getRistoranteIDQuery = "SELECT * FROM Possiede WHERE id_proprietario=" . $user["id_proprietario"] . " LIMIT 1;";
                $ristoranteIDResult = mysqli_query($connection, $getRistoranteIDQuery);
                if (mysqli_num_rows($ristoranteIDResult) === 0) {
                    session_destroy();
                    mysqli_close($connection);
                    header("Location: http://localhost/foodel/client/src/risultato-non-disponibile.php?error=66");
                    die();
                }
                $ristoranteID = mysqli_fetch_array($ristoranteIDResult)["id_ristorante"];
                $_SESSION['ristid'] = $ristoranteID;
            }
            $_SESSION["email"] = $user["email"];
            $_SESSION["nome"] = $user["nome"];
            $_SESSION["type"] = $type;
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/index.php");
        } else {
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/risultato-non-disponibile.php?error=77");
        }
    } else {
        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/risultato-non-disponibile.php?error=88");
    }
}
