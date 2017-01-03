<?php

	include 'header.php';

	//Her bliver header.php, som er vores menu, inkluderet på siden

?>

<?php

// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=empty') !==false) {

		echo "Udfyld alle felter <br><br><br>";

	}

// Her tjekkes der om man er logget ind i systemet

	if (isset($_SESSION['id'])) {

	} else {

		echo "Du er ikke logget ind";

	}

?>

<br><br><br>

<?php

// Her tjekkes først om man er logget ind og ellers kommer projekt oprettelses formen frem, så man kan oprette et projekt.
	if (isset($_SESSION['id'])) {

//		echo $_POST['Oid'];

		echo "<form class ='register' action='includes/edit-order.inc.php' method='POST'>

			<input type='hidden' name='Oid' value='".$_POST['Oid']."'>		
			Billede 1: <input type='number' name='OPic1' value=".$_POST['OPic1']."><br>
			Billede 2: <input type='number' name='OPic2' value=".$_POST['OPic2']."><br>
			Billede 3: <input type='number' name='OPic3' value=".$_POST['OPic3']."><br>
			Billede 4: <input type='number' name='OPic4' value=".$_POST['OPic4']."><br>
			Billede 5: <input type='number' name='OPic5' value=".$_POST['OPic5']."><br>
			Start Dato: <input type='date' name='OStart' value=".$_POST['OStart']."><br>
			Slut Dato: <input type='date' name='OSlut' value=".$_POST['OSlut']."><br>
			<button type='submit'>Gem Ordre</button>

		</form>";

	}

?>

</body>

</html>