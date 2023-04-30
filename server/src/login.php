<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {   
    debug_to_console("1");
    $mysqli = require "./connection.php";
    debug_to_console("2");

    $sql = "SELECT * FROM user WHERE email=" . $_POST["email"];
    debug_to_console("3");

    $result = mysqli_query($mysqli, $sql);   
    debug_to_console("4");

    // $user = mysqli_fetch_row($result);
    // debug_to_console("5");


    if ($result) {
        debug_to_console("6");

        if (password_verify($_POST["password"], $user["password_hash"])) {
            debug_to_console("7");

            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: http://localhost/foodel/client/src/index.php");
            die();
        }
    }
    session_start();
    session_regenerate_id();
    $_SESSION["user_id"] = 1;

    header("Location: http://localhost/foodel/client/src/index.php");
    die();
    $is_invalid = true;
}

?>