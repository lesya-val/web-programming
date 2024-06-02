<?php include '../php/compositions.php'; ?>
<?php include '../pages/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Композиции">

	<link rel="stylesheet" href="../css/style.css" />
	<title>Compositions</title>
</head>

<body>
	<div class="wrapper">

		<!-- Main -->
		<section class="main">
			<div class="container">
				<div class="main__content content">
					<h1 class="title">Композиции</h1>
					<nav class="list">
						<ul class="list__items main__items">
							<?php foreach ($compositions as $composition) : ?>
								<li class="list__item main__item">
									<img class="main__image" src="../images/compositions/<?php echo htmlspecialchars($composition['cover']); ?>.svg" alt="composition" onerror="this.src='../icons/stub.png'" />
									<div class="main__info">
										<p><?php echo htmlspecialchars($composition['name']); ?></p>
										<p class="list__item-name"><?php echo htmlspecialchars($composition['artist']); ?></p>
									</div>
									<p class="list__item-time"><?php echo htmlspecialchars(formatTime($composition['time'])); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
			</div>
		</section>
	</div>
	<script src="index.js"></script>
</body>

</html>