<?php
require('backend/header.php');
?>

<?php
if (isset($_GET['msg'])) {
	$msg   = $_GET['msg'];
	echo  $msg;
}
?>
<style>
	input{
		outline: none;
		border: none;
	}

	textarea {
		outline: none;
		border: none;
	}
	input.getypteTekst {
		height: 50px;
		border-radius: 25px;
		padding: 0 30px 0 50px;
	}

	input.getypteTekst[name="email"] {
		padding: 0 30px 0 54px;
	}

	textarea.getypteTekst {
		min-height: 100px;
		border-radius: 25px;
		padding: 0 30px 0 50px;
	}
</style>

		


	<main>
		<div class="background" style="background-image: url('img/achtergrond.jpg');">
			<div class="backgroundColor">
				<div class="volledigeFormulier">
					<div class="emailFoto">
						<img src="img/email.png" alt="IMG">
					</div>

					<form class="contactFormulier" action="backend/controller.php" method="post">
						<span class="contactFormulier-title">
							Neem contact op
						</span>
					
						<div class="inputVelden">
							<input class="getypteTekst" type="text" name="naam" placeholder="Naam..">
						</div>

						<div class="inputVelden">
							<input class="getypteTekst" type="email" name="email" placeholder="Email..">
						</div>

						<div class="inputVelden">
							<input class="getypteTekst" type="text" name="onderwerp" placeholder="Onderwerp..">
						</div>

						<div class="inputVelden">
							<input class="getypteTekst" type="message" name="inhoud" placeholder="Bericht..">
						</div>

						<div class="verstuurButtonDiv">
							<input type="submit" class="verstuurButton">
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>


<?php
require('backend/footer.php');
?>
