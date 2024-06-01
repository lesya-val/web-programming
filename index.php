<?php
$link = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM compositions";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$compositions = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

function formatTime($time)
{
	$timeParts = explode(':', $time);
	$minutes = $timeParts[1];
	$seconds = $timeParts[2];
	return $minutes . ':' . $seconds;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="./css/style.css" />
	<title>AudioDepo</title>
</head>

<body>
	<div class="wrapper">
		<!-- Header -->
		<header class="header">
			<div class="head">
				<div class="logo">
					<a href="index.php" class="logo__icon">
						<img src="./icons/airpods.svg" alt="airpods" />
					</a>
					<h2 class="logo__title">
						<a href="index.php">AudioDepo</a>
					</h2>
				</div>

				<div class="search">
					<input type="text" placeholder="Поиск..." />
					<div class="search__icon">
						<img src="./icons/search.svg" alt="search" />
					</div>
				</div>

				<nav class="nav">
					<ul class="nav__list">
						<li class="nav__item">
							<a href="./pages/genres.php" class="nav__link nav__link--active">Жанры</a>
						</li>
						<li class="nav__item">
							<a href="./pages/performers.php" class="nav__link nav__link--hover-light">Исполнители</a>
						</li>
						<li class="nav__item">
							<a href="./pages/alboms.php" class="nav__link nav__link--hover-light">Альбомы</a>
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
									<img class="main__image" src="./images/compositions/<?php echo htmlspecialchars($composition['cover']); ?>.svg" alt="composition" />
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