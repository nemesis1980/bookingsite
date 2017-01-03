<?php

// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>

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
				$sql = "SELECT * FROM profiler";
				$result = mysqli_query($conn, $sql);

					while ($row = $result->fetch_assoc()) {
						echo "
							<table class='table table-bordered table-responsive'>
								<thead>
									<tr>
										<th>ID</th>
										<th>Fornavn</th>
										<th>Efternavn</th>
										<th>Adresse</th>
										<th>Postnummer</th>
										<th>Firma</th>
										<th>Email</th>
										<th>Telefon</th>
										<th>Brugernavn</th>
										<th>Access Level</th>
									</tr>
								</thead>
							<tbody>
								<tr>
									<td>" . $row['idprofiler'] . "</td>
									<td>" . $row['Fornavn'] . "</td>
									<td>" . $row['Efternavn'] . "</td>
									<td>" . $row['Adresse'] . "</td>
									<td>" . $row['postnummer_Postnummer'] . "</td>
									<td>" . $row['Firma'] . "</td>
									<td>" . $row['Email'] . "</td>
									<td>" . $row['Telefon'] . "</td>
									<td>" . $row['Brugernavn'] . "</td>
									<td>" . $row['level'] . "</td>
				
									<td>
										<form class='edit-form' method='POST' action='edit-profiles.php'>
											<input type='hidden' name='Pid' value='".$row['idprofiler']."'>
											<input type='hidden' name='iFornavn' value='".$row['Fornavn']."'>
											<input type='hidden' name='iEfternavn' value='".$row['Efternavn']."'>
											<input type='hidden' name='iAdresse' value='".$row['Adresse']."'>
											<input type='hidden' name='iPostnr' value='".$row['postnummer_Postnummer']."'>
											<input type='hidden' name='iFirma' value='".$row['Firma']."'>
											<input type='hidden' name='iEmail' value='".$row['Email']."'>
											<input type='hidden' name='iTelefon' value='".$row['Telefon']."'>
											<input type='hidden' name='iBrugernavn' value='".$row['Brugernavn']."'>
											<input type='hidden' name='iLevel' value='".$row['level']."'>
											<button class='btn btn-info'>Rediger</button>
										</form>
									</td>
							
									<td><form class='delete-form' method='POST' action='delete-profiles.php'>
									<input type='hidden' name='Pid_1' value='".$row['idprofiler']."'>
									<button class='btn btn-danger'>Slet</button>
									</form></td>
								</tr>
							</tbody>
						</table>
						";
					}
			}
			
			else {
				header("Location: index.php?error=admin");
			}
	}
?>






</body>

</html>