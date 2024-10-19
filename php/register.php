<?php
require_once('db.php');

$login = $_POST['login'];
$password = $_POST['password'];

// Проверка, существует ли уже пользователь с таким логином
$sql_check = "SELECT * FROM users WHERE login = '$login'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
	// Если пользователь с таким логином уже существует, выводим сообщение
	echo "Пользователь с таким логином уже существует. Выберите другой логин.";
} else {
	// Хеширование пароля
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Добавление пользователя в БД
	$sql = "INSERT INTO users (login, password, role) VALUES ('$login', '$hashed_password', 'user')";
	if ($conn->query($sql) === TRUE) {
			header("Location: ../index.php");  // Перенаправление после успешной регистрации
	} else {
			echo "Ошибка: " . $conn->error;
	}
}
