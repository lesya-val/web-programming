<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit();
}

// Проверка на роль администратора
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

include '../php/compositions.php';
include '../pages/header.php';
include '../pages/loader.php';
include '../php/format_time.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Композиции">

	<link rel="stylesheet" href="../css/style.css" />
	<link type="image/x-icon" href="../airpods.svg" rel="shortcut icon">
	<link type="Image/x-icon" href="../airpods.svg" rel="icon">

	<title>Compositions</title>
</head>

<body>
	<div class="wrapper">
		<!-- Main -->
		<section class="main">
			<div class="container">
				<div class="main__content content">
					<h1 class="title">Композиции</h1>
					<?php if ($isAdmin): ?>
						<a href="add_page.php?&table=compositions">Добавить композицию</a>
					<?php endif; ?>
					<nav class="list">
						<ul class="list__items main__items">
							<?php foreach ($compositions as $composition) : ?>
								<li class="list__item main__item">
									<img class="main__image" src="../images/compositions/<?php echo htmlspecialchars($composition['cover']); ?>.svg" alt="composition" onerror="this.src='../icons/stub.png'" />
									<div class="main__info">
										<p><?php echo htmlspecialchars($composition['name']); ?></p>
										<p class="list__item-name"><?php echo htmlspecialchars($composition['artist']); ?></p>
									</div>
									<p class="list__item-time"><?php echo htmlspecialchars(formatTime($composition['time'])); ?></p>
									<?php if ($isAdmin): ?>
										<!-- Панель для администратора -->
										<div class="admin-icons">
											<a href="edit_page.php?id=<?php echo $composition['id']; ?>&table=compositions" title="Редактировать" class="admin-icon">
												<img src="../icons/edit.svg" alt="Редактировать" />
											</a>
											<a href="../php/delete_item.php?id=<?php echo $composition['id']; ?>&table=compositions" onclick="return confirm('Вы уверены, что хотите удалить композицию?');" title="Удалить" class="admin-icon">
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