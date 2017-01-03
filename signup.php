<?php
	include 'header.php';
	//Her bliver header.php, som er vores menu, inkluderet på siden
?>


<div class='shadow add'>

<?php 
	
	$url= "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 	
	if (strpos($url, 'error=empty') !== false){
	echo "<h2 class='errSign'>Udfyld alle felter!</h2>";
	}
	elseif (strpos($url, 'error=username') !== false){
		echo "<h2 class='errSign'>Brugernavn eksisterer allerede!</h2>";
	}	
	
	
	if (isset($_SESSION['id'])) {
	echo "<h4>Du er allerede logget ind!</h4>";
	} else {

	echo "
	<div>
	<h1 class='form-title'>Opret ny profil</h1>
    <h2 id='felter'>* = Felter skal udfyldes</h2>
	</div>
    
	<form class='form-horizontal' action='includes/signup.inc.php' method='post'>
			
			<div class='form-group'>
			<label for='fornavn' class='col-md-2'>Fornavn*</label>
			<div class='col-md-6'>
			<input type='text' name='firstName' class='form-control' required minlength='2'>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='efternavn' class='col-md-2'>Efternavn*</label>
			<div class='col-md-6'>
			<input type='text' name='lastName' class='form-control' required minlength='2'>
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='adresse' class='col-md-2'>Adresse*</label>
			<div class='col-md-6''>
			<input type='text' name='Adress' class='form-control' required>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='postnummer' class='col-md-2'>Postnummer*</label>
			<div class='col-md-6''>
			<input type='number' name='zip' class='form-control' required minlength='4' maxlength='4'>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='firma' class='col-md-2'>CVR nummer</label>
			<div class='col-md-6''>
			<input type='number' name='Company' class='form-control'>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='email' class='col-md-2'>Email*</label>
			<div class='col-md-6''>
			<input type='email' name='Email' class='form-control' required>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='tlf' class='col-md-2'>Telefon*</label>
			<div class='col-md-6''>
				<input type='tel' name='Phone' class='form-control' required minlength='8' maxlength='8'>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='brugernavn' class='col-md-2'>Brugernavn*</label>
			<div class='col-md-6''>
			<input type='text' name='uid'class='form-control' required>
				
			</div>	
			</div>
			
			<div class='form-group'>
			<label for='kodeord' class='col-md-2'>Kodeord*</label>
			<div class='col-md-6''>
			<input type='password' name='pwd' class='form-control' required>
				
			</div>	
			</div>
			
			
			<div class='form-group'>
			<div class='signupbtn'>
			<div class='col-md-12'>
				<button type='submit' name='btnSave' class='btn'>Gem</button>
			</div>
			</div>	
			</div>
			
			
		</form>
		
		</div>";
	}
		?>
        
        
<footer><p> &copy; Copyright Anne Toxværd 2016-2017</p></footer>

</body>

</html>