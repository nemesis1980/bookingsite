<?php

// Include bliver brugt til at loade database connection filen.
	include 'dbcon.php';
//Her bliver header.php, som er vores menu, inkluderet på siden
	include 'header.php';
?>



<?php



// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=empty') !==false) {

		echo "Udfyld alle felter <br><br><br>";

	}

	elseif(strpos($url, 'error=projectname') !==false) {

		echo "Projekt navn eksisterer allerede <br><br>";

	}



// Her tjekkes der om man er logget ind i systemet



	if (isset($_SESSION['id'])) {

	} else {

		echo "Du er ikke logget ind";

	}

?>



<br><br><br>

<?php

if (isset($_SESSION['id'])) {

		$conn = mysqli_connect($servername, $username, $password, $table);

		$sql = "SELECT billed, name, id_billed FROM images";

		$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {
				
				echo "<div class='gallery-box'>
					
					<img src='upload/" . $row['billed'] . "'>

					<p>Billede id:" . " " . $row['id_billed'] . " "." Billed Navn:" . " " . $row['name'] . "</p>

					<br><br>

					</div>

					";
			}
		}
?>
<form class ='register' action='includes/create-order.inc.php' method='POST'>
<?php
	if (isset($_SESSION['id'])) {

			$conn1 = mysqli_connect($servername, $username, $password, $table);

			$sql1 = "SELECT id_billed, name FROM images";

			$result1 = mysqli_query($conn1, $sql1);

				echo "
					<tr>
						<td>Vælg Billede 1:</td>
						<td>
							<select name='OPic1'>";
								while ($row1 = $result1->fetch_assoc()) {		
									echo "	
									<option value=" . $row1['id_billed'] . ">" . $row1['name'] . "</option>";
								}
							echo "</select>
						</td>
					</tr>
					<br><br>";
	}
?>
<?php
	if (isset($_SESSION['id'])) {

			$conn2 = mysqli_connect($servername, $username, $password, $table);

			$sql2 = "SELECT id_billed, name FROM images";

			$result2 = mysqli_query($conn2, $sql2);

				echo "
					<tr>
						<td>Vælg Billede 2:</td>
						<td>
							<select name='OPic2'>
								<option value='0'>Ingen</option>";
								while ($row2 = $result2->fetch_assoc()) {		
									echo "	<option value=" . $row2['id_billed'] . ">" . $row2['name'] . "</option>";
								}
							echo "</select>
						</td>
					</tr>
					<br><br>";
	}
?>
<?php
	if (isset($_SESSION['id'])) {

			$conn3 = mysqli_connect($servername, $username, $password, $table);

			$sql3 = "SELECT id_billed, name FROM images";

			$result3 = mysqli_query($conn3, $sql3);

				echo "
					<tr>
						<td>Vælg Billede 3:</td>
						<td>
							<select name='OPic3'>
								<option value='0'>Ingen</option>";
								while ($row3 = $result3->fetch_assoc()) {		
									echo "	<option value=" . $row3['id_billed'] . ">" . $row3['name'] . "</option>";
								}
							echo "</select>
						</td>
					</tr>
					<br><br>";
	}
?>
<?php
	if (isset($_SESSION['id'])) {

			$conn4 = mysqli_connect($servername, $username, $password, $table);

			$sql4 = "SELECT id_billed, name FROM images";

			$result4 = mysqli_query($conn4, $sql4);

				echo "
					<tr>
						<td>Vælg Billede 4:</td>
						<td>
							<select name='OPic4'>
								<option value='0'>Ingen</option>";
								while ($row4 = $result4->fetch_assoc()) {		
									echo "	<option value=" . $row4['id_billed'] . ">" . $row4['name'] . "</option>";
								}
							echo "</select>
						</td>
					</tr>
					<br><br>";
	}
?>
<?php
	if (isset($_SESSION['id'])) {

			$conn5 = mysqli_connect($servername, $username, $password, $table);

			$sql5 = "SELECT id_billed, name FROM images";

			$result5 = mysqli_query($conn5, $sql5);

				echo "
					<tr>
						<td>Vælg Billede 5:</td>
						<td>
							<select name='OPic5'>
								<option value='0'>Ingen</option>";
								while ($row5 = $result5->fetch_assoc()) {		
									echo "	<option value=" . $row5['id_billed'] . ">" . $row5['name'] . "</option>";
								}
							echo "</select>
						</td>
					</tr>
					<br><br>";
	}
?>
<?php
				echo "
					Start Dato: <input type='date' name='OStart' placeholder='Startdato YYYY-MM-DD'><br><br>
					Slut Dato: <input type='date' name='OSlut' placeholder='Slutdato YYYY-MM-DD'><br><br>
					<button type='submit'>Opret Ordre</button>
				</form>";
?>

</body>

</html>
