<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
	header("Location: ../pages/compositions_page.php");
	exit();
}

require_once('../php/db.php'); // Подключение к базе данных

// Допустимые таблицы, их поля и заголовки
$allowedTables = [
	'alboms' => ['fields' => ['name', 'artist', 'year'], 'title' => 'Добавить альбом'],
	'compositions' => ['fields' => ['cover', 'name', 'artist', 'time'], 'title' => 'Добавить композицию'],
	'genres' => ['fields' => ['cover', 'name'], 'title' => 'Добавить жанр'],
	'performers' => ['fields' => ['cover', 'artist', 'genre'], 'title' => 'Добавить исполнителя']
];

$table = $_GET['table'] ?? null;

// Проверяем, что таблица допустима
if (!$table || !array_key_exists($table, $allowedTables)) {
	echo "Ошибка: Неверная таблица.";
	exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = $allowedTables[$table]['fields'];
	$values = [];
	$placeholders = [];
	$params = [];

	// Проверка данных формы
	foreach ($fields as $field) {
		if ($field === 'cover') {
			if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
				// Получаем имя файла без расширения
				$fileName = pathinfo($_FILES[$field]['name'], PATHINFO_FILENAME);
				$params[] = $fileName;
				$values[] = $field;
				$placeholders[] = '?';
			} else {
				echo "Заполните поле обложки (cover).";
				exit();
			}
		} else {
			// Проверка, что поле заполнено
			if (!empty($_POST[$field])) {
				$params[] = $_POST[$field];
				$values[] = $field;
				$placeholders[] = '?';
			} else {
				echo "Заполните поле $field.";
				exit();
			}
		}
	}

	// Формирование и выполнение запроса на добавление
	$sql = "INSERT INTO $table (" . implode(', ', $values) . ") VALUES (" . implode(', ', $placeholders) . ")";
	$stmt = $conn->prepare($sql);

	// Использование динамической привязки параметров
	$types = str_repeat('s', count($params)); // Все параметры — строки
	$stmt->bind_param($types, ...$params);

	if ($stmt->execute()) {
		header("Location: ../pages/{$table}_page.php");
	} else {
		echo "Ошибка: " . $stmt->error;
	}

	$stmt->close();
}
include '../pages/header.php';
include '../pages/loader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $allowedTables[$table]['title']; ?></title>
</head>

<body>
	<section class="main">
		<div class="container">
			<div class="main__content content">
				<h1 class="title"><?php echo $allowedTables[$table]['title']; ?></h1>
				<form class="form" method="POST" action="add_page.php?table=<?php echo $table; ?>" enctype="multipart/form-data">
					<?php foreach ($allowedTables[$table]['fields'] as $field): ?>
						<label class="form__line"><?php echo ucfirst($field); ?>:
							<?php if ($field === 'cover'): ?>
								<input class="form__input-file" type="file" name="<?php echo $field; ?>">
							<?php elseif ($field === 'time'): ?>
								<!-- Устанавливаем значение по умолчанию для времени -->
								<input class="form__input" type="text" name="<?php echo $field; ?>" value="00:00:00">
							<?php else: ?>
								<input class="form__input" type="text" name="<?php echo $field; ?>">
							<?php endif; ?>	
						</label>
					<?php endforeach; ?>
					<button class="form__button" type="submit">Добавить запись</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>