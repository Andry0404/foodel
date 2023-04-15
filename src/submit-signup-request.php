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
        $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die("ERROR: connection error with foodelDB. " . mysqli_connect_error());

        $query = "INSERT INTO Cliente(cognome, nome, indirizzo, email, data_nascita, hashed_password) ";
        $query = $query . "VALUES('$cognome', '$nome', '$indirizzo', '$email', '$data_di_nascita', '$password');";

        $myquery = mysqli_query($connection, $query);

        if ($myquery) {
            print("<h1>Inserzione eseguita!</h1>");
        } else {
            print("<h1>Inserzione non eseguita!</h1>");
        }

        mysqli_close($connection);
    } else {
        print("<h1>Non sono ammessi campi vuoti.</h1>")
    }

    ?>
</body>

</html>