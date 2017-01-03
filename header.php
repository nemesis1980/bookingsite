<?php 



//Start af session

session_start();



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Anne Toxværd | Booking</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet">
<!--Fav icon -->

<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="shortcut icon" href="fav/favicon.ico" type="image/x-icon">
<link rel="icon" href="fav/favicon.ico" type="image/x-icon">

</head>

<body>

<!--Billed i toppen af siden-->
<img id="header_billed" alt="header-billed" src="images/kompresses_header_book.jpg"> 

<header>
	<?php 
	 $curpage = basename($_SERVER['PHP_SELF']);
	?>
	
    
    <nav>

		<ul class="ulleft">
			
			<li><a href="http://kunstogdesign.simonet.dk/booking/">&#129136; Tilbage</a></li>

			<li><a href="index.php" <?php if ($curpage == 'index.php') { echo 'class="active"'; } ?>>Profil</a></li>

			<?php if (isset($_SESSION['id'])) {

				include 'dbcon.php';

				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
				$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "<li><a href='all-profiles.php'>Brugere</a></li>";
					}
				}
			?>
			<?php if (isset($_SESSION['id'])) {

				include 'dbcon.php';

				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
				$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "<li><a href='ikkebetalte-orders.php'>Ordrer</a></li>";
					}
				}
			?>
			<?php if (isset($_SESSION['id'])) {

				include 'dbcon.php';

				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='1'";
				$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "<li><a href='notpaid-orders.php'>Ikke Betalte Ordrer</a></li>";
					}
				}
			?>

			<li><a href="gallery.php" <?php if ($curpage == 'gallery.php') { echo 'class="active"'; } ?>>Galleri</a></li>

			<?php if (isset($_SESSION['id'])) {

				include 'dbcon.php';

				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
				$result = mysqli_query($conn, $sql);

				while ($row = $result->fetch_assoc()) {

					echo "<li><a href='billeder.php'>Billeder</a></li>";
					}
				}
			?>

		</ul>
		<ul class="ulright">	

<?php

	// Her tjekker vi efter om der er en eksisterende session, altså om brugeren er logget ind, og hvis dette er sandt, så laves en logout knap.
		if (isset($_SESSION['id'])) {
			echo "<form action='includes/logout.inc.php'>
				<button>Log ud</button>
			</form>";
		} 

// Hvis brugeren ikke er logget ind, laves en form, hvor brugeren kan logge ind.

		else {
			echo "<form action='includes/login.inc.php' method='POST'>
				<input type='text' placeholder='Brugernavn' name='uid' required>
				<input type='password' placeholder='Kodeord' name='pwd' required>
				<button type='submit'>Login</button>
			</form>";

			echo "<li><a href='signup.php'>Registrer</a></li>";
		}
		?>

	</ul>
	</nav>

</header>