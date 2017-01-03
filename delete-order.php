<?php

session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.
	include 'dbcon.php';

//Her bliver header.php, som er vores menu, inkluderet på siden
	include 'header.php';

?>



<div class="delete-box">

	<?php

	// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
		if (isset($_SESSION['id'])) {

			// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.
			$conn = mysqli_connect($servername, $username, $password, $table);
			$Oid_1 = $_POST['Oid_1'];
			$sql = "SELECT * FROM ordrer WHERE idOrdrer='$Oid_1'";
			$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'><p>Ordre id:" . " " . $row['idOrdrer'] . "</p>
					<p>Ordre Oprettelsesdato:" . " " . $row['Ordrer_Oprettelsesdato'] . "</p>
					<p>Ordre Kundenummer:" . " " . $row['profiler_idprofiler'] . "</p>
					<p>Ordre Billede 1:" . " " . $row['Ordrer_Billede1'] . "</p>
					<p>Ordre Billede 2:" . " " . $row['Ordrer_Billede2'] . "</p>
					<p>Ordre Billede 3:" . " " . $row['Ordrer_Billede3'] . "</p>
					<p>Ordre Billede 4:" . " " . $row['Ordrer_Billede4'] . "</p>
					<p>Ordre Billede 5:" . " " . $row['Ordrer_Billede5'] . "</p>
					<p>Ordre Startdato:" . " " . $row['Ordrer_Startdato'] . "</p>
					<p>Ordre Slutdato:" . " " . $row['Ordrer_Slutdato'] . "</p>
					<p>Ordre Samlet Pris:" . " " . $row['Ordrer_SamletPris'] . "</p>

					<br><br>

					<p>Er du sikker på at du vil slette denne ordre?</p>

					<form class ='register' action='includes/delete-order.inc.php' method='POST'>

					<input type='hidden' name='Oid_1' value='".$_POST['Oid_1']."'>

					<button>Ja, Slet ordren</button>

					</form>

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