<?php
require_once('db.php');
$login = $_POST['login'];
$password = $_POST['password'];

// Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Добавление пользователя в БД
$sql = "INSERT INTO users (login, password, role) VALUES ('$login', '$hashed_password', 'user')";
if ($conn->query($sql) === TRUE) {
	header("Location: ../index.php");
} else {
	echo "Ошибка: " . $conn->error;
}
