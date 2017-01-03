<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$msg = "";

$target_dir = "../upload/";

$target = $target_dir . basename($_FILES["BPic"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

$BPic = $_FILES['BPic']['name'];

$iName = $_POST['iName'];

$iCategory = $_POST['iCategory'];

$iLength = $_POST['iLength'];

$iHeight = $_POST['iHeight'];

$iPrice = $_POST['iPrice'];


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["BPic"]["tmp_name"]);
    if($check !== false) {
        echo "Filen er et billede - <br>" . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Filen er ikke et billede. <br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target)) {
    echo "Beklager filen eksisterer allerede. <br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["BPic"]["size"] > 20000000) {
    echo "Beklager, filen er for stor. <br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
    echo "Beklager, JPG, JPEG, PNG & GIF er de eneste filtyper der er tilladte. <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Beklager, din fil blev ikke uploaded. <br>";
    echo "<a href='../index.php'>Hjem</a>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["BPic"]["tmp_name"], $target)) {
        header("Location: ../pictures.php");
    } else {
        echo "Beklager, der skete en fejl ved uploaden. <br>";
        echo "<a href='../index.php'>Hjem</a>";
    }
}


// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.


if (empty($BPic)) {

	header("Location: ../add.php?error=empty");

	exit();

}



if (empty($iName)) {

	header("Location: ../add.php?error=empty");

	exit();

}


if (empty($iCategory)) {

	header("Location: ../add.php?error=empty");

	exit();

}


/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/




else {

		$sql = "INSERT INTO images (name, kategori_idkategori, billed, pris, laengde, hojde)

				VALUES ('$iName', '$iCategory', '$BPic', '$iPrice', '$iLength', '$iHeight')";

		$result = mysqli_query($conn, $sql);

    // Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.


    header("Location: ../billeder.php");
    echo "Upload succesfull";

	}





?>

