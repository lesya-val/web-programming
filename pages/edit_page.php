<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
	header("Location: ../pages/compositions_page.php");
	exit();
}

require_once('../php/db.php'); // Подключение к базе данных

// Получаем параметры
$id = intval($_GET['id']); // Преобразование ID в число для безопасности
$table = $_GET['table'];

// Допустимые таблицы, их поля и заголовки
$allowedTables = [
	'alboms' => ['fields' => ['name', 'artist', 'year'], 'title' => 'Редактировать альбом'],
	'compositions' => ['fields' => ['cover', 'name', 'artist', 'time'], 'title' => 'Редактировать композицию'],
	'genres' => ['fields' => ['cover', 'name'], 'title' => 'Редактировать жанр'],
	'performers' => ['fields' => ['cover', 'artist', 'genre'], 'title' => 'Редактировать исполнителя']
];

// Проверяем, что таблица допустима
if (!array_key_exists($table, $allowedTables)) {
	echo "Ошибка: Неверная таблица.";
	exit();
}

// Получение записи по ID
$sql = "SELECT * FROM $table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
$stmt->close();

if (!$item) {
	echo "Ошибка: Запись не найдена.";
	exit();
}

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = $allowedTables[$table]['fields'];
	$updates = [];
	$params = [];

	// Проверка данных формы
	foreach ($fields as $field) {
		if ($field === 'cover' && isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
			// Получаем информацию о загружаемом файле
			$fileName = pathinfo($_FILES[$field]['name'], PATHINFO_FILENAME);

			// Сохраняем имя файла в параметрах для обновления
			$params[] = $fileName;
			$updates[] = "$field = ?";
		} else {
			// Для остальных полей просто добавляем их в параметры
			if ($field !== 'cover') {
				$params[] = $_POST[$field];
				$updates[] = "$field = ?";
			}
		}
	}

	// Формирование и выполнение запроса на обновление
	if (!empty($updates)) {
		$updateSQL = "UPDATE $table SET " . implode(', ', $updates) . " WHERE id = ?";
		$params[] = $id; // добавляем ID в параметры
		$stmt = $conn->prepare($updateSQL);

		// Использование динамической привязки параметров
		$paramTypes = str_repeat('s', count($params) - 1) . 'i'; // Все строки кроме ID
		$stmt->bind_param($paramTypes, ...$params);

		if ($stmt->execute()) {
			header("Location: ../pages/{$table}_page.php");
		} else {
			echo "Ошибка: " . $stmt->error;
		}
		$stmt->close();
	}
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
				<form class="form" method="POST" action="edit_page.php?id=<?php echo $id; ?>&table=<?php echo $table; ?>" enctype="multipart/form-data">
					<?php foreach ($allowedTables[$table]['fields'] as $field): ?>
						<label class="form__line"><?php echo ucfirst($field); ?>:
							<?php if ($field === 'cover'): ?>
								<input class="form__input-file" type="file" name="<?php echo $field; ?>">
							<?php else: ?>
								<input class="form__input" type="text"
									name="<?php echo $field; ?>"
									value="<?php echo htmlspecialchars($item[$field]); ?>">
							<?php endif; ?>
						</label>
					<?php endforeach; ?>
					<button class="form__button" type="submit">Сохранить изменения</button>
				</form>
			</div>
	</section>
</body>

</html>