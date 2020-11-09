<?php
require("backend/header.php");



if (!isset($_SESSION['id'])){
	exit('Unauthorized user! Please Log in');
}

if (isset($_POST['LogOut'])){
	session_destroy();
	header("location: index.php");
}


$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = :id";
$query = $conn->prepare($sql);
$query->execute(['id' => $id]);
$user = $query->fetch();
?>

<div class="loginmain">
<div class="detail">
	<h2>Gebruiker</h2>
	<br>
	<p>User: <?= $user['email'];?></p>
	<p>Password: <?= $user['password'];?></p>

	
	<a href="backend/download.php">Download kassa.exe</a>

	<form action="detail.php" method="POST">
    <input type="submit" name="LogOut" value="log uit" />
	</form>
</div>
</div>
<?php
require("backend/footer.php");
?>