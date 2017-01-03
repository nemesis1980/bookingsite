<?php

// Include bliver brugt til at loade database connection filen.
	include 'dbcon.php';

//Her bliver header.php, som er vores menu, inkluderet på siden
	include 'header.php';
	include 'order-header.php';

?>

		<H1 class="indhold_overskrift">Ordrer</H1>
		<p class="indhold_text">Her kan du se dine betalte ordrer:</p>
		<br>
			<div class="projekt-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
	if (isset($_SESSION['id'])) {

		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.

		$conn = mysqli_connect($servername, $username, $password, $table);
		$uid = $_SESSION['id'];
		$sql = "SELECT * FROM ordrer WHERE profiler_idprofiler='$uid' AND Ordrer_Status='Betalt'";
		$result = mysqli_query($conn, $sql);

		echo "<a href='create-order.php' class='create-button'>Opret ny ordre</a><br><br>";

			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'>

					<p>Ordre id:" . " " . $row['idOrdrer'] . "</p>
					<p>Ordre Kunde:" . " " . $row['profiler_idprofiler'] . "</p>
					<p>Ordre Oprettelsesdato:" . " " . $row['Ordrer_Oprettelsesdato'] . "</p>
					<p>Ordre Startdato:" . " " . $row['Ordrer_Startdato'] . "</p>
					<p>Ordre Slutdato:" . " " . $row['Ordrer_Slutdato'] . "</p>
					<p>Ordre Billede 1:" . " " . $row['Ordrer_Billede1'] . "</p>
					<p>Ordre Billede 2:" . " " . $row['Ordrer_Billede2'] . "</p>
					<p>Ordre Billede 3:" . " " . $row['Ordrer_Billede3'] . "</p>
					<p>Ordre Billede 4:" . " " . $row['Ordrer_Billede4'] . "</p>
					<p>Ordre Billede 5:" . " " . $row['Ordrer_Billede5'] . "</p>
					<p>Ordre Samlet Pris:" . " " . $row['Ordrer_SamletPris'] . "</p>
					<p>Ordre Status:" . " " . $row['Ordrer_Status'] . "</p>

					</div>

					<br><br>";

			}

	} 

	else {

		echo "Du skal være logget ind for at kunne oprette eller ændre i projekter.";

	}

?>

			</div>

</body>

</html>