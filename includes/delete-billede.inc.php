<?php

session_start();

// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.

include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

	$Bid_1 = (isset($_POST['Bid_1']) ? $_POST['Bid_1'] : null);
	$BPic_1 = (isset($_POST['BPic_1']) ? $_POST['BPic_1'] : null);

	$conn = mysqli_connect($servername, $username, $password, $table);
	$sql = "SELECT id_billed FROM images WHERE id_billed='$Bid_1'";
	$result = mysqli_query($conn, $sql);
	$sql = "DELETE FROM images WHERE id_billed='$Bid_1'";
	$conn->query($sql);

if (!unlink("../upload/".$BPic_1)) {
	echo ("Error deleting $BPic_1");
	}

else {
	header("Location: ../billeder.php");
	}

?>

