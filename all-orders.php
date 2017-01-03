<?php


// Include bliver brugt til at loade database connection filen.

	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';

	include 'order-header.php';

?>

		<H1>Ordrer</H1>
		<p>Her kan du se alle ordrer:</p>
		<br>
			<div>
<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.
	if (isset($_SESSION['id'])) {

		include 'dbcon.php';

			$uid = $_SESSION['id'];
			$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
			$result = mysqli_query($conn, $sql);

			if ($row = $result->fetch_assoc()) {

				// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.
				$conn = mysqli_connect($servername, $username, $password, $table);
				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM ordrer";
				$result = mysqli_query($conn, $sql);

				echo "<a href='opret-order.php' class='create-button'>Opret ny ordre</a><br><br>";

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

							<form class='edit-form' method='POST' action='rediger-order.php'>
								<input type='hidden' name='Oid' value='".$row['idOrdrer']."'>
								<input type='hidden' name='Kid' value='".$row['profiler_idprofiler']."'>
								<input type='hidden' name='OPic1' value='".$row['Ordrer_Billede1']."'>
								<input type='hidden' name='OPic2' value='".$row['Ordrer_Billede2']."'>
								<input type='hidden' name='OPic3' value='".$row['Ordrer_Billede3']."'>
								<input type='hidden' name='OPic4' value='".$row['Ordrer_Billede4']."'>
								<input type='hidden' name='OPic5' value='".$row['Ordrer_Billede5']."'>
								<input type='hidden' name='OStart' value='".$row['Ordrer_Startdato']."'>
								<input type='hidden' name='OSlut' value='".$row['Ordrer_Slutdato']."'>
								<input type='hidden' name='OPris' value='".$row['Ordrer_SamletPris']."'>
								<input type='hidden' name='OStatus' value='".$row['Ordrer_Status']."'>
								<button>Rediger</button>

							</form>

							
							<form class='delete-form' method='POST' action='slet-order.php'>

								<input type='hidden' name='Oid_1' value='".$row['idOrdrer']."'>

								<button>Slet</button>

							</form>

							</div>

							<br><br>";

					}

			} 

			else {
				header("Location: index.php?error=admin");
			}
	}	

?>



			</div>




<footer>Copyright Anne Toxværd</footer>
</body>

</html>