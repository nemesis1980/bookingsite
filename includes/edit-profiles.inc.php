<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Pid = (isset($_POST['Pid']) ? $_POST['Pid'] : null);
$iFornavn = (isset($_POST['iFornavn']) ? $_POST['iFornavn'] : null);
$iEfternavn = (isset($_POST['iEfternavn']) ? $_POST['iEfternavn'] : null);
$iAdresse = (isset($_POST['iAdresse']) ? $_POST['iAdresse'] : null);
$iPostnr = (isset($_POST['iPostnr']) ? $_POST['iPostnr'] : null);
$iFirma = (isset($_POST['iFirma']) ? $_POST['iFirma'] : null);
$iEmail = (isset($_POST['iEmail']) ? $_POST['iEmail'] : null);
$iTelefon = (isset($_POST['iTelefon']) ? $_POST['iTelefon'] : null);
$iBrugernavn = (isset($_POST['iBrugernavn']) ? $_POST['iBrugernavn'] : null);
$iLevel = (isset($_POST['iLevel']) ? $_POST['iLevel'] : null);

// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.


if (empty($iFornavn)) {

	header("Location: ../all-profiles.php?error=empty2");

	exit();

}



if (empty($iEfternavn)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iAdresse)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iPostnr)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iEmail)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iTelefon)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iBrugernavn)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}


if (empty($iLevel)) {

	header("Location: ../all-profiles.php?error=empty3");

	exit();

}

/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idprofiler FROM profiler WHERE idprofiler='$Pid'";
	$result = mysqli_query($conn, $sql);

	$sql = "UPDATE profiler SET Fornavn='$iFornavn', Efternavn='$iEfternavn', Adresse='$iAdresse', postnummer_Postnummer='$iPostnr', Firma='$iFirma', Email='$iEmail', Telefon='$iTelefon', Brugernavn='$iBrugernavn', level='$iLevel' WHERE idprofiler='$Pid'";
	$conn->query($sql);


	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.
	
	header("Location: ../all-profiles.php");



?>

