<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $id_ristorante = $_GET["id_ristorante"];

    $query = "SELECT * FROM Ristorante WHERE id_ristorante=$id_ristorante;";

    $result = mysqli_query($connection, $query);

    $n = mysqli_num_rows($result);

    if ($n === 0) {
        $result_type = 0;
        $ristorante = null;
    } else {
        $result_type = 1;
        $ristorante = mysqli_fetch_array($result);
    }
}
