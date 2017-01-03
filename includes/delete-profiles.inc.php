<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Pid_1 = (isset($_POST['Pid_1']) ? $_POST['Pid_1'] : null);
$conn = mysqli_connect($servername, $username, $password, $table);
$sql = "SELECT idprofiler FROM profiler WHERE idprofiler='$Pid_1'";
$result = mysqli_query($conn, $sql);
$sql = "DELETE FROM profiler WHERE idprofiler='$Pid_1'";
$conn->query($sql);

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

	header("Location: ../all-profiles.php");



?>

