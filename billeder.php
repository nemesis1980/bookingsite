<?php 

include "header.php";

?>

<?php

include "add.php"

?>
<link href="css/style.css">
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
			$sql = "SELECT * FROM images";
			$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "
				
						<table class='table table-bordered table-responsive'>
							<thead>
								<tr>
									<th>Navn</th>
									<th>Kategori</th>
									<th>Længde</th>
									<th>Højde</th>
									<th>Billede</th>
									<th>Pris</th>
									<th></th>
								</tr>
							</thead>
						<tbody>
							<tr>
								<td>" . $row['name'] . "</td>
								<td>" . $row['kategori_idkategori'] . "</td>
								<td>" . $row['laengde'] . "</td>
								<td>" . $row['hojde'] . "</td>
								<td><img src='upload/" . $row['billed'] . "'></td>							
								<td>" . $row['pris'] . "</td>
			
								<td>
									<form class='edit-form' method='POST' action='edit-billede.php'>
										<input type='hidden' name='Bid' value='".$row['id_billed']."'>
										<input type='hidden' name='iCategory' value='".$row['kategori_idkategori']."'>
										<input type='hidden' name='BPic' value='".$row['billed']."'>
										<input type='hidden' name='iName' value='".$row['name']."'>
										<input type='hidden' name='iLength' value='".$row['laengde']."'>
										<input type='hidden' name='iHeight' value='".$row['hojde']."'>
										<input type='hidden' name='iPrice' value='".$row['pris']."'>
										<button class='btn btn-info'>Rediger</button>
									</form>
								</td>
						
								<td><form class='delete-form' method='POST' action='delete-billede.php'>
								<input type='hidden' name='Bid_1' value='".$row['id_billed']."'>
								<input type='hidden' name='BPic_1' value='".$row['billed']."'>
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