<?php
	include ('connect_php.php');
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<title>Login PHP/MySQL</title>
	</head>

	<body>

		<?php

			if (!$_POST) {
		?>
				<form class="login-form" action="index.php" method="post" name="autenticacao">

					<h1 class="login-form__title">Sign in</h1>

					<label class="login-form__label login-form__label_user" for="usernameInput">Username</label>
					<input placeholder="ex: ricardo" id="usernameInput" class="login-form__input login-form__input_user" type="text" maxlength="25" name="txtlogin" required>

					<label class="login-form__label login-form__label_password" for="passwordInput">Password</label>
					<input placeholder="ex: kendra" id="passwordInput" class="login-form__input login-form__input_password" type="password" maxlength="50" name="txtsenha" required>

					<a class="login-form__forgot-password" href="javascript:void(0)">Forgot password?</a>

					<button class="login-form__button login-form__button_send" type="submit">Submit</button>
					<button class="login-form__button login-form__button_clear" type="reset">Clear</button>

				</form>

		<?php

		}
			else {
				$txtlogin = $_POST['txtlogin'];
				$txtsenha = $_POST['txtsenha'];

				$consulta = mysqli_query($link, "SELECT * from usuarios where login = '$txtlogin' and senha ='$txtsenha'");
				$resultado =mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		?>

        <div class="dashboard">
          <h1 class="dashboard__title"> Bem vindo, <?php echo $resultado['nome_completo']; ?>!</h1>
        </div>

		<?php

			}
		?>

	</body>

</html>