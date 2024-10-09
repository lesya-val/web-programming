<?php
session_start();

// Проверка авторизации и роли администратора
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
	header("Location: ../index.php");  // Перенаправление на страницу входа, если не администратор
	exit;
}
?>