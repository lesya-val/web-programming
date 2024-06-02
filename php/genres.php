<?php

$link = mysqli_connect('sql308.infinityfree.com', 'if0_36655666', 'UR83GKoHFxQ3', 'if0_36655666_audiodepo');

if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM genres";
$result = mysqli_query($link, $query);

if (!$result) {
	die("Query failed: " . mysqli_error($link));
}

$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

?>