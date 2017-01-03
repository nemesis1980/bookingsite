<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$uid = $_POST['uid'];

$pwd = $_POST['pwd'];



// Her bliver password decrypted, før vi tjekker værdier, og vi bliver sendt tilbage til forsiden med en fejl, hvis de ikke matcher.



$sql = "SELECT * FROM profiler WHERE Brugernavn='$uid'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$hash_pwd = $row['Password'];

$hash = password_verify($pwd, $hash_pwd);



if ($hash == 0) {

	header("Location: ../index.php?error=empty");

	echo"Dit kodeord er forkert";

} else {



// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



$sql = "SELECT * FROM profiler WHERE Brugernavn='$uid' AND Password='$hash_pwd'";

$result = mysqli_query($conn, $sql);



if (!$row = mysqli_fetch_assoc($result)) {

	echo "Dit brugernavn eller password er forkert";

} else {

	$_SESSION['id'] = $row['idprofiler'];


// Nedenfor bliver man efter dataen er sendt, sendt tilbage til registrer siden.

	header("Location: ../index.php"); 

}

}











