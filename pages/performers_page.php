<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit();
}

// Проверка на роль администратора
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

include '../php/performers.php';
include '../pages/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Исполнители">

	<link rel="stylesheet" href="../css/style.css" />
	<title>Performers</title>
</head>

<body>
	<div class="wrapper">
		<!-- Performers -->
		<section class="performers">
			<div class="container">
				<div class="content">
					<h1 class="title">Исполнители</h1>
					<?php if ($isAdmin): ?>
						<a href="add_page.php&table=performers">Добавить исполнителя</a>
					<?php endif; ?>
					<nav class="list">
						<ul class="list__items performers__items">
							<?php foreach ($performers as $performer) : ?>
								<li class="list__item performers__item">
									<a href="./compositions_page.php">
										<img class="circle__performers" src="../images/performers/<?php echo htmlspecialchars($performer['cover']); ?>.svg" alt="performer" onerror="this.src='../icons/stub.png'" />
									</a>
									<div class="performers__info">
										<p class="performers__name"><?php echo htmlspecialchars($performer['artist']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($performer['genre']); ?></p>
									</div>
									<?php if ($isAdmin): ?>
										<!-- Панель для администратора -->
										<div class="admin-icons">
											<a href="edit_page.php?id=<?php echo $performer['id']; ?>&table=performers" title="Редактировать" class="admin-icon">
												<img src="../icons/edit.svg" alt="Редактировать" />
											</a>
											<a href="../php/delete_item.php?id=<?php echo $performer['id']; ?>&table=performers" onclick="return confirm('Вы уверены, что хотите удалить жанр?');" title="Удалить" class="admin-icon">
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