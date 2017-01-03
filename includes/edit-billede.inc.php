<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Bid = (isset($_POST['Bid']) ? $_POST['Bid'] : null);

$BPic = (isset($_POST['BPic']) ? $_POST['BPic'] : null);

$iCategory = (isset($_POST['iCategory']) ? $_POST['iCategory'] : null);

$iName = (isset($_POST['iName']) ? $_POST['iName'] : null);

$iLength = (isset($_POST['iLength']) ? $_POST['iLength'] : null);

$iHeight = (isset($_POST['iHeight']) ? $_POST['iHeight'] : null);

$iPrice = (isset($_POST['iPrice']) ? $_POST['iPrice'] : null);


// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.


if (empty($iName)) {

	header("Location: ../billeder.php?error=empty2");

	exit();

}



if (empty($iPrice)) {

	header("Location: ../billeder.php?error=empty3");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT id_billed FROM images WHERE id_billed='$Bid'";
	$result = mysqli_query($conn, $sql);

	$sql = "UPDATE images SET name='$iName', kategori_idkategori='$iCategory', laengde='$iLength', hojde='$iHeight', pris='$iPrice' WHERE id_billed='$Bid'";
	$conn->query($sql);


	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.
	
	header("Location: ../billeder.php");



?>

