<?php
require_once('db.php');
session_start();  // Начало сессии

$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
	echo "Заполните все поля";
} else {
	// Получение пользователя по логину
	$sql = "SELECT * FROM users WHERE login = '$login'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$user = $result->fetch_assoc();

		// Проверка пароля
		if (password_verify($password, $user['password'])) {
			// Сохранение информации о пользователе в сессию
			$_SESSION['login'] = $user['login'];
			$_SESSION['role'] = $user['role'];

			// Перенаправление в зависимости от роли
			if ($user['role'] == 'admin') {
				header("Location: ../pages/admin_page.php");
			} else {
				header("Location: ../pages/compositions_page.php");
			}
		} else {
			echo "Неверный пароль";
		}
	} else {
		echo "Пользователь не найден";
	}
}
