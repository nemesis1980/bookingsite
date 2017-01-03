<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$firstName = $_POST['firstName'];

$lastName = $_POST['lastName'];

$Adress = $_POST['Adress'];

$Zipcode = $_POST['zip'];

$Company = $_POST['Company'];

$Email = $_POST['Email'];

$Phone = $_POST['Phone'];

$uid = $_POST['uid'];

$pwd = $_POST['pwd'];



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($firstName)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst Fornavn";

}



if (empty($lastName)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst Efternavn";

}



if (empty($Adress)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst Adresse";

}



if (empty($Zipcode)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst postnummer";

}



if (empty($Email)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld Venligst Email";

}



if (empty($Phone)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld Venligst Telefonnummer";	

}



if (empty($uid)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst brugernavn";

}



if (empty($pwd)) {

	header("Location: ../signup.php?error=empty");

	echo"Udfyld venligst kodeord";

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om username eksisterer i forvejen. Herefter bliver password encrypted, før det bliver sendt til databasen.

*/



else {

	$sql = "SELECT Brugernavn FROM profiler WHERE Brugernavn='$uid'";

	$result = mysqli_query($conn, $sql);

	$uidcheck = mysqli_num_rows($result);

	if ($uidcheck > 0) {

		header("Location: ../signup.php?error=username");

		exit();

	} else {

		$enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);

		$sql = "INSERT INTO profiler (Fornavn, Efternavn, Adresse, postnummer_Postnummer, Firma, Email, Telefon, Brugernavn, Password) 

		VALUES ('$firstName', '$lastName', '$Adress', '$Zipcode', '$Company', '$Email', '$Phone', '$uid', '$enc_pwd')";

		$result = mysqli_query($conn, $sql);



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../index.php");
	}
}

?>



