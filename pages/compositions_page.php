<?php include '../php/compositions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="../css/style.css" />
	<title>Compositions</title>
</head>

<body>
	<div class="wrapper">
		<!-- Header -->
		<header class="header">
			<div class="head">
				<div class="logo">
					<a href="compositions_page.php" class="logo__icon">
						<img src="../icons/airpods.svg" alt="airpods" />
					</a>
					<h2 class="logo__title">
						<a href="compositions_page.php">AudioDepo</a>
					</h2>
				</div>

				<nav class="nav">
					<ul class="nav__list">
						<li class="nav__item">
							<a href="../pages/genres_page.php" class="nav__link nav__link--active">Жанры</a>
						</li>
						<li class="nav__item">
							<a href="../pages/performers_page.php" class="nav__link nav__link--hover-light">Исполнители</a>
						</li>
						<li class="nav__item">
							<a href="../pages/alboms_page.php" class="nav__link nav__link--hover-light">Альбомы</a>
						</li>
					</ul>
				</nav>

				<!-- Burger-menu -->
				<button class="icon" type="button">
					<div class="icon__wrapper">
						<div class="icon__menu">
						</div>
					</div>
				</button>
			</div>
		</header>

		<!-- Main -->
		<section class="main">
			<div class="container">
				<div class="main__content content">
					<h1 class="title">Композиции</h1>
					<div class="list">
						<ul class="list__items main__items">
							<?php foreach ($compositions as $composition) : ?>
								<li class="list__item main__item">
									<img class="main__image" src="../images/compositions/<?php echo htmlspecialchars($composition['cover']); ?>.svg" alt="composition" />
									<div class="main__info">
										<p><?php echo htmlspecialchars($composition['name']); ?></p>
										<p class="list__item-name"><?php echo htmlspecialchars($composition['artist']); ?></p>
									</div>
									<p class="list__item-time"><?php echo htmlspecialchars(formatTime($composition['time'])); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="index.js"></script>
</body>

</html>