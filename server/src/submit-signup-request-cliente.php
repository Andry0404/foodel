<html>

<head></head>

<body>
    <?php

    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $indirizzo = $_GET['indirizzo'];
    $data_di_nascita = $_GET['data_di_nascita'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    $campi_validi = true;

    if ($nome == "") {
        $campi_validi = false;
    }
    if ($cognome == "") {
        $campi_validi = false;
    }
    if ($indirizzo == "") {
        $campi_validi = false;
    }
    if ($data_di_nascita == "") {
        $campi_validi = false;
    }
    if ($email == "") {
        $campi_validi = false;
    }
    if ($password == "") {
        $campi_validi = false;
    }

    if ($campi_validi) {
        // hashing della password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die("ERROR: connection error with foodelDB. " . mysqli_connect_error());

        $query = "INSERT INTO Cliente(cognome, nome, indirizzo, email, data_nascita, hashed_password) ";
        $query = $query . "VALUES('$cognome', '$nome', '$indirizzo', '$email', '$data_di_nascita', '$password');";

        $myquery = mysqli_query($connection, $query);

        if ($myquery) {
            // redirect: manda ad un'altra pagina
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/registrazione-success.html");
            die();
        } else {
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/registrazione-failed.html");
            die();
        }
    } else {
        header("Location: http://localhost/foodel/client/src/registrazione-failed.html");
        die();
    }

    ?>
</body>

</html>