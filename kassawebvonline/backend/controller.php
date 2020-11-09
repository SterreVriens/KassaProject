<?php
require('config.php');

//zorgt dat je de pagina niet meer kan zien
if ($_SERVER["REQUEST_METHOD"] != "POST"){
	header("location: ../index.php?msg=Deze pagina is niet beschikbaar!");
	exit;
}

$naam       = $_POST['naam'];
$email      = $_POST['email'];
$onderwerp  = $_POST['onderwerp'];
$inhoud     = $_POST ['inhoud'];

//zet ingevoerde data in de database(op de veilige manier)
$sql  = "INSERT INTO contact_submissions(id,naam,email,onderwerp,inhoud)
		 VALUES (NULL,:naam,:email,:onderwerp,:inhoud)";

$prepare = $conn->prepare($sql);
$prepare-> execute([
		 	':naam'=> $naam,
		 	':email'=> $email,
		 	':onderwerp' => $onderwerp,
		 	':inhoud' => $inhoud
]);

// $conn-> query($sql);

//terug naar homepage
header("location: ../contact.php?msg= message send");
exit;
?>