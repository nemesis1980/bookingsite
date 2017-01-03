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

			$Pid = (isset($_POST['Bid']) ? $_POST['Bid'] : null);
			$conn = mysqli_connect($servername, $username, $password, $table);
			$sql = "SELECT * FROM profiler WHERE idprofiler='$Pid'";
			$result = mysqli_query($conn, $sql);

			echo "<form class ='register' action='includes/edit-profiles.inc.php' method='POST'>

				<input type='hidden' name='Pid' value='".$_POST['Pid']."'>

				Fornavn: <input type='text' name='iFornavn' value=".$_POST['iFornavn']." required minlength='2'><br>

				Efternavn: <input type='text' name='iEfternavn' value=".$_POST['iEfternavn']." required minlength='2'><br>

				Adresse: <input type='text' name='iAdresse' value=".$_POST['iAdresse']." required><br>

				Postnummer: <input type='number' name='iPostnr' value=".$_POST['iPostnr']." required minlength='4' maxlength='4'><br>

				Firma: <input type='text' name='iFirma' value=".$_POST['iFirma']."><br>

				Email: <input type='text' name='iEmail' value=".$_POST['iEmail']." required><br>

				Telefon: <input type='number' name='iTelefon' value=".$_POST['iTelefon']." required minlength='8' maxlength='8'><br>

				Brugernavn: <input type='text' name='iBrugernavn' value=".$_POST['iBrugernavn']." required><br>

				Access Level: <input type='number' name='iLevel' value=".$_POST['iLevel']." required><br>

				<button type='submit' class='btn btn-info'>Gem Profil</button>

			</form>";
		}
		else {
			header("Location: index.php?error=admin");
		}
	}

?>


</body>

</html>