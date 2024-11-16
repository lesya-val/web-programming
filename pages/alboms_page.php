<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit();
}

// Проверка на роль администратора
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

include '../php/alboms.php';
include '../pages/header.php';
include '../pages/loader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Альбомы">

	<link rel="stylesheet" href="../css/style.css" />
	<title>Alboms</title>
</head>

<body>
	<div class="wrapper">
		<!-- Alboms -->
		<section class="alboms">
			<div class="container">
				<div class="content">
					<h1 class="title">Альбомы</h1>
					<?php if ($isAdmin): ?>
						<button class="form__button" href="add_page.php&table=alboms">Добавить альбом</button>
					<?php endif; ?>
					<nav class="list">
						<ul class="list__items alboms__items">
							<?php foreach ($alboms as $albom) : ?>
								<li class="list__item alboms__item">
									<a href="./compositions_page.php">
										<img class="alboms__image" src="../images/alboms/<?php echo htmlspecialchars($albom['cover']); ?>.svg" alt="albom" onerror="this.src='../icons/stub.png'" />
									</a>
									<div class="alboms__info">
										<p><?php echo htmlspecialchars($albom['name']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($albom['artist']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($albom['year']); ?></p>
									</div>
									<?php if ($isAdmin): ?>
										<!-- Панель для администратора -->
										<div class="admin-icons">
											<a href="edit_page.php?id=<?php echo $albom['id']; ?>&table=alboms" title="Редактировать" class="admin-icon">
												<img src="../icons/edit.svg" alt="Редактировать" />
											</a>
											<a href="../php/delete_item.php?id=<?php echo $albom['id']; ?>&table=alboms" onclick="return confirm('Вы уверены, что хотите удалить жанр?');" title="Удалить" class="admin-icon">
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