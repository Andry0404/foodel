<?php
session_start();

$recensione_stelle = $_GET['recensione_stelle'];
$recensione_testo = $_GET['recensione_testo'];
$id_ristorante = $_GET['id_ristorante'];
$data_recensione = date("Y-m-d h:i:sa");

if ($recensione_stelle === "") {
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?result=800");
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$queryCreaRecensione = "INSERT INTO Recensione(valutazione_stelle, valutazione_recensione, id_ristorante, data_recensione) VALUES ($recensione_stelle, '$recensione_testo', $id_ristorante, '$data_recensione');";
$queryCreaRecensioneResult = mysqli_query($connection, $queryCreaRecensione);
$id_prodotto = mysqli_insert_id($connection);

if ($queryCreaRecensioneResult) {
    mysqli_close($connection);
    header("Location: http://localhost/foodel/client/src/index-cliente.php");
} else {
    mysqli_close($connection);
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=601");
}
