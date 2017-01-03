<?php

// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=empty') !==false) {

		echo "Udfyld alle felter <br><br><br>";

	}

	elseif(strpos($url, 'error=projectname') !==false) {

		echo "Projekt navn eksisterer allerede <br><br>";

	}



// Her tjekkes der om man er logget ind i systemet



	if (isset($_SESSION['id'])) {

	} else {

		echo "Du er ikke logget ind";

	}

?>
<div align="center" >
<?php

// Her tjekkes først om man er logget ind og ellers kommer projekt oprettelses formen frem, så man kan oprette et projekt.

	if (isset($_SESSION['id'])) {

		echo  "<div class='login' align='left'><form class ='register' action='includes/add.inc.php' method='POST' enctype='multipart/form-data'>

			Billede: <input type='file' name='BPic' id='BPic' required><br>

			Navn: <input type='text' name='iName' placeholder='Navn' required><br>

			Kategori: <input type='number' name='iCategory' placeholder='Kategori' required><br>

			Længde: <input type='number' name='iLength' placeholder='Længde' value='0' required><br>

			Højde: <input type='number' name='iHeight' placeholder='Højde' value='0' required><br>

			Pris: <input type='number' name='iPrice' placeholder='Pris' value='1' required><br>

			<button type='submit' class='btn'>Opret Billede</button>

		</form> </div>";

	}

?>
</div>