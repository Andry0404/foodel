<?php
session_start();

$nome = $_GET['nome'];
$ingredienti = $_GET['ingredienti'];
$prezzo = $_GET['prezzo'];
$allergeni = $_GET['allergeni'];
$categoria = $_GET["categoria"];

$id_ristorante = $_SESSION["ristid"];

$campi_validi = true;

if ($nome === "") {
    $campi_validi = false;
}
if ($ingredienti === "") {
    $campi_validi = false;
}
if ($prezzo === "") {
    $campi_validi = false;
}
if ($allergeni  === "") {
    $campi_validi = false;
}

if ($campi_validi) {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'foodelDB');
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    $query1 = "INSERT INTO Prodotto(nome,ingredienti,prezzo,allergeni, categoria) VALUES('$nome','$ingredienti',$prezzo,'$allergeni','$categoria');";
    $result1 = mysqli_query($connection, $query1);
    $id_prodotto = mysqli_insert_id($connection);

    if ($result1) {
        $query2 = "INSERT INTO Vende(id_ristorante, id_prodotto) VALUES('$id_ristorante','$id_prodotto');";
        $result2 = mysqli_query($connection, $query2);

        if ($result2) {
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/creaprodotto.php?result=1");
        } else {
            mysqli_close($connection);
            header("Location: http://localhost/foodel/client/src/creaprodotto.php?result=$query2");
        }
    } else {
        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/creaprodotto.php?result=2");
    }
} else {
    mysqli_close($connection);
    header("Location: http://localhost/foodel/client/src/creaprodotto.php?result=0");
}
