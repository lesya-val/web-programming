<?php

require_once('db.php');
$login = $_POST['login'];
$password = $_POST['password'];

$sql = "INSERT INTO `users` (login,password) VALUES ('$login', '$password')";
if ($conn->query($sql) === TRUE) {
	header("Location: ../index.php");
} else {
	echo "Ошибка: " . $conn->error;
}

?>
