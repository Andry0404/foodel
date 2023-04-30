<html>

<head></head>

<body>
	<?php

	$p = "Prodotto";

	$con = mysqli_connect("localhost", "root", "", "foodelDB") or die("Errore nella connessione al server mysql: " . mysqli_connect_error());

	$q = "select * from Prodotto";

	$rs = mysqli_query($con, $q) or die("Errore nell'esecuzione della query $q: " . mysqli_error($con));

	$n = mysqli_num_rows($rs);

	if ($n == 0) {
		print("La tabella e' vuota<br>\n");
	} else {
		//numero di campi della tabella
		$col = mysqli_num_fields($rs);

		print("<table border>\n");

		print("<caption>Elenco dati della tabella $p</caption>\n");

		print("<tr>\n");

		//ciclo per stampare i nomi dei campi
		for ($j = 0; $j < $col; $j++) {
			print("<th>" . mysqli_fetch_field($rs)->name . "</th>\n");
		}
		print("</tr>\n");

		//ciclo che stampa la tabella
		for ($i = 0; $i < $n; $i++) {
			$a = mysqli_fetch_array($rs);

			print("<tr>\n");

			for ($j = 0; $j < $col; $j++) {
				print("<td>" . $a[$j] . "</td>");
			}
			print("</tr>\n");
		}
		print("</table>\n");
	}

	mysqli_close($con);

	?>
</body>

</html>