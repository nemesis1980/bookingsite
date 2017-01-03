<?php

// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>



		



			<div class="profil-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {
		
		echo '<h1>Profil</h1>';
		



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);
		$uid = $_SESSION['id'];
		$sql = "SELECT * FROM profiler WHERE idprofiler='$uid'";
		$result = mysqli_query($conn, $sql);

		// Indsætter den hentede række i en array fra det id der er hentet fra databasen. 

		$row = mysqli_fetch_assoc($result);





		echo "<div class='project-box'>
		
			<div id='info'>
			<p><strong>id:</strong>" . " " . $row['idprofiler'] . "</p>

			<p><strong>Fornavn:</strong>" . " " . $row['Fornavn'] . "</p>

			<p><strong>Efternavn:</strong>" . " " . $row['Efternavn'] . "</p>

			<p><strong>Firma:</strong>" . " " . $row['Firma'] . "</p>

			<p><strong>Adresse:</strong>" . " " . $row['Adresse'] . "</p>

			<p><strong>Postnummer:</strong>" . " " . $row['postnummer_Postnummer'] . "</p>

			<p><strong>Email Adresse:</strong>" . " " . $row['Email'] . "</p>

			<p><strong>Telefon:</strong>" . " " . $row['Telefon'] . "</p>

			<form class='edit-form' method='POST' action='edit-profil.php'>

				<input type='hidden' name='uid' value='".$row['idprofiler']."'>

				<input type='hidden' name='Fornavn' value='".$row['Fornavn']."'>

				<input type='hidden' name='Efternavn' value='".$row['Efternavn']."'>

				<input type='hidden' name='Firma' value='".$row['Firma']."'>

				<input type='hidden' name='Adresse' value='".$row['Adresse']."'>

				<input type='hidden' name='Postnr' value='".$row['postnummer_Postnummer']."'>

				<input type='hidden' name='Email' value='".$row['Email']."'>

				<input type='hidden' name='Tlf' value='".$row['Telefon']."'>

				<button class='btn'>Rediger</button>

			</form>

			</div>





			<br><br>";	





	} else {

		echo"<div class='login shadow'>
		<div class='login-screen'>
			<div class='form-title'>
				<h1>Log ind</h1>
			</div>

			<form class='login-form' action='includes/login.inc.php' method='post'>
				<div class='control-group'>
				
				<legend>Brugernavn:</legend>
				<input type='text' class='login-field' name='uid' placeholder='Brugernavn' id='login-name' required>
				</div>

				<div class='control-group'>
				<legend>Kodeord:</legend>
				<input type='password' class='login-field' name='pwd' placeholder='kodeord' id='login-pass' required>
				</div>

				<button class='btn' type='submit'>log ind</button>
				
			</form>
		</div>
	</div>
					<p id='sign'>Er du ny? - Opret ny bruger <a href='signup.php'>her!</a></p>";

	}
?>

<link href="css/style.css">



			</div>

<footer>Copyright Anne Toxværd</footer>



</body>

</html>

