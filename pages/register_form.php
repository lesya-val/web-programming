<!-- <?php
$hashed_password = password_hash("admin_password", PASSWORD_DEFAULT);

// Вывод хешированного пароля на экран
echo "Зашифрованный пароль: " . $hashed_password;
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Регистрация">

	<link rel="stylesheet" href="../css/style.css" />
	<title>Registration</title>
</head>

<body>
	<div class="register">
		<h1 class="title">Регистрация</h1>
		<form action="../php/register.php" method="post" class="form">
			<div class="form__line">
				<label for="login">Придумайте логин: </label>
				<input class="form__input" type="text" id="login" placeholder="Логин" name="login" required>
			</div>
			<div class="form__line">
				<label for="password">Придумайте пароль: </label>
				<input class="form__input" type="password" id="password" placeholder="Пароль" name="password" required>
			</div>
			<button class="form__button" type="submit" value="Register">Зарегистрироваться</button>
		</form>
		<div class="form__text">
			<p>Уже есть аккаунт?</p>
			<a class="form__log" href="../index.php">Войти</a>
		</div>
	</div>
</body>

</html>