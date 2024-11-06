<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
	header("Location: ../pages/compositions_page.php");
	exit();
}

require_once('../php/db.php'); // Подключение к базе данных

// Получаем ID и название таблицы из URL
$id = $_GET['id'];
$table = $_GET['table'];

// Безопасная обработка входных данных
$id = intval($id); // Преобразование ID в число для безопасности
$allowedTables = ['compositions', 'genres', 'performers', 'alboms']; // Допустимые таблицы

// Проверяем, что таблица допустима
if (!in_array($table, $allowedTables)) {
	echo "Ошибка: Неверная таблица.";
	exit();
}

// Формируем SQL-запрос для удаления записи
$sql = "DELETE FROM $table WHERE id = $id";
if ($conn->query($sql) === TRUE) {
	header("Location: ../pages/{$table}_page.php"); // Перенаправление после удаления
} else {
	echo "Ошибка при удалении: " . $conn->error;	
}
