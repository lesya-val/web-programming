<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<div class="wrapper">
		<!-- Header -->
		<header class="header">
			<div class="head">
				<div class="logo">
					<a href="./compositions_page.php" class="logo__icon">
						<img src="../icons/airpods.svg" alt="airpods" onerror="this.src='../icons/stub.png'" />
					</a>
					<h2 class="logo__title">
						<a href="./compositions_page.php">AudioDepo</a>
					</h2>
				</div>

				<nav class="nav">
					<ul class="nav__list">
						<li class="nav__item">
							<a href="./genres_page.php" class="nav__link nav__link--active">Жанры</a>
						</li>
						<li class="nav__item">
							<a href="./performers_page.php" class="nav__link nav__link--hover-light">Исполнители</a>
						</li>
						<li class="nav__item">
							<a href="./alboms_page.php" class="nav__link nav__link--hover-light">Альбомы</a>
						</li>
						<li>
						<a href="../php/logout.php" class="nav__link nav__link--hover-light">Выход</a>
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
	</div>
	<script src="../index.js"></script>
</body>

</html>