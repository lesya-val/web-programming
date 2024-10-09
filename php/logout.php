<?php
session_start(); // Начало сессии

// Удаляем все переменные сессии
$_SESSION = array();

// Если требуется, уничтожьте сессию
session_destroy();

// Перенаправление на главную страницу
header("Location: ../index.php");
exit;
