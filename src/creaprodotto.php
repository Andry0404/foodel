<html>
    <head></head>
    <body>
        <?php
            $nome = $_GET['nome'];
            $ingredienti = $_GET['ingredienti'];
            $prezzo = $_GET['prezzo'];
            $allergeni = $_GET['allergeni'];
            

            $campi_validi = true;

            if ($nome == "") {
                $campi_validi = false;
            }
            if ( $ingredienti == "") {
                $campi_validi = false;
            }
            if ($prezzo == "") {
                $campi_validi = false;
            }
            if ($allergeni  == "") {
                $campi_validi = false;
            }
        
            if ($campi_validi) {
                $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die("ERROR: connection error with foodelDB. " . mysqli_connect_error());

            $connection = mysqli_connect("localhost", "root", "", "foodelDB") or die ("ERROR: connection error with foodelDB. ".mysqli_connect_error());

            $query= "insert into Prodotto(nome,ingredienti,prezzo,allergeni) values($nome,$ingredienti, $prezzo,$allergeni);";

            $myquery = mysqli_query($connection, $query);

            if ($myquery) {
                print("<h1>Prodotto trovato</h1>");
            } else {
                print("<h1>Prodotto non trovato!</h1>");
            }
    
            mysqli_close($connection);
        } else {
            print("<h1>Non sono ammessi campi vuoti.</h1>");
        }
?>
</body>
</html>