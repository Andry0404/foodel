<?php
$nome = $_GET["nome"];
$indirizzo = $_GET["indirizzo"];
$num_telefono = $_GET["num_telefono"];
$orario_apertura = $_GET["orario_apertura"];
$orario_chiusura = $_GET["orario_chiusura"];
$campi_validi = true;
$id_proprietario = $_GET["lastIndex"];

if ($nome === "") {
    $campi_validi = false;
}
if ($indirizzo === "") {
    $campi_validi = false;
}
if ($num_telefono === "") {
    $campi_validi = false;
}
if ($orario_apertura === "") {
    $campi_validi = false;
}
if ($orario_chiusura === "") {
    $campi_validi = false;
}

if ($campi_validi) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'foodelDB');
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    $query = "INSERT INTO Ristorante(nome,orario_apertura,orario_chiusura,indirizzo,num_telefono) VALUES('$nome','$orario_apertura', '$orario_chiusura','$indirizzo','$num_telefono');";

    $myquery = mysqli_query($connection, $query);

    if ($myquery) {
        $id_ristorante = mysqli_insert_id($connection);

        $bindProprietarioRistorante = "INSERT INTO Possiede(id_ristorante, id_proprietario) VALUES($id_ristorante, $id_proprietario);";
        $bindResult = mysqli_query($connection, $bindProprietarioRistorante);

        if ($bindResult) {
            header("Location: http://localhost/foodel/client/src/registrazione-success.php");
        } else {
            header("Location: http://localhost/foodel/client/src/registrazione-failed.php?error=$bindProprietarioRistorante");
        }
    } else {
        header("Location: http://localhost/foodel/client/src/registrazione-failed.php?error=1");
    }

    mysqli_close($connection);
} else {
    header("Location: http://localhost/foodel/client/src/registrazione-failed.php?error=2");
}
