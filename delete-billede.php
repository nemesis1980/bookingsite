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
				$Bid_1 = $_POST['Bid_1'];
				$BPic_1 = $_POST['BPic_1'];

				$sql = "SELECT * FROM images WHERE id_billed='$Bid_1'";

				$result = mysqli_query($conn, $sql);



				while ($row = $result->fetch_assoc()) {

					echo "<div class='project-box'>

						<img src='upload/" . $row['billed'] . "'>

						<p>Billede id:" . " " . $row['id_billed'] . "</p>

						<p>Billed Navn:" . " " . $row['name'] . "</p>

						<p>Billede Længde:" . " " . $row['laengde'] . "</p>

						<p>Billede Højde:" . " " . $row['hojde'] . "</p>

						<p>Billede Pris:" . " " . $row['pris'] . "</p>

						<br><br>

						<p>Er du sikker på at du vil slette dette billede?</p>

						<form class ='register' action='includes/delete-billede.inc.php' method='POST'>

						<input type='hidden' name='Bid_1' value='".$_POST['Bid_1']."'>

						<input type='hidden' name='BPic_1' value='".$_POST['BPic_1']."'>

						<button>Ja, Slet billedet</button>

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