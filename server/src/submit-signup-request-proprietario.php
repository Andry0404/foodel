<?php

$nome = $_GET['nome'];
$cognome = $_GET['cognome'];
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
if ($data_di_nascita == "") {
    $campi_validi = false;
}
if ($email == "") {
    $campi_validi = false;
}
if ($password == "") {
    $campi_validi = false;
}

if ($campi_validi) { // hashing della password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die("ERROR: connection error with foodelDB. " . mysqli_connect_error());

    $query = "INSERT INTO Proprietario(nome, cognome, email, data_nascita, hashed_password) ";
    $query = $query . "VALUES('$nome', '$cognome', '$email', '$data_di_nascita', '$password');";

    $myquery = mysqli_query($connection, $query);

    if ($myquery) {
        $id_proprietario = mysqli_insert_id($connection);

        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/registraristorante.php?lastIndex=$id_proprietario");
        die();
    } else {
        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/registrazione-failed.php");
        die();
    }
} else {
    header("Location: http://localhost/foodel/client/src/registrazione-failed.php");
    die();
}
