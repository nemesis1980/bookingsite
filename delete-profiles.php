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

			include 'dbcon.php';

			$uid = $_SESSION['id'];
			$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
			$result = mysqli_query($conn, $sql);

			if ($row = $result->fetch_assoc()) {

				// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.

				$conn = mysqli_connect($servername, $username, $password, $table);
				$Pid_1 = $_POST['Pid_1'];
				
				$sql = "SELECT * FROM profiler WHERE idprofiler='$Pid_1'";
				$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "<div class='project-box'>

						<p>Profil id:" . " " . $row['idprofiler'] . "</p>
						<p>Fornavn:" . " " . $row['Fornavn'] . "</p>
						<p>Efternavn:" . " " . $row['Efternavn'] . "</p>
						<p>Adresse:" . " " . $row['Adresse'] . "</p>
						<p>Postnummer:" . " " . $row['postnummer_Postnummer'] . "</p>
						<p>Firma:" . " " . $row['Firma'] . "</p>
						<p>Email:" . " " . $row['Email'] . "</p>
						<p>Telefon:" . " " . $row['Telefon'] . "</p>
						<p>Brugernavn:" . " " . $row['Brugernavn'] . "</p>
						<p>Access Level:" . " " . $row['level'] . "</p>
						<br><br>
						<p>Er du sikker på at du vil slette denne ordre?</p>

						<form class ='register' action='includes/delete-profiles.inc.php' method='POST'>
						<input type='hidden' name='Pid_1' value='".$_POST['Pid_1']."'>
						<button>Ja, Slet Profilen</button>
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





</body>

</html>