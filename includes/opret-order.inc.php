<?php

session_start();
// Vi starter en session her.

// Include bliver brugt til at loade database connection filen.
include '../dbcon.php';

// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.
$OStart = $_POST['OStart'];
$OSlut = $_POST['OSlut'];
$OPic1 = $_POST['OPic1'];
$OPic2 = $_POST['OPic2'];
$OPic3 = $_POST['OPic3'];
$OPic4 = $_POST['OPic4'];
$OPic5 = $_POST['OPic5'];
$Kid = $_POST['Kid'];

// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.

if (empty($OStart)) {
	header("Location: ../opret-order.php?error=empty");
	exit();
}

if (empty($OSlut)) {
	header("Location: ../opret-order.php?error=empty");
	exit();
}

if (empty($OPic1)) {
	header("Location: ../opret-order.php?error=empty");
	exit();
}

/*
Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.
Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.
*/

else {

	$conn1 = mysqli_connect($servername, $username, $password, $table);
	$sql1 = "SELECT pris FROM images WHERE id_billed ='$OPic1'";
	$result1 = mysqli_query($conn1, $sql1);
	$PrisPic1 = mysqli_fetch_array($result1);
//	echo $PrisPic1['pris'];

	$conn2 = mysqli_connect($servername, $username, $password, $table);
	$sql2 = "SELECT pris FROM images WHERE id_billed ='$OPic2'";
	$result2 = mysqli_query($conn2, $sql2);
	$PrisPic2 = mysqli_fetch_array($result2);
//	echo $PrisPic2['pris'];

	$conn3 = mysqli_connect($servername, $username, $password, $table);
	$sql3 = "SELECT pris FROM images WHERE id_billed ='$OPic3'";
	$result3 = mysqli_query($conn3, $sql3);
	$PrisPic3 = mysqli_fetch_array($result3);
//	echo $PrisPic3['pris'];

	$conn4 = mysqli_connect($servername, $username, $password, $table);
	$sql4 = "SELECT pris FROM images WHERE id_billed ='$OPic4'";
	$result4 = mysqli_query($conn4, $sql4);
	$PrisPic4 = mysqli_fetch_array($result4);
//	echo $PrisPic4['pris'];

	$conn5 = mysqli_connect($servername, $username, $password, $table);
	$sql5 = "SELECT pris FROM images WHERE id_billed ='$OPic5'";
	$result5 = mysqli_query($conn5, $sql5);
	$PrisPic5 = mysqli_fetch_array($result5);
//	echo $PrisPic5['pris'];

$PrisPerDag = array($PrisPic1['pris'], $PrisPic2['pris'], $PrisPic3['pris'], $PrisPic4['pris'], $PrisPic5['pris']);
//echo array_sum($PrisPerDag);


$Slutdato = strtotime($OSlut);
$Startdato = strtotime($OStart);
$Lejeperiode1 = $Slutdato - $Startdato;
$Lejeperiode = $Lejeperiode1 / (60 * 60 * 24);
//echo $Lejeperiode;

$SamletPris = array_sum($PrisPerDag) * $Lejeperiode;

//echo $SamletPris;
	
	$conn = mysqli_connect($servername, $username, $password, $table);
	$sql = "INSERT INTO ordrer (Ordrer_Startdato, Ordrer_Slutdato, Ordrer_Billede1, Ordrer_Billede2, Ordrer_Billede3, Ordrer_Billede4, Ordrer_Billede5, Ordrer_SamletPris, profiler_idprofiler)
			VALUES ('$OStart', '$OSlut', '$OPic1', '$OPic2', '$OPic3', '$OPic4', '$OPic5', '$SamletPris', '$Kid');";
	$result = mysqli_query($conn, $sql);
}

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.
	header("Location: ../ikkebetalte-orders.php");

?>



