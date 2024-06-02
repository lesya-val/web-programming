<?php include '../php/alboms.php'; ?>
<?php include '../pages/header.php'; ?>

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
					<nav class="list">
						<ul class="list__items alboms__items">
							<?php foreach ($alboms as $albom) : ?>
								<li class="list__item alboms__item">
									<a href="./compositions_page.php">
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
					</nav>
				</div>
			</div>
		</section>
	</div>
</body>

</html>