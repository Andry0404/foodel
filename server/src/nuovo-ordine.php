<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'foodelDB');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$continue = true;

$id_cliente = $_POST["id_cliente"];
$id_ristorante = $_POST["id_ristorante"];
$data_ordine = date("Y-m-d h:i:sa");
$ids_prodotti = array();

$queryGetIdProdottiPerIdRistorante = "SELECT * FROM Vende WHERE id_ristorante=$id_ristorante;";
$queryGetIdProdottiPerIdRistorante_result = mysqli_query($connection, $queryGetIdProdottiPerIdRistorante);
$ids_n = mysqli_num_rows($queryGetIdProdottiPerIdRistorante_result);

for ($i = 0; $i < $ids_n; $i++) {
    $prodotto = mysqli_fetch_array($queryGetIdProdottiPerIdRistorante_result);
    array_push($ids_prodotti, $prodotto["id_prodotto"]);
}

$quantitaPerIDProdotto = [];

for ($i = 0; $i < $ids_n; $i++) {
    $quantitaPerIDProdotto[$ids_prodotti[$i]] = $_POST[$ids_prodotti[$i]];
}

foreach ($quantitaPerIDProdotto as $id_prodotto => $quantita) {
    if (!is_numeric($quantita)) {
        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=502");
    }
}

foreach ($quantitaPerIDProdotto as $id_prodotto => $quantita) {
    if ($quantita > 0) {
        $query = "INSERT INTO Ordina_da(quantita, data_ordine, id_ristorante, id_cliente, id_prodotto) VALUES (" . $quantita . ",'$data_ordine',$id_ristorante,$id_cliente,$id_prodotto);";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            mysqli_close($connection);
            $continue = false;
        }
        if (!$continue) {
            break;
        }
    }
}


if ($continue) {
    mysqli_close($connection);
    header("Location: http://localhost/foodel/client/src/pagamento.php");
} else {
    mysqli_close($connection);
    header("Location: http://localhost/foodel/client/src/risultato_non_disponibile.php?error=501");
}
