<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="../css/style.css" />
	<title>AudioDepo</title>
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
							<a href="../pages/genres.php" class="nav__link nav__link--active">Жанры</a>
						</li>
						<li class="nav__item">
							<a href="../pages/performers.php" class="nav__link nav__link--hover-light">Исполнители</a>
						</li>
						<li class="nav__item">
							<a href="../pages/alboms.php" class="nav__link nav__link--hover-light">Альбомы</a>
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

			<!-- Genres -->
			<section class="genres">
				<div class="container">
					<div class="content">
						<h1 class="title">Жанры</h1>
						<div class="list">
							<ul class="list__items genres__items">
								<li class="list__item genres__item">
									<a href="index.php">
										<img class="circle" src="../images/pop.svg" alt="pop" />
									</a>
									<p class="list__item-text">Поп</p>
								</li>
								<li class="list__item genres__item">
									<a href="index.php">
										<img class="circle" src="../images/rock.svg" alt="pop" />
									</a>
									<p class="list__item-text">Рок</p>
								</li>
								<li class="list__item genres__item">
									<a href="index.php">
										<img class="circle" src="../images/rep.svg" alt="pop" />
									</a>
									<p class="list__item-text">Рэп</p>
								</li>
								<li class="list__item genres__item">
									<a href="index.php">
										<img
											class="circle"
											src="../images/electronic.svg"
											alt="pop"
										/>
									</a>
									<p class="list__item-text">Электронная</p>
								</li>
								<li class="list__item genres__item">
									<a href="index.php">
										<img class="circle" src="../images/avtor.svg" alt="pop" />
									</a>
									<p class="list__item-text">Авторская</p>
								</li>
								<li class="list__item genres__item">
									<a href="index.php">
										<img class="circle" src="../images/classic.svg" alt="pop" />
									</a>
									<p class="list__item-text">Классическая</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<script src="/index.js"></script>
		</div>
	</body>
</html>
