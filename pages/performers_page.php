<?php include '../php/performers.php'; ?>
<?php include '../pages/header.php'; ?>

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
					<nav class="list">
						<ul class="list__items performers__items">
							<?php foreach ($performers as $performer) : ?>
								<li class="list__item performers__item">
									<a href="./compositions_page.php">
										<img class="circle__performers" src="../images/performers/<?php echo htmlspecialchars($performer['cover']); ?>.svg" alt="performer" />
									</a>
									<div class="performers__info">
										<p class="performers__name"><?php echo htmlspecialchars($performer['artist']); ?></p>
										<p class="translucent"><?php echo htmlspecialchars($performer['genre']); ?></p>
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