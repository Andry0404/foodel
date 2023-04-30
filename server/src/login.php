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

    $query = "SELECT * FROM Cliente WHERE email='";
    $query = $query . $email;
    $query = $query . "';";
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_array($result);
    print("<p>" . $user["email"] . "</p>");
    print("<p>" . $user["hashed_password"] . "</p>");
    print("<p>" . $_POST["password"] . "</p>");
    print("<p>" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "</p>");
    

    if (password_verify($_POST["password"], $user["hashed_password"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id_cliente"];
        mysqli_close($connection);
        header("Location: http://localhost/foodel/client/src/index.php");
        die();
    }
}
