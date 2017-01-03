<?php

// Include bliver brugt til at loade database connection filen og inkludere vores menu på siden.

	include 'dbcon.php';
	include 'header.php';

?>

<?php

// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=empty') !==false) {

		echo "Udfyld alle felter <br><br><br>";

	}
	
// Her tjekkes der om man er logget ind i systemet

	if (isset($_SESSION['id'])) {

	} else {

		echo "Du er ikke logget ind";

	}

?>

<?php

// Her tjekkes først om man er logget ind og ellers kommer projekt oprettelses formen frem, så man kan oprette et projekt.

	if (isset($_SESSION['id'])) {

		include 'dbcon.php';

		$uid = $_SESSION['id'];
		$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
		$result = mysqli_query($conn, $sql);

		if ($row = $result->fetch_assoc()) {

//			echo $_POST['Bid'];

			$Bid = (isset($_POST['Bid']) ? $_POST['Bid'] : null);
			$conn = mysqli_connect($servername, $username, $password, $table);

			$sql = "SELECT * FROM images WHERE id_billed='$Bid'";
			$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {

				echo "<img src='upload/" . $row['billed'] . "'>";

			}

			echo "<form class ='register' action='includes/edit-billede.inc.php' method='POST'>

				<input type='hidden' name='Bid' value='".$_POST['Bid']."'>

				Navn: <input type='text' name='iName' value=".$_POST['iName']." required><br>

				Kategori: <input type='number' name='iCategory' value=".$_POST['iCategory']." required><br>

				Længde: <input type='number' name='iLength' value=".$_POST['iLength']."><br>

				Højde: <input type='number' name='iHeight' value=".$_POST['iHeight']."><br>

				Pris: <input type='number' name='iPrice' value=".$_POST['iPrice']." required><br>
				<br><br>

				<button type='submit' class='btn btn-info'>Gem Billede</button>

			</form>";

		}
		else {
			header("Location: index.php?error=admin");
		}

	}

?>


</body>

</html>