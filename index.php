<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="./css/style.css" />
	<title>AudioDepo</title>
</head>

<body>
	<div class="register">
		<h1 class="title">Вход</h1>
		<form action="./php/login.php" method="post" class="form">
			<div class="form__line">
				<label for="login">Введите логин: </label>
				<input class="form__input" type="text" id="login" placeholder="Логин" name="login" required>
			</div>
			<div class="form__line">
				<label for="password">Введите пароль: </label>
				<input class="form__input" type="password" id="password" placeholder="Пароль" name="password" required>
			</div>
			<button class="form__button" type="submit" value="Register">Войти</button>
		</form>
		<div class="form__text">
			<p>Нет аккаунта?</p>
			<a class="form__log" href="./pages/register_form.php">Зарегистрироваться</a>
		</div>
	</div>
</body>

</html>