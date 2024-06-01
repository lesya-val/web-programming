<?php
$link = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM performers";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$performers = mysqli_fetch_all($result, MYSQLI_ASSOC);

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

	<link rel="stylesheet" href="../css/style.css" />
	<title>Performers</title>
</head>

<body>
	<div class="wrapper">
		<!-- Header -->
		<header class="header">
			<div class="head">
				<div class="logo">
					<a href="../index.php" class="logo__icon">
						<img src="../icons/airpods.svg" alt="airpods" />
					</a>
					<h2 class="logo__title">
						<a href="../index.php">AudioDepo</a>
					</h2>
				</div>

				<div class="search">
					<input type="text" placeholder="Поиск..." />
					<div class="search__icon">
						<img src="../icons/search.svg" alt="search" />
					</div>
				</div>

				<nav class="nav">
					<ul class="nav__list">
						<li class="nav__item">
							<a href="./genres.php" class="nav__link nav__link--active">Жанры</a>
						</li>
						<li class="nav__item">
							<a href="./performers.php" class="nav__link nav__link--hover-light">Исполнители</a>
						</li>
						<li class="nav__item">
							<a href="./alboms.php" class="nav__link nav__link--hover-light">Альбомы</a>
						</li>
					</ul>
				</nav>

				<!-- Burger-menu -->
				<button class="icon" type="button">
					<div class="icon__wrapper">
						<div class="icon__menu"></div>
					</div>
				</button>
			</div>
		</header>

		<!-- Performers -->
		<section class="performers">
			<div class="container">
				<div class="content">
					<h1 class="title">Исполнители</h1>
					<div class="list">
						<ul class="list__items performers__items">
							<?php foreach ($performers as $performer) : ?>
								<li class="list__item performers__item">
									<a href="../index.php">
										<img class="circle__performers" src="../images/performers/<?php echo htmlspecialchars($performer['cover']); ?>.svg" alt="performer" />
									</a>
									<div class="performers__info">
										<p class="performers__name"><?php echo htmlspecialchars($performer['artist']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($performer['genre']); ?></p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<script src="/index.js"></script>
	</div>
</body>

</html>