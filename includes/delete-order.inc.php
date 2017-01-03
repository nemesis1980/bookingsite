<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Oid_1 = (isset($_POST['Oid_1']) ? $_POST['Oid_1'] : null);



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idOrdrer FROM ordrer WHERE idOrdrer='$Oid_1'";

	$result = mysqli_query($conn, $sql);

		$sql = "DELETE FROM ordrer WHERE idOrdrer='$Oid_1'";

		$conn->query($sql);



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

	header("Location: ../notpaid-orders.php");



?>