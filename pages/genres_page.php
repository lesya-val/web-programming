<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit();
}

// Проверка на роль администратора
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

include '../php/genres.php';
include '../pages/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Жанры">

	<link rel="stylesheet" href="../css/style.css" />
	<title>Genres</title>
</head>

<body>
	<div class="wrapper">
		<!-- Genres -->
		<section class="genres">
			<div class="container">
				<div class="content">
					<h1 class="title">Жанры</h1>
					<?php if ($isAdmin): ?>
						<a href="add_page.php&table=genres">Добавить жанр</a>
					<?php endif; ?>
					<nav class="list">
						<ul class="list__items genres__items">
							<?php foreach ($genres as $genre) : ?>
								<li class="list__item genres__item">
									<a href="./compositions_page.php">
										<img class="circle" src="../images/genres/<?php echo htmlspecialchars($genre['cover']); ?>.svg" alt="genre" onerror="this.src='../icons/stub.png'" />
									</a>
									<p><?php echo htmlspecialchars($genre['name']); ?></p>
									<?php if ($isAdmin): ?>
										<!-- Панель для администратора -->
										<div class="admin-icons genres__admin-icons">
											<a href="edit_page.php?id=<?php echo $genre['id']; ?>&table=genres" title="Редактировать" class="admin-icon">
												<img src="../icons/edit.svg" alt="Редактировать" />
											</a>
											<a href="../php/delete_item.php?id=<?php echo $genre['id']; ?>&table=genres" onclick="return confirm('Вы уверены, что хотите удалить жанр?');" title="Удалить" class="admin-icon">
												<img src="../icons/delete.svg" alt="Удалить">
											</a>
										</div>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
			</div>
		</section>
	</div>
</body>

</html>