<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$uid = (isset($_POST['uid']) ? $_POST['uid'] : null);
$Fornavn = (isset($_POST['Fornavn']) ? $_POST['Fornavn'] : null);
$Efternavn = (isset($_POST['Efternavn']) ? $_POST['Efternavn'] : null);
$Firma = (isset($_POST['Firma']) ? $_POST['Firma'] : null);
$Adresse = (isset($_POST['Adresse']) ? $_POST['Adresse'] : null);
$Postnr = (isset($_POST['Postnr']) ? $_POST['Postnr'] : null);
$Email = (isset($_POST['Email']) ? $_POST['Email'] : null);
$Tlf = (isset($_POST['Tlf']) ? $_POST['Tlf'] : null);



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($Fornavn)) {

	header("Location: ../edit-profil.php?error=empty");

	exit();

}



if (empty($Efternavn)) {

	header("Location: ../edit-profil.php?error=empty");

	exit();

}


if (empty($Adresse)) {

	header("Location: ../edit-profil.php?error=empty");

	exit();

}


if (empty($Postnr)) {

	header("Location: ../edit-profil.php?error=empty");

	exit();

}


if (empty($Email)) {

	header("Location: ../edit-profil.php?error=empty");

	exit();

}



if (empty($Tlf)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}

/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/

	$conn = mysqli_connect($servername, $username, $password, $table);
	$sql = "SELECT idprofiler FROM profiler WHERE idprofiler='$uid'";
	$result = mysqli_query($conn, $sql);
		$sql = "UPDATE profiler SET Fornavn='$Fornavn', Efternavn='$Efternavn', Firma='$Firma', Adresse='$Adresse', postnummer_Postnummer='$Postnr', Email='$Email', Telefon='$Tlf' WHERE idprofiler='$uid'";
		$conn->query($sql);

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

	header("Location: ../index.php");

?>

