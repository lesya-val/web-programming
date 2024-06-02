<?php include '../php/genres.php'; ?>
<?php include '../pages/header.php'; ?>

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
						<nav class="list">
							<ul class="list__items genres__items">
							<?php foreach ($genres as $genre) : ?>
								<li class="list__item genres__item">
									<a href="./compositions_page.php">
											<img class="circle" src="../images/genres/<?php echo htmlspecialchars($genre['cover']); ?>.svg" alt="genre" onerror="this.src='../icons/stub.png'" />
										</a>
										<p><?php echo htmlspecialchars($genre['name']); ?></p>
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
