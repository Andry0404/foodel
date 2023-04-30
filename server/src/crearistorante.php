<html>
    <head></head>
    <body>
        <?php
            $nome = $_GET['nome'];
            $indirizzo = $_GET['indirizzo'];
            $num_telefono = $_GET['num_telefono'];
            $orario_apertura = $_GET['orario_apertura'];
            $orario_chiusura = $_GET['orario_chiusura'];

            $campi_validi = true;

            if ($nome == "") {
                $campi_validi = false;
            }
            if ( $indirizzo == "") {
                $campi_validi = false;
            }
            if ($num_telefono == "") {
                $campi_validi = false;
            }
            if ($orario_apertura  == "") {
                $campi_validi = false;
            }
            if ($orario_chiusura == "") {
                $campi_validi = false;
            }

            if ($campi_validi) {
                $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die("ERROR: connection error with foodelDB. " . mysqli_connect_error());

            $query= "insert into Ristorante(nome,orario_apertura,orario_chiusura,indirizzo,num_telefono) values('$nome','$orario_apertura', '$orario_chiusura','$indirizzo','$num_telefono');";
            
            $myquery = mysqli_query($connection, $query);

            if ($myquery) {
                print("<h1>Inserzione eseguita!</h1>");
            } else {
                print("<h1>Inserzione non eseguita!</h1>");
            }
    
            mysqli_close($connection);
        } else {
            print("<h1>Non sono ammessi campi vuoti.</h1>");
        }
?>
</body>
</html>