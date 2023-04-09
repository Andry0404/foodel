<html>
    <head></head>
    <body>
        <?php
            $email = $_GET['email'];
            $password = $_GET['password'];

            $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die ("ERROR: connection error with foodelDB. ".mysqli_connect_error());

            $query = "SELECT * FROM Cliente WHERE email='$email' AND hashed_password='$password';";

            $result = mysqli_query($connection, $query);
            $numero_righe = mysqli_num_rows($result);
            $columns = mysqli_num_fields($result);

            if($n == 0) {
                print("<h4>Cliente non trovato.</h4>");
            } else if($n > 1) {
                print("<h4>ERROR: due clienti con stessa email e stessa password.</h4>");
            } else {
                $numero_colonne = mysqli_field_count($connection);
                print("<table border>\n");
                print("<caption>Dati utente loggato</caption>\n");                
                print("<tr>\n");
                for($colonna = 0; $colonna < $numero_colonne; $colonna++) {
                    print("<th>".mysqli_fetch_field($result)."</th>");   
                }
                print("</tr>\n");

                print("<tr>\n");
                for($riga = 0; $riga < $numero_righe; $riga++) {
                    print("<td>".mysqli_fetch_array($result)."</td>");   
                }
                print("</tr>\n");

                print("</table>\n");
            }

            // for field fetching: mysqli_fetch_fields($result)
            // for data fetching: mysqli_fetch_array($result)

            mysqli_close($connection);
        ?>
    </body>
</html>