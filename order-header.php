	<div class="orderdiv">
		<nav class="ord">
			<ul class="ordline">
				<?php if (isset($_SESSION['id'])) {
				include 'dbcon.php';
				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='2'";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()) {
					echo "<li><a href='all-orders.php'>ALLE ORDRER</a></li>
					<li><a href='betalte-orders.php'>BETALTE ORDRER</a></li>
					<li><a href='ikkebetalte-orders.php'>IKKE BETALTE ORDRER</a></li>
					";
						}
					}
				?>
				<?php if (isset($_SESSION['id'])) {
				include 'dbcon.php';
				$uid = $_SESSION['id'];
				$sql = "SELECT * FROM profiler WHERE idprofiler='$uid' AND level='1'";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()) {
					echo "<li><a href='paid-orders.php'>BETALTE ORDRER</a></li>
					<li><a href='notpaid-orders.php'>IKKE BETALTE ORDRER</a></li>
					";
						}
					}
				?>
			</ul>
		</nav>
	</div>