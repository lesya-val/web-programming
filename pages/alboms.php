<?php
$link = mysqli_connect('localhost', 'root', '', 'audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM alboms";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$alboms = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
	<title>Alboms</title>
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

		<!-- Alboms -->
		<section class="alboms">
			<div class="container">
				<div class="content">
					<h1 class="title">Альбомы</h1>
					<div class="list">
						<ul class="list__items alboms__items">
							<?php foreach ($alboms as $albom) : ?>
								<li class="list__item alboms__item">
									<a href="../index.php">
											<img class="alboms__image" src="../images/alboms/<?php echo htmlspecialchars($albom['cover']); ?>.svg" alt="albom" />
										</a>
									<div class="alboms__info">
										<p><?php echo htmlspecialchars($albom['name']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($albom['artist']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($albom['year']); ?></p>
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