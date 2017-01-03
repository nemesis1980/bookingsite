<?php

session_start();

// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.
include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.
$Oid = (isset($_POST['Oid']) ? $_POST['Oid'] : null);
$OPic1 = (isset($_POST['OPic1']) ? $_POST['OPic1'] : null);
$OPic2 = (isset($_POST['OPic2']) ? $_POST['OPic2'] : null);
$OPic3 = (isset($_POST['OPic3']) ? $_POST['OPic3'] : null);
$OPic4 = (isset($_POST['OPic4']) ? $_POST['OPic4'] : null);
$OPic5 = (isset($_POST['OPic5']) ? $_POST['OPic5'] : null);
$OStart = (isset($_POST['OStart']) ? $_POST['OStart'] : null);
$OSlut = (isset($_POST['OSlut']) ? $_POST['OSlut'] : null);

// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.

if (empty($OPic1)) {
	header("Location: ../edit-order.php?error=empty");
	exit();
}

if (empty($OStart)) {
	header("Location: ../edit-order.php?error=empty");
	exit();
}

if (empty($OSlut)) {
	header("Location: ../edit-order.php?error=empty");
	exit();
}

/*
Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.
Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.
*/

	$conn = mysqli_connect($servername, $username, $password, $table);
	$sql = "SELECT idOrdrer FROM ordrer WHERE idOrdrer='$Oid'";
	$result = mysqli_query($conn, $sql);
	$sql = "UPDATE ordrer SET Ordrer_Billede1='$OPic1', Ordrer_Billede2='$OPic2', Ordrer_Billede3='$OPic3', Ordrer_Billede4='$OPic4', Ordrer_Billede5='$OPic5', Ordrer_Startdato='$OStart', Ordrer_Slutdato='$OSlut' WHERE idOrdrer='$Oid'";
	$conn->query($sql);

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.
	header("Location: ../notpaid-orders.php");

?>